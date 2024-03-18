<?php


$directory = dirname(dirname(__DIR__));
$directorySetAlert = dirname(__DIR__);
require_once $directorySetAlert."/sessionCookies.php";
require_once $directory."/model/crud/account_manager.php";


function middleCreateManagerAccount(string $nome, string $setor){
    global $viewDirectory;
    $result = registerManager($nome,$setor);

    if($result[0]){
        setMensageCookie();
        $redirectPage = "/Management-System/view/bom.php";
    } else {
        setMensageCookie();
        $redirectPage = 'pagina deu ruim fml';
    }

    return $redirectPage;
}