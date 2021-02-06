<?php

define('HOST', 'vhhookah.com.br');
define('DBNAME','vhhook31_tabacaria' );
define('USER', 'vhhook31_adm');
define('PASS', 'Adm@#$3457');

$conn = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.';',USER, PASS);

// strip_tags = remove qualquer tag de html 
// trim = remove espaço antes e depois da palavra
$idProd = strip_tags(trim($_POST['idProd']));
$nomeProd = strip_tags(trim($_POST['nomeProd']));
$codBarraProd = strip_tags(trim($_POST['codBarraProd']));
$codNumProd = strip_tags(trim($_POST['codNumProd']));
$descriProd = strip_tags(trim($_POST['descriProd']));
$estoqueProd = strip_tags(trim($_POST['estoqueProd']));
$valorCompraProd = strip_tags(trim($_POST['valorCompraProd']));
// $imgProd = $_FILES['imgProd'];
$unidMedProd = strip_tags(trim($_POST['unidMedProd']));
$marcaProd = strip_tags(trim($_POST['marcaProd']));
$tipoCatProd = strip_tags(trim($_POST['tipoCatProd']));

// recuperar nome do arquivo 
// $nome_img= $_FILES['imgProd']['name'];

$stmt = $conn->prepare('UPDATE produto SET nomeProd = :nome, codBarraProd = :codB, codNumProd = :codN, descriProd = :descri, estoqueProd = :estoq,
valorCompraProd = :val, unidMedProd= :unid, marcaProd = :marc, idCat = :idCat WHERE idProd = :idProd'); 

$stmt->bindParam(':idProd', $idProd);
$stmt->bindParam(':nome', $nomeProd);
$stmt->bindParam(':codB', $codBarraProd);
$stmt->bindParam(':codN', $codNumProd);
$stmt->bindParam(':descri', $descriProd);
$stmt->bindParam(':estoq', $estoqueProd);
$stmt->bindParam(':val', $valorCompraProd);
// $stmt->bindParam(':img', $nome_img);
$stmt->bindParam(':unid', $unidMedProd);
$stmt->bindParam(':marc', $marcaProd);
$stmt->bindParam(':idCat', $tipoCatProd);

if($stmt->execute()){
    echo '<div class="alert alert-warning" role="alert"><p><strong>Produto</strong> editado com sucesso!</p></div>';
}else{
    echo '<div class="alert alert-danger" role="alert"><p>Erro ao editar o <strong>Produto</strong></p></div>';
}


?>
