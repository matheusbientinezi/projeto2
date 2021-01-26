<?php
 include 'connect.php';
 $id = $_GET['id'];
 
 $delete = $pdo->prepare("DELETE FROM procedimento WHERE id={$id}");

     $delete->execute();
     header('location:listarprocedimento.php');

?>