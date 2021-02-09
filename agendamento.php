<?php
include 'navbar.php';
    if(isset($_GET['id_agendamento'])){
    $sql = $pdo->prepare("SELECT * FROM agenda WHERE id =?");
    $sql->execute(array($_GET['id_agendamento']));
    $result = $sql->fetch(PDO::FETCH_ASSOC);
    }

?>
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
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- INICIO DA PAGINA -->
    <div class="container-fluid">
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <!--TITULO NA PARTE PRINCIPAL-->
        <h1 class="h3 mb-4 text-gray-800">Agendamento</h1>

        <div class="row">
            <div class="col-lg-12">
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                <!-- INICIO DIV DE CADASTRO DE CLIENTE -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Dados do agendamento</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nome"><h5><b>Nome:</b></h5></p></label>
                                <p><?php echo $result['id_cliente'];?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="sobrenome"><h5><b>Sobrenome:</b></h5></p></label>
                                <p><?php echo 'aqui vai o sobrenome'?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="nome"><b><h5>CPF do cliente:</b></h5></p></label>
                                <p><?php echo 'aqui vai o cpf do cliente';?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="sobrenome"><b><h5>Profissional:</b></h5></p></label>
                                <p><?php echo 'aqui vai o profissional'?></p>
                            </div>
                            <div class="col-md-6">
                                <label for ="celular"><b><h5>Contato do cliente:</b></h5></p></label>
                                <p><?php echo 'Numero do celular do cliente'?></p>
                            </div>
                            <div class="col-md-6">
                                <label for ="hora_agendamento"><b><h5>Momento do agendamento:</b></h5></p></label>
                                <p><?php echo $result['data_agendamento']?></p>
                            </div>
                            <div class="col-md-6">
                                <label for = "data_agendamento"><b><h5>Data do procedimento:</b></h5></p></label>
                                <p><?php echo $result['data_agendada']?></p>
                            </div>
                            <div class="col-md-6">
                                <label for ="hora_inicio"><b><h5>Horário:</b></h5></p></label>
                                <p><?php echo $result['hora_inicio']?></p>
                            </div>
                    </div>
                </div>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                <!-- SEGUNDA DIV QUE PODE USAR-->
                <!-- <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Brand Buttons</h6>
                    </div>
                    <div class="card-body">
                    </div>
                </div> -->
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
            
            <!-- FECHA DIVS ANTERIORES -->
            </div>

        </div>

    </div><!-- /.container-fluid -->
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
    <!-- BOTAO QUE SOBE AO INICIO DA PAGINA-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
