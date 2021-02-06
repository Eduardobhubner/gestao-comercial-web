<?php

// conexao com o bd
include_once("../conexao/conexao.php");

error_reporting(0);
ini_set("display_errors",0);

$palavra = $_POST['palavra'];
$chaveSelect = $_POST['chaveSelect'];

if($palavra != ""){

//consultar apenas os clientes desejados no banco de dados
$result_cliente = "SELECT * FROM cliente WHERE $chaveSelect LIKE '%$palavra%' ORDER BY nomeCliente ASC ";
$resultado_cliente = mysqli_query($conn, $result_cliente);

}else{

//consultar todos os clientes no banco de dados
$result_cliente = "SELECT * FROM cliente ORDER BY idCliente DESC";
$resultado_cliente = mysqli_query($conn, $result_cliente);
}

//Verificar se encontrou resultado na tabela "usuarios"
if (($resultado_cliente) and ($resultado_cliente->num_rows != 0)) {
?>
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>Id_cliente</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Celular</th>
        <th>Instagram</th>
        <th>ações</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row_cliente = mysqli_fetch_assoc($resultado_cliente)) {
      ?>
        <tr>
          <th><?php echo $row_cliente['idCliente']; ?></th>
          <td><?php echo $row_cliente['nomeCliente']; ?></td>
          <td><?php echo $row_cliente['emailCliente']; ?></td>
          <td><?php echo $row_cliente['celCliente']; ?></td>
          <td><?php echo $row_cliente['instagramCliente']; ?></td>
          <td>
            <!-- btn Visualizar -->
            <button type="button" class="btn btn-xs btn-primary " data-toggle="modal" data-target="#modalVisualizarCliente<?php echo $row_cliente['idCliente']; ?>"><i class="fas fa-eye"></i></button>

            <!-- btn Editar -->
            <button type="button" class="btn btn-xs btn-warning text-white" data-toggle="modal" data-target="#modalEditarCliente" 
            data-whateveridclienteeditar="<?php echo $row_cliente['idCliente']; ?>" 
            data-whatevernomeclienteeditar="<?php echo $row_cliente['nomeCliente']; ?>" 
            data-whateveremailclienteeditar="<?php echo $row_cliente['emailCliente']; ?>" 
            data-whatevercpfclienteeditar="<?php echo $row_cliente['cpfCliente']; ?>"
            data-whateverinstagramclienteeditar="<?php echo $row_cliente['instagramCliente']; ?>"
            data-whatevercelclienteeditar="<?php echo $row_cliente['celCliente']; ?>"
            data-whatevercepclienteeditar="<?php echo $row_cliente['cepCliente']; ?>"
            data-whateverestadoclienteeditar="<?php echo $row_cliente['estadoCliente']; ?>"
            data-whatevercidclienteeditar="<?php echo $row_cliente['cidCliente']; ?>"
            data-whateverendclienteeditar="<?php echo $row_cliente['endCliente']; ?>"
            data-whateversexoclienteeditar="<?php echo $row_cliente['sexoCliente']; ?>"
            data-whatevernascclienteeditar="<?php echo $row_cliente['nascCliente']; ?>">
            <i class="far fa-edit"></i></button>

            <!-- btn Excluir -->
            <!-- <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalExcluirCliente" data-whateveridClienteExcluir="<?php echo $row_cliente['idCliente']; ?>" data-whatevernomeClienteExcluir="<?php echo $row_cliente['nomeCliente']; ?>"><i class="fas fa-trash-alt"></i></button> -->
          </td>
        </tr>

        <!-- Modal Vizualizar -->
        <div class="modal fade" id="modalVisualizarCliente<?php echo $row_cliente['idCliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Nome: <?php echo $row_cliente['nomeCliente']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- código -->
                <p><b>Código</b> do cliente:</p>
                <p><?php echo $row_cliente['idCliente']; ?></p>
                <hr>
                <!-- nome -->
                <p><b>Nome</b> do cliente:</p>
                <p><?php echo $row_cliente['nomeCliente']; ?></p>
                <hr>
                <!-- email -->
                <p><b>Email</b> do cliente:</p>
                <p><?php echo $row_cliente['emailCliente']; ?></p>
                <hr>
                <!-- cpf -->
                <p><b>CPF</b> do cliente:</p>
                <p><?php echo $row_cliente['cpfCliente']; ?></p>
                <hr>
                <!-- instagram -->
                <p><b>instagram</b> do cliente:</p>
                <p><?php echo $row_cliente['instagramCliente']; ?></p>
                <hr>
                <!-- cel -->
                <p><b>Celular</b> do cliente:</p>
                <p><?php echo $row_cliente['celCliente']; ?></p>
                <hr>
                <!-- cep -->
                <p><b>CEP</b> do cliente:</p>
                <p><?php echo $row_cliente['cepCliente']; ?></p>
                <hr>
                <!-- estado -->
                <p><b>Estado</b> do cliente:</p>
                <p><?php echo $row_cliente['estadoCliente']; ?></p>
                <hr>
                <!-- cid -->
                <p><b>Cidade</b> do cliente:</p>
                <p><?php echo $row_cliente['cidCliente']; ?></p>
                <hr>
                <!-- end -->
                <p><b>Endereço</b> do cliente:</p>
                <p><?php echo $row_cliente['endCliente']; ?></p>
                <hr>
                <!-- sexo -->
                <p><b>Gênero</b> do cliente:</p>
                <p><?php echo $row_cliente['sexoCliente']; ?></p>
                <hr>
                <!-- nasc -->
                <p><b>Data de nascimento</b> do cliente:</p>
                <p><?php echo $row_cliente['nascCliente']; ?></p>
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
