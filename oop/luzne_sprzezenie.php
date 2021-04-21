<?php

/**
 * WYSOKA KOHEZJA NISKI COUPLING: intuicja podczas projektowania klas?
 *
 * PRODUKT TO ZALEŻNOŚĆ KOSZYKA
 * żeby dodać do koszyka produkt: na koszyku wywołać metodę która dodaje coś do koszyka
 * to potrzebny jest obiekt klasy produkt. Więc produkt to swego rodzaju zależność koszyka.
 * Nie możemy wywołać metody dodaj na koszyku jeśni nie mamy produktu.
 *
 * program to zbiór obiektów
 * aby program działał to obiekty muszą być ze sobą powiązane
 * obiekt niezbędny do działania innego obiektu to ZALEŻNOŚĆ, jakiś obiekt jest
 * zależnością innego obiektu, innej klasy
 *
 *
 * W jakim stopniu klasy są ze sobą powiązane?
 *
 * ŚCISŁE SPRZĘŻENIA
 * zmiana w klasie wymusza szerokie zmiany w innych klasach. Jedna zmiana w jednym miejscu programu wymusza
 * przebudowę innych modułach, w innch częściach naszej aplikacji.
 *
 * LUŹNE SPRZĘŻENIA
 * narzucenie implementacji Interfejsu ABCD klasom...
 * ...i wstrzykiewnie nie obiektu danej klasy a obiektu z zestawu klas które implementują interfejs
 *
 * Zmiana w klasie nie wymaga szerokich zmian w innych klasach.
 * Ułatwia wielokrotne wykorzystanie klas.
 * Ułatwia wprowadzanie zmian w przyszłości, interfejs definiuje metody, więc nie będzie aniemicznie
 *
*/

class File
{
}

class EventReader
{
    /**
     * obiekt klasy File jest zależnością klasy EventReader
     * obiekt niezbędny do działania innego obiektu to ZALEŻNOŚĆ
     * dwie klasy są na sztywno
     */
    public function listEvents(File $eventList)
    {
        echo "Odczytuję zawartość pliku:<br>";
        print_r($eventList);
        echo "<br>---------<br>";
    }

    /**
    * wstrzykniemy interfejs
    * wiele klas moze implementowaĆ jeden interfejs, więc luźne powiązanie
    */
    public function listEvents_LUZNE_SPRZEZENIE(InputStream $eventList)
    {
        echo "Odczytuję zawartość pliku:<br>";
        var_dump($eventList);
        echo "<br>---------<br>";
    }
}

// po stronie klienta:
// ŚCISŁE SPRZĘŻENIE
$file = new File;
$eventReader = new EventReader();
$eventReader->listEvents($file);

// MAMY JESZCZE INNE ŹRÓDŁA DANYCH:

class Database implements InputStream
{
}

class NetworkConnection implements InputStream
{
}

// DDAMY WIĘC INTERFEJS
interface InputStream
{
}

$eventReader->listEvents_LUZNE_SPRZEZENIE(new Database());
$eventReader->listEvents_LUZNE_SPRZEZENIE(new NetworkConnection());
