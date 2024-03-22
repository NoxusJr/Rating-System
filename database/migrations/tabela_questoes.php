<?php

require_once '../config/helper_commands_migrations.php';

function createTableQuestoes(){

    $command = "CREATE TABLE IF NOT EXISTS `hg5pss68_mengao`.`questoes` (
                    `id_questao` INT NOT NULL AUTO_INCREMENT,
                    `questao` VARCHAR(300) NOT NULL,
                    `id_setor` INT NOT NULL,
                PRIMARY KEY (`id_questao`),
                INDEX `fk_questoes_setores1_idx` (`id_setor` ASC) VISIBLE,
                CONSTRAINT `fk_questoes_setores1`
                FOREIGN KEY (`id_setor`)
                REFERENCES `hg5pss68_mengao`.`setores` (`id_setor`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)
                ENGINE = InnoDB;
                ";

    executeInternalCommand($command);
}


function dropTableQuestoes(){
    $command = "DROP TABLE IF EXISTS questoes;";

    dropTable($command);
}