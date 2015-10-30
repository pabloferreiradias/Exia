<html>
<head>
    <title>Exia - Index</title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" name="viewport" content="width=device-width, initial-scale=1.0, text/html;charset=UTF-8">
    <link rel="stylesheet" href="../view/utils/css/bootstrap.min.css">
    <link rel="stylesheet" href="../view/utils/css/bootstrap-theme.min.css">
    <script src="../view/utils/js/jquery-1.6.4.js"></script>
    <script src="../view/utils/js/bootstrap.min.js"></script>
    <script src="../view/utils/js/form.js"></script>
</head>
<body>
    <h1>Teste</h1>
    <?php
    $id = $_GET['id'];
    include_once ($_SERVER['DOCUMENT_ROOT']."/form/alunos/AlunosFormEdit.php");
    $form = new AlunosFormEdit($id);
    echo ($form);
    ?>
</body>
</html>
