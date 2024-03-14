<?php

require_once '../config/execute_commands.php';

function createTableGerentes(){

    $command = "CREATE TABLE IF NOT EXISTS `evaluation_system`.`gerentes` (
                    `id_gerente` INT NOT NULL AUTO_INCREMENT,
                    `nome` VARCHAR(50) NOT NULL,
                    `setor` VARCHAR(20) NOT NULL,
                    `questao1` FLOAT NULL,
                    `questao2` FLOAT NULL,
                    `questao3` FLOAT NULL,
                    `questao4` FLOAT NULL,
                    `questao5` FLOAT NULL,
                    `questao6` FLOAT NULL,
                    `questao7` FLOAT NULL,
                    `questao8` FLOAT NULL,
                    `questao9` FLOAT NULL,
                    `questao10` FLOAT NULL,
                    `questao11` FLOAT NULL,
                    `questao12` FLOAT NULL,
                    `questao13` FLOAT NULL,
                    `questao14` FLOAT NULL,
                    `questao15` FLOAT NULL,
                    `questao16` FLOAT NULL,
                    `questao17` FLOAT NULL,
                    `questao18` FLOAT NULL,
                    PRIMARY KEY (`id_gerente`),
                    UNIQUE INDEX `setor_UNIQUE` (`setor` ASC) VISIBLE)
                ENGINE = InnoDB;
                ";

    executeCommand(($command));
}


function dropTableGerentes(){
    $command = "DROP TABLE IF EXISTS gerentes;";
    dropTable($command,'funcionarios');
}