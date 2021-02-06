<?php

define('HOST', 'vhhookah.com.br');
define('DBNAME','vhhook31_tabacaria' );
define('USER', 'vhhook31_adm');
define('PASS', 'Adm@#$3457');

$conn = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.';',USER, PASS);

// strip_tags = remove qualquer tag de html 
// trim = remove espaço antes e depois da palavra
$nomeProd = strip_tags(trim($_POST['nomeProd']));
$codBarraProd = strip_tags(trim($_POST['codBarraProd']));
$codNumProd = strip_tags(trim($_POST['codNumProd']));
$descriProd = strip_tags(trim($_POST['descriProd']));
$estoqueProd = strip_tags(trim($_POST['estoqueProd']));
$valorCompraProd = strip_tags(trim($_POST['valorCompraProd']));
$imgProd = $_FILES['imgProd'];
$unidMedProd = strip_tags(trim($_POST['unidMedProd']));
$marcaProd = strip_tags(trim($_POST['marcaProd']));
$tipoCatProd = strip_tags(trim($_POST['tipoCatProd']));

// recuperar nome do arquivo 
$nome_img= $_FILES['imgProd']['name'];

$stmt = $conn->prepare('INSERT INTO produto(nomeProd, codBarraProd, codNumProd, descriProd, estoqueProd, valorCompraProd, imgProd, unidMedProd, marcaProd, idCat) 
VALUES(:nome, :codB, :codN, :descri, :estoq, :val, :img, :unid, :marc, :idCat)'); 

$stmt->bindParam(':nome', $nomeProd);
$stmt->bindParam(':codB', $codBarraProd);
$stmt->bindParam(':codN', $codNumProd);
$stmt->bindParam(':descri', $descriProd);
$stmt->bindParam(':estoq', $estoqueProd);
$stmt->bindParam(':val', $valorCompraProd);
$stmt->bindParam(':img', $nome_img);
$stmt->bindParam(':unid', $unidMedProd);
$stmt->bindParam(':marc', $marcaProd);
$stmt->bindParam(':idCat', $tipoCatProd);

if($stmt->execute()){

    if (!empty($_FILES['imgProd']))
    {
        $ultimo_id = $conn->lastInsertId();
        // diretório onde vai ser salvo
        $diretorio = 'img_prod/'.$ultimo_id.'/' ;
        // criar a pasta por id
        mkdir($diretorio, 0755);
        if(move_uploaded_file($_FILES['imgProd']['tmp_name'], $diretorio.$_FILES['imgProd']['name'])){
            // foto armazenada com sucesso
            echo '<div class="alert alert-success" role="alert"><p><strong>Foto do produto</strong> Inserido com sucesso!</p></div>';
        }else{
            // foot n foi armazenada
            echo '<div class="alert alert-danger" role="alert"><p>Foto do produto<strong> não foi inserido</strong></p></div>';
        }   
    }
    else
    {
        // dados do produto armazenados, porem sem foto anexada para armazenar
        echo '<div class="alert alert-warning" role="alert"><p>Não foi anexado uma foto do<strong>Produto</strong></p></div>';
    }


    echo '<div class="alert alert-success" role="alert"><p><strong>Produto</strong> Inserido com sucesso!</p></div>';
}else{
    echo '<div class="alert alert-danger" role="alert"><p>Erro ao inserir o <strong>Produto</strong></p></div>';
}

?>