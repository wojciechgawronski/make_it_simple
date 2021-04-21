<?php declare(strict_types=1);
/**
 * Fasada
 *
 * Problem: zamówienie to wiele klas. Produkt, Klient, Płatność.
 * To spora złoźoność mechanizmu Zamówienia.
 *
 * Fasada ukryje za fasadą całą tę złożoność. ;-)
 * Opakowuje złożony system w prosty interfejs
 * Bankomat - my tylko wcisksmay guzik, a Bankomat robi magię: wysyła zapytania do serweów i ukrywa przed nami skomplikowane operacje
 *
 */
interface ProductInterface
{
    public function getProductName() : string;
}

class Product implements ProductInterface
{
    public function getProductName() : string
    {
        return "Dane produktu<br>";
    }
}
interface CustomerInterface
{
    public function getCustomername() : string;
}
class Customer implements CustomerInterface
{
    public function getCustomername() : string
    {
        return "Dane klienta<br>";
    }
}
interface PaymentInterface
{
    public function getPaymentData() : string;
}
class Payment implements PaymentInterface
{
    public function getPaymentData() : string
    {
        return "Dane płatności<br>";
    }
}

/**
 * Fasada zamówienia
 */
class OrderFacade
{
    public function __construct(
        public ProductInterface $product,
        public PaymentInterface $payment,
        public CustomerInterface $customer,
    ) {
    }

    public function prepareOrder() : void
    {
        echo $this->product->getProductName();
        echo $this->payment->getPaymentData();
        echo $this->customer->getCustomername();
        echo "Zamówienie przygotowane";
    }
}


// kod kliencki
$order = new OrderFacade(new Product, new Payment, new Customer);
$order->prepareOrder();
