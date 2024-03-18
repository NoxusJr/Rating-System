<?php

function midleCreateWorkerAccount(string $nome, string $login, string $senha, string $setor){
    require_once "../model/account_worker.php";

    $id_gerente = 0;
    $result = registerWorker($nome,$login,$senha,$id_gerente);

    if($result[0]){
        $redirectPage = 'pagina deu tudo certo';
    }

    return $redirectPage;
}


function midleCreateManagerAccount(string $nome, string $setor){
    require_once "../model/account_manager.php";

    $result = registerManager($nome,$setor);

    return $redirectPage;
}


function midleLoginAccount(string $login, string $senha){
    require_once "../model/account_login.php";

    $result = loginAccount($login, $senha);

    return $redirectPage;
}