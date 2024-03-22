<?php

$directoryReturnQuestions = dirname(__DIR__);
require_once $directoryReturnQuestions."/auxiliar/check_login_exists.php";


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
        $info = [$data['id_usuario'],$data['permissao'],$data['id_setor']];

        return [$result,$info];
    } else {
        return [false,'Senha incorreta'];
    }
}