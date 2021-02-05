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

<body id="page-top">
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- INCLUE NAVBAR COM SESSAO -->
<?php
include 'navbar.php';
?>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                    <!-- CAMPOS QUE PODEM SER UTILIZADOS ABAIXO DO TITULO DA PAGINA-->
                    <!--<h1 class="h3 mb-2 text-gray-800">Clientes</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                    <!--TITULO DA PAGINA DE LISTA DE CLIENTES -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de Clientes</h6>
                        </div>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                    <!-- INICIO DA TABELA DE CLIENTES -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Sobrenome</th>
                                            <th>Celular</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                                    <!-- BUSCA OS DADOS NO BANCO PARA LISTAR -->
                                            <?php
                                            include 'connect.php';

                                            $sqlselect="SELECT id,nome,sobrenome,celular FROM cliente";
                                            
                                            $selectcliente = $pdo->prepare($sqlselect);
                                            $selectcliente->execute();

                                            $result=$selectcliente->fetchAll(PDO::FETCH_ASSOC);

                                            foreach($result as $cliente){
                                                echo '<tr>';
                                                echo '<td>'.$cliente['id'].'</td>';
                                                echo '<td>'.$cliente['nome'].'</td>';
                                                echo '<td>'.$cliente['sobrenome'].'</td>';
                                                echo '<td>'.$cliente['celular'].'</td>';
                                                echo '<td><a type="button" href="perfilcliente.php" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                <a id="excluircliente" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>';
                                                echo '</tr>';
                                            }
                                        ?>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ENCERRA DIV DE LISTA DE CLIENTES -->
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
            <!-- FECHA DIVS ANTERIORES -->
            </div>
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

    <!-- BOTAO QUE VOLTA AO TOPO DA PAGINA -->
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<!-- FUNÇÃOA DO SWEET ALERT -->
<script>
        $("#excluircliente").click(function(){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    // window.location.href= "deletecliente.php",
                    swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                    
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
                });
        
            });

        
        
</script>
