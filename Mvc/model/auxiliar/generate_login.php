<?php 

require_once __DIR__."/get_date.php";


function generateLogin(){
    $login = '';
    for ($i = 0; $i < 8; $i++) {
        $login .= mt_rand(0, 9);
    }

    $exist = checkLoginAlreadyExist($login);

    if($exist){
        return generateLogin();
    } else {
        return $login;
    }
}


function generatePassword(){
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@$';
    $password = '';

    $sizeCharacters = strlen($characters);

    for ($i = 0; $i < 12; $i++) {
        $randomIndex = rand(0, $sizeCharacters - 1);
        $password .= $characters[$randomIndex];
    }

    return $password;
}