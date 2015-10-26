<?php

include_once("Controller.php");
include_once("/model/TurmasModel.php");
//include_once("/grid/TurmasGrid.php");

class TurmasController extends Controller {

    public function getTodasTurmas() {
        $bancoTurmas = new TurmasModel();
        $bancoTurmas->todasColunas();
        $dados = $bancoTurmas->executar();
        
        return $dados;
    }
    
//    public function getAlunoPorId($id) {
//        $bancoAlunos = new AlunosModel();
//        $bancoAlunos->todasColunas();
//        $bancoAlunos->getPorId($id);
//        $dados = $bancoAlunos->executar();
//        
//        return $dados;
//    }
//    
//    public function getAlunoPorTurma($idTurma) {
//        $bancoAlunos = new AlunosModel();
//        $bancoAlunos->todasColunas();
//        $bancoAlunos->getAlunosTurma($idTurma);
//        $dados = $bancoAlunos->executar();
//        
//        return $dados;
//    }
//    
//    public function getAlunosAtivos() {
//        $bancoAlunos = new AlunosModel();
//        $bancoAlunos->todasColunas();
//        $bancoAlunos->getAlunosAtivos();
//        $dados = $bancoAlunos->executar();
//        
//        return $dados;
//    }
//    
//    public function porGrid($dados){
//        $grid = new AlunosGrid($dados);
//        return $grid;
//    }

}
