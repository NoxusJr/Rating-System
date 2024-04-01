<?php

$root = dirname(dirname(__DIR__));
require_once $root."/Mvc/model/read.php";


function executeReadTest(){

    if (session_status() == PHP_SESSION_NONE){
        session_start();
    }


    $resLogin = loginAccount('40028922','admin');
    if ($resLogin[0]){
        echo "OK: loginAccount()\n";
    } else {
        $e = $resLogin[1];
        echo "ERROR: loginAccount() --> $e\n";
    }

    echo "-------------------\n";

    $resGetQuestions = getQuestions(1);
    if ($resGetQuestions[0]){
        echo "OK: getQuestions()\n";
    } else {
        $e = $resGetQuestions[1];
        echo "ERROR: getQuestions() --> $e\n";
    }

    echo "-------------------\n";

    $resGetAllQuestions = getAllQuestions();
    if ($resGetAllQuestions[0]){
        echo "OK: getAllQuestions()\n";
    } else {
        $e = $resGetAllQuestions[1];
        echo "ERROR: getAllQuestions() --> $e\n";
    }

    echo "-------------------\n";

    $resGetAllSectors = getAllSectors();
    if ($resGetAllSectors[0]){
        echo "OK: getAllSectors()\n";
    } else {
        $e = $resGetAllSectors[1];
        echo "ERROR: getAllSectors() --> $e\n";
    }

    echo "-------------------\n";

    $resGetAllWorkers = getAllWorkers();
    if ($resGetAllWorkers[0]){
        echo "OK: getAllWorkers()\n";
    } else {
        $e = $resGetAllWorkers[1];
        echo "ERROR: getAllWorkers() --> $e\n";
    }

    echo "-------------------\n";

    $resRatingAvailable = ratingAvailable(1);
    if ($resRatingAvailable[0]){
        echo "OK: ratingAvailable()\n";
    } else {
        $e = $resRatingAvailable[1];
        echo "ERROR: ratingAvailable() --> $e\n";
    }

    echo "-------------------\n";

    $resGetMyDateRatings = getMyDateRatings(1);
    if ($resGetMyDateRatings[0]){
        echo "OK: getMyDateRatings()\n";
    } else {
        $e = $resGetMyDateRatings[1];
        echo "ERROR: getMyDateRatings() --> $e\n";
    }

    echo "-------------------\n";

    $resGetMediaQuestions = getMediaQuestions();
    if ($resGetMediaQuestions[0]){
        echo "OK: getMediaQuestions()\n";
    } else {
        $e = $resGetMediaQuestions[1];
        echo "ERROR: getMediaQuestions() --> $e\n";
    }

    echo "-------------------\n";
}

executeReadTest();