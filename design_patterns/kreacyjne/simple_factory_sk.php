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
 * generuje obiekt dla klienta bez eksponowania logiki tworzenia obiektu;
 * NIE INTERESUJE NAS JAKIEJ KLASY BĘDZIE OBIEKT, CHCĘ MIEĆ OBIEKT Z TEJ KONKRETNEJ FABRYKI
 *
 * Fabryka Samochodów zapewni gotowy samochód, muszę tylko wiedzieć jaka jest nazwa metody potrzebnej do wyprodukowania auta, czy
 * > OBIEKT BAZY DANYCH
 * > OBIEKT POŁĄCZENIA Z ZEWNĘTRZNYM ZASOBEM
 * chcemy to, ale dostarczy nam to fabryka, nas nie zainteresuje szczegółowa implemantacja
 */

abstract class Vehicle
{
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
 * Kod kliencki
 */
$car = new Car('bmw');
echo $car->getName();