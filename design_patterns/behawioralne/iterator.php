<?php declare(strict_types=1);

/**
 * ITERATOR
 *
 * PĘTLA która umożliwia przetwarzanie pewnej kolekcji (kontenera)
 * Dostęp do elementów obiektu bez ujawniania jego wewnętrznych mechanizmów.
 * Kolekcja może być przetwarzana za pomocą iteratora
 *
 * Lista
 * > plików
 * > elementow w menu
 * > użytkowników
 * > piosnek na liście: mamy kilka przycisków: interfejs dla klienta: stop, start, następny, poprzedni, nie interesuje nas wewnetrzny mechanizm youtuba;
 *
 * Od stronu klienta: klient ma tylko dostęp do elementów obiektów i nie ujawnianimy mu wew mechanizów.
 * Znów sprowadza się to do enkapsulacji: klient wie tylko tyle ile jest mu potrzebne do wykonania zadań
 *
 */
class MenuItemsIterator implements Iterator
{

    /**
     * @var $index position in array
     */
    private int $index = 0;

    public function __construct(
        private MenuItemsCollection $menuItems,
    ) {
    }

    public function current() : mixed
    {
        return $this->menuItems->getItem($this->index);
    }

    public function key() : scalar
    {
        return $this->index;
    }

    public function next() : void
    {
        $this->index++;
    }

    public function rewind() : void
    {
        $this->index = 0;
    }

    public function valid() : bool
    {
        // sprawdzamy czy istnieje element z danym indeksem
        return !is_null($this->menuItems->getItem($this->index));
    }
}

class MenuItemsCollection implements IteratorAggregate
{
    private array $items = [];

    /**
     * Ta metoda to będzie dla nas fabryką, ktora zwróci nowy obiekt Iterator
     */
    public function getIterator()
    {
        return new MenuItemsIterator($this);
    }

    public function addItem($item)
    {
        $this->items[] = $item;
    }

    public function getItem(mixed $key)
    {
        if (isset($this->items[$key])) {
            return $this->items[$key];
        }
        return null;
    }

    public function getLastItem()
    {
        if (!empty($this->items)) {
            $last = array_pop($this->items);
            return $last;
        }
    }

    public function getFirstItem()
    {
        if (!empty($this->items)) {
            $first = array_shift($this->items);
            return $first;
        }
    }
}

/**
 * Po co to wszystko?
 * Kod po strinie klienta.. aby łatwiej było można pracować z pozycją w menu
 */
class SomeObj
{
}

$numbers = new MenuItemsCollection;
$numbers->addItem(1);
$numbers->addItem(2);
$numbers->addItem(new SomeObj); // why in numners ?
$numbers->addItem(3);

var_dump($numbers->getItem(2)); // SomeObj
echo "<br>";

echo $numbers->getLastItem(); // 3
echo $numbers->getFirstItem(); // 1
$numbers->addItem(3);
echo "<pre>";
print_r($numbers); // [0 => 2, 1 => 3]
echo "</pre>";
echo "<hr>";

$menuItems = new MenuItemsCollection;
$menuItems->addItem('kontakt');
$menuItems->addItem('o nas');
$menuItems->addItem('start');

// echo $menuItems->getItem(0);
foreach ($menuItems as $menuItem) {
    echo $menuItem . "<br>";
}