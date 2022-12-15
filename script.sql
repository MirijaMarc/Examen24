create database hotel;

\c hotel;

create sequence typeHseq start with 1;
create sequence quartierseq start with 1;
create sequence habitationseq; start with 1
create sequence picsseq start with 1;
create sequence clientseq start with 1;
create sequence adminseq start with 1;


create table TypeH(
    idTypeH varchar(15) primary key,
    typeHabitation varchar(30)
);

create table Quartier(
    idQuartier varchar(15) primary key,
    quartier varchar(30)
);

create table Habitation(
    idHabibation varchar(15) primary key,
    idTypeh varchar(15),
    nbrChambre decimal,
    loyer decimal,
    idQuartier varchar(15),
    descriptionH varchar(250), 
    FOREIGN KEY (idType) references TypeH(idTypeH),
    FOREIGN KEY (idQuartier) references Quartier(idQuartier)
);

create table Pics(
    idPics varchar(15) primary key,
    nom varchar(100)
)

create table Client(
    idClient varchar(15) primary key,
    nom varchar(50),
    email varchar(60),
    mdp varchar(30),
    numTel varchar(30) unique
);

create table Admin(
    idAdmin varchar(15) primary key,
    nom varchar(50),
    email varchar(60),
    mdp varchar(30),
    numTel varchar(30) unique
);

