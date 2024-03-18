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


    case '/login_account':
        $login = getSecureParameter($_POST,'login','/');
        $senha = getSecureParameter($_POST,'senha','/');

        $redirectPage = middleLoginAccount($login,$senha);
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


    case '/send_review':
        $q1= getSecureParameter($_POST,'q1','/');
        $q2= getSecureParameter($_POST,'q2','/');
        $q3= getSecureParameter($_POST,'q3','/');
        $q4= getSecureParameter($_POST,'q4','/');
        $q5= getSecureParameter($_POST,'q5','/');
        $q6= getSecureParameter($_POST,'q6','/');
        $q7= getSecureParameter($_POST,'q7','/');
        $q8= getSecureParameter($_POST,'q8','/');
        $q9= getSecureParameter($_POST,'q9','/');
        $q10= getSecureParameter($_POST,'q10','/');
        $q11= getSecureParameter($_POST,'q11','/');
        $q12= getSecureParameter($_POST,'q12','/');
        $q13= getSecureParameter($_POST,'q13','/');
        $q14= getSecureParameter($_POST,'q14','/');
        $q15= getSecureParameter($_POST,'q15','/');
        $q16= getSecureParameter($_POST,'q16','/');
        $q17= getSecureParameter($_POST,'q17','/');
        $q18= getSecureParameter($_POST,'q18','/');

        $redirectPage = middleSendReview($q1,$q2,$q3,$q4,$q5,$q6,$q7,$q8,$q9,$q10,$q11,$q12,$q13,$q14,$q15,$q16,$q17,$q18);
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