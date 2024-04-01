<?php

$directoryController = dirname(__DIR__);
$directoryModel = dirname(dirname(__DIR__));
require_once $directoryController."/cookies.php";
require_once $directoryController."/message.php";
require_once $directoryModel."/model/create.php";


function middleCreateWorkerAccount($name,$idSector){
    $result = createWorkerAccount($name,$idSector);
    $bool = $result[0];

    if (!$bool){
        $pageRedirect = "/Mvc/view/pages/adm/workers.php";
    } else {
        $pageRedirect = "/Mvc/view/pages/adm/workers.php";
    }

    setMessageCreateWorkerAccount($bool);

    return $pageRedirect;
}


function middleCreateNewSector($name){
    $result = createNewSector($name);
    $bool = $result[0];

    if (!$bool){
        $pageRedirect = "/Mvc/view/pages/adm/sectors.php";
    } else {
        $pageRedirect = "/Mvc/view/pages/adm/sectors.php";
    }

    setMessageCreateNewSector($bool);

    return $pageRedirect;
}


function middleCreateNewQuestion($question,$idSector){
    $result = createNewQuestion($question,$idSector);
    $bool = $result[0];

    if (!$bool){
        $pageRedirect = "/Mvc/view/pages/adm/questions.php";
    } else {
        $pageRedirect = "/Mvc/view/pages/adm/questions.php";
    }

    setMessageCreateNewQuestion($bool);

    return $pageRedirect;
}


function middleCreateRating($responses,$idQuestions){
    $result = createRating($responses,$idQuestions);
    $bool = $result[0];

    if (!$bool){
        $pageRedirect = "/Mvc/view/pages/worker/homeWorker.php";
    } else {
        $pageRedirect = "/Mvc/view/pages/worker/homeWorker.php";
    }

    setMessageCreateRating($bool);

    return $pageRedirect;
}