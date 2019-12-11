<?php
session_start();
include('conecta.php');

if (isset($_POST['user']) && isset($_POST['pass'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    # criptografamos o que o usuário digitou na senha para comparar na query do banco
    $senha_cripto = md5($pass);

    # valida se o usuário é ele mesmo!
    $sql = $conexao->prepare("SELECT * FROM USUARIOS
                                WHERE usuario = '$user' AND senha = '$senha_cripto'");                             
    $sql->execute();
    $result = $sql->fetchAll();

    if (sizeof($result) > 0) {

        # cria uma variável de sessão (que fica válida e disponível até que eu feche o browser)
        $_SESSION['logado'] = true;

        header('location:index.php');

    } else {
        header('location:login.php?falhou=1');
    }

} else {
    header('location:login.php');
}
?>