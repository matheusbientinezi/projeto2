<?php
include 'navbar.php';
?>

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
        </div>

        <div class="row">

            <?php
            $selectfuncionarios = "SELECT id,funcionario, sobrenome_funcionario from funcionario";

            $funcionario = $pdo->prepare($selectfuncionarios);
            $funcionario->execute();
            $resultfuncionario = $funcionario->fetchAll(PDO::FETCH_ASSOC);
            $contador = count($resultfuncionario);
            ?>

            <?php for ($i = 0; $i <= $contador - 1; $i++) {

                $tempo = '2021-03-05 07:30:00';

            ?>
                <div class="col-md-4">
                    <div class="lista overflow-auto">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="10">

                                <thead>
                                    <tr>
                                        <th>Horário</th>
                                        <th>
                                        <?php 
                                        
                                        echo $resultfuncionario[$i]['funcionario'];
                                        echo ' ';
                                        echo $resultfuncionario[$i]['sobrenome_funcionario'];
                                        
                                        ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    for ($j = 0; $j < 30; $j++) {

                                        $select = "SELECT a.*,b.procedimento, c.nome, c.sobrenome, f.funcionario from agenda a
                                    Inner join procedimento b on a.id_procedimento = b.id
                                    inner join cliente c on a.id_cliente = c.id
                                    inner join funcionario f on f.id = a.id_funcionario
                                    where a.id_funcionario =" . $resultfuncionario[$i]['id'] . " and a.hora_inicio = '" . $tempo . "'";

                                        $selectagenda = $pdo->prepare($select);
                                        $selectagenda->execute();
                                        $result = $selectagenda->fetch(PDO::FETCH_ASSOC);
                                    ?>

                                        <tr>
                                            <td>
                                                <?php echo date('H:i', strtotime($tempo)); ?>
                                            </td>
                                            <td>
                                                <?php
                                                if (!isset($result['id'])) {
                                                    echo '<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal' . $j . $resultfuncionario[$i]['funcionario'] . '"><i class="fas fa-calendar-plus"></i></button>';
                                                } else {
                                                    echo $result['nome'];
                                                    echo ' ';
                                                    echo $result['sobrenome'];
                                                    echo '<br>';
                                                    echo $result['procedimento'];
                                                    echo $tempo;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal<?php echo $j . $resultfuncionario[$i]['funcionario'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Agemdamento</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-row">
                                                            <div class="col-md-12">
                                                                <span class="badge badge-primary">Profissional</span>
                                                                <h5><?php echo $resultfuncionario[$i]['funcionario'] ?></h5>
                                                            </div>
                                                            <div class="row" id="rowmodal">
                                                            <div class="col-md-6">
                                                                <span class="badge badge-primary">Dia</span>
                                                                <h5> <?php echo date('d/m/Y', strtotime($tempo)) ?></h5>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="badge badge-primary">Hora</span>
                                                                <h5><?php echo date('H:i', strtotime($tempo)) ?></h5>
                                                            </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <span class="badge badge-primary">Procedimento</span><br>
                                                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                                                <option selected>Open this select menu</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <span class="badge badge-primary">Cliente</span><br>
                                                                <?php 
                                                                    $selectcliente="SELECT id, nome, sobrenome FROM cliente";
                                                                    $cliente = $pdo -> prepare($selectcliente);
                                                                    $cliente->execute();
                                                                    $resultcliente = $cliente -> fetchAll(PDO::FETCH_ASSOC);
                                                                ?>
                                                                <select class="form-select" aria-label="Default select example">
                                                                <option selected>Selecione o cliente</option>
                                                                <?php
                                                                foreach($resultcliente as $dadoscliente){
                                                                    print_r($dadoscliente);
                                                                    echo '<option value="'.$dadoscliente['id'].'">'.$dadoscliente['nome'].' '.$dadoscliente['sobrenome'].'</option>';
                                                                
                                                                }?>
                                                                </select>
                                                            </div>
                                                        </form>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                            <button type="button" class="btn btn-primary">Agendar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
                                    <?php
                                        $tempo = date('Y-m-d H:i:s', strtotime('+30 minute', strtotime($tempo)));
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>

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
                <form class="form-row">
                    <div class="col-md-12">
                        <label for="sobrenome">Profissional:</label>
                        <h5 style="background-color:#ececec"><b><?php echo $resultfuncionario[$i]['funcionario'] ?></b></h5>
                    </div>
                    <div class="col-md-12">
                        <label for="sobrenome">Horario:</label>
                        <h5 style="background-color:#ececec"><b><?php echo $tempo ?></b></h5>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Agendar</button>
                </div>
            </div>
        </div>
    </div>
</div>

