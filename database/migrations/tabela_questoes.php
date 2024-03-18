<?php

require_once '../config/helper_commands_migrations.php';

function createTableQuestoes(){

    $command = "CREATE TABLE IF NOT EXISTS `evaluation_system`.`questoes` (
                    `id_questao` INT NOT NULL AUTO_INCREMENT,
                    `questao` VARCHAR(50) NOT NULL,
                PRIMARY KEY (`id_questao`)
                ) ENGINE=InnoDB;";

    executeInternalCommand($command);
}


function dropTableQuestoes(){
    $command = "DROP TABLE IF EXISTS questoes;";

    dropTable($command);
}