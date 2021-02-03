<?php
include 'connect.php';

?>

<head>
    <title>SB Admin 2 - Login</title>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                            <img id="imagemlogin" src="imagem/logo.png" height="250">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bem-Vindo!</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email" aria-describedby="emailHelp"
                                                name="email"
                                                placeholder="Insira seu email...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="senha" name = "senha" placeholder="Senha">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button name="acao" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        <!-- LOGAR COM FACEBOOK OU GMAIL -->
                                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</body>






<?php
if(isset($_POST['acao'])){

//pega dados inseridos
$email = $_POST['email'];
$senha = $_POST['senha'];

//executa select no banco com os dados
$querylogin="SELECT usuario,email,senha,foto_perfil FROM usuario_adm WHERE email = '".$email."'";
$sqllogin = $pdo -> prepare($querylogin);
$sqllogin->execute();
$result=$sqllogin->fetch(PDO::FETCH_ASSOC);

//verifica dados para validar login
    if(!empty($result['email'])){
        if($result['senha']===$senha){
            session_start();
            $_SESSION['email']=$result['email'];
            $_SESSION['senha']=$result['senha'];
            $_SESSION['usuario']=$result['usuario'];
            $_SESSION['foto_perfil']=$result['foto_perfil'];
            header('Location: home.php');
        }else{
            echo "<script>alert('Senha Incorreta!')</script>";
            unset ($_SESSION['email']);
            unset ($_SESSION['senha']);
            unset ($_SESSION['usuario']);
            unset ($_SESSION['foto_perfil']);
        }

    }else{ 
        echo "<script>alert('E-mail Incorreto!')</script>";

    }

}else{

}



?>