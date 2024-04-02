<?php

$root= dirname(dirname(dirname(__DIR__)));
require_once $root."/Database/config/connection.php";


function checkLoginAlreadyExist($login){
    global $pdo;
    
    $command = "SELECT * FROM users WHERE login= :login";

    $cursor = $pdo->prepare($command);

    $cursor->bindParam(':login',$login);

    $cursor->execute();

    $data = $cursor->fetchAll(PDO::FETCH_ASSOC);

    if (count($data) > 0){
        return true;
    } else {
        return false;
    }
}