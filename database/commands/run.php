<?php

require_once '../migrations/tabela_questoes.php';
require_once '../migrations/tabela_avaliacoes.php';
require_once '../migrations/tabela_usuarios.php';
require_once '../migrations/tabela_gerentes.php';
require_once '../migrations/variaveis_sql.php';
require_once '../seeders/set_user_tests.php';

function run(){
    setInitialConfig();

    createTableQuestoes();
    createTableGerentes();
    createTableUsuarios();
    createTableAvaliacoes();

    resetConfig();

    setUserTests();
}


run();