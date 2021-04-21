<?php

/**
 * Open Closed Principle
 * Nie każda klasa musi mieć możliwość rozszerzania.
 * Zaplanowanie struktury rozwijanej aplikacji: zamknięcie klasy na modifikacje, a nowe ficzery
 * przez dziedziczenie
 * albo przez kompozycję
 * jeśli będzie konieczność zmiany zachowania:
 * a. dziedziczenie
 * b. interfejsy
 * c. kompozycja
 * d. wzorce projektowe
 * różne możliwości implementacji bez konieczności zmiany kodu.
 *
 * Zapewniamy możliwośc rozszerzania klasy i unikamy wprowadzania zmian/modifikacji w klasie istniejącej.
 * Modyfiakcje klas wcześniej już utworzonych, sprawdzinych i działających są kosztowne
 * (należy zmienić kod kliencki klasy modyfikowanej)
 * i ryzykowne (mogą powstać błędy w innych częściach aplikacji - wysoki coupling)
 * Zmieniamy więc zachowanie przez rozszerzanie.
*/
class ReportPrinter
{

    /**
     * ojej! nowy typ dojdzie i modyfikacja goowa.. brr!
     */
    public function print(string $fileType)
    {
        if ($fileType == 'xml') {
            echo "Zapisywanie pliku .XML<br>";
        } elseif ($fileType == 'json') {
            echo "Zapisywanie pliku .JSON<br>";
        }
    }
}

$rp = new ReportPrinter();
$rp->print('json');

/**
 * Tym razem przez abstract
 * To ona będzie zamknięta na modyfikacje
 * Nie będziemy już do niej wracali, nie będziemy już tu wprowadzali zmian.
 *
 * Wiele małych klas...
 */
abstract class ReportPrinterAbstract
{
    abstract public function print();
}

class ReportPrinterXML extends ReportPrinterAbstract
{
    public function print()
    {
        echo "Zapisuję do pliku .XML<br>";
    }
}

class ReportPrinterJSON extends ReportPrinterAbstract
{
    public function print()
    {
        echo "Zapisuję do pliku .JSON<br>";
    }
}

class ReportPrinterTXT extends ReportPrinterAbstract
{
    public function print()
    {
        echo "Zapisuję do pliku .TXT<br>";
    }
}
$refactor_rp = new ReportPrinterXML();
$refactor_rp->print();
$refactor_rp = new ReportPrinterJSON();
$refactor_rp->print();
$refactor_rp = new ReportPrinterTXT();
$refactor_rp->print();
