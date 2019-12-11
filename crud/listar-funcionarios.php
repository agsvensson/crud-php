<?php
include('valida-sessao.php');
include('conecta.php');

# verifica se precisa de alguma ordenação
if (isset($_GET['ordem'])) {
    $ordem = $_GET['ordem'];
} else {
    $ordem = 'ASC';
}

# verifica se veio alguma busca
if (isset($_GET['busca'])) {
    $busca = $_GET['busca'];
    $sql_busca = "WHERE nome LIKE '$busca%'";
} else {
    $busca = '';
    $sql_busca = '';
}

$sql = $conexao->prepare("SELECT * FROM FUNCIONARIOS $sql_busca ORDER BY NOME $ordem");
$sql->execute();

$result = $sql->fetchAll();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD - Funcionários</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/datatables.css">
</head>
<body>
<?php
include('menu.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Funcionários</h1>
        </div>
        <div class="col-md-4">
        <form action="listar-funcionarios.php" method="GET" class="form-inline">
            <div class="form-group">
            <br>
            <br>
            <input type="text" name="busca" class="form-control" value="<?php echo $busca; ?>" placeholder="Pesquisar por nome">
            <button type="submit" class="btn btn-default">
                <i class="glyphicon glyphicon-search"></i> Busca</button>
            </div>      
        </form>
    </div>
</div>






    <hr>
    <a href="form-funcionarios.php" class="btn btn-primary">NOVO</a>
    <hr>

    <table class="table table-striped" id="table-funcionarios">
        <thead>
            <tr>
                <?php
                if ($ordem == 'ASC') {
                    $seta = 'bottom';
                    $ordem = 'DESC';
                } else {
                    $seta = 'top';
                    $ordem = 'ASC';
                }
                ?>
                <!-- <th class="col-md-5"><a href="listar-funcionarios.php?ordem=<?php echo $ordem; ?>"><i class="glyphicon glyphicon-triangle-<?php echo $seta;?>"></i>Nome</a></th> -->
                <th class="col-md-5">Nome</th>
                <th class="col-md-1 text-center">Sexo</th>
                <th class="col-md-3 text-center">Salário</th>
                <th class="col-md-3 text-right">Ação</th>
            </tr>
        </thead>

        <tbody>

            <?php 
            foreach ($result as $r) {
            ?>
            <tr>
                <td><?php echo $r['nome']; ?></td>
                <td class="text-center"><?php echo $r['sexo']; ?></td>
                <td class="text-center"><?php echo $r['salario']; ?></td>
                <td class="text-right">
                    <a href="form-funcionarios.php?id_funcionario=<?php echo $r['id_funcionario']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a onclick="return confirm('Deseja realmente excluir?')" href="acao-funcionarios.php?acao=excluir&id_funcionario=<?php echo $r['id_funcionario'];?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
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
<script src="js/datatables.js"></script>

<script>
$(document).ready(function(){

    $('#table-funcionarios').DataTable({
        searching : false,  // pesquisa
        lengthChange : false, // mudança de ordem
        pageLength : 50  // exibe 50 por página
    });

});
</script>

</body>
</html>