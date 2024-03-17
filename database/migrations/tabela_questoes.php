<?php

require_once '../config/execute_commands.php';

function createTableQuestoes(){

    $command = " CREATE TABLE IF NOT EXISTS  `evaluation_system`.`questoes`(
                    `id_questao` INT NOT NULL AUTO_INCREMENT,
                    `questao` VARCHAR(50) NOT NULL,
                PRIMARY KEY (`id_questao`),
                CONSTRAINT `fk_avaliacoes_funcioanrios1`
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)
                ENGINE = InnoDB;";

    executeCommand($command);
}


function dropTableQuestoes(){
    $command = "DROP TABLE IF EXISTS questoes;";

    dropTable($command);
}