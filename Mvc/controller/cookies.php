<?php


function setCookieLogin($data){
    if (session_status() == PHP_SESSION_NONE){
        session_start();
    }

    $idUser = $data["id_user"]; 
    $nameUser = $data["name"];
    $idSectorUser = $data["id_sector"];
    $permission = $data["permission"];

    $_SESSION["idUser"]=$idUser;
    $_SESSION["nameUser"]=$nameUser;
    $_SESSION["idSectorUser"]=$idSectorUser;
    $_SESSION["permission"]=$permission;
}