<?php
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top" class="sidebar-toggled">
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                <!-- INICIO DA PAGINA -->
                <div class="container-fluid">
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    
                <!-- INICIO DO FORM DE ATUALIZAR PERFIL -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Dados do perfil</h6>
                    </div>
                    <div class="card-body">
                        <form method="post">
                        <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="imagem">Imagem:</label>
                                    <input type="file" name="foto_perfil"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <img width=180 height=180 src="<?php echo $_SESSION['foto_perfil'];?>">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="procedimento">Usuario</label>
                                    <input type="text" value="<?php echo $_SESSION['usuario'];?>" name="usuario" class="form-control" id="procedimento">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="text" value="<?php echo $_SESSION['email'];?>" name="email" class="form-control" id="Email">
                                </div>
                            </div>

                            <hr class=sidebar-devider>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Senha atual</label>
                                    <input type="password" name="senha" class="form-control" id="informacoesadicionais">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nova senha</label>
                                    <input type="password" name="novasenha" class="form-control" id="informacoesadicionais">
                                </div>
                            </div>
                            <button type="submit" name="atualizarperfil" id="atualizarperfil" class="btn btn-primary">Atualizar</button>
                        </form>
                    </div>
                </div>


            </div>
            <!-- End of Main Content -->
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

    <!-- BOTAO QUE SOBE AO TOPO DA PAGINA-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

    <!-- MODAL DE LOGOUT ENCERRA SESSAO -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pronto para sair ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Clique em "Sair" se deseja encerrar sua sessão.</div>
                    <div class="modal-footer">
                        <form method="POST">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                            <button class="btn btn-primary" name="logout">Sair</button>
                        </form>
                        <!-- ENCERRA SESSAO E VOLTA AO INICIO -->
                        <?php
                        if (isset($_POST['logout'])){
                            
                            session_destroy();
                            echo "<script>location.href='index.php';</script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>

<?php

if(isset($_POST['atualizarperfil'])){

$usuario = $_POST['usuario'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$novasenha = $_POST['novasenha'];
$fotoperfil = $_POST['foto_perfil'];

$sqlselect="SELECT usuario,email,senha,foto_perfil FROM usuario_adm WHERE usuario ='".$_SESSION['usuario']."'";

$sqldadosadm = $pdo->prepare($sqlselect);
// print_r($sqldadosadm);
$sqldadosadm->execute();

$result=$sqldadosadm->fetch(PDO::FETCH_ASSOC);
echo 'ola mundo seu merda';
// print_r($sqlselect);
// die();

    if($senha===$result['senha']){

        if($usuario != $result['usuario']){
            $sqlupdateusuario = $pdo->prepare("UPDATE usuario_adm SET usuario = '".$usuario."' WHERE usuario = '".$_SESSION['usuario']."';");
            $sqlupdateusuario -> execute();
            $_SESSION['usuario']=$usuario;
        }

        if($email != $result['email']){
            $sqlupdateusuarioemail=$pdo->prepare("UPDATE usuario_adm SET email = '".$email."' WHERE usuario = '".$_SESSION['usuario']."';");
            $sqlupdateusuarioemail -> execute();
            $_SESSION['email']=$email;
        }

        if($novasenha != $result['senha']){
            $sqlupdateusuariofotoperfil=$pdo->prepare("UPDATE usuario_adm SET senha = '".$senha."' WHERE usuario = '".$_SESSION['usuario']."';");    
            $sqlupdateusuariosenha -> execute();
            $_SESSION['senha']=$senha;
        }

        echo "<script>alert('Dados atualizados com sucesso!')</script>";

    }else{
        echo "<script>alert('Insira a senha para atualizar os dados!')</script>";
    }


}

?>