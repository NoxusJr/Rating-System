<?php

function registerWorker(string $nome, string $login, string $senha,string $id_gerente){
    require_once "../database/config/connection.php";
    
    $command = "SELECT us.login FROM usuarios as us WHERE us.login = :login";
    $cursor = $pdo->prepare($command);

    $cursor->bindValue(":login", $login);

    $cursor->execute();

    $data = $cursor->fetchAll(PDO::FETCH_ASSOC);

    if (count($data) > 0){
        return [false, "Login ja existe"];
    }
    
    $hashSenha = password_hash($senha, PASSWORD_DEFAULT);
    
    $command = "INSERT INTO usuarios(nome, login, senha,permissao, id_gerente) VALUES (:nome, :login, :senha,:permissao, :id_gerente)";
    $cursor = $pdo->prepare($command);

    $cursor->bindValue(":nome", $nome);
    $cursor->bindValue(":login", $login);
    $cursor->bindValue(":senha", $hashSenha);
    $cursor->bindValue(":permissao", 'funcionario');
    $cursor->bindValue(":id_gerente", $id_gerente);

    $status = $cursor->execute();

    if ($status){
        return [true, 'Conta criada'];
    } else {
        return [false, 'Ocorreu um erro ao tentar criar a conta'];
    }
}

