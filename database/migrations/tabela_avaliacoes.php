<?php

require_once '../config/helper_commands_migrations.php';

function createTableAvaliacoes(){

    $command = "CREATE TABLE IF NOT EXISTS `evaluation_system`.`avaliacoes` (
                `id_avaliacao` INT NOT NULL AUTO_INCREMENT,
                `data_avaliacao` DATE NOT NULL,
                `id_usuario` INT NOT NULL,
                `id_questao` INT NOT NULL,
                `nota_questao` INT NOT NULL,
                INDEX `fk_avaliacoes_usuarios1_idx` (`id_usuario` ASC),
                PRIMARY KEY (`id_avaliacao`),
                CONSTRAINT `fk_avaliacoes_usuarios1`
                    FOREIGN KEY (`id_usuario`)
                    REFERENCES `evaluation_system`.`usuarios` (`id_usuario`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION,
                CONSTRAINT `fk_avaliacoes_questoes`
                    FOREIGN KEY (`id_questao`)
                    REFERENCES `evaluation_system`.`questoes` (`id_questao`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION
            ) ENGINE = InnoDB;
            ";

    executeInternalCommand(($command));
}


function dropTableAvaliacoes(){

    $command = "DROP TABLE IF EXISTS avaliacoes;";

    dropTable($command);
}