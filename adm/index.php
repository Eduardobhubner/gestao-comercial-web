<?php

include_once("./php/conexao/conexao.php");

?>


<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="shortcut icon" href="img/iconGauge_2.png"> -->
    <title>VHHookah</title>
    <!-- Fonte -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
    <!-- Estilos -->
    <link rel="stylesheet" href="./../bootstrap/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/bf7e05c402.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- <div id="login-area">
        <div class="wrapper fadeInDown">
            <form>
                <div id="formContent">

                    <div class="fadeIn first">
                    </div>
                    <h2 class="title">Administrativo</h2>
                    <div id="divLoginUser">
                        <input type="text" id="txtLogin" class="fadeIn second inputlogin" name="txtLogin" placeholder="Login">
                        <input type="password" id="txtSenha" class="fadeIn third inputlogin" name="txtSenha" placeholder="Senha">
                        <input type="button" class="fadeIn fourth" name="btLogin" id="btLogin" value="Entrar">
                    </div>
                </div>
            </form>
        </div>
    </div> -->

    <div id="main-area">
        <!--cabeçalho-->
        <header>
            <div class="container" id="nav-container">
                <!-- add essa class -->
                <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
                    <a href="#" class="navbar-brand" href="index.html">VHhookah</a>
                    <input id="hamburguer" type="checkbox" style="display: none;">
                    <label for="hamburguer">
                        <div class="navbar-toggler hamburguer" data-toggle="collapse" data-target="#navbar-links"
                            aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
                        </div>
                    </label>
                    <!--itens-->
                    <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link" id="btn-inicio" href="#">Início</a>
                            <a class="nav-item nav-link" id="btn-prod" href="#">Produtos</a>
                            <a class="nav-item nav-link" id="btn-venda" href="#">Vendas</a>
                            <a class="nav-item nav-link" id="btn-compra" href="#">Compras</a>
                            <a class="nav-item nav-link" id="btn-categoria" href="#">Categorias</a>
                            <a class="nav-item nav-link" id="btn-cliente" href="#">Clientes</a>
                            <a class="nav-item nav-link" id="btn-fornecedor" href="#">Fornecedores</a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <main>
            <div id="conteudo-area">
                <div class="container">
                    <!-- inicio -->
                    <div id="inicio-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="main-title">Seja bem vindo!</h1>
                                </div>
                                <div id="body-inicio" class="body-area">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- produto -->
                    <div id="prod-area">
                        <div class="container">
                            <div class="col-md-12">
                                <h1 class="main-title">Produtos</h1>
                                <span id="alertaProd"></span>
                            </div>
                            <div id="body-prod" class="col-md-12 body-area">
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <!-- botão adicionar produto -->
                                        <a href="#" class="btn btn-success btn-lg active  btn-block btn-consulta "
                                            role="button" aria-pressed="true" data-toggle="modal"
                                            data-target="#modalAdicionarProd">Cadastrar</a>
                                    </div>
                                    <!-- input de procura -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="procuraTipoProd">
                                        </div>
                                    </div>
                                    <!-- select de procura -->
                                    <div class="col-md-3">
                                        <!-- colunas dos tipos  -->
                                        <div class="form-group">
                                            <select class="form-control" id="tipoSelectProd">
                                                <option value="nomeProd">Nome</option>
                                                <option value="codBarraProd">Código de barra</option>
                                                <option value="codNumProd">Código de identificação</option>
                                                <option value="descriProd">Descrição</option>
                                                <option value="estoqueProd">Estoque</option>
                                                <option value="valorCompraProd">Valor de compra</option>
                                                <option value="unidMedProd">Unidade de medida</option>
                                                <option value="marcaProd">Marca</option>
                                                <option value="idCat">Categoria</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <span id="listagemProd-area"></span>
                                        <!-- usamos $.post da pagina js para criar a table-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Adicionar -->
                        <div class="modal fade" id="modalAdicionarProd" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-success ">
                                        <h5 class="text-center modal-title  text-white" id="exampleModalLabel">Adicionar
                                            um novo <strong>produto</strong></h5>
                                    </div>
                                    <!-- form -->
                                    <!-- colocar dentro de form file para arquivar imagem do prod -->
                                    <form method="post" id="form-add-prod" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <span id="alertaModalAddProd"></span>
                                            <!-- nome  -->
                                            <div class="form-group">
                                                <label for="nomeProdAdd"><b>Nome</b> do produto:</label>
                                                <input type="text" class="form-control" id="nomeProdAdd">
                                            </div>
                                            <!-- codBarra  -->
                                            <div class="form-group">
                                                <label for="codBarraProdAdd"><b>Código de barra</b> do produto:</label>
                                                <input type="text" class="form-control" id="codBarraProdAdd">
                                            </div>
                                            <!-- codNum  -->
                                            <div class="form-group">
                                                <label for="codNumProdAdd"><b>Código de identificação</b> do
                                                    produto:</label>
                                                <input type="text" class="form-control" id="codNumProdAdd">
                                            </div>
                                            <!-- Descri  -->
                                            <div class="form-group">
                                                <label for="descriProdAdd"><b>Descrição</b> do produto:</label>
                                                <textarea class="form-control" id="descriProdAdd" rows="15"></textarea>
                                            </div>
                                            <!-- estoque  -->
                                            <div class="form-group">
                                                <label for="estoqueProdAdd"><b>Estoque inicial</b> do produto:</label>
                                                <input type="text" class="form-control" id="estoqueProdAdd">
                                            </div>
                                            <!-- valorCompra  -->
                                            <div class="form-group">
                                                <label for="valorCompraProdAdd"><b>Valor de compra</b> do
                                                    produto:</label>
                                                <input type="text" class="form-control" id="valorCompraProdAdd">
                                            </div>
                                            <div class="form-group">
                                                <label for="imgProdAdd"><b>Imagem</b> do produto:</label>
                                                <input type="file" class="form-control-file" id="imgProdAdd">
                                            </div>
                                            <!-- unidMedida  -->
                                            <div class="form-group">
                                                <label for="unidMedProdAdd"><b>Unidade de medida</b> do
                                                    produto:</label>
                                                <input type="text" class="form-control" id="unidMedProdAdd">
                                            </div>
                                            <!-- marca  -->
                                            <div class="form-group">
                                                <label for="marcaProdAdd"><b>Marca</b> do produto:</label>
                                                <input type="text" class="form-control" id="marcaProdAdd">
                                            </div>
                                            <!-- CatProd  -->
                                            <div class="form-group">
                                                <label for="tipoCatProdAdd"><b>Categoria</b> do produto:</label>
                                                <select class="form-control" id="tipoCatProdAdd">
                                                    <?php
                                                    $result_catProd = "SELECT * FROM categoria";
                                                    $resultado_catProd = mysqli_query($conn, $result_catProd);
                                                    while ($row_catProd = mysqli_fetch_assoc($resultado_catProd)) { ?>
                                                    <option value="<?php echo $row_catProd['idCat']; ?>">
                                                        <?php echo $row_catProd['nomeCat']; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <!-- fim do form -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" form=form-add-prod class="btn btn-success"
                                                id="btnProdAdd">Adicionar</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Fechar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- modal Editar -->
                        <div class="modal fade" id="modalEditarProd" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title text-white" id="exampleModalLabel"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- form -->
                                    <!-- colocar dentro de form file para arquivar imagem do prod -->
                                    <form method="post" id="form-editar-prod" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <span id="alertaModalEditarProd"></span>
                                            <!-- id  -->
                                            <div class="form-group">
                                                <label for="idProdEditar"><b>id</b> do produto:</label>
                                                <input type="text" class="form-control" id="idProdEditar" disabled>
                                            </div>
                                            <!-- nome  -->
                                            <div class="form-group">
                                                <label for="nomeProdEditar"><b>Nome</b> do produto:</label>
                                                <input type="text" class="form-control" id="nomeProdEditar">
                                            </div>
                                            <!-- codBarra  -->
                                            <div class="form-group">
                                                <label for="codBarraProdEditar"><b>Código de barra</b> do
                                                    produto:</label>
                                                <input type="text" class="form-control" id="codBarraProdEditar">
                                            </div>
                                            <!-- codNum  -->
                                            <div class="form-group">
                                                <label for="codNumProdEditar"><b>Código de identificação</b> do
                                                    produto:</label>
                                                <input type="text" class="form-control" id="codNumProdEditar">
                                            </div>
                                            <!-- Descri  -->
                                            <div class="form-group">
                                                <label for="descriProdEditar"><b>Descrição</b> do produto:</label>
                                                <textarea class="form-control" id="descriProdEditar"
                                                    rows="15"></textarea>
                                            </div>
                                            <!-- estoque  -->
                                            <div class="form-group">
                                                <label for="estoqueProdEditar"><b>Estoque inicial</b> do
                                                    produto:</label>
                                                <input type="text" class="form-control" id="estoqueProdEditar">
                                            </div>
                                            <!-- valorCompra  -->
                                            <div class="form-group">
                                                <label for="valorCompraProdEditar"><b>Valor de compra</b> do
                                                    produto:</label>
                                                <input type="text" class="form-control" id="valorCompraProdEditar">
                                            </div>
                                            <!-- ImagemAtual -->
                                            <div class="form-group">
                                                <label for="imgAtualProdEditar"><b>Imagem atual</b> do
                                                    produto:</label>
                                                <input type="text" class="form-control" id="imgAtualProdEditar"
                                                    disabled>
                                            </div>
                                            <!-- imagem -->
                                            <div class="form-group">
                                                <label for="imgProdEditar"><b>Imagem que deseja alterar</b> do
                                                    produto:</label>
                                                <input type="file" class="form-control-file" id="imgProdEditar"
                                                    disabled>
                                            </div>
                                            <!-- unidMedida  -->
                                            <div class="form-group">
                                                <label for="unidMedProdEditar"><b>Unidade de medida</b> do
                                                    produto:</label>
                                                <input type="text" class="form-control" id="unidMedProdEditar">
                                            </div>
                                            <!-- marca  -->
                                            <div class="form-group">
                                                <label for="marcaProdEditar"><b>Marca</b> do produto:</label>
                                                <input type="text" class="form-control" id="marcaProdEditar">
                                            </div>
                                            <!-- CatProd  -->
                                            <div class="form-group">
                                                <label for="tipoCatProdEditar"><b>Categoria</b> do produto:</label>
                                                <select class="form-control" id="tipoCatProdEditar">
                                                    <?php
                                                    $result_catProd = "SELECT * FROM categoria";
                                                    $resultado_catProd = mysqli_query($conn, $result_catProd);
                                                    while ($row_catProd = mysqli_fetch_assoc($resultado_catProd)) { ?>
                                                    <option value="<?php echo $row_catProd['idCat']; ?>">
                                                        <?php echo $row_catProd['nomeCat']; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <!-- fim do form -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" form="form-editar-prod"
                                                class="btn btn-warning text-white" id="btnProdEditar">Editar</button>
                                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--fim do modal editar -->
                    </div>
                    <!-- Vendas -->
                    <div id="venda-area">
                        <div class="container">
                            <div class="col-md-12">
                                <h1 class="main-title">Vendas</h1>
                            </div>
                            <div id="body-venda" class="body-area">
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        
                                        <a href="#" class="btn btn-success btn-lg active  btn-block btn-consulta "
                                            role="button" aria-pressed="true" data-toggle="modal"
                                            data-target="#modalAdicionarVenda">Vender</a>
                                    </div>
                                    <div class="col-md-6 text-center">
                                       
                                        <a href="#" class="btn btn-primary btn-lg active  btn-block btn-consulta "
                                            role="button" aria-pressed="true" data-toggle="modal"
                                            data-target="#modalConsultarVender">Balanço</a>
                                    </div>
                                    <div class="col-md-12">
                                        <span id="listagemVendas-area"></span>
                                        <!-- usamos $.post da pagina js para criar a table-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal adicionar venda -->
                        <div class="modal fade" id="modalAdicionarVenda" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Vender</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="add-venda">
                                        <div class="modal-body">
                                            <div id="dados-gerais">
                                                <!-- cliente, data , numDocVenda, valorImpost, valorEmbala, valorFrete, statusVenda -->
                                                <div class="form-row">
                                                    <!-- cliente -->
                                                    <div class="form-group col-md-4">
                                                        <label for="select-cliente-venda">Cliente</label>
                                                        <select class="form-control select-cliente-venda"
                                                            id="select-cliente-venda">
                                                            
                                                        </select>
                                                    </div>
                                                    <!-- data -->
                                                    <div class="form-group col-md-4">
                                                        <label for="data-venda">Data</label>
                                                        <input type="date" class="form-control data-venda"
                                                            id="data-venda">
                                                    </div>
                                                    <!-- num doc -->
                                                    <div class="form-group col-md-4">
                                                        <label for="doc-venda">NumDoc</label>
                                                        <input type="text" class="form-control doc-venda"
                                                            id="doc-venda">
                                                    </div>
                                                    <!-- val embalagem -->
                                                    <div class="form-group col-md-6">
                                                        <label for="val-embalagem-venda">Valor embalagem</label>
                                                        <input type="text" class="form-control val-embalagem-venda"
                                                            id="val-embalagem-venda">
                                                    </div>
                                                    <!-- val frete -->
                                                    <div class="form-group col-md-6">
                                                        <label for="val-frete-venda">Valor frete</label>
                                                        <input type="text" class="form-control val-frete-venda"
                                                            id="val-frete-venda">
                                                    </div>

                                                </div>
                                            </div>
                                            <div id="dados-produtos">
                                                <!-- qual produto(select), quant, unida(inabled), custo unit(enabled), custo total(enabled), botão excluir(click) -->
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Produto</th>
                                                            <th scope="col">Quantidade</th>
                                                            <th scope="col">Custo Unit</th>
                                                            <th scope="col">Custo total</th>
                                                            <th scope="col">Unidade</th>
                                                            <th scope="col">Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="body-table-venda">
                                                    </tbody>
                                                </table>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <button type="button" class="btn btn-primary "
                                                            id="btn-add-prod-venda">
                                                            <b>+</b> Adicionar
                                                            Produto</button>
                                                    </div>
                                                    <div class="col">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Valor total dos produtos R$</span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                id="inputValorTotalProd" aria-label="Quantia" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Valor total da Compra R$</span>
                                                </div>
                                                <input type="text" class="form-control" id="inputValorTotalVenda"
                                                    aria-label="Quantia" disabled>
                                            </div>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Fechar</button>
                                            <button type="button" class="btn btn-success">Concluir Compra</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Compra -->
                    <div id="compra-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="main-title">Compras</h1>
                                </div>
                                <div id="body-compra" class="body-area">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Categoria -->
                    <div id="categoria-area">
                        <div class="container">
                            <div class="col-md-12">
                                <h1 class="main-title">Categorias</h1>
                                <span id="alertaCat"></span>
                            </div>
                            <div id="body-cat" class="body-area">
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <!-- botão adicionar versao -->
                                        <a href="#" class="btn btn-success btn-lg active  btn-block btn-consulta "
                                            role="button" aria-pressed="true" data-toggle="modal"
                                            data-target="#modalAdicionarCat">Cadastrar</a>
                                    </div>
                                    <!-- input de procura -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="procuraTipoCat">
                                        </div>
                                    </div>
                                    <!-- select de procura -->
                                    <div class="col-md-3">
                                        <!-- colunas dos tipos  -->
                                        <div class="form-group">
                                            <select class="form-control" id="tipoSelectCat">
                                                <option value="nomeCat">Nome</option>
                                                <option value="obsCat">OBS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <span id="listagemCat-area"></span>
                                        <!-- usamos $.post da pagina js para criar a table-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Adicionar -->
                        <div class="modal fade" id="modalAdicionarCat" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-success ">
                                        <h5 class="text-center modal-title  text-white" id="exampleModalLabel">Adicionar
                                            uma nova <strong>Categoria</strong></h5>
                                    </div>
                                    <div class="modal-body">
                                        <span id="alertaModalAddCat"></span>
                                        <!-- form -->
                                        <!-- nome  -->
                                        <div class="form-group">
                                            <label for="nomeCatAdd"><b>Nome</b> da Categoria:</label>
                                            <input type="text" class="form-control" id="nomeCatAdd">
                                        </div>
                                        <!-- obs  -->
                                        <div class="form-group">
                                            <label for="obsCatAdd"><b>OBS</b> da Categoria:</label>
                                            <textarea class="form-control" id="obsCatAdd" rows="15"></textarea>
                                        </div>
                                        <!-- fim do form -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" id="btnCatAdd">Adicionar</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- modal Editar -->
                        <div class="modal fade" id="modalEditarCat" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title text-white" id="exampleModalLabel"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <span id="alertaModalEditarCat"></span>
                                        <!-- form -->
                                        <!-- id  -->
                                        <div class="form-group">
                                            <label for="idCatEditar"><b>Id</b> da Categoria:</label>
                                            <input type="text" class="form-control" id="idCatEditar" disabled>
                                        </div>
                                        <!-- nome  -->
                                        <div class="form-group">
                                            <label for="nomeCatEditar"><b>Nome</b> da Categoria:</label>
                                            <input type="text" class="form-control" id="nomeCatEditar">
                                        </div>
                                        <!-- obs  -->
                                        <div class="form-group">
                                            <label for="obsCatEditar"><b>OBS</b> da Categoria:</label>
                                            <textarea class="form-control" id="obsCatEditar" rows="15"></textarea>
                                        </div>
                                        <!-- fim do form -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning text-white"
                                            id="btnCatEditar">Editar</button>
                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--fim do modal editar -->
                    </div>
                    <!-- Cliente -->
                    <div id="cliente-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="main-title">Clientes</h1>
                                    <span id="alertaCliente"></span>
                                </div>
                                <div id="body-cliente" class="col-md-12 body-area">
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <!-- botão adicionar versao -->
                                            <a href="#" class="btn btn-success btn-lg active  btn-block btn-consulta "
                                                role="button" aria-pressed="true" data-toggle="modal"
                                                data-target="#modalAdicionarCliente">Cadastrar</a>
                                        </div>
                                        <!-- input de procura -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <!-- <label for="procuraTipoCliente"><b>Nome</b> do Cliente:</label> -->
                                                <input type="text" class="form-control" id="procuraTipoCliente">
                                            </div>
                                        </div>
                                        <!-- select de procura -->
                                        <div class="col-md-3">
                                            <!-- colunas dos tipos  -->
                                            <div class="form-group">
                                                <select class="form-control" id="tipoSelectCliente">
                                                    <option value="nomeCliente">Nome</option>
                                                    <option value="emailCliente">Email</option>
                                                    <option value="cpfCliente">CPF</option>
                                                    <option value="instagramCliente">Instagram</option>
                                                    <option value="celCliente">Celular</option>
                                                    <option value="cepCliente">CEP</option>
                                                    <option value="estadoCliente">Estado</option>
                                                    <option value="cidCliente">Cidade</option>
                                                    <option value="endCLiente">Endereço</option>
                                                    <option value="sexoCliente">Gênero</option>
                                                    <option value="nascCliente">Data de nascimento</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <span id="listagemCliente-area"></span>
                                            <!-- usamos $.post da pagina js para criar a table-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Adicionar -->
                        <div class="modal fade" id="modalAdicionarCliente" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-success ">
                                        <h5 class="text-center modal-title  text-white" id="exampleModalLabel">Adicionar
                                            um novo <strong>Cliente</strong></h5>
                                    </div>
                                    <div class="modal-body">
                                        <span id="alertaModalAddCliente"></span>
                                        <!-- form -->
                                        <!-- nome  -->
                                        <div class="form-group">
                                            <label for="nomeClienteAdd"><b>Nome</b> do Cliente:</label>
                                            <input type="text" class="form-control" id="nomeClienteAdd">
                                        </div>
                                        <!-- email-->
                                        <div class="form-group">
                                            <label for="emailClienteAdd"><b>E-mail</b> do cliente:</label>
                                            <input type="email" class="form-control" id="emailClienteAdd">
                                        </div>
                                        <!-- cpf  -->
                                        <div class="form-group">
                                            <label for="cpfClienteAdd"><b>CPF</b> do Cliente:</label>
                                            <input type="text" class="form-control" id="cpfClienteAdd">
                                        </div>
                                        <!-- instagram  -->
                                        <div class="form-group">
                                            <label for="instagramClienteAdd"><b>Instagram</b> do Cliente:</label>
                                            <input type="text" class="form-control" id="instagramClienteAdd">
                                        </div>
                                        <!-- cel  -->
                                        <div class="form-group">
                                            <label for="celClienteAdd"><b>Celular</b> do Cliente:</label>
                                            <input type="text" class="form-control" id="celClienteAdd">
                                        </div>
                                        <!-- cep  -->
                                        <div class="form-group">
                                            <label for="cepClienteAdd"><b>CEP</b> do Cliente:</label>
                                            <input type="text" class="form-control" id="cepClienteAdd">
                                        </div>
                                        <!-- estado  -->
                                        <div class="form-group">
                                            <label for="estadoClienteAdd">Selecione o <b>estado</b></label>
                                            <select class="form-control" id="estadoClienteAdd">
                                                <option value="AC">Acre</option>
                                                <option value="AL">Alagoas</option>
                                                <option value="AP">Amapá</option>
                                                <option value="AM">Amazonas</option>
                                                <option value="BA">Bahia</option>
                                                <option value="CE">Ceará</option>
                                                <option value="DF">Distrito Federal</option>
                                                <option value="ES">Espírito Santo</option>
                                                <option value="GO">Goiás</option>
                                                <option value="MA">Maranhão</option>
                                                <option value="MT">Mato Grosso</option>
                                                <option value="MS">Mato Grosso do Sul</option>
                                                <option value="MG">Minas Gerais</option>
                                                <option value="PA">Pará</option>
                                                <option value="PB">Paraíba</option>
                                                <option value="PR">Paraná</option>
                                                <option value="PE">Pernambuco</option>
                                                <option value="PI">Piauí</option>
                                                <option value="RJ">Rio de Janeiro</option>
                                                <option value="RN">Rio Grande do Norte</option>
                                                <option value="RS">Rio Grande do Sul</option>
                                                <option value="RO">Rondônia</option>
                                                <option value="RR">Roraima</option>
                                                <option value="SC">Santa Catarina</option>
                                                <option value="SP">São Paulo</option>
                                                <option value="SE">Sergipe</option>
                                                <option value="TO">Tocantins</option>
                                            </select>
                                        </div>
                                        <!-- cid  -->
                                        <div class="form-group">
                                            <label for="cidClienteAdd"><b>Cidade</b> do Cliente:</label>
                                            <input type="text" class="form-control" id="cidClienteAdd">
                                        </div>
                                        <!-- end  -->
                                        <div class="form-group">
                                            <label for="endClienteAdd"><b>Endereço</b> do Cliente:</label>
                                            <input type="text" class="form-control" id="endClienteAdd">
                                        </div>
                                        <!-- sexo  -->
                                        <div class="form-group">
                                            <label for="sexoClienteAdd">Selecione o <b>gênero</b></label>
                                            <select class="form-control" id="sexoClienteAdd">
                                                <option value="M">Masculino</option>
                                                <option value="f">Feminino</option>
                                                <option value="O">Outros</option>
                                            </select>
                                        </div>
                                        <!-- nasc  -->
                                        <div class="form-group">
                                            <label for="nascClienteAdd"><b>Data de nascimento</b> do Cliente:</label>
                                            <input type="date" class="form-control" id="nascClienteAdd">
                                        </div>

                                        <!-- fim do form -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success"
                                            id="btnClienteAdd">Adicionar</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- modal Editar -->
                        <div class="modal fade" id="modalEditarCliente" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title text-white" id="exampleModalLabel"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <span id="alertaModalEditarCliente"></span>
                                        <!-- form -->
                                        <!-- id  -->
                                        <div class="form-group">
                                            <label for="idClienteEditar"><b>id</b> do Cliente:</label>
                                            <input type="text" class="form-control" id="idClienteEditar" disabled>
                                        </div>
                                        <!-- nome  -->
                                        <div class="form-group">
                                            <label for="nomeClienteEditar"><b>Nome</b> do Cliente:</label>
                                            <input type="text" class="form-control" id="nomeClienteEditar">
                                        </div>
                                        <!-- email-->
                                        <div class="form-group">
                                            <label for="emailClienteEditar"><b>E-mail</b> do cliente:</label>
                                            <input type="email" class="form-control" id="emailClienteEditar">
                                        </div>
                                        <!-- cpf  -->
                                        <div class="form-group">
                                            <label for="cpfClienteEditar"><b>CPF</b> do Cliente:</label>
                                            <input type="text" class="form-control" id="cpfClienteEditar">
                                        </div>
                                        <!-- instagram  -->
                                        <div class="form-group">
                                            <label for="instagramClienteEditar"><b>Instagram</b> do Cliente:</label>
                                            <input type="text" class="form-control" id="instagramClienteEditar">
                                        </div>
                                        <!-- cel  -->
                                        <div class="form-group">
                                            <label for="celClienteEditar"><b>Celular</b> do Cliente:</label>
                                            <input type="text" class="form-control" id="celClienteEditar">
                                        </div>
                                        <!-- cep  -->
                                        <div class="form-group">
                                            <label for="cepClienteEditar"><b>CEP</b> do Cliente:</label>
                                            <input type="text" class="form-control" id="cepClienteEditar">
                                        </div>
                                        <!-- estado  -->
                                        <div class="form-group">
                                            <label for="estadoClienteEditar">Selecione o <b>estado</b></label>
                                            <select class="form-control" id="estadoClienteEditar">
                                                <option value="AC">Acre</option>
                                                <option value="AL">Alagoas</option>
                                                <option value="AP">Amapá</option>
                                                <option value="AM">Amazonas</option>
                                                <option value="BA">Bahia</option>
                                                <option value="CE">Ceará</option>
                                                <option value="DF">Distrito Federal</option>
                                                <option value="ES">Espírito Santo</option>
                                                <option value="GO">Goiás</option>
                                                <option value="MA">Maranhão</option>
                                                <option value="MT">Mato Grosso</option>
                                                <option value="MS">Mato Grosso do Sul</option>
                                                <option value="MG">Minas Gerais</option>
                                                <option value="PA">Pará</option>
                                                <option value="PB">Paraíba</option>
                                                <option value="PR">Paraná</option>
                                                <option value="PE">Pernambuco</option>
                                                <option value="PI">Piauí</option>
                                                <option value="RJ">Rio de Janeiro</option>
                                                <option value="RN">Rio Grande do Norte</option>
                                                <option value="RS">Rio Grande do Sul</option>
                                                <option value="RO">Rondônia</option>
                                                <option value="RR">Roraima</option>
                                                <option value="SC">Santa Catarina</option>
                                                <option value="SP">São Paulo</option>
                                                <option value="SE">Sergipe</option>
                                                <option value="TO">Tocantins</option>
                                            </select>
                                        </div>
                                        <!-- cid  -->
                                        <div class="form-group">
                                            <label for="cidClienteEditar"><b>Cidade</b> do Cliente:</label>
                                            <input type="text" class="form-control" id="cidClienteEditar">
                                        </div>
                                        <!-- end  -->
                                        <div class="form-group">
                                            <label for="endClienteEditar"><b>Endereço</b> do Cliente:</label>
                                            <input type="text" class="form-control" id="endClienteEditar">
                                        </div>
                                        <!-- sexo  -->
                                        <div class="form-group">
                                            <label for="sexoClienteEditar">Selecione o <b>gênero</b></label>
                                            <select class="form-control" id="sexoClienteEditar">
                                                <option value="M">Masculino</option>
                                                <option value="f">Feminino</option>
                                                <option value="O">Outros</option>
                                            </select>
                                        </div>
                                        <!-- nasc  -->
                                        <div class="form-group">
                                            <label for="nascClienteEditar"><b>Data de nascimento</b> do Cliente:</label>
                                            <input type="date" class="form-control" id="nascClienteEditar">
                                        </div>

                                        <!-- fim do form -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning text-white"
                                            id="btnClienteEditar">Editar</button>
                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--fim do modal editar -->
                    </div>
                    <!-- fornecedor -->
                    <div id="fornecedor-area">
                        <div class="container">
                            <div class="col-md-12">
                                <h1 class="main-title">Fornecedor</h1>
                                <span id="alertaForn"></span>
                            </div>
                            <div id="body-forn" class="body-area">
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <!-- botão adicionar versao -->
                                        <a href="#" class="btn btn-success btn-lg active  btn-block btn-consulta "
                                            role="button" aria-pressed="true" data-toggle="modal"
                                            data-target="#modalAdicionarForn">Cadastrar</a>
                                    </div>
                                    <!-- input de procura -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="procuraTipoForn">
                                        </div>
                                    </div>
                                    <!-- select de procura -->
                                    <div class="col-md-3">
                                        <!-- colunas dos tipos  -->
                                        <div class="form-group">
                                            <select class="form-control" id="tipoSelectForn">
                                                <option value="razaoSocialForn">Razão Social</option>
                                                <option value="nomeForn">Nome</option>
                                                <option value="cnpjForn">CNPJ</option>
                                                <option value="telForn">Telefone</option>
                                                <option value="celForn">Celular</option>
                                                <option value="endForn">Endereço</option>
                                                <option value="cidForn">Cidade</option>
                                                <option value="estadoForn">Estado</option>
                                                <option value="cepForn">CEP</option>
                                                <option value="emailForn">E-mail</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <span id="listagemForn-area"></span>
                                        <!-- usamos $.post da pagina js para criar a table-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Adicionar -->
                        <div class="modal fade" id="modalAdicionarForn" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-success ">
                                        <h5 class="text-center modal-title  text-white" id="exampleModalLabel">Adicionar
                                            uma novo <strong>Fornecedor</strong></h5>
                                    </div>
                                    <div class="modal-body">
                                        <span id="alertaModalAddForn"></span>
                                        <!-- form -->
                                        <!-- razão social  -->
                                        <div class="form-group">
                                            <label for="razaoSocialFornAdd"><b>Razão social</b> do fornecedor:</label>
                                            <input type="text" class="form-control" id="razaoSocialFornAdd">
                                        </div>
                                        <!-- nome  -->
                                        <div class="form-group">
                                            <label for="nomeFornAdd"><b>Nome</b> do fornecedor:</label>
                                            <input type="text" class="form-control" id="nomeFornAdd">
                                        </div>
                                        <!-- cnpj  -->
                                        <div class="form-group">
                                            <label for="cnpjFornAdd"><b>CNPJ</b> do fornecedor:</label>
                                            <input type="text" class="form-control" id="cnpjFornAdd">
                                        </div>
                                        <!-- tel  -->
                                        <div class="form-group">
                                            <label for="telFornAdd"><b>Telefone</b> do fornecedor:</label>
                                            <input type="text" class="form-control" id="telFornAdd">
                                        </div>
                                        <!-- cel  -->
                                        <div class="form-group">
                                            <label for="celFornAdd"><b>Celular</b> do fornecedor:</label>
                                            <input type="text" class="form-control" id="celFornAdd">
                                        </div>
                                        <!-- end  -->
                                        <div class="form-group">
                                            <label for="endFornAdd"><b>Endereço</b> do fornecedor:</label>
                                            <input type="text" class="form-control" id="endFornAdd">
                                        </div>
                                        <!-- cid  -->
                                        <div class="form-group">
                                            <label for="cidFornAdd"><b>Cidade</b> do fornecedor:</label>
                                            <input type="text" class="form-control" id="cidFornAdd">
                                        </div>
                                        <!-- estado  -->
                                        <div class="form-group">
                                            <label for="estadoFornAdd"><b>Estado</b> do fornecedor:</label>
                                            <select class="form-control" id="estadoFornAdd">
                                                <option value="AC">Acre</option>
                                                <option value="AL">Alagoas</option>
                                                <option value="AP">Amapá</option>
                                                <option value="AM">Amazonas</option>
                                                <option value="BA">Bahia</option>
                                                <option value="CE">Ceará</option>
                                                <option value="DF">Distrito Federal</option>
                                                <option value="ES">Espírito Santo</option>
                                                <option value="GO">Goiás</option>
                                                <option value="MA">Maranhão</option>
                                                <option value="MT">Mato Grosso</option>
                                                <option value="MS">Mato Grosso do Sul</option>
                                                <option value="MG">Minas Gerais</option>
                                                <option value="PA">Pará</option>
                                                <option value="PB">Paraíba</option>
                                                <option value="PR">Paraná</option>
                                                <option value="PE">Pernambuco</option>
                                                <option value="PI">Piauí</option>
                                                <option value="RJ">Rio de Janeiro</option>
                                                <option value="RN">Rio Grande do Norte</option>
                                                <option value="RS">Rio Grande do Sul</option>
                                                <option value="RO">Rondônia</option>
                                                <option value="RR">Roraima</option>
                                                <option value="SC">Santa Catarina</option>
                                                <option value="SP">São Paulo</option>
                                                <option value="SE">Sergipe</option>
                                                <option value="TO">Tocantins</option>
                                            </select>
                                        </div>
                                        <!-- cep  -->
                                        <div class="form-group">
                                            <label for="cepFornAdd"><b>CEP</b> do fornecedor:</label>
                                            <input type="text" class="form-control" id="cepFornAdd">
                                        </div>
                                        <!-- email  -->
                                        <div class="form-group">
                                            <label for="emailFornAdd"><b>E-mail</b> do fornecedor:</label>
                                            <input type="email" class="form-control" id="emailFornAdd">
                                        </div>

                                        <!-- fim do form -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" id="btnFornAdd">Adicionar</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- modal Editar -->
                        <div class="modal fade" id="modalEditarForn" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title text-white" id="exampleModalLabel"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <span id="alertaModalEditarForn"></span>
                                        <!-- form -->
                                        <!-- id  -->
                                        <div class="form-group">
                                            <label for="idFornEditar"><b>Id</b> do fornecedor:</label>
                                            <input type="text" class="form-control" id="idFornEditar" disabled>
                                        </div>
                                        <!-- razão social  -->
                                        <div class="form-group">
                                            <label for="razaoSocialFornEditar"><b>Razão social</b> do
                                                fornecedor:</label>
                                            <input type="text" class="form-control" id="razaoSocialFornEditar">
                                        </div>
                                        <!-- nome  -->
                                        <div class="form-group">
                                            <label for="nomeFornEditar"><b>Nome</b> do fornecedor:</label>
                                            <input type="text" class="form-control" id="nomeFornEditar">
                                        </div>
                                        <!-- cnpj  -->
                                        <div class="form-group">
                                            <label for="cnpjFornEditar"><b>CNPJ</b> do fornecedor:</label>
                                            <input type="text" class="form-control" id="cnpjFornEditar">
                                        </div>
                                        <!-- tel  -->
                                        <div class="form-group">
                                            <label for="telFornEditar"><b>Telefone</b> do fornecedor:</label>
                                            <input type="text" class="form-control" id="telFornEditar">
                                        </div>
                                        <!-- cel  -->
                                        <div class="form-group">
                                            <label for="celFornEditar"><b>Celular</b> do fornecedor:</label>
                                            <input type="text" class="form-control" id="celFornEditar">
                                        </div>
                                        <!-- end  -->
                                        <div class="form-group">
                                            <label for="endFornEditar"><b>Endereço</b> do fornecedor:</label>
                                            <input type="text" class="form-control" id="endFornEditar">
                                        </div>
                                        <!-- cid  -->
                                        <div class="form-group">
                                            <label for="cidFornEditar"><b>Cidade</b> do fornecedor:</label>
                                            <input type="text" class="form-control" id="cidFornEditar">
                                        </div>
                                        <!-- estado  -->
                                        <div class="form-group">
                                            <label for="estadoFornEditar"><b>Estado</b> do fornecedor:</label>
                                            <select class="form-control" id="estadoFornEditar">
                                                <option value="AC">Acre</option>
                                                <option value="AL">Alagoas</option>
                                                <option value="AP">Amapá</option>
                                                <option value="AM">Amazonas</option>
                                                <option value="BA">Bahia</option>
                                                <option value="CE">Ceará</option>
                                                <option value="DF">Distrito Federal</option>
                                                <option value="ES">Espírito Santo</option>
                                                <option value="GO">Goiás</option>
                                                <option value="MA">Maranhão</option>
                                                <option value="MT">Mato Grosso</option>
                                                <option value="MS">Mato Grosso do Sul</option>
                                                <option value="MG">Minas Gerais</option>
                                                <option value="PA">Pará</option>
                                                <option value="PB">Paraíba</option>
                                                <option value="PR">Paraná</option>
                                                <option value="PE">Pernambuco</option>
                                                <option value="PI">Piauí</option>
                                                <option value="RJ">Rio de Janeiro</option>
                                                <option value="RN">Rio Grande do Norte</option>
                                                <option value="RS">Rio Grande do Sul</option>
                                                <option value="RO">Rondônia</option>
                                                <option value="RR">Roraima</option>
                                                <option value="SC">Santa Catarina</option>
                                                <option value="SP">São Paulo</option>
                                                <option value="SE">Sergipe</option>
                                                <option value="TO">Tocantins</option>
                                            </select>
                                        </div>
                                        <!-- cep  -->
                                        <div class="form-group">
                                            <label for="cepFornEditar"><b>CEP</b> do fornecedor:</label>
                                            <input type="text" class="form-control" id="cepFornEditar">
                                        </div>
                                        <!-- email  -->
                                        <div class="form-group">
                                            <label for="emailFornEditar"><b>E-mail</b> do fornecedor:</label>
                                            <input type="email" class="form-control" id="emailFornEditar">
                                        </div>
                                        <!-- fim do form -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning text-white"
                                            id="btnFornEditar">Editar</button>
                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--fim do modal editar -->
                    </div>
                </div>
            </div>
        </main>
    </div>



    <!-- Scripts (jQuery não pode ser o slim que vem do Boostrap) -->
    <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="../bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- logicas js -->
    <script type="text/javascript" src="js/jqueryMaskMin.js"></script>
    <script type="text/javascript" src=js/jquery.inputmask.js></script>
    <script type="text/javascript" src="js/logica.js"></script>
    <script type="text/javascript" src="js/logicaCliente.js"></script>
    <script type="text/javascript" src="js/logicaCat.js"></script>
    <script type="text/javascript" src="js/logicaForn.js"></script>
    <script type="text/javascript" src="js/logicaProd.js"></script>
    <script type="text/javascript" src="js/logicaVenda.js"></script>


</body>

</html>