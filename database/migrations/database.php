<?php

require_once '../config/execute_commands.php';

function createDatabase(){
    $command = "CREATE SCHEMA IF NOT EXISTS `evaluation_system` DEFAULT CHARACTER SET utf8 ;
                USE `evaluation_system`;";

    executeCommand(($command));
}