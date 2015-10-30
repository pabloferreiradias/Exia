<?php
if (isset($_POST)){
    $dados = $_POST;
}
if (isset($_GET)){
    $url = $_GET;
}
$nomeController = $url['controller'];       
include_once ($_SERVER['DOCUMENT_ROOT']."/controller/".$nomeController.".php");

$controller = new $nomeController;

switch ($url['action']) {
	case 'insert':
		$result = $controller->insert($dados);
		break;
	case 'edit':
		$result = $controller->edit($dados);
		break;
	default:
		header("Location: ".$_SERVER['DOCUMENT_ROOT']."/error.php");
		break;
}


if ($result === TRUE){
    echo '<script>alert("Alteração feita com sucesso!");</script>';
}else{
    echo '<script>alert("Erro na alteração");</script>';
}

header("Location: ".$_SERVER['DOCUMENT_ROOT']."/index.php");