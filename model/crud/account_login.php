<?php

$directory = dirname(dirname(__DIR__));
require_once $directory."/security/anti_duplicate_login.php";


function loginAccount(string $login, string $senha){
    global $pdo;

    $verifyExistLogin = checkLoginAlreadyExists($login);

    if (!$verifyExistLogin[0]) {
        return $verifyExistLogin;
    }
    
    $data = $verifyExistLogin[1];
    $hash = $data['senha'];
    $result = password_verify($senha, $hash);

    if ($result){
        $info = [$data['id_usuario'],$data['permissao']];

        return [$result,$info];
    } else {
        return [false,'Senha incorreta'];
    }
}