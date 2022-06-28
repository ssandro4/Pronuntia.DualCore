drop database if exists pronuntiadb;
create database if not exists pronuntiadb;
use pronuntiadb;

CREATE TABLE Logopedista (
    idLogopedista INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(24),
    cognome VARCHAR(24),
    email VARCHAR(24),
    password VARCHAR(16),
    authKey VARCHAR(12),
    accessToken VARCHAR(9)
);

CREATE TABLE Caregiver (
    idCaregiver INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(24),
    cognome VARCHAR(24),
    email VARCHAR(24),
    password VARCHAR(16),
    authKey VARCHAR(12),
    accessToken VARCHAR(9)
);

CREATE TABLE paziente (
    idPaziente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(24) NOT NULL,
    cognome VARCHAR(24) NOT NULL,
    diagnosi VARCHAR(128),
    caregiver INT,
    logopedista INT,
    FOREIGN KEY (caregiver)
        REFERENCES Caregiver (idCaregiver),
    FOREIGN KEY (logopedista)
        REFERENCES Logopedista (idLogopedista)
);

CREATE TABLE Parola (
    idParola VARCHAR(24) PRIMARY KEY,
    tag VARCHAR(52),
    pathIMG VARCHAR(256),
    pathMP3 VARCHAR(256)
);

insert into parola (idParola) value ('Parola2');

CREATE TABLE Esercizio (
    idEsercizio VARCHAR(52) PRIMARY KEY,
    parola VARCHAR(24) NOT NULL,
    parola2 VARCHAR(24) DEFAULT 'Parola2',
    tipo ENUM('Audio', 'Immagine', 'Coppia Minima'),
    CONSTRAINT CHK_coppiaMinima CHECK (parola <> parola2),
    FOREIGN KEY (parola)
        REFERENCES Parola (idParola),
    FOREIGN KEY (parola2)
        REFERENCES Parola (idParola)
);



CREATE TABLE Sessione (
    idSessione VARCHAR(24) PRIMARY KEY
);

CREATE TABLE ComposizioneSessione (
    sessione VARCHAR(24),
    esercizio VARCHAR(52),
    FOREIGN KEY (sessione)
        REFERENCES Sessione (idSessione),
    FOREIGN KEY (esercizio)
        REFERENCES Esercizio (idEsercizio),
    PRIMARY KEY (sessione , esercizio)
);

CREATE TABLE AssegnazioneSessione (
    sessione VARCHAR(24),
    paziente INT,
    nuovo BOOLEAN DEFAULT TRUE,
    cntErrori INT DEFAULT 0,
    elencoErrori VARCHAR(256),
    esito VARCHAR(256) DEFAULT NULL,
    note VARCHAR(256) DEFAULT NULL,
    PRIMARY KEY (sessione , paziente),
    FOREIGN KEY (sessione)
        REFERENCES Sessione (idSessione),
    FOREIGN KEY (paziente)
        REFERENCES Paziente (idPaziente)
);
/*
create table CoppiaMinima(
idCoppia varchar(52) PRIMARY KEY,
parola1 varchar(24),
parola2 varchar(24),
FOREIGN KEY (parola1) references Parola(idParola),
FOREIGN KEY (parola2) references Parola(idParola));
*/
insert into Logopedista value
(1,"Mario","Rossi", "mar.rosso@libero.it","LogoLoco","test200key","200-token");

insert into Caregiver (nome,cognome,email,password,authKey,accessToken) values
("Giovanni","Marroni", "giov.mar@gmail.com","Ketchup3Maionese","test100key","100-token"),
("Simone","Verdi","simo.ver@tiscali.it","SimoneLimone","test101key","101-token");
SELECT 
    *
FROM
    caregiver;

insert into Paziente value
(1,"Pino","Pini","dislessia, discalculia",1,1);
insert into parola (idparola) values
("cane"),
("serpente"),
("cono"),
("gatto");

SELECT 
    *
FROM
    paziente;
SELECT 
    *
FROM
    logopedista;
SELECT 
    *
FROM
    paziente,
    logopedista,
    caregiver;

select * from esercizio;
insert into esercizio (idesercizio, parola, tipo) value
('canemp3','cane','audio');

select * from parola;
select * from sessione;
insert into composizionesessione value ('oipougytfdrf', 'canemp3');

select * from composizionesessione;