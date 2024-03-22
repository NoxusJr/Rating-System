<?php

$directoryGetNameSector = dirname(__DIR__);
require_once $directoryGetNameSector. "/model/auxiliar/get_infos.php";

function setMensageCookie($type,$msg){
    session_start();
    
    $types = ['error','response'];
    $_SESSION[$type] = $msg;
}


function setSessionCookies($idUser,$permission,$idSetor){
    session_start();
    
    $_SESSION['idUser'] = $idUser;
    $_SESSION['permission'] = $permission;

    if ($permission = 'funcionario'){
        $nomeSetor = getNameSector($idSetor);

        $_SESSION['idSetor'] = $idSetor;
        $_SESSION['nomeSetor'] = $nomeSetor['nome'];
    }
}