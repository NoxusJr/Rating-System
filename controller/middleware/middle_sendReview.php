<?php

$directory = dirname(dirname(__DIR__));
$directorySetAlert = dirname(__DIR__);
require_once $directorySetAlert."/sessionCookies.php";
require_once $directory."/model/crud/send_review.php";


function middleSendReview($q1,$q2,$q3,$q4,$q5,$q6,$q7,$q8,$q9,$q10,$q11,$q12,$q13,$q14,$q15,$q16,$q17,$q18){
    global $viewDirectory;
    $id_user_session =0 ;
    $response = [$q1,$q2,$q3,$q4,$q5,$q6,$q7,$q8,$q9,$q10,$q11,$q12,$q13,$q14,$q15,$q16,$q17,$q18];
    $result = sendReview($response,$id_user_session);
    
    if($result[0]){
        setMensageCookie();
        $redirectPage = "/Management-System/view/bom.php";
    } else {
        $redirectPage = 'deu ruim';
    }

    return $redirectPage;
}