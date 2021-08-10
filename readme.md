### My simple craftsman stuff
### Make it simpler
*Wędrówka przez chaos, czyli próba zrozumienia.*
*Niniejsze opracowanie ma charakter koncepcyjny. Repozytorium wprowadza odrobinę uporządkowania w mój mały prywatny chaos i mam nadzieję nadaje mu rzemieślniczy charakter. Jeśli przy okazji będzie pomocne lub/i inspirujące - to bardzo dobrze.*

**PHP**: słabo (typ może być automatycznie i niejawnie zmieniony jeśli kontekst tego wymaga)i dynamicznie typowalny. Nie ma konieczności deklarowania typu zmiennej i inicjalizacji; a opcjnonalny jej typ można dynamicznie zmieniać w trakcie wykonywania programu (lub nie); deklaracje typów kontrolowane są w czasie wykonywania programu. Wychwytuje mniej błdów na etapie kompilacji. 

**PHP5**: Obiektowo. SPL.
**PHP7**: Kontrakt. Przyspieszenie. Opcjonalne wymuszanie deklaracji typów paramterów metod i wymusznie zwracanych wartości; projektowanie pod kątem interfejsu a nie implementacji.
**PHP8**: Obiektowy syntax i konkurencja w BigData.

*Kod to elastyczne medium. **Sztuka** to rozpoznać moment w którym prosty prototyp staje się rdzeniem rozleglejszego projektu i odpowiednio szybko powstrzymać wymuszanie zmian projektowych z powodu bezwładności kodu.* Matt Zandrsta.

### SOLID
### Single Responsibility principle
Dobrze jest wiedzieć o co pytać.
Dobrze jest pytać o odpowiedzialność. OK. To jaka jest odpowiedzialność *mojej* klasy?
* Czy jest jeden powód do jej zmiany?
* Czy opisuje jedną transakcję bazodanową?
* Czego się bać? Jednej wielkiej klasy czy wielu małych klas? 
*→ Temat na później: Jaką Kompozycję wymyśleć dla wielu klas ?*

### Open Close Principle
### Liskow substitution Principle
### Dependency Inversion

## OOP
**Obiekt**
Obiekt to konkretyzacja klasy. Instancja, wystąpienie, egemplarz.
Posiada właściwości/składowe/pola, które różnią się pomiędzy egzemplarzami klasy.
**Klasa**
Klasa to typ referencyjny. 
Typ w przeciwieństwie do typów prostych/prymitywnych/skalranych: bool, int, float, string *Primitive Data Types* typ złożony - *Civilised Data Types* Object, podobnie jak Array. Typ specjalny to null. Razem 7.
**Statyczne Metody, Statyczne Właściwości**: *należą do klasy a nie do instacji; np. licznik instancji, statyczna klasa polaczenia do BD*
Deklarując metodę jako publiczną umożliwiamy wywołąnie jej z poza kontektu (zasi) klasy, tworzymi więc API klasy.
**akcesory: get(), set()**
**private public protected**
**final** *Final method, class, property. Zbyt głęboka hierarchia dziedziczenia, zbyt wiele poziomów dzdziedzyczenia?  OK, wymuśmy blokowanie dziedziczenia,  preferujmy kompyzcję...*
### Abstrakcja
Mapa to nie teren. Cel to zrozumienie zagadnienia i uproszczenie rozpatrywaneo problemu,  hierarchicznie: od ogółu do szczegułu, więc skupiamy się na ogólnej ide rozpatrywanego problemu abstrakcyjnej koncepcji.
Abstrakcja to klasa. Przeciwieństwem a. jest implementacja, instancja, skonkretyzowanie, wystąpienie. Jedna klasa jedna abstrakcja dla wszytkich użytkowników.

### Dziedziczenie
Rozszerzanie, współdzielenie raz zdefiniowanych funkcjonalności pomiędzy klasami: klasą bazową i pochodną, rodzicem i potomkiem. 
Administrator to wariant użytkownika. 
DRY. 
Zbyt dużo poziomów dziedziczenia.. nadmierna komplikacja:
Dziedziczenie jest dobrym mechanizmem wymuszania cech klasy bazowej w klasach pochodnych, ale jedncześnie utrudnia wprowadzanie wariacji w ramach hierarchi dziedziczenia. Może Dekorator?

**Interfejs** nakazuje implementować wszystkie metody które definiuje klasom implementującym. 
Klasy ukrywają implementacyjne szczegóły, gdyż odwracamy zależność i **wstrzykujemy** Interfejs. 
*Pisząc kod po stronie klienta (lub w innej części aplikacji)* **programujemy pod kątem interfesju a nie pod kątem klas które te metody implementują**; interesują nas nazwy metod a nie szczegóły implementacji; wywołujemy tylko te metody które udostępnia interfejs.

**Klasa abstrakcyjna** nie możemy utworzyć jej wystąpienia, jest to więc klasa zbyt ogólna. Musi zawierać minimum jendą metodę abstrakcyjną, **posłuży nam jako klasa bazowa** w hierarchi klas, jest tylko po to, by inne klasy mogły z niej dziedziczyć i implementować metody abstrakcyjne. Więc jest to **wymuszenie pewwnej stuktury w hierarchi dziedziczenia**.

### Enkapsulacja
Batyskaf i Rów Mariański. Batyskaf to szczelna hermetyczna kapsuła którą spuszczamy na dno Rowu Mariańskiego. Nic nie może się dostać i wydostać, hermetycznie. Hermetyczna kapsuła.
Grupowanie i ochrona atrybutów przed nieograniczoną modifikacą z zewnątrz. Dobrze jest więc wystawić API. Cel: zredukowanie zależnośi pomiędzy klasami. Zmiana w jednej klasie nie powinna mieć szerokich, trudnych do przewidzenia skutków w całlej aplikacji, tak więc zależności pomiędzy klasami powinny być jak najsłabsze.
*gdy zmieni,y nazwę pola z którego korzysta n klas należy wykonać n zmian w klasach zależnych. Modyfikatory w PHP: Private, Public, Protected.
Prywatny powinien być dla nas domyślny, ukrywamy wszytko co nie jest konieczne do współpracy z innymi klasami. Rozszerzamy go gdy jest to konieczne. Najlepiej tworzyć publiczny API, i/lub/ew. publiczne akcesory: getrery i settery. 

→ ostrożnie z setterami, mogą naruszać zasady enkapsulacji.. może odwórćmy zależność i niech settery w parametrze wymagają interfejsu.. i robią małą walidację

### Polimorfizm
Możlieść traktowania jedego obiektu jako innego obiektu. 
JS: operator *plus* czasem jest konkatenacją a czasem dodawaniem. Jeden operator, ale przyjmuje różne formy, daje różne wyniki.
OOP: Klasy B_Xml, C_Txt i D_JSON dziedziczą z abstrakcyjnej A_PLIK w której jest zadeklarowana abstr. met. zapisz(), i będzie miała różne implementacje. Kod kliencki zawsze użyje tej samej metody zapisz() i implementacja (wewnętrzne mechanizmy) nas nie za bardzo interesuje, nie ważne jest na jakiej klasie pliku pracujemy, bo każda z nich będzie miała polimorficznie zaimplementowaną metodę zapisz. Mamy więc polimorficzny interfejs.
Wartości różnych typów obsługujemy za pomocą wspólnego interfejsu.
**Nadpisywanie metod**: parent::construct(); dodanie nowych opcjonalnych paramatertów i słowa kluczowego parent() do metody, mamy więc funkcjonalność metody z klasy bazowej rozszerzoną o obecną funkcjonalność.



**Relacje pomiędzy klasami**
1. Is-a. Relacja typu **jest**. Samochód jest pojazdemm, pies jest zwierzęciem, admin jest użytkownikiem, MySQL jest typem bazy danych, produkt i produkt elektroniczny *(wariant produktu)*, xml jest typem pliku; Pojazd nie jest samochodem, użytkownik nie jest adminem,  **relacja w jedną stronę**.
   * Dziedziczenie oparte na klasach, Brr: MySQLDBManager ->DBManager->DataManager->Component, czy to nie za dużo poziomów dziedziczenia ?
   * Użycie interfejsów

2. Has-a. Relacja typu **ma**. Posiada, używa. Jakie są relacje pomiędzy klasami ?
Dom ma ściany, samochód ma silnik, klient ma adres, plik posiada możliwość zapisu na dysk. **Jest to pewna kompozyzja. Coś składa się z mniejszych elementów. Jedna rzecz posiada inne elementy.** Agregacja i kompozycja. 
   * **Agregacja**. A używa B przy czyn B może istnieć niezależnie od A. Pracownik (B) -> Firma (A). Likwidaca firmy nie spowoduje likwidacji pracownika, pracownik wykonuje roborę i może kontunować pracę w innej firmie. Obiekt Firmy agreguje obiekty - pracowników, łączy ich i używa. Agregacja nie ma własności.
   * **Kompozycja**
   A zawiera B, jednak B nie może istnieć bez A. Blok (B) zawiera mieszkania (A), **B jest właścicielem A**. Ściślejsza forma agregacji - likwidacja obiektu bloku powoduje automatycznie likwidację obiektów mieszkań. 




# Architectur Design
## Heksagonal
## Pipe and Filters
## N-Layer
## CQRS




# Product Engineenring
## DDD
### BigPicture
### EventStorming
### Strategia: BoundedContecsty
### Taktyka: Serwisy, Agregaty, Nieanemiczne Encje, ValueObjecty, Kompozycja
## EventSourcing
