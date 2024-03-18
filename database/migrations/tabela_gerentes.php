<?php

require_once '../config/helper_commands_migrations.php';

function createTableGerentes(){

    $command = "CREATE TABLE IF NOT EXISTS `evaluation_system`.`gerentes` (
                    `id_gerente` INT NOT NULL AUTO_INCREMENT,
                    `nome` VARCHAR(50) NOT NULL,
                    `setor` VARCHAR(20) NOT NULL,
                    PRIMARY KEY (`id_gerente`),
                    UNIQUE INDEX `setor_UNIQUE` (`setor` ASC) VISIBLE)
                ENGINE = InnoDB;
                ";

    executeInternalCommand(($command));
}


function dropTableGerentes(){
    $command = "DROP TABLE IF EXISTS gerentes;";
    dropTable($command,'usuarios');
}