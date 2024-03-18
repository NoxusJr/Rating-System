<?php

$directory = dirname(dirname(__DIR__));
$directorySetAlert = dirname(__DIR__);
require_once $directorySetAlert."/sessionCookies.php";
require_once $directory."/model/crud/account_login.php";


function middleLoginAccount(string $login, string $senha){
    global $viewDirectory;
    $result = loginAccount($login, $senha);

    if($result[0]){
        $id_user = $result[1][0];
        $permission = $result[1][1];
        setSessionCookies($id_user,$permission);
        setMensageCookie();

        if($permission == 'teste'){
            $redirectPage = "/Management-System/view/bom.php";
        } else if ($permission == 'admin'){
            $redirectPage = 'pagina deu tudo certo adm porra';
        }
    } else {
        setMensageCookie();
        $redirectPage = 'pagina deu ruim fml';
    }

    return $redirectPage;
}
