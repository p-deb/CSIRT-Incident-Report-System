-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema proggadeb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `proggadeb` ;

-- -----------------------------------------------------
-- Schema proggadeb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `proggadeb` DEFAULT CHARACTER SET utf8 ;
USE `proggadeb` ;

-- -----------------------------------------------------
-- Table `proggadeb`.`Incident`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proggadeb`.`Incident` ;

CREATE TABLE IF NOT EXISTS `proggadeb`.`Incident` (
  `incidentNo` INT NOT NULL AUTO_INCREMENT,
  `incidentTitle` VARCHAR(45) NOT NULL,
  `incidentType` VARCHAR(45) NULL,
  `incidentStatus` VARCHAR(10) NOT NULL,
  `dateCreated` DATETIME NOT NULL,
  PRIMARY KEY (`incidentNo`),
  UNIQUE INDEX `incidentNo_UNIQUE` (`incidentNo` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 1;


-- -----------------------------------------------------
-- Table `proggadeb`.`Participant_has_Incident`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proggadeb`.`Participant_has_Incident` ;

CREATE TABLE IF NOT EXISTS `proggadeb`.`Participant_has_Incident` (
  `lastName` VARCHAR(45) NOT NULL,
  `firstName` VARCHAR(45) NOT NULL,
  `incidentNo` INT NOT NULL,
  PRIMARY KEY (`incidentNo`, `lastName`, `firstName`),
  INDEX `fk_Participant_has_Incident1_idx` (`incidentNo` ASC) VISIBLE,
    FOREIGN KEY (`incidentNo`)
    REFERENCES `proggadeb`.`Incident` (`incidentNo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `proggadeb`.`Participant`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proggadeb`.`Participant` ;

CREATE TABLE IF NOT EXISTS `proggadeb`.`Participant` (
  `lastName` VARCHAR(45) NOT NULL,
  `firstName` VARCHAR(45) NOT NULL,
  `jobTitle` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `reasonForIncident` VARCHAR(150) NULL,
  PRIMARY KEY (`lastName`, `firstName`))
  #INDEX `fk_Participant_Participant_has_Incident1_idx` (`lastName` ASC) VISIBLE,
    #FOREIGN KEY (`lastName`)
    #REFERENCES `proggadeb`.`participant_has_incident` (`lastName`)
    #ON DELETE NO ACTION
    #ON UPDATE NO ACTION)
  #INDEX `fk_Participant2_idx` (`firstName` ASC) VISIBLE,
    #FOREIGN KEY (`firstName`)
    #REFERENCES `proggadeb`.`Participant_has_Incident` (`firstName`)
    #ON DELETE NO ACTION
    #ON UPDATE NO ACTION)
ENGINE = InnoDB;




-- -----------------------------------------------------
-- Table `proggadeb`.`IP Address`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proggadeb`.`IP Address` ;

CREATE TABLE IF NOT EXISTS `proggadeb`.`IP Address` (
  `IPaddress` VARCHAR(20) NOT NULL,
  `reasonForIncident` VARCHAR(150) NULL,
  `Incident_incidentNo` INT NOT NULL,
  PRIMARY KEY (`Incident_incidentNo`, `IPaddress`),
  UNIQUE INDEX `IPaddress_UNIQUE` (`IPaddress` ASC) VISIBLE,
  INDEX `fk_IP Address_Incident1_idx` (`Incident_incidentNo` ASC) VISIBLE,
    FOREIGN KEY (`Incident_incidentNo`)
    REFERENCES `proggadeb`.`Incident` (`incidentNo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proggadeb`.`Incident Responders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proggadeb`.`IncidentResponders` ;

CREATE TABLE IF NOT EXISTS `proggadeb`.`IncidentResponders` (
  `lastName` VARCHAR(30) NOT NULL,
  `firstName` VARCHAR(45) NOT NULL,
  `responderID`INT NOT NULL,
  `username` VARCHAR (20) NOT NULL,
  `password` VARCHAR (50) NOT NULL,
  PRIMARY KEY (`username`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proggadeb`.`Comments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proggadeb`.`Comments` ;

CREATE TABLE IF NOT EXISTS `proggadeb`.`Comments` (
  `dateUpdated` DATETIME NOT NULL,
  `description` VARCHAR(999) NOT NULL,
  `IncidentResponders_username` VARCHAR(20) NOT NULL,
  `Incident_incidentNo` INT NOT NULL,
  INDEX `fk_Comments_IncidentResponders1_idx` (`IncidentResponders_username` ASC) VISIBLE,
  INDEX `fk_Participant_has_Incident_Incident1_idx` (`Incident_incidentNo` ASC) VISIBLE,
    FOREIGN KEY (`IncidentResponders_username`)
    REFERENCES `proggadeb`.`IncidentResponders` (`username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,  
    PRIMARY KEY (`Incident_incidentNo`, `dateUpdated`),
    FOREIGN KEY (`Incident_incidentNo`)
    REFERENCES `proggadeb`.`Incident` (`incidentNo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
