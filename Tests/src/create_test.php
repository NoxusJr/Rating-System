<?php

$root = dirname(dirname(__DIR__));
require_once $root."/Mvc/model/create.php";


function executeCreateTest(){
    if (session_status() == PHP_SESSION_NONE){
        session_start();
    }

    $_SESSION['idUser'] = 1;

    $resCreateSector = createNewSector("TI");
    if ($resCreateSector[0]){
        echo "OK: createNewSector()\n";
    } else {
        $e = $resCreateSector[1];
        echo "ERROR: createNewSector() --> $e\n";
    }

    echo "-------------------\n";

    $resCreateAccount = createWorkerAccount("George",1);
    if ($resCreateAccount[0]){
        echo "OK: createWorkerAccount()\n";
    } else {
        $e = $resCreateAccount[1];
        echo "ERROR: createWorkerAccount() -> $e\n";
    }

    echo "-------------------\n";

    $resCreateNewQuestion = createNewQuestion("Voce gosta de php?",1);
    if ($resCreateNewQuestion[0]){
        echo "OK: createNewQuestion()\n";
    } else {
        $e = $resCreateNewQuestion[1];
        echo "ERROR: createNewQuestion() -> $e\n";
    }

    echo "-------------------\n";

    $resCreateRating = createRating([5],[1]);
    if ($resCreateRating[0]){
        echo "OK: createRating()\n";
    } else {
        $e = $resCreateRating[1];
        echo "ERROR: createRating()\n";
    }

    echo "-------------------\n";
}

executeCreateTest();