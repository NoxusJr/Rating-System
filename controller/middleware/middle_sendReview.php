<?php

$directoryReturnQuestions = dirname(dirname(__DIR__));
$directorySetAlert = dirname(__DIR__);
require_once $directorySetAlert."/sessionCookies.php";
require_once $directoryReturnQuestions."/model/crud/send_review.php";


function middleSendReview($validation,$response,$idQuestions){

    if ($validation == false){
        setMensageCookie('error','Marque a resposta de todas as perguntas');
        $redirectPage = "../view/pages/worker/toAssess.php";
    
    } else {
        session_start();

        $idUserSession = $_SESSION['idUser'] ;
        $result = sendReview($response,$idUserSession,$idQuestions);
        
        if($result[0]){
            setMensageCookie('response','Avaliação enviada com sucesso');
            $redirectPage = "../view/pages/worker/homeWorker.php";
        } else {
            setMensageCookie('error','Ocorreu um erro interno ao enviar a avaliação');
            $redirectPage = "../view/pages/worker/toAssess.php";
        }
    }

    return $redirectPage;
}