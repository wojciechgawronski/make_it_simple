<?php

/**
 * PROXY, POŚREDNIK, PEŁNOMOCNIK
 *
 * Klasa reprezuentująca funkcjonalność innej klasy: jest to klasa będąca interfejsem do czegoś zewnętrznego
 *
 * > do systemu plików
 * > do zewnętrznego zasobu
 * > duży obiekt w pamięci
 *
 * Proxy może
 * a. dodawać nowe funkcjonalności
 * b. kontrolować dostęp
 * c. cachować zawartość (fajnie gdy mamy duże, skomplikowane obiekty)
 *
 * Klient korzysta z proxy, z klasy będącej pośrenikiem a nie z konkretnego elementu:
 * ma te same metody, niekoniecznie nawet musi mieć świadomość istnienia proxy.
 *
 * System ładowania obrazków: cachowanie obrazka: nie musimy wczytywać obrazka od razu jeśli klient ponownie zarząda tego samego obrazka
 *
 * CLIENT > PROXY_IMAGE > REAL_IMAGE > SAVE_IMAGE
 *
 */
interface Image
{
    public function render(): void;
}

class RealImage implements Image
{
    public function __construct(
        private string $fileName
    ) {
        $this->loadImage();
    }

    public function loadImage(): void
    {
        echo "Ładowanie pliku obrazka " . $this->fileName . ". <br>";
    }

    public function render() : void
    {
        echo "Zawartość obrazka: " . $this->fileName . "<br>";
    }
}

/**
 * Klasa obrazka proxy
 */
class ProxyImage implements Image
{
    private $image = null;

    public function __construct(
        private string $fileName,
    ) {
    }

    public function render() : void
    {
        // mechanizm cachowania
        if ($this->image == null) {
            $this->image = new RealImage($this->fileName);
        }
        $this->image->render();
    }
}

/**
 * Kod po stronie klienta
 */
$image = new ProxyImage('image2');
$image->render(); // Ładowanie pliku obrazka image2. // Zawartość obrazka: image2
$image->render(); // Zawartość obrazka: image2
$image->render(); // Zawartość obrazka: image2
