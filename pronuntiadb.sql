drop database if exists pronuntiadb;
create database if not exists pronuntiadb;
use pronuntiadb;

create table Logopedista(
idLogopedista int auto_increment primary key,
nome varchar(24),
cognome varchar(24),
email varchar(24),
password varchar(16),
authKey varchar(12) ,
accessToken varchar(9)
);

create table Caregiver(
idCaregiver int auto_increment primary key,
nome varchar(24),
cognome varchar(24),
email varchar(24),
password varchar(16),
authKey varchar(12) ,
accessToken varchar(9)

);

create table paziente(
idPaziente int auto_increment primary key,
nome varchar(24) not null,
cognome varchar(24) not null,
diagnosi varchar(128),
caregiver int,
logopedista int,
FOREIGN KEY (caregiver) references Caregiver(idCaregiver),
FOREIGN KEY (logopedista) references Logopedista(idLogopedista));

create table Parola(
idParola varchar(24) PRIMARY KEY,
tag varchar(52),
pathIMG varchar(52),
pathMP3 varchar (52));

create table Esercizio(
idEsercizio varchar(52) primary key,
parola varchar(24),
parola2 varchar(24),
tipo enum('Audio','Immagine', 'Coppia Minima'),
constraint CHK_coppiaMinima CHECK (tipo='Coppia Minima' or parola2 = null),
foreign key (parola) references Parola(idParola),
foreign key (parola2) references Parola(idParola)
);



create table Sessione(
idSessione varchar(24) primary key,
note varchar(256)
);

create table ComposizioneSessione(
sessione varchar(24),
esercizio varchar(52),
foreign key (sessione) references Sessione(idSessione),
foreign key (esercizio) references Esercizio(idEsercizio),
PRIMARY KEY (sessione, esercizio)
);

create table AssegnazioneSessione(
sessione varchar(24),
paziente int,
esito enum('corretto', 'errato', 'non svolto') default null,
nuovo boolean default true,
primary key (sessione, paziente),
foreign key (sessione) references Sessione(idSessione),
foreign key (paziente) references Paziente(idPaziente)
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
select * from caregiver;

insert into Paziente value
(1,"Pino","Pini","dislessia, discalculia",1,1);

select * from paziente;
select * from logopedista;
select * from paziente, logopedista, caregiver;