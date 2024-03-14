<?php

require_once '../config/execute_commands.php';

function createTableFuncionarios(){

    $command = "CREATE TABLE IF NOT EXISTS `evaluation_system`.`funcionarios` (
                    `id_funcionario` INT NOT NULL AUTO_INCREMENT,
                    `nome` VARCHAR(50) NOT NULL,
                    `login` VARCHAR(64) NOT NULL,
                    `senha` VARCHAR(64) NOT NULL,
                    `id_gerente` INT NOT NULL,
                    PRIMARY KEY (`id_funcionario`),
                    INDEX `fk_funcioanrios_gerentes_idx` (`id_gerente` ASC) VISIBLE,
                    CONSTRAINT `fk_funcioanrios_gerentes`
                    FOREIGN KEY (`id_gerente`)
                    REFERENCES `evaluation_system`.`gerentes` (`id_gerente`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION)
                ENGINE = InnoDB;";

    executeCommand(($command));
}


function dropTableFuncionarios(){

    $command = "DROP TABLE IF EXISTS funcionarios;";

    dropTable($command,'avaliacoes');
}