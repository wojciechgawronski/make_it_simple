<?php

/**
 * Interface Segregation
 *
 * Nie powiniśmy zmuszać klas do implementacji metod których nie potrzebują.
 * Interfejsy do dedykowanych ficzerów, odpowiadają za niewielką, konkretną funkcjonalność
 * Interfesjy zwięzłe
 * Interfejsy spójne
 * Niezbędne minum metod du wykonania zadania
 *
 * Do smsa nie potrzebujemy maila
 * Do maila z kolei nie potrzebujemy nr telefony
 *
 * Nie twórzmy klas wielkich i ciężkich, 8-tysięczników...
 * Klasa nie będzie potrzebowała n metod.
 *
 * Mniejsze lżejsze Interfejsy które zapewniają nam większą elastyczność
 */

interface Message
{
    public function prepareMessage();
    public function getPhoneNumber();
    public function getEmail(); // po co email dla SMSa.. zróbmy to lepiej
    public function send();
}

class SMS implements Message
{
    public function prepareMessage()
    {
        echo "Przygotowuję wiadomość<br>";
    }

    public function getPhoneNumber()
    {
        echo "sprawdzam nr tel<br>";
    }

    /**
     * po co zmuszać klasę interfejsem do implementacji..?
     * to zamiatanie problemu; ukrywanie; nie jest to poważne rozwiązanie
     * w sumie oszukujemy implementując jakieś metody dające jakiś wyjątek
     */
    public function getEmail()
    {
    }

    public function send()
    {
        echo "wysylam wiadomość<br>";
    }
}

/**
 * DEDYKOWANE INTERFEJSY
 */
interface SendMessage
{
    public function prepareMessage();
    public function send();
}

interface GetEmailMessage
{
    public function getEmail();
}

interface SMSMessage
{
    public function getPhoneNumber();
}

/**
 * IMPLEMENTACJA WYBRANYCH LEKKICH INTERFESJÓW
 * a nie jednej wielkiej kobyły
 */
class SMS2 implements SMSMessage, SendMessage
{
    public function getPhoneNumber()
    {
        echo "sprawdzam nr tel<br>";
    }

    public function prepareMessage()
    {
        echo "Przygotowuję wiadomość<br>";
    }

    public function send()
    {
        echo "wysylam wiadomość<br>";
    }
}


class SendEmail implements GetEmailMessage, SendMessage
{
    public function prepareMessage()
    {
        echo "Przygotowuję wiadomość<br>";
    }

    public function getEmail()
    {
        echo "pobieram email<br>";
    }

    public function send()
    {
        echo "wysylam wiadomość<br>";
    }
}
