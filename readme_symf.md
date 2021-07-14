**new**
symfony check:requirements
symfony new some_project --full
cd some_project
php bin/console --version
git status
git add .

git rm -r --cached <path_to_file>
git rm -r --cached . 
add .env to .gitignore

**old**
cd projects
git clone..
cd my_project
composer install
symfony server:start

**RemoveEntity**
rm Entity
rm Repository
rm Controller
rm View
composer dump-autoload

MAKER BOUNDLA
symfony console list make
**composer require --dev symfony/maker-bundle**
Symfony Maker helps you create empty commands, controllers, form classes, tests and more so you can forget about writing boilerplate code. 
**make:command            Creates a new console command class**
**make:controller         Creates a new controller class**
**make:entity             Creates a new Doctrine entity class**
[...]
**make:validator          Creates a new validator and constraint class**
**make:voter              Creates a new security voter class**
php bin/console make:controller --help

### Start
cd my_project

### Env
.env
APP_DEBUG=1

### Database
.env
php bin/console chache:clear
1. **php bin/console make:migration**
2. **php bin/console doctrine:migrations:migrate**
php bin/console doctrine:database:create
php bin/console doctrine:migrations:list
php bin/console doctrine:migrations:status
php bin/console doctrine:migrations:migrate 'DoctrineMigrations\Version20180605025653'


**MySQL**
mysql -V
sudo mysql -u root -p 
CREATE DATABASE some_db;
.env: DATABASE_URL
php bin/console doctrine:query:sql "SHOW DATABASES"
**SQLite**
.env: DATABASE_URL


### Routing
symfony console make:controller HomeController
***PHP8:**
#[Route('/home', name: 'home')]
**PHP7:**
/**
* @Route("/")
* @Route("/", name="home")
* @Route("/home", name="home")
* @Method({"GET", "HEAD"})
* @Route("/show/{id}", methods={"GET","HEAD"})
*/
**or routes.yaml:**
index:
    path: ["/", "/home"]
    controller: App\Controller\HomeController::index
    methods: GET
php bin/console debug:router
php bin/console router:match /lucky/number/8

### 404 Error page
composer require symfony/twig-pack


### Entity
php bin/console make:entity
**RELATION: ***field type: ? → relation: NIE user_id i integer tylko user*
**relation: ManyToOne; allow nullable: no; $user->getPhotos(): yes;**
php bin/console make:entity --overwrite
php bin/console make:user // create with Doctrine
php bin/console make:entity // create or update
**persists** przygotowanie do wrzucenia danej encji do BD
**flush** spłóczka, wrzucenie encji do BD

### Login
php bin/console make:auth
1 - Login form authenticator
controller name: SecurityController
/logout route - yes

### Fixtures
composer require orm-fixtures --dev
php bin/console make:fixtures
UserFixtures
rm src/DataFixtures/AppFixtures

UserPasswordEncoderInterface is DEPRECIATED, so..
**composer require symfony/password-hasher**

### Register
php bin/console make:registration-form
https://symfony.com/doc/current/form/form_themes.html
Applying Themes to Single Forms¶
{% form_theme nazwa_formularza 'bootstrap_5_layout.html.twig' %}
form

**dd()** - 
**dump()** - w widokach/twigu
