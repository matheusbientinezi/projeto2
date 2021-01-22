<?php
include 'login.html';
include 'connect.php';

if(isset($_POST['acao'])){

//pega dados inseridos
$email = $_POST['email'];
$senha = $_POST['senha'];

//executa select no banco com os dados
$querylogin="SELECT email,senha,usuario FROM usuario_adm WHERE email = '".$email."'";
$sqllogin = $pdo -> prepare($querylogin);
$sqllogin->execute();
$result=$sqllogin->fetch(PDO::FETCH_ASSOC);

//verifica dados para validar login
    if(!empty($result['email'])){
        if($result['senha']===$senha){
            session_start();
            $_SESSION['usuario']=$result['usuario'];
            header('Location: home.php');
        }else{
            echo "<script>alert('Senha Incorreta!')</script>";
            session_destroy();

        }

    }else{ 
        echo "<script>alert('E-mail Incorreto!')</script>";
        session_destroy();

    }

}else{

}



?>