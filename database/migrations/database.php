<?php

require_once '../config/helper_commands_migrations.php';

function createDatabase(){
    $command = "CREATE SCHEMA IF NOT EXISTS `evaluation_system` DEFAULT CHARACTER SET utf8 ;
                USE `evaluation_system`;";

    executeInternalCommand(($command));
}