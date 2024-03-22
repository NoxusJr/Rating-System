<?php 

$directory = dirname(dirname(__DIR__));
require_once $directory. "/database/config/connection.php";


function sendReview($response,$idUserSession,$idQuestions){
    $date = date('Y-m-d');

    $result = runInserts($date,$idUserSession,$idQuestions,$response);

    if($result){
        $msg = 'Avaliação realizada com sucesso';
    } else {
        $msg = 'Ouve um erro ao avaliar';
    }

    return [$result,$msg];
}


function runInserts($date,$idUser,$idQuestions,$response){
    global $pdo;

    try{
        $pdo->beginTransaction();

        for($i=0; $i < count($response); $i++){
            $command = "INSERT INTO avaliacoes (data_avaliacao,id_usuario,id_questao,nota_questao) VALUES (:date,:idUser,:idQuestion,:note)";
            $cursor = $pdo->prepare($command);
            $cursor->bindParam(':date',$date);
            $cursor->bindParam(':idUser',$idUser);
            $cursor->bindParam(':idQuestion',$idQuestions[$i]);
            $cursor->bindParam(':note',$response[$i]);

            $cursor->execute();
        }

        $pdo->commit();
        return True;
    } catch (PDOException $e){
        $pdo->rollBack();
        return False;
    }
}