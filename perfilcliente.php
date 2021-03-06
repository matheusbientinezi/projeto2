<?php
include 'navbar.php';

    /** VALIDA SE TEM UPDATE E FAZ O UPDATE*/
    if(isset($_GET['id_editar_cliente'])){
        $id = $_GET['id_editar_cliente'];
        $sql = $pdo->prepare("SELECT * FROM cliente WHERE id =?");
        $sql->execute(array($_GET['id_editar_cliente']));
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        
        }

?>
<!DOCTYPE html>
<html>

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
    <!-- INICIO DA PAGINA -->
    <div class="container-fluid">
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <!--TITULO NA PARTE PRINCIPAL-->
        <h1 class="h3 mb-4 text-gray-800"><a href="JavaScript: window.history.back();"><i class="fas fa-chevron-left"></i></a> Atualizar cadastro</h1>

        <div class="row">
            <div class="col-lg-12">

<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                <!-- INICIO DIV DE CADASTRO DE CLIENTE -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Insira os Dados do cliente</h6>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <input type="hidden" id="id" value=<?php echo $id;?>></input>
                                    <label for="inputEmail4">Nome</label>
                                    <input type="text" value="<?php echo $result['nome'];?>" name="nome" class="form-control" id="nome" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Sobrenome</label>
                                    <input type="text" value="<?php echo $result['sobrenome'];?>" name="sobrenome" class="form-control" id="sobrenome" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" value="<?php echo $result['email'];?>" name="email" class="form-control" id="email" placeholder="exemplo@gmail.com">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cpf">CPF</label>
                                    <input type="text" value="<?php echo $result['cpf'];?>" name="cpf" class="form-control" id="cpf" placeholder="">
                                    <script>
                                        $('#cpf').mask('000.000.000-00', {
                                            reverse: true
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="txttelefone">Celular</label>
                                    <input type="text" value="<?php echo $result['celular'];?>" name="celular" placeholder="(00) 00000-0000" class="form-control" id="celular" pattern="\([0-9]{2}\)[\s][0-9]{1}[\s][0-9]{4}-[0-9]{4}" />
                                    <script type="text/javascript">
                                        $("#celular").mask("(00) 0 0000-0000");
                                    </script>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txttelefone">Telefone</label>
                                    <input type="text" value="<?php echo $result['telefone'];?>" name="telefone" placeholder="(00) 00000-0000" class="form-control" id="telefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4}" />
                                    <script type="text/javascript">
                                        $("#telefone").mask("(00) 0000-0000");
                                    </script>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Data de Nascimento</label>
                                    <input type="date" value="<?php echo $result['datanascimento'];?>" name="datanascimento" class="form-control" id="datanascimento">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <label for="txttelefone">Endereço</label>
                                    <input type="text" value="<?php echo $result['endereco'];?>" name="endereco" placeholder="Av/Rua nome da rua" class="form-control" id="endereco" />
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="txttelefone">Número</label>
                                    <input type="text" value="<?php echo $result['numero'];?>" name="numero" class="form-control" id="numero" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Cidade</label>
                                    <input type="text" value="<?php echo $result['cidade'];?>" name="cidade" class="form-control" id="cidade">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState" name="uf">UF</label>
                                    <select type="text" id="uf" name="uf" class="form-control">
                                        <option selected><?php echo $result['uf'];?></option>
                                        <option>PR</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputZip">CEP</label>
                                    <input type="text" value="<?php echo $result['cep'];?>" name="cep" class="form-control" id="cep" pattern="\[0-8]{5}-[0-8]{3}>">
                                    <script type="text/javascript">
                                        $("#cep").mask("00000-000");
                                    </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="informacoesadicionais">Informacões Adicionais</label>
                                <input type="text" value="<?php echo $result['informacoesadicionais'];?>" name="informacoesadicionais" class="form-control" id="informacoesadicionais" placeholder="Ex: Doenças, uso de medicamentos, alergias , etc.">
                            </div>
                            <button type="button" name="salvardadoscliente" id="salvardadoscliente" class="btn btn-primary">Salvar Dados</button>
                        </form>
                    </div>
                </div>
                
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <script>
        $("button#salvardadoscliente").click(function atualizaCadastro() {

        var id_cliente = $('#id').val();
        var nome = $('#nome').val();
        var sobrenome = $('#sobrenome').val();
        var email = $('#email').val();
        var cpf = $('#cpf').val();
        var celular = $('#celular').val();
        var telefone = $('#telefone').val();
        var datanascimento = $('#datanascimento').val();
        var endereco = $('#endereco').val();
        var numero = $('#numero').val();
        var cidade = $('#cidade').val();
        var uf = $('#uf').val();
        var cep = $('#cep').val();
        var informacoesadicionais = $('#informacoesadicionais').val();



        $.ajax({
        method: 'post',
            data:{
                id_cliente,
                nome,
                sobrenome,
                email,
                cpf,
                celular,
                telefone,
                datanascimento,
                endereco,
                numero,
                cidade,
                uf,
                cep,
                informacoesadicionais

            },
        url: 'update.php'

            }).done(function (){
            swal({title: "Cadastro atualizado com sucesso!", 
                icon: "success"})
                .then(function(){ 
                location.reload();
            }
            );  
            });
        });
        </script>
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
