<?php

include("/model/AlunosModel.php");
include("/grid/AlunosGrid.php");

class AlunosController {

    public function getTodosAlunos() {
        $bancoAlunos = new AlunosModel();
        $bancoAlunos->todasColunas();
        $dados = $bancoAlunos->executar();
        
        return $dados;
    }
    
    public function getAlunoPorId($id) {
        $bancoAlunos = new AlunosModel();
        $bancoAlunos->todasColunas();
        $bancoAlunos->getPorId($id);
        $dados = $bancoAlunos->executar();
        
        return $dados;
    }
    
    public function getAlunoPorTurma($idTurma) {
        $bancoAlunos = new AlunosModel();
        $bancoAlunos->todasColunas();
        $bancoAlunos->getAlunosTurma($idTurma);
        $dados = $bancoAlunos->executar();
        
        return $dados;
    }
    
    public function getAlunosAtivos() {
        $bancoAlunos = new AlunosModel();
        $bancoAlunos->todasColunas();
        $bancoAlunos->getAlunosAtivos();
        $dados = $bancoAlunos->executar();
        
        return $dados;
    }
    
    public function porGrid($dados){
        $grid = new AlunosGrid($dados);
        return $grid;
    }

}
