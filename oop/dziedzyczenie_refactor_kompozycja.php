<?php

/**
 * INTERFEJSY OKREŚLĄ JAKIE ZACHOWANIA będzie posiadał nasz obiekt.
 * KOMPOZYCJA nadejdzie;)
 *
 * Uciekamy od sztywnej struktury dziedziczenia na rzecz elastycznosci
 * Nnikniemy sztywnej (złożonej, WIELOPOZIOMIWEJ) struktury powiązań między klasami
 *
 * W klasach dziedziczących co prawda można nadpisywać metedy.
 *
 * Klasy skladane sa z klockow - interfejsów,
 * Do obiektów dodajemy tylko chciane zachowania.
 */

interface MoveAble
{
    public function move();
}

interface PoweredAble
{
    public function turnOnEngine();
}

class Bike implements MoveAble
{
    public function __construct()
    {
        echo "to construct: <b>" . get_called_class() . "</b><br>";
    }

    public function move()
    {
        echo "i'm a <b>" . get_called_class() . "</b>. i move<br>";
    }
}

class Car implements PoweredAble, MoveAble
{
    public function __construct()
    {
        echo "to construct: <b>" . get_called_class() . "</b><br>";
    }

    public function turnOnEngine()
    {
        echo "i'm a <b>" . get_called_class() . "</b>. i turn on engine<br>";
    }

    public function move()
    {
        echo "i'm a <b>" . get_called_class() . "</b>. i move<br>";
    }
}

 
$vehicle = new Bike();
$vehicle->move();

$car = new Car();
$car->turnOnEngine();
$car->move();
