<?php

/**
 * FABRYKA ABSTRAKCYJNA
 *
 * Definuje interfejs do tworzenia obiektów,
 * nie musi znać klasy danego obiektu
 * wystraczy, że zarząda obiektu a fabryka mu ten obiekt dostarczy, odpowiedniej klasy dostarczy
 *
 * > wzorzec projektowy który zdefiniuje nam interfejs do tworzenia obiektów
 * > Fabr. abstr.: kładzie nacisk na tworzenie obiektów z jednej rodziny; powoązanych obiektów:
 * > fabryka która zgrupuje fabryki powiązanych obiektów
 *
 * Kontrolki GUI
 * GUI to jeden wspólny temat, mamy ten sam mowtyw
 * buttony, menu, formularze, nawigacja.. wersje na aplikacju na windowsa/maca/androida
 *
 * Fabryka tworzy zestaw powiązanych obiektów
 * I deleguje do pracy fabryki odpowiedniego typu: na windowsa/maca.
 *
 * Klient żąda tylko odpowiedniej kontrolki: chcę w tym miejscu przycisku.., a tam menu. I produkcja elementu dla konkretnego systemu.
 *
 * F. Abstr. zgrupuje fabryki dla odpowiednich systemów:
 *
 * KLIENT > FABRYKKA_UI > FABRYKA_UI_WINDOWS > IKONKA_WINDOWS
 * KLIENT > FABRYKKA_UI > FABRYKA_UI_MAC > IKONKA_MAC
 *
 * Klient potrzebuje zestawu kontrolek, a nie zna, nie chce znać, nie musi znać klas które odpowiadają za kontrolki odpowiedniego systmu. On musi tylko wiedzieć że istnieje fabryka i musi znać jej metody.
 *
 * Mamy więc jedną spójną bazę kodu źródłowego, która może być w powyższy sposób rozszerzana - dostosowana do wielu rozwizań.
 */

interface ButtonInterface
{
}

abstract class Button implements ButtonInterface
{
    abstract public function getName() : string;
}

class WindowsButton extends Button
{
    public function getName() : string
    {
        return "przycisk Windows<br>";
    }
}

class LinuxButton extends Button
{
    public function getName() : string
    {
        return "przycisk Linux<br>";
    }
}

class MacButton extends Button
{
    public function getName() : string
    {
        return "przycisk Mac<br>";
    }
}


interface MenuInterface
{
}

abstract class Menu implements MenuInterface
{
    abstract public function getName() : string;
}

class WindowsMenu extends Menu
{
    public function getName() : string
    {
        return "menu Windows<br>";
    }
}
