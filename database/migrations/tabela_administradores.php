<?php

require_once '../config/execute_commands.php';

function createTableAdministradores(){

    $command = "CREATE TABLE IF NOT EXISTS `evaluation_system`.`administradores` (
                    `id_administrador` INT NOT NULL AUTO_INCREMENT,
                    `nome` VARCHAR(50) NOT NULL,
                    `login` VARCHAR(64) NOT NULL,
                    `senha` VARCHAR(64) NOT NULL,
                    PRIMARY KEY (`id_administrador`))
                ENGINE = InnoDB;";

    executeCommand(($command));

}


function dropTableAdministradores(){
    
    $command = "DROP TABLE IF EXISTS administradores;";

    dropTable($command);
}