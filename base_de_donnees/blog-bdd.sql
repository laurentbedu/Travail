-- MySQL Script generated by MySQL Workbench
-- Tue Jan 21 18:25:47 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema blog
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `blog` ;

-- -----------------------------------------------------
-- Schema blog
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 ;
USE `blog` ;

-- -----------------------------------------------------
-- Table `blog`.`TypeUtilisateur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`TypeUtilisateur` ;

CREATE TABLE IF NOT EXISTS `blog`.`TypeUtilisateur` (
  `idTypeUtilisateur` INT NOT NULL AUTO_INCREMENT,
  `libelleType` VARCHAR(255) NULL,
  PRIMARY KEY (`idTypeUtilisateur`),
  UNIQUE INDEX `idTypeUtilisateur_UNIQUE` (`idTypeUtilisateur` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`Utilisateur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`Utilisateur` ;

CREATE TABLE IF NOT EXISTS `blog`.`Utilisateur` (
  `idUtilisateur` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(255) NULL,
  `nom` VARCHAR(50) NULL,
  `prenom` VARCHAR(50) NULL,
  `dateNaissance` DATE NULL,
  `motDePasse` VARCHAR(20) NULL,
  `idTypeUtilisateur` INT NOT NULL,
  PRIMARY KEY (`idUtilisateur`, `idTypeUtilisateur`),
  UNIQUE INDEX `idUtilisateur_UNIQUE` (`idUtilisateur` ASC),
  INDEX `fk_Utilisateur_TypeUtilisateur_idx` (`idTypeUtilisateur` ASC),
  CONSTRAINT `fk_Utilisateur_TypeUtilisateur`
    FOREIGN KEY (`idTypeUtilisateur`)
    REFERENCES `blog`.`TypeUtilisateur` (`idTypeUtilisateur`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`Statut`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`Statut` ;

CREATE TABLE IF NOT EXISTS `blog`.`Statut` (
  `idStatut` INT NOT NULL AUTO_INCREMENT,
  `libelleStatut` VARCHAR(100) NULL,
  PRIMARY KEY (`idStatut`),
  UNIQUE INDEX `idStatut_UNIQUE` (`idStatut` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`Categorie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`Categorie` ;

CREATE TABLE IF NOT EXISTS `blog`.`Categorie` (
  `idCategorie` INT NOT NULL AUTO_INCREMENT,
  `typeCategorie` VARCHAR(45) NULL,
  `idCategorieParent` INT NOT NULL,
  PRIMARY KEY (`idCategorie`, `idCategorieParent`),
  UNIQUE INDEX `idCategorie_UNIQUE` (`idCategorie` ASC),
  INDEX `fk_Categorie_Categorie1_idx` (`idCategorieParent` ASC),
  CONSTRAINT `fk_Categorie_Categorie1`
    FOREIGN KEY (`idCategorieParent`)
    REFERENCES `blog`.`Categorie` (`idCategorie`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`typeMedia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`typeMedia` ;

CREATE TABLE IF NOT EXISTS `blog`.`typeMedia` (
  `idtypeMedia` INT NOT NULL AUTO_INCREMENT,
  `libelleTypeMedia` VARCHAR(20) NULL,
  PRIMARY KEY (`idtypeMedia`),
  UNIQUE INDEX `idtypeMedia_UNIQUE` (`idtypeMedia` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`Commentaire`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`Commentaire` ;

CREATE TABLE IF NOT EXISTS `blog`.`Commentaire` (
  `idCommentaire` INT NOT NULL AUTO_INCREMENT,
  `texteCommentaire` MEDIUMTEXT NULL,
  `dateCreationCom` DATE NULL,
  `idUtilisateur` INT NOT NULL,
  PRIMARY KEY (`idCommentaire`, `idUtilisateur`),
  UNIQUE INDEX `idCommentaire_UNIQUE` (`idCommentaire` ASC),
  INDEX `fk_Commentaire_Utilisateur1_idx` (`idUtilisateur` ASC),
  CONSTRAINT `fk_Commentaire_Utilisateur1`
    FOREIGN KEY (`idUtilisateur`)
    REFERENCES `blog`.`Utilisateur` (`idUtilisateur`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`Article`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`Article` ;

CREATE TABLE IF NOT EXISTS `blog`.`Article` (
  `idArticle` INT NOT NULL AUTO_INCREMENT,
  `titreArticle` VARCHAR(100) NULL,
  `dateCreationArticle` DATE NULL,
  `dateModifArticle` DATE NULL,
  `description` MEDIUMTEXT NULL,
  `texte` MEDIUMTEXT NULL,
  `idUtilisateur` INT NOT NULL,
  `idStatut` INT NOT NULL,
  `idCategorie` INT NOT NULL,
  PRIMARY KEY (`idArticle`, `idUtilisateur`, `idStatut`, `idCategorie`),
  UNIQUE INDEX `idArticle_UNIQUE` (`idArticle` ASC),
  INDEX `fk_Article_Utilisateur1_idx` (`idUtilisateur` ASC),
  INDEX `fk_Article_Statut1_idx` (`idStatut` ASC),
  INDEX `fk_Article_Categorie1_idx` (`idCategorie` ASC),
  CONSTRAINT `fk_Article_Utilisateur1`
    FOREIGN KEY (`idUtilisateur`)
    REFERENCES `blog`.`Utilisateur` (`idUtilisateur`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Article_Statut1`
    FOREIGN KEY (`idStatut`)
    REFERENCES `blog`.`Statut` (`idStatut`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Article_Categorie1`
    FOREIGN KEY (`idCategorie`)
    REFERENCES `blog`.`Categorie` (`idCategorie`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`Jaime`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`Jaime` ;

CREATE TABLE IF NOT EXISTS `blog`.`Jaime` (
  `idJaime` INT NOT NULL AUTO_INCREMENT,
  `idUtilisateur` INT NOT NULL,
  `idArticle` INT NOT NULL,
  `idCommentaire` INT NOT NULL,
  PRIMARY KEY (`idJaime`, `idUtilisateur`, `idArticle`, `idCommentaire`),
  UNIQUE INDEX `idJaime_UNIQUE` (`idJaime` ASC),
  INDEX `fk_Jaime_Utilisateur1_idx` (`idUtilisateur` ASC),
  INDEX `fk_Jaime_Article1_idx` (`idArticle` ASC),
  INDEX `fk_Jaime_Commentaire1_idx` (`idCommentaire` ASC),
  CONSTRAINT `fk_Jaime_Utilisateur1`
    FOREIGN KEY (`idUtilisateur`)
    REFERENCES `blog`.`Utilisateur` (`idUtilisateur`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Jaime_Article1`
    FOREIGN KEY (`idArticle`)
    REFERENCES `blog`.`Article` (`idArticle`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Jaime_Commentaire1`
    FOREIGN KEY (`idCommentaire`)
    REFERENCES `blog`.`Commentaire` (`idCommentaire`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`Media`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`Media` ;

CREATE TABLE IF NOT EXISTS `blog`.`Media` (
  `idMedia` INT NOT NULL AUTO_INCREMENT,
  `cheminMedia` VARCHAR(255) NULL,
  `dateCreationMedia` DATE NULL,
  `idtypeMedia` INT NOT NULL,
  PRIMARY KEY (`idMedia`, `idtypeMedia`),
  UNIQUE INDEX `idMedia_UNIQUE` (`idMedia` ASC),
  INDEX `fk_Media_typeMedia1_idx` (`idtypeMedia` ASC),
  CONSTRAINT `fk_Media_typeMedia1`
    FOREIGN KEY (`idtypeMedia`)
    REFERENCES `blog`.`typeMedia` (`idtypeMedia`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`Article_Media`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`Article_Media` ;

CREATE TABLE IF NOT EXISTS `blog`.`Article_Media` (
  `idArticle` INT NOT NULL,
  `idMedia` INT NOT NULL,
  PRIMARY KEY (`idArticle`, `idMedia`),
  INDEX `fk_Article_has_Media_Media1_idx` (`idMedia` ASC),
  INDEX `fk_Article_has_Media_Article1_idx` (`idArticle` ASC),
  CONSTRAINT `fk_Article_has_Media_Article1`
    FOREIGN KEY (`idArticle`)
    REFERENCES `blog`.`Article` (`idArticle`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Article_has_Media_Media1`
    FOREIGN KEY (`idMedia`)
    REFERENCES `blog`.`Media` (`idMedia`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
