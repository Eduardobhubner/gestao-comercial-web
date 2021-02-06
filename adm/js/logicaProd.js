$(document).ready(function () {

    $("#btn-prod").click(function () {
        mostraProd();
    });

    $("#procuraTipoProd").keyup(function () {

        var pesquisaProd = $(this).val();
        var tipoSelectProd = $("#tipoSelectProd option:selected").val();

        // verificar se algo foi digitado
        if (pesquisaProd != '') {
            var dados = {
                palavra: pesquisaProd,
                chaveSelect: tipoSelectProd
            }
            $.post("php/produto/listarProd.php", dados, function (retorna) {
                //Subtitui o valor no seletor id="conteudo"
                $("#listagemProd-area").html(retorna);
            });
        } else {
            $("#listagemProd-area").html("<div class='alert alert-danger' role='alert'>Precisa preencher com algo ou clicar novamente em Produto para ver todos novamente</div>");
        }
    });


});

function mostraProd() {

    $('#inicio-area').hide();
    $('#venda-area').hide();
    $('#compra-area').hide();
    $('#categoria-area').hide();
    $('#fornecedor-area').hide();
    $('#cliente-area').hide();
    $('#prod-area').show();
    listarProd();
    aplicaMaskProd();

}

// lista produto
function listarProd() {

    $.post("php/produto/listarProd.php", function (retorna) {
        //Subtitui o valor no seletor id="conteudo"
        $("#listagemProd-area").html(retorna);
    });

}

// função para adicionar Produto ao BD
$('#form-add-prod').submit(function (e) {

    // não recarrega a pagina
    e.preventDefault();

    // cria obj para trabalhar com imagens
    var form_data = new FormData();

    // aprega valores a chaves do obj
    form_data.append('nomeProd', $('#nomeProdAdd').val());
    form_data.append('codBarraProd', $('#codBarraProdAdd').val());
    form_data.append('codNumProd', $('#codNumProdAdd').val());
    form_data.append('descriProd', $('#descriProdAdd').val());
    form_data.append('estoqueProd', $('#estoqueProdAdd').val());
    form_data.append('valorCompraProd', $('#valorCompraProdAdd').val());
    form_data.append('imgProd', $('#imgProdAdd')[0].files[0]);
    form_data.append('unidMedProd', $('#unidMedProdAdd').val());
    form_data.append('marcaProd', $('#marcaProdAdd').val());
    form_data.append('tipoCatProd', $('#tipoCatProdAdd').val());

    $.ajax({
        url: 'php/produto/addProd.php',
        type: 'POST',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            // avisa que gravou a nova versão
            $('#alertaProd').append(data);
            // fecha a janela modal após o insert
            $('#modalAdicionarProd').modal('hide');
            // limpa campos do modal Add de versão
            $('#nomeProdAdd').val('');
            $('#codBarraProdAdd').val('');
            $('#codNumProdAdd').val('');
            $('#descriProdAdd').val('');
            $('#estoqueProdAdd').val('');
            $('#valorCompraProdAdd').val('');
            $('#imgProdAddAdd').val('');
            $('#unidMedProdAdd').val('');
            $('#marcaProdAdd').val('');
            $('#catProdAdd').val('');
            // recarrega a tabela com o dado novo inserido
            listarProd();
            //remover o aviso de cadastrado com sucesso
            setTimeout(function () {
                $("#alertaProd").html('');
            }, 5000); //mensagem vai ficar por 5s
        },
        error: function () {
            // fecha a janela modal após o insert
            $('#modalAdicionarProd').modal('hide');
            $('#alertaProd').html('<div class="alert alert-danger" role="alert"><p>Erro no sistema ao inserir o Produto</p></div>');
            setTimeout(function () {
                $("#alertaProd").html('');
            }, 5000); //mensagem vai ficar por 5s
        }
    });
});

// função para editar no BD
$('#form-editar-prod').submit(function (e) {

    // não recarrega a pagina
    e.preventDefault();

    // cria obj para trabalhar com imagens
    var form_data = new FormData();
    // aprega valores a chaves do obj
    form_data.append('idProd', $('#idProdEditar').val());
    form_data.append('nomeProd', $('#nomeProdEditar').val());
    form_data.append('codBarraProd', $('#codBarraProdEditar').val());
    form_data.append('codNumProd', $('#codNumProdEditar').val());
    form_data.append('descriProd', $('#descriProdEditar').val());
    form_data.append('estoqueProd', $('#estoqueProdEditar').val());
    form_data.append('valorCompraProd', $('#valorCompraProdEditar').val());
    // form_data.append('imgProd', $('#imgProdEditar')[0].files[0]);
    form_data.append('unidMedProd', $('#unidMedProdEditar').val());
    form_data.append('marcaProd', $('#marcaProdEditar').val());
    form_data.append('tipoCatProd', $('#tipoCatProdEditar').val());

    $.ajax({
        url: 'php/produto/editarProd.php',
        type: 'POST',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            // avisa que gravou a nova versão
            $('#alertaProd').append(data);
            // fecha a janela modal após o insert
            $('#modalAdicionarProd').modal('hide');
            // recarrega a tabela com o dado novo inserido
            listarProd();
            //remover o aviso de cadastrado com sucesso
            setTimeout(function () {
                $("#alertaProd").html('');
            }, 5000); //mensagem vai ficar por 5s
        },
        error: function () {
            // fecha a janela modal após o insert
            $('#modalAdicionarProd').modal('hide');
            $('#alertaProd').html('<div class="alert alert-danger" role="alert"><p>Erro no sistema ao inserir o Produto</p></div>');
            setTimeout(function () {
                $("#alertaProd").html('');
            }, 5000); //mensagem vai ficar por 5s
        }
    });
});

//função para atribuir os devidos valores da tabela aos inputs no modal editar
$('#modalEditarProd').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var idProd = button.data('whateveridprodeditar');
    var nomeProd = button.data('whatevernomeprodeditar');
    var codBarraProd = button.data('whatevercodbarraprodeditar');
    var codNumProd = button.data('whatevercodnumprodeditar');
    var descriProd = button.data('whateverdescriprodeditar');
    var estoqueProd = button.data('whateverestoqueprodeditar');
    var valorCompraProd = button.data('whatevervalorcompraprodeditar');
    var imgProd = button.data('whatevereimgprodeditar');
    var unidMedProd = button.data('whateverunidmedprodeditar');
    var marcaProd = button.data('whatevermarcaprodeditar');
    var tipoCatProd = button.data('whateveridcatprodeditar');
    var modal = $(this);
    modal.find('.modal-title').text('Editar o produto: ' + nomeProd);
    modal.find('#idProdEditar').val(idProd);
    modal.find('#nomeProdEditar').val(nomeProd);
    modal.find('#codBarraProdEditar').val(codBarraProd);
    modal.find('#codNumProdEditar').val(codNumProd);
    modal.find('#descriProdEditar').val(descriProd);
    modal.find('#estoqueProdEditar').val(estoqueProd);
    modal.find('#valorCompraProdEditar').val(valorCompraProd);
    modal.find('#imgAtualProdEditar').val(imgProd);
    modal.find('#unidMedProdEditar').val(unidMedProd);
    modal.find('#marcaProdEditar').val(marcaProd);
    modal.find('#tipoCatProdEditar').val(tipoCatProd);
});

// mask
function aplicaMaskProd() {

    // add
    $("#valorCompraProdAdd").inputmask('currency', {
        "autoUnmask": true,
        radixPoint: ".",
        groupSeparator: ".",
        allowMinus: false,
        prefix: 'R$ ',
        digits: 2,
        digitsOptional: false,
        rightAlign: false,
        unmaskAsNumber: true
    });

    // editar
    $("#valorCompraProdEditar").inputmask('currency', {
        "autoUnmask": true,
        radixPoint: ".",
        groupSeparator: ".",
        allowMinus: false,
        prefix: 'R$ ',
        digits: 2,
        digitsOptional: false,
        rightAlign: false,
        unmaskAsNumber: true
    });
}

$("#tipoSelectProd").change(function () {
    var $select = $('#tipoSelectProd option:selected').val();
    var $inputProcura = $('#procuraTipoProd');

    if ($select == "valorCompraProd") {

        $("#procuraTipoProd").inputmask('currency', {
            "autoUnmask": true,
            radixPoint: ".",
            groupSeparator: ".",
            allowMinus: false,
            prefix: 'R$ ',
            digits: 2,
            digitsOptional: false,
            rightAlign: false,
            unmaskAsNumber: true
        });

    } else {
        $inputProcura.inputmask('remove');
    }
});












