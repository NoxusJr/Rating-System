<?php

require_once '../config/helper_commands_migrations.php';

function createDatabase(){
    $command = "CREATE SCHEMA IF NOT EXISTS `hg5pss68_mengao` DEFAULT CHARACTER SET utf8 ;
                USE `hg5pss68_mengao` ;";

    executeInternalCommand(($command));
}