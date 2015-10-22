<?php

include("../model/AlunosModel.php");

class AlunosController {
    
    public function getTodosAlunos() {
        $bancoAlunos = new AlunosModel();
        $resultado = $bancoAlunos->todasColunas()->executar();
        
        return $resultado;
    }
}
