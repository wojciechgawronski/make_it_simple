<?php
/**
 * WZORCE CZYNNOŚCIOWE pisują zachowania;
 * Opisują sposób komunikacji pomiędzy obiektami, PROCES komunikacji jest ważniejsza niż sztywna, statyczna struktura
 * Wspólpracę opisują także wzorce strukturalne, tam jednak ważniejsza jest STRUKTURA.
 *
 * Problem:
 * Wzorce Czynnościowe rozwiązują proces komunikacji pomiędzy obiektami
 * w jaki sposób wysyłane są wiadomości pomiędzy obiektami
 * Jak obiekty różnego typu mogą ze sobą rozmawiać, jak mogą nawiązywać komunikację?
 *
 * Koncepcja
 * > Unikamy ścisłego wiązania klineta z kodem aplikacji
 * > Żądanie klienta traktowane jest jako OBIEKT, umożliwia to:
 * > KOLEJKOWANIE, PARAMETRYZOWANIE, ZAPAMIĘTYWANIE żądań oraz WYCOFYWANIE ZMIAN
 *
 * Przykład
 * Klasą do której będziemy wysyłać rządania będzie Silnik
 * Silnik może mieć 10 komend więc trzeba przygotować 10 poleceń
 * Klasy poleceń dla każdego  polecenia zaimplementują Interfejs Polecenia które przkeżemy do silnika
 * Klasa przełącznika, za jej pomocą klient może zdecydować jakie polecenie ma być do odbiornika przekazane;
 * Nie przekazujemy więc poceń bezpośrednio, tylko za pomocą przełącznika
 *
 * Klient > Przełącznik > Klasa 'włącz'/'wyłącz' > Odbiornik (silnik)
 */


/**
 * Odbiornik
 * Każda z metod odbiornika musi mieć osobną klasę/komendę...
 */
class Engine
{
    public function turnOn()
    {
        echo 'włączan silnik<br>';
    }

    public function turnOff()
    {
        echo 'wyłączam silnik';
    }

    public function checkOil()
    {
    }

    public function increaseEngineSpeed()
    {
    }
}

/**
 * Interfejs polecenia
 */
interface Command
{
    public function execute();
}

class TurnOnEngine implements Command
{
    public function __construct(
        private Engine $engine
    ) {
    }

    public function execute()
    {
        $this->engine->turnOn();
    }
}

class TurnOffEngine implements Command
{
    public function __construct(
        private Engine $engine
    ) {
    }

    public function execute()
    {
        $this->engine->turnOff();
    }
}

class EngineSwitch
{
    public function useSwitch($command)
    {
        $command->execute();
    }
}


/**
 * Kod kliencki
 */
$engine = new Engine;
$engineSwitch = new EngineSwitch;

$turnOn = new TurnOnEngine($engine);
$turnOff = new TurnOffEngine($engine);

/**
 * Klient nie pracuje bezpośrenio na klasie silnika
 * Odpięliśmy więc klienta od klasy silnika, poda jako parametr pbiekt odpowiedniej kalsy,
 * która albo włączy silnik albo silnik wyłączy
 *
 * Polocenie jest obiektem (wl)
 */
$engineSwitch->useSwitch($turnOn);
$engineSwitch->useSwitch($turnOff);
