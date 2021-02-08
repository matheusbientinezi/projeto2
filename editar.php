<?php
include 'connect.php';
if(isset($_POST['id_cliente'])){
$sql = $pdo->prepare("SELECT * FROM cliente WHERE id =?");
$sql->execute(array($_POST['id_editar_cliente']));
$result = $sql->fetch(PDO::FETCH_ASSOC);


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <p><?php 
        echo 'de certo';
        echo $result['nome'];
    ?></p>
</body>
</html>