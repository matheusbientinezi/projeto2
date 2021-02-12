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

                            $sqlselect = "SELECT id,nome,sobrenome,celular FROM cliente WHERE status = 'A' ";

                            $selectcliente = $pdo->prepare($sqlselect);
                            $selectcliente->execute();

                            $result = $selectcliente->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($result as $cliente) {
                            ?>
                                <tr>
                                    <td><?php echo $cliente['id']; ?></td>
                                    <td><?php echo $cliente['nome']; ?></td>
                                    <td><?php echo $cliente['sobrenome']; ?></td>
                                    <td><?php echo $cliente['celular']; ?></td>
                                    <td>
                                        <button type="button" id_editar_cliente="<?php echo $cliente['id']; ?> " class="id_editar_cliente btn btn-info"><i class="fas fa-edit"></i></button>
                                        <button type="button" id_historico_cliente="<?php echo $cliente['id']; ?>" class="id_historico_cliente btn btn-success"><i class="fas fa-history"></i></button>
                                        <button type="button" id_cliente="<?php echo $cliente['id']; ?>" class="id_cliente btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                        
                                    </td>
                                </tr>
                            <?php } ?>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- REDIRECIONAMENTO PARA PAGINA DE CADASTRO -->

<script>
    $('button.id_editar_cliente').click(function editar() {
        var id_editar_cliente = $(this).attr('id_editar_cliente');
        window.location.href = "perfilcliente.php?id_editar_cliente="+id_editar_cliente;
    });
</script>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- REDIRECIONAMENTO PARA HISTORICO DO CLIENTE -->

<script>
    $('button.id_historico_cliente').click(function historico() {
        var id_historico_cliente = $(this).attr('id_historico_cliente');
        window.location.href = "historicocliente.php?id_historico_cliente="+id_historico_cliente;
    });
</script>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<!-- FUNÇÃO DELETE(UPDATE STATUS INATIVO) DO SWEET ALERT -->
<script>
    $('button.id_cliente').click(function excluir() {
        var id_cliente = $(this).attr('id_cliente');
        var el = $(this).parent().parent();
        swal({
                title: "Tem certeza ?",
                text: "Todos os dados relacionados ao cliente serão excluidos",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: 'post',
                        data: {
                            id_cliente
                        },
                        url: 'deletar.php'

                    }).done(function() {
                        el.fadeOut(function() {
                            el.remove();
                        })
                    });
                    swal("Cliente excluído com sucesso!", {
                        icon: "success",

                    });
                } else {
                    swal("Exclusão cancelada!");
                }
            });

    });
</script>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->