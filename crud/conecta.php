<?php
$usuario = 'root';
$senha = '';
$charset = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try {
    $conexao = new PDO('mysql:host=localhost;dbname=empresa', $usuario, $senha, $charset);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'ERRO NA QUERY: ' . $e->getMessage();
    exit;
}
?>