<?php

$root = dirname(dirname(__DIR__));
require_once $root."/Mvc/model/create.php";


function executeCreateTest(){

    $name = "George";
    $permission = "funcionario";
    $idSector = 1;

    $resTrueCNS = createNewSector("setorTeste");
    if($resTrueCNS[0]){
        $msgTrueCNS = "OK";
    } else {
        $msgTrueCNS = "ERROR: createNewSector -> resTrueCNS (line 13)";
    }
    echo "$msgTrueCNS\n";



    $resFalseCNS = createNewSector("");
    if($resFalseCNS[0] === false){
        $msgFalseCNS = "OK";
    } else {
        $msgFalseCNS = "ERROR: createNewSector -> resFalseCNS (line 23)";
    }
    echo "$msgFalseCNS\n";
    


    $resTrueCWA = createWorkerAccount($name,$permission,$idSector);
    if($resTrueCWA[0]){
        $msgTrueCWA = "OK";
    } else {
        $msgTrueCWA = "ERROR: createWorkerAccount -> resTrueCWA (line 33)";
    }
    echo "$msgTrueCWA\n";



    $resFalseCWA = createWorkerAccount($name,$permission,"ola");
    if($resFalseCWA[0] === false){
        $msgFalseCWA = "OK";
    } else {
        $msgFalseCWA = "ERROR: createWorkerAccount -> resFalseCWA (line 43)";
    }
    echo "$msgFalseCWA\n";
}

executeCreateTest();