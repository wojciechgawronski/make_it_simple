**https://www.laravelcode.com/post/  laravel-7-user-roles-and-permissions-tutorial-without-packages**

composer require laravel/ui --dev;  
php artisan ui vue --auth;  
npm install;  
npm run watch;  

.env  
DB_CONNECTION=sqlite  
touch database/database.sqlite;  
sudo chmod 777 database/;  

sudo chmod 777 -R bootstrap/cache/;  
sudo chmod 777 -R storage/;  


php artisan migrate;  

git init; git add . git commit -m "init";  

**php artisan make:model Permission -m;**
**php artisan make:model Role -m;**


    Schema::create('permissions', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name'); // edit posts
        $table->string('slug'); //edit-posts
        $table->timestamps();
    });
    Schema::create('roles', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name'); // edit posts
        $table->string('slug'); //edit-posts
        $table->timestamps();
    });
    Schema::create('users', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('email',191)->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->rememberToken();
        $table->timestamps();
    });

**php artisan make:migration create_users_permissions_table --create=users_permissions**

    Schema::create('users_permissions', function (Blueprint $table) {
        $table->unsignedInteger('user_id');
        $table->unsignedInteger('permission_id');

        //FOREIGN KEY CONSTRAINTS
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');

        //SETTING THE PRIMARY KEYS
        $table->primary(['user_id','permission_id']);
    });

**php artisan make:migration create_users_roles_table --create=users_roles;**

    Schema::create('users_roles', function (Blueprint $table) {
        $table->unsignedInteger('user_id');
        $table->unsignedInteger('role_id');

        //FOREIGN KEY CONSTRAINTS
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

        //SETTING THE PRIMARY KEYS
        $table->primary(['user_id','role_id']);
    });

**php artisan make:migration create_roles_permissions_table --create=roles_permissions**

    Schema::create('roles_permissions', function (Blueprint $table) {
        $table->unsignedInteger('role_id');
        $table->unsignedInteger('permission_id');

        //FOREIGN KEY CONSTRAINTS
        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');

        //SETTING THE PRIMARY KEYS
        $table->primary(['role_id','permission_id']);
    });


**php artisan migrate**


**We’ll start by creating the relationships between roles and permissions table. In our Role.php , Permision.php.**

**App/Role.php**

    public function permissions() {
      return $this->belongsToMany(Permission::class,'roles_permissions');
    }
    public function users() {
      return $this->belongsToMany(User::class,'users_roles');
    }

**Permission.php**

    public function roles() {
      return $this->belongsToMany(Role::class,'roles_permissions');
    }
    public function users() {
      return $this->belongsToMany(User::class,'users_permissions');
    }

**Creating a Trait** // ATRYBUT, CECHA  
Inside of our app directory, let’s create a new directory and name it as Permissions and create a new file namely HasPermissionsTrait.php. A nice little trait has been setup to handle user relations. Back in our User model, just import this trait and we’re good to go.

**app/User.php**

    namespace App;
    use App\Permissions\HasPermissionsTrait;
    class User extends Authenticatable
    {
        use HasPermissionsTrait; //Import The Trait
    }


<!-- **mkdir app/Traits;** -->
**mkdir app/Permissions;**
**touch app/Permissions/HasPermissionsTrait.php**

**HasPermissionsTrait.php**
    namespace App\Permissions;  
    use App\Permission;  
    use App\Role;  
   
     trait HasPermissionsTrait {
        public function givePermissionsTo(... $permissions) {
            $permissions = $this->getAllPermissions($permissions);
            dd($permissions);
            if($permissions === null) {
              return $this;
            }
            $this->permissions()->saveMany($permissions);
            return $this;
        }

        public function withdrawPermissionsTo( ... $permissions ) {
            $permissions = $this->getAllPermissions($permissions);
            $this->permissions()->detach($permissions);
            return $this;
        }

        public function refreshPermissions( ... $permissions ) {
            $this->permissions()->detach();
            return $this->givePermissionsTo($permissions);
        }
        
        public function hasPermissionTo($permission) {
            return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
        }

        public function hasPermissionThroughRole($permission) {
            foreach ($permission->roles as $role){
              if($this->roles->contains($role)) {
                return true;
              }
            }
            return false;
        }

        public function hasRole( ... $roles ) {
            foreach ($roles as $role) {
              if ($this->roles->contains('slug', $role)) {
                return true;
              }
            }
            return false;
        }

        public function roles() {
            return $this->belongsToMany(Role::class,'users_roles');
        }

        public function permissions() {
            return $this->belongsToMany(Permission::class,'users_permissions');
        }

        protected function hasPermission($permission) {
            return (bool) $this->permissions->where('slug', $permission->slug)->count();
        }

        protected function getAllPermissions(array $permissions) {
            return Permission::whereIn('slug',$permissions)->get();
        }
    }


PROVIDER - DOSTAWCA
**php artisan make:provider PermissionsServiceProvider**
**App/Providers/PermissionsServiceProvider.php**

    public function boot()
    {
        try {
            Permission::get()->map(function ($permission) {
                Gate::define($permission->slug, function ($user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
            });
        } catch (\Exception $e) {
            report($e);
            return false;
        }
        //Blade directives
        Blade::directive('role', function ($role) {
                return "if(auth()->check() && auth()->user()->hasRole({$role})) :"; //return this if statement inside php tag
        });
        Blade::directive('endrole', function ($role) {
                return "endif;"; //return this endif statement inside php tag
        });
    }
