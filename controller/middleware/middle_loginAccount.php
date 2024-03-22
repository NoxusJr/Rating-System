<?php

$directory = dirname(dirname(__DIR__));
$directorySetAlert = dirname(__DIR__);
require_once $directorySetAlert."/sessionCookies.php";
require_once $directory."/model/crud/account_login.php";


function middleLoginAccount(string $login, string $senha){
    $result = loginAccount($login, $senha);

    if($result[0]){
        $id_user = $result[1][0];
        $permission = $result[1][1];
        setSessionCookies($id_user,$permission);
        setMensageCookie('response','Login realizado com sucesso');

        if($permission == 'funcionario'){
            $redirectPage = "/view/pages/worker/homeWorker.php";
        } else if ($permission == 'admin'){
            $redirectPage = '/view/pages/adm/homeAdm.php';
        }
    } else {
        setMensageCookie('error',$result[1]);
        $redirectPage = 'view/index.php';
    }

    return $redirectPage;
}
