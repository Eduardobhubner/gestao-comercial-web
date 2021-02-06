<?php

// conexao com o bd
include_once("../conexao/conexao.php");

error_reporting(0);
ini_set("display_errors",0);

$palavra = $_POST['palavra'];
$chaveSelect = $_POST['chaveSelect'];

if($palavra != ""){

//consultar apenas os clientes desejados no banco de dados
$result_cat = "SELECT * FROM categoria WHERE $chaveSelect LIKE '%$palavra%' ORDER BY nomeCat ASC ";
$resultado_cat = mysqli_query($conn, $result_cat);

}else{

//consultar todos os clientes no banco de dados
$result_cliente = "SELECT * FROM categoria ORDER BY idCat DESC";
$resultado_cat = mysqli_query($conn, $result_cliente);
}

//Verificar se encontrou resultado na tabela 
if (($resultado_cat) and ($resultado_cat->num_rows != 0)) {
?>
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>Id_Cat</th>
        <th>Nome</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row_cat = mysqli_fetch_assoc($resultado_cat)) {
      ?>
        <tr>
          <th><?php echo $row_cat['idCat']; ?></th>
          <td><?php echo $row_cat['nomeCat']; ?></td>
          <td>
            <!-- btn Visualizar -->
            <button type="button" class="btn btn-xs btn-primary text" data-toggle="modal" data-target="#modalVisualizarCat<?php echo $row_cat['idCat']; ?>"><i class="fas fa-eye"></i></button>

            <!-- btn Editar -->
            <button type="button" class="btn btn-xs btn-warning text-white" data-toggle="modal" data-target="#modalEditarCat" 
            data-whateveridcateditar="<?php echo $row_cat['idCat']; ?>" 
            data-whatevernomecateditar="<?php echo $row_cat['nomeCat']; ?>" 
            data-whateverobscateditar="<?php echo $row_cat['obsCat']; ?>" >
            <i class="far fa-edit"></i></button>

            <!-- btn Excluir -->
            <!-- <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalExcluirCliente" data-whateveridClienteExcluir="<?php echo $row_cat['idCliente']; ?>" data-whatevernomeClienteExcluir="<?php echo $row_cat['nomeCliente']; ?>"><i class="fas fa-trash-alt"></i></button> -->
          </td>
        </tr>

        <!-- Modal Vizualizar -->
        <div class="modal fade" id="modalVisualizarCat<?php echo $row_cat['idCat']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Nome: <?php echo $row_cat['nomeCat']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- código -->
                <p><b>Código</b> da categoria:</p>
                <p><?php echo $row_cat['idCat']; ?></p>
                <hr>
                <!-- nome -->
                <p><b>Nome</b> da categoria:</p>
                <p><?php echo $row_cat['nomeCat']; ?></p>
                <hr>
                <!-- email -->
                <p><b>OBS</b> da categoria:</p>
                <p><?php echo $row_cat['obsCat']; ?></p>
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
  echo "<div class='alert alert-danger' role='alert'>Nenhum Cliente foi encontrado :(</div>";
}
?>
