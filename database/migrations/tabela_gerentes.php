<?php

require_once '../config/execute_commands.php';

function createTableGerentes(){

    $command = "CREATE TABLE IF NOT EXISTS `evaluation_system`.`gerentes` (
                    `id_gerente` INT NOT NULL AUTO_INCREMENT,
                    `nome` VARCHAR(50) NOT NULL,
                    PRIMARY KEY (`id_gerente`),
                    UNIQUE INDEX `setor_UNIQUE` (`setor` ASC) VISIBLE)
                ENGINE = InnoDB;
                ";

    executeCommand(($command));
}


function dropTableGerentes(){
    $command = "DROP TABLE IF EXISTS gerentes;";
    dropTable($command,'usuarios');
}