<?php declare(strict_types=1);

/**
 * STATE. STAN.
 *
 * Zmieniamy zachowanie obiektu w zależności od jego wewnętrznego stanu
 * Obiektowa implementacja automatu skończonego - koncepcja, każda rzecz ma ograniczoną ilość predefiniowanych stanów,, i w zależności od stanu w którym się znjaduje zmieniają się zachowania tego urządzenia oraz przejścia
 * Stany oraz przejścia
 *
 * Bardziej przejżysty sposób na zmianę zachowania obiektu bez używania instrukcji IF/SWITCH. Rozbudowane instrukcje, trzeba sprawdzać dużą ilość warunków.
 *
 * Gdy zmiana zachowania polega na użyciu dużej ilości funkcji - warto by znaleźć sposób na ich pogrupowanie w jakiejś jednej odrębnej klasie.
 *
 * W zależności od stanu obiekt może się inaczej zachowywać
 * Obiekt w stanie A tą samą czynność robi w jeden sposób
 * W stamie B w inny sposób
 * A lub/i w stanie B lub C inne czynności są niedostępne itd.
 *
 * TELEFON
 * Ma dwa tryby pracy: standardowy oraz wyciszony
 * W tr std powiadomienia uruchamiają dźwięk oraz wibracje
 * W tr wyciszonym to samo powiadomienie tylko wibracje
 * Dwa stany telefony wpływają za zachowanie tego samego obiektu i  zmienia się w zależności od stanu telefonu
 * Wyraźnie wyodrębnione stany
 *
 * Koncepcyjnie podobna do Strategi
 */


interface BrushStateInterface
{
    public function paint() : void;
}

class SmallBrushState implements BrushStateInterface
{
    public function paint() : void
    {
        echo "Linia namalowana małym pędzlem<br>";
    }
}

class MediumBrushState implements BrushStateInterface
{
    public function paint() : void
    {
        echo "Linia namalowana średnim pędzlem<br>";
    }
}

class BigBrushState implements BrushStateInterface
{
    public function paint() : void
    {
        echo "Linia namalowana dużym pędzlem<br>";
    }
}

/**
 * Potrzebuję obiekt płótna na którym mogę malować
 * Dobrze by było stworzyć metodę która umożliwia zmianę stanu pędzla
 * I metodę która przyjmuje stan pędzla jako parametr, do określania aktualnego stanu pędzla
 *
 * @param $state w swoim stanie przechowuje obiekt pędzla
 */
class PaintingCanvas
{
    public function __construct(
        protected BrushstateInterface $state
    ) {
    }

    public function setState(BrushStateInterface $state)
    {
        $this->state = $state;
    }

    /**
     * ma zawsze taką samą nazwę ale maluje w różnych szerokościach
     */
    public function paintLine()
    {
        $this->state->paint();
    }
}


/**
 * Kod kliencki
 */
$canvas = new PaintingCanvas(new BigBrushState);
$canvas->paintLine();
$canvas->setState(new SmallBrushState);
$canvas->paintLine();
$canvas->setState(new MediumBrushState);
$canvas->paintLine();
