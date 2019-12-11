<?php
include('valida-sessao.php');
include('conecta.php');

if ( isset($_REQUEST['acao']) ) {
    $acao = $_REQUEST['acao'];

    switch ($acao) {
        case 'inserir':
            if ( isset($_POST['sigla']) && isset($_POST['nome']) ) {
                $sigla = $_POST['sigla'];
                $nome = $_POST['nome'];

                $sql = $conexao->prepare("INSERT INTO DEPARTAMENTOS (sigla, nome)
                                            VALUES ('$sigla', '$nome') ");
                $sql->execute();
            }
        break;
        case 'editar':
            if(isset($_POST['id_departamento']) &&
               isset($_POST['sigla']) &&
               isset($_POST['nome'])) {
            

                $id_departamento = $_POST['id_departamento'];
                $sigla = $_POST['sigla'];
                $nome = $_POST['nome'];

                # aqui vai a query que atualiza o registro no banco
                $sql = $conexao->prepare("UPDATE DEPARTAMENTOS SET sigla = '$sigla', nome = '$nome'
                                          WHERE id_departamento = $id_departamento");
                $sql->execute();
                
            }
      
        break;
        case 'excluir':
            if ( isset($_GET['id_departamento'])) {
                $id_departamento = $_GET['id_departamento'];
                $sql = $conexao->prepare("DELETE FROM DEPARTAMENTOS
                                            WHERE ID_DEPARTAMENTO = $id_departamento");
            $sql->execute();
            }    
        break;
    }
    
}

header('location:listar-departamentos.php');
?>