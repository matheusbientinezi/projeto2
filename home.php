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
        <div class="row" id="row">
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
                        <?php
                            $dataatual = new DateTime();
                            $hora1 = '00:00:00';
                            $hora2='23:59:59';
                            $dataatual = $dataatual->format('Y-m-d');

                            $selectfuncionarios = "SELECT id,funcionario, sobrenome_funcionario from funcionario";
                
                            $funcionario = $pdo->prepare($selectfuncionarios);
                            $funcionario->execute();
                            $resultfuncionario = $funcionario->fetchAll(PDO::FETCH_ASSOC);
                            $contador = count($resultfuncionario);

                            $selectdia = "SELECT a.*,b.procedimento, c.nome, c.sobrenome, f.funcionario, f.sobrenome_funcionario from agenda a
                                            Inner join procedimento b on a.id_procedimento = b.id
                                            inner join cliente c on a.id_cliente = c.id
                                            inner join funcionario f on f.id = a.id_funcionario
                                            where a.hora_inicio between '".$dataatual." ".$hora1."' and '".$dataatual." ".$hora2."'";

                                        $selectagendadia = $pdo->prepare($selectdia);
                                        $selectagendadia->execute();
                                        $resultdia = $selectagendadia->fetchAll(PDO::FETCH_ASSOC);

                            
                            ?>
                            <thead>
                                <tr><h5  style="text-align: center;" ><b> Agenda do Dia</b></h5>
                                    <th>Horário</th>
                                    <th>Profissional</th>
                                    <th>Procedimento</th>
                                    <th>Cliente</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php foreach($resultdia as $agendadia){?>
                                <tr>
                                    <td>
                                        <?php echo date('H:i', strtotime($agendadia['hora_inicio'])) ;?>
                                    </td>
                                    <td>
                                        <?php echo $agendadia['funcionario']; echo ' '; echo $agendadia['sobrenome_funcionario'];?>
                                    </td>
                                    <td>
                                        <?php echo $agendadia['procedimento'] ;?>
                                    </td>
                                    <td>
                                        <?php echo $agendadia['nome']; echo ' '; echo $agendadia['sobrenome'];?>
                                    </td>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="row">

            <?php for ($i = 0; $i <= $contador - 1; $i++) {
            $hora = '07:30:00';
            $dia = '2021-03-05';
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

                                        $select = "SELECT a.*,b.procedimento, c.nome, c.sobrenome, f.funcionario,c.email,c.cpf,f.sobrenome_funcionario,c.celular from agenda a
                                                    Inner join procedimento b on a.id_procedimento = b.id
                                                    inner join cliente c on a.id_cliente = c.id
                                                    inner join funcionario f on f.id = a.id_funcionario
                                                    where a.id_funcionario =" . $resultfuncionario[$i]['id'] . " and a.hora_inicio = '" . $dia. " ".$hora."'";

                                        $selectagenda = $pdo->prepare($select);
                                        $selectagenda->execute();
                                        $result = $selectagenda->fetch(PDO::FETCH_ASSOC);
                                    ?>

                                        <tr>
                                            <td>
                                                <?php echo date('H:i', strtotime($hora)); ?>
                                            </td>
                                            <td>
                                            
                                                <?php
                                                
                                                if (!isset($result['id']) || $result['status']=='cancelado')  {  
                                                    echo '<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal' . $j . $resultfuncionario[$i]['funcionario'] . '"><i class="fas fa-calendar-plus"></i></button>';
                                                } else {
                                                    ?>
                                                    <div>
                                                        <button id="iconedetalhesagendamento" data-toggle="modal" data-target="#detalhesagendamento<?php echo $result['id']?>" type="button" class="btn btn-danger"><i class="fas fa-list-ul"></i></button>
                                                        <div class="dados">
                                                        <?php echo $result['nome']; ?>
                                                        <?php echo ' '; ?>
                                                        <?php echo $result['sobrenome']; ?>
                                                        <br>
                                                        <?php echo $result['procedimento']; ?>
                                                        </div>
                                                        <button id="iconeexcluiragendamento" type="button" id_agendamento="<?php echo $result['id'] ?> " class="id_agendamento btn btn-danger"><i class="fas fa-times"></i></button>
                                                    </div>                                             
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <script>
                                            $('button.id_agendamento').click(function excluirAgendamento() {
                                                var id_agendamento = $(this).attr('id_agendamento');
                                                var el = $(this).parent().parent();
                                                swal({
                                                        title: "Cancelar Agendamento ?",
                                                        text: "O agendamento será cancelado, mas os dados ainda estarão salvos.",
                                                        icon: "warning",
                                                        buttons: true,
                                                        dangerMode: true,
                                                    })
                                                    .then((willDelete) => {
                                                        if (willDelete) {
                                                            $.ajax({
                                                                method: 'post',
                                                                data: {
                                                                    id_agendamento
                                                                },
                                                                url: 'deletar.php'

                                                            }).done(function() {
                                                                el.fadeOut(function() {
                                                                    el.remove();

                                                                swal("Agendamento cancelado com sucesso!", {
                                                                icon: "success",
                                                                });
                                                                window.location.reload();
                                                                })
                                                            });
                                                        } else {
                                                            
                                                        }
                                                    });

                                            });
                                        </script>
                                        <!-- Modal 1 -->
                                        <div class="modal fade" id="exampleModal<?php echo $j . $resultfuncionario[$i]['funcionario'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Agendamento</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form id="form<?php echo $j . $resultfuncionario[$i]['funcionario'] ?>" name="formmmodal" method="post"  action="insertagendamento.php">
                                                            <div class="row" id="rowmodal">
                                                                <div class="col-md-12">
                                                                    <label for="funcionario">Profissional
                                                                    <h5><input id="funcionario<?php echo $j . $resultfuncionario[$i]['funcionario'] ?>" type="text" name="funcionario"  value = "<?php echo $resultfuncionario[$i]['funcionario'];echo ' '; echo $resultfuncionario[$i]['sobrenome_funcionario']; ?>" disabled></h5></input>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row" id="rowmodal">
                                                                <div class="col-md-12">
                                                                    <label for="data">Data
                                                                    <h5><input id="data<?php echo $j . $resultfuncionario[$i]['funcionario'] ?>" type="text" name="dia" value="<?php echo date('d/m/Y',strtotime($dia));echo ' '; echo date('H:i',strtotime($hora)); ?>" disabled></h5></input>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row" id="rowmodal">
                                                                <div class="col-md-12">
                                                                    <label for="procedimento">Procedimento
                                                                    <?php
                                                                    $listaprocedimento = "SELECT * FROM procedimento";
                                                                    $proced = $pdo->prepare($listaprocedimento);
                                                                    $proced->execute();
                                                                    $resultproced = $proced->fetchAll(PDO::FETCH_ASSOC);
                                                                    ?>
                                                                    <select id="procedimento<?php echo $j . $resultfuncionario[$i]['funcionario'] ?>" class="form-control form-control-sm" style="width:250px;">
                                                                        <option selected></option>
                                                                        <?php
                                                                        foreach ($resultproced as $dadosproced) {
                                                                            echo '<option name = "procedimento" value="' . $dadosproced['id'] . '">' . $dadosproced['procedimento'] . '</option>';
                                                                        } ?>
                                                                    </select>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row" id="rowmodal">
                                                                <div class="col-md-12">
                                                                    <label for="cliente">Selecione o Cliente
                                                                    <?php
                                                                    $selectcliente = "SELECT id, nome, sobrenome FROM cliente where status = 'A'";
                                                                    $cliente = $pdo->prepare($selectcliente);
                                                                    $cliente->execute();
                                                                    $resultcliente = $cliente->fetchAll(PDO::FETCH_ASSOC);
                                                                    ?>
                                                                    <select id = "cliente<?php echo $j . $resultfuncionario[$i]['funcionario'] ?>" class="form-control form-control-sm"  style="width:250px;">
                                                                        <option selected></option>
                                                                        <?php
                                                                        foreach ($resultcliente as $dadoscliente) {
                                                                            print_r($dadoscliente);
                                                                            echo '<option name="cliente" value="' . $dadoscliente['id'] . '">' . $dadoscliente['nome'] . ' ' . $dadoscliente['sobrenome'] . '</option>';
                                                                        } ?>
                                                                    </select>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="rowmodal">
                                                                <div class="col-md-12">
                                                                    <label for="informacoesadicionais<?php echo $j . $resultfuncionario[$i]['funcionario'] ?>">Informações Adicionais
                                                                        <textarea id="informacoesadicionais"  name="iformacoesadicionais" style="width:250px;">
                                                                        </textarea>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                                <button type="button" id="agendar<?php echo $j . $resultfuncionario[$i]['funcionario'] ?>" class="agendar btn btn-primary">Agendar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--MODAL 2-->
                                        <div class="modal fade bd-example-modal-lg" id="detalhesagendamento<?php echo $result['id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="row">
                                                        <div class="col-lg-12">
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
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <script>
                                            $("#agendar<?php echo $j . $resultfuncionario[$i]['funcionario'] ?>").on("click", function (e) {
                                                e.preventDefault();
                                                var id = "exampleModal<?php echo $j . $resultfuncionario[$i]['funcionario'] ?>"
                                                console.log('ID: ' + id);
                                                
                                                $.ajax({
                                                type: "POST",
                                                url: "insertagendamento.php",
                                                data:{
                                                    funcionario:    $('#funcionario'+id).val(),
                                                    data:   $('#data'+id).val() ,
                                                    procedimento:$('#procedimento'+id).val() ,
                                                    cliente: $('#cliente'+id).val(),
                                                    informacoesadicionais:$('#informacoesadicionais'+id).val() 
                                                },
                                                dataType: "json",
                                                processData: false,
                                                contentType: false,
                                                success: function (response) {
                                                     alert("agendamento realizado");
                                                },
                                                });
                                                // window.location.href="insertagendamento.php";
                                                });
                                        </script>
                                    <?php
                                        $hora = date('H:i:s', strtotime('+30 minute', strtotime($hora)));
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
