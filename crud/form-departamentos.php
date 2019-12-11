<?php
include('valida-sessao.php');
include('conecta.php');

# verifica se veio o id e monta o formulário para edição ou inserção
if (isset($_GET['id_departamento'])) {
    $titulo = 'Alteração de Departamento';
    $id_departamento = $_GET['id_departamento'];

    $sql = $conexao->prepare("SELECT * FROM DEPARTAMENTOS
                                WHERE id_departamento = $id_departamento");
    $sql->execute();
    $result = $sql->fetchAll();

    # vamos carregar em variáveis locais os valores vindos do banco
    $sigla = $result[0]['sigla'];
    $nome = $result[0]['nome'];
    $acao = 'editar';
    

    #echo $result[0]['nome'];
    #exit;

} else {
    $titulo = 'Cadastro de Departamento';
    $sigla = '';
    $nome = '';
    $acao = 'inserir';
}

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
    <h1>CRUD - <?php echo $titulo; ?></h1>
    <hr>
    <form method="POST" action="acao-departamentos.php" class="form" onsubmit="return validaDepto();">
        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="sigla">Sigla:</label>
                    <input value="<?php echo $sigla; ?>" maxlength="10" type="text" name="sigla" id="sigla" placeholder="Sigla..." class="form-control">
                </div>
            </div>

            <div class="col-md-9">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input value="<?php echo $nome; ?>" type="text" name="nome" id="nome" placeholder="Nome..." class="form-control" maxlength="50">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <div class="alert alert-danger hidden" id="erro">
                    <i class="glyphicon glyphicon-alert"></i> <span id="msg-erro"></span>
                </div>
            </div>

            <div class="col-md-3 text-right">
                <br>
                <button type="submit" class="btn btn-warning">SALVAR</button>
            </div>

            <input type="hidden" name="acao" value="<?php echo $acao; ?>">
            <input type="hidden" name="id_departamento" value="<?php echo $id_departamento; ?>">
            

        </div>

    </form>

    <a href="listar-departamentos.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i> VOLTAR</a>
</div>



<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/departamentos.js"></script>
</body>
</html>