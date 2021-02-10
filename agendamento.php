<?php
include 'navbar.php';
    if(isset($_GET['id_agendamento'])){

    $sqlselect = "SELECT a.id, a.data_agendamento, a.data_agendada,a.hora_inicio, a.informacoes_adicionais, a.tempo, c.nome, c.sobrenome, c.email,c.cpf,c.celular,p.procedimento, f.funcionario, f.sobrenome_funcionario
                  FROM agenda a
                  INNER JOIN cliente c
                  INNER JOIN procedimento p
                  INNER JOIN funcionario f
                  ON a.id = ".$_GET['id_agendamento']."
    ";

    $sql = $pdo->prepare($sqlselect);
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
                                <label for="nome">Nome:</label>
                                <h5 style="background-color:#ececec"><b><?php echo $result['nome']; echo ' '; echo $result['sobrenome'];?></b></h5>
                            </div>
                            <div class="col-md-6">
                                <label for="sobrenome">Email:</label>
                                <h5 style="background-color:#ececec" ><b><?php echo $result['email']?></b></h5>
                            </div>
                            <div class="col-md-6">
                                <label for="nome">CPF do cliente:</label>
                                <b><h5 style="background-color:#ececec" ><?php echo $result['cpf'];?></b></h5>
                            </div>
                            <div class="col-md-6">
                                <label for="sobrenome">Profissional:</label>
                                <b><h5 style="background-color:#ececec" ><p><?php echo $result['funcionario']; echo ' '; echo $result['sobrenome_funcionario']?></p></b></h5>
                            </div>
                            <div class="col-md-6">
                                <label for ="celular">Contato do cliente:</label>
                                <b><h5 style="background-color:#ececec" ><?php echo $result['celular']?></b></h5>
                            </div>
                            <div class="col-md-6">
                                <label for ="hora_agendamento">Momento do agendamento:</label>
                                <b><h5 style="background-color:#ececec"><?php echo $result['data_agendamento']?></b></h5>
                            </div>
                            <div class="col-md-6">
                                <label for = "data_agendamento">Data do procedimento:</label>
                                <b><h5 style = "background-color:#b4fdf3" ><?php echo $result['data_agendada']?></b></h5>
                            </div>
                            <div class="col-md-6">
                                <label for = "data_agendamento">Procedimento:</label>
                                <b><h5 style = "background-color:#b4fdf3"><?php echo $result['procedimento']?></b></h5>
                            </div>
                            <div class="col-md-6">
                                <label for = "data_agendamento">Tempo médio procedimento:</label>
                                <b><h5 style="background-color:#ececec"><?php echo $result['tempo']?></b></h5>
                            </div>
                            <div class="col-md-6">
                                <label for ="hora_inicio">Horário:</label>
                                <b><h5 style = "background-color:#b4fdf3"><?php echo $result['hora_inicio']?></b></h5>
                            </div>
                            <div class="col-md-12">
                                <label for ="hora_inicio">Informações adicionais:</label>
                                <b><h5 style="background-color:#ececec"><?php echo $result['informacoes_adicionais']?></b></h5>
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
