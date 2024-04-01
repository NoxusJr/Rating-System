<?php

$directoryController = dirname(__DIR__);
$directoryModel = dirname(dirname(__DIR__));
require_once $directoryController."/cookies.php";
require_once $directoryController."/message.php";
require_once $directoryModel."/model/delete.php";



function middleDeleteQuestion($idQuestion){
    $result = deleteQuestion($idQuestion);
    $bool = $result[0];

    if (!$bool){
        $pageRedirect = "/Mvc/view/pages/adm/questions.php";
    } else {
        $pageRedirect = "/Mvc/view/pages/adm/questions.php";
    }

    setMessageDeleteQuestion($bool);

    return $pageRedirect;
}


function middleDeleteWorker($idUser){
    $result = deleteWorker($idUser);
    $bool = $result[0];

    if (!$bool){
        $pageRedirect = "/Mvc/view/pages/adm/workers.php";
    } else {
        $pageRedirect = "/Mvc/view/pages/adm/workers.php";
    }

    setMessageDeleteWorker($bool);

    return $pageRedirect;
}


function middleDeleteSector($idSector){
    $result = deleteSector($idSector);
    $bool = $result[0];

    if (!$bool){
        $pageRedirect = "/Mvc/view/pages/adm/sectors.php";
    } else {
        $pageRedirect = "/Mvc/view/pages/adm/sectors.php";
    }

    setMessageDeleteSector($bool);

    return $pageRedirect;
}