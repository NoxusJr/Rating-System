<?php

$directoryReturnQuestions = dirname(dirname(__DIR__));
$directorySetAlert = dirname(__DIR__);
require_once $directorySetAlert."/sessionCookies.php";
require_once $directoryReturnQuestions."/model/crud/return_questions.php";


function getQuestions($sector){
    $data = returnQuestion($sector);

    $result = array();

    for($i=0;$i < count($data); $i++){
        $newArray = array(
            "titleQuestion"=>$data[$i]['questao'],
	        "dataBaseIdQuestion"=>$data[$i]['id_questao'],
            "name"=>"question-$i",
            "idDiv"=>"$i",
            "idLinkLabel-1"=>"q-$i-1",
            "idLinkLabel-2"=>"q-$i-2",
            "idLinkLabel-4"=>"q-$i-4",
            "idLinkLabel-5"=>"q-$i-5",
        );

        array_push($result,$newArray);
    }

    return $result;
}