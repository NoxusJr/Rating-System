<?php

require_once '../migrations/tabela_administradores.php';
require_once '../migrations/tabela_avaliacoes.php';
require_once '../migrations/tabela_funcionarios.php';
require_once '../migrations/tabela_gerentes.php';
require_once '../migrations/variaveis_sql.php';

function run(){
    setInitialConfig();

    createTableAdministradores();
    createTableGerentes();
    createTableFuncionarios();
    createTableAvaliacoes();

    resetConfig();
}


run();