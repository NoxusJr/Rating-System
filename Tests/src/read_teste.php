<?php

$root = dirname(dirname(__DIR__));
require_once $root."/Mvc/model/read.php";


function executeReadTest(){

    $login = "40028922";
    $password = "admin";

    $resTrueLogin = loginAccount($login,$password);
    if($resTrueLogin[0]){
        $msgTrueLogin = "OK";
    } else {
        $msgTrueLogin = "ERROR: loginAccount -> resTrueLogin (line 12)";
    }
    echo $msgTrueLogin;



    $resFalseLogin = loginAccount($login,"oxivei");
    if(!$resFalseLogin[0]){
        $msgFalseLogin = "OK";
    } else {
        $msgFalseLogin = "ERROR: loginAccount -> resFalseLogin (line 22)";
    }
    echo $msgFalseLogin;
}