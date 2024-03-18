<?php


$directory = dirname(dirname(__DIR__));
$directorySetAlert = dirname(__DIR__);
require_once $directorySetAlert."\sessionCookies.php";
require_once $directory."/model/crud/account_worker.php";

function middleCreateWorkerAccount(string $nome, string $login, string $senha, string $setor){
    global $viewDirectory;
    $id_gerente = 0;
    $result = registerWorker($nome,$id_gerente);

    if($result[0]){
        setMensageCookie();
        $redirectPage = "/Management-System/view/bom.php";
    } else {
        setMensageCookie();
        $redirectPage = 'pagina deu ruim fml';
    }

    return $redirectPage;
}