https://laravel.com/docs/8.x/passport
https://www.youtube.com/watch?v=xvqPEEpRBJ4

https://gorest.co.in/public-api/users
https://api.github.com/users/wojciechgawronski/repos


composer -V
php -v
laravel -V
laravel new api_crash_course
cd api_
php artisan --version

git init; git add .; git commit -m "init";
touch database/database.sqlite;
sudo chmod 777 database database/database.sqlite;
sudo chmod 777 -R storage storage/logs;
.env: 
DB_CONNECTION=sqlite

**php artisan route:list**

composer require laravel/passportclear
*Ten **ServiceProvider** Passport rejestruje własny katalog migracji bazy danych, więc po zainstalowaniu pakietu należy przeprowadzić migrację bazy danych.*
**php artisan migrate**

**php artisan passport:install;**
*To polecenie utworzy klucze szyfrowania potrzebne do wygenerowania bezpiecznych tokenów dostępu. Dodatkowo komenda utworzy klientów „dostęp osobisty” i „przyznanie hasła”, które posłużą do wygenerowania tokenów dostępu.*

### laravel API
basic of Rest JSON Api; data will be send by JSON or XML
Why? XML and JSON are readable
Restauracja: Kuchnia i Goście, Kuchnia Backend, Vistors - fronEnd, Endpoints - zamówienia
Representational State Transfer
REST - architectrural tyle used for communication between server and client
DISADVANTAGES
    REST nor STATEFULL, 
    ALWAYS NEDD SEND SOME DATA TO SERVER
    you only read

CRUD abnd REST

CRUD         REQUEST   HTTP VERB    ENDPOINT
Read   ---   GET   --- GET -------  /movies /movies/id /movies/slug-slug    (UNIQUE)
Create ---   GET   --- GET -------  /movies
Update ---   UPDATE -- PUT / PATCH  /movies/inception
Delete ---   DELETE -- DELETE       /movies/inception

204 OK, but nothing to respomse
301 endpoint is moved permanetly
307 endpoint temporary redirect
400 bad request
403 forbiden → wrong credentials
404 not found
405 not allowed
422 validation errors: invalid data has been sent

5.. server error
JSON BEST PRACTICE
502 bad gateway, gateway recived an invalid response
503 service unaviailable, server is down for maintenance
504 gateway timeout, response to long with more as given period

POSTMAN:
https://gorest.co.in/public-api/users

PAGINATION
{
    "links": {
        "first": 127.0.0.1/books?page=1,
        "second": 127.0.0.1/books?page=2,
        "third": 127.0.0.1/books?page=3,
    }
}
→ COLLECTIONS; → ATTRIBUTES; ( → obiekt równocześńiej); 
DATA: collection of.. data, 
PAGINATION: link objects, first link, last link, previous and next
{
    "data": [
        "id": 1,
        "attributes": {
            "name": "john",
            "publication_year": 2001
        },
        "relationships": {

        }
    ]
}

// http://www.localhost/larva/api_crash_course/public/api/test
OR
php artisan serve
http://127.0.0.1:8000/api/test


Route::get('/test', function(Request $request){
    return 'auth test';
});

TRAIT
Traits to mechanizm pozwalający na ponowne użycie kodu w językach (w tym PHP) gdzie dozwolone jest pojedyncze dziedziczenie. Trait pozwala programiście na używanie tych samych metod (oraz atrybutów) przez kilka różnych klas. ... Pojedynczy trait jest więc bardzo podobny do klasy ale zawiera tylko i wyłącznie zestaw metod.

### Tinker: A runtime developer console, interactive debugger
**php artisan tinker**

DB::table('users')->insert(['name' => 'woj gaw', 'email' => 'w@g', 'password' => Hash::make('11111111')]);
exit

App\Models\User::count();
App\Models\User::all();
App\Models\User::where('email', 'w@g')->first();

### POSTMAN
php artisan serve
1. Use POST: http://127.0.0.1:8000/oauth/token
2. Click: Body
3. Click: form-data
4. KEY ------------ VALUE
    grant_type      password
    client_id       *from *php artisan passport:install;* 
    client_secret   *from *php artisan passport:install;*
    username        *from DB::table('users')->insert([ ....*
    password        *from DB::table('users')->insert([ ....*
    scope   
    *scope - empty value

**START**
---------------------------------------------------
### OAuth  -  to framework/protokół autoryzacyjny
*W przypadku protokołu wymagane jest ścisłe trzymanie się zasad określonych w specyfikacji.*

standardowy protokół autoryzacji.
– otwarty standard autoryzujący, pozwalający użytkownikom udostępniać aplikacjom i stronom trzecim informacje przechowywane u innych dostawców usług[1]. Zazwyczaj wymagana jest nazwa użytkownika oraz token. Amazon, Google, Facebook, Microsoft oraz Twitter.

**Access token** — Token używany do uzyskiwania dostępu do chronionych zasobów.
**Authorization code** — Token pośredniczący generowany, gdy użytkownik autoryzuje klienta do dostępu do chronionych zasobów w jego imieniu. Klient otrzymuje ten token i wymienia go na token dostępu.
**Authorization server** - Serwer, który wystawia tokeny dostępu po pomyślnym uwierzytelnieniu klienta i właściciela zasobu oraz autoryzacji żądania.
**Client** → Aplikacja, która uzyskuje dostęp do chronionych zasobów w imieniu właściciela zasobu (np. użytkownika). Klient może być hostowany na serwerze, komputerze stacjonarnym, urządzeniu mobilnym lub innym.
**Grant** - to metoda uzyskania tokena dostępu.
**Resource server** - Serwer, który znajduje się przed chronionymi zasobami (na przykład „tweety”, zdjęcia użytkowników lub dane osobowe) i jest zdolny do przyjmowania i odpowiadania na żądania zasobów chronionych za pomocą tokenów dostępu.
**Resource owner**- Użytkownik, który autoryzuje aplikację do dostępu do swojego konta. Dostęp aplikacji do konta użytkownika ograniczony jest do „zakresu” nadanych uprawnień (np. dostęp do odczytu lub zapisu).
Scope - Pozwolenie.
**JWT**— Token sieciowy JSON to metoda bezpiecznego przedstawiania roszczeń między dwiema stronami zgodnie z definicją w RFC 7519 .

AuthorisationCode
dotyczy KLIENTŁÓW którzy są CONFIODENTAL - czyl;i potrafią przechowywać swój secret. czyli mająm Serwer.

1. ResourceOwner, np użytkownik fizyczny, np moj gmail
2. AuthorisationServer serwer nadzorujący proces, czyli w moim przypadku Google
3. Client, apalikacja, np. Facebook która chce uzyskac dostęp do kontaktów
4. ResourceServer serwis który te kontakty posiada,  bardziej jednak wlasciciel zasobów, czyli JA, ktyóry może wyrazioć zgodę - jakiś checkbox

Credentials as a key =- poświadczenia jako klucz
ClientID
ClientSecreet - na serwerze (albo w chmurze na serwerze) - sxhowane hasło na bacendzie. nawet jak serwer jest zawirusowany jest bezpiecznie. Nigdy nie może być w kodzie JS (bo będzie w urządzeniu użytkownika i można się do niego dokopać)

2 TYPY TOKENÓW DOSTĘPOWYCH
1. **BEARER TOKEN**
- randomowy ciąg znaków, saprawdzić w bazie, gorzej skalowalny
- każde zapytanie przechodzi przez BD, misu byc zwalidowane (np. porównane)
- można go odwołać
2. **JWT, WIĘKSZY BYT**
- zawiera wszytkie informacje: kiedy wygasa, jakie są prawa 
- każdy serwis który go otrzyma może sprawdzić,
więc lepsza skalowalność, nie trzeba podbijać do jednej BD
- minus: nie może zostać odwołany - bo wszystkie infoirmacje są w nim, WIĘC MOŻE BYĆ DUUUŻY
HYBRYDA: 
- część informacji w BD

JWT: algorytm RSA256, klucz prywatny i publiczny,
klucz prywtny (może tworzyć token) i jest w posiadaniu AuthorisationServera
każdy serwis który przyjmuje tokeny posiada klucz publiczny i jest w stanuie zweryfikowac czy token jest poprawny 
(ale nie umie go utwirzyć)

AccessTokenmy są często używane, po wwielu serwisach latają,
więc muszą być RefreshTokeny, tylko po to aby dostać nowy accessToken, i nie trzeba podbijać do u≥żytkownika

**Uwierzy5telnienie: ClientID, ClientSecret**
**END**
------------------------------------------------------------------

php artisan make:model -a -r Author
HURRRA, ALLLL !!!:
-a: make migration, controlleer, FACTORY and SEEDER 
-r resource controller

Author:
$table->string('name');
protected $fillable = ['name'];
php artisan migrate;

*class AuthorFactory extends Factory:*
'name' => $this->faker->name

*class AuthorSeeder extends Seeder*
run(): \App\Models\Author::factory(5)->create();

*class DatabaseSeeder extends Seeder*
run(): $this->call(AuthorSeeder::class);

php artisan migrate --seed


api.php: 
**Route::get('/authors/{author}', [AuthorController::class, 'show']);**
public function show(Author $author)
{
    return response()->json([
        'data' => [
            'id' => $author->id,
            'type' => 'Authors',
            'attributes' => [
                'name' => $author->name,
                'created_at' => $author->created_at,
                'updated_at' => $author->updated_at,
            ],
        ],
    ]);
    // return $author;
}

**php artisan make:resource Authorresource**

POSTMAN: PUT/PATCH
http://127.0.0.1:8000/api/v1/authors/1
public function update(Request $request, Author $author)
{
    $author->update([
        'name' => 'woj'
    ]);

    return new AuthorResource($author);
}

### VALIDATION
php artisan make:request AuthorRequest
in AuthorController:
*zamiast Request $request:*
use App\Http\Requests\AuthorRequest;

public function authorize()
{
    return true;
}
    public function rules()
{
    return [
        'name' => 'required|unique:authors|max:255'
    ];
}


**php artisan make:model Book -a**
*Model created successfully.*
*Factory created successfully.*
*Created Migration: 2021_07_09_100153_create_books_table*
*Seeder created successfully.*
*Controller created successfully.*

Schema::create('books', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('desc');
    $table->string('publication_year');
    $table->timestamps();
});



### seeder, ~ siewnik;-)
**php artisan make:seeder UserSeeder**
Laravel zawiera możliwość inicjowania bazy danych danymi testowymi przy użyciu klas inicjujących. Wszystkie klasy seed są przechowywane w database/seeders

git clean .
git clean -i

#### Many to many RELATIONSHIP  
ONE BOOK MIGHT HAVE MANY AUTHORS
ONE AUTHOR CAN WRITE MANY BOOKS
**so wee ned new pivot table**
**php artisan make:migration create_book_author_table**
Schema::create('book_author', function (Blueprint $table) {
    $table->unsignedBigInteger('author_id');
    $table->foreign('author_id')
        ->references('id')
        ->on('authors')
        ->cascade('delete');

    $table->unsignedBigInteger('book_id');
    $table->foreign('book_id')
        ->references('id')
        ->on('books')
        ->cascade('delete');
});
**php artisan migrate**

BookFactory
return [
    'name' => $this->faker->name,
    'desc' => $this->faker->sentence,
    'publication_year' => (string) $this->faker->year
];

BookSeeder
\App\Models\Book::factory(5)->create();

DatabaseSeeder
$this->call(BookSeeder::class);

Database migration:
Schema::create('book_author', function (Blueprint $table) {
    $table->unsignedBigInteger('author_id');
    $table->foreign('author_id')
        ->references('id')
        ->on('authors')
        ->cascade('delete');

    $table->unsignedBigInteger('book_id');
    $table->foreign('book_id')
        ->references('id')
        ->on('books')
        ->cascade('delete');
});

**php artisan migrate --seed**

Book.php
protected $fillable = ['mame', 'desc', 'publication_year'];

**php artisan make:resource Bookresource**

php artisan tinker
DB::table('book_author')->insert(['author_id' => 2, 'book_id' => 2]);
DB::table('book_author')->insert(['author_id' => 2, 'book_id' => 3]);
DB::table('book_author')->insert(['author_id' => 3, 'book_id' => 4]);
exit;