<?php
include 'navbar.php';
// $dia = "<script>${i};</script>";
// $selectagenda = "SELECT * from agenda where data_agendada = ".$dia."";
// $consultaagenda = $pdo-> prepare($selectagenda);
// $consultaagenda -> execute();
// $result = $consultaagenda -> fetchAll(PDO::FETCH_ASSOC);
// print_r($selectagenda);
?>        

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"/>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- INICIO DA PÁGINA -->
        <div class="container-fluid">
            <!-- TITULO DA PAGINA COM BOTAO À ESQUERDA-->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h2 class="h3 mb-0 text-gray-800">Agenda</h2>
                <!-- BOTAO À ESQUERDA -->
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- PROJETO CALENDARIO VALENDO -->   
                <div class="col-md-4">
                    <div class="calendar">
                        <div class="month">
                        <i class="fas fa-angle-left prev"></i>
                        <div class="date">
                            <h2></h2>
                            <p></p>
                        </div>
                        <i class="fas fa-angle-right next"></i>
                        </div>
                        <div class="weekdays">
                        <div>Dom</div>
                        <div>Seg</div>
                        <div>Ter</div>
                        <div>Qua</div>
                        <div>Qui</div>
                        <div>Sex</div>
                        <div>Sáb</div>
                        </div>
                        <div class="days"></div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="lista overflow-auto">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th>Horário</th>
                                <th>Thais</th>
                                <th>Deise</th>
                                <th>Amanda</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $tempo = '07:00';
                                
                                for($i=0;$i<69;$i++){ ?>
                                    <tr>
                                    <td><?php echo $tempo;?></td>
                                    <td>

                                    </td>
                                    <td>
                                        <?php
                                        
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        
                                        ?>
                                    </td>
                                    <tr>
                                   <?php 
                                   $tempo = date('H:i',strtotime('+15 minute',strtotime($tempo)));
                                 } ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="js/script.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->

</body>

<?php

function selectHorarios($id_funcionario){
    include 'connect.php';
    $select = "SELECT * from agenda where id_funcionario =".$id_funcionario."";
    $selectagenda = $pdo -> prepare($select);
    $selectagenda ->execute();
    $result = $selectagenda ->fetchAll(PDO::FETCH_ASSOC);

}


?>