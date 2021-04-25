<?php declare(strict_types=1);
/**
 * Handler – ŁAŃCUCH ODPOWIEDZIALNOŚCI NASTĘPUJĄCYCH PO SOBIE KLAS
 * OBIEKTY KTÓRE POTRAFIĄ PRZETWARZAĆ RZĄDANIA
 *
 * SUCCESOR - każdy oiekt posiada warunek przetwarzania i przechowuje obiekt następny -
 * - do którego uderzy żądanie w razie niespełnienia warunku
 *
 * Aplikacja: Request - Response
 * Żądanie przechodzi przez Łańcuch Odpowiedzialności dopóki nie trafi na właściwy HANDLER.
 * To samo żądanie może być obsługiwane przez różne Handlery (Klasy/Obiekty) w zależności od odpowiedniego parametru żądania.
 *
 * Problem:
 * Obsluga Płatności:
 * 1 - 99 PayPall
 * 100 - 999  Przelewem (BankTransfer)
 * 1000 - Karta
 *
 * Każdy procesor płatności to osobny Handler (tutaj obiet osobnego typu)
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
class PayPallTransferHandler extends PaymentProccesorHandler
{
    public function processPayment(float $amount)
    {
        if ($amount >= 0 && $amount < 100) {
            return 'Płatność PayPall: ' . $amount . "<br>";
        } else {
            if ($this->succesor != null) {
                return $this->succesor->processPayment($amount);
            }
        }
    }
}

class BankTransferHandler extends PaymentProccesorHandler
{
    public function processPayment(float $amount)
    {
        if ($amount >= 100 && $amount < 1000) {
            return 'Płatność Przelewm bankowym: ' . $amount . "<br>";
        } else {
            if ($this->succesor != null) {
                return $this->succesor->processPayment($amount);
            }
        }
    }
}

class CreditCardTransferHandler extends PaymentProccesorHandler
{
    public function processPayment(float $amount)
    {
        if ($amount >= 1000) {
            return 'Płatność kartą kredytową: ' . $amount . "<br>";
        } else {
            if ($this->succesor != null) {
                return $this->succesor->processPayment($amount);
            }
        }
    }
}

/**
 * Kod kliencki
 */

 // zainicjowanie obiektów
$payPallTransfer = new PayPallTransferHandler;
$bankTransfer = new BankTransferHandler;
$creditCardTransfer = new CreditCardTransferHandler;

// hardkodujemy kolejność obsługi
$payPallTransfer->setSuccesor($bankTransfer);
$bankTransfer->setSuccesor($creditCardTransfer);

// płatności
echo $payPallTransfer->processPayment(-155);
echo $payPallTransfer->processPayment(0);
echo $payPallTransfer->processPayment(99);
echo $payPallTransfer->processPayment(101);
echo $payPallTransfer->processPayment(1000);
echo $payPallTransfer->processPayment(1001);
echo $payPallTransfer->processPayment(100);
