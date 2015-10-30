<?php

class Controller {

    protected $nomeModel;

    public function getPorId($id) {
        $nomeModel = $this->nomeModel;
        $bancoDados = new $nomeModel;
        $bancoDados->todasColunas();
        $bancoDados->getPorId($id);
        $dados = $bancoDados->executar();
        
        return $dados;
    }
    
    public function toJSon($dados){
        $json = "'{";
        $i = 0;
        while ($row = $dados->fetch_assoc()) {         
            foreach ($row as $key => $value) {
                if (preg_match("/senha/", $key) == TRUE) continue;
                if ($i != 0){
                    $json .= ',';
                }
                $json .= '"'.$key.'":"'.$value.'"';
                $i = 1;
            }
        $json .= "}'";
        }
    return $json;
    }

public function toArray($dados){
    $array = array();
    while ($row = $dados->fetch_assoc()) {
        $linhaArray = array();
        foreach ($row as $key => $value) {
            $linhaArray[$key] = $value;
        }
        array_push($array, $linhaArray);
    }

    return $array;
}

public function insert($dados) {
    $nomeModel = $this->nomeModel;
    $bancoDados = new $nomeModel;
    $result = $bancoDados->inserir($dados);

    return $result;
}

public function edit($dados) {
    $nomeModel = $this->nomeModel;
    $bancoDados = new $nomeModel;
    $result = $bancoDados->editar($dados);

    return $result;
}
}
