<?php declare(strict_types=1);
/**
 * Handler – łańcuch odpowiedzialności
 * Aplikacja: Request - Response
 * Żądanie przechodzi przez Łańcuch Odpowiedzialności dopóki nie trafi na właściwy HANDLER.
 * To samo żądanie może być obsługiwane przez różne Handlery (w sumie Klasy/Obiekty) z zależności od odpowiedniego parametru żądania.
 *
 * Problem:
 * Obsluga Płatności:
 * 1 - 99 PayPall
 * 100 - 999  Przelewem
 * 1000 - Karta
 *
 * Każdy procesor płatności to osobny Handler czyli obiet osobnego typu
 * Każdy procesor potrafi obsłużyć żądanie pod warunkiem, że zgadza się kwota (PARAMETR)
 *
 */
interface PaymentProcessInterface
{
}

abstract class PaymentProccesorHandler implements PaymentProcessInterface
{
    /**
     * następny procesor płatności, który zostanie wywołąny gdy ten
     * nie będzie mógł obsłużyć rządania, one będą po kolei połączone w łąńcuch: PayPall-Przelew-Karta
     * zmienna która przechowuje następny obiekt w łańcuchu
     */
    protected $succesor = null;

    public function setSuccesor($paymentProcessor)
    {
        $this->succesor = $paymentProcessor;
    }

    abstract public function processPayment(float $amount);
}

/**
 * nie przekazujemy parametrów - konstruktor nie jest potrzebny
 */
class PayPall extends PaymentProccesorHandler
{
    public function processPayment(float $amount)
    {
    }
}
