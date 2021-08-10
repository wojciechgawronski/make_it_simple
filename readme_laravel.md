### Doctrine: set of PHP libraries
1. ORM Object Relational Mapper
2. DBAL DataBase Abstract Layer
3. ODL Object Document Layer
### Eloquent
1. ORM
2. DBAL

### Na start
laravel new app;
cd app;
sudo chmod 777 -R storage/;
sudo chmod 777 -R storage/logs;
**auth:**
.env APP_KEY
php artisan key:generate

php artisan list
php artisan route:list

### SQLite
touch database/database.sqlite;
sudo chmod 777 database/; sudo chmod 777 database/database.sqlite;
.env: DB_CONNECTION=sqlite
php artisan migrate;

### MySQL
mysql -V
sudo mysql -u root -p 
CREATE DATABASE some_db;
php artisan migrate:fresh
.env: DB_CONNECTION...

### no i Git
git init;
git add .;
git commit -m "init";
git status;
git checkout -b some_branch;

### Tests
phpunit --filter test_example;
php artisan make:test UserTest;

### User; Model, Controller,
**php artisan make:model Car -mc --resource** 
*view/cars/index.blade.php /add.blade.php /show.blade.php*
**php artisan route:list**
php artisam make:model User -m;
php artisan make:controller UserController --resource;
php artisan migrate;
**refactor: declare(strict_types=1)

### Database
php artisan make:migration 
php artisan make:migration create_messages_table // up(); $table->increments('id'); $table->string('title')  down(); 
crerated_at, updated_at
php artisan migrate;
php artisan migrate:rollback;
php artisan migrate:fresh;

### Models
*in Controller:*
use App/Message;

$messages = Message::all();
$message = Message::findOrFail($id);
$cars = Car::where('name', '=', 'Audi')->get();
$cars = Car::where('name', '=', 'Audi')->findOrFail();
$car::find($id); // it return collection, so..
$car::find($id)->first();

**print_r(Car::avg('founded));**
**print_r(Car::sum('founded));**
compact('messages)
protected $fillable = ['name'];

@method('post')
public function store(Request $request){
    // $car = new Car;
    // $car->name = $request->input('name')'
    $car = Car::create([
        'name' => $request->input('name');
    ]);
    OR: $car::make([ ... ]) AND $car->store() method will be needed;

    return redirect(/cars);
}

FAJNA RÓŻNICA
;-) @method('put')
public function update(Request $request, $id){
    $car = Car::where('id', $id)
        ->update([
            'name' => $request->input('name');
        ]);
    redirect('/cars')
}

@method('delete')
public function destroy($id){
    $car = Car::find($id)->first();
    $car->delete();
    return redirect('/cars');
}
RÓŻNICA:
public function destroy(Car $car){
    $car->delete();
    return redirect('/cars');
}




### Views
**general site**
rm resources/views/welcome.blade.php;
mkdir resources/views/layouts resources/views/site_elements;
touch resources/views/layouts/app.blade.php;
touch resources/views/site_elements/footer.blade.php;
touch resources/views/site_elements/header.blade.php;
<a  {{ Request::is('cennik') ? 'active' : '' }} href="{{ url('/cennik') }}">Cennik</a>

**BLADE**
PHP: {{ date("Y-m-d H:i:s") }}
@extend('base')
@yeld('content)
@section('content') ... @endsection
@if(1==1) ... @else .. @endif
@foreach($messages as $message) <h2>{{ $message->title }}</h2> <p>{{ $message->created_at }} {{ $message->created_at->diffForHumans()</p> }} @endforeach
@foreach(['one', 2,1,] as $number) {{ $number }} @endforeach

**<link rel="stylesheet" href="{{ asset('css/app.css')" }}>

**users**
mkdir resources/views/users;
cd resources/views/users;
*touch create.blade.php index.blade.php edit.blade.php show.blade.php;*
*touch form.blade.php nav.blade.php;*
**return view('users.index')**

### Tinker
composer require laravel/tinker
php artisan tinker
DB::select('SELECT NAME FROM sqlite_master WHERE type="table"');
$u = new \App\Models\User();$u->first_name='woj';$u->last_name='gaw';$u->phone='111222333';$u->save();

### CSSy
mkdir public/css;
touch public/css/darktheme.css;

### Saas
mkdir resoutces/sass;
touch resources/app.scss;
vim header -> style-link-app.css
npm run dev;
vim webkack;
npm run watch;


