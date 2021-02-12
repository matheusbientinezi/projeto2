<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="scss/calendario.scss" rel="stylesheet">

</head>

<body id="page-top">
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- ADICIONA NAVBAR COM SESSAO -->

<?php
include 'navbar.php'
?>

<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <!-- INICIO DA PÁGINA -->
        <div class="container-fluid">

<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
            <!-- TITULO DA PAGINA COM BOTAO À ESQUERDA-->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <!-- BOTAO À ESQUERDA -->
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
            <!-- Content Row -->
            <div class="row">
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                <!-- AREA PRINCIPIAL DO CALENDARIO-->
                <div class="col-xl-6 col-lg-6">
                    <div class="card shadow mb-4">
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                        <!-- TITULO DA DIV DO CALENDARIO -->

                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">AGENDA 1</h6>
                            <div class="dropdown no-arrow">
                        
                        <!-- TRES BOLINHAS COM DROPDOWN NO CANTO -->
                                <!-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div> -->

                            </div>
                        </div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                        <!-- CALENDARIO -->
                        <div class="card-body">
                            <div class="chart-area">
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                            <script src="http://momentjs.com/downloads/moment.js"></script>
                            <link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.css' />
                            <script src='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.js'></script>


                            <div id='calendar'>
                            <script>

                            $(document).ready(function() {

                            // page is now ready, initialize the calendar...

                            $('#calendar').fullCalendar({
                                // put your options and callbacks here
                            })

                            });

                            </script>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                <!-- AREA PRINCIPIAL DO CALENDARIO-->
                <div class="col-xl-6 col-lg-6">
                    <div class="card shadow mb-4">
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                         <!-- TITULO DA DIV DO CALENDARIO --> 
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">AGENDA 2</h6>
                            <div class="dropdown no-arrow">
                        
                        <!-- TRES BOLINHAS COM DROPDOWN NO CANTO -->
                                <!-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div> -->
                                
                            </div>
                        </div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                        <!-- CALENDARIO -->
                        <div class="card-body">
                            <div class="chart-area">
                            <!-- AQUI VAI O SUPOSTO CALENDARIO DA PAGINA PRINCIPAL -->
                            </div>
                        </div>
                    </div>
                </div>
                
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
            </div>
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

    <!-- QUADRADINHO QUE VOLTA AO INICIO DA PAGINA-->
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
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/calendario.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>