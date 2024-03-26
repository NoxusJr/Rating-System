<?php


function setSectorsTests(){
    require_once "../config/helper_commands_migrations.php";

    $command = "INSERT INTO setores (nome) VALUES ('SetorTeste')";

    executeInternalCommand($command);
}