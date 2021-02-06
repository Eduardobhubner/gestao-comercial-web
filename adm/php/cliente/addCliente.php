<?php

include_once("../conexao/conexao.php");

$nomeCliente = $_POST['nomeCliente'];
$emailCliente = $_POST[ 'emailCliente'];
$cpfCliente = $_POST[ 'cpfCliente'];
$instagramCliente = $_POST[ 'instagramCliente'];
$celCliente = $_POST[ 'celCliente'];
$cepCliente = $_POST[ 'cepCliente'];
$estadoCliente = $_POST[ 'estadoCliente'];
$cidCliente = $_POST[ 'cidCliente'];
$endCliente = $_POST[  'endCliente'];
$sexoCliente = $_POST[ 'sexoCliente'];
$nascCliente = $_POST[ 'nascCliente'];
$enviarEmailCliente = "não";
$enviarSmsCliente = "não";


$result_str = "INSERT INTO cliente( nomeCliente, emailCliente, cpfCliente, instagramCliente, celCliente, 
cepCliente, estadoCliente, cidCliente, endCliente, sexoCliente, nascCliente, enviarEmailCliente, enviarSmsCliente)
VALUES ('$nomeCliente','$emailCliente','$cpfCliente','$instagramCliente','$celCliente','$cepCliente','$estadoCliente',
'$cidCliente','$endCliente','$sexoCliente','$nascCliente','$enviarEmailCliente',
'$enviarSmsCliente')";
$resultado_cliente = mysqli_query($conn , $result_str);

if($resultado_cliente){
    echo '<div class="alert alert-success" role="alert"><p><strong>Cliente</strong> Inserida com sucesso!</p></div>';
}else{
    echo '<div class="alert alert-danger" role="alert"><p>Erro ao inserir o <strong>Cliente</strong></p></div>';
}
?>