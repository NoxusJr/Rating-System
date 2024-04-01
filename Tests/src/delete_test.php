<?php

$root = dirname(dirname(__DIR__));
require_once $root."/Mvc/model/delete.php";

function executeDeleteTest(){
    $resDeleteQuestion = deleteQuestion(1);
    if(!$resDeleteQuestion[0]){
        echo "OK: deleteQuestion()\n";
    } else {
        $e = $resDeleteQuestion[1];
        echo "ERROR: deleteQuestion() --> $e\n";
    }
    
    echo "-------------------\n";

    $resDeleteWorker = deleteWorker(1);
    if(!$resDeleteWorker[0]){
        echo "OK: deleteWorker()\n";
    } else {
        $e = $resDeleteWorker[1];
        echo "ERROR: deleteWorker() --> $e\n";
    }
    
    echo "-------------------\n";

    $resDeleteSector = deleteSector(1);
    if(!$resDeleteSector[0]){
        echo "OK: deleteSector()\n";
    } else {
        $e = $resDeleteSector[1];
        echo "ERROR: deleteSector() --> $e\n";
    }
    
    echo "-------------------\n";
}

executeDeleteTest();
