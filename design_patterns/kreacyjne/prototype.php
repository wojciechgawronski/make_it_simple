<?php

declare(strict_types=1);

/**
 * PROTOTYP
 *
 * vs FABRYKA: uciążliwość: nowy produkt - nowa fabryka, względnie sztywna hierarchia dziedziczenia
 *
 * FABRYKA Z PROTOTYPEM... OWN s. 202
 *
 * PROTOTYP: Kompozycja zamiast Dziedziczenia. K: uczniowie tworzą klasę. Silna Enklpsulacja: dostęp fo ucznia tylko przez klasę. Odwołanie lekcji dla klasy zwalnia ucznia do domu.
 * Agregacja: jeden uczeń może należeć do wielu grup zajęciowych, odwołąnie zajęć dla grupy nie zwalnia do domu - mogą być jeszcze zajęcia w innych grupach
 *
 * Tworzenie obiektu przez klonowanie obiektu istniejącego- więc potrzebny będzie Prototyp
 * A nowy obiekt to klon
 *
 * Klonowanie pozwoli uniknąć wysokich kosztów związanych z inicjalizacją
 * uciekamy w ten sposób od operatora new i od kosztów zasobów; oraz gdy mamy
 * + częstą inicjalizację
 * + złożony mechanizm inicjalizacji
 *
 * > Po stronie klienta potrzebujemy obiektu który tylko w niewielkim stopniu rózni się od obiektu już istniejącego
 * > klonujemy z obecnego nowy i zmieniamy tylko to, co niezbędne
 * > po co tworzyć (new) od zera?
 *
 * clone - klonowanie płytkie
 * vs
 * __clone() - gdy obiekt składa się z innych obiektów użyj ten metrody. OWN s. 205
 *
 * a. $objectB = clone $objectA;
 * b. $new_object = unserialize(serialize($your_object))
 * c. public function __clone() {
 *       $this->someObject = clone $this->someObject;
 *    }
 *
 * Będziemy tworzyć pizze podobne do siebie, króre będa się różnić rozmiaren itp.
 *
 * https://www.php.net/manual/en/language.oop5.cloning.php
 */

class Pizza
{
    public function __construct(
        protected float $price,
        protected int $size,
    ) {
    }

    /**
     * Get the value of size
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * Set the value of size
     *
     * @return  self
     */
    public function setSize(int $size): object
    {
        $this->size = $size;

        return $this;
    }


    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice(float $price): object
    {
        $this->price = $price;

        return $this;
    }
}

$pizza = new Pizza(29.99, 30);
var_dump($pizza);
// płytkie klonowanie
$clonedPizza = clone $pizza;
$clonedPizza->setPrice(45);
// $clonedPizza->price = 33; // error
echo "<br>";
var_dump($clonedPizza);

// clone
