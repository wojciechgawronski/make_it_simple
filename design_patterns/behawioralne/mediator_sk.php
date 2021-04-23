<?php declare(strict_types=1);
/**
 * MEDIATOR (pośrednik)
 *
 * > pośredniczy w komunikacji pomiędzy obiektami w systemie; przy czym same klasy nie mogą się komunikować między sobą - powstał by chaos
 * np. Lotnisko, samoloty i wieża kontroli lotów
 * > zapewnia jednolity interfejs dla różnych elementów w danym podsystemie;
 * mamy obiekty różnych klas i chcemy alby mogły się komunikować,
 * a komunikacja nie może być  powiązana na sztywno, więc wprowadzamy Pośrednika/Mediatora
 * > M to jedyna klasa która zna wszystkie metody innych klas, więc potrafi nazwiązać komunikacją
 * chat webowy
 * umożliwia także przesyłanie wiadomości pomiędzy użytkownikami
 *
 */
interface ChatMediatorInterface
{
    public function sendMessage(User $user, string $message);
}

class ChatMediator implements ChatMediatorInterface
{
    public function sendMessage(User $user, string $message)
    {
        $sender = $user->getName();
        echo "Nadawca:<b> $sender</b><br>Wiadomość: <b>$message</b> <br>";
    }
}

class User
{
    public function __construct(
        private string $name,
        private Chatmediator $chatmediator
    ) {
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Wywołamy na użytkowniku send()
     * ale tak na prawdę użyjemy obiektu w środku ChatMediator i z niego wywołamy send
     */
    public function send($message)
    {
        $this->chatmediator->sendMessage($this, $message);
    }
}

/**
 * Kod kliencki
 * Dla użytkowników wystarczy nam jednak instancja chatu
 *
 * Tutaj komunikujemy sie pomiędzy użytkownikami tej samej klasy User.
 */

$chatMediator = new ChatMediator;

$woj = new User('woj', $chatMediator);
$ania = new User('ania', $chatMediator);

$woj->send('hej ania');
$ania->send('hej!');
