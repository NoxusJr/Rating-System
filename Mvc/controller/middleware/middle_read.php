<?php

$directoryController = dirname(__DIR__);
$directoryModel = dirname(dirname(__DIR__));
require_once $directoryController."/cookies.php";
require_once $directoryController."/message.php";
require_once $directoryModel."/model/read.php";


function middleLoginAccount($login,$password){
    $result = loginAccount($login,$password);
    $bool = $result[0];

    if (!$bool){
        $pageRedirect = "/";
    } else {
        if ($result[1]['permission'] == 'admin')
            $pageRedirect = "/Mvc/view/pages/adm/homeAdm.php";
        else{
            $pageRedirect = "/Mvc/view/pages/worker/homeWorker.php";
        }
    }
    
    setCookieLogin($result[1]);

    return $pageRedirect;
}


function middleGetQuestions($idSector){
    $result = getQuestions($idSector);
    $bool = $result[0];

    if (!$bool){
        $pageRedirect = "";
        header("Location: $pageRedirect");
        exit();

    } else {
        $data = $result[1];
        $questions = array();

        for($i=0;$i < count($data); $i++){
            $newArray = array(
                "titleQuestion"=>$data[$i]['question'],
                "dataBaseIdQuestion"=>$data[$i]['id_question'],
                "name"=>"question-$i",
                "idDiv"=>"$i",
                "idLinkLabel-1"=>"q-$i-1",
                "idLinkLabel-2"=>"q-$i-2",
                "idLinkLabel-4"=>"q-$i-4",
                "idLinkLabel-5"=>"q-$i-5",
            );
    
            array_push($questions,$newArray);
        }

        return $questions;
    }
}


function middleGetAllQuestions(){
    $result = getAllQuestions();
    $questions = $result[1];

    return $questions;
}


function middleGetAllSectors(){
    $result = getAllSectors();
    $sectors = $result[1];

    return $sectors;
}


function middleGetAllWorkers(){
    $result = getAllWorkers();
    $workers = $result[1];

    return $workers;
}


function middleRatingAvailable($idUser){
    $result = ratingAvailable($idUser);
    $bool = $result[0];

    if ($bool){
        $date = $result[1];
        $currentDate = date('Y-m-d');
        
        $date = new DateTime($date);
        $currentDate = new DateTime($currentDate);
        
        $interval = $currentDate->diff($date);
        $interval = $interval->days;
        
        if ($interval > 30){
            $available = true;
        } else {
            $available = false;
        }

        return $available;
    } else {
        $available = false;

        return $available;
    }
}


function middleGetMyDateRatings($idUser){
    $result = getMyDateRatings($idUser);
    $bool = $result[0];

    if($bool){
        return $result[1];
    }
}

function middleGetMediaQuestions(){
    $result = getMediaQuestions();
    $bool = $result[0];

    if($bool){
        return $result[1];
    }
}