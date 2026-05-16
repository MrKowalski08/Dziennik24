# Dziennik24

---------------- Opis projektu ----------------

Dziennik24 to prosta aplikacja webowa napisana w PHP i MySQL, pełniąca rolę mini dziennika elektronicznego. System umożliwia logowanie użytkowników oraz obsługę dwóch ról:

* nauczyciel,
* uczeń.

Nauczyciel może dodawać zadania i przeglądać odpowiedzi uczniów, natomiast uczniowie mogą wysyłać odpowiedzi do przypisanych zadań.

Projekt został zbudowany w oparciu o:
* PHP,
* MySQL,
* HTML,
* CSS,
* sesje PHP.


---------------- Struktura projektu ----------------

Dziennik24/
│
├── db.php
├── login.php
├── logout.php
├── login.css
├── panel.css
│
├── nauczyciel/
│   ├── dodaj_zadanie.php
│   └── lista_odpowiedzi.php
│
└── uczen/
    ├── wyslij_odpowiedz.php
    └── wyslij_odpowiedz.css


---------------- Funkcjonalności ---------------- 

--- Logowanie użytkowników

Plik `login.php` odpowiada za:
* logowanie użytkownika,
* weryfikację hasła przy pomocy `password_verify()`,
* tworzenie sesji użytkownika,
* przekierowanie do panelu.

W sesji przechowywane są m.in.:
* ID użytkownika,
* imię i nazwisko,
* informacja czy użytkownik jest nauczycielem,
* ID klasy.


--- Wylogowanie

Plik `logout.php`:
* usuwa dane sesji,
* niszczy sesję użytkownika,
* przekierowuje na stronę logowania.


--- Dodawanie zadań przez nauczyciela

Plik `nauczyciel/dodaj_zadanie.php` umożliwia nauczycielowi:
* dodanie tytułu zadania,
* dodanie treści zadania,
* ustawienie terminu oddania,
* przypisanie zadania do klasy.

Zadania zapisywane są w tabeli `zadanie`.


--- Wysyłanie odpowiedzi przez ucznia

Plik `uczen/wyslij_odpowiedz.php` umożliwia uczniowi:
* wyświetlenie formularza odpowiedzi,
* przesłanie odpowiedzi do zadania,
* zapisanie odpowiedzi w bazie danych.

Odpowiedzi trafiają do tabeli `odpwiedz`.


--- Lista odpowiedzi

Plik `nauczyciel/lista_odpowiedzi.php`:
* pobiera odpowiedzi z bazy danych,
* łączy dane użytkownika i zadania przy pomocy `JOIN`,
* wyświetla odpowiedzi uczniów.

Przykładowe pobierane dane:
* imię ucznia,
* nazwisko ucznia,
* tytuł zadania,
* treść odpowiedzi,
* data odpowiedzi.