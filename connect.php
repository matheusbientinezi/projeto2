<?php
try{
$pdo = new PDO('mysql:dbname=studio;host=localhost','root','');
}catch(PDOException $e){
    print "Error!: ".$e->getMessage() . "<br/>";
    die();
}
?>