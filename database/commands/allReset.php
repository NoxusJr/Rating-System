<?php

require_once '../migrations/tabela_administradores.php';
require_once '../migrations/tabela_avaliacoes.php';
require_once '../migrations/tabela_funcionarios.php';
require_once '../migrations/tabela_gerentes.php';

function allReset(){
    
    dropTableAvaliacoes();
    dropTableFuncionarios();
    dropTableGerentes();
    dropTableAdministradores();

    require './run.php';
}


allReset();