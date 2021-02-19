<?php
include 'navbar.php';
?>        

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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

                <!-- AREA PRINCIPIAL DO CALENDARIO-->
                <div class="col-xl-8 col-lg-8">
                    <div class="card shadow mb-4">

                        <!-- CALENDARIO -->
                        <div class="calendario card-body">
                            <div class="chart-area">

                            <meta charset='utf-8' />
                            <link href='css/core/main.min.css' rel='stylesheet' />
                            <link href='css/daygrid/main.min.css' rel='stylesheet' />
                            <script src='js/core/main.min.js'></script>
                            <script src='js/interaction/main.min.js'></script>
                            <script src='js/daygrid/main.min.js'></script>
                            <script src='js/core/locales/pt-br.js'></script>
                            <script>

                                document.addEventListener('DOMContentLoaded', function () {
                                    var calendarEl = document.getElementById('calendar');

                                    var calendar = new FullCalendar.Calendar(calendarEl, {
                                        locale: 'pt-br',
                                        plugins: ['interaction', 'dayGrid'],
                                        //defaultDate: '2019-04-12',
                                        editable: true,
                                        eventLimit: true,
                                        events: 'list_eventos.php',
                                        extraParams: function () {
                                            return {
                                                cachebuster: new Date().valueOf()
                                            };
                                        }
                                    });

                                    calendar.render();
                                });

                            </script>
                            <style>
            
                            #calendar {
                                max-width: 900px;
                                margin: 0 auto;
                            }

                            </style>
                            </head>
                            <body>

                            <div id='calendar'>
                            </div>

                            </body>                                

                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->


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

</body>