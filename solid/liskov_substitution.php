<?php

/**
 * Liskov
 *
 * Obiekt danej klasy może być zastępowany obiektem klasy dziedziczącej.
 *
 * Funkcje które używają wskaźników lub referencji do klas bazowych
 * muszą być w stanie również używać obiektów klas dziedziczących po klasach bazowych
 * bez dokładnej znajomości tych obiektów.
 *
 * Obiekt danej klasy może być zastąpiony obiektem klasy dziedziczącej
 * Obiiekty możemy używać wymiennie, po stronie klienta mamy odwołąnia do pewnych metod, wykonujemy
 * jakieś tam operacje, i możemy zastępować obiekty klasy bazowej obiektami klasy dziedziczącej
 * i nawet nie musimy wiedzieć jaka jest klasa obiektu dziedziczącego - można je podstawiać zamiennie.
 *
 * Relacja jest is-a bywa myląca. Gdyż...
 * Nie zawsze relacje z realnego świata da się przełożyć na hierarchię klas.
 *
 *
 * PROBLEM
 * Rower nie ma silnika ale jest pojazdem.
 *
 */
class Vehicle
{
    public function __construct()
    {
        echo "jestem klasą: " . get_called_class() . "<br>";
    }

    public function turnOnEngine()
    {
        echo "Engine start<br>";
    }

    public function move()
    {
        echo "i move!<br>";
    }
}

class Bike extends Vehicle
{
}

// kod po stronie klienta
$bike = new Bike;
$bike->turnOnEngine();
$bike->move();

/**
 * więc pobawimy się trochę, pożonglujemy i stworzymy kilka klas
 * LOSKOV:
 */
class Vehicle_Liskov
{
    public function move()
    {
        echo "i move!<br>";
    }
}

class VehicleWithEngine extends Vehicle_Liskov
{
    public function __construct()
    {
        echo "jestem klasą: " . get_called_class() . "<br>";
    }

    public function turnOnEngine()
    {
        echo "Engine start<br>";
    }
}

class VehicleWithOutEngine extends Vehicle_Liskov
{
    public function __construct()
    {
        echo "jestem klasą: " . get_called_class() . "<br>";
    }
}

class Car extends VehicleWithEngine
{
}

class Bike2 extends VehicleWithOutEngine
{
}

// kod po stronie klienta
$vicleWihEngine = new VehicleWithEngine;
$vicleWihEngine = new Car;

/**
 * KORZYSTAM Z KLASY BAZOWEJ ALE MOGĘ PODSTAWIĆ DOWOLNY OBIEKT Z KLASY DZIEDZICZĄCEJ
 * I KOD POWINIEN DZIAŁAĆ
 * BO MAM TEN SAM ZESTAW METOD
 * Niezależnie czy instancja jest z klasy bazowej czy potomnej
 * podstawiamy klasy;  powinien być taki sam
 * i kod powinien działać
 * więc klasy można stosować ZAMIENNIE
 */

$vicleWihEngine->move();
$vicleWihEngine->turnOnEngine();
