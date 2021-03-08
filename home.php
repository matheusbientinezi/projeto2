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
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="10">
                                <thead>
                                    <tr>
                                    <th>Horário</th>
                                    <?php

                                    $selectfuncionarios= "SELECT id,funcionario, sobrenome_funcionario from funcionario";
                                    $funcionario = $pdo ->prepare($selectfuncionarios);
                                    $funcionario -> execute();
                                    $resultfuncionario = $funcionario -> fetchAll(PDO::FETCH_ASSOC);
                                    $contador= count($resultfuncionario);

                                    for($i=0;$i<=$contador-1; $i++ ){
                                    ?>

                                    <th><?php 
                                        $iniciais = substr($resultfuncionario[$i]['sobrenome_funcionario'],0,1);
                                        echo $resultfuncionario[$i]['funcionario'];
                                        echo ' ';
                                        echo $iniciais;
                                        echo '.';
                                        ?></th>

                                    <?php
                                    }
                                    ?>
                                    </tr>
                                </thead>
                            <tbody>
                            <?php 
                                $dia = '';
                                $tempo = '2021-03-05 07:30:00';
                                for($j=0;$j<34;$j++){ ?>
                                    <tr>
                                    <td><?php echo date('H:i',strtotime($tempo));?></td>
                                    
                                    <?php 
                                    for($k=1;$k<=$contador; $k++ ){
                                    ?>
                                    <td>
                                        <?php
                                            $select = "SELECT a.*,b.procedimento, c.nome, c.sobrenome, f.funcionario from agenda a
                                                        Inner join procedimento b on a.id_procedimento = b.id
                                                        inner join cliente c on a.id_cliente = c.id
                                                        inner join funcionario f on f.id = a.id_funcionario
                                                        where a.id_funcionario =".$k." and a.hora_inicio = '".$tempo."'";

                                            $selectagenda = $pdo -> prepare($select);
                                            $selectagenda ->execute();
                                            $result = $selectagenda ->fetch(PDO::FETCH_ASSOC);
                                            if(isset($result['id_procedimento'])){

                                            
                                            echo $result['procedimento'];
                                            echo '<br>';
                                            echo $result['nome'];
                                            echo ' ';
                                            echo $result['sobrenome'];

                                            // while($result['hora_final']<$tempo){

                                            //     echo $result['procedimento'];
                                            //     echo '<br>';
                                            //     echo $result['nome'];
                                            //     echo ' ';
                                            //     echo $result['sobrenome'];
                                            //     echo '<br>';
                                            //     echo $i;
                                            //      }

                                            
                                             }else{
                                                echo '<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus">'.$k.'</i></button>';
                                            }
                                        ?>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Agemdamento</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-md-12">
                                                <form>
                                                    <label for="nome">Cliente:</label>
                                                    <h5 style="background-color:#ececec"><b><?php echo $result['nome']; echo ' '; echo $result['sobrenome'];?></b></h5>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="sobrenome">Funcionario:</label>
                                                    <h5 style="background-color:#ececec" ><b>Matheus</b></h5>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="sobrenome">Email:</label>
                                                    <h5 style="background-color:#ececec" ><b>Matheus</b></h5>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="nome">CPF do cliente:</label>
                                                    <b><h5 style="background-color:#ececec" >Teste</b></h5>
                                                </div>
                                                </form>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                <button type="button" class="btn btn-primary">Agendar</button>
                                        </div>
                                        </div>
                                    </td>
                                    <?php }?>
                                    <tr>
                                        
                                   <?php 
                                   $tempo = date('Y-m-d H:i:s',strtotime('+30 minute',strtotime($tempo)));
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