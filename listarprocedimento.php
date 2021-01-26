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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body id="page-top">

    <?php
    include 'navbar.php';
    ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Clientes</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Procedimento</th>
                                <th>Tempo</th>
                                <th>Informações</th>
                                <th>Visualizar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include 'connect.php';

                            $sqlselect = "SELECT id,procedimento,tempo,informacoesadicionais FROM procedimento";

                            $selectprocedimento = $pdo->prepare($sqlselect);
                            $selectprocedimento->execute();

                            $result = $selectprocedimento->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($result as $procedimento) {
                                echo '<tr>';
                                echo '<td>' . $procedimento['id'] . '</td>';
                                echo '<td>' . $procedimento['procedimento'] . '</td>';
                                echo '<td>' . $procedimento['tempo'] . '</td>';
                                echo '<td>' . $procedimento['informacoesadicionais'] . '</td>';
                                echo '<td><button type="button" class="btn btn-info">Editar</button></td>';
                                echo "<td><button id='excluir' type='button' class='btn btn-danger' onclick='excluirRegistro({$procedimento['id']})'>Excluir</button></form></td>";
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div> <!-- /.container-fluid -->
   
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

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
                    if (isset($_POST['logout'])) {

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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>

<script>
        function sleep(milliseconds) {
        var start = new Date().getTime();
        for (var i = 0; i < 1e7; i++) {
            if ((new Date().getTime() - start) > milliseconds){
            break;
    }
  };
}

</script>


<script>
    function excluirRegistro(id){

        swal({
                    title: "Tem certeza ?",
                    text: "Uma vez deletado, terá que recadastrar o procedimento!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Procedimento excluido com sucesso!", {
                            icon: "success",
                            buttons:false,
                        });
                        window.location.href = "delete.php?id=" + id;
                    } else {
                        swal("Exclusão de procedimento cancelada!");
                    }
                });
        }

</script>