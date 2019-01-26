DROP DATABASE IF EXISTS knihkupectvo;
CREATE DATABASE knihkupectvo CHARACTER SET=utf8 COLLATE=utf8_slovak_ci;

USE knihkupectvo

DROP TABLE IF EXISTS vydavatelstvo;
DROP TABLE IF EXISTS zaner;
DROP TABLE IF EXISTS kniha;
DROP TABLE IF EXISTS autor;
DROP TABLE IF EXISTS knihaAutor;

CREATE TABLE vydavatelstvo(
  IDvydavatelstvo int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nazov varchar(40) NOT NULL
) engine=innodb;

CREATE TABLE zaner(
  IDzaner int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  zaner varchar(40) NOT NULL
) engine=innodb;


CREATE TABLE kniha(
  IDkniha int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nazov varchar(40) NOT NULL,
  cena float NOT NULL,
  isbn char(15) NOT NULL,
  pocetKusov int NOT NULL,
  IDvydavatelstvo int NOT NULL,
  FOREIGN KEY(IDvydavatelstvo) REFERENCES vydavatelstvo(IDvydavatelstvo),
  IDzaner int NOT NULL,
  FOREIGN KEY(IDzaner) REFERENCES zaner(IDzaner)
) engine=innodb;

CREATE TABLE autor(
  IDautor int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  meno varchar(40) NOT NULL,
  priezvisko varchar(40) NOT NULL
) engine=innodb;

CREATE TABLE knihaAutor(
  IDkniha int NOT NULL,
  IDautor int NOT NULL,
  FOREIGN KEY(IDkniha) REFERENCES kniha(IDkniha),
  FOREIGN KEY(IDautor) REFERENCES autor(IDautor),
  PRIMARY KEY(IDkniha, IDautor)
) engine=innodb;


INSERT INTO vydavatelstvo (nazov) VALUES
("Gadol"),
("Fyrot"),
("Fajrund"),
("Gudbuks");


INSERT INTO autor (meno, priezvisko) VALUES
("Rudolf","Varny"),
("Agata","Istie"),
("Joanna","Rowova"),
("Helmut","Hilskigr"),
("Jozef","Modrak");

INSERT INTO zaner(zaner) VALUES
("scifi"),
("romantika"),
("fantasy"),
("odborna");

INSERT INTO kniha(nazov, cena, isbn, pocetKusov, IDzaner, IDvydavatelstvo) VALUES
("Lov jednorozcov",19.99,"1234-QWER", 10, 3, 1),
("Pasca na srdce",15.99,"5321-POLK", 7, 2, 2),
("Milostny suboj",12.99,"1541-HGLZ", 9, 2, 1),
("Pasca na srdce",15.99,"5321-POLK", 7, 2, 2),
("Bozi hnev",11.99,"1921-UHJK", 4, 3, 3),
("SQL for Dummies",22.99,"1201-JZSK", 5, 4, 4),
("PHP for the Blind",34.99,"7621-UKZX", 2, 4, 3);

INSERT INTO knihaAutor(IDkniha,IDautor) VALUES
(1,2),
(2,2),
(3,5),
(4,2),
(5,5),
(6,1),
(6,4),
(7,1),
(7,3);

SELECT kniha.nazov AS "nazov knihy", zaner, vydavatelstvo.nazov AS "vydavatelstvo", CONCAT(autor.meno, " ", autor.priezvisko) AS "autor" FROM kniha
JOIN zaner ON kniha.IDzaner=zaner.IDzaner
JOIN vydavatelstvo ON kniha.IDvydavatelstvo=vydavatelstvo.IDvydavatelstvo
JOIN knihaAutor ON kniha.IDkniha=knihaAutor.IDkniha
JOIN autor ON knihaAutor.IDautor=autor.IDautor;

SELECT kniha.nazov AS "nazov knihy", cena, CONCAT(autor.meno, " ", autor.priezvisko) AS "autor" FROM kniha
JOIN zaner ON kniha.IDzaner=zaner.IDzaner
JOIN knihaAutor ON kniha.IDkniha=knihaAutor.IDkniha
JOIN autor ON knihaAutor.IDautor=autor.IDautor
WHERE autor.meno LIKE "J%" ORDER BY cena ASC;


SELECT kniha.nazov AS "nazov knihy", cena, CONCAT(autor.meno, " ", autor.priezvisko) AS "autor" FROM kniha
JOIN zaner ON kniha.IDzaner=zaner.IDzaner
JOIN knihaAutor ON kniha.IDkniha=knihaAutor.IDkniha
JOIN autor ON knihaAutor.IDautor=autor.IDautor
WHERE kniha.cena>12 AND kniha.cena<20;
