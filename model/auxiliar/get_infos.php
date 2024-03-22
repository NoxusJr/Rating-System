<?php


function getNameSector($idSector){
    global $pdo;
    $command = "SELECT nome FROM setores WHERE id_setor = :idSector";
    $cursor = $pdo->prepare($command);
    $cursor->bindParam(':idSector',$idSector, PDO::PARAM_INT);
    $cursor->execute();

    $result = $cursor->fetch(PDO::FETCH_ASSOC);

    return $result;
}


function toAssess($sector){
    $infos = getQuestions($sector);
    $sizeInfo = count($infos);
    $state = false;

    if($sizeInfo >=1){
        $state = true;
    }

    return [$state,$infos,$sizeInfo];
}