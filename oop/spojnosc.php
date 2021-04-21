<?php

/**
 * Klasa powinna robić jedną rzecz i robić ją dobrze.
 * Grupowanie kodu odoiwiadające za jedno zadanie.
 *
 * DO TAKIEJ KLASY WIĘC NIE TRZEBA CZĘSTO WPROWADZAĆ ZMIAN.. :-)
 * KLASA KTÓRA ODPOWIADA ZA JEDNO ZADANIE MOŻE SIĘ PRZYDAĆ W WIELU RÓŻNYCH CZĘŚCIACH NASZEJ APLIKACJI...
 *
 * wysoka spójność i małe sprzężenia.. nie jest to łątwe
 * ..aby koncentrować się na jednym zadaniu i nie mieć powiązań
 *
 * Gdy klasa odpowiada za wiele różnych, luźno ze sobą powiązanych rzeczy statystycznie
 * trzeba tam będzie wprowadzać często zmiany...
 *
 * Jak funkcjonalnie połączyć klasy ?
 */

class File
{
    public function __construct(private string $fileName)
    {
    }

    /**
     * Get the value of fileName
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Ojej! klasa nie jest zbyt spójna
     * WALIDACJA DANYCH może się przydać do naszego pliku, ale:
     * może się przydać w innych miejscach aplikacji
     * walidacja niekoniecznie jest związana z plikiem
     *
     * zyska na tym spójność klasy file i cała aplikacja - być może zyska nową klasę
     * USUWAMY WIĘC TE METODĘ...
     */
    public function validateData($data)
    {
        echo "walidacja danych: $data <br>";
    }
}


class DataValidator
{
    public function __construct(private string $data)
    {
    }

    public function validateData()
    {
        $data = $this->data;
        echo "walidacja danych:.. $data";
    }

    /**
     * Get the value of data
     */
    public function getData()
    {
        return $this->data;
    }
}

$validator = new DataValidator('test');
$validator->validateData();
