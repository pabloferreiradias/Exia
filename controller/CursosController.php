<?php

include_once($_SERVER['DOCUMENT_ROOT']."/controller/Controller.php");
include_once($_SERVER['DOCUMENT_ROOT']."/model/CursosModel.php");
//include_once("/grid/CursosGrid.php");

class CursosController extends Controller {

    public function getTodosCursos() {
        $bancoCursos = new CursosModel();
        $bancoCursos->todasColunas();
        $dados = $bancoCursos->executar();
        
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
