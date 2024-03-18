<?php

require_once __DIR__ . '/alerts.php';

function midleCreateWorkerAccount(string $nome, string $login, string $senha, string $setor){
    require_once "../model/account_worker.php";

    $id_gerente = 0;
    $result = registerWorker($nome,$login,$senha,$id_gerente);

    if($result[0]){
        setAlertCookie();
        $redirectPage = 'pagina deu tudo certo';
    } else {
        setAlertCookie();
        $redirectPage = 'pagina deu ruim fml';
    }

    return $redirectPage;
}


function midleCreateManagerAccount(string $nome, string $setor){
    require_once "../model/account_manager.php";

    $result = registerManager($nome,$setor);

    if($result[0]){
        setAlertCookie();
        $redirectPage = 'pagina deu tudo certo';
    } else {
        setAlertCookie();
        $redirectPage = 'pagina deu ruim fml';
    }

    return $redirectPage;
}


function midleLoginAccount(string $login, string $senha){
    require_once "../model/account_login.php";

    $result = loginAccount($login, $senha);

    if($result[0]){
        setLevelPermissionsCookie();
        setAlertCookie();

        if($result[1] == 'funcionario'){
            $redirectPage = 'pagina deu tudo certo funcionario';
        } else if ($result[1] == 'admin'){
            $redirectPage = 'pagina deu tudo certo adm porra';
        }
    } else {
        setAlertCookie();
        $redirectPage = 'pagina deu ruim fml';
    }

    return $redirectPage;
}


function midleSendReview($q1,$q2,$q3,$q4,$q5,$q6,$q7,$q8,$q9,$q10,$q11,$q12,$q13,$q14,$q15,$q16,$q17,$q18){
    require_once "../model/send_review.php";
    
    $id_user_session;
    $response = [$q1,$q2,$q3,$q4,$q5,$q6,$q7,$q8,$q9,$q10,$q11,$q12,$q13,$q14,$q15,$q16,$q17,$q18];
    $result = sendReview($response,$id_user_session);

    if($result[0]){
        setAlertCookie();
        $redirectPage = 'deu bom';
    } else {
        $redirectPage = 'deu ruim';
    }

    return $redirectPage;
}