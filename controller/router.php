<?php

$route = $_POST['route'] ?? '/';


switch ($route){
    case '/':
        header('Location: /');
}