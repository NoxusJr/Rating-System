<?php


function setUsersTests(){
    require_once "../config/helper_commands_migrations.php";

    $senha = password_hash('teste', PASSWORD_DEFAULT);
    $command = "INSERT INTO usuarios (nome,login,senha,permissao,id_setor) VALUES ('T1','00000000','$senha','funcionario',1)";

    executeInternalCommand($command);
}