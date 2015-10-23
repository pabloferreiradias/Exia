<?php

include("/model/AlunosModel.php");
include("/grid/AlunosGrid.php");

class AlunosController {

    public function getTodosAlunos() {
        $bancoAlunos = new AlunosModel();
        $bancoAlunos->todasColunas();
        $dados = $bancoAlunos->executar();
        $resultado = new AlunosGrid($dados);

        return $resultado;
    }

}
