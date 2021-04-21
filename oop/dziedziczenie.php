<?php declare(strict_types=1);

/**
 * Dziedziczenie - relacja typu jest
 * Rozszerzanie funkcjonalności przez dziedziczenie
 * Is - a relation type
 */
class Vehicle
{
    private bool $isActive = false;

    public function __construct()
    {
        echo "to construct: <b>" . get_called_class() . "</b><br>";
    }


    public function turnOnEngine()
    {
        $this->isActive = true;
        echo "i turnOnEngine<br>";
    }

    public function move()
    {
        if ($this->isActive) {
            echo "i move<br>";
        } else {
            echo "<i>for move turn on engine!</i><br>";
        }
    }
}


class Car extends Vehicle
{
}

/**
 * bez sensu, rower nie ma silnika
 */
class Bike extends Vehicle
{
}

$bike = new Bike();        // to construct: Bike
$bike->move();             // for move turn on engine!
$bike->turnOnEngine();     // i turnOnEngine
$bike->move();             // i move


/**
 * Rower nie ma silnika, więc refaktoring:
 *
 * 1. Nowa klasa PoweredVehicle extends Vevicle
 * 2. Przenosimy metodę turnOn() do PoweredVehicle()
 * 3. Klasa PoweredVehicle rozszeża Vehicle
 *
 * 4. Bike dziedziczy z Vehicle
 * 5. Car dziedziczy z PoweredVehicle
 *
 * Po co tworzyć zbyt wiele poziomów dziedziczenia/zagnieżdzania ?
 * W przyszłości gdy dojdą kolejne cechy specyficzne dla pewnej grupy: powstanie kolejnego poziomu dziedziczenia
 * to trzeba by wprowadzać czwarty.. piąty poziom dziedziczenia. Masakra, to zbyt silne powiązania pomiędzy klasami.
 *
 * Struktura ta wiąże wszystko NA SZTYWNO. Jest mało elastyczna.
 * Każda zmiana w korzeniu drzewa jest propagowana do klas dziedziczących. Brr!
 */
