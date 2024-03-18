<?php 


function sendReview($response,$id_user_session){
    try{
        for ($i=0; $i <18; $i++){
            $note = $response[$i];
            $id_question = $i+1;
            executeSqlInsertQuestion($id_user_session,$id_question,$note);   
        }
        
        return [true, 'Avaliacao enviada com sucesso'];
    } catch (Exception $e){
        return [false, 'Ocorreu um erro ao enviar a avaliação'];
    }
}


function executeSqlInsertQuestion($id_user_session,$id_question,$note){
    require_once "../database/config/connection.php";
    global $pdo;

    $command = "INSERT INTO avaliacoes (data_avaliacao,id_usuario,id_questao,nota_questao) VALUES (:data_avaliacao,:id_usuario,:id_questao,:nota_questao)";
    $cursor = $pdo->prepare($command);
    
    $date = date('Y-m-d H:i:s');

    $cursor->bindParam(':data_avaliacao', $date);
    $cursor->bindParam(':id_usuario', $id_user_session);
    $cursor->bindParam(':id_questao', $id_question);
    $cursor->bindParam(':nota_questao', $note);

    $cursor->execute();
}