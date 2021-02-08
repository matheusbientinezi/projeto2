<?php
echo "<pre>";
var_dump($_POST);

include 'connect.php';

if(isset($_POST['id_editar_cliente'])){
$sql = $pdo->prepare("SELECT * FROM cliente WHERE id =?");
$sql->execute(array($_POST['id_editar_cliente']));
$result = $sql->fetch(PDO::FETCH_ASSOC);

echo "<pre>";
var_dump($result);

}
?>