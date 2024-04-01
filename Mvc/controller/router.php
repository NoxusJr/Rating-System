<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once __DIR__ ."/middleware/middle_create.php";
    require_once __DIR__ ."/middleware/middle_read.php";


    $route = $_POST['route'] ?? '/';


    switch ($route){
        case '/':
            header('Location: /');
            break;


        case '/createWorkerAccount':
            $name = getSecureParameter($_POST,"name","/Mvc/view/pages/adm/workers.php","admin");
            $idSector = getSecureParameter($_POST,"idSector","/Mvc/view/pages/adm/workers.php","admin");
            
            $redirect = middleCreateWorkerAccount($name,$idSector);
            header("Location: $redirect");
            break;
            
            
        case '/createNewSector':
            $name = getSecureParameter($_POST,"name","/Mvc/view/pages/adm/sectors.php","admin");

            $redirect = middleCreateNewSector($name);
            header("Location: $redirect");
            break;


        case '/loginAccount':
            $login = getSecureParameter($_POST,"login","/","null");
            $password = getSecureParameter($_POST,"password","/","null");

            $redirect = middleLoginAccount($login,$password);
            header("Location: $redirect");
            break;

        
        case '/createNewQuestion':
            $question = getSecureParameter($_POST,"question","/Mvc/view/pages/adm/questions.php","admin");
            $idSector = getSecureParameter($_POST,"idSector","/Mvc/view/pages/adm/questions.php","admin");

            $redirect = middleCreateNewQuestion($question,$idSector);
            header("Location: $redirect");
            break;

            
        case '/sendReview':
            $idQuestions = getSecureParameter($_POST,"idQuestions","/Mvc/view/pages/worker/homeWorker.php","funcionario");
            $responses = getSecureParameter($_POST,"response","/Mvc/view/pages/worker/homeWorker.php","funcionario");

            $idQuestions = explode(",",$idQuestions);
            $responses = explode(",",$responses);

            $redirect = middleCreateRating($responses,$idQuestions);
            header("Location: $redirect");
            break;
    }
}



if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require_once __DIR__ ."/middleware/middle_delete.php";

    $route = $_GET['route'] ?? '/';

    switch ($route){
        case '/':
            header('Location: /');
            break;
            
            
        case '/deleteWorkerAccount':
            $idUser = getSecureParameter($_GET,"idUser","/Mvc/view/pages/adm/workers.php","admin");

            $redirectPage = middleDeleteWorker($idUser);
            header("Location: $redirectPage");
            break;
        

        case '/deleteSector':
            $idSector = getSecureParameter($_GET,"idSector","/Mvc/view/pages/adm/sectors.php","admin");

            $redirectPage = middleDeleteSector($idSector);
            header("Location: $redirectPage");
            break;


        case '/deleteQuestion':
            $idQuestion = getSecureParameter($_GET,"idQuestion","/Mvc/view/pages/adm/questions.php","admin");

            $redirectPage = middleDeleteQuestion($idQuestion);
            header("Location: $redirectPage");
            break;
    }
}



function getSecureParameter($method,$parameter,$sourcePage,$permissionRequired){
    validPermission($permissionRequired);

    if (empty($method[$parameter])){
        header("Location: $sourcePage");       
        exit();

    } else {
        $validParameter = $method[$parameter];

        if ($validParameter == "null"){
            header("Location: $sourcePage");   
            exit();

        } else {
            return $validParameter;
        }
    }
}


function validPermission($permissionRequired){
    if ($permissionRequired != "null"){
        if (session_status() == PHP_SESSION_NONE){
            session_start();
        }
        
        $permission = $_SESSION['permission'];
        
        if ($permission != $permissionRequired){
            header("Location: /");
            exit();
        }
    }
}