<?php

require_once '../config/helper_commands_migrations.php';

function createTableUsuarios(){

    $command = "CREATE TABLE IF NOT EXISTS `hg5pss68_mengao`.`usuarios` (
                    `id_usuario` INT NOT NULL AUTO_INCREMENT,
                    `nome` VARCHAR(64) NOT NULL,
                    `login` VARCHAR(64) NOT NULL,
                    `senha` VARCHAR(64) NOT NULL,
                    `permissao` VARCHAR(30) NOT NULL,
                    `id_setor` INT NULL,
                PRIMARY KEY (`id_usuario`),
                INDEX `fk_usuarios_setores_idx` (`id_setor` ASC) VISIBLE,
                CONSTRAINT `fk_usuarios_setores`
                FOREIGN KEY (`id_setor`)
                REFERENCES `hg5pss68_mengao`.`setores` (`id_setor`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)
                ENGINE = InnoDB; ";

    executeInternalCommand(($command));
}


function dropTableUsuarios(){

    $command = "DROP TABLE IF EXISTS usuarios;";

    dropTable($command,'avaliacoes');
}