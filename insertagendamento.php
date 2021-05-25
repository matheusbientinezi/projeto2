<?php
print_r(@$_REQUEST);
session_start();
include 'connect.php';

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
unset($_SESSION['login']);
unset($_SESSION['senha']);
unset($_SESSION['usuario']);
echo "<script>alert('Faça login para acessar a página!')</script>";

header('location: index.php');

}elseif(isset($_POST['id_funcionario'])){

$id_funcionario = $_POST['id_funcionario'];
$id_cliente = $_POST['id_cliente'];
$id_procedimento = $_POST['id_procedimento'];
$data = date('Y-m-d H:i', strtotime($_POST['data']));
$tempo = $_POST['tempo'];
$informacoesadicionais=$_POST['informacoesadicionais'];

$tempoprocedimento = $pdo->prepare("SELECT tempo FROM procedimento where id = ".$id_procedimento."");
$tempoprocedimento->execute();

$tempo = $tempoprocedimento->fetch(PDO::FETCH_ASSOC);
echo $tempo['tempo'];

if($tempo['tempo']=='00:30:00'){
    $tempo2='30';
    $quantidade_horarios=0;
}elseif($tempo['tempo']=='01:00:00'){
    $tempo2='60';
    $quantidade_horarios=1;
}elseif($tempo['tempo']=='01:30:00'){
    $tempo2='90';
    $quantidade_horarios=2;
}elseif($tempo['tempo'] == '02:00:00'){
    $tempo2='120';
    $quantidade_horarios=3;
}elseif($tempo['tempo'] == '02:30:00'){
    $tempo2='150';
    $quantidade_horarios=4;
}elseif($tempo['tempo'] == '03:00:00'){
    $tempo2='180';
    $quantidade_horarios=5;
}elseif($tempo['tempo'] == '03:30:00'){
    $tempo2='210';
    $quantidade_horarios=6;
}elseif($tempo['tempo'] == '04:00:00'){
    $tempo2='240';
    $quantidade_horarios=7;
}


$data_inicio = $data;
echo '<br>';
print_r($data_inicio);
echo '<br>';
$data_final = date('Y-m-d H:i',strtotime('+'.$tempo2.' minute',strtotime($data)));
echo '<br>';
print_r($data_final);
echo '<br>';
$sql = $pdo->prepare("INSERT INTO agenda VALUES (null,$id_funcionario,$id_cliente,$id_procedimento,now(),'$data_inicio','$data_final','".$tempo['tempo']."','agendado','$informacoesadicionais',$quantidade_horarios)");

$sql->execute();

}else{
    echo 'oi';
}

?>