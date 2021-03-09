CREATE DATABASE grest;

USE grest;

CREATE TABLE squadre
(
Colore VARCHAR(15),
Nome VARCHAR(20),
PRIMARY KEY(colore)
);

CREATE TABLE bambini
(
Nome VARCHAR(30),
Cognome VARCHAR(30),
Classe VARCHAR(2), /* ES. 3M per terza media o 5E per quinta elementare */
Sesso CHAR,
PreGrest VARCHAR(2), /* Si/No */
Mensa VARCHAR(2), /* Si/No */
IscrittoSett_1 VARCHAR(2), /* Si/No */
PagataSett_1 VARCHAR(2), /* Si/No */
IscrittoSett_2 VARCHAR(2), /* Si/No */
PagataSett_2 VARCHAR(2), /* Si/No */
IscrittoSett_3 VARCHAR(2), /* Si/No */
PagataSett_3 VARCHAR(2), /* Si/No */
IscrittoSett_4 VARCHAR(2), /* Si/No */
PagataSett_4 VARCHAR(2), /* Si/No */
Telefono1 VARCHAR(15),
Telefono2 VARCHAR(15),
Telefono3 VARCHAR(15),
ColoreSquadra VARCHAR(15),
Gita1Sett1 VARCHAR(5),
Gita2Sett1 VARCHAR(5),
Gita1Sett2 VARCHAR(5),
Gita2Sett2 VARCHAR(5),
Gita1Sett3 VARCHAR(5),
Gita2Sett3 VARCHAR(5),
Gita1Sett4 VARCHAR(5),
Gita2Sett4 VARCHAR(5),
PRIMARY KEY (Nome, Cognome),
FOREIGN KEY (ColoreSquadra) REFERENCES squadre(Colore),
FOREIGN KEY (Gita1Sett1, Gita2Sett1, Gita1Sett2, Gita2Sett2 ,Gita1Sett3,Gita2Sett3, Gita1Sett4, Gita2Sett4) REFERENCES gite(Codice)
);

CREATE TABLE animatori
(
Nome VARCHAR(30),
Cognome VARCHAR(30),
Sesso CHAR,
Turno VARCHAR(10), /* Lunedì o Martedì ... */
Telefono1 VARCHAR(15),
Telefono2 VARCHAR(15),
Telefono3 VARCHAR(15),
ColoreSquadra VARCHAR(15),
PRIMARY KEY (Nome, Cognome),
FOREIGN KEY (ColoreSquadra) REFERENCES squadre(Colore)
);

CREATE TABLE giochi
(
Codice VARCHAR(10),
Nome VARCHAR(20),
Descrizione VARCHAR(200),
NomeRelatore VARCHAR(30),
CognomeRelatore VARCHAR(30),
PRIMARY KEY (Codice),
FOREIGN KEY (NomeRelatore, CognomeRelatore) REFERENCES animatori(Nome, Cognome)
);

CREATE TABLE gite
(
Codice VARCHAR(5),
Descrizione VARCHAR(30),
PRIMARY KEY(Codice)
);