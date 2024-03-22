<?php

$directoryMiddle = __DIR__;

require_once $directoryMiddle."/middleware/middle_loginAccount.php";
require_once $directoryMiddle."/middleware/middle_sendReview.php";

$route = $_POST['route'] ?? '/';


switch ($route){
    case '/':
        header('Location: /');
        break;


    case '/loginAccount':
        $login = getSecureParameter($_POST,'login','/');
        $password = getSecureParameter($_POST,'password','/');

        $redirectPage = middleLoginAccount($login,$password);
        header("Location: $redirectPage");
        break;


    case '/createAccountt':
        $nome = getSecureParameter($_POST,'nome','/');

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