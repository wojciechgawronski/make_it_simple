<?php

/**
 * Elasdtyczny zanczy:
 *
 * DDD taktyczne: Kompozycja oparta na wstrzykiwaniu dedykowanych (SOLID: SRP) interfejsów.
 *
 * MODUŁ (tutaj: KLASA) wysokiego poziomu nie powinna zależeć od modułów niskiego poziomu.
 * Załóżmy że moduły to klasy.
 * Klasy wysokiego poziomu nie powinny zależeć od klas niskiego poziomu.
 * Tradycyjnie jednak moduł wysokiego poziomu używa jako zależności modułu niskiego poziomu.
 * Obydwie powinny zależeć od abstrakcji.
 *
 * Moduł niskopoziomowy: infrastruktura która umożliwia działanie Domeny, np. warstwa persystyencji lub inna, dosęp do danych.
 * class SendSms{ ... } - trasport danych
 * Moduł wysokopoziomowy: Logika Biznesowa, Domena, ficzry aplikacji. Przetwarzanie i prezentowanie danych.
 * class NotificationManager { ... }
 *
 * Chcemy łatwo wymieniać warstę dostępu do danych... Nie możemy użyć silnych powiązań między warstwą przetwarzania i dostępu do danych.
 * Niskopoziomowe moduły podpinamy do interfesów określonych przez moduł wysokiego poziomu.
 * Celem jest likwidacja silnych sprzężeń.
 *
 * Wartswa Przetwarzania Danych (Warstwa Wyoska) UŻYWA JAKO ZALEŻNOŚCI Modułu (Klasy) Niskiego Poziomu.
 * Czyli Moduły wysokiego poziomu są uzależnione od modułów niskiego poziomu.
 * Ale chodzi o to, żeby nie był.
 *
 * Wstrzyknijmy więc Intefejsy :-)
 * Odwrócmy tę Logike!!!
 *
 * Niskopoziomowe Moduły podpinamy do Interfejsów które są określone przez moduły wysokiego poziomu. VOILA!!!
 * Czyli to Moduł Wysokiego Poziomu decyduje o tym jaki interfejs będzie akceptował;
 * oczywiście więc tylko obiekty zgodne z tym interfejsem będziemy mogli do niego podpinać.
 *
 * ABSTRAKCJA :) :) :)
 *
 * Użytkownik/programista raczej tylko z wysokimi klasami będzie miał do czynienia (z niskimi owszem, ale nie do modyfiokacji)
 * (DAO, DTO, DataAccess)
 */


/**
 * Z technicznego punktu widzenia kod jest poprawny, bo wysyła powiadomienie SMS
 * jednak tworzy sztywne powiązania, np. metoda sendNotyfication klasy NotificationManager w ciele
 * tworzy instancję klasy SMS
 */


class User
{
}

/**
 * MODUŁ TRANSPORTU DANYCH
 * Więc moduł niskopoziomowy
 */
class SMS
{
    public function send()
    {
        echo "wysyłam powiadomienie sms<br>";
    }
}

/**
 * Moduł wysokiego poziomu
 * Z tą klasą użytkownik będzie miał do czynienia
 */
class NotificationManager
{
    public function sendNotyfication(User $user, string $message)
    {
        $sms = new SMS();
        $sms->send();
    }
}

$notificationManager = new NotificationManager;
$notificationManager->sendNotyfication(new User, 'test');

/**
 * Refactor
 * Wprowadzimy Interfejsy
 * Zdefiniujmy Interfejsy
 * Zaimplementujmy interfejsy w klasach
 * Wstrzyknijmy Interfejsy
 */

interface PolishCustomerInterface
{
}

class User2 implements PolishCustomerInterface
{
}

interface NotificationServiceInterface
{
    public function send(PolishCustomerInterface $user, string $message);
}

/**
 * SMS: MODUŁ TRANSPORTU DANYCH
 */
class SMS2 implements NotificationServiceInterface
{
    public function send(PolishCustomerInterface $user, string $message)
    {
        echo "send SMS: $message<br>";
    }
}

class Email implements NotificationServiceInterface
{
    public function send(PolishCustomerInterface $user, string $message)
    {
        echo "send EMAIL: $message<br>";
    }
}

class NotificationManager2
{
    public function send(
        PolishCustomerInterface $user,
        NotificationServiceInterface $notificationService,
        string $message
    ) {
        // $sms = new SMS2();
        $notificationService->send($user, $message);
    }
}

$notificationService = new SMS2;
$notificationService = new Email; // powiadomienia zadziałają z smsem i mailem

$notificationManager2 = new NotificationManager2;

$notificationManager2->send(new User2(), $notificationService, 'test wiadomości');
