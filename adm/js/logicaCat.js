$(document).ready(function () {

    $("#procuraTipoCat").keyup(function () {

        var pesquisaCat = $(this).val();
        var tipoSelectCat = $("#tipoSelectCat option:selected").val();

        // verificar se algo foi digitado
        if (pesquisaCat != '') {

            var dados = {

                palavra: pesquisaCat,
                chaveSelect: tipoSelectCat
            }

            $.post("php/categoria/listarCat.php", dados, function (retorna) {
                //Subtitui o valor no seletor id="conteudo"
                $("#listagemCat-area").html(retorna);
            });

        } else {
            $("#listagemCat-area").html("<div class='alert alert-danger' role='alert'>Precisa preencher com algo ou clicar novamente em categoria para ver todos novamente</div>");
        }

    });

    $("#btn-categoria").click(function () {
        mostraCat();
    });
});


function mostraCat() {

    $('#inicio-area').hide();
    $('#prod-area').hide();
    $('#venda-area').hide();
    $('#compra-area').hide();
    $('#cliente-area').hide();
    $('#fornecedor-area').hide();
    $('#categoria-area').show();
    listarCat();

}

function listarCat() {

    $.post("php/categoria/listarCat.php", function (retorna) {
        //Subtitui o valor no seletor id="conteudo"
        $("#listagemCat-area").html(retorna);
    });
}

// chamar função de adicionar Cat
$("#btnCatAdd").click(function () {
    addCat();
});

$("#btnCatEditar").click(function () {
    editarCat();
});

// função para adicionar Cat ao BD
function addCat() {

    const nomeCat = $('#nomeCatAdd').val();
    const obsCat = $('#obsCatAdd').val();

    $.ajax({
        url: 'php/categoria/addCat.php',
        type: 'post',
        datatype: 'ajax',
        data: {
            'nomeCat': nomeCat,
            'obsCat': obsCat,
        },
        success: function (data) {
            // aviso que gravou
            $('#alertaCat').html(data);
            // recarrega a tabela com o dado novo inserido
            listarCat();
            // fecha a janela modal após o insert
            $('#modalAdicionarCat').modal('hide');
            // limpa campos
            $('#nomeCatAdd').val('');
            $('#obsCatAdd').val('');
            //remover o aviso de cadastrado com sucesso
            setTimeout(function () {
                $("#alertaCat").html('');
            }, 5000); //mensagem vai ficar por 5s

        },
        error: function () {
            // fecha a janela modal após o insert
            $('#modalAdicionarCat').modal('hide');
            $('#alertaCat').html('<div class="alert alert-danger" role="alert"><p>Erro no sistema ao inserir a categoria</p></div>');
            setTimeout(function () {
                $("#alertaCat").html('');
            }, 5000); //mensagem vai ficar por 5s
        }
    }); //fim do ajax 
} //fim da função 

// função para editar versão do BD
function editarCat() {

    const idCat = $('#idCatEditar').val();
    const nomeCat = $('#nomeCatEditar').val();
    const obsCat = $('#obsCatEditar').val();

    if (idCat == "") {
        $('#alertaModalEditarCat').html('<div class="alert alert-danger" role="alert"><p> Precisa preencher com o <strong>numero o IdCat</strong></p></div>');
    } else {
        $.ajax({
            url: 'php/categoria/editarCat.php',
            type: 'post',
            datatype: 'ajax',
            data: {
                'idCat': idCat,
                'nomeCat': nomeCat,
                'obsCat': obsCat,
            },
            success: function (data) {
                // avisa que gravou a nova versão
                $('#alertaCat').html(data);
                // recarrega a tabela com o dado novo inserido
                listarCat();
                // fecha a janela modal após o update
                $('#modalEditarCat').modal('hide');
                //remover o aviso de edição com sucesso
                setTimeout(function () {
                    $("#alertaCat").html('');
                }, 5000); //mensagem vai ficar por 5sv
            },
            error: function () {
                $('#modalEditarCat').modal('hide');
                $('#alertaCat').html('<div class="alert alert-danger" role="alert"><p>Erro no sistema ao editar a versão</p></div>');
                setTimeout(function () {
                    $("#alertaCat").html('');
                }, 5000); //mensagem vai ficar por 5s
            }
        }); //fim do ajax 
    } //fim do else
} //fim da função

//função para atribuir os devidos valores da tabela aos inputs no modal editar
$('#modalEditarCat').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var idCat = button.data('whateveridcateditar');
    var nomeCat = button.data('whatevernomecateditar');
    var obsCat = button.data('whateverobscateditar');
    var modal = $(this);
    modal.find('.modal-title').text('Editar a categoria: ' + nomeCat);
    modal.find('#idCatEditar').val(idCat);
    modal.find('#nomeCatEditar').val(nomeCat);
    modal.find('#obsCatEditar').val(obsCat);
});



