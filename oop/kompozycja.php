<?php declare(strict_types=1);

/**
 * Kompozycja - przyklad
 * ścisła forma współpracy obiektów
 * obiekt zależny - podrzędny istnieje tak długo jak istnieje opbiekt zewnętrzny, który jest dla niego kontenerem
 */


class Flat
{
    public function __construct(
        private string $size,
        private int $room = 1
    ) {
    }

    /**
     * Get the value of size
    */
    public function getSize()
    {
        return $this->size;
    }
}

class BlockOfFlats
{
    private array $flats = [];

    public function addFlat($size)
    {
        $this->flats[] = new Flat($size);
    }


    /**
     * Get the value of flats
     */
    public function getFlats() : void
    {
        foreach ($this->flats as $flat) {
            echo $flat->getSize() . "<br>";
        }
    }
}

/**
 * Nie stwowrzymy mieszkania dopóki nie zainicjujemy obiektu bloku
 * To blok odpowiada za tworzenie mieszkan
 */

$block = new BlockOfFlats();

$block->addFlat("M2", 100);
$block->addFlat("M3", 100);

$block->getFlats();
