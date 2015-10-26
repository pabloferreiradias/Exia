<?php

include_once($_SERVER['DOCUMENT_ROOT']."/model/TabelaModel.php");

class TurmasModel extends TabelaModel {

    protected $table = 'turmas';
    protected $colunaId = 'id_turma_tr';

}
