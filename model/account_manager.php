<?php


function registerManager(string $nome, string $setor){
    require_once "../database/config/connection.php";

    $command = "INSERT INTO gerentes(nome, setor) VALUES (:nome, :setor)";
    $cursor =$pdo->prepare($command);

    $cursor->bindValue(":nome", $nome);
    $cursor->bindValue(":setor", $setor);

    $status = $cursor->execute();

    if ($status){
        return [true, "Gerente criado"];
    } else {
        return [false, "Erro ao tentar criar gerente"];
    }
}