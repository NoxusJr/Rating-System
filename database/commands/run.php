<?php

require_once '../migrations/tabela_questoes.php';
require_once '../migrations/tabela_avaliacoes.php';
require_once '../migrations/tabela_usuarios.php';
require_once '../migrations/tabela_setores.php';
require_once '../migrations/variaveis_sql.php';


function run(){
    setInitialConfig();

    createTableSetores();
    createTableQuestoes();
    createTableUsuarios();
    createTableAvaliacoes();

    resetConfig();
}


run();