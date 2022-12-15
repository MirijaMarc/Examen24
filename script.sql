create database hotel;

\c hotel;

create table TypeH(
    idTypeH varchar(15) primary key,
    typeHabitation varchar(30)
);
create sequence typeHseq start with 1;

create table Quartier(
    idQuartier varchar(15) primary key,
    quartier varchar(30)
);
create sequence quartierseq start with 1;


create table Habitation(
    idHabibation varchar(15) primary key,
    idTypeh varchar(15),
    nbrChambre decimal,
    loyer decimal,
    idQuartier varchar(15),
    descriptionH text, 
    FOREIGN KEY (idTypeh) references TypeH(idTypeH),
    FOREIGN KEY (idQuartier) references Quartier(idQuartier)
);
create sequence habseq; start with 1


create table Pics(
    idPics varchar(15) primary key,
    nom varchar(100)
);
create sequence picsseq start with 1;


create table Client(
    idClient varchar(15) primary key,
    nom varchar(50),
    email varchar(60),
    mdp varchar(30),
    numTel varchar(30) unique
);
create sequence clientseq start with 1;

create table Admin(
    idAdmin varchar(15) primary key,
    nom varchar(50),
    email varchar(60),
    mdp varchar(30),
    numTel varchar(30) unique
);
create sequence adminseq start with 1;
