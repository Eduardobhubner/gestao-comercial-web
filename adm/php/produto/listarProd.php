<?php

// conexao com o bd
include_once("../conexao/conexao.php");

error_reporting(0);
ini_set("display_errors",0);

$palavra = $_POST['palavra'];
$chaveSelect = $_POST['chaveSelect'];

if($palavra != ""){

//consultar apenas os prods desejados no banco de dados
$result_prod = "SELECT * FROM produto WHERE $chaveSelect LIKE '%$palavra%' ORDER BY nomeProd ASC ";
$resultado_prod = mysqli_query($conn, $result_prod);

}else{

//consultar todos os prods no banco de dados
$result_prod = "SELECT * FROM produto ORDER BY idProd DESC";
$resultado_prod = mysqli_query($conn, $result_prod);
}

//Verificar se encontrou resultado na tabela "usuarios"
if (($resultado_prod) and ($resultado_prod->num_rows != 0)) {
?>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Id_prod</th>
            <th>Nome</th>
            <th>Código de identificação</th>
            <th>Estoque</th>
            <th>Valor de compra</th>
            <th>Marca</th>
            <th>ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
      while ($row_prod = mysqli_fetch_assoc($resultado_prod)) {
      ?>
        <tr>
            <th><?php echo $row_prod['idProd']; ?></th>
            <td><?php echo $row_prod['nomeProd']; ?></td>
            <td><?php echo $row_prod['codNumProd']; ?></td>
            <td><?php echo $row_prod['estoqueProd']; ?></td>
            <td><?php echo $row_prod['valorCompraProd']; ?></td>
            <td><?php echo $row_prod['marcaProd']; ?></td>
            <td>
                <!-- btn Visualizar -->
                <button type="button" class="btn btn-xs btn-primary " data-toggle="modal"
                    data-target="#modalVisualizarProd<?php echo $row_prod['idProd']; ?>"><i
                        class="fas fa-eye"></i></button>

                <!-- btn Editar -->
                <button type="button" class="btn btn-xs btn-warning text-white" data-toggle="modal"
                    data-target="#modalEditarProd"
                    data-whateveridprodeditar="<?php echo $row_prod['idProd']; ?>"
                    data-whatevernomeprodeditar="<?php echo $row_prod['nomeProd']; ?>"
                    data-whatevercodbarraprodeditar="<?php echo $row_prod['codBarraProd']; ?>"
                    data-whatevercodnumprodeditar="<?php echo $row_prod['codNumProd']; ?>"
                    data-whateverdescriprodeditar="<?php echo $row_prod['descriProd']; ?>"
                    data-whateverestoqueprodeditar="<?php echo $row_prod['estoqueProd']; ?>"
                    data-whatevervalorcompraprodeditar="<?php echo $row_prod['valorCompraProd']; ?>"
                    data-whatevereimgprodeditar="<?php echo $row_prod['imgProd']; ?>"
                    data-whateverunidmedprodeditar="<?php echo $row_prod['unidMedProd']; ?>"
                    data-whatevermarcaprodeditar="<?php echo $row_prod['marcaProd']; ?>"
                    data-whateveridcatprodeditar="<?php echo $row_prod['idCat']; ?>">
                    <i class="far fa-edit"></i></button>

                <!-- btn Excluir -->
                <!-- <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalExcluirProd" data-whateveridProdExcluir="<?php echo $row_prod['idProd']; ?>" data-whatevernomeProdExcluir="<?php echo $row_prod['nomeProd']; ?>"><i class="fas fa-trash-alt"></i></button> -->
            </td>
        </tr>

        <!-- Modal Vizualizar -->
        <div class="modal fade" id="modalVisualizarProd<?php echo $row_prod['idProd']; ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Nome:
                            <?php echo $row_prod['nomeProd']; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- código -->
                        <p><b>Código</b> do produto:</p>
                        <p><?php echo $row_prod['idProd']; ?></p>
                        <hr>
                        <!-- nome -->
                        <p><b>Nome</b> do produto:</p>
                        <p><?php echo $row_prod['nomeProd']; ?></p>
                        <hr>
                        <!-- código de barra -->
                        <p><b>Código de barra</b> do produto:</p>
                        <p><?php echo $row_prod['codBarraProd']; ?></p>
                        <hr>
                        <!-- codNumProd -->
                        <p><b>Código numérico</b> do produto:</p>
                        <p><?php echo $row_prod['codNumProd']; ?></p>
                        <hr>
                        <!-- descrição -->
                        <p><b>Descrição</b> do produto:</p>
                        <p><?php echo $row_prod['descriProd']; ?></p>
                        <hr>
                        <!-- estoque -->
                        <p><b>Estoque</b> do produto:</p>
                        <p><?php echo $row_prod['estoqueProd']; ?></p>
                        <hr>
                        <!-- Valor de compra -->
                        <p><b>Valor de compra</b> do produto:</p>
                        <p><?php echo $row_prod['valorCompraProd']; ?></p>
                        <hr>
                        <!-- Imagem -->
                        <p><b>Imagem</b> do produto:</p>
                        <figure>
                            <img
                                class="img-fluid" src="./php/produto/img_prod/<?php echo $row_prod['idProd'].'/'.$row_prod['imgProd']; ?>" alt="Não possui imagem ou teve erro em sua procura">
                        </figure>
                        <hr>
                        <!-- unidade de medida -->
                        <p><b>Unidade de medida</b> do produto:</p>
                        <p><?php echo $row_prod['unidMedProd']; ?></p>
                        <hr>
                        <!-- Marca -->
                        <p><b>Marca</b> do produto:</p>
                        <p><?php echo $row_prod['marcaProd']; ?></p>
                        <hr>
                        <!-- categoria -->
                        <p><b>Categoria</b> do produto:</p>
                        <p><?php echo $row_prod['idCat']; ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--fim do modal visualizar -->
        <?php
      } ?>
    </tbody>
</table>
<?php
} else {
  echo "<div class='alert alert-danger' role='alert'>Nenhum Produto foi encontrado :(</div>";
}
?>