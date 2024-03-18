<?php

$directory = dirname(dirname(__DIR__));
$directoryAuxiliar = dirname(__DIR__);
require_once $directoryAuxiliar."/auxiliar/account_generator.php";
require_once $directory. "/database/config/connection.php";
require_once $directory. "/security/anti_duplicate_login.php";


function registerWorker(string $nome,string $id_gerente){
    global $pdo;
    
    $senha = generatePassword();
    $login = generateLogin();
    echo "LOGIN: $login || SENHA: $senha";
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