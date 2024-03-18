<?php

function loginAccount(string $login, string $senha){
    require_once "../database/config/connection.php";

    $command = 'SELECT login, senha FROM usuarios WHERE login = :login';

    $cursor = $pdo->prepare($command);
    $cursor->bindValue(":login", $login);
    $cursor->execute();
    $data = $cursor->fetch(PDO::FETCH_ASSOC);

    if (!$data) {
        return [false,'Conta nao encontrada'];
    }

    $hash = $data['senha'];
    $result = password_verify($senha, $hash);

    if ($result){
        $level = $data['permissao'];

        return [$result,$level];
    } else {
        return [false,'Senha incorreta'];
    }
}