$(document).ready(function () {

    $("#procuraTipoForn").keyup(function () {
        var pesquisaForn = $(this).val();
        var tipoSelectForn = $("#tipoSelectForn option:selected").val();
        // verificar se algo foi digitado
        if (pesquisaForn != '') {
            var dados = {
                palavra: pesquisaForn,
                chaveSelect: tipoSelectForn
            }
            $.post("php/fornecedor/listarForn.php", dados, function (retorna) {
                //Subtitui o valor no seletor id="conteudo"
                $("#listagemForn-area").html(retorna);
            });
        } else {
            $("#listagemForn-area").html("<div class='alert alert-danger' role='alert'>Precisa preencher com algo ou clicar novamente em fornecedor para ver todos novamente</div>");
        }
    });

    $("#btn-fornecedor").click(function () {
        mostraForn();
    });

});


function mostraForn() {

    $('#inicio-area').hide();
    $('#prod-area').hide();
    $('#venda-area').hide();
    $('#compra-area').hide();
    $('#cliente-area').hide();
    $('#categoria-area').hide();
    $('#fornecedor-area').show();
    listarForn();
    aplicaMaskForn();

}


function listarForn() {

    $.post("php/fornecedor/listarForn.php", function (retorna) {
        //Subtitui o valor no seletor id="conteudo"
        $("#listagemForn-area").html(retorna);
    });
}

// chamar função de adicionar Forn
$("#btnFornAdd").click(function () {
    addForn();
});

$("#btnFornEditar").click(function () {
    editarForn();

});

// função para adicionar Forn ao BD
function addForn() {

    const razaoSocialFornAdd = $('#razaoSocialFornAdd').val();
    const nomeFornAdd = $('#nomeFornAdd').val();
    const cnpjFornAdd = $('#cnpjFornAdd').val();
    const telFornAdd = $('#telFornAdd').val();
    const celFornAdd = $('#celFornAdd').val();
    const endFornAdd = $('#endFornAdd').val();
    const cidFornAdd = $('#cidFornAdd').val();
    const estadoFornAdd = $('#estadoFornAdd').val();
    const cepFornAdd = $('#cepFornAdd').val();
    const emailFornAdd = $('#emailFornAdd').val();

    $.ajax({
        url: 'php/fornecedor/addForn.php',
        type: 'post',
        datatype: 'ajax',
        data: {
            'razaoSocialFornAdd': razaoSocialFornAdd,
            'nomeFornAdd': nomeFornAdd,
            'cnpjFornAdd': cnpjFornAdd,
            'telFornAdd': telFornAdd,
            'celFornAdd': celFornAdd,
            'endFornAdd': endFornAdd,
            'cidFornAdd': cidFornAdd,
            'estadoFornAdd': estadoFornAdd,
            'cepFornAdd': cepFornAdd,
            'emailFornAdd': emailFornAdd,
        },
        success: function (data) {
                // avisa que gravou 
                $('#alertaForn').html(data);
                // recarrega a tabela 
                listarForn();
                // fecha a janela modal 
                $('#modalAdicionarForn').modal('hide');
                // limpa campos 
                $('#razaoSocialFornAdd').val("");
                $('#nomeFornAdd').val("");
                $('#cnpjFornAdd').val("");
                $('#telFornAdd').val("");
                $('#celFornAdd').val("");
                $('#endFornAdd').val("")
                $('#cidFornAdd').val("");
                $('#estadoFornAdd').val("");
                $('#cepFornAdd').val("");
                $('#emailFornAdd').val("");
                //remover o aviso 
                setTimeout(function () {
                    $("#alertaForn").html('');
                }, 5000); //mensagem vai ficar por 5s
        },
        error: function () {
            // fecha a janela modal após o insert
            $('#modalAdicionarForn').modal('hide');
            $('#alertaForn').html('<div class="alert alert-danger" role="alert"><p>Erro no sistema ao inserir o fornecedor</p></div>');
            setTimeout(function () {
                $("#alertaForn").html('');
            }, 5000); //mensagem vai ficar por 5s
        }
    }); //fim do ajax
} //fim da função 

// função para editar versão do BD
function editarForn() {

    const idFornEditar = $('#idFornEditar').val();
    const razaoSocialFornEditar = $('#razaoSocialFornEditar').val();
    const nomeFornEditar = $('#nomeFornEditar').val();
    const cnpjFornEditar = $('#cnpjFornEditar').val();
    const telFornEditar = $('#telFornEditar').val();
    const celFornEditar = $('#celFornEditar').val();
    const endFornEditar = $('#endFornEditar').val();
    const cidFornEditar = $('#cidFornEditar').val();
    const estadoFornEditar = $('#estadoFornEditar').val();
    const cepFornEditar = $('#cepFornEditar').val();
    const emailFornEditar = $('#emailFornEditar').val();

    if (idForn == "") {
        $('#alertaModalEditarForn').html('<div class="alert alert-danger" role="alert"><p> Precisa preencher com o <strong>numero do id do fornecedor :)</strong></p></div>');
    } else {
        $.ajax({
            url: 'php/fornecedor/editarForn.php',
            type: 'post',
            datatype: 'ajax',
            data: {
                'idFornEditar': idFornEditar,
                'razaoSocialFornEditar': razaoSocialFornEditar,
                'nomeFornEditar': nomeFornEditar,
                'cnpjFornEditar': cnpjFornEditar,
                'telFornEditar': telFornEditar,
                'celFornEditar': celFornEditar,
                'endFornEditar': endFornEditar,
                'cidFornEditar': cidFornEditar,
                'estadoFornEditar': estadoFornEditar,
                'cepFornEditar': cepFornEditar,
                'emailFornEditar': emailFornEditar,
            },
            success: function (data) {
               
                    // avisa que gravou 
                    $('#alertaForn').html(data);
                    // recarrega a tabela 
                    listarForn();
                    // fecha a janela 
                    $('#modalEditarForn').modal('hide');
                    //remover o aviso
                    setTimeout(function () {
                        $("#alertaForn").html('');
                    }, 5000); //mensagem vai ficar por 5s
            },
            error: function () {
                $('#modalEditarForn').modal('hide');
                $('#alertaForn').html('<div class="alert alert-danger" role="alert"><p>Erro no sistema ao editar o fornecedor</p></div>');
                setTimeout(function () {
                    $("#alertaForn").html('');
                }, 5000); //mensagem vai ficar por 5s
            }
        }); //fim do ajax 
    } //fim do else
} //fim da função

//função para atribuir os devidos valores da tabela aos inputs no modal editar
$('#modalEditarForn').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var idForn = button.data('whateveridcateditar');
    var razaoSocialForn = button.data('whateverrazaosocialforneditar');
    var nomeForn = button.data('whatevernomeforneditar');
    var cnpjForn = button.data('whatevercnpjforneditar');
    var telForn = button.data('whatevertelforneditar');
    var celForn = button.data('whatevercelforneditar');
    var endForn = button.data('whateverendforneditar');
    var cidForn = button.data('whatevercidforneditar');
    var estadoForn = button.data('whateverestadoforneditar');
    var cepForn = button.data('whatevercepforneditar');
    var emailForn = button.data('whateveremailforneditar');

    var modal = $(this);
    modal.find('.modal-title').text('Editar o fornecedor: ' + nomeForn);
    modal.find('#idFornEditar').val(idForn);
    modal.find('#razaoSocialFornEditar').val(razaoSocialForn);
    modal.find('#nomeFornEditar').val(nomeForn);
    modal.find('#cnpjFornEditar').val(cnpjForn);
    modal.find('#telFornEditar').val(telForn);
    modal.find('#celFornEditarv').val(celForn);
    modal.find('#endFornEditar').val(endForn);
    modal.find('#cidFornEditar').val(cidForn);
    modal.find('#estadoFornEditar').val(estadoForn);
    modal.find('#cepFornEditar').val(cepForn);
    modal.find('#emailFornEditar').val(emailForn);

});

// mask

function aplicaMaskForn() {

    // modal adicionar
    $('#cnpjFornAdd').mask('00.000.000/0000-00');
    $('#telFornAdd').mask('(00)0000-0000');
    $('#celFornAdd').mask('(00)00000-0000');
    $('#cepFornAdd').mask('00000-000');

    // modal editar
    $('#cnpjFornEditar').mask('00.000.000/0000-00');
    $('#telFornEditar').mask('(00)0000-0000');
    $('#celFornEditar').mask('(00)00000-0000');
    $('#cepFornEditar').mask('00000-000');

}

$("#tipoSelectForn").change(function () {
    addMaskToInputForn();
});

function addMaskToInputForn() {
    var $select = $('#tipoSelectForn option:selected').val();
    var $inputProcura = $('#procuraTipoForn');

    if ($select == "cnpjForn") {
        $inputProcura.mask('00.000.000/0000-00'); //, {reverse: true}
    } else if ($select == "telForn") {
        $inputProcura.mask('(00)0000-0000');
    } else if ($select == "celForn") {
        $inputProcura.mask('(00)00000-0000');
    } else if ($select == "cepForn") {
        $inputProcura.mask('00000-000');
    } else {
        $inputProcura.unmask();
    }
}


