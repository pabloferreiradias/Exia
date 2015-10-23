<?php

class Grid {
    private $tabela;
    public $nomesCampos;
    public $nomesColunas;

    function __construct($dados) {
        $tabela = '<table class="table">';

        if ($dados->num_rows > 0) {
            $i = 0;
            while ($row = $dados->fetch_assoc()) {
                if ($i == 0) {
                    $tabela .= '<tr>';
                    $segundaLinha = '<tr>';
                    foreach ($row as $key => $value) {
                        $tabela .= "<th>$key</th>";
                        $segundaLinha .= "<td>$value</td>";
                    }
                    $tabela .= '</tr>';
                    $segundaLinha .= '</tr>';
                    $tabela .= $segundaLinha;
                    $i++;
                    //Arrumar os nomes
                    $tabela = $this->substituirNomes($tabela);
                } else {
                    $tabela .= '<tr>';
                    foreach ($row as $key => $value) {
                        $tabela .= "<td>$value</td>";
                    }
                    $tabela .= '</tr>';
                }
            }
            $tabela .= '</table>';
        } else {
            $tabela = "0 results";
        }

        $this->tabela = $tabela;
    }

    public function __toString() {
        return $this->tabela;
    }

    private function substituirNomes($tabela) {
        $patterns = $this->nomesCampos;
        $replacements = $this->nomesColunas;
                
        ksort($patterns);
        ksort($replacements);
        
        return preg_replace($patterns, $replacements, $tabela);
    }

}