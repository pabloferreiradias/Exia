<html>
    <head>
        <title>Exia - Index</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../view/utils/css/bootstrap.min.css">
        <link rel="stylesheet" href="../view/utils/css/bootstrap-theme.min.css">
        <script src="../view/utils/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1>Teste</h1>
        <?php
        	include ("controller/AlunosController.php");

        	$controller = new AlunosController();

        	$alunos = $controller->getTodosAlunos();

        	echo ($alunos);
        ?>
    </body>
</html>
