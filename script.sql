-- create database hotel;

-- \c hotel;
--reset
-- drop table TypeH cascade;
-- drop table Quartier cascade;
-- drop table pics cascade;
-- drop table Habitation cascade;
-- drop table Pics_Habitation cascade;
-- drop table admin cascade;
-- drop table client cascade;

-- drop sequence typehseq;
-- drop sequence quartierseq;
-- drop sequence picsseq;
-- drop sequence habitationseq;
-- drop sequence adminseq;
-- drop sequence clientseq;

create sequence typehseq start with 1;
create sequence quartierseq start with 1;
create sequence Habitationseq start with 1;
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
    idHabitation varchar(15) primary key,
    idTypeh varchar(15),
    nbrChambre decimal,
    loyer decimal,
    idQuartier varchar(15),
    descriptionH text, 
    FOREIGN KEY (idTypeh) references TypeH(idTypeH),
    FOREIGN KEY (idQuartier) references Quartier(idQuartier)
);



create table Pics(
    idPics varchar(15) primary key,
    nom varchar(100)
);


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



create table Pics_Habitation(
    idHabitation varchar(15),
    idPics varchar(15),
    FOREIGN key (idHabitation) references Habitation(idHabitation),
    FOREIGN key (idPics) references Pics(idPics)
); 


insert into Client values (nextval('clientseq'),'Wijjy','wijjy@gmail.com','wijjy','0348675901');
insert into Client values (nextval('clientseq'),'Mirija','mirija@gmail.com','mirija','0348675199');
insert into Client values (nextval('clientseq'),'Hasina','hasina@gmail.com','hasina','0347734558');
insert into Client values (nextval('clientseq'),'Jean','jean@gmail.com','jean','03467893505');
insert into Client values (nextval('clientseq'),'Pierre','pierre@gmail.com','pierre','0345687519');


insert into Admin values (nextval('adminseq'),'mirijaadmin','admin@gmail.com','admin','034856781');


insert into TypeH values (nextval('typehseq'),'Maison');
insert into TypeH values (nextval('typehseq'),'Studio');
insert into TypeH values (nextval('typehseq'),'Bungalow');
insert into TypeH values (nextval('typehseq'),'Familiale');
insert into TypeH values (nextval('typehseq'),'Villa');

insert into Quartier values (nextval('quartierseq'),'Queens');
insert into Quartier values (nextval('quartierseq'),'Brooklyn');
insert into Quartier values (nextval('quartierseq'),'Manhattan');
insert into Quartier values (nextval('quartierseq'),'Bronx');
insert into Quartier values (nextval('quartierseq'),'Staten Island');


insert into Habitation values (nextval('habitationseq'),'2','2',45,'1','Studio en ville pres de la gare avec vue sur la ville');
insert into Habitation values (nextval('habitationseq'),'5','5',220,'5','Villa au bord de la plage avec grand espace qui a une vue et acces directe sur la plage');
insert into Habitation values (nextval('habitationseq'),'3','3',110,'3','Bungalow simple mais conviviale avec grand espace');
insert into Habitation values (nextval('habitationseq'),'1','5',290,'1','Ideale pour les famille nombreuse avec de grande chambre et facile d acces');
insert into Habitation values (nextval('habitationseq'),'1','4',250,'2','Maison simple avec jardin non loin de la ville');
insert into Habitation values (nextval('habitationseq'),'5','3',90,'5','Villa simple avec un magnififique jardin un peu eloigne de la ville');
insert into Habitation values (nextval('habitationseq'),'5','6',300,'3','Possede de grande chambre plus un jardin magnifique');
insert into Habitation values (nextval('habitationseq'),'3','2',100,'3','Bungalow avec jolie vue sur la plage');
insert into Habitation values (nextval('habitationseq'),'4','8',340,'4','Possede de grande chambre, magnifique jardin avec piscine et plage prive');
insert into Habitation values (nextval('habitationseq'),'4','10',400,'3','Possede des chambre spacieux, piscine, salle de jeu, plage prive');


insert into Pics values(nextval('picsseq'),'1A');
insert into Pics values(nextval('picsseq'),'1B');
insert into Pics values(nextval('picsseq'),'1C');
insert into Pics values(nextval('picsseq'),'1D');
insert into Pics values(nextval('picsseq'),'1E');

insert into Pics values(nextval('picsseq'),'2A');
insert into Pics values(nextval('picsseq'),'2B');
insert into Pics values(nextval('picsseq'),'2C');
insert into Pics values(nextval('picsseq'),'2D');
insert into Pics values(nextval('picsseq'),'2E');

insert into Pics values(nextval('picsseq'),'3A');
insert into Pics values(nextval('picsseq'),'3B');
insert into Pics values(nextval('picsseq'),'3C');
insert into Pics values(nextval('picsseq'),'3D');
insert into Pics values(nextval('picsseq'),'3E');


insert into Pics values(nextval('picsseq'),'4A');
insert into Pics values(nextval('picsseq'),'4B');
insert into Pics values(nextval('picsseq'),'4C');
insert into Pics values(nextval('picsseq'),'4D');
insert into Pics values(nextval('picsseq'),'4E');


insert into Pics values(nextval('picsseq'),'5A');
insert into Pics values(nextval('picsseq'),'5B');
insert into Pics values(nextval('picsseq'),'5C');
insert into Pics values(nextval('picsseq'),'5D');
insert into Pics values(nextval('picsseq'),'5E');


insert into Pics values(nextval('picsseq'),'6A');
insert into Pics values(nextval('picsseq'),'6B');
insert into Pics values(nextval('picsseq'),'6C');
insert into Pics values(nextval('picsseq'),'6D');
insert into Pics values(nextval('picsseq'),'6E');

insert into Pics values(nextval('picsseq'),'7A');
insert into Pics values(nextval('picsseq'),'7B');
insert into Pics values(nextval('picsseq'),'7C');
insert into Pics values(nextval('picsseq'),'7D');
insert into Pics values(nextval('picsseq'),'7E');


insert into Pics values(nextval('picsseq'),'8A');
insert into Pics values(nextval('picsseq'),'8B');
insert into Pics values(nextval('picsseq'),'8C');
insert into Pics values(nextval('picsseq'),'8D');
insert into Pics values(nextval('picsseq'),'8E');

insert into Pics values(nextval('picsseq'),'9A');
insert into Pics values(nextval('picsseq'),'9B');
insert into Pics values(nextval('picsseq'),'9C');
insert into Pics values(nextval('picsseq'),'9D');
insert into Pics values(nextval('picsseq'),'9E');

insert into Pics values(nextval('picsseq'),'10A');
insert into Pics values(nextval('picsseq'),'10B');
insert into Pics values(nextval('picsseq'),'10C');
insert into Pics values(nextval('picsseq'),'10D');
insert into Pics values(nextval('picsseq'),'10E');

insert into Pics_Habitation values('1','1');
insert into Pics_Habitation values('1','2');
insert into Pics_Habitation values('1','3');
insert into Pics_Habitation values('1','4');
insert into Pics_Habitation values('1','5');


insert into Pics_Habitation values('2','6');
insert into Pics_Habitation values('2','7');
insert into Pics_Habitation values('2','8');
insert into Pics_Habitation values('2','9');
insert into Pics_Habitation values('2','10');


insert into Pics_Habitation values('3','11');
insert into Pics_Habitation values('3','12');
insert into Pics_Habitation values('3','13');
insert into Pics_Habitation values('3','14');
insert into Pics_Habitation values('3','15');


insert into Pics_Habitation values('4','16');
insert into Pics_Habitation values('4','17');
insert into Pics_Habitation values('4','18');
insert into Pics_Habitation values('4','19');
insert into Pics_Habitation values('4','20');


insert into Pics_Habitation values('5','21');
insert into Pics_Habitation values('5','22');
insert into Pics_Habitation values('5','23');
insert into Pics_Habitation values('5','24');
insert into Pics_Habitation values('5','25');


insert into Pics_Habitation values('6','26');
insert into Pics_Habitation values('6','27');
insert into Pics_Habitation values('6','28');
insert into Pics_Habitation values('6','29');
insert into Pics_Habitation values('6','30');


insert into Pics_Habitation values('7','31');
insert into Pics_Habitation values('7','32');
insert into Pics_Habitation values('7','33');
insert into Pics_Habitation values('7','34');
insert into Pics_Habitation values('7','35');


insert into Pics_Habitation values('8','36');
insert into Pics_Habitation values('8','37');
insert into Pics_Habitation values('8','38');
insert into Pics_Habitation values('8','39');
insert into Pics_Habitation values('8','40');


insert into Pics_Habitation values('9','41');
insert into Pics_Habitation values('9','42');
insert into Pics_Habitation values('9','43');
insert into Pics_Habitation values('9','44');
insert into Pics_Habitation values('9','45');


insert into Pics_Habitation values('10','46');
insert into Pics_Habitation values('10','47');
insert into Pics_Habitation values('10','48');
insert into Pics_Habitation values('10','49');
insert into Pics_Habitation values('10','50');


-- select p.nom from pics as p
--     JOIN Pics_Habitation as ph ON p.idPics= ph.idPics
--     JOIN Habitation as h ON ph.idHabitation = h.idHabitation
--     where ph.idHabitation='1';

-- select q.quartier,th.typeHabitation,h.nbrChambre,h.descriptionH  from Habitation as h
--     JOIN typeH as th ON th.idTypeH= h.idTypeH
--     JOIN quartier as q ON q.idQuartier= h.idQuartier
--     Where h.idHabitation='1'
