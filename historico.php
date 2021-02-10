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

    <?php
    include 'navbar.php'
    ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Histórico de Agendamentos</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Procedimento</th>
                                <th>Funcionário</th>
                                <th>Dia</th>
                                <th>Horário</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <!-- <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Procedimento</th>
                                <th>Funcionário</th>
                                <th>Dia</th>
                                <th>Horário</th>
                                <th>Ações</th>
                            </tr>
                        </tfoot> -->
                        <tbody>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->                    
                        <!-- BUSCA OS DADOS NO BANCO PARA LISTAR -->
                        <?php
                                include 'connect.php';

                                $sqlselect="SELECT a.id, b.nome,c.procedimento, d.funcionario, a.data_agendada, a.hora_inicio
                                            FROM agenda a
                                            INNER JOIN cliente b
                                            INNER JOIN procedimento c
                                            INNER JOIN funcionario d
                                            on a.id_cliente = b.id
                                            and a.id_procedimento = c.id
                                            ";
                                
                                $selectagenda = $pdo->prepare($sqlselect);
                                $selectagenda->execute();

                                $result=$selectagenda->fetchAll(PDO::FETCH_ASSOC);

                                foreach($result as $agenda){ ?>
                                  <tr>
                                  <td><?php echo $agenda['id'];?></td>
                                  <td><?php echo $agenda['nome'];?></td>
                                  <td><?php echo $agenda['procedimento'];?></td>
                                  <td><?php echo $agenda['funcionario'];?></td>
                                  <td><?php echo date('d/m/Y', strtotime($agenda['data_agendada']));?></td>
                                  <td><?php echo date('H:i',strtotime($agenda['hora_inicio']));?></td>
                                  <td><button type="button" id_agendamento="<?php echo $agenda['id']?>" class="id_agendamento btn btn-info"><i class="fas fa-eye"></i></button>
                                  </tr>
                                
                                <?php } ?>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->


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
<!-- REDIRECIONAMENTO PARA PAGINA DO AGENDAMENTO -->

<script>
    $('button.id_agendamento').click(function agendamento() {
        var id_agendamento = $(this).attr('id_agendamento');
        window.location.href = "agendamento.php?id_agendamento="+id_agendamento;
    });
</script>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->