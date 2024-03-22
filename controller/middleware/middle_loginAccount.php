<?php

$directoryReturnQuestions = dirname(dirname(__DIR__));
$directorySetAlert = dirname(__DIR__);
require_once $directorySetAlert."/sessionCookies.php";
require_once $directoryReturnQuestions."/model/crud/account_login.php";


function middleLoginAccount(string $login, string $senha){
    $result = loginAccount($login, $senha);
    
    if($result[0]){
        $permission = setLogin($result);

        if($permission == 'funcionario'){
            $redirectPage = "/view/pages/worker/homeWorker.php";
        } else if ($permission == 'admin'){
            $redirectPage = '/view/pages/adm/homeAdm.php';
        }
    } else {
        setMensageCookie('error',$result[1]);
        $redirectPage = '/view/index.php';
    }

    return $redirectPage;
}


function setLogin($result){
    $id_user = $result[1][0];
    $permission = $result[1][1];
    $id_setor = $result[1][2];
    setSessionCookies($id_user,$permission,$id_setor);
    setMensageCookie('response','Login realizado com sucesso');

    return $permission;
}
