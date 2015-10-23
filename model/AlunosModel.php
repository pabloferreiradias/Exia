<?php

class AlunosModel {
    
    protected $sql;
    protected $table = 'alunos';

    public function todasColunas(){
        $this->sql = "SELECT * FROM $this->table";
    }
    
    /*
     * @var $colunas array
     * Ex: ('id', 'nome', 'turma')
     */
    public function colunas(array $colunas) {
        $stringColunas = '';
        for ($i=0 ; $i < sizeof($colunas); $i++){
            if($i>0){
                $stringColunas += ", ";
            }
            $stringColunas += $colunas[$i];      
        }
        $this->sql = "SELECT $stringColunas FROM $this->table";  
    }
    
    public function porId($id) {
        $this->sql += " WHERE id = $id";  
    }
    
    /*
     * @var $params array
     * Ex: ('id' => '7', 'nome' => 'Pedro')
     */
    public function porParametros(array $params) {
        $stringParams = ' WHERE ';
        $i = 0;
        foreach ($params as $param => $valor){
            if($i>0){
                $stringParams += " AND ";
            }
            $stringParams += "$param = $valor";
            $i++;
        }          
        $this->sql += $stringParams;  
    }
    
    public function executar() {
        include ('config/conectar.php');

        $sql = $this->sql;
        
        $result = $conn->query($sql);
        
        $conn->close();
        
        return $result;
        
    }
    
   
}
