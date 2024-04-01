<?php

$root = dirname(dirname(__DIR__));
require_once $root."/Mvc/model/create.php";

function prepareDB(){
    global $pdo;

    $command = "DROP DATABASE IF EXISTS testRatingSystem";
    $cursor = $pdo->prepare($command);
    $cursor->execute();

    $command = "SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
    SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
    SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
    
    
    CREATE SCHEMA IF NOT EXISTS `testRatingSystem` DEFAULT CHARACTER SET utf8 ;
    USE `testRatingSystem` ;
    
    CREATE TABLE IF NOT EXISTS `testRatingSystem`.`sectors` (
      `id_sector` INT NOT NULL AUTO_INCREMENT,
      `name` VARCHAR(45) NOT NULL,
      PRIMARY KEY (`id_sector`),
      UNIQUE INDEX `nome_UNIQUE` (`name` ASC) VISIBLE)
    ENGINE = InnoDB;
    
    
    CREATE TABLE IF NOT EXISTS `testRatingSystem`.`users` (
      `id_user` INT NOT NULL AUTO_INCREMENT,
      `name` VARCHAR(64) NOT NULL,
      `login` VARCHAR(64) NOT NULL,
      `password` VARCHAR(64) NOT NULL,
      `permission` VARCHAR(30) NOT NULL,
      `id_sector` INT NULL,
      PRIMARY KEY (`id_user`),
      INDEX `fk_usuarios_setores_idx` (`id_sector` ASC) VISIBLE,
      CONSTRAINT `fk_usuarios_setores`
        FOREIGN KEY (`id_sector`)
        REFERENCES `testRatingSystem`.`sectors` (`id_sector`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION)
    ENGINE = InnoDB;
    
    CREATE TABLE IF NOT EXISTS `testRatingSystem`.`questions` (
      `id_question` INT NOT NULL AUTO_INCREMENT,
      `question` VARCHAR(300) NOT NULL,
      `id_sector` INT NOT NULL,
      PRIMARY KEY (`id_question`),
      INDEX `fk_questoes_setores1_idx` (`id_sector` ASC) VISIBLE,
      CONSTRAINT `fk_questoes_setores1`
        FOREIGN KEY (`id_sector`)
        REFERENCES `testRatingSystem`.`sectors` (`id_sector`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION)
    ENGINE = InnoDB;
    
    
    CREATE TABLE IF NOT EXISTS `testRatingSystem`.`ratings` (
      `id_rating` INT NOT NULL AUTO_INCREMENT,
      `date` DATE NOT NULL,
      `id_user` INT NOT NULL,
      `id_question` INT NOT NULL,
      `note` VARCHAR(45) NOT NULL,
      PRIMARY KEY (`id_rating`),
      INDEX `fk_avaliacoes_questoes1_idx` (`id_question` ASC) VISIBLE,
      INDEX `fk_avaliacoes_usuarios1_idx` (`id_user` ASC) VISIBLE,
      CONSTRAINT `fk_avaliacoes_questoes1`
        FOREIGN KEY (`id_question`)
        REFERENCES `testRatingSystem`.`questions` (`id_question`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION,
      CONSTRAINT `fk_avaliacoes_usuarios1`
        FOREIGN KEY (`id_user`)
        REFERENCES `testRatingSystem`.`users` (`id_user`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION)
    ENGINE = InnoDB;
    
    
    SET SQL_MODE=@OLD_SQL_MODE;
    SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
    SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
    ";

    $cursor = $pdo->prepare($command);
    $cursor->execute();

    $command = "INSERT INTO users (name,login,password,permission) VALUES ('George','40028922','admin','admin')";
    $cursor = $pdo->prepare($command);
    $cursor->execute();
}


prepareDB();