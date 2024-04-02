<?php 

$root= dirname(dirname(__DIR__));
require_once $root."/Mvc/model/auxiliar/generate_login.php";
require_once $root."/Database/config/connection.php";

function loginAccount($login,$password){
    try{
        global $pdo;

        $command = "SELECT * FROM users WHERE login= :login AND password= :password";
        $cursor = $pdo->prepare($command);

        $cursor->bindParam(':login',$login);
        $cursor->bindParam(':password',$password);

        $cursor->execute();
        $userData = $cursor->fetch(PDO::FETCH_ASSOC);

        if ($userData){
            return [true,$userData];
        } else {
            return [false,'account not found'];
        }
    } catch (PDOException $e){
        return [false,$e];
    }
}


function getQuestions($idSector){
    try{
        global $pdo;

        $command = "SELECT id_question,question FROM questions WHERE id_sector =:idSector";

        $cursor = $pdo->prepare($command);

        $cursor->bindValue(":idSector", $idSector);

        $cursor->execute();
        $questions = $cursor->fetchAll(PDO::FETCH_ASSOC);

        return [true,$questions];
    } catch (PDOException $e){
        return [false,$e];
    }
}


function getAllQuestions(){
    try{
        global $pdo;

        $command = "SELECT id_question,question,id_sector FROM questions ORDER BY id_question DESC";

        $cursor = $pdo->prepare($command);

        $cursor->execute();
        $questions = $cursor->fetchAll(PDO::FETCH_ASSOC);

        return [true,$questions];
    } catch (PDOException $e){
        return [false,$e];
    }
}


function getAllSectors(){
    try{
        global $pdo;

        $command = "SELECT id_sector,name FROM sectors ORDER BY id_sector DESC";

        $cursor = $pdo->prepare($command);

        $cursor->execute();
        $sectors = $cursor->fetchAll(PDO::FETCH_ASSOC);

        return [true,$sectors];
    } catch (PDOException $e){
        return [false,$e];
    }
}
    

function getAllWorkers(){
    try{
        global $pdo;
        
        $command = "SELECT id_user, name, login, password, id_sector FROM users WHERE permission = 'funcionario' ORDER BY id_user DESC";

        $cursor = $pdo->prepare($command);

        $cursor->execute();
        $workers = $cursor->fetchAll(PDO::FETCH_ASSOC);

        return [true,$workers];
    } catch (PDOException $e){
        return [false,$e];
    }
}   


function ratingAvailable($idUser){
    try{
        global $pdo;
        
        $command = "SELECT date FROM ratings WHERE id_user = :idUser ORDER BY date DESC LIMIT 1";
        $cursor = $pdo->prepare($command);

        $cursor->bindParam(':idUser',$idUser);
        $cursor->execute();
        $data = $cursor->fetch(PDO::FETCH_ASSOC);

        if($data){
            $date = $data['date'];
        } else{
            $date = new DateTime();
            $date->sub(new DateInterval('P50D'));
            $date = $date->format('Y-m-d');
        }

        return [true,$date];
    } catch(PDOException $e){
        return [false,$e];
    }
}


function getMyDateRatings($idUser){
    try{
        global $pdo;

        $command = "SELECT DISTINCT date FROM ratings WHERE id_user = :idUser ORDER BY date DESC";
        $cursor = $pdo->prepare($command);

        $cursor->bindParam(':idUser',$idUser);
        $cursor->execute();

        $data = $cursor->fetchAll(PDO::FETCH_ASSOC);
    
        return [true,$data];
    } catch (PDOException $e){
        return [false,$e];
    }
}

function getMediaQuestions(){
    try{
        global $pdo;

        $data = array();

        $command= "SELECT ratings.id_question, COUNT(*) AS total, SUM(CASE WHEN ratings.note IN (1, 2) THEN 1 ELSE 0 END) AS negative, SUM(CASE WHEN ratings.note NOT IN (1, 2) THEN 1 ELSE 0 END) AS others, questions.id_sector, questions.question FROM ratings JOIN questions ON ratings.id_question = questions.id_question GROUP BY ratings.id_question, questions.id_sector, questions.question ORDER BY ratings.id_question ASC;";
        
        $cursor = $pdo->prepare($command);

        $cursor->execute();
        $result = $cursor->fetchAll(PDO::FETCH_ASSOC);



        for ($i=0;$i<count($result);$i++){
            
            if (isset($result[$i]) && $result[$i] !== null){
                $negative = $result[$i]['negative'];
            } else {
                $negative = 0;
            }

            $new = array(
                "id_sector"=>$result[$i]['id_sector'],
                "question"=>$result[$i]['question'],
                "negative"=>$result[$i]['negative'],
                "total"=>$result[$i]['total'],
            );

            array_push($data,$new);
        }


        return [true,$data];
    } catch (PDOException $e){
        return [false,$e];
    }
}