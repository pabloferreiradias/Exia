<?php

class AlunosModel {
    
    protected $sql;

    public function todasColunas(){
        $this->sql = "SELECT * FROM Alunos";
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
        $this->sql = "SELECT $stringColunas FROM Alunos";  
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

        $sql = $this->sql . " FROM ". $this->table;
        
        $result = $conn->query($sql);

        // if ($result->num_rows > 0) {
            // output data of each row
            //while($row = $result->fetch_assoc()) {
               // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
           // }
      //  } else {
       //     echo "0 results";
     //   }
        
        $conn->close();
        
        return $result;
        
    }
    
   
}
