<?php

include_once("../conexao/conexao.php");

$idFornEditar = $_POST['idFornEditar'];
$razaoSocialFornEditar = $_POST['razaoSocialFornEditar'];
$nomeFornEditar = $_POST['nomeFornEditar'];
$cnpjFornEditar = $_POST['cnpjFornEditar'];
$telFornEditar = $_POST['telFornEditar'];
$celFornEditar = $_POST['celFornEditar'];
$endFornEditar = $_POST['endFornEditar'];
$cidFornEditar = $_POST['cidFornEditarv'];
$estadoFornEditar = $_POST['estadoFornEditar'];
$cepFornEditar = $_POST['cepFornEditar'];
$emailFornEditar = $_POST['emailFornEditar'];


$result_str = "UPDATE fornecedor SET razaoSocialForn='$razaoSocialFornEditar', nomeForn='$nomeFornEditar',
cnpjForn='$cnpjFornEditar', telForn='$telFornEditar', celForn = '$celFornEditar', endForn='$endFornEditar',
cidForn='$cidFornEditar', estadoForn='$estadoFornEditar', cepForn='$celFornEditar', emailForn='$emailFornEditar'
where idForn ='$idFornEditar' ";

$resultado_forn = mysqli_query($conn , $result_str);

if($resultado_forn){
    echo '<div class="alert alert-warning" role="alert"><p><strong>Fornecedor</strong> alterado com sucesso!</p></div>';
}else{
    echo '<div class="alert alert-danger" role="alert"><p>Erro ao editar o <strong>fornecedor</strong></p></div>';
}

?>
