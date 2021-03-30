<?php 


// echo '<pre>';
// print_r($_REQUEST);
// die;

if(isset($_POST['funcionarioexampleModal1Thais'])){

$informacoesadicionais = $_POST['informacoesadicionaisfuncionarioexampleModal1Thais'];
$cliente = $_POST['clientefuncionario1Thais'];
$funcionario = $_POST['funcionariofuncionarioexampleModal1Thais'];
$data = $_POST['datafuncionarioexampleModal1Thais'];
$procedimento = $_POST['procedimentofuncionarioexampleModal1Thais'];

echo 'teste';

}else{
    echo $_POST['funcionario'];
    echo '<br>';
    echo 'deu ruim';
}


?>