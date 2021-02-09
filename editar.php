<?php
//echo "<pre>";
//var_dump($_GET);

include 'connect.php';

if(isset($_GET['id_editar_cliente'])){
$sql = $pdo->prepare("SELECT * FROM cliente WHERE id =?");
$sql->execute(array($_GET['id_editar_cliente']));
$result = $sql->fetch(PDO::FETCH_ASSOC);
}
?>