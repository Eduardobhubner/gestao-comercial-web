<?php

// conexao com o bd
include_once("../conexao/conexao.php");

error_reporting(0);
ini_set("display_errors",0);

$palavra = $_POST['palavra'];
$chaveSelect = $_POST['chaveSelect'];

if($palavra != ""){

//consultar apenas os clientes desejados no banco de dados
$result_forn = "SELECT * FROM fornecedor WHERE $chaveSelect LIKE '%$palavra%' ORDER BY nomeForn ASC ";
$resultado_forn = mysqli_query($conn, $result_forn);

}else{

//consultar todos os clientes no banco de dados
$result_forn = "SELECT * FROM fornecedor ORDER BY idForn DESC";
$resultado_forn = mysqli_query($conn, $result_forn);
}

//Verificar se encontrou resultado na tabela 
if (($resultado_forn) and ($resultado_forn->num_rows != 0)) {
?>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Id_Forn</th>
            <th>Nome</th>
            <th>CNPJ</th>
            <th>Telefone</th>
            <th>Cep</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
      while ($row_forn = mysqli_fetch_assoc($resultado_forn)) {
      ?>
        <tr>
            <th><?php echo $row_forn['idForn']; ?></th>
            <td><?php echo $row_forn['nomeForn']; ?></td>
            <td><?php echo $row_forn['cnpjForn']; ?></td>
            <td><?php echo $row_forn['telForn']; ?></td>
            <td><?php echo $row_forn['cepForn']; ?></td>
            <td>
                <!-- btn Visualizar -->
                <button type="button" class="btn btn-xs btn-primary text" data-toggle="modal"
                    data-target="#modalVisualizarForn<?php echo $row_forn['idForn']; ?>"><i
                        class="fas fa-eye"></i></button>

                <!-- btn Editar -->
                <button type="button" class="btn btn-xs btn-warning text-white" data-toggle="modal"
                    data-target="#modalEditarForn" data-whateveridforneditar="<?php echo $row_forn['idForn']; ?>"
                    data-whateverrazaosocialforneditar="<?php echo $row_forn['razaoSocialForn']; ?>"
                    data-whatevernomeforneditar="<?php echo $row_forn['nomeForn']; ?>"
                    data-whatevercnpjforneditar="<?php echo $row_forn['cnpjForn']; ?>"
                    data-whatevertelforneditar="<?php echo $row_forn['telForn']; ?>"
                    data-whatevercelforneditar="<?php echo $row_forn['celForn']; ?>"
                    data-whateverendforneditar="<?php echo $row_forn['endForn']; ?>"
                    data-whatevercidforneditar="<?php echo $row_forn['cidForn']; ?>"
                    data-whateverestadoforneditar="<?php echo $row_forn['estadoForn']; ?>"
                    data-whatevercepforneditar="<?php echo $row_forn['cepForn']; ?>"
                    data-whateveremailforneditar="<?php echo $row_forn['emailForn']; ?>">
                    <i class="far fa-edit"></i></button>

                <!-- btn Excluir -->
                <!-- <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalExcluirCliente" data-whateveridClienteExcluir="<?php echo $row_forn['idCliente']; ?>" data-whatevernomeClienteExcluir="<?php echo $row_forn['nomeCliente']; ?>"><i class="fas fa-trash-alt"></i></button> -->
            </td>
        </tr>

        <!-- Modal Vizualizar -->
        <div class="modal fade" id="modalVisualizarForn<?php echo $row_forn['idForn']; ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Nome:
                            <?php echo $row_forn['nomeForn']; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- código -->
                        <p><b>Código</b> do fornecedor:</p>
                        <p><?php echo $row_forn['idForn']; ?></p>
                        <hr>
                        <!-- razao social -->
                        <p><b>Razão social</b> do fornecedor:</p>
                        <p><?php echo $row_forn['razaoSocialForn']; ?></p>
                        <hr>
                        <!-- nome -->
                        <p><b>Nome</b> do fornecedor:</p>
                        <p><?php echo $row_forn['nomeForn']; ?></p>
                        <hr>
                        <!-- cnpj -->
                        <p><b>CNPJ</b> do fornecedor:</p>
                        <p><?php echo $row_forn['cnpjForn']; ?></p>
                        <hr>
                        <!-- tel -->
                        <p><b>telefone</b> do fornecedor:</p>
                        <p><?php echo $row_forn['telForn']; ?></p>
                        <hr>
                        <!-- cel -->
                        <p><b>Celular</b> do fornecedor:</p>
                        <p><?php echo $row_forn['celForn']; ?></p>
                        <hr>
                        <!-- end -->
                        <p><b>Endereço</b> do fornecedor:</p>
                        <p><?php echo $row_forn['endForn']; ?></p>
                        <hr>
                        <!-- cid -->
                        <p><b>Cidade</b> do fornecedor:</p>
                        <p><?php echo $row_forn['cidForn']; ?></p>
                        <hr>
                        <!-- estado -->
                        <p><b>Estado</b> do fornecedor:</p>
                        <p><?php echo $row_forn['estadoForn']; ?></p>
                        <hr>
                        <!-- cep -->
                        <p><b>Código</b> do fornecedor:</p>
                        <p><?php echo $row_forn['cepForn']; ?></p>
                        <hr>
                        <!-- email -->
                        <p><b>E-mail</b> do fornecedor:</p>
                        <p><?php echo $row_forn['emailForn']; ?></p>
                        <hr>


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
  echo "<div class='alert alert-danger' role='alert'>Nenhum fornecedor foi encontrado :(</div>";
}
?>