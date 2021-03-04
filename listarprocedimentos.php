<!DOCTYPE html>
<html lang="en">

<head>
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
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include 'connect.php';

                            $sqlselect = "SELECT id,procedimento,tempo,informacoesadicionais FROM procedimento WHERE status = 'A'";

                            $selectprocedimento = $pdo->prepare($sqlselect);
                            $selectprocedimento->execute();

                            $result = $selectprocedimento->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($result as $procedimento) {
                            ?>
                                <tr>
                                <td> <?php echo $procedimento['id'];?></td>
                                <td> <?php echo $procedimento['procedimento'];?></td>
                                <td> <?php echo date('H:i', strtotime($procedimento['tempo']));?></td>
                                <td> <?php echo $procedimento['informacoesadicionais'];?></td>
                                <td>
                                <button type="button" id_editar_procedimento = "<?php echo $procedimento['id'];?>" class="perfil_procedimento btn btn-info"><i class="fas fa-edit"></i></button>
                                <button type="button" id_excluir_procedimento = "<?php echo $procedimento['id'];?>" class="id_excluir_procedimento btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </td>
                                </tr>

                            <?php } ?>
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

<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<!-- FUNÇÃO DELETE DO SWEET ALERT -->
<script>

$('button.id_excluir_procedimento').click(function excluir(){
    var id_excluir_procedimento = $(this).attr('id_excluir_procedimento');
    var el = $(this).parent().parent();
    swal({
        title: "Tem certeza ?",
        text: "Todos os dados relacionados ao procedimento serão excluidos",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                method:'post',
                data:{'id_excluir_procedimento':id_excluir_procedimento},
                url:'deletar.php'

            }).done(function(){
                el.fadeOut(function(){
                    el.remove();
                })
            });
            swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
            
            });
        } else {
            swal("Your imaginary file is safe!");
        }
        });

    });



</script>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->