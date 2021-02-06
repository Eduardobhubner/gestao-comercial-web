<?php

include_once("../conexao/conexao.php");

$idCliente = $_POST['idCliente'];
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
$enviarEmailCliente = 0; //não
$enviarSmsCliente = 0; //não

$result_str = "UPDATE cliente SET nomeCliente='$nomeCliente', emailCliente='$emailCliente',
cpfCliente='$cpfCliente', instagramCliente = '$instagramCliente' , celCliente = '$celCliente', 
cepCliente = '$cepCliente', estadoCliente = '$estadoCliente', cidCliente= '$cidCliente', endCliente = '$cidCliente',
endCliente = '$endCliente', sexoCliente = '$sexoCliente', nascCliente = '$nascCliente', 
enviarEmailCliente = '$enviarEmailCliente', enviarSmsCliente = '$enviarSmsCliente'  where idCliente ='$idCliente' ";

$resultado_cliente = mysqli_query($conn , $result_str);

if($resultado_cliente){
    echo '<div class="alert alert-warning" role="alert"><p><strong>Cliente</strong> alterado com sucesso!</p></div>';
}else{
    echo '<div class="alert alert-danger" role="alert"><p>Erro ao editar o <strong>Cliente</strong></p></div>';
}
?>
