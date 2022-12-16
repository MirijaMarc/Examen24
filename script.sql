create database hotel;

\c hotel;

create table TypeH(
    idTypeH varchar(15) primary key,
    typeHabitation varchar(30)
);
create sequence typehseq start with 1;

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
create sequence habitationseq; start with 1


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

insert into Client values (nextval('clientseq'),'Wijjy','wijjy@gmail.com','wijjy','0348675901');
insert into Client values (nextval('clientseq'),'Mirija','mirija@gmail.com','mirija','0348675199');
insert into Client values (nextval('clientseq'),'Hasina','hasina@gmail.com','hasina','0347734558');
insert into Client values (nextval('clientseq'),'Jean','jean@gmail.com','jean','03467893505');
insert into Client values (nextval('clientseq'),'Pierre','pierre@gmail.com','pierre','0345687519');


insert into Admin values (nextval('adminseq'),'mirijaadmin','admin@gmail.com','admin','034856781');


insert into TypeH values (nextval('typehseq'),'maison');
insert into TypeH values (nextval('typehseq'),'studio');
insert into TypeH values (nextval('typehseq'),'bungalow');
insert into TypeH values (nextval('typehseq'),'familiale');
insert into TypeH values (nextval('typehseq'),'villa');

insert into Quartier values (nextval('quartierseq'),'Queens');
insert into Quartier values (nextval('quartierseq'),'Brooklyn');
insert into Quartier values (nextval('quartierseq'),'Manhattan');
insert into Quartier values (nextval('quartierseq'),'Bronx');
insert into Quartier values (nextval('quartierseq'),'Staten Island');


insert into Habitation values (nextval('habitationseq'),'2','2',45,'1','studio en ville pres de la gare avec vue sur la ville');
insert into Habitation values (nextval('habitationseq'),'5','5',220,'5','villa au bord de la plage avec grand espace qui a une vue et acces directe sur la plage');
insert into Habitation values (nextval('habitationseq'),'3','3',110,'3','bungalow simple mais conviviale avec grand espace');
insert into Habitation values (nextval('habitationseq'),'1','5',290,'1','ideale pour les famille nombreuse avec de grande chambre et facile d acces');
insert into Habitation values (nextval('habitationseq'),'1','4',250,'2','maison simple avec jardin non loin de la ville');
insert into Habitation values (nextval('habitationseq'),'5','3',90,'5','villa simple avec un magnififique jardin un peu eloigne de la ville');
insert into Habitation values (nextval('habitationseq'),'5','6',300,'3','possede de grande chambre plus un jardin magnifique');
insert into Habitation values (nextval('habitationseq'),'3','2',100,'3','bungalow avec jolie vue sur la plage');
insert into Habitation values (nextval('habitationseq'),'4','8',340,'4','possede de grande chambre, magnifique jardin avec piscine et plage prive');
insert into Habitation values (nextval('habitationseq'),'4','10',400,'3','possede des chambre spacieux, piscine, salle de jeu, plage prive');
