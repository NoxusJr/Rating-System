<?php

require_once '../config/execute_commands.php';

function createTableAvaliacoes(){

    $command = "CREATE TABLE IF NOT EXISTS `evaluation_system`.`avaliacoes` (
                    `id_avaliacao` INT NOT NULL AUTO_INCREMENT,
                    `data_avaliacao` DATE NOT NULL,
                    `id_funcionario` INT NOT NULL,
                    INDEX `fk_avaliacoes_funcioanrios1_idx` (`id_funcionario` ASC) VISIBLE,
                    PRIMARY KEY (`id_avaliacao`),
                    CONSTRAINT `fk_avaliacoes_funcioanrios1`
                    FOREIGN KEY (`id_funcionario`)
                    REFERENCES `evaluation_system`.`funcionarios` (`id_funcionario`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION)
                ENGINE = InnoDB;";

    executeCommand(($command));
}


function dropTableAvaliacoes(){

    $command = "DROP TABLE IF EXISTS avaliacoes;";

    dropTable($command);
}