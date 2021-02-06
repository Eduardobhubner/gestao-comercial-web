<?php

include_once("../conexao/conexao.php");

$nomeCat = $_POST['nomeCat'];
$obsCat = $_POST[ 'obsCat'];

$result_str = "INSERT INTO categoria( nomeCat, obsCat) VALUES ('$nomeCat','$obsCat')";
$resultado_cat = mysqli_query($conn , $result_str);

if($resultado_cat){
    echo '<div class="alert alert-success" role="alert"><p><strong>Categoria</strong> Inserida com sucesso!</p></div>';
}else{
    echo '<div class="alert alert-danger" role="alert"><p>Erro ao inserir a <strong>categoria</strong></p></div>';
}
?>