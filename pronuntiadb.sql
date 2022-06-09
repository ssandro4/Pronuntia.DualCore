drop database if exists pronuntiadb;
create database if not exists pronuntiadb;
use pronuntiadb;

create table Logopedista(
idLogopedista int primary key,
nome varchar(24),
cognome varchar(24),
email varchar(24),
password varchar(16)
);
create table Caregiver(
id int primary key,
nome varchar(24),
cognome varchar(24),
email varchar(24),
password varchar(16),
authKey varchar(12) ,
accessToken varchar(9)

);

create table Paziente(
idPaziente int primary key,
nome varchar(24),
cognome varchar(24),
caregiver int,
logopedista int,
FOREIGN KEY (caregiver) references Caregiver(idCaregiver),
FOREIGN KEY (logopedista) references Logopedista(idLogopedista));

create table Parola(
parola varchar(24) PRIMARY KEY,
tag varchar(52),
pathIMG varchar(52),
pathMP3 varchar (52));

create table CoppiaMinima(
idCoppia varchar(52) PRIMARY KEY,
parola1 varchar(24),
parola2 varchar(24),
FOREIGN KEY (parola1) references Parola(parola),
FOREIGN KEY (parola2) references Parola(parola));

insert into Logopedista value
(1,"Mario","Rossi", "mar.rosso@libero.it","iLoveZumba");

insert into Caregiver values
(1,"Giovanni","Marroni", "giov.mar@gmail.com","Ketchup3Maionese","test100key","100-token"),
(2,"Simone","Verdi","simo.ver@tiscali.it","SimoneTrimone","test101key","101-token");
select * from caregiver;