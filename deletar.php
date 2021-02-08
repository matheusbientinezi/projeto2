<?php
session_start();
include 'connect.php';

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
unset($_SESSION['login']);
unset($_SESSION['senha']);
unset($_SESSION['usuario']);
echo "<script>alert('Faça login para acessar a página!')</script>";

header('location: index.php');

}elseif(isset($_POST['id_cliente'])){

$sql = $pdo->prepare("UPDATE cliente SET status = 'I' WHERE id = ?");
$sql->execute(array($_POST['id_cliente']));

}elseif(isset($_POST['id_excluir_procedimento'])){

$sql = $pdo->prepare("UPDATE procedimento SET status= 'I' WHERE id = ?");
$sql->execute(array($_POST['id_excluir_procedimento']));

}

?>