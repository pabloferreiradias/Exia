<?php

include("/model/AlunosModel.php");

class AlunosController {

    public function getTodosAlunos() {
        $bancoAlunos = new AlunosModel();
        $bancoAlunos->todasColunas();
        $result = $bancoAlunos->executar();
        $resultado = $this->tabelarResultado($result);

        return $resultado;
    }

    public function tabelarResultado($resultado) {

        $tabela = '<table class="table">';

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {

                foreach ($row as $key => $value) {
                    $tabela .= '<tr>';
                    $tabela .= "<td>$key</td><td>$value</td>";
                    $tabela .= '</tr>';
                }
            }
            $tabela .= '</table>';
        } else {
            $tabela = "0 results";
        }

        return $tabela;
    }

}
