<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
include 'connect.php';

    if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    // echo "<script>alert('Faça login para acessar a página!')</script>";
    header('location: index.php');
    }
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Studio Dellas</title>
<script src="https://kit.fontawesome.com/c1b9116131.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>
<body id="page-top">

    <!-- Main Content -->
    <div id="content" style="background-color: #faf6f8">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-icon">
                <img src="imagem\logo.png" height="50px" width="55px">  
                </div>
            </a>
           <div class = testehora>
            <div id="data-hora">
                        <script>
                            // Função para formatar 1 em 01
                            const zeroFill = n => {
                                return ('0' + n).slice(-2);
                            }

                            // Cria intervalo
                            const interval = setInterval(() => {
                                // Pega o horário atual
                                const now = new Date();

                                // Formata a data conforme dd/mm/aaaa hh:ii:ss
                                const dataHora = zeroFill(now.getUTCDate()) + '/' + zeroFill((now.getMonth() + 1)) + '/' + now.getFullYear() + ' ' + zeroFill(now.getHours()) + ':' + zeroFill(now.getMinutes()) + ':' + zeroFill(now.getSeconds());

                                // Exibe na tela usando a div#data-hora
                                document.getElementById('data-hora').innerHTML = dataHora;
                            }, 1000);
                        </script>
                        </div>
                        </div>
            <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="home.php"  aria-expanded="false">
                    <div class = "testeicone"><i class="fas fa-calendar-alt"></i></div>
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Agenda</span>               
                </a>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class = "testeicone"><i class="fas fa-users"></i></div>
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Clientes</span>               
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="cadastrarclientes.php">
                        <i class="fas fa-user-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                        Cadastrar
                    </a>
                    <a class="dropdown-item" href="listarclientes.php">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Listar
                    </a>
                </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle disabled"  style="color:darkgray;" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class = "testeicone"><i class="fas fa-users"></i></div>
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Funcionários</span>               
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="cadastrarcliente.php">
                    <i class="fas fa-user-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                        Cadastrar
                    </a>
                    <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Listar
                    </a>
                </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>
            
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="cadastrarprocedimento.php"  aria-expanded="false">
                <div class = "testeicone"><i class="fas fa-paint-brush"></i></div>
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Procedimento</span>               
                </a>
            </li>


            <div class="topbar-divider d-none d-sm-block"></div>

            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="historico.php"  aria-expanded="false">
                <div class = "testeicone"><i class="fas fa-clipboard-list"></i></div>
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Histórico</span>               
                </a>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['usuario']; ?></span>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="perfil.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>