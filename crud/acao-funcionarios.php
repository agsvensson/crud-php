<?php
include('valida-sessao.php');
include('conecta.php');

if ( isset($_REQUEST['acao']) ) {
    $acao = $_REQUEST['acao'];

    switch ($acao) {
        case 'inserir':
            if ( isset($_POST['nome']) && 
                 isset($_POST['id_departamento']) &&
                 isset($_POST['sexo']) &&
                 isset($_POST['salario'])
                ) {

                $nome = $_POST['nome'];
                $id_departamento = $_POST['id_departamento'];
                $sexo = $_POST['sexo'];
                $salario = $_POST['salario'];
                # converte o formato "bonito" do formulario para o formato do banco
                $novo_salario = str_replace('.', '', $salario);
                $novo_salario = str_replace(',', '.', $novo_salario);

                $sql = $conexao->prepare("INSERT INTO FUNCIONARIOS
                                            (nome, id_departamento, sexo, salario)
                                            VALUES 
                                            ('$nome', '$id_departamento', '$sexo', '$novo_salario')");
                $sql->execute();
            }
        break;
        case 'editar':
            if ( isset($_POST['nome']) && 
                 isset($_POST['id_departamento']) &&
                 isset($_POST['sexo']) &&
                 isset($_POST['salario']) &&
                 isset($_POST['id_funcionario'])
                ) {

                $nome = $_POST['nome'];
                $id_departamento = $_POST['id_departamento'];
                $sexo = $_POST['sexo'];
                $salario = $_POST['salario'];
                $id_funcionario = $_POST['id_funcionario'];

                # converte o formato "bonito" do formulario para o formato do banco
                $novo_salario = str_replace('.', '', $salario);
                $novo_salario = str_replace(',', '.', $novo_salario);
                
                # aqui vai a query que atualiza o registro no banco
                $sql = $conexao->prepare("UPDATE FUNCIONARIOS SET
                                            nome = '$nome',
                                            sexo = '$sexo',
                                            salario = '$novo_salario',
                                            id_departamento = '$id_departamento'
                                            WHERE id_funcionario = $id_funcionario");
                    $sql->execute();
            }
        break;
        case 'excluir':
            if ( isset($_GET['id_funcionario']) ) {
                $id_funcionario = $_GET['id_funcionario'];

                $sql = $conexao->prepare("DELETE FROM FUNCIONARIOS
                                            WHERE id_funcionario = $id_funcionario");
                $sql->execute();
            }
        break;
    }
    
}

header('location:listar-funcionarios.php');
?>