<?php


function setMensageCookie(){

}


function setSessionCookies($id_user,$permission){
    session_start();
    
    $_SESSION['id_user'] = $id_user;
    $_SESSION['permission'] = $permission;
}


function closeSession(){
    session_destroy();
}