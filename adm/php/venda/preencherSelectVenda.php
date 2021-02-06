<?php

    //Alteramos o cabeçalho para não gerar cache do resultado
    header('Cache-Control: no-cache, must-revalidate'); 
    // Alteramos o cabeçalho para que o retorno seja do tipo JSON
    header('Content-Type: application/json; charset=utf-8');

    include_once("../conexao/conexao.php");

    $sql = "SELECT * FROM produto ORDER BY nomeProd ASC";
    $result_selectProd = mysqli_query($conn, $sql);

    $row_Prod = mysqli_fetch_all($result_selectProd);
    
    echo json_encode($row_Prod);
?>