<?php
include('valida-sessao.php');
include('conecta.php');

# verifica se veio o id e monta o formulário para edição ou inserção
if (isset($_GET['id_funcionario'])) {
    $titulo = 'Alteração de Funcionário';
    $id_funcionario = $_GET['id_funcionario'];

    $sql = $conexao->prepare("SELECT * FROM FUNCIONARIOS
                                WHERE id_funcionario = $id_funcionario");
    $sql->execute();
    $result = $sql->fetchAll();

    # vamos carregar em variáveis locais os valores vindos do banco
    $nome = $result[0]['nome'];
    $sexo = $result[0]['sexo'];
    $salario = $result[0]['salario'];
    $id_departamento = $result[0]['id_departamento'];
    $acao = 'editar';
} else {
    $titulo = 'Cadastro de Funcionário';
    $sexo = '';
    $nome = '';
    $salario = '';
    $acao = 'inserir';
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD - Funcionários</title>
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
    <form method="POST" action="acao-funcionarios.php" class="form" onsubmit="return validaFuncionario();">
        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="departamento">Departamento:</label>
                    <select name="id_departamento" id="id_departamento" class="form-control">
                        <option value="00">SELECIONE</option>

                <?php
                $sql = $conexao->prepare('SELECT * FROM DEPARTAMENTOS
                                            ORDER BY nome');
                $sql->execute();
                $result = $sql->fetchAll();

                foreach ($result as $r) {
                    # se o ID desse departamento é IGUAL ao id_depto que eu peguei lá em cima (do funcionário)
                    if($r['id_departamento'] == $id_departamento) {
                       $selecionado = 'selected';
                    } else {
                       $selecionado = '';
                    }
                ?>
                <option <?php echo $selecionado; ?> value="<?php echo $r['id_departamento']; ?>"><?php echo $r['nome']; ?></option>
                <?php
                }
                ?>
                    </select>
                </div>
            </div>
        
            <div class="col-md-9">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input value="<?php echo $nome; ?>" type="text" name="nome" id="nome" placeholder="Nome..." class="form-control" maxlength="45">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nome">Sexo:</label>
                    <select name="sexo" id="sexo" class="form-control">
                    <option value="00">SELECIONE</option>
                    <option <?php if ($sexo == 'F') { echo 'selected';} ?> value="F">Feminino</option>
                    <option <?php if ($sexo == 'M') { echo 'selected';} ?> value="M">Masculino</option>
                    </select>
                </div>
            </div>
        
    
            <div class="col-md-3">
                <div class="form-group">
                    <label for="salario">Salário:</label>
                    <input value="<?php echo $salario; ?>" type="text" name="salario" id="salario" maxlength="10" placeholder="Salário" class="form-control">
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
            <input type="hidden" name="id_funcionario" value="<?php echo $id_funcionario; ?>">
            

        </div>

    </form>

    <a href="listar-funcionarios.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i> VOLTAR</a>
</div>



<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/funcionarios.js"></script>
<script src="js/jquery.mask.js"></script>

<script>
// inicialização da jQuery
$(document).ready(function() {
    $('#salario').mask('000.000,00', { reverse : true});
});
</script>
</body>
</html>