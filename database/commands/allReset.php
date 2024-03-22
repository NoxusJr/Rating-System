<?php

require_once '../migrations/tabela_questoes.php';
require_once '../migrations/tabela_avaliacoes.php';
require_once '../migrations/tabela_usuarios.php';
require_once '../migrations/tabela_setores.php';

function allReset(){
    
    dropTableAvaliacoes();
    dropTableUsuarios();
    dropTableQuestoes();
    dropTableSetores();

    require './run.php';
}


allReset();