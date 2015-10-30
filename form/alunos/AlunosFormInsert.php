<?php


include_once ($_SERVER['DOCUMENT_ROOT']."/form/Form.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/controller/AlunosController.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/controller/CursosController.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/controller/TurmasController.php");

class AlunosFormInsert extends Form {

    protected $turmas = array();
    protected $cursos = array();
    
    protected $controller = 'AlunosController';
    protected $action = 'insert';


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
            'name' => 'st_email_al',
            'label' => 'Email:'
        ));
        $this->add(array(
            'element' => 'input',
            'type' => 'password',
            'id' => 'senha',
            'name' => 'st_senha_al',
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
            'type' => 'text',
            'id' => 'nome',
            'name' => 'st_nome_al',
            'label' => 'Nome:'
        ));
        $this->add(array(
            'element' => 'select',
            'name' => 'id_turma_al',
            'opitions' => $this->turmas,
            'label' => 'Turma: ',
            'id' => 'turma',
        ));
        $this->add(array(
            'element' => 'select',
            'name' => 'id_curso_al',
            'opitions' => $this->cursos,
            'label' => 'Curso: ',
            'id' => 'curso',
        ));
        $this->add(array(
            'element' => 'input',
            'type' => 'text',
            'id' => 'telefone',
            'name' => 'st_telefone_al',
            'label' => 'Telefone:'
        ));
        $this->add(array(
            'element' => 'input',
            'type' => 'text',
            'id' => 'responsavel',
            'name' => 'st_responsavel_al',
            'label' => 'Responsável:'
        ));
        $this->add(array(
            'element' => 'input',
            'type' => 'text',
            'id' => 'tel_responsavel',
            'name' => 'st_telresponsavel_al',
            'label' => 'Telefone do Responsável:'
        ));
        $this->add(array(
            'element' => 'input',
            'type' => 'date',
            'id' => 'dt_nascimento',
            'name' => 'dt_nascimento_al',
            'label' => 'Data Nascimento:'
        ));
        $this->add(array(
            'element' => 'input',
            'type' => 'hidden',
            'id' => 'id',
            'name' => 'id_aluno_al',
        ));      
        $this->add(array(
            'element' => 'input',
            'type' => 'submit',
            'value' => 'Salvar',
            'class' => 'btn-success'
        ));
    }

}
