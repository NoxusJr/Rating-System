<?php

$root= dirname(dirname(__DIR__));
require_once $root."\Database\config\connection.php";


function deleteQuestion($idQuestion){
    try{
        global $pdo;
        
        $command = "DELETE FROM questions WHERE id_question = :idQuestion";

        $cursor = $pdo->prepare($command);

        $cursor->bindParam(':idQuestion',$idQuestion);

        $cursor->execute();

        return [true,'deleted question'];
    } catch (PDOException $e){
        return [false,$e];
    }
}


function deleteWorker($idUser){
    try{
        global $pdo;
            
        $command = "DELETE FROM users WHERE id_user = :idUser";

        $cursor = $pdo->prepare($command);

        $cursor->bindParam(':idUser',$idUser);

        $cursor->execute();

        return [true,'deleted user'];
    } catch (PDOException $e){
        return [false,$e];
    }
}


function deleteSector($idSector){
    try{
        global $pdo;
        
        $command = "DELETE FROM sectors WHERE id_sector = :idSector";

        $cursor = $pdo->prepare($command);

        $cursor->bindParam(':idSector',$idSector);

        $cursor->execute();

        return [true,'deleted user'];
    } catch (PDOException $e){
        return [false,$e];
    }
}