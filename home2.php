<?php
session_start();
if(!empty($_SESSION['usuario'])){

    header('Location: home.html');


}else{

    echo "<script>alert('Faça login para acessar a pagina!')</script>";
    header('Location: index.php');

}


?>