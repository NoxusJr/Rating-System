<?php


function setUserTests(){
    require_once "../config/helper_commands_migrations.php";

    $senha = password_hash('teste', PASSWORD_DEFAULT);
    $command = "INSERT INTO usuarios (nome,login,senha,permissao) VALUES ('T1','00000000','$senha','funcionario')";

    executeInternalCommand($command);
}