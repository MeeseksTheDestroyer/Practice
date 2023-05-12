CREATE DATABASE practice_tst;
USE practice_tst;

CREATE TABLE zaklady(
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Ulica VARCHAR(200) NOT NULL,
    Opis TEXT NOT NULL,
    Miasto VARCHAR(200) NOT NULL,
    Rodzaj_zakladu VARCHAR(200) NOT NULL
);

INSERT INTO `zaklady` (`ID`, `Ulica`, `Opis`, `Miasto`, `Rodzaj_zakladu`) VALUES (NULL, 'Partyzantów 1', 'Wronki, Zakład Karny we Wronkach, Partyzantów 1', 'Wronki', 'Zakład Karny we Wronkach');