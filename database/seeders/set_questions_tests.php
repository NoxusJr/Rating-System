<?php


function setQuestionsTests(){
    require_once "../config/helper_commands_migrations.php";

    $command = "INSERT INTO `questoes` (`questao`, `id_setor`) VALUES ('Questão 1', 1), ('Questão 2', 1), ('Questão 3', 1), ('Questão 4', 1), ('Questão 5', 1), ('Questão 6', 1), ('Questão 7', 1), ('Questão 8', 1), ('Questão 9', 1), ('Questão 10', 1);";

    executeInternalCommand($command);
}