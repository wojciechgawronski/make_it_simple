<?php declare(strict_types=1);
/**
 *
 * SIMPLE FACTORY
 *
 * Wzorce kreacyjne/konstrukcyjne pozwalają uciec od słowa kluczowego new,
 *
 * Wprowadzają więc dodatkową warstwę złożoności *DODAKKOWA WARTSTWĘ ABSTRAKCJI*, aczkolwiek w pewnych sytuacjach
 * Ułatwiają proces tworzenia obiektów, dodają elastycznośc podczas tworzenia instancji, a co za tym idzie dają większą wszechstronność.
 *
 * Potrzebuję telewizora, to nie produkuję go sam, tylko biorę gotowy z fabryki i nie interesuje mnie jak on w rzeczywistości jest produkowany.
 *
 * SIMPLE FACTORY
 * generuje obiekt dla klienta (dla nas?) bez eksponowania logiki tworzenia obiektu;
 * Tutaj: zastosowanie statycznej metody z klasy fabryki do tworzenia nowego obiektu
 *
 * NIE INTERESUJE NAS NAWET JAKIEJ KLASY BĘDZIE OBIEKT (ani jej szczegóły implementacyjne), CHCĘ MIEĆ OBIEKT Z TEJ KONKRETNEJ FABRYKI
 *
 * Fabryka Samochodów zapewni gotowy samochód, muszę tylko wiedzieć jaka jest NAZWA METODY POTRZEBNEJ DO WYPRODUKOWANIA auta, (jest to więc prosta warstwa abstrakcji: mapa-teren) czy
 * > OBIEKTU BAZY DANYCH
 * > OBIEKTU POŁĄCZENIA Z ZEWNĘTRZNYM ZASOBEM
 * chcemy to, ale dostarczy nam to fabryka, nas nie zainteresuje szczegółowa implemantacja.
 */

abstract class Vehicle
{
    /**
     * @var string $name name of the vahicle
     */
    protected string $name;

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }
}

class Car extends Vehicle
{
    public function __construct(
        protected string $name,
    ) {
    }
}

/**
 * Do tej pory: Kod kliencki:
 */
$car = new Car('bmw');
echo $car->getName();

/**
 * FABRYKA
 */

class CarFactory
{
    public static function createCar(string $name)
    {
        return new Car($name);
    }
}

$car = CarFactory::createCar('audi');
echo "<br>";
echo $car->getName();
