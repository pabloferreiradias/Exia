<?php


include_once ("Form.php");
include_once ("controller/AlunosController.php");
include_once ("controller/CursosController.php");
include_once ("controller/TurmasController.php");

class AlunosForm extends Form {

    protected $turmas = array();
    protected $cursos = array();

    public function __construct() {
        $turmasController = new TurmasController();
        $turmas = $turmasController->getTodasTurmas();
        $arrayTurmas = $turmasController->toArray($turmas);
        foreach ($arrayTurmas as $array) {
            $this->turmas[$array['id_turma_tr']] = $array['st_nome_tr'];
        }
        
        $cursosController = new CursosController();
        $cursos = $cursosController->getTodosCursos();
        $arrayCursos = $cursosController->toArray($cursos);
        foreach ($arrayCursos as $array) {
            $this->cursos[$array['id_curso_cr']] = $array['st_nome_cr'];
        }
        
        $this->setElementos();
        $this->criarForm();
    }
    
//    Alunos:
//        Id, Nome, Turma_Id, Curso_Id.
//        Telefone, Email, Responsável,
//        Tel_Responsavel, Data_Nascimento, 
//        Login, Senha, Matricula, Id_Provas_Liberadas, Status.

    private function setElementos() {
        $this->add(array(
            'element' => 'input',
            'type' => 'text',
            'id' => 'email',
            'name' => 'email',
            'label' => 'Email:'
        ));
        $this->add(array(
            'element' => 'input',
            'type' => 'password',
            'id' => 'senha',
            'name' => 'senha',
            'label' => 'Senha:'
        ));
        $this->add(array(
            'element' => 'input',
            'type' => 'password',
            'id' => 'resenha',
            'name' => 'resenha',
            'label' => 'Digite a senha novamente:'
        ));
        $this->add(array(
            'element' => 'input',
            'type' => 'hidden',
            'id' => 'id',
            'name' => 'id',
        ));
        $this->add(array(
            'element' => 'input',
            'type' => 'text',
            'id' => 'nome',
            'name' => 'nome',
            'label' => 'Nome:'
        ));
        $this->add(array(
            'element' => 'select',
            'name' => 'turma',
            'opitions' => $this->turmas,
            'label' => 'Turma: ',
            'id' => 'turma',
        ));
        $this->add(array(
            'element' => 'select',
            'name' => 'curso',
            'opitions' => $this->cursos,
            'label' => 'Curso: ',
            'id' => 'curso',
        ));
        $this->add(array(
            'element' => 'input',
            'type' => 'text',
            'id' => 'telefone',
            'name' => 'telefone',
            'label' => 'Telefone:'
        ));
        $this->add(array(
            'element' => 'input',
            'type' => 'text',
            'id' => 'responsavel',
            'name' => 'responsavel',
            'label' => 'Responsável:'
        ));
        $this->add(array(
            'element' => 'input',
            'type' => 'text',
            'id' => 'tel_responsavel',
            'name' => 'tel_responsavel',
            'label' => 'Telefone do Responsável:'
        ));
        $this->add(array(
            'element' => 'input',
            'type' => 'date',
            'id' => 'dt_nascimento',
            'name' => 'dt_nascimento',
            'label' => 'Data Nascimento:'
        ));      
        $this->add(array(
            'element' => 'input',
            'type' => 'submit',
            'value' => 'Enviar',
            'class' => 'btn-success'
        ));
    }

}
