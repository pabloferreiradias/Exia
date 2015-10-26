<?php

include_once($_SERVER['DOCUMENT_ROOT']."/grid/Grid.php");

class AlunosGrid extends Grid {
    public $nomesCampos = array('/id_aluno_al/',
                                 '/st_nome_al/',
                                 '/id_turma_al/',
                                 '/id_curso_al/',
                                 '/st_telefone_al/',
                                 '/st_email_al/',
                                 '/st_responsavel_al/',
                                 '/st_telresponsavel_al/',
                                 '/dt_nascimento_al/',
                                 '/st_login_al/',
                                 '/st_senha_al/',
                                 '/st_matricula_al/',
                                 '/st_provasliberadas_al/',
                                 '/fl_status_al/');
    
    public $nomesColunas = array('ID',
                                 'Aluno',
                                 'Turma',
                                 'Curso',
                                 'Telefone',
                                 'E-mail',
                                 'Responsavel',
                                 'Tel. Responsavel',
                                 'Data Nascimento',
                                 'Login',
                                 'Senha',
                                 'Matricula',
                                 'Provas Liberadas',
                                 'Status');
}
