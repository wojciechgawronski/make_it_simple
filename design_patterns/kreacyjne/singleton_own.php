<?php declare(strict_types=1);

/**
 * Class Singleton
 *
 * Obiektowa alternatywa dla Zmiennych Globalnych
 * (kolizja nazw, kolizja z zewnętrzynmi bibliotekami);
 * przstrzenie nazw niceo poprawiają sprawę - pozwalają na ograniczenie zasięgu widoczności zmienneych do pakietu/biblioteki;
 * Zmmienne Globalne wiążą klasę z kontekstem, sabotują hermetyzację i modularność - nie możmna przenieść klasy zależnej od Singletona i użyć jej w nnym kontekście bez prenoszenia Singletona.; tę właściwość wyłapią Testy Jdnostkowe)
 *
 * Singleton: kreacyjny wzorzec projektowy, gwarantujący istnienie tylko jednego obiekty jednego rodzaju.
 *
 * Ograniczenie tworzenia i obiektów klasy do jednej instancji
 * Zapewnienie globalnego dstępu do stworzonego obiektu.
 *
 * Założenia:
 * prywatny konstruktor
 * prywatna funkcja clone
 *
 */
final class PreferencesSingleton
{
    private array $params = [];
    /**
     * @var $instance jest statyczna i prwatna, nie można się odwoływac z poza klasy
     */
    private static $instance = null;

    private function __construct()
    {
    }

    public function setParam(string $key, string $value): void
    {
        $this->params[$key] = $value;
    }

    public function getParam(string $key) : string
    {
        return $this->params[$key];
    }

    public static function getInstance() : object
    {
        if (empty(self::$instance)) {
            self::$instance = new PreferencesSingleton();
        }
        return self::$instance;
    }

    /**
     * unserialize () sprawdza obecność funkcji  __wakeup ().
     * Jeśli jest obecna, ta funkcja może zrekonstruować dowolne zasoby, które może posiadać obiekt.
     */
    public function __wakeup(): void
    {
        throw new \Exception("Dontt unserialize a Singleton Pattern");
    }
}

var_dump(PreferencesSingleton::getInstance());
// PreferencesSingleton::setParam(['a' => 'wooj']); // error
// PreferencesSingleton
