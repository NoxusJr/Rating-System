<?php

require_once '../config/execute_commands.php';

function createTableAvaliacoes(){

    $command = "CREATE TABLE IF NOT EXISTS `evaluation_system`.`avaliacoes` (
                `id_avaliacao` INT NOT NULL AUTO_INCREMENT,
                `data_avaliacao` DATE NOT NULL,
                `id_usuarios` INT NOT NULL,
                `id_questao` INT NOT NULL,
                `nota_questao` INT NOT NULL,
                INDEX `fk_avaliacoes_funcioanrios1_idx` (`id_usuarios` ASC),
                PRIMARY KEY (`id_avaliacao`),
                CONSTRAINT `fk_avaliacoes_funcioanrios1`
                    FOREIGN KEY (`id_usuarios`)
                    REFERENCES `evaluation_system`.`funcionarios` (`id_usuarios`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION,
                CONSTRAINT `fk_avaliacoes_questoes`
                    FOREIGN KEY (`id_questao`)
                    REFERENCES `evaluation_system`.`questoes` (`id_questao`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION
            ) ENGINE = InnoDB;
            ";

    executeCommand(($command));
}


function dropTableAvaliacoes(){

    $command = "DROP TABLE IF EXISTS avaliacoes;";

    dropTable($command);
}