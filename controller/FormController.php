<?php
if (isset($_POST)){
    $dados = $_POST;
    print_r($dados);
}
if (isset($_GET)){
    $url = $_GET;
}
$nomeController = $url['controller'];       
include_once ($_SERVER['DOCUMENT_ROOT']."/controller/".$nomeController.".php");

$controller = new $nomeController;
$result = $controller->insert($dados);

if ($result === TRUE){
    echo '<script>alert("Cadastro feitom com sucesso!");</script>';
}else{
    echo '<script>alert("Erro no cadastro");</script>';
}

header("Location: ".$_SERVER['DOCUMENT_ROOT']."/index.php");