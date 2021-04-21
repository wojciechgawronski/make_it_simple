<?php declare(strict_types=1);

/**
 * Relacje pomiędzy obiektami
 * Aplikacja to zestaw różnych obiektów
 * Wzorce behawioralne: jak wymieniać się informacjami, wykonywać na sobie pewne operacje
 * Gdyż obiekty muszą ze sobą współpracować: przechowywać dane, modyfikować dane, prezentować dane
 *
 * Zaprosimy firmę do współpracy: dostarczymy jej wymagane Interfejsy, a sami napiszemy adaptery pod zewnętrzne biblioteki.. Voila!
 *
 * > Jak zaprojektować strukturę, aby ta współpraca była prosta i efektywna?
 *
 * Adapter
 * Problem: jak sprawić by niekompatybilne klasy mogły ze sobą współpracować?
 * W realnym świecie: przejściówka: wtyczka/gniazko, urządzenia elektr
 *
 * Kontekst:
 * Klient: spodziewa się metody displayPrice(), nie możemy zmienić metod po stroenie klienta
 * Interfejs dostarcza metodę getPrice(), nie możemy zmienić tej metody; powiedzmy że jest to zewn. moduł, zewn. bibl., nie nasz kod
 *
 * > Potrzebujemy Klasy Adaptera: użujemy metody getPrice() i opakujemy ją w displayPrice() z której będzie mógł korzystać klient
 *
 * Schemat:
 * Klient > ProductAdapter > Product
 * Klient i Product nie są kompatybilne: mają inaczej nazwane metody
 */

/**
 * Klasa hardkodowana
 * Zewn. moduł, zewn. bibl., nie nasz kod, lub ew. nasz
*/
interface ProductInterface
{
    public function __construct(
        int $SKU,
        float $price,
    );
    public function getSKU() : int;
    public function getPrice() : float;
}
class Product implements ProductInterface
{
    /**
     * @param int $sku Stock Keeping Unit, unikalna jednostka magazynowa – identyfikator – służący do zarządzania danym towarem; do uporządkowania, zlokalizowania i zarządzania produktem.
     * @param float $price cena produktu
     */
    public function __construct(
        protected int $SKU,
        protected float $price,
    ) {
    }

    /**
     * Get the value of SKU
     */
    public function getSKU() : int
    {
        return $this->SKU;
    }

    /**
     * Get the value of price
     */
    public function getPrice() : float
    {
        return $this->price;
    }
}

/**
 * Klient
 */
$product = new Product(23432, 199.99);
// $product->displaySku();    // error
// $product->displayPrice();  // error

var_dump($product);
echo "<br>";


class ProductAdapter
{
    public function __construct(
        protected ProductInterface $product
    ) {
    }

    public function displaySKU() : int
    {
        return $this->product->getSKU();
    }

    public function displayPrice() : float
    {
        return $this->product->getPrice();
    }
}

$product = new ProductAdapter(new Product(11343, 99.99));
echo $product->displaySKU();    // 1134
echo "<br>";
echo $product->displayPrice();  // 99.99
