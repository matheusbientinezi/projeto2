
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Projeto Studio</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    <!-- Jquery mascaras celular e telefone -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body id="page-top">

<?php
include 'navbar.php';
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Cadastrar Clientes</h1>

                    <div class="row">

                        <div class="col-lg-12">

                            <!-- Circle Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Insira os dados do procedimento</h6>
                                </div>
                                <div class="card-body">
                                <form method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="procedimento">Procedimento</label>
                                        <input type="text" name="procedimento" class="form-control" id="procedimento" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="inputEmail4">Tempo</label>
                                        <input type="time" name="tempo" class="form-control" id="tempo" required>
                                        </div>
                                    </div>
                                
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="inputEmail4">Informações Adicionais</label>
                                        <input type="text" name="informacoesadicionais" class="form-control" id="informacoesadicionais">
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                        <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="receberoferta" id="receberoferta">
                                        <label class="form-check-label" for="gridCheck">
                                            Receber ofertas por E-mail
                                        </label>
                                        </div>
                                    </div> -->
                                    <button type="submit" name="cadastrarprocedimento" id="cadastrarprocedimento" class="btn btn-primary">Cadastrar</button>

                                    </form>
                                </div>
                            </div>


                            <!-- Brand Buttons ///////// OUTRA DIV QUE PODE USAR-->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Brand Buttons</h6>
                                </div>
                                <div class="card-body">
                                </div>
                        </div>

                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
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



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>


                            <!-- CADASTRA PROCEDIMENTO -->

<?php

include 'connect.php';

if(isset($_POST['cadastrarprocedimento'])){
    $procedimento=$_POST['procedimento'];
    $tempo=$_POST['tempo'];
    $informacoesadicionais=$_POST['informacoesadicionais'];

    

    //$sqlinsertcliente="INSERT INTO cliente VALUES(null,'$nome','$sobrenome','$email','$cpf','$celular','$telefone',$datanascimento,'$endereco','$numero','$cidade','$uf','$cep','$informacoesadicionais',current_timestamp())";
    $sqlinsertprocedimento="INSERT INTO procedimento VALUES(null,?,?,?)";

    $sqlinsert=$pdo->prepare($sqlinsertprocedimento);
    $sqlinsert->execute(array($procedimento,$tempo,$informacoesadicionais));
    //$sqlinsert->execute();
    
    if($sqlinsert){

        echo '<script type="text/javascript">
        swal("", "Procedimento cadastrado com sucesso!", "success");
        </script>';
    }else{
        echo '<script type="text/javascript">
        swal("", "Erro ao cadastrar Procedimento!", "error");
        </script>';
    }
}
?>