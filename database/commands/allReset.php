<?php

require_once '../migrations/tabela_questoes.php';
require_once '../migrations/tabela_avaliacoes.php';
require_once '../migrations/tabela_usuarios.php';
require_once '../migrations/tabela_gerentes.php';

function allReset(){
    
    dropTableAvaliacoes();
    dropTableUsuarios();
    dropTableGerentes();
    dropTableQuestoes();

    require './run.php';
}


allReset();