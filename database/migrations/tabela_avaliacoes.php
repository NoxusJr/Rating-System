<?php

require_once '../config/helper_commands_migrations.php';

function createTableAvaliacoes(){

    $command = "CREATE TABLE IF NOT EXISTS `hg5pss68_mengao`.`avaliacoes` (
                    `id_avaliacao` INT NOT NULL AUTO_INCREMENT,
                    `data` DATE NOT NULL,
                    `id_usuario` INT NOT NULL,
                    `id_questao` INT NOT NULL,
                    `nota` VARCHAR(45) NOT NULL,
                PRIMARY KEY (`id_avaliacao`),
                INDEX `fk_avaliacoes_questoes1_idx` (`id_questao` ASC) VISIBLE,
                INDEX `fk_avaliacoes_usuarios1_idx` (`id_usuario` ASC) VISIBLE,
                CONSTRAINT `fk_avaliacoes_questoes1`
                FOREIGN KEY (`id_questao`)
                REFERENCES `hg5pss68_mengao`.`questoes` (`id_questao`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION,
                CONSTRAINT `fk_avaliacoes_usuarios1`
                FOREIGN KEY (`id_usuario`)
                REFERENCES `hg5pss68_mengao`.`usuarios` (`id_usuario`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)
                ENGINE = InnoDB;";

    executeInternalCommand(($command));
}


function dropTableAvaliacoes(){

    $command = "DROP TABLE IF EXISTS avaliacoes;";

    dropTable($command);
}