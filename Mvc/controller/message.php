<?php


function setMessage($type,$message){
    if (session_status() == PHP_SESSION_NONE){
        session_start();
    }

    if ($type == "error"){
        $message = "<p style='position: absolute; left: 50%; transform: translateX(-50%); background-color: red; padding: 3px;'>$message</p>";
    } else if ($type == "ok"){
        $message = "<p style='position: absolute; left: 50%; transform: translateX(-50%); background-color: green; padding: 3px;'>$message</p>";
    }

    $_SESSION[$type] = $message;
}


function readMessage(){
    if (isset($_SESSION['error'])){
        $msg = $_SESSION['error'];
        unset($_SESSION['error']);
        return $msg;
    } else if (isset($_SESSION['ok'])){
        $msg = $_SESSION['ok'];
        unset($_SESSION['ok']);
        return $msg;
    } 
}


function setMessageCreateWorkerAccount($bool){
    if ($bool){
        $type = "ok";
        $message = "Conta criada com sucesso.";
    } else{
        $type = "error";
        $message = "Erro ao tentar criar a conta.";
    }

    setMessage($type,$message);
}


function setMessageCreateNewSector($bool){
    if ($bool){
        $type = "ok";
        $message = "Setor criado com sucesso.";
    } else{
        $type = "error";
        $message = "Erro ao tentar criar o setor.";
    }

    setMessage($type,$message);
}


function setMessageCreateNewQuestion($bool){
    if ($bool){
        $type = "ok";
        $message = "Questão criada com sucesso.";
    } else {
        $type = "error";
        $message = "Erro ao criar a questão.";
    }

    setMessage($type,$message);
}


function setMessageDeleteQuestion($bool){
    if ($bool){
        $type = "ok";
        $message = "Questão deletada com sucesso.";
    } else {
        $type = "error";
        $message = "Erro ao deletar a questão. Verifique se nada depende dela.";
    }

    setMessage($type,$message);
}


function setMessageDeleteWorker($bool){
    if ($bool){
        $type = "ok";
        $message = "Funcionario deletado com sucesso.";
    } else {
        $type = "error";
        $message = "Erro ao deletar o funcionário. Verifique se nada depende dele.";
    }

    setMessage($type,$message);
}


function setMessageDeleteSector($bool){
    if ($bool){
        $type = "ok";
        $message = "Setor deletado com sucesso.";
    } else {
        $type = "error";
        $message = "Erro ao deletar o setor. Verifique se nada depende dele.";
    }

    setMessage($type,$message);
}

function setMessageCreateRating($bool){
    if ($bool){
        $type = "ok";
        $message = "Avaliação enviada com sucesso.";
    } else {
        $type = "error";
        $message = "Erro ao tentar enviar avaliação.";
    }

    setMessage($type,$message);
}