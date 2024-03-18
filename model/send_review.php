<?php 


function sendReview($q1,$q2,$q3,$q4,$q5,$q6,$q7,$q8,$q9,$q10,$q11,$q12,$q13,$q14,$q15,$q16,$q17,$q18){
    $response = [$q1,$q2,$q3,$q4,$q5,$q6,$q7,$q8,$q9,$q10,$q11,$q12,$q13,$q14,$q15,$q16,$q17,$q18];
    $id_user_session = '';

    for ($i=0; $i <18; $i++){
        $note = $response[$i];
        $id_question = $i+1;
        executeSqlInsertQuestion($id_user_session,$id_question,$note);   
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