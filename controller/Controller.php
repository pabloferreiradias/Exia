<?php

class Controller {
    
    protected $nomeModel;
    
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
}
