<?php 

require_once '../migrations/tabela_administradores.php';
require_once '../migrations/tabela_avaliacoes.php';
require_once '../migrations/tabela_funcionarios.php';
require_once '../migrations/tabela_gerentes.php';

$table = $argv[1];

function especificReset($table){
    $table = "dropTable$table";
    $table();

    require './run.php';
}


especificReset($table);