<?php

if (session_status() == PHP_SESSION_NONE){
    session_start();
}

echo "CERTIFIQUE-SE DE CONFIGURAR O .ENV PARA TESTE\n";
echo "[1] - Continuar\n";
echo "[2] - Sair\n";

$input = fgets(STDIN);
$input = rtrim($input);

if($input == "1"){
    require_once __DIR__ . "/src/prepare_db.php";
    require_once __DIR__ . "/src/create_test.php";
    require_once __DIR__ . "/src/read_test.php";        
    require_once __DIR__ . "/src/delete_test.php";        
}