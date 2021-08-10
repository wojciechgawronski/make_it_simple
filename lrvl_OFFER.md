/site
/blog
/shop
/faktura /invoice

Laravel The Full Stack Framework
- to route requests to your application and render your frontend via Blade templates or using a single-page application hybrid technology like Inertia.js
-  routing, views, or the Eloquent ORM
- If you are using Laravel as a full stack framework, we also strongly encourage you to learn how to compile your application's CSS and JavaScript using Laravel Mix.
- Laravel The API Backend: Laravel Sanctum, 


laravel new pro_ject --auth --git  --organization="woj"


webpack
    sass, browsersync, js

database
    mysql/sqlite
    Eloquent (ostrożnie,  triggerowanie)
    QueryBuilder
    php artisan make:migration add_phone_users --table=users // up() :  $table->string('phone, 12)->nullable(); ) // down() $table->dropColumn('users');


404

importowanie layoutów

CRUD, RESTApi
    # Generate a model and a migration, factory, seeder, and controller...
    php artisan make:model Flight -mfsc
    php artisan make:controller PhotoController --resource  --model=Photo
    php artisan make:controller PhotoController --api


autoryzacja
    middleware

seedery

grupy routsów

debugowanie
    php artisan route:list
    https://github.com/barryvdh/laravel-debugbar
    dump, dd, logs, toSql(), 

mailing
- do logów
- 



logi
    middleware

