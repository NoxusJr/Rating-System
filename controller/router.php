<?php

require_once "./middleware/middle_createWorkerAccount.php";
require_once "./middleware/middle_createManagerAccount.php";
require_once "./middleware/middle_loginAccount.php";
require_once "./middleware/middle_sendReview.php";


$route = $_POST['route'] ?? '/';


switch ($route){
    case '/':
        header('Location: /');
        exit();


    case '/loginAccount':
        $login = getSecureParameter($_POST,'login','/');
        $password = getSecureParameter($_POST,'password','/');

        $redirectPage = middleLoginAccount($login,$password);
        header("Location: $redirectPage");
        break;


    case '/create_worker_account':
        $nome = getSecureParameter($_POST,'nome','/');
        $login = getSecureParameter($_POST,'login','/');
        $senha = getSecureParameter($_POST,'senha','/');
        $setor = getSecureParameter($_POST,'setor','/');

        $redirectPage = middleCreateWorkerAccount($nome,$login,$senha,$setor);
        header("Location: $redirectPage");
        break;


    case '/create_manager_account':
        $nome = getSecureParameter($_POST,'nome','/');
        $setor = getSecureParameter($_POST,'setor','/');

        $redirectPage = middleCreateManagerAccount($nome,$setor);
        header("Location: $redirectPage");
        break;


    case '/sendReview':
        $sourcePage = "/view/pages/worker/toAssess.php";

        $validation = getSecureParameter($_POST,'validation',$sourcePage);
        $response = getSecureParameter($_POST,'response',$sourcePage);
        $response = explode(",", $response);
        $idQuestions = getSecureParameter($_POST,'idQuestions',$sourcePage);
        $idQuestions = explode(",", $idQuestions);

        $redirectPage = middleSendReview($validation,$response,$idQuestions);
        header("Location: $redirectPage");
        break;  
}


function getSecureParameter($method,$parameter,$sourcePage){
    if (empty($method[$parameter])){
        header("Location: $sourcePage");        
    } else {
        $parameter = $method[$parameter];
        return $parameter;
    }
}