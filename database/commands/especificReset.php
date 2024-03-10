<?php 

$table = $argv[1];

function especificReset($table){
    $table = "drop$table";
    $table();

    require './run.php';
    run();
}


especificReset(($table));