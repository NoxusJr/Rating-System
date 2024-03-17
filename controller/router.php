<?php

$route = $_POST['route'] ?? '/';


switch ($route){
    case '/':
        header('Location: /');
        break;

    case '/create_employee_account':
        break;

    case '/create_manager_account':
        break;

    case '/send_review':
        break;
}