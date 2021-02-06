<?php

    //Alteramos o cabeçalho para não gerar cache do resultado
    header('Cache-Control: no-cache, must-revalidate'); 
    //Alteramos o cabeçalho para que o retorno seja do tipo JSON
    header('Content-Type: application/json; charset=utf-8');

    include_once("../conexao/conexao.php");

    $valorSelectVenda = $_POST['valorSelectVenda'];

    // echo  "console -> recebi o valor" .$valorSelectVenda;

    $sql = "SELECT * FROM produto WHERE idProd = $valorSelectVenda";

    $result_sql = mysqli_query($conn, $sql);

        $row_result = mysqli_fetch_assoc($result_sql);

        $arr_result =array(
            // 'idProd' => $row_result['idProd'],
            'nomeProd' => $row_result['nomeProd'],
            'valorCompraProd' => $row_result['valorCompraProd'],
            'unidMedProd' => $row_result['unidMedProd'],
            'estoqueProd' => $row_result['estoqueProd'],
            
        );

        echo json_encode($arr_result);
   
?>