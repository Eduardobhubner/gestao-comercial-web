<?php

include_once("../conexao/conexao.php");

$idCat = $_POST['idCat'];
$nomeCat = $_POST['nomeCat'];
$obsCat = $_POST[ 'obsCat'];

$result_str = "UPDATE categoria SET nomeCat='$nomeCat', obsCat='$obsCat' where idCat ='$idCat' ";
$resultado_categoria = mysqli_query($conn , $result_str);

if($resultado_categoria){
    echo '<div class="alert alert-warning" role="alert"><p><strong>Categoria</strong> alterado com sucesso!</p></div>';
}else{
    echo '<div class="alert alert-danger" role="alert"><p>Erro ao editar a <strong>categoria</strong></p></div>';
}
?>
