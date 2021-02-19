<?php
include 'navbar.php';

    $sqlselect = "SELECT a.id,c.nome, f.funcionario,p.procedimento,a.data_agendada, a.hora_inicio, a.status 
    FROM agenda a
    
    INNER JOIN procedimento p ON a.id_procedimento = p.id
    INNER JOIN cliente c ON a.id_cliente = c.id
    INNER JOIN funcionario f ON a.id_funcionario = f.id

    WHERE a.id_cliente =".$_GET['id_historico_cliente']."";

    $selectcliente = $pdo->prepare($sqlselect);
    $selectcliente->execute();

    $retorno = $selectcliente->fetchAll(PDO::FETCH_ASSOC);


   

    $sqlpeganome="SELECT nome,sobrenome FROM cliente where id=".$_GET['id_historico_cliente']."";
    $sqlbuscanome= $pdo->prepare($sqlpeganome);
    $sqlbuscanome -> execute();

    $retornonome = $sqlbuscanome -> fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Jquery mascaras celular e telefone -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body id="page-top">

<!-- INICIO DA PAGINA -->

    <div class="container-fluid">

<!--TITULO NA PARTE PRINCIPAL-->

<h1 class="h3 mb-4 text-gray-800"><a href="JavaScript: window.history.back();"><i class="fas fa-chevron-left"></i></a> Histórico de procedimentos</h1>

        <div class="row">
            <div class="col-lg-12">

<!-- INICIO DIV HISTOTICO CLIENTE -->

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary"><?php echo $retornonome['nome'];echo ' ' ;echo $retornonome['sobrenome'];?></h4>
                    </div>
                    <div class="card-body">
                        
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Profissional</th>
                                <th>Procedimento</th>
                                <th>Data</th>
                                <th>Horário</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- BUSCA OS DADOS NO BANCO PARA LISTAR -->

                            <?php

                                foreach ($retorno as $historico) {
                                ?>
                                    <tr>
                                        <td><?php echo $historico['id']; ?></td>
                                        <td><?php echo $historico['funcionario']; ?></td>
                                        <td><?php echo $historico['procedimento']; ?></td>
                                        <td><?php echo date('d/m/Y',strtotime($historico['data_agendada'])); ?></td>
                                        <td><?php echo date('H:i',strtotime($historico['hora_inicio'])); ?></td>
                                        <td>
                                        <?php
                                        if($historico['status']=='realizado'){
                                            echo '
                                                 <button type="button" id_agendamento="'.$historico['id'].'" class="id_agendamento btn btn-success disabled">'.$historico['status'].'</button>
                                                 ';
                                        }elseif($historico['status']=='cancelado'){
                                            echo '
                                                 <button type="button" id_agendamento="'.$historico['id'].'" class="id_agendamento btn btn-danger disabled">'.$historico['status'].'</button>
                                                 ';
                                        
                                        }elseif($historico['status']=='reagendado'){
                                            echo '
                                                 <button type="button" id_agendamento="'.$historico['id'].'" class="id_agendamento btn btn-warning disabled">'.$historico['status'].'</button>
                                                 ';    
                                        }elseif($historico['status']=='agendado'){
                                            echo '
                                                 <button type="button" id_agendamento="'.$historico['id'].'" class="id_agendamento btn btn-info disabled">'.$historico['status'].'</button>
                                                 ';    
                                        }
                                        
                                        ?>
                                        
                                        </td>
                                    </tr>
                                <?php } ?>
                                
                                <!-- REDIRECIONAMENTO PARA PAGINA DO AGENDAMENTO -->

                                <script>
                                    $('button.id_agendamento').click(function agendamento() {
                                        var id_agendamento = $(this).attr('id_agendamento');
                                        window.location.href = "agendamento.php?id_agendamento="+id_agendamento;
                                    });
                                </script>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                        </tbody>
                    </table>
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

<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->