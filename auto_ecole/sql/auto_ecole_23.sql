drop database if exists auto_ecole_23;
create database auto_ecole_23; 
use auto_ecole_23; 

create table candidat (
	idcandidat int(3) not null auto_increment, 
	nom varchar(30), 
	prenom varchar(30),
	adresse varchar(30),
	email varchar(30),
	primary key(idcandidat)
	);

create table moniteur (
	idmoniteur int(3) not null auto_increment, 
	nom varchar(30), 
	prenom varchar(30),
	qualification varchar(30),
	Statut varchar(30),
	email varchar(30),
	mdp varchar(30), 
	primary key (idmoniteur)
	);

create table vehicule (
	idvehicule int(3) not null auto_increment,
	marque varchar(30),
	modele varchar(30),
	immatriculation varchar(30),
	primary key (idvehicule)
	);

create table cours (
	idcours int(3) not null auto_increment,
	datecours date,
	prix float,
	idcandidat int(3) not null,
	idmoniteur int(3) not null,
	idvehicule int(3) not null,
	primary key (idcours), 
	foreign key (idcandidat) references candidat (idcandidat), 
	foreign key (idmoniteur) references moniteur (idmoniteur),
	foreign key (idvehicule) references vehicule (idvehicule)
	);

create table user (
	iduser int(3) not null auto_increment, 
	nom varchar(50), 
	prenom varchar(50), 
	email varchar(50), 
	mdp  varchar (255), 
	role enum("admin", "user"), 
	primary key (iduser)
);
insert into user values 
(null, "Olivier", "Paul", "a@gmail.com", "123", "admin"), 
(null, "Marie", "Lucie", "b@gmail.com", "456", "user"); 







insert into moniteur values ('', 'Michael', 'Jackson', 'moniteur', 'auto entrepreneur', 'm@gmail.com', '123'),
 ('', 'Emanuel', 'Macron', 'moniteur', 'salarié', 'e@gmail.com', '123'),
 ('', 'Ben', 'Ahmed', 'moniteur', 'salarié', 'b@gmail.com', '123'),
 ('', 'Bouzidi', 'Yanis', 'moniteur', 'salarié', 'y@gmail.com', '123'),
 ('', 'Paul', 'Walker', 'moniteur', 'salarié', 'p@gmail.com', '123');


insert into candidat values (null, 'Sivanand', 'Kirusaan', '93400', 's@gmail.com'),
 (null, 'John', 'Cena', '75018', 'j@gmail.com'),
 (null, 'Aklouf', 'Ilyes', '75012', 'a@gmail.com');


insert into vehicule values (null, 'Renault', 'Clio', '186 PMB 75'),
 (null, 'Peugeot', '508', '238 ABC 78'),
 (null, 'Mercedes', 'Classe A', '104 CIT 93'),
 (null, 'Opel', 'Corsa', '158 MDR 45'),
 (null, 'Ferrari', 'Roma', '789 FER 90'),
 (null, 'Bugatti', 'Chiron', '456 BAR 24');





create view lesCours as (
	select c.*, ca.nom, ca.prenom, m.nom as nomm, m.prenom as prenomm, v.immatriculation
	from cours c, candidat ca, moniteur m, vehicule v 
	where c.idcandidat = ca.idcandidat
	and c.idmoniteur = m.idmoniteur
	and c.idvehicule = v.idvehicule
	);