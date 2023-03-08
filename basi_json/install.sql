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