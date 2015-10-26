<?php

class TabelaModel {

    protected $sql;
    protected $table;
    protected $colunaId;

    public function todasColunas() {
        $this->sql = "SELECT * FROM $this->table";
    }

    public function getSql() {
        return $this->sql;
    }

    /*
     * @var $colunas array
     * Ex: ('id', 'nome', 'turma')
     */

    public function colunas(array $colunas) {
        $stringColunas = '';
        for ($i = 0; $i < sizeof($colunas); $i++) {
            if ($i > 0) {
                $stringColunas .= ", ";
            }
            $stringColunas .= $colunas[$i];
        }
        $this->sql = "SELECT $stringColunas FROM $this->table";
    }

    public function getPorId($id) {
        $this->sql .= " WHERE $this->colunaId = $id";
    }

    /*
     * @var $params array
     * Ex: ('id' => '7', 'nome' => 'Pedro')
     */

    public function porParametros(array $params) {
        $stringParams = ' WHERE ';
        $i = 0;
        foreach ($params as $param => $valor) {
            if ($i > 0) {
                $stringParams .= " AND ";
            }
            $stringParams .= "$param = $valor";
            $i++;
        }
        $this->sql .= $stringParams;
    }

    public function executar() {
        include ($_SERVER['DOCUMENT_ROOT'].'/model/config/conectar.php');
        $sql = $this->sql;
        $result = $conn->query($sql);
        $conn->close();

        return $result;
    }
    
    public function inserir($dados) {
        include ($_SERVER['DOCUMENT_ROOT'].'/model/config/conectar.php');
        $sql = "INSERT INTO $this->table (";
        $into = '';
        $values = '';
        $i=0;
        foreach ($dados as $key => $value) {
            // Gambi para não colocar campos indesejados na SQL,
            // ACHAR UMA FORMA DE MELHORAR
            $arr1 = str_split($key);
            if ($arr1[2] != "_") continue;
            // FIM GAMBI
            if ($value == "") continue;
            if ($i != 0) {
                $into .= ', ';
                $values .= ', ';
            }
            $into .= $key;
            $values .= "'".$value."'";
            $i++;
        }
        $sql .= $into.") VALUES (".$values.")";
        
        $result = $conn->query($sql);

        $conn->close();
        
        return $result;
    }

}
