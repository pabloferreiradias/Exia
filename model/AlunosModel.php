<?php

include("TabelaModel.php");

class AlunosModel extends TabelaModel {

    protected $table = 'alunos';
    protected $colunaId = 'id_aluno_al';
    
    public function getAlunosTurma($idTurma){
        if(isset($idTurma)){
            $this->sql .= " WHERE id_turma_al = $idTurma";
        }
    }
    
    public function getAlunosAtivos(){
            $this->sql .= " WHERE fl_status_al = 1";
    }

}
