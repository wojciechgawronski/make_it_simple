Ctrl Shift V → md view  
**php artisan inspire**

1. [Wstęp](#wstęp)
2. [Routing](#Routing)
3. [Controller](#Controller)
4. [Reuquest](#Request)
5. [Response](#Response)
6. [View](#View)
7. [Konfiguracja](#Konfiguracja)
8. [Sesje](#Sesje)
8. [Baza Dancyh, Sql](#Baza_Danych)
8. [Sql](#Sql)
9. [Baza Danych Query Builder](#Query_Builder)
10. [Eloquent](#Eloquent)
11. [Architektura Middleware](#Middleware)
11. [Logowanie, Rejestracja](#Logowanie_Rejestracja)
12. [Architektura, ServiceContainer](#Service_Container)
13. [Repozytorium](#Repozytorium)
14. [Architektura, ServiceProvider](#Service_Provider)
15. [Architektura, Facases](#Facades)
15. [Architektura, Facases](#Komendy)
15. [Architektura, Facases](#Facades)
15. [Testy](#Testy)
***

https://laravel.com/docs/8.x/deployment#server-requirements  
https://laravel.com/docs/8.x/eloquent-relationships#eager-loading  
https://laravel.com/docs/8.x/blade  
https://laravel.com/docs/8.x/migrations  
https://laravel.com/docs/8.x/queues  
https://laravel.com/docs/8.x/pagination  

https://webdevetc.com/blog/laravel-naming-conventions/  
https://github.com/fakerphp/faker  
https://github.com/fakerphp/faker --dev (lepiej, php8 → ok)  
https://github.com/aleckrh/laravel-sb-admin-2  

https://github.com/barryvdh/laravel-debugbar  
composer require barryvdh/laravel-debugbar --dev  
config/app.php: line 83, 'locale' => 'pl',  

https://startbootstrap.com/  
https://colorlib.com/wp/cat/ecommerce/  
https://preview.colorlib.com/#timezone  
https://github.com/rokde/laravel-slow-query-logger  
***

VSC: sqliteExtension  
F1 choose DB from file  

table>thead>tr>th*5^^tbody>tr>td*5  
;-)  
{} WĄSY STALINA  
"" CIAPKI, CUDZYSŁOWIA  
-> strzałeczki: **CHAIN**  
WRAPOWAĆ / OPAKOWAĆ  
Redis - cache pamięciowy w ramie,  
jeśli coś się zepsuje tracimyu pamięć, więc co chwilę powinien zapisywac dane na dysk

**TRUDNE SŁOWA**  
rzutowanie == konwertowanie  
Traity, Fabryky, Seedy, Servisy  
BoskiController:: 8tysięcznik

chain (builder): jeśli metoda zwraca This można wywołać kolejną metodę po niej z klasy

folder public: css, js:  *asset('css/css.css')*  
nie przechodzi przez proces autnetykacji  

Single Action Controller - only **invoke()  
CQRS: jedna akcja - jeden plik (rozdzielenie akcji i traktowanie ich atmowo),
_(separowanie akcji od siebie)_
invoke - magiczna met, trigeruje się (URUCHAMIA), kiedy użyjemy obiektu jak funkcji
$obj = new Obj();  
$obj(); // **invoke();

### **php artisan down**
php artisan down --secret="1630542a-246b-4b66-afa1-dd72a4c43515"  
503 error, maintanance mode, wdrażanie nowej wersji kodu na proda - gdy modyfikacje/migracje bazy danych  
**php artisan up**  
serwisik działa  


### Wstęp (Tomasz Tomczyk)
***

**Routing** - jest procesem „wiązania” konkretnego adresu URL, na który wchodzi użytkownik, z kodem, który ma się wykonać w naszej aplikacji. Laravel udostępnia kilka sposobów, za pomocą których możemy to zrobić.

**Controller** - dzięki kontrolerom możemy grupować powiązane ze sobą żądania od użytkownika w konkretne klasy, dzięki czemu mamy bardziej zorganizowany kod. 

**Request** - przykłady i zastosowania obiektu Request. Obiekt ten zawiera informacje o parametrach przekazywanych od użytkownika do naszej aplikacji, np. dane formularza lub parametry przekazywane poprzez URL. Dowiesz się, w jaki sposób można uzyskać do nich dostęp (i nie tylko do nich).

**Response** - podstawowe informacje na temat generowania odpowiedzi dla użytkownika.

**View** – w tej sekcji znajduje się omówienie tematu generowania odpowiedzi przeznaczonej dla użytkownika z naciskiem na stronę back-endową. Poruszany jest temat „V” z MVC oraz na przykładach pokazane jest, w jaki sposób przekazywać dane do szablonów widoków. Poruszony zostaje również temat optymalizacji renderowania widoku.

**Blade** - jest systemem szablonów używanym przez Laravel. Omówiona zostaje składnia potrzebna do wyświetlania danych przekazanych do widoku. Oprócz samego wyświetlania danych omówione są również instrukcje sterujące, pętle oraz, co najważniejsze, dziedziczenie szablonów.

Laravel, mimo że to framework PHP, posiada wsparcie dla technologii front-endowych. Dowiesz się, jak w prosty sposób można wdrożyć widok oparty na React, Vue lub Bootstrapie do nasze aplikacji. Opisany zostaje również Laravel Mix, który jest nakładką udostępnianą przez framework na Webpack’a.

**Konfiguracja frameworka** - sam framework, jak również biblioteki, których potencjalnie będziemy chcieć użyć w aplikacji, mogą wymagać konfiguracji. Tutaj dowiesz się, w jaki sposób to zrobić z uwzględnieniem wielu środowisk, z którymi przyjdzie nam pracować.

Sesje - są jednym z podstawowych mechanizmów, który musimy zaimplementować praktycznie w każdej aplikacji www. Laravel posiada już gotową implementację tego mechanizmu, dzięki czemu nie trzeba pisać jej na nowo. Jak skonfigurować i jak go używać.

**Baza danych** - konfigurowanie, jak tworzyć schemat/strukturę bazy za pomocą kodu PHP i jak w bardzo łatwy sposób przywracać poprzednią wersję. Zobaczysz również, jak można szybko wypełnić bazę danymi.

**Query Builder**. W poprzedniej sekcji została utworzona i wypełniona baza danych, w tej wyciągamy z niej dane za pomocą Query Buildera, czyli biblioteki służącej do konstruowania zapytań. Ciąg dalszy poznawania możliwości Query Buildera, dodatkowo omówiony i zaimplementowany jest system do paginacji wyników.

**Eloquent** to alternatywne podejście w stosunku do Query Buildera służące do obsługi bazy danych w aplikacji. Jest to ORM, który zapewnia obiektową reprezentację danych pochodzących z bazy. Wszystko to (a nawet więcej), co zostało powiedziane wcześniej na temat Query Buildera, omówione jest tutaj w kontekście Eloquenta.

**Middleware** – oprogramowanie pośredniczące – zapewnia nam możliwość bardzo prostego filtrowania/analizowania/logowania/procesowania danych w aplikacji w jednym konkretnym miejscu i klasie.

**Autentykacja** – rejestracja oraz logowanie użytkowników do serwisu to jest kolejna generyczna funkcjonalność, którą często trzeba zaimplementować w aplikacji. Laravel dostarcza rozwiązanie tego problemu. 

**Architektura – Lifecycle**. Wcześniej zostało omówione dużo podstawowych tematów. Poznana wiedza pozwala przejść do omówienia tego, jak wygląda proces obsługi żądania od użytkownika od A do Z.

**Architektura – Kontener zależności**. Miejsce, gdzie są przechowywane wszystkie moduły/biblioteki i zależności, które pomiędzy nimi występują.

**Architektura – Dostawcy usług**. Service Providers zapewniają miejsce, gdzie można skonfigurować nową usługę w aplikacji (obsłużyć jej zależności, umieścić w kontenerze, itp.).

**Architektura – Fasady**. Zapewniają bardzo szybki dostęp do danych umieszonych w kontenerze. Dzięki temu bardzo prosto można sięgnąć po te dane. Jednak powstaje pytanie, czy to jest aż tak dobre, jak się na początku wydaje?

**Artisan – własne komendy**. We wcześniejszych sekcjach powiedziane zostało już, co to jest artisan i jak go używać. Tutaj zajmiemy się tworzeniem własnych komend, które potem będzie można wywoływać za pomocą artisana i używać ich w aplikacji.

**Generowanie adresów URL** - w tej sekcji w jednym miejscu zostały zebrane informacje, w jaki sposób można generować adres URL poprzez metody udostępniane przez framework.

Rozwój aplikacji – implementacja wyszukiwarki.

**Validation i Form Request**. Omawiamy narzędzia, dzięki którym możemy walidować dane pochodzące z systemów zewnętrznych lub od samego użytkownika, które przychodzą w jego żądaniu.

**Obsługa plików**. Wgrywanie plików na serwer może nie jest trudnym tematem do implementacji, ale na pewno uciążliwym. Laravel wspiera nas w tej kwestii i tutaj zobaczysz, w jaki sposób.

**Uprawnienia użytkowników**. Po autentykacji autoryzacja do zasobów w aplikacji jest jednym z najważniejszych tematów. Jak zweryfikować, czy użytkownik ma uprawnienia do wykonywania akcji w aplikacji.


**Testowanie aplikacji**. Wiele osób myśli, że testy to zło konieczne. Jednak są oni w błędzie. Tutaj dowiesz się, dlaczego oraz jak wygląda testowanie od strony Laravela.

- Laravel Way- dokumentacja jako podstawa tworzenia aplikacji
- poznanie narzedzia (co nam daje L?, wiedza jak go uzyc), potem wychodzimy poza ramy narzedzia ; modelowanie aplikacji, arch
***

  **generyczne rzeczy:**
- zmienne srodowiskowe
- komunikacja z bd, biblioteki
- szablony
- obsuga bledow
    >→ core, szkielet  
    → określenie uporzadkowanej str katalogów; wydzielone warstwy/mudyły aplikacji;  
    → usprawnianie i przyspieszenie procesu budowy  
    → biblioteki: jeśli coś zostało napisane i zotało napoisane dobrze, czemu tego nie użyć?  

::::Napisać coś lepiej? Po swojemu?

### MVC

wzorzecz arch, podział aplikacji na warstwy;) 
MODEL: LOGIKA BIZNESOWA, to co ona ma robić, np. system przechowywania grafik;   wgrywanie, walidacja, prechowywanie, udostepnianie grafik. Funkcjonalość grafik. Model działą i powiadamia kontroller. Kontroller renderuje widok z danymu z modelu, Model - <3 aplikacji  
VIEW: Proezentacja, GUI, Interfejs Użytkownika, HTML  
CONTROLLER: kontroluje, na podstawie danych z Requestu, organizuje przepływ Requestu od Usera i zwraca Response  
!! model musi działać niezaleznie od kontrollera, powinien działać także na podstawie skryptów PHP  
**!!! Model: storage plus logika (funkcjonalności); kiedyś tylko storage (legacy)**
→ separacja odpowiedzialności/warstw: jasno zdefiniowane co za co odpowiada.

### MODUŁY

- NOVA → panel administracyjny WordPressa
- PASSPORT → implementacja protokołu OAuth (zaloguj przez FB: pod maską wchodzi OAutyh)
- CASHIER → cykliczne opłaty za usługi, np.
- ELOQUENT → implementacja wzorca Activne-Record
- BLADE → system szablonów HTML
- ARTISAN → komnsola lini poleceń, obsługa cachea TINKER, wykorzystuje klasy napisane przez Framework (i nasze), komendy wpisujemy z palca
  TO plik/skrypt napisany w PHPie, dodaje do sytemu, ale lokalnie, pule komend które możemy wyklorzystać
  więc piszemy: **php artisan komenda**, obsługa cecha, configów, miogracji,
  serve - komenda która uruchamia lokalnie serwer www i stawia nasząaplikacje
  **w konsoli wypisują się logo serversa**
  F1 - plus wpisanie nazwyn komendy
- podatność na REGRESJĘ → nowa wersja generuje błędy starej wersji, która działała OK.
- Nowa wersja: łatki, zwłaszcza bezpieczeństwa. Regresja: koszt.
- zbyt elastyczny? Bezkrytycznie Larawel - Way. **łamie separacje kodu, odpowiedzialności i SOLIDa. Czy wiem czego unikać?**

### Narzędzia

- php (XAMPP najlepiej) composer (composer.json - MODYFIKUJEMY, composer.lock - wygenerowamny automatycznie)
- COMPOSER: require / remove / update (przechodzi po pakietach i sprawdza czy nie pojawila sie nowsza wersja pakietu i aktualizuje) / install
  _7.2^ - NAJNOWSZA WERSJA Z GAŁĘZI 7.2, nigdy composer nie wyjdzie poza gałąź 7.2_
  a. composer require VS composer require dev / remove
  b. dodanie recznie (composer.json) i composer update
  composer lock, z niego bietrze dane COMPOSER INSTAll !!!, a nie z z composer.json
  **na prodzie powimnny być tylko te pakiety które są na środsowisku testowym i developerskim; composer lock jest po to, by composer update bral z composer lock
  packagist.io - pakiety community, zaciągane przez Composer, np. logowanie
  (manager zależności → szybka instalacja oaczek napisanych przez community), VSC, PhpSrorm
  **php od 5.3 jest wbudowany server www, jak ngonx czy apacz:: php srtisan serve, symfony server start\*\* DO DEVELOPERKI, NIE DLA PRODUKCJI

**debbuger**
https://github.com/barryvdh/laravel-debugbar  
composer require barryvdh/laravel-debugbar --dev  
Copy the package config to your local config with the publish command:  
php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"  

### Struktura katalogów

- console - komendy konsolwe dla nowo tworzonych komend, widoczna dla artisana
  APP/HTTP
- pliki i klasy powiazane z ŻĄDANIEM HTTP, controllers, middleware. /console jest dla obsługi
- kernel.php - plik startowy, bootstrap:  jakie middlewary, jak wygląda routing do mieddlewarów
- bez strict_typów: old way, legacy, kontrolowanie typów
- vendor: NIC NIE MODYFIKUJEMY
- handler.php - można skonfigurwać domyuślną obsł wyjątków,
- w kontrolerach mamy akcje, akcje przyjmują paramtery z requestu, wykonują działąnia w modelu i zwracają widok.
- MIDDLEWARE - klasy WARTSTWA W APLIKACJI przez ktore przechudzie żądanie, WARTSWA POŚREDNICZĄCA, aby trafić dop konkretnej akcji
  wartwa kodu która dodaje nam pewną funkcjonalnośc zanim wykonamy kod odpowiedzialny za obsługęmżądania np. w akcji kontrollera, zalogowanie parametrów startowych dla użytkownika, a w akcji kontrollera nic nie trzeba logować

- PROVIDERS: pliki odpoiwdzialne do wczytywaniu moduiłów Laravela i ich konfigurowanie SERVISY
- User - klasa modelu, która odzwierciedla użytkowników, klasy muszą być widoczne przez autoloader Laravelovy.
- BOOTSTRAP - lkod służy do urtuchomienia Frameworka, app.php - konfiguracja, wczytanie klas handlera, ExceptionGHandler,

* wewnrzyny cache frameworka

- config: app.php, konfiguracja jest wielowymiarową tablicą, część konfigu przetrzymywane jest w innych plikach
- config/auth - autoryzacja
- config/mail
- config/queue systemy koklejkkowe
  Laravel merguje wszystko do jednej tablicy. Pliki konfiguracyjne powinny być podzielone tematycznie na sekcje. MOżna dopdawać nowe sekcje.
- DATABASE
  - migracje, kod ktory modyfuiykuje strukture, dodaje elementy, można zrollbackować 
  - seed - klasy ktore uzupel;niaja BD fejkowymy danyi, np do testow czy do widoków
  - factories - fabryki danych
- PUBLIC - root dla vhosta, widoczny tylko z zewwnątrz, ASSETY - css, js, grafiki
- RESOURCES
  - glównie surowe pliki widoków, np sass (preprocesor css), typeScrfipt.., kompilowane przez Webpacka DO PLIKÓW ZROZUMIAŁYCH PRZEZ przeglądarkę
  - VIEWS: renderowanie danych do widoków, separacja logiki biznesowej od logiki widoku, prezentacja danych
- ROUTES
  - jaki kod ma sie wykonać,
  - dfefinicja routingu dla API; apkę mobilną inną apkę..
- STORAGE
  - worek an rozmnego rodzaju dane
  - CACHE - skeszowanie konfiguracji (do jednego pliku), kasze widoków.., zmiana konfiguracji: reset cecha
  - widoki są parsowane do połączenia htmla z phpem.. blee
  - usprawnienei PERFORMACU strony
  - **nowy KATALOG IMAGES: np grafiki niedostępne do użytkownika, PDFy..**
- TESTY
  - unitowe,
  - funkcjonalne
  - integracyjne
***

package.json, package.lock: pliki dla NPM  
webpack.mix.js: z resosrcem webpackiem do /public  
composer.json: **composer update**: np. wersje minimalne z gałężi ^7.1.2 do max   
composer.lock: wersje zainstalowane, **composer install**


#### .ENV - zmienne środowiskowe

1. developerskie, przeważnie na lokalnym komputerze, na wyłączność, każdy ma swoje na lokalnej maszynie
2. testowe, uruchamianie testów przez wrzuceniem kodu na produkcję :-)  
   → kopia środowiska produkcyjnego
3. produkcyjne
   
Środowiska:
- bazowa konfiguracja jest rozna
- czy mają róne bazy danych
- gdzie trzymają sesję: w bazie danych / w redisie? / w plikach (środowsko developerskie)
  w plikachj .env tzrymać konf środowisk  
  .env.example - szablon, CtrlC, CtrlV  
  **env.testing** konfuguracjha dla UnitTestów, zmienne testowe nadpisują zmienne produkcyjne
  .env nie jest współdzielony między:
  a. środowiskami  
  b. programistami  
  każdy ma plik .env.example ściągnięty z gita, i ctrl c, ctrl v, lub rename
- konwencja nazewnicza jakby to były STAŁE

## ROUTING

1. ROUTE SERVICE PROVIDER
2. RODZAJE
3. PERFORMANCE cechowanie

- routing http: na podst urla jest wykonywany jakis kod
- routing consoli:
  metoda user na obiekcie request zwraca nam dane zalogowanego uytkownika (spoiler ;-) ), 
  _gdy niezalogowany: returnuje null_  
  **public function indexAction() w kontrolerach przechowujemy AKCJE, a metody realizujące logikę biznesową powinny być głęviej: w serwisach, modułach..**

  web.php: /users/{name}/{id}/{text} \**takie same paramtery w akcji odpowiadającej route
  *index(string $name, int $id, string $text)*
  BTW: DOMKNIĘCIA to FUNKCJE ANONIMOWE, np. wq web.php. tam można przekazywać arg z Urla, np. {name},, function ($name){} i returnować w widoku

REST API  
**POSTMAN: client http; get, post, put, patch, delete, options**
save() - obok send, do zapisu adresu i metody ;-)

1. tworzenie api
2. symulowanie api, KESZOWANIE:
3. testy do api
4. ustawić monitory które będą cyklicznie sprawdzać, czy nasze api działa

CACHOWANIE  
**php artisan route:cache**
/bootstrap/cache/routes-v7.php  
przyspiesza nawet 100-krotenie wczytywania routingu (podczas bootowania framweworka)
a co jesli ktoś się do nas podbnija 30razy na minutę?

- framwework optymalizuje R na PRODZIE - wrzuca wszysko do jednego pliku, wczytuje o wiele szybciej. Dev - przy wczytywaniu każdej trasy tzreba będze S - cachować.
  Na devie - jeśli caschowanie - podobnie
  rząd wielkości: setki routów - keszowanie
  dziesiątki - zastanowienie się
  **php artisan route:clear**
  // rm /bootstrap/cache/routes-v7.php

GET - tylko pobranie danych z serwera, nie powinno nic się zmienić  
POST - dodanie obiektu  
PUT aktualizacja całego obiekt  
PATCH - aktualizacja część pól (jednego/więcej)  
DELETE - usuwanie obierktu  
OPTIONS - zwraca opcje powiazane z danym URLem - ZASOBEM  

**arrow function** funkcje styrzałkowe, od 7.4 PHP

    fn() => 'returnuję arrow return';

    function func(){
      return 'test'
    }

Route::match( ... ); **definiuje co się ma stać dla kilku metod, np. post i get**
Route::any('/all', []); dopuszczamy wszystkie metody na Endpoincie

tylko widok:

    Route::view('/view', 'start.index');
    // jeden widok przyjmuje tylko 3 parametry
    Route::view('/view', 'route.view', [
        'parametr' => 'wartosc',
    ]);

**route::view to shortcut ;-)**

**OPCJONALNY PARAMETR W ENDPOINCIE → ?**
users/{id?}
CHAIN routinguv - walidacja nicka, tylko małe litery, min. jeden znak (plus)

    route::get('/user/{nick}/{id}/', ... )->where([
        'nick' => '[a-z]+',
        'id' => '[0-9]'
    ]);
    → error 404 gdy: /user/Woj

**ROUTE NAME**
web.php: routom możemy nadawać nazwy CHAINEM: ->name('shop.items');
i w widoku: route('shop.name') wyświetylać,
_pięklnie z http:// ..._

- co kiedy linkowanie nam się zmienia? z items na elements?
- można je używać w akcjach, domknięciuach
- można wygenerować maopę strony
- link w mailu
- zestaw linków do raportu..

### The Header

blade: **url('users')** jednak na sztywno..

web.php: $url = route('shop.item.single, ['id' => 22, 'data' => 'aaa'])
url: item/id/22/data/aaa
web.php: framework jest mądry i może zamienić parametr na int
/users/{id}/{title}
function show(int $id, string $title){ .. }

**EAN - unikalmny numer produktu ;-) SKU**

## Controller

php artisan make:controller User/AddressController --invokable  
php artisan make:controller User/AddressController --resource  

**api:**  
php artisan make:controller Api/UserController --api
api.php:  
Route::apiResource('/games', )
nie ma formularza, request tylko przyjmuje dane i nie generuje widoków  
API skonsumuje request  

php artisan make:controller User/AddressController -i  
php artisan make:controller User/ProfilController  

php artisan make:controller UserController --resource  
Route::resource('/user', UserController::class);
php artisan route:list
php artisan route:list --name=user

// --invokable, -i
// Grupowanie kontrollerów, subfolder
// CRUD --resource

// ograniczenie akcji w urlu

    Route::resource('/contact', ContactController::class)->only([
      'index', 'show'
    ]);

FILTERED API LIST:

1._Single Action Controller


    Route::get('/users/{id}/address', ShowAddressController::class);
    class ShowAddressController extends Controller
    {
      public function \_\_invoke(){
        return 'address';
      }
    }

2. Resource Controller
3. Api Resource Controller

Route::serviceProvider, konfiguracja dla rouritngu; namespacy;
$namespace = AppHttp\Controllers
więc w web.php podajemy tylko nazwę kontrolera

**REGUŁY WALIDACJI DLA ATRYBUTÓW**
web.php
->where('id', '<', 100)
->where('id', '[0-9]+')
->name(get.users.address)

**API**
przez requesty Ajaxowe z naszej strony
poprzez aplikacje mobilne
podbijać do odpowiedniego urla i coś tworzyć
i zwracać JSON / XML

RESOURECES → only

    Route::resource('/contact', ContactController::class)->only([
      'index', 'show'
    ]);

## REQUEST
    public function testRequest(Request $request, int $id) { ...*
    $input = $request->input();
    $query = $request->query();


Akcje użytkownika: kliknięcie w link, przesłanie formularz, pobranie danych przez Ajax, użytkownik przesyła dane ud Usera na serwer
i framework opakwuje to dane obiektem Request

- np. query parameters (GET)
- POST parameters
- cookies, nagłówki
  LaravelToolbar → Request  
Dab: get, post, cookisy, dane na temat serwera i te wszytskie dane sa opakowane obiektem Request i przez obiek request możemy do nich się dostać.
Request to kontener na dane ktróre otrzymujemy razem z żadaniem od użytkownika, pobieramy dane i wykorzystujemy je dalej do Logiki Biznesowej

wstrzykiwanie requestu:

    use Illuminate\Http\Request;
    public function (Request $request) { ... }

    class Request extends SymfonyRequest implements Arrayable, ArrayAccess

/testRequest/{id}  
wielka litera ma znaczenie  
kolejność parametrów ma znaczenie  

**http://127.0.0.1:8000/testRequest/1?foo=bar**


**$url = $request->path();** // "testRequest/1"  
**$uri = $request->url();**  // "http://127.0.0.1:8000/testRequest/1"  
**$fullUrl = $request->fullUrl();** // "http://127.0.0.1:8000/testRequest/1?foo=bar"  
dump($url, $uri, $fullUrl);  

**$httpMethod = $request->method();**
dump($httpMethod); // GET

// true / false
if ($request->isMethod('get')) { ... }

**input()** - gdy nie ma znaczenia czy użytkownik użył GEST POST czy PUT
(wcześniej powinna byc walidacja)  
**$name = $request->input('name');** // null gdy nie ma pola i woj  
**$name = $request->input('name', 'Kowaliski');** // watość domyślna  
**$name = $request->input('name.1');** // przesyłamy tablicę parametrów i to jest element tablicy o indexie 1. Tablice mogą być wielowymiarowe  

$request->isMethod('post') // w kontrolerze.. i w web.php ;-)  
w web ktoś może zrobić: Route::any( ... ) i kwas ;-)  

wszystkie dane:
http://127.0.0.1:8000/testRequest/1?name=woj&nic=boss

    **$request->all();**
    array:2 [▼
      "name" => "woj"
      "nic" => "boss"
    ];

all() zwraca wszystkie elemnty formularza POST  
all() zwraca także informacje o plikach, które POST wysyła na server  

query() - query parameters() - pobranie wszystkich parametrów z URLa, GET  
**$allQuery = $request->query();**  
**$name = $request->query('name');**  
**$name = $request->query('name', 'Wartość_domyślna);**  
W URLu dostajemy stringa. Konwertujemy ją na boolean:

?name=woj&expire=true  
**$expierd = $request->boolean('expierd);**  
$expierd // true, false; "aaa', 2 - konwertowane na false  
1, true  

czy wartość zotała przesłana?
**$hasName = $request->has('name');**
$hasname: true/false

    $hasParams = $request->has(['name', 'nick']); czy request ma 2 parametry  
    $hasParams = $request->hasAby(['name', 'nick']); czy request ma któryś z 2 parametrów  

cookie  

    $cookie =$request->cookie('my_cookie');  

## RESPONSE

ODPOWIEDŹ SERWERA do użytkownika  
USER -metoda HTTP - Framweork - opakowujemy w Request, Wpada do kontrollera i przelatuje przez midlleware, LOGIKA i Wraca RESPONSE:  

- text
- html
- xml
- json
- przekierowanie
- plik  

To wszystko jest response. Larva opakowuje to niejawnie w obiekt Response i procesuje go do widoku Blade i zostanie tam wyrenderowany

    // reposme object
    return response(
      "content <h3>html jakiś $id</h3>",
      200,
      ['Content-Type' => 'text/plain]
    );

    // chain (builder)
    // budujemy obiek poprzez wywoływanie jakiś metod
    return response("<p>some text $id</p>")
      ->setStatusCode(200)
      ->header('Content-Type', 'text-html')
      ->header('Own-Header', 'Laravel')
      ->cookie('my_best_cookie', 'brownie', 10)
      // browni - wartość zostanie zakodowana przez Laravela, dla bezpieczeństwa,
      // tak by user nie mógł kombinowac z warotściamy tych ciasteczek 
      // with cookie
    return response();

REDIRECT  
strona wymaga zalogowania a user jest niezalogowany, przekierowanie na login i z powrotem na zasób  
404 albo redirect na reklamę: tego produktu nie ma w sklepie ale jest taki..

    return redirect('/users');  
    return redirect('/fgdhdfgh'); // i dostanimiey 404 ;)  
    return redirect->route('get.users');  
    return redirect->route('get.users.address', ['id' => $id]);  

    // przekierowanie do akcji w kontrolerze, z paramewrteem lub bez
    use App\Http\Controllers\HomeController;
    return redirect()->action([HomeController::class, 'index']);
    return redirect()->action(
        [UserController::class, 'profile'], ['id' => 1]
    );

RESPONSE   
-zwracanie widoku, wywołujemy funkcje reposnse, która zwróci nam obiekt Response
i na nim wywołujemy metodię view

    return response()
      ->view('user.profile, ['id' => $id], 200)
      ->header('Content-Type', 'text/html')
      ->header('Content-Type', 'text/plain') // brak parsowania - renderoeania tekty jako html. zostaną wyświetlnne tagi html tekstem

JSON  
mamy metodę wywoływaną na obiekcie Response
funkcja response zwraca obiekt Response i wykonujemy na nij jakieś akcje

    return response->json(['id' => $id]);

## VIEW

ślemy JSONA przez API i mamy Reacta z przodu, XML ew.

Blade:

- dziedziczenie szablonów: **extends, section, yield, include**
- można używać php
- cachowane na produkcji - tam powinny być skesznowane szablony
- eskejpowanie jest domyślne, jak nie - musimy się mocno zastanowić, czy jestemy w stanie zaufać tym danym?

**@include('site_elements.form-input)**
szablon includowany ma dostępo do wszystkich zmiennych rodziaca
lepiej jest/dobrze jest przekazywać dane
**@include('site_elements.form-input, ['userData' => $user])**
@php
  natywny kod php, $j++;
@endphp 
sherowwanie / współdzielenie zmiennych widokowych:
, które są wspólne dla wszystkich widoków
AppServiceProvider
use Illuminate\Support\Facades\View;

public function boot()
{
view()->share('klucz_a_app_service_provider', 'wartość widoczna w szablonach');
View::share('klucz_z_fasady', 'klucz z fasady');

}
**można ją nadpisać zmiewnną z pozopmu akcji o tej samej nazwie**

KOMPILACJA
dev: kompilowanie szablonu ma znaczenia
na prodzie: szablony powinny być skeszowane PERFORMANCE
**php artisan view:cache**
CI
recznie
Pipeliny..
należy odpalić komendę
**php artisan view:cache**
/storage/framework/views/ ...
spaghetti..
wyczyszczenie cacha:
**php artisan view:clear**

@show = @endsection + @yield

@section('title', 'ho')
@yield('title') → jednolinijkowy: @section('title', 'ho')

**PARENT**
sekcja z dziecka nadpisuje sekcje rodzica
podobnie jak metody/kontroktory w klasach
w php:
::parent
blade:
@parent

wstrzykiwanie: {{ $zmienna }} DWA NAWIASY ZAPOBIEGAJĄ XSS
JS I CSS
$zmienna = <b>aaa</b>

{!! bez escejpowania !!} :( :(
<script>alert('wykladniecie cieasteczek, podszycie się pod użytkownika)</script>

@if ($user->wiek > 33)
...
@elseifu
    mmm
@else
  ccc
@endif

@isset($name)
  ...
@endisset

@auth
  jesteśmy zalogowani, po autoryzacji
@endauth

@guest
  użytkownik nie jest zalogowany, przeciwieństwo auth
@endguest

->name('get.user.show');
;-)
<a href="{{ 
  route('get.user.show', [
    'userId' => $user->id
  ]) 
}}"></a>
https://laravel.com/docs/8.x/blade
Loop Variable

@for($i = 0; count($users); $i++)
  {{ $user->name }} <br>
  @if($i == 1)
    @continue
  @endif

  // kró→cej:
  @continue($i == 4)
  @break($i == 4)

  @if($i == 4)
    @break
  @endif

@endfor

@foreach
  @if ($loop->firs)
    <p>first ;-)</p>
  @endif
  @if ($loop->last)
    <p>first ;-)</p>
  @endif
  {{ $user->name }} <br>
@endforeach


@forelse($users as $user)
  {{ $user->name }} <br>
@empty
  <p>empty</p>
@endforelse


{{ $j = 0 }}
@while ($j < count($users))
  {{ $j++ }}
@endwhile


@each('view.name', $jobs, 'job')
each - działa troszeczkę jak array_map:
przechodzi po wszytkich elementach kolekcji, przyjmuje argumenty
- nazwę renderowanego szablony 
- $jobs - kolelkcja po której irerujemy
- nazwa zmiennej
działa jak forelse, jest skumulowane do jednej lini.. czy jest to bardzei czytelne.. wątpię

**switch - składnia to nie jest RocketSince**
@switch($i)
    @case(1)
        First case...
        @break

    @case(2)
        Second case...
        @break

    @default
        Default case...
@endswitch

Laravel mix
**webpack.mix.js**

Laravelowa nakładka na Webpacka
Webpack - pozwala połczącyć wiele plików w jeden plik
→ performance: trwa dłużej, obciąża bardziej serwer
jeden request, nawiązanie połączenia tylko raz
→ kompilaca do ES5, EcmaScriopt5

scss
- zmienne 
- zagnieżdżanie
- skomplikowane selectory
- funkcje (calc(), lighteen(), dark())

**npm run dev** - na serwerach developerskich
**npm run production** - zapis bardzoej zwięzły, na serwerach produkcyjnych
> i przez ftp ... na produkcję
**npm run watch**

<script src="{{ mix('/js/app.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>

*Wielu programistów dodaje do swoich skompilowanych zasobów sygnaturę czasową lub unikalny token, aby zmusić przeglądarki do załadowania nowych zasobów zamiast udostępniania starych kopii kodu. Mix może to automatycznie obsłużyć za pomocą versionmetody.*

mix.js('resources/...', 'public..')
  .sass(''resources/...', 'public..'')
  .sass(''resources/sass/admin.scss', 'public/css/admin')
  .less('resources/...', 'public..')
  .styles([
    'resources/...', 'public..',
    'resources/...', 'public..'
    ''resources/...', 'public..'
  ], 'public/css/css.css')
  **version()**
;
// lepiej: dodajmy tokeny tylko na produkcji
if (mix.inProduction()) {
  mix.version();
}

WERSJONOWANIE:  **version()**
timestamp(), token - dodanie do pliku nazwy by pobrac zasze świeże pliki CSS/JS



**CI/CD = AUTOMATYCZNY DIPLOY**
CI/CD -dożucenie tej komendy do pipeline
PipleLine** - zbiór KOMND / kroków które trzeba wykonać aby kod dostał się na SERWER (produkcje)
Sytem do deployu bierze kod z repo
automatycznie odpala
- composer update
- composer install
- uruchamia testy
- npm run prod
i automatycznie diplojuje i wrzuca kod na serwer


**BROWSER SYNC**
automacztycznie przeładowanie zmian 
- kody frontu
- kodu php 

mix.browserSync('127.0.0.1:8000');



## Konfiguracja
**env ustala jakiś DevOps i zwykły developer na produkcji go nie dotyka**
**.env do .gitignore**

3 środowiska
prod / test / dev
production / stageging / local

1. konfiguracja
czytelne nazewnicto, notacja klucz - wartość, pogrupowana;
cache:
/config/cache.php
2. zmienne środowiskowe
.env
odczytujemy je za poimocą funkcji env*()
env() używamy tylko w katalogu config, 
  poza tym katalogiem (modle, providery, kontrollery: config())
  **najlepiej jest ją wstrzykiwać**
  → pliki konfiguracyjne są cachowane: konkatenuje pliki env w jeden du≥zy i zapisuje w configu
  → jeden punk wejśc ia
aplikacja na produkcji jest na innym środowkiku niż developerska..
inne dostępy do BD → różne Bazy Danych
lokalnie zmieniamy strukturę BD - co.. produkcja nam nie działa?

dev:
- na nim się developuje, rozwija bazę danych
- wyłaczony cache
- jawne printowanie błędów gdy nie chcemy za każdym razem grzebać w logach

MOJA KONFIGURACJA:
a. w pliku en.
b. nowy plik /config/mojakonfiguracja.php
    return [
      'aaa' => 121,
    ];
c. w kontrolerze $zminna = config('mojakonfiguracja.aaa);\

- toolbar Laravelowy (debugbar;)) 
- własna baza danych: testy wpływają nam na dane, które są na prodzie

na:
- Vagrancie
- Dockerze

prod: 
  - budowanie assetów (minifikacja, łączenie)
  - wyłaczenie profilerów (npdeveloper toolbar)
  - własny cache
  - wyłączenie printowania błędów
  - własna baza danych
  - api PeyPala w wersji testowej 
    → płatności opłacone
    → panel PayPall oþłacone

**dd(config());**
kluczami będa nazwy plików z katalogu test
konfiguracja sekcji:
#config = dd(config('app.name.coklowiek));

## Sesje
- dostęp poprzez helper session(), funkcja globalna, zaśmiecamy kontekst
- dostęp przez obiekt request; można wstrzykiwać, łatwo zmckować
- Requesty nie mogą zawierać informacji o sobie

HTTP(s): protokół; za każdym razem po zalogowaniu i tak nie ma o tym inf w Requeście, 
stan aplikacji nie jest przekazywany.
- Sesja jwst uruchamiana po stronie serwera
- pu inicjowaniu sesji generowany jesk Klucz sesji i zapisywany w Ciasteczku
za każdym razem przeglądarka wysyła ciasieteczko do serwera
- i serwer potrafi zweryfikować po ID że ktoś np był zlgogowany, więc jestw stanie idtworzyć stan aplikacji

sesje moga storygować dane w bazie danych

public function index () {
$session->put('prevAction', __METHOD__ . ' : ' . time());

public function show () {
$prevAction = $request->session()->get('prevAction', 'default');

$request->session()->put('test', null);
dump($request->session()->has('test')); // false
dump($request->session()->exists('test')); // true

$request->session()->forget('test')); // usuwa dany klucz razem z wartością sesji

$request->session()->flush(); // usunięcie zmiennych sesyjnych

helper session
$prevAction = session('prevAction');
dd($teprevActionst);

PROBLEMY:
session() to funkcja globalna, dostępna wszęszie - problemy z mockowaniem i z testami, zaśmiecamy kontekst

uzywajmy session przez Request, wstrzykujmy tam dane, bo one żyja tylko w jednym requeście




## Baza_Danych
- PDO, mysqli
- konfiguracja, używeanie BD, wykonywanie zapytań
- migracje, Query Builder
- seeding - automatyczne wypełnianie BD przykładowymi danymi
- Eloqient: ORM

**Redis:**
ciężkie zapytania do bd można cachwać, i podbijać do redisa
casche trxeba invalidować
szybki storage ktróry działa na zasadzie klusz czwertość
nazwa_tabeli - wiersz_który_chcemy_pobrać
do wyciągania danych z R nie używamy sqla

**sqlite**
baza danych plikowa
nie trzeba nic instalować na lokalnej maszynie. serwera bazodanowy (mysql, postres)
wydajność pliku jest niższa niż mysql/postgres 

wikiepdia używa mysqla

php artisan tinker;
\DB::connection()->getPdo();

lub w kontrollerze
$db = \DB::connection()->getPdo();
dd($db);

MIGRACJE
Pipeline
CI/CD
→ migracja na produkcji

można porównać do gita; tam tworzysz repo do ktorego wgrywamy kolejne werjsie kodu i ten kod wersjpnuje
tworzy wersje
można się przełączać pomiędzy wersjami; można rozwijać starsze wersje
dzięki temu można śledzić rozwój aplikacji i współdzielić kod między 

migracje rozwiązują problem wersjonowania bazy danych
- dodanie nowej tabeli/kolumny
tworzysz encje
kod ląduje na gicie
kolega zaciąga zmiany, ale nie ma zmiany w bd - próbuje odczytać dane z kolumny która nie istnije
powstała wersja która nie jest rozpropagowana. Migracje - kod który zaciągamy
każda zmiana struktury BD jest zapisana w pliku migracji
i odoalamy polecenie artidanowe:
**git pull**
**php artisan migrate**
**php artisan migrate:rollback**
**php artisan migrate:status**
notacja snake_case, a klasa to CamelCase
**php artisan make:migration create_games_table**
**php artisan migrate:status**
batch (partia. wsad)
rollback rollbakuje tabele w kolejności od nowiększej liczby w kolumnie batch, tabele z taką samą liczbą

każda zmiana bd jest zapisana w pliku poprzez specjal;ną phpową składnię
jest wersjonowana

mamy sqlite ale chcemy mysql
public function up()
{
    // Schema::create('games', function (Blueprint $table) {
    Schema::connection('mysql')->create('games', function (Blueprint $table) {
    });
  
    Schema::rename('games', 'gamesssss');

    if(Schema::hasTable('games')){
        // wykonaj jakąś logikę
    }


public function down()
{
    Schema::dropIfExists('games'); // better
    <!-- Schema::drop('games'); -->

$table->string('title', 100)
    ->nullable() // ta kolumna może posiadać wartość null
    ->charset(utf8mb4); // po co ?
    ->unsigned() // ? w kontekście tringa nie ma sensu


**git commit -m "..."**
**git push**
zmiana?
**php artisan make:migration alter_games_table**

make ;-)
php artisan make:command
php artisan make:controller
php artisan make:factory
php artisan make:mail
php artisan make:migration
php artisan make:seeder
php artisan make:test

**session storage z sessji do database ?**
;)
automatyczne tworzenie tabeli
**php artisan session:table**
php artisan migrate:status;
php srtisan migrate;
from
SESSION_DRIVER=file
to 
SESSION_DRIVER=database

PRZETRZYMYWANIE sessji w BD jest szybsze niż w pliku
a najszybsze będą pamięciowe: MameCache, Redis

Seed & Query Builder - tu wkładanie danych do bazy

QueryBuider
Select → where (+updaty i dility)
Implementacjia Akcji i widoków

php artisan make:migration create_genres_table
php artisan make:migration alter_game_table
php artisan migrate

w kontrollerze
// wyczyszczenie bazy danych, resetuje PrimaryKey; przywrscs tabelę do stanu po migracji
DB::table('genres')->truncate();
// uzuwa zawartość tabeli, ale nie usuwa klucza głównego
// DB::table('genres')->delete();

Laravel's database query builder provides a convenient, fluent interface to creating and running database queries. It can be used to perform most database operations in your application and works perfectly with all of Laravel's supported database systems.

The Laravel query builder uses PDO parameter binding to protect your application against SQL injection attacks. There is no need to clean or sanitize strings passed to the query builder as query bindings.

public function index()
{
    $users = DB::table('users')->get();



$id = DB::table('genres')->insertGetId(
    [
        'name' => 'woj3',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ]
);

dd($id);

**SEEDERS**
→ konwencja: w jednym Seederze dane odpoweidzialne za jedną tabel UserSeeder
a. użyteczne: ktoś to raz napisał i każdy może z tego korzystać
b. dane toestowe na poczet Testów Automatycznych (lub ręcznych), ciężko by było, gdy budujemy śropdowisko testowe ręcznie wrzucać jakieś dane.
automatyczne uzupełnianie BD 
c. tawianie nowego środowiska
d. w BD jest za dużo śmieci lokalnie - czyścimy ją i odpalamy Seedery

**php artisan make:seeder GenresSeeder**
seedy uruchamia się przez Głowny Seeder, Rodzic
i tam się rejetruje seedy
$this->call(GenresSeeder::class);

php artisan db:seed

Decyzja:
czy seedy uruchamiamy tylko raz, podczas inicjalizacji?

Czy podczas development?
Czy czyścimy tabelę za każdym razem ?

pojedyńczy seed
najlepiej robić to w jedną 
**php artisan db:seed --class=GamesSedder** 

optymalizacja:
a. pętla w pętli
skrypty do importu - do zaakcepowania
a. pętla w pętli
w obsłudze requestu od użytkownika: nie generowanie ciężkich operacji, i wydłuża to czas odpowiedzi użytkownikowi

1. wygenerowanie arrajki 1000 elementów
\i wsadzenie ich w seedzie w jednym połączeniu
a nie 1000 połączeń z bazą danych


ZMIANY W BAZIE DANYCH 
NIE MODYFIKUJEMY PLIKÓW Z MIGRACJAMI
**TYLKO TWORZYMY NOWE**

## SQL

**JOIN **
Lefr: jakby zapytanie w jednej lini
AS - czy wszystkie wyciągane wartości maią aliasy?
.PREFIX wszystkie wyciągane wartości mają prefixowaną tabelę

**Bulider/Chain**: za każdym razem metoda zwraca instancę (returnuje this) i dzięki temu możemy wykonywać kolejną metodę

**Kolekcja**: obiekt w php który posiada zbbiór danych po których możemy iterować. Tablica;)

**Klucz obcy** trzyma referencje/wskazuje na klucz główny w innej tabeli
Klucz główny jednoznacznie identyfikuje wiersz w tabeli

$game = new Game();
$game = (array) $game; → zrzutowanie obiektu game na tablicę game

**Fubnkcje agregujące**: to nie statystyki, ale na zbiorze danych wykonują pewną funkcję - agregują dane i zwracają ostateczną wartość

**Having**
tak jakby where, operuje na wynikach, ale po zgrupowaniu

## Query_Builder
za każdym razem zwracane jest THIS dlatego można robić PIPELINE
ostania metoda to GET() - gdzie następuje egzekucja zapytania


dd($bestGames->toJson());

dd($bestGames->toSql());
*select "games"."id", "games"."title", "games"."score", "genres"."name" as "genre_name", "genres"."id" as "genre_id" from "games" inner join "genres" on "games"."genre_id" = "genres"."id" where "score" > ? ◀"*
**?**
to sql działa przed zbindowaniem danych z zapytania
więc tam wejdzie bindowanie danych z Escapowaniem

Eloquent:
nie parsowanie sqla:
DB::raw();

$groupByStats = DB::table('games')
    ->select(
        DB::raw('count(*) as count'), 
        'score')
    ->whereBetween('score', [98,100])
    ->groupBy('score')
    ->orderByDesc('score')
    ->get()
;
dd($groupByStats);

**orderujemy po funkcji agregującej która jest aliasem, właściwie to po aliasie**
**sprawdzamy sqlkę komentyjąc get() i używając 

$groupByStats = DB::table('games')
    ->select(
        DB::raw('count(*) as count'), 
        'score')
    ->whereBetween('score', [90,100])
    ->having('score', '>', 95)
    ->groupBy('score')
    ->orderByDesc('score')
    ->orderBy('count', 'asc')
    // ->get()
;
dd($groupByStats->toSql());

**PAGINACJA**
artisan wygeneruje w widokach (resources/view) kilka widoków które można zaimplementować
https://laravel.com/docs/8.x/pagination#using-bootstrap
php artisan vendor:publish --tag=laravel-pagination


## Eloquent
Object Relational Maping, 
**mapowanie - proces mapowania czyli odwsorowania czegoś na coś**
obiekty na strukturę BD
struktórę BD na obiekty
W DWIE  STRONY
**WIERSZ Z RELACYJNEJ BAZY DABYCH Z RELACJAMI NA OBIEKT**

**przekazanie modeli eloquentowych do widoku - bardzo ostrożnie**
**aby nie wytrigerować sobie JAKIEJŚ PĘTLI ZAPYTAŃ DO BAZY DANYCH**

Blog: Wpis
może mieć wiele komentarzy, jeden do wielu
Komentarz: relacja jeden do jednego
Operacje na danych
Relacje
Blog ma tytuł i jest unikalny
Biblioteka: Książka ma tytuł i nie jest unikalna 0- wiele wydan tej samej ksiązki

Laravel: Eloquent implementuje wzorzec ActiveRecord
RÓŻNICA
Doctrine: implementuje  Wzorzec DataMapper
Doctrine może działać niezależnie od Symfony
Biblioteka Artisan nie. Musi być powiązana z laravelem 

Eloquent
+ mapowanie
+ automatyczność 
+ łatwość wyjmowania obiektu i relacji (na metodach)
+ nie musimy znać sqla
+ Es-kej-powanie danych, zwalnia ze znajomości SQL
**SQL: inserty, updajty, dility, indeksy, tabela i relacje**
+ database agnostic,
+ migracje - zmienianie BD
ZMIANA STRUKTURY BD: 
w większości przypadków zmiana schematu przekłada się na zmianę modelu
- w klasie Autor można zmenić alias na nową nazwę kolumny, dzięki temu nie trzeba zmieniać implementacji w kodzie
- lub w całym kodzie zmienić nazwę zmiennej

nauka Eloquenta
narzut wydajnościowy: proces mapowania* zajmuje
czas, pamić i zasoby
*MAPOWANIE czyli budowania obiektów z relacjami*
przetwarzanie setek tysięcy/miliony rekordów:
- użycie zwykłych zapytań (wyciągamy tylko to co potrzebyjemy)
- **użycie quweryBuildera do mapowania danych**
SYSTEMY DO RAPORTÓW: SUROWE ZAPYTANIA
NAJLEPIEJ TO ZBENCHMARKOWAĆ NA DUŻEJ ILOŚCI DANYCH (ILOŚCI KTÓRE B EDZXIEMY PRZETWARZAĆ)

PROSTE ZAPYTANIA:
- wyciągnij dane na podstawie id
- prostych qerów
- połącz w relacje z inną tabelą
SKOMPLIKOWANE ZAPYTANIA:
- wiele joinów
- innerjonów
- selecty
- wiele whereów, skomplikowane warunki
- agregacje

**developer toolbar bardzo pomaga**
**znajomość sqla jest na plus - łatwość weryfikacji zapytania które wygenerował Eloquent**

ACTIVE RECORD
łamie S z SOLIDA
1. jednocześmie operujemy na danych
2. obiekt na którym opwerujemy ma w sobie zaszytą logikę do zapisu tych danych (kontakt z bazą danych: updejty, inserty, zapisywanie)

Doctrine: DataMapper: separacja operowania na danych od zapisu/aktualizacji danych

Eloquent
Możemy używać QueryBuildera

MODEL
klasa modelu odpowiada danych z jednej tabeli

PROJEKTOWANIE:
nie od strony bazy danych
ROZWIJANIE/PROJEKTOWANIE
zacynamy od strony biznesowej
→ analiza problemów jakie aplikacja ma rozwiązać
→ czyli od strony domeny
  dopiero gdy mamy obiekty (książki, relacje, autorzy)
póżniej robimy tabelę i odpowiednie relacje

**storage, przechowywanie danych to problem nad którym musimy się zmierzyć na późniejszym etapie**
BD nie jest wyznacznikiem jak mają wyglądać kalsy naszych modeli (nasza aplikacja)
TO nasze modele są wyznacznikiem tego jak będzie skonstruowana nasza baza danych

Klasa Model daje dostęp do BD,
domyślną wł modelu jest to że zmienia nazwę klasy ma liczbę mnogą 
PLURALIZUJE
Game → games
User → users

Query Bulider
zwraca **obiekt std class**, zawiera w sobie tylko dane
zwraca więc **surowe dane**
tak jak ręcznie generujemy zapytanie i decydujemy jakie joiny, whery.. Eloquent->magia

Eloquent
zwraca obiekt modelu
zawiera dane i zachowania
oraz relacje
Poprzez Model możemy dobrać się także do buildera

// Genre::all();
// $games = Game::all();
// $games = Game::select('*')
//     ->orderByDesc('score')
//     ->paginate(10);
    // ->simplePaginate(10);

**TOOLBAR**
1. MONITORUJEMY JAKIE ZAPYTANIA IDĄ DO BD
2. CZAS 
3. EAGER LOADING: with('nazwa_relacji)

// eager loading: with - nazwe relacji które chcemy pobrać„
// $games = Game::with(['genre', 'movie.author', 'kilka_relacji', 'publisher'])
// $game->autor->email
// dociągniecie relacji autor która jest zdefiniowana w movie

// pobranie od razu, ZACHŁANNIE: noracja kropkowa; odwołujemy się di relacji; pobieramy adres email autora gry

REFACTOR
przeglądanie TOOLBARA i sprawdzać czy ś zduplikowane zapytania

// ta relacja jest niepotrzebna
// nadmiar zdefiniowanych relacji zaśmieca aplikację©
// a z bisnesowego punku widzenia nie jest potrzebna
// nie potrzebujemy 2-stronnych relacji
// jeśli będzxiemy potrzebować - wtedy jej użyjemy

**LOCAL SCOPE**
tylko w klasie modelu np Game
obiekt builder, do filtrowania zapytań i przenoszenia Logiki z kontrollera
do modelu
→ reużywalność
**GLOBAL SCOPE - jakaś funkcjonalność bez kontekttu którą moząn wstrzyknać;)**
*w sumie dołączyć przez statyczną metodę booted*
**można porównać go do Traitów (z phpa), za pomocą use.. można w nich korzystać**
global scope można wstrzyknąć do modelu, 
minus - każdy model który korzysta z GlobalScopu musi miec kolumnę zapidaną w global soupie
a przy migracji zmienai się model, ale nazwa kolumny jest HARDKODOWANA W SCOPIE 
trzeva to robić ręcznie – zmieniać kolumnę – i o tym pamiętać
zbyt duża ilość globalnych scopów robi zamieszanie i trudno będzie nam debugować cokolwiek

scope operuje na modelu, więc wrzucimy go do klasy związanej z modelami
nadpisanie w modelu statycznej metodu booted() - i wstrzyknięcie jako argumenty instancji klasy
sprawia że każdy model może implementtować ten scope


FILLABLE
zabezpieczenie Laravela (w sumei Eloquenta) dotyczące głównie HTTP
np. mamy formularz,
ktoś może sppreparpwać request np. Postmanem
i ktoś mógłby zgadywać nowe klucze i tworzyć/edytować nowe treści
**np. admin => true/false**
**np. isAdmin => true/false**

## Middleware
Jak Laravel DZIAŁA POD SPODEM / POD MASKĄ
Co to jest 
jak się do tego dostać
Implementacja nowego middleware

Oprogramowanie pośredniczące

Request
Controller (wstępna weryfikacja)
BuisnessLogic - Model ale NIE STRZAŁ DO BD a.. Serwisy, złożenie zamówienia
  1. sorawdzenie dostępności
  2. wygenerowanie zamówienia
  3. podsumowani zamówienia
  4. itd
Controller
Response (view/json)

public function show(Game $game, Request $request): View
{

  **MIDLLEWARE - OWIJA KONTROLLER**
  **kontrollerów mamy dużo a akcji jesdzcze więcej**
  **wszyatko można wykonać w akcjach ALE**
  **MIDDLEWARE owija automatycznie każdy kontroller**
  **nieważne jaki kontroller będzie wykonany, KOD za pomocą jednego middlewara**
  **wykona się zawsze**
  **jaki flow się wykona**
  **jaka logika domenowa się wykona**
  → filtrowanie danych
  → analiza dancy
  → profiliwanie dancy
  → logowanie danych
  performance: czas startu, czas zakończenia, OBLICZA RÓŻNICĘ
  → można to wyciągnąć do helpera ale trzeba zapinać to w każdej akcji
  + nie zaśmiecami kontrollera tym co nie jest istotne
  → system do autoryzacji - czy dany użytkownik ma prawo do autoryzacji?
**middleware pośredniczy w przekazywaniu żądania od użytkownika do kontollera, od kontrollera do użytkownika**

  $isAjax = false;
  if ($request->ajax()){
    $isAjax = true;
  }
  Kontroller: działania na obiekcie request,
  Kontroller: CQRS, uruchomienie jakiejś szyny

    -----------------
    Logika Domenowa: 
  **SERWISY**
      wyciągnięcie danych na temat gry
      realizacja żądania użtkownika
    $game = Game::find($gameId);
    JAK EIDZIMY KONTROLLER OWIJA LOGIKĘ BIZNESOWĄ
    tu mogą pojawić się SERWISY ORAZ FABRYKI
    -----------------

    generowanie widoku dla użytkownika
  **MIDLLEWARE - OWIJA KONTROLLER**

    if(isAjax)
        return $game
    else
        return view('games.eloquent.show', compact('game'));
}

middlewary są jak cebula
są jak ogry
mają warstwy 
i każdy middleware może się na siebie nakładać


**php artisan make:middleware Login**

**

Formę tego można znaleźć w oprogramowaniu pośredniczącym Laravela.

https://webdevetc.com/blog/the-chain-of-responsibility-programming-design-pattern-explained-using-php/

**Wzorzec projektowy Pipeline** 
twór wzorzec, gdzie definiujemy kolejne kroki do wykonania
a każdy następny krok bazuje na wynikach dostarczonych z poprzedniego kroku

**Wzorzec projektowy Chain of Responsibility** 
zyskuje na popularności, ponieważ jest częścią standardu PSR-15 (HTTP Request Middleware). Oto krótki przegląd tego. Pozwala łączyć szereg akcji, które powinny być wykonywane w określonej kolejności. Bardzo często akcje te mają możliwość przerwania przetwarzania dalszych pozycji.

Łańcuch Odpowiedzialności korzysta z listy obiektów, będzie przez nie przechodził – chyba że jeden z nich zatrzyma „następny”.

W tym przykładzie, jeśli program obsługi chce zatrzymać dalsze akcje, zgłasza wyjątek. Jednak często robisz coś takiego jak return false i zatrzymałoby to dalsze przetwarzanie innych elementów w łańcuchu. Ale w tym przykładzie po prostu rzuciłem wyjątki.

Mógłbyś po prostu zakodować to wszystko w jednej dużej klasie (przechodząc przez dużą liczbę rzeczy do sprawdzenia / rzeczy do zrobienia). Jednak nie jest to zgodne z zasadami SOLID. Stosowanie wzorca łańcucha odpowiedzialności pozwala na przestrzeganie zasady otwarte/zamknięte i znacznie ułatwia jego rozbudowę w przyszłości.

## Logowanie_Rejestracja
Autentykacja - tym czy ktoś jest za kogo się podaje,  LOGIN, HASŁO
Autoryzacja - analizujemy uprawnienia w kontekścei zasobu;
czy ma uprawnienia do zoasobu, np. edycji posta,

laravel new nowy_projekt --auth
php artisan ui bootstrap --auth
npm install && npm run dev

config/auth.php
**gurardy**
mówią aplikacji w jaki sposób użytkownik jest autentykowany po każdym requeście.
- web: oparty na sessji i używa **providera** users do odtworzenia użytkownika
- api
**rovidery** w jaki sposów użytkownik jest odtwarzany po requeście


## RequestLifecycle
Jak Larva działa pod spodem?
Jak wygląda przepływ żądania od wygenerowania od użytkownika 
do wygenerowania odpoweidzi i zwrócenia jej użytkownikowi

1. User - HttpRequest wysyła na serwer
2. Serwer www: apacz; wywołuje index.pho
3. index.php: 
4. wczytuje composerowy autoload.php
5. bootstrap.php inicjalizuje się aplikacja $app 
  - konfiguruje error handling
  - wykrywa środowisko
  - zwraca instancję

5. KERNELL -------------------------------------
  - obiekt któryodpowiada za praktycznie całą obługę aplikacji
  - odpowiednio instancjuje naszą aplikację: 
    → konfigurowanie
      - np. rejestruje i uruchamia (bootuje) ServiCeProvidery
    → uruchomienie
    → obsługę requestu: Request do Routera, Router do odpowiednirj akcji
  - Rejestrowanie usług/modułów ServiceProwajderów
    → SP dostarczają, rejestrują i konfiguują moduły, np moduł do obsługi BD
    → moduł który my napiseszemy i zdefiniujemy dla niego SP
4. Request trafia do ROUTERa gdzie jest DISPATCHEROWANY
5. Proces żądania z ROUTERA przechodzi do kontrolera i akcji
6. Wykonuje się logika
7. Renderrowany jest widok
---------------------END KERNELL
8. Request jaki HTTP RESOINSE zwracany jest do użytkownika


## Service_Container
**Architektura - Kontener zależności (Service Container)**
- Dobre praktyki
- wydzielenie interfejsu
- zaimplementowanie wzorca repository

Miejsce w którym Laravel trzyma wszystkie informacje o serwisach które występuja w aplikacji i ich zależnościach

Serwis do logowania danych
ma interfejs info(), error(), warning()
ale ten serwis musi to zestorygoiwać:
- email (design)
- logowanie do pliku (plik w cloudzie)
- zapisanie do bd
konieczne jest wstrzyknięcie serwisu
DEPENDENCY INJECTION, WSTRZYKIWANIE ZALEŻNOŚCI do zapisu danych w pliku
jeden serwis wymaga drugiego serwisu

→ HARDKODOWANIE W KONSTRUKTORZE INSTANCJI SERWISU/KLASY *jawnie w kontruktorze tworzyło się obiekt* \
→ WSTRZYJKIWANIE KLASY \
→ WSTRZYKIWNAIE INTERFEJSU \
1. W KONSTRUKTORZE
2. W SETTERZE
3. w konkretnych metodach, np. injection DO AKCJI

Nie nkoniecznie trzeba się sugerować nazwą. 
Serwisy to klasy które kumulują jakiejś funkcjonalności
Modele też dosta
Wstrzykujemy GameRepository do GameControllera
więć GameController zależy od GameRepository
a GameRepository zależu od Modelu Game.

Czyli GameRepository jest zależnością obiektu Kontroller
Czyli Game (model) jest zależnością GameRepository
## Repozytorium 
SOLID
S
Controller 
nie ma wiedzieć **JAK** wyciągać dane z BD a 
**KIEDY WYCIĄGĄĆ DANE - wywołuje kontroller**

**THIN CONTROLLER FAT MODEL**
Kontroller staje się coraz bardziej przejżyty/chudy
Logika która dotyka biznesu przenoszona jest do Modelu, 
a Kontroller przyjmuje żądania od użytkownika i wie co ma wywołaź
a nie 
- gdzie są dane są storygowane
- jak wybrać dane
- jak skonstruować zaputanie?

Separacia LogikiBiznesowej od Logiki odpowiadającej za Zapis Danych
**Repozytorim - JAK WYCĄGAĆ DANE**
zakłada oddzielenie Aplikacji i Bazy Danych (tzn utrwalanie danych)
**ODDZIELENIE / SEPARACJA**
**LOGIKI BIZNESOWEJ**
**OD (LOGIKI ODPOWIEDZIALNEJ ZA ZAPIS DANYCH) – OD WARSTWY ZAPISU DANYCH**
PUCHNIĘCIE KONTROLLERÓW.. 
procesy zakupowe
rezerwacje terminów
DRY - wielkroteni poisanie kodu w kontrollerze

MVP, Prototyp, ProofOfConcept: ok, niech kontrollery puchną ? :( 


## Service_Provider
**php artisan make:provider GameServiceProvider**

Architektura - Dostawcy usług (Service Providers)
config/app.php -> providers
Dostarcza usługi które potem będzie można wykorzystywać
- moduł do logowania
- cała nasza aplikacja
- moduł do komunikacji z BD

SP: 
- rejestrowanie w Laravelu
- bootowanie
- okreslenie zależności (klass) które też znajdują się w konenerze
## Facades
Architektura - Fasady (Facades).
W śeiwcie PHPa Fasady są kontrowersyjne ;-) \
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
Log::alert('some alert');

Fasady jako klasy są dostarczane razem z instalacją
DB::
File::
Log::
Maill::


fasada to statyczny sposób na wywołanie klas dotępnych w kontenerze zależności \
→ to statyczne api dotępowe do klas które znajdują się w kontenerze
+ plus: nie musimy ich wstrzykiwac, możemy je używać
+ fasad nie trzeba wstzykiwać
+ czytelne nazewnictwo
+ fasady takie jakby helper do klas, do wywołania metody statycznej
+ działa wszędzie: w kontrollerzre, akcji, serwisie..

- minus: Laravelowe fasady nie są impementacją Wzorca Projektowego fasady
- trudności testowania: wszytkie metody powinny być DEPENDENCY INJECTION
- chętnie używamy → DUŻO ZALEZNOŚCI się tworzy, wysoki coupling, spaghetti code
klsy aplikacji zachowują się jak makaron - wyciągasz jedną a bierze się duuużo więcej

Unikanie Fasad
Lepiej wstrzykiwać Zależności
Najlepiej zostawiać je tylko w warstwie w której występują kotrollery i akcje, 
KATEGORYCZNIE NIE W SERWISACH, NIE W BIBLIOTEKACH. tam wstrzykiwanie zależności były czyste od kodu który niewiadomo skąd się pojawił.
Patrzę się na konstruktor i widzę jakie zależności pojawiają się w mojej klasie.


**DOBRE PRAKTYKI**
**KONTENER A FASADA**
1. Fasady tylko w kontrollerach i w akcjach, i telko wtedy gdy jest to uzasadnione.
Jeżeli możemy coś wstrzyknąć - wstrzykujmy.
Fasada to używanie obiektu który znajduje się w kontenerze
DepINJC to wstrzykiwanie obiektu który znajduje się w kontenerze

**Jak coś jest w konteberze to możemy to wstrzyknąć i użyć jako Fasadę**

2. W NASZYCH (pisanych) Serwisach zależności tylko przez DependencyInjection
3. Symfony: framweowerk oparty na Sependency Injection
4. Laravel: odchodzi się od promowania fasad na rzecz DepInjc
5. ServiceProvider: jak konfigurować SERWISY  i zależności w kontenerze

**ukrywanie implementacji za interfejse,**
1. tworzymy interfejs
2. im-lementacja interfejsu przez kontretne klasy
3. wstrzykiwanie klas implementujących interfejs

**DOBRE PRAKTYKI**
PRYWANTE → właściwości
metody 
PUBLICZNE
metody to interfejs
pozostałe, czyli jakby pompcnicze to interfejs

 * wiemy że Reposytorium zapewnia nam dostęp do danych które możemy
 * pobrać
 * zmodyfikować
 * usunąć
 * 
 * i jest to GameRepository
 * // $gameRepository->getBestNames()
 * nadmiarowość w nazwach...
$gameRepository->best()
należy być spójność per projekt


Łatwość implementacji jakiejś funkconalności przy użyciu fasad jest oszałamiająca
ale spada jakość kodu, dla małych projektów - bardzo ok.
Gdy aplikacja jest duża i jest dużo powiązań - wtedy to wyjdzie. Małe aplikacje - są ok.

**testowanie**
Fasady - testowanie - testujemy je jak klasy które są wstrzykiwane przez kontener zależności;
fasady poprzez swoje metody odwołują się do kontrollera zależności ;-)

## Generowanie adresów URL

**DYGRESJA - HELPLERY URL**
**nazwy akcji zmieniają się o wiele częściej niż nazwy routingu**
**url()**
STATYCZNE
$url url();
$url->currnet();
$url->full();
$url->previous();
url('/games/1?euery=parameters);

**route()**
DEFINIUJEMY W ROUTINGU
route('games.show', ['game' => $game->id, 'test' => 1] )

$actionUrl = action([GameController::class, 'link_do_akcji']);

## Komendy

Laravel Posiada własne CLI - ARTISAN
nie chemy korzystać z fejkera tylko z konkretnych gierr
**php artisan make:command LoadlistGames**
**php artisan make:command Steam/LoadListGames**

php artisan make:command Steam/UpdateGame


- komendy obługują DEPENDENCY INJECTION
- Kernel.php jest DEFAULTOWY w katalogu commands
- 

## Testy
ph.unit:
- rodzaje tesótw
- filtry: że pliki pho z katalogu app 
- zmienne środowiskowe nadopisują zmienne środowiskowe
- określenie bazy danych

1. testy jednostkowe (unit)
- tozsetowanie malych jednostek w IZOLOWANYM KONTEKŚCIE
- nie powodują budowania frameworka (serwisy, providery)

2. Testy funkcjonalne - Featurye - testują POJEDYŃCZE  funkcjonalności

