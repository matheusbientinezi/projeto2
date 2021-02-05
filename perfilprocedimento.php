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
        <h1 class="h3 mb-4 text-gray-800">Cadastrar Clientes</h1>

        <div class="row">
            <div class="col-lg-12">
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
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
