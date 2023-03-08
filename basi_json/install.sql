use form_in_php;


Create Table regione (
    regione_id int NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    PRIMARY KEY (regione_id)
);

drop Table regione;

INSERT INTO regione (nome)
VALUES('Abruzzo');

SELECT * FROM regione;

TRUNCATE TABLE regione;

CREATE TABLE Provincia (
    provincia_id int NOT NULL AUTO_INCREMENT,
    Nome varchar(255),
    Sigla char(2),
    regione_id int,
    PRIMARY KEY (provincia_id),
    Foreign Key (regione_id) REFERENCES Regione(regione_id)
);

SELECT * FROM Provincia;

TRUNCATE TABLE Provincia;

DROP Table provincia;

SELECT regione_id FROM Regione WHERE nome="$provincia->regione";