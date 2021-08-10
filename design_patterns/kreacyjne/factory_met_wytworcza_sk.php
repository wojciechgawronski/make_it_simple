<?php

/**
 * FABRYKA - METODA WYTWÓRCZA
 *
 * Ucieknijmy znów z jakiś powodów od operatora new i konstruktora i DODAJMY WARSTWĘ ABSTRAKCJI.
 *
 * WARSTWA ABSTRAKCJI tutaj: oddzielenie logiki Fabryk od Klas Pojazdów, oraz odpowiednie zaimplementowanie interfesów
 * Można więc powiedzieć, że w usystematyzujemy logikę tworzenia obiektów.
 *
 * KOD KLIENCKI: Nie stworzymy bezpośrednio samochodów/roweróww tylko skorzystamy z metody wytwórczej,
 * do produkcji obiektów konkretnej klasy nie użyjemy konstruktora,
 * a warstwy abstrakcji, ktrą zapewni nam fabryka: obiekty konkretnych klas będą tworzone w konkretnych fabrykach.
 * Nie będzie interesował nas (jako kod kliencki) nawet jakiej klasy będzie samochód, bo Fabryka wyprodukuje wszysko za nas:
 * czyli obiekt odpowiedniej klasy.
 *
 * Zdefiniujmy Interfejs do tworzenia obiektów: niech zawiera metodę do tworzenia obiektów,
 * i niech ten Interfejs ma swoje konkretne fabryki (swoje konkretne implementacje),
 * oraz
 * niech implementacje naszego Interfejsu DOPIERO odpowiadają za tworzenie obiektów kontkretnej klasy
 *
 * POJAZDY:
 * interface Vehicle{},
 * class Car implements Vehicle{}
 *
 * FABRYKI:
 * FabrykaPojazdowInterfejs{},
 * class FabrykaRowerow implements FabrykaPojazdowInterfejs{}
 * implementacje: FabrykaRowerow{} -> new Rower(), FabrykaSamochodow{} -> new Samochod()
 */

/**
 * Pojazdy
 */
interface Vehicle
{
    public function getName() : string;

    public function drive() : void;
}

class Car implements Vehicle
{
    public function __construct(
        protected string $name,
    ) {
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function drive() : void
    {
        echo "im a car, i drive<br>";
    }
}

class Bicycle implements Vehicle
{
    public function __construct(
        protected string $name,
    ) {
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function drive() : void
    {
        echo "<br>My class: <b>" . get_called_class() . "</b>, and i drive<br>";
    }
}

/**
 * Fabryki
 */
interface VehicleFactory
{
    public function create(string $name) : object;
}

class CarFactory implements VehicleFactory
{
    public function create(string $name) : object
    {
        return new Car($name);
    }
}

class BicycleFactory implements VehicleFactory
{
    public function create(string $name) : object
    {
        return new Bicycle($name);
    }
}

/**
 * Kod kliencki
 */
$carFactory = new CarFactory;
$bikeFactory = new BicycleFactory;

$myBike = $bikeFactory->create('unibike');
$car = $carFactory->create('Peugeot3008');

var_dump($myBike);
echo "my name: " . $myBike->drive();
echo $myBike->getName();

echo "<hr>";
var_dump($car);
