drop database if exists auto_ecole_24;
create database auto_ecole_24;
use auto_ecole_24;

CREATE TABLE USER
 (
   IDUSER int(3) NOT NULL auto_increment,
   PHOTO VARCHAR(100) NULL  ,
   NOM VARCHAR(32) NULL ,
   PRENOM VARCHAR(32) NULL ,
   EMAIL VARCHAR(32) NULL  ,
    MDP VARCHAR(32) NULL, 
   type_user enum("admin","user","candidat","moniteur"),
     NUMERO_TELEPHONE VARCHAR(32) NULL,
     PRIMARY KEY (IDUSER) 
 );

CREATE TABLE CANDIDAT
 (
  IDUSER int(3) NOT NULL auto_increment ,
  PHOTO VARCHAR(100) NULL  ,
   NOM VARCHAR(32) NULL  ,
   PRENOM VARCHAR(32) NULL  ,
   EMAIL VARCHAR(32) NULL  ,
    MDP VARCHAR(32) NULL ,
   type_user enum("candidat"),
   NUMERO_TELEPHONE VARCHAR(32) NULL  ,
     PRIMARY KEY (IDUSER) 
 ); 
 CREATE TABLE MONITEUR
 (
   IDUSER int(3) NOT NULL auto_increment ,
   PHOTO VARCHAR(100) NULL  ,
   NOM VARCHAR(32) NULL  ,
   PRENOM VARCHAR(32) NULL  ,
   EMAIL VARCHAR(32) NULL  ,
    MDP VARCHAR(32) NULL ,
   type_user enum("moniteur"),
   NUMERO_TELEPHONE VARCHAR(32) NULL  ,
   PRIMARY KEY (IDUSER) 
 );
 
 CREATE TABLE EXAMENS
 (
   IDEXAMEN int(3) NOT NULL auto_increment  ,
   DATE_ET_HEURE_D_EXAMEN VARCHAR(32) NULL  ,
   VEHICULE VARCHAR(32) NULL  ,
   TYPE_DE_PERMIS VARCHAR(32) NULL ,
   PRIMARY KEY (IDEXAMEN)
   
 );
 
 CREATE TABLE VEHICULE
 (
   IDVEHICULE int(3) NOT NULL auto_increment ,
   IMGVEHICULE VARCHAR(100) NULL  ,
   MARQUE VARCHAR(32) NULL  ,
   MODELE VARCHAR(32) NULL  ,
   IMMATRICULATION VARCHAR(32) NULL,
   PRIMARY KEY (IDVEHICULE)
 
 );
 
 CREATE TABLE LECONS
 (
   IDLECON int(3) NOT NULL auto_increment,
   TYPE_DE_LECON VARCHAR(32) NULL  ,
   DESCRIPTION VARCHAR(32) NULL  ,
   TITRE VARCHAR(32) NULL ,
   PRIMARY KEY (IDLECON)
 );

 CREATE TABLE PLANNINGS
 (
   IDPLANNING int not null auto_increment,
   IDLECON int(3) NOT NULL  ,
   IDUSER_1 int(3) NOT NULL  ,
   DATEHEURDEBUR DATETIME NOT NULL  ,
   IDUSER_2 int(3) NOT NULL  ,
   DATEFINHEUR DATETIME NULL  ,
   ETAT enum ('annule','valide','en attente') ,
   PRIMARY KEY (IDPLANNING),
   constraint fk_lecon foreign key (IDLECON) references LECONS(IDLECON),
   constraint fk_candidat foreign key (IDUSER_1) references CANDIDAT(IDUSER),
   constraint fk_moniteur foreign key (IDUSER_2) references MONITEUR(IDUSER)
 );
 DROP TRIGGER IF EXISTS insert_candidat;
DELIMITER //
CREATE TRIGGER insert_candidat
BEFORE INSERT ON candidat
FOR EACH ROW
BEGIN
    if new.iduser is null or new.iduser in (select iduser from user) or new.iduser = 0
        then
            set new.iduser = ifnull((select iduser from user where iduser >= all(select iduser from user)), 0) + 1;
    end if;
    insert into user values (new.iduser, new.PHOTO, new.NOM, new.PRENOM, new.EMAIL, new.MDP, new.type_user, new.NUMERO_TELEPHONE);
END //
DELIMITER ;

DROP TRIGGER IF EXISTS insert_moniteur;
DELIMITER //
CREATE TRIGGER insert_moniteur
BEFORE INSERT ON moniteur
FOR EACH ROW
BEGIN
 if new.iduser is null or new.iduser in (select iduser from user) or new.iduser = 0
        then
            set new.iduser = ifnull((select iduser from user where iduser >= all(select iduser from user)), 0) + 1;
    end if; 
       insert into user values (new.iduser, new.PHOTO, new.NOM, new.PRENOM, new.EMAIL, new.MDP, new.type_user, new.NUMERO_TELEPHONE);
END //
DELIMITER ;
alter table candidat
add nb_lecon int default 0;

update candidat c
set nb_lecon =(select count(idlecon) from plannings p 
where c.iduser=p.iduser_1 
) ;


 insert into USER values 
(null,'images/imgsql/default-avatar.png', "Kulas", "Thiviyan", "a@gmail.com", "123", "admin", "0766191965"), 
(null,'images/imgsql/default-avatar.png', "Marie", "Lucie", "b@gmail.com", "456", "user", "0754892648"); 

INSERT INTO moniteur 
VALUES (null, 'images/imgsql/pixil-frame-0 (1).png', 'Oussin', 'Claude', 'z@gmail.com', '123', 'moniteur', '12345678');

  insert into candidat (photo,nom,prenom,email,mdp,type_user,numero_telephone,nb_lecon)
  values ('images/imgsql/pixil-frame-0 (1).png','Mouloungui','Philippe','p@gmail.com','321','candidat','12345678','5');

INSERT INTO LECONS 
VALUES (null, 'lecon1', 'lecon1', 'lecon1');

INSERT INTO PLANNINGS 
VALUES (null, '1', '4', '2024-08-15 15:30:00', '3', '2024-08-15 16:30:00', 'valide');

  insert into EXAMENS (DATE_ET_HEURE_D_EXAMEN,VEHICULE,TYPE_DE_PERMIS)
  values ('2024-08-15 11:30:00','AUDI','Permis B');

  insert into VEHICULE (IMGVEHICULE,marque,modele,IMMATRICULATION)
  values ('images/imgsql/audi-q6-e-tron.jpg','Audi','QS6','QP-453-OP');

