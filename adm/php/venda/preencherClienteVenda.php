<?php

    //Alteramos o cabeçalho para não gerar cache do resultado
    header('Cache-Control: no-cache, must-revalidate'); 
    // Alteramos o cabeçalho para que o retorno seja do tipo JSON
    header('Content-Type: application/json; charset=utf-8');

    include_once("../conexao/conexao.php");

    $sql = "SELECT * FROM cliente ORDER BY nomeCliente ASC";
    $result_selectCliente = mysqli_query($conn, $sql);

    $row_cliente = mysqli_fetch_all($result_selectCliente);
    
    echo json_encode($row_cliente);
?>