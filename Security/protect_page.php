<?php


function protectPage($permissionRequired,$redirectPage){
    if (session_status() == PHP_SESSION_NONE){
        session_start();
    }

    if ($permissionRequired != $_SESSION['permission']){
        header("Location: $redirectPage");   
        exit();
    }
}