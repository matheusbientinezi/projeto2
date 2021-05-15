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
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- INCLUE NAVBAR COM SESSAO -->

    <?php
    include 'navbar.php';
    ?>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!--INICIO DA PAGINA DE CADASTRO DE PROCEDIMENTO-->

    <div class="container-fluid">
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!--TITULO DA PAGINA DE CADASTRO DE PROCEDIMENTO-->

        <h1 class="h3 mb-4 text-gray-800">Procedimento</h1>

        <div class="row">
            <div class="col-lg-12">
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- INICIO DO FORMULARIO DE CADASTRO -->

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Insira os dados do procedimento</h6>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="procedimento">Procedimento</label>
                                    <input type="text" name="procedimento" class="form-control" id="procedimento" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Tempo</label>
                                    <input type="time" name="tempo" class="form-control" id="tempo" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Informações Adicionais</label>
                                    <input type="text" name="informacoesadicionais" class="form-control" id="informacoesadicionais">
                                </div>
                            </div>
                            <button type="submit" name="cadastrarprocedimento" id="cadastrarprocedimento" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>

<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Lista de Procedimentos</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Procedimento</th>
                                                <th>Tempo</th>
                                                <th>Informações</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            include 'connect.php';

                                            $sqlselect = "SELECT id,procedimento,tempo,informacoesadicionais FROM procedimento WHERE status = 'A'";

                                            $selectprocedimento = $pdo->prepare($sqlselect);
                                            $selectprocedimento->execute();

                                            $result = $selectprocedimento->fetchAll(PDO::FETCH_ASSOC);
                                            $i = 0;
                                            foreach ($result as $procedimento) {
                                            ?>

                                                <tr>
                                                <td> <?php echo $procedimento['id'];?></td>
                                                <td> <?php echo $procedimento['procedimento'];?></td>
                                                <td> <?php echo date('H:i', strtotime($procedimento['tempo']));?></td>
                                                <td> <?php echo $procedimento['informacoesadicionais'];?></td>
                                                <td>
                                                <button type="button" id = "atualizarprocedimento" data-toggle="modal" data-target="#modal<?php echo $procedimento['id'];?>" class="perfil_procedimento btn btn-info"><i class="fas fa-edit"></i></button>
                                                <button type="button" id_excluir_procedimento = "<?php echo $procedimento['id'];?>" class="id_excluir_procedimento btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                </td>
                                                </tr>

                                            <!-- Modal -->
                                            <div class="modal fade bd-exemple-modal-sm" id="modal<?php echo $procedimento['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Atualizar Procedimento</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <form method="post">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                        <input type="hidden" id="id_procedimento<?php echo $result[$i]['id']?>" value = "<?php echo $result[$i]['id']?>"></input>
                                                            <label for="procedimento">Procedimento</label>
                                                            <input type="text"  value="<?php echo $result[$i]['procedimento']?>" name="procedimento" class="form-control" id="procedimento<?php echo $procedimento['id'];?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputEmail4">Tempo</label>
                                                            <input type="time" value ="<?php echo $result[$i]['tempo'] ?>" name="tempo" class="form-control" id="tempo<?php echo $procedimento['id'];?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputEmail4">Informações Adicionais</label>
                                                            <input type="text" value = "<?php echo $result[$i]['informacoesadicionais'] ?>" name="informacoesadicionais" class="form-control" id="informacoesadicionais<?php echo $procedimento['id'];?>">
                                                        </div>
                                                    </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                    <button type="button" id = "salvarprocedimento<?php echo $result[$i]['id']?>" class="btn btn-primary">Salvar</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            
                                            <script>
                                            $("button#salvarprocedimento<?php echo $result[$i]['id']?>").click(function atualizaCadastroprocedimento() {

                                            var id = $('#id_procedimento<?php echo $result[$i]['id']?>').val();
                                            console.log(id);
                                            var procedimento = $('#procedimento<?php echo $result[$i]['id'];?>').val();
                                            var tempo = $('#tempo<?php echo $result[$i]['id'];?>').val();
                                            var informacoesadicionais  = $('#informacoesadicionais<?php echo $result[$i]['id'];?>').val();

                                            $.ajax({
                                            method: 'post',
                                                data:{
                                                    id,
                                                    procedimento,
                                                    tempo,
                                                    informacoesadicionais

                                                },
                                            url: 'update.php'

                                                }).done(function (){
                                                swal({title: "Procedimento atualizado com sucesso!", 
                                                    icon: "success"})
                                                    .then(function(){ 
                                                    location.reload();
                                                }
                                                );  
                                                });
                                            });
                                            </script>
                                            <?php
                                        $i++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        

                        <!-- FUNÇÃO DELETE DO SWEET ALERT -->
                        <script>

                        $('button.id_excluir_procedimento').click(function excluir(){
                            var id_excluir_procedimento = $(this).attr('id_excluir_procedimento');
                            var el = $(this).parent().parent();
                            swal({
                                title: "Tem certeza ?",
                                text: "Todos os dados relacionados ao procedimento serão excluidos",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                                })
                                .then((willDelete) => {
                                if (willDelete) {
                                    $.ajax({
                                        method:'post',
                                        data:{'id_excluir_procedimento':id_excluir_procedimento},
                                        url:'deletar.php'

                                    }).done(function(){
                                        el.fadeOut(function(){
                                            el.remove();
                                        })
                                    });
                                    swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                    
                                    });
                                } else {
                                    swal("Your imaginary file is safe!");
                                }
                                });

                            });

                        </script>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
             <!-- FECHA DIVS ANTERIORES -->
            </div>
        </div>
    </div>   <!-- End of Main Content -->
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
<!-- BOTAO QUE VAI PARA O TOPO DA PAGINA -->

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
<!-- CADASTRA PROCEDIMENTO -->

<?php

include 'connect.php';

if (isset($_POST['cadastrarprocedimento'])) {
    $procedimento = $_POST['procedimento'];
    $tempo = $_POST['tempo'];
    $informacoesadicionais = $_POST['informacoesadicionais'];
    $status = 'A';



    //$sqlinsertcliente="INSERT INTO cliente VALUES(null,'$nome','$sobrenome','$email','$cpf','$celular','$telefone',$datanascimento,'$endereco','$numero','$cidade','$uf','$cep','$informacoesadicionais',current_timestamp())";
    $sqlinsertprocedimento = "INSERT INTO procedimento VALUES(null,?,?,?,?,?)";

    $sqlinsert = $pdo->prepare($sqlinsertprocedimento);
    $sqlinsert->execute(array($procedimento, $tempo, $informacoesadicionais,'A','sem cor'));
 
    
    //$sqlinsert->execute();

    if ($sqlinsert) {

        echo '<script type="text/javascript">
        swal("", "Procedimento cadastrado com sucesso!", "success");
        </script>';
    } else {
        echo '<script type="text/javascript">
        swal("", "Erro ao cadastrar Procedimento!", "error");
        </script>';
    }
}
?>
