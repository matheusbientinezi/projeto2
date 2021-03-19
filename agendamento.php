<?php
include 'navbar.php';
    if(isset($_GET['id_agendamento'])){

    $sqlselect = "SELECT a.id, a.data_agendamento,a.hora_inicio, a.informacoes_adicionais, a.tempo, c.nome, c.sobrenome, c.email,c.cpf,c.celular,p.procedimento, f.funcionario, f.sobrenome_funcionario
                  FROM agenda a
                  INNER JOIN cliente c ON c.id = a.id_cliente
                  INNER JOIN procedimento p ON p.id = a.id_procedimento
                  INNER JOIN funcionario f ON f.id=a.id_funcionario
                  WHERE a.id = ".$_GET['id_agendamento']."
    ";

    $sql = $pdo->prepare($sqlselect);
    $sql->execute(array($_GET['id_agendamento']));
    $result = $sql->fetch(PDO::FETCH_ASSOC);
    }

?>

<body id="page-top">
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- INICIO DA PAGINA -->
    <div class="container-fluid">
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <!--TITULO NA PARTE PRINCIPAL-->
        <h1 class="h3 mb-4 text-gray-800"><a href="JavaScript: window.history.back();"><i class="fas fa-chevron-left"></i></a> Agendamento</h1>

        <div class="row">
            <div class="col-lg-12">
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                <!-- INICIO DIV DE CADASTRO DE CLIENTE -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Dados do agendamento</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nome">Nome:</label>
                                <h5 style="background-color:#ececec"><b><?php echo $result['nome']; echo ' '; echo $result['sobrenome'];?></b></h5>
                            </div>
                            <div class="col-md-6">
                                <label for="sobrenome">Email:</label>
                                <h5 style="background-color:#ececec" ><b><?php echo $result['email']?></b></h5>
                            </div>
                            <div class="col-md-6">
                                <label for="nome">CPF do cliente:</label>
                                <b><h5 style="background-color:#ececec" ><?php echo $result['cpf'];?></b></h5>
                            </div>
                            <div class="col-md-6">
                                <label for="sobrenome">Profissional:</label>
                                <b><h5 style="background-color:#ececec" ><p><?php echo $result['funcionario']; echo ' '; echo $result['sobrenome_funcionario']?></p></b></h5>
                            </div>
                            <div class="col-md-6">
                                <label for ="celular">Contato do cliente:</label>
                                <b><h5 style="background-color:#ececec" ><?php echo $result['celular']?></b></h5>
                            </div>
                            <div class="col-md-6">
                                <label for ="hora_agendamento">Momento do agendamento:</label>
                                <b><h5 style="background-color:#ececec"><?php echo date('d/m/Y - H:i', strtotime($result['data_agendamento']));?></b></h5>
                            </div>
                            <div class="col-md-6">
                                <label for = "data_agendamento">Data do procedimento:</label>
                                <b><h5 style = "background-color:#b4fdf3" ><?php echo date('d/m/Y', strtotime($result['hora_inicio']));?></b></h5>
                            </div>
                            <div class="col-md-6">
                                <label for = "data_agendamento">Procedimento:</label>
                                <b><h5 style = "background-color:#b4fdf3"><?php echo $result['procedimento']?></b></h5>
                            </div>
                            <div class="col-md-6">
                                <label for = "data_agendamento">Tempo médio procedimento:</label>
                                <b><h5 style="background-color:#ececec"><?php echo date('H\hi', strtotime($result['tempo']))?></b></h5>
                            </div>
                            <div class="col-md-6">
                                <label for ="hora_inicio">Horário:</label>
                                <b><h5 style = "background-color:#b4fdf3"><?php echo date('H:i', strtotime($result['hora_inicio']))?></b></h5>
                            </div>
                            <div class="col-md-12">
                                <label for ="hora_inicio">Informações adicionais:</label>
                                <b><h5 style="background-color:#ececec"><?php echo $result['informacoes_adicionais']?></b></h5>
                            </div>
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
