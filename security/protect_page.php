<?php


function checkUserPermission($permisison){
    $userPermission = $_SESSION['permission'];

    if ($permisison != $userPermission){
        header("Location: /");
    } 
}


function checkAvailableEvaluation($option){
    $lastEvaluation = '';
    
    if ($option == 'render'){
        
    }


}