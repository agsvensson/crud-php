<?php
include('valida-sessao.php');
include('conecta.php');

# verifica se precisa de alguma ordenação
if (isset($_GET['ordem'])) {
    $ordem = $_GET['ordem'];
} else {
    $ordem = 'ASC';
}

$sql = $conexao->prepare("SELECT * FROM DEPARTAMENTOS ORDER BY SIGLA $ordem");
$sql->execute();

$result = $sql->fetchAll();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD - Departamentos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
</head>
<body>
<?php
include('menu.php');
?>
<div class="container">
    <h1>CRUD - Departamentos</h1>
    <hr>
    <a href="form-departamentos.php" class="btn btn-primary">NOVO</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <?php
                if ($ordem == 'ASC') {
                    $seta = 'bottom';
                    $ordem = 'DESC';
                } else {
                    $seta = 'top';
                    $ordem = 'ASC';
                }
                ?>
                <th><a href="listar-departamentos.php?ordem=<?php echo $ordem; ?>"><i class="glyphicon glyphicon-triangle-<?php echo $seta;?>"></i>Sigla</a></th>
                <th class="text-right">Ação</th>
            </tr>
        </thead>

        <tbody>

            <?php 
            foreach ($result as $r) {
            ?>
            <tr>
                <td><?php echo $r['nome']; ?></td>
                <td><?php echo $r['sigla']; ?></td>
                <td class="text-right">
                    <a href="form-departamentos.php?id_departamento=<?php echo $r['id_departamento']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a onclick="return confirm('Deseja realmente excluir?')" href="acao-departamentos.php?acao=excluir&id_departamento=<?php echo $r['id_departamento'];?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
            <?php
            }
            ?>


        </tbody>

    </table>
    <a href="index.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i> VOLTAR</a>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>