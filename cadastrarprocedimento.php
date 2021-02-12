<!DOCTYPE html>
<html lang="en">

<head>

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
    <!-- INCLUE NAVBAR COM SESSAO -->
    <?php
    include 'navbar.php';
    ?>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <!--INICIO DA PAGINA DE CADASTRO DE PROCEDIMENTO-->
    <div class="container-fluid">
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <!--TITULO DA PAGINA DE CADASTRO DE PROCEDIMENTO-->
        <h1 class="h3 mb-4 text-gray-800">Procedimento</h1>

        <div class="row">
            <div class="col-lg-12">
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                <!-- INICIO DO FORMULARIO DE CADASTRO -->
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
                            <button type="submit" name="cadastrarprocedimento" id="cadastrarprocedimento" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>

<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
 
                <!-- OUTRA DIV QUE PODE USAR-->
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
    </div>   <!-- End of Main Content -->
 
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
    <!-- BOTAO QUE VAI PARA O TOPO DA PAGINA -->
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

<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- CADASTRA PROCEDIMENTO -->

<?php

include 'connect.php';

if (isset($_POST['cadastrarprocedimento'])) {
    $procedimento = $_POST['procedimento'];
    $tempo = $_POST['tempo'];
    $informacoesadicionais = $_POST['informacoesadicionais'];
    $status = 'A';



    //$sqlinsertcliente="INSERT INTO cliente VALUES(null,'$nome','$sobrenome','$email','$cpf','$celular','$telefone',$datanascimento,'$endereco','$numero','$cidade','$uf','$cep','$informacoesadicionais',current_timestamp())";
    $sqlinsertprocedimento = "INSERT INTO procedimento VALUES(null,?,?,?,?)";

    $sqlinsert = $pdo->prepare($sqlinsertprocedimento);
    $sqlinsert->execute(array($procedimento, $tempo, $informacoesadicionais,$status));
    //$sqlinsert->execute();

    if ($sqlinsert) {

        echo '<script type="text/javascript">
        swal("", "Procedimento cadastrado com sucesso!", "success");
        </script>';
    } else {
        echo '<script type="text/javascript">
        swal("", "Erro ao cadastrar Procedimento!", "error");
        </script>';
    }
}
?>
