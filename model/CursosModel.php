<?php

include_once($_SERVER['DOCUMENT_ROOT']."/model/TabelaModel.php");

class CursosModel extends TabelaModel {

    protected $table = 'cursos';
    protected $colunaId = 'id_curso_cr';

}
