<?php 

$directoryReturnQuestions = dirname(dirname(__DIR__));
require $directoryReturnQuestions. '/database/config/connection.php';


function checkLoginAlreadyExists(string $login){
    global $pdo;
    
    $command = "SELECT * FROM usuarios WHERE login =:login";
    $cursor = $pdo->prepare($command);
    $cursor->bindValue(":login", $login);
    $cursor->execute();
    $data = $cursor->fetch(PDO::FETCH_ASSOC);

    if (!$data) {
        return [false,'Conta nao encontrada'];
    } else {
        return [true,$data];
    }
}
