<?php

require_once '../config/helper_commands_migrations.php';

function createTableSetores(){

    $command = "CREATE TABLE IF NOT EXISTS `hg5pss68_mengao`.`setores` (
                    `id_setor` INT NOT NULL AUTO_INCREMENT,
                    `nome` VARCHAR(45) NOT NULL,
                PRIMARY KEY (`id_setor`),
                UNIQUE INDEX `nome_UNIQUE` (`nome` ASC) VISIBLE)
                ENGINE = InnoDB;
                ";

    executeInternalCommand(($command));
}


function dropTableSetores(){
    $command = "DROP TABLE IF EXISTS setores;";
    dropTable($command,'questoes');
}