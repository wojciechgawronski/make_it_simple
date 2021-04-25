<?php declare(strict_types=1);
/**
 * STRATEGIA
 * wzorzec może być mylony ze Stanem
 *
 * > Mamy zestaw predefiniowanych strategii/klas którą wybieramy w zależności od sytuacji.
 * > Zestaw klas, gdzie każda klasa reprezentuje określone zachowanie.
 * > Wybór klasy zmienia zachowanie programu.
 * > Klient dokonuje wyboru odpowiedniej Strategii/Klasy, z jakiej strategii będzie korzystał.
 *
 * Jak wyobrazić sobie Stan? Stan to rzecz, przedmiot. Jaki jest stan danego obiektu? Obietk jest w takim a nie innym stanie.
 * > Grafika: pędzel jest w stanie DużegoPędzla, dopóki ten stan jest wybrany to rysujemy duże linie, potem następuje zmiana stanu i rysujemy śrenie linie itd.
 * > Ciągły trwający stan i określone zachowanie dopóki tego stanu nie zmienimy
 *
 * Strategia to czynność - obiekt który coś robi
 * > wybieramy jakąś czynność i ją robimy
 * Strategia i Stan mają podobną strukturę ale odmienne zamierzenia.
 *
 * Strategia: algorytmy sortujące:
 * Które algorytmy dobre na uporządkowane/nieuporządkowane, duże/małe zbiory danych?; a na dane wstępnie posortowane?
 * Zestaw różnych algorytmów sortujących, każdy nadaje się pod określony typ danych
 *
 * > Klient może DOKONAĆ WYBORU odpowiedniej Strategii czyli odpowiedniego algorytmu sortowania danych
 */

interface SortInterface
{
    public function sort(array $list) : array;
}

class AscendingSortStrategy implements SortInterface
{
    public function sort(array $list) : array
    {
        sort($list);
        return $list;
    }
}

/**
 * Sortowanie kubełkowe
 */
class DescendingSortStrategy implements SortInterface
{
    public function sort(array $list) : array
    {
        rsort($list);
        return $list;
    }
}

class RandomSortStrategy implements SortInterface
{
    public function sort(array $list) : array
    {
        shuffle($list);
        return $list;
    }
}

class SortingComponent
{
    public function __construct(
        protected SortInterface $sortingStrategy,
    ) {
    }

    public function sortList(array $list) : array
    {
        return $this->sortingStrategy->sort($list);
    }
}

/**
 * Klient
 * Klient Decyduje o tym jaka strategia sortowania zostanie użyta
 */
$arr = [1,2,5,4];
echo "<b>Data to sort " . implode(', ', $arr) . "</b><br>";

$sortingComponent = new SortingComponent(new RandomSortStrategy);
$sortArr = $sortingComponent->sortList($arr);
echo implode(', ', $sortArr) . "<br>";

$sortingComponent = new SortingComponent(new AscendingSortStrategy);
$sortArr = $sortingComponent->sortList($arr);
echo implode(', ', $sortArr) . "<br>";

$sortingComponent = new SortingComponent(new DescendingSortStrategy);
$sortArr = $sortingComponent->sortList($arr);
echo implode(', ', $sortArr);
