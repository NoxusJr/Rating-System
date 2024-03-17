<?php

require_once '../config/execute_commands.php';

function createTableUsuarios(){

    $command = "CREATE TABLE IF NOT EXISTS `evaluation_system`.`usuarios` (
                    `id_usuario` INT NOT NULL AUTO_INCREMENT,
                    `nome` VARCHAR(50) NOT NULL,
                    `login` VARCHAR(64) NOT NULL,
                    `senha` VARCHAR(64) NOT NULL,
                    `permissao` VARCHAR(20) NOT NULL, 
                    `id_gerente` INT NULL,
                    PRIMARY KEY (`id_usuario`),
                    INDEX `fk_funcioanrios_gerentes_idx` (`id_gerente` ASC) VISIBLE,
                    CONSTRAINT `fk_funcioanrios_gerentes`
                    FOREIGN KEY (`id_gerente`)
                    REFERENCES `evaluation_system`.`gerentes` (`id_gerente`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION)
                ENGINE = InnoDB;";

    executeCommand(($command));
}


function dropTableUsuarios(){

    $command = "DROP TABLE IF EXISTS usuarios;";

    dropTable($command,'avaliacoes');
}