drop database if exists pronuntiadb;
create database if not exists pronuntiadb;
use pronuntiadb;


CREATE TABLE Logopedista (
    idLogopedista INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(24) not null,
    cognome VARCHAR(24) not null,
    email VARCHAR(24) not null,
    password VARCHAR(16) not null,
    authKey VARCHAR(12),
    accessToken VARCHAR(9)
);

CREATE TABLE Caregiver (
    idCaregiver INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(24) not null,
    cognome VARCHAR(24) not null,
    email VARCHAR(24) not null,
    password VARCHAR(16) not null,
    visibile boolean default true not null,
    authKey VARCHAR(12),
    accessToken VARCHAR(9)
);

CREATE TABLE paziente (
    idPaziente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(24) NOT NULL,
    cognome VARCHAR(24) NOT NULL,
    diagnosi VARCHAR(128),
    caregiver INT not null,
    logopedista INT not null,
    visibile boolean default true not null,
    FOREIGN KEY (caregiver)
        REFERENCES Caregiver (idCaregiver),
    FOREIGN KEY (logopedista)
        REFERENCES Logopedista (idLogopedista)
);

CREATE TABLE Parola (
    idParola VARCHAR(24) PRIMARY KEY,
    tag VARCHAR(52),
    pathIMG VARCHAR(256) not null,
    pathMP3 VARCHAR(256)
);

insert into parola (idParola) value ('Parola2');

CREATE TABLE Esercizio (
    idEsercizio VARCHAR(52) PRIMARY KEY,
    parola VARCHAR(24) NOT NULL,
    parola2 VARCHAR(24) DEFAULT 'Parola2',
    tipo ENUM('Audio', 'Immagine', 'Coppia Minima'),
    logopedista int not null,
     FOREIGN KEY (logopedista)
        REFERENCES Logopedista (idLogopedista),
    CONSTRAINT CHK_coppiaMinima CHECK (parola <> parola2),
    FOREIGN KEY (parola)
        REFERENCES Parola (idParola),
    FOREIGN KEY (parola2)
        REFERENCES Parola (idParola)
);



CREATE TABLE Sessione (
    idSessione VARCHAR(24) PRIMARY KEY,
    logopedista int not null,
    numEsercizi int not null,
     FOREIGN KEY (logopedista)
        REFERENCES Logopedista (idLogopedista)
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
    dataCreazione datetime default current_timestamp,
    PRIMARY KEY (sessione , paziente),
    FOREIGN KEY (sessione)
        REFERENCES Sessione (idSessione),
    FOREIGN KEY (paziente)
        REFERENCES Paziente (idPaziente)
);

insert into Logopedista values
(1001,"Mario","Rossi", "mar.rosso@libero.it","Mario.Rossi","test200key","200-token"),
(1002,"Giovanni","Bianchi", "gio.bianchi@libero.it","password1","test201key","201-token");

insert into Caregiver (nome,cognome,email,password,authKey,accessToken) values
("Giovanni","Marroni", "giov.mar@gmail.com","Caregiver1","test100key","100-token"),
("Simone","Verdi","simo.ver@tiscali.it","Caregiver2","test101key","101-token");

drop table if exists Utente;

CREATE TABLE Utente AS SELECT * FROM
    (SELECT 
        idLogopedista AS id, email, password, authkey,  'logopedista' as tipo
    FROM
        logopedista UNION SELECT 
        idCaregiver AS id, email, password, authkey, 'caregiver' as tipo
    FROM
        caregiver) a;
        
ALTER TABLE utente 
ADD PRIMARY KEY (`id`);

SELECT 
    *
FROM
    utente;

insert into Paziente value
(1,"Domenico","Gialli","dislessia, discalculia",1,1001, true);
insert into parola (idparola, pathIMG) values
("Cane",'http://www.veterinarimatera.it/wp-content/uploads/2021/03/cane-1.jpg'),
("Serpente",'https://as2.ftcdn.net/v2/jpg/00/46/08/69/1000_F_46086991_yOEe4Zbqdt6K8eOR9vUGkR3M40NPHBQ5.jpg'),
("Cono",'https://previews.123rf.com/images/jiripravda/jiripravda1208/jiripravda120800012/14788432-traffico-cono-arancione.jpg'),
("Gatto",'https://www.helvetia.com/it/web/it/chi-siamo/blog/Assicurazione/animali/assicurazione-gatto/_jcr_content/storyparsys-01/storystage_copy_1249/image.1645114768564.transform-fp/960x540/assicurazione-gatto.jpg');


insert into esercizio (idesercizio, parola, tipo, logopedista) values
('cane-audio','Cane','Audio',1001),
('cono-immagine','Cono','Immagine',1001),
('gatto-immagine', 'Gatto','Immagine',1001),
('cane-immagine','Cane','Immagine',1001);
insert into sessione values
('Sessione1',1001,2),
('Sessione2',1001,1),
('Sessione3',1001,2);
insert into assegnazioneSessione (sessione,paziente) value
('Sessione1',1);

insert into composizionesessione values
('Sessione1','cane-audio'),
('Sessione2','cane-audio'),
('Sessione1','gatto-immagine'),
('Sessione3','cono-immagine'),
('Sessione3','cane-immagine');