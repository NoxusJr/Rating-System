<?php

$root= dirname(dirname(__DIR__));
require_once $root."/Mvc/model/auxiliar/generate_login.php";
require_once $root."/Database/config/connection.php";


function createWorkerAccount($name,$idSector){
    try{
        global $pdo;
        
        $login = generateLogin();
        $password = generatePassword();
        $permission = "funcionario";

        $command = "INSERT INTO users (name,login,password,permission,id_sector) VALUES (:name,:login,:password,:permission,:id_sector)";
        $cursor = $pdo->prepare($command);
        
        $cursor->bindParam(':name',$name);
        $cursor->bindParam(':login',$login);
        $cursor->bindParam(':password',$password);
        $cursor->bindParam(':permission',$permission);
        $cursor->bindParam(':id_sector',$idSector);
        
        $cursor->execute();
        
        return [true,[$login,$password]];
    } catch (PDOException $e){
        return [false,$e];
    }
}

function createNewSector($name){
    try{
        global $pdo;

        $command = "INSERT INTO sectors (name) VALUES (:name)";

        $cursor = $pdo->prepare($command);
        $cursor->bindParam(':name',$name);

        $cursor->execute();

        return [true,'sector created'];
    } catch (PDOException $e){
        return [false,$e];
    }
}


function createNewQuestion($question,$idSector){
    try{
        global $pdo;
        
        $command = "INSERT INTO questions (question,id_sector) VALUES (:question,:idSector)";
        
        $cursor = $pdo->prepare($command);
        $cursor->bindParam(':question',$question);
        $cursor->bindParam(':idSector',$idSector);
        
        $cursor->execute();
        
        return [true,'question created'];
    } catch (PDOException $e){
        return [false,$e];
    }
}


function createRating($responses,$idQuestions){
    try{
        global $pdo;

        if (session_status() == PHP_SESSION_NONE){
            session_start();
        }

        $idUser = $_SESSION['idUser'];
        $date = date('Y-m-d');

        $pdo->beginTransaction();
        
        for ($i=0;$i<count($responses);$i++){
            
            $note = $responses[$i];
            $idQuestion = $idQuestions[$i];

            $command = "INSERT INTO ratings (date,id_user,id_question,note) VALUES (:date,:idUser,:idQuestion,:note)";
            $cursor = $pdo->prepare($command);
            $cursor->bindParam(':date',$date);
            $cursor->bindParam(':idUser',$idUser);
            $cursor->bindParam(':idQuestion',$idQuestion);
            $cursor->bindParam(':note',$note);

            $cursor->execute();
        }

        $pdo->commit();
        return [true,'review sent'];
    } catch (PDOException $e){
        $pdo->rollBack();
        return [false,$e];
    }
}