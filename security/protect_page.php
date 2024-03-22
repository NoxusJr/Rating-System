<?php

$directoryRoot = dirname(__DIR__);
require_once $directoryRoot."/controller/middleware/middle_return_questions.php";


function protectPage($permissionRequired,$redirectPage,$loadData=false){

    if ($permissionRequired === $_SESSION['permission']){
        
        if ($loadData == true){
            $data = getQuestions($_SESSION['idSetor']);

            if(count($data) <= 0){
                header("Location: $redirectPage");

            } else {
                return [$data,count($data)];
            }

        }

    } else {
        header("Location: $redirectPage");
    } 
}