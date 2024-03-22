<?php

$directory = dirname(dirname(__DIR__));
require_once $directory. "/database/config/connection.php";


function returnQuestion($sector){
    global $pdo;

    $command = "SELECT id_questao,questao FROM questoes WHERE setor =:sector";
    $cursor = $pdo->prepare($command);
    $cursor->bindValue(":sector", $sector);
    $cursor->execute();
    $data = $cursor->fetchAll(PDO::FETCH_ASSOC);
    
    return $data;
}