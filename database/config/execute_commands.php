<?php

require_once __DIR__ . '/connection.php';

function executeCommand($command){
    global $pdo;

    $cursor = $pdo->prepare($command);
    $cursor->execute();
}

function dropTable($command,$parentTable=null){
    global $pdo;

    if ($parentTable == null){
        executeDrop($command);
    } else {

        $checkTableCommand = "SHOW TABLES LIKE '$parentTable'";
        $checkTableStatement = $pdo->prepare($checkTableCommand);
        $checkTableStatement->execute();
        $tableExists = $checkTableStatement->rowCount() > 0;

        if ($tableExists) {
            $rowCountCommand = "SELECT COUNT(*) FROM $parentTable";
            $rowCountStatement = $pdo->query($rowCountCommand);
            $rowCount = $rowCountStatement->fetchColumn();

            if ($rowCount == 0) {

                $pdo->exec('SET FOREIGN_KEY_CHECKS = 0;');
                executeDrop($command);
                $pdo->exec('SET FOREIGN_KEY_CHECKS = 1;');

            } else {
                echo "Não foi possível excluir a tabela pois a tabela $parentTable depende dela neste momento. Recomenda-se dar um allReset (para resetar tudo) OU executar antes um especificReset na tabela dependente";
            }
        } else {
            executeDrop($command);
        }
    }
}

function executeDrop($command){
    global $pdo;
    $cursor = $pdo->prepare($command);
    $cursor->execute();
}