DROP DATABASE IF EXISTS `CentreFormation`;
CREATE DATABASE `CentreFormation` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `CentreFormation`;

CREATE TABLE `CentreFormation`.`fonction` ( 
`IdFonction` INT NOT NULL AUTO_INCREMENT, 
`LibelleFonction` VARCHAR(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
 PRIMARY KEY (`IdFonction`)) ENGINE = INNODB;

CREATE TABLE `CentreFormation`.`diplome` ( 
`IdDiplome` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
`IntituleDiplome` VARCHAR(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) engine=innodb;

CREATE TABLE `CentreFormation`.`statut` ( 
`IdStatut` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
`IntituleStatut` VARCHAR(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) engine=innodb;

CREATE TABLE `CentreFormation`.`lieu` ( 
`IdLieu` INT NOT NULL AUTO_INCREMENT, 
`LibelleLieu` VARCHAR(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`Adresse` VARCHAR(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`AdresseComplement` VARCHAR(256) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`CodePostal` CHAR(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`Ville` VARCHAR(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
 PRIMARY KEY (`IdLieu`)) ENGINE = INNODB;

CREATE TABLE `CentreFormation`.`personne` ( 
`IdPersonne` INT NOT NULL AUTO_INCREMENT, 
`Nom` VARCHAR(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`Prenom` VARCHAR(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`IdAdresse` INT NOT NULL ,
`Email` VARCHAR(256) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`Telephone` CHAR(10) NULL,
`IdFonction` INT NOT NULL ,
`IdStatut` INT NOT NULL ,
 PRIMARY KEY (`IdPersonne`),
 FOREIGN KEY (`IdAdresse`) REFERENCES Lieu(`IdLieu`),
 FOREIGN KEY (`IdStatut`) REFERENCES Statut(`IdStatut`),
 FOREIGN KEY (`IdFonction`) REFERENCES Fonction(`IdFonction`)
 ) ENGINE = INNODB; 


CREATE TABLE `CentreFormation`.`classe` ( 
`IdClasse` INT NOT NULL AUTO_INCREMENT, 
`nomClasse` VARCHAR(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`Capacite` INT NULL ,
`IdLieu` INT NOT NULL ,
`IdResponsable` INT NOT NULL ,
`IdDiplome` INT NOT NULL,
`DateExamen` DATE NOT NULL ,
`DureeExamen` INT NULL ,
 PRIMARY KEY (`IdClasse`),
 FOREIGN KEY (`IdLieu`) REFERENCES Lieu(`IdLieu`),
 FOREIGN KEY (`IdResponsable`) REFERENCES Personne(`IdPersonne`),
 FOREIGN KEY (`IdDiplome`) REFERENCES Diplome(`IdDiplome`)
 ) ENGINE = INNODB; 

CREATE TABLE `CentreFormation`.`classepersonne` ( 
`IdClassepersonne` INT NOT NULL AUTO_INCREMENT, 
`IdClasse` INT NOT NULL ,
`IdPersonne` INT NOT NULL ,
 PRIMARY KEY (`IdClassepersonne`),
 FOREIGN KEY (`IdClasse`) REFERENCES Classe(`IdClasse`),
 FOREIGN KEY (`IdPersonne`) REFERENCES Personne(`IdPersonne`)
 ) ENGINE = INNODB; 
 
GRANT ALL ON centreformation.* TO 'root'@'localhost';










