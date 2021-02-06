<?php

include_once("../conexao/conexao.php");

$razaoSocialFornAdd = $_POST['razaoSocialFornAdd'];
$nomeFornAdd = $_POST['nomeFornAdd'];
$cnpjFornAdd = $_POST['cnpjFornAdd'];
$telFornAdd = $_POST['telFornAdd'];
$celFornAdd = $_POST['celFornAdd'];
$endFornAdd = $_POST['endFornAdd'];
$cidFornAdd = $_POST['cidFornAddv'];
$estadoFornAdd = $_POST['estadoFornAdd'];
$cepFornAdd = $_POST['cepFornAdd'];
$emailFornAdd = $_POST['emailFornAdd'];

$result_str = "INSERT INTO fornecedor( razaoSocialForn, nomeForn, cnpjForn, telForn, celForn, endForn, 
cidForn, estadoForn, cepForn, emailForn )
VALUES ('$razaoSocialFornAdd','$nomeFornAdd','$cnpjFornAdd','$telFornAdd','$celFornAdd','$endFornAdd','$cidFornAdd',
'$estadoFornAdd','$cepFornAdd','$emailFornAdd')";
$resultado_forn = mysqli_query($conn , $result_str);

if($resultado_forn){
    echo '<div class="alert alert-success" role="alert"><p><strong>Fornecedor</strong> Inserido com sucesso!</p></div>';
}else{
    echo '<div class="alert alert-danger" role="alert"><p>Erro ao inserir o <strong>fornecedor</strong></p></div>';
}
?>