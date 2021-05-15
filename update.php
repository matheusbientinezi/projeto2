<?php
include 'connect.php';

if(isset($_POST['id_cliente'])){

$id_cliente= $_POST['id_cliente'];
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$email=$_POST['email'];
$cpf=$_POST['cpf'];
$celular=$_POST['celular'];
$telefone=$_POST['telefone'];
$datanascimento=$_POST['datanascimento'];
$endereco=$_POST['endereco'];
$numero=$_POST['numero'];
$cidade=$_POST['cidade'];
$uf=$_POST['uf'];
$cep=$_POST['cep'];
$informacoesadicionais=$_POST['informacoesadicionais'];

$sqlupdate = "UPDATE cliente 
set nome = '".$nome."', sobrenome ='".$sobrenome."', email = '".$email."',cpf = '".$cpf."',celular = '".$celular."',telefone = '".$telefone."',datanascimento ='".$datanascimento."',endereco='".$endereco."',numero ='".$numero."',cidade = '".$cidade."', uf = '".$uf."',cep = '".$cep."', informacoesadicionais ='".$informacoesadicionais."' WHERE id = ".$id_cliente."";
$sqlexecute = $pdo -> prepare($sqlupdate);
$sqlexecute -> execute();


}elseif(isset($_POST['id'])){

$id = $_POST['id'];
$procedimento = $_POST['procedimento'];
$tempo = $_POST['tempo'];
$informacoesadicionais = $_POST['informacoesadicionais'];

$sqlupdate ="UPDATE procedimento set procedimento = '".$procedimento."' , tempo = '".$tempo."', informacoesadicionais ='".$informacoesadicionais."' where id = ".$id."";
print_r($sqlupdate);
$sqlexecute = $pdo -> prepare($sqlupdate);
$sqlexecute -> execute();
}


?>