$(document).ready(function () {

    $("#procuraTipoCliente").keyup(function () {

        var pesquisaCliente = $(this).val();
        var tipoSelectCliente = $("#tipoSelectCliente option:selected").val();

        // verificar se algo foi digitado
        if (pesquisaCliente != '') {
            var dados = {
                palavra: pesquisaCliente,
                chaveSelect: tipoSelectCliente
            }
            $.post("php/cliente/listarCliente.php", dados, function (retorna) {
                //Subtitui o valor no seletor id="conteudo"
                $("#listagemCliente-area").html(retorna);
            });
        } else {
            $("#listagemCliente-area").html("<div class='alert alert-danger' role='alert'>Precisa preencher com algo ou clicar novamente em cliente para ver todos novamente</div>");
        }
    });


    $("#btn-cliente").click(function () {
        mostraCliente();
    });

});


function mostraCliente() {

    $('#inicio-area').hide();
    $('#prod-area').hide();
    $('#venda-area').hide();
    $('#compra-area').hide();
    $('#categoria-area').hide();
    $('#fornecedor-area').hide();
    $('#cliente-area').show();
    listarCliente();
    aplicaMaskCliente();


}


function listarCliente() {

    $.post("php/cliente/listarCliente.php", function (retorna) {
        //Subtitui o valor no seletor id="conteudo"
        $("#listagemCliente-area").html(retorna);
    });
}

// chamar função de adicionar cliente
$("#btnClienteAdd").click(function () {
    addCliente();
});

$("#btnClienteEditar").click(function () {
    editarCliente();
});

// função para adicionar cliente ao BD
function addCliente() {

    const nomeCliente = $('#nomeClienteAdd').val();
    const emailCliente = $('#emailClienteAdd').val();
    const cpfCliente = $('#cpfClienteAdd').val();
    const instagramCliente = $('#instagramClienteAdd').val();
    const celCliente = $('#celClienteAdd').val();
    const cepCliente = $('#cepClienteAdd').val();
    const estadoCliente = $('#estadoClienteAdd').val();
    const cidCliente = $('#cidClienteAdd').val();
    const endCliente = $('#endClienteAdd').val();
    const sexoCliente = $('#sexoClienteAdd').val();
    const nascCliente = $('#nascClienteAdd').val();

    $.ajax({
        url: 'php/cliente/addCliente.php',
        type: 'post',
        datatype: 'ajax',
        data: {
            'nomeCliente': nomeCliente,
            'emailCliente': emailCliente,
            'cpfCliente': cpfCliente,
            'instagramCliente': instagramCliente,
            'celCliente': celCliente,
            'cepCliente': cepCliente,
            'estadoCliente': estadoCliente,
            'cidCliente': cidCliente,
            'endCliente': endCliente,
            'sexoCliente': sexoCliente,
            'nascCliente': nascCliente,
        },
        success: function (data) {
            // aviso que gravou
            $('#alertaCliente').html(data);
            // recarrega a tabela com o dado novo inserido
            listarCliente();
            // fecha a janela modal após o insert
            $('#modalAdicionarCliente').modal('hide');
            // limpa campos do modal Add de versão
            $('#nomeClienteAdd').val('');
            $('#emailClienteAdd').val('');
            $('#cpfClienteAdd').val('');
            $('#instagramClienteAdd').val('');
            $('#celClienteAdd').val('');
            $('#cepClienteAdd').val('');
            $('#estadoClienteAdd').val('');
            $('#cidClienteAdd').val('');
            $('#endClienteAdd').val('');
            $('#sexoClienteAdd').val('');
            $('#nascClienteAdd').val('');
            //remover o aviso de cadastrado com sucesso
            setTimeout(function () {
                $("#alertaCliente").html('');
            }, 5000); //mensagem vai ficar por 5s
        },
        error: function () {
            // fecha a janela modal após o insert
            $('#modalAdicionarCliente').modal('hide');
            $('#alertaCliente').html('<div class="alert alert-danger" role="alert"><p>Erro no sistema ao inserir o Cliente</p></div>');
            setTimeout(function () {
                $("#alertaCliente").html('');
            }, 5000); //mensagem vai ficar por 5s
        }
    }); //fim do ajax para fazer o add da versão  ao bd 
} //fim da função 

// função para editar versão do BD
function editarCliente() {

    const idCliente = $('#idClienteEditar').val();
    const nomeCliente = $('#nomeClienteEditar').val();
    const emailCliente = $('#emailClienteEditar').val();
    const cpfCliente = $('#cpfClienteEditar').val();
    const instagramCliente = $('#instagramClienteEditar').val();
    const celCliente = $('#celClienteEditar').val();
    const cepCliente = $('#cepClienteEditar').val();
    const estadoCliente = $('#estadoClienteEditar').val();
    const cidCliente = $('#cidClienteEditar').val();
    const endCliente = $('#endClienteEditar').val();
    const sexoCliente = $('#sexoClienteEditar').val();
    const nascCliente = $('#nascClienteEditar').val();

    if (idCliente == "") {
        $('#alertaModalEditarCliente').html('<div class="alert alert-danger" role="alert"><p> Precisa preencher com o <strong>numero o IdCliente</strong></p></div>');
    } else {
        $.ajax({
            url: 'php/cliente/editarCliente.php',
            type: 'post',
            datatype: 'ajax',
            data: {
                'idCliente': idCliente,
                'nomeCliente': nomeCliente,
                'emailCliente': emailCliente,
                'cpfCliente': cpfCliente,
                'instagramCliente': instagramCliente,
                'celCliente': celCliente,
                'cepCliente': cepCliente,
                'estadoCliente': estadoCliente,
                'cidCliente': cidCliente,
                'endCliente': endCliente,
                'sexoCliente': sexoCliente,
                'nascCliente': nascCliente,
            },
            success: function (data) {
                // aviso que alterou
                $('#alertaCliente').html(data);
                // recarrega a tabela 
                listarCliente();
                
                $('#modalEditarCliente').modal('hide');
                //remover o aviso 
                setTimeout(function () {
                    $("#alertaCliente").html('');
                }, 5000); //mensagem vai ficar por 5s
            },
            error: function () {
                // fecha a janela modal 
                $('#modalEditarCliente').modal('hide');
                $('#alertaCliente').html('<div class="alert alert-danger" role="alert"><p>Erro no sistema ao editar a versão</p></div>');
                setTimeout(function () {
                    $("#alertaCliente").html('');
                }, 5000); //mensagem vai ficar por 5s
            }
        }); //fim do ajax 
    } //fim do else
} //fim da função

//função para atribuir os devidos valores da tabela aos inputs no modal editar
$('#modalEditarCliente').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var idCliente = button.data('whateveridclienteeditar');
    var nomeCliente = button.data('whatevernomeclienteeditar');
    var emailCliente = button.data('whateveremailclienteeditar');
    var cpfCliente = button.data('whatevercpfclienteeditar');
    var instagramCliente = button.data('whateverinstagramclienteeditar');
    var celCliente = button.data('whatevercelclienteeditar');
    var cepCliente = button.data('whatevercepclienteeditar');
    var estadoCliente = button.data('whateverestadoclienteeditar');
    var cidCliente = button.data('whatevercidclienteeditar');
    var endCliente = button.data('whateverendclienteeditar');
    var sexoCliente = button.data('whateversexoclienteeditar');
    var nascCliente = button.data('whatevernascclienteeditar');
    var modal = $(this);
    modal.find('.modal-title').text('Editar o cliente: ' + nomeCliente);
    modal.find('#idClienteEditar').val(idCliente);
    modal.find('#nomeClienteEditar').val(nomeCliente);
    modal.find('#emailClienteEditar').val(emailCliente);
    modal.find('#cpfClienteEditar').val(cpfCliente);
    modal.find('#instagramClienteEditar').val(instagramCliente);
    modal.find('#celClienteEditar').val(celCliente);
    modal.find('#cepClienteEditar').val(cepCliente);
    modal.find('#estadoClienteEditar').val(estadoCliente);
    modal.find('#cidClienteEditar').val(cidCliente);
    modal.find('#endClienteEditar').val(endCliente);
    modal.find('#sexoClienteEditar').val(sexoCliente);
    modal.find('#nascClienteEditar').val(nascCliente);
});

// mask

function aplicaMaskCliente() {

    // modal adicionar
    $('#cpfClienteAdd').mask('000.000.000-00');
    $('#celClienteAdd').mask('(00)00000-0000');
    $('#cepClienteAdd').mask('00000-000');

    // modal editar
    $('#cpfClienteEditar').mask('000.000.000-00');
    $('#celClienteEditar').mask('(00)00000-0000');
    $('#cepClienteEditar').mask('00000-000');

}

$("#tipoSelectCliente").change(function () {
    addMaskToInputCliente();
});

// mask de acordo com o input
function addMaskToInputCliente() {
    var $select = $('#tipoSelectCliente option:selected').val();
    var $inputProcura = $('#procuraTipoCliente');

    if ($select == "cpfCliente") {
        $inputProcura.mask('000.000.000-00'); //, {reverse: true}
    } else if ($select == "celCliente") {
        $inputProcura.mask('(00)00000-0000');
    } else if ($select == "cepCliente") {
        $inputProcura.mask('00000-000');
    } else if ($select == "nascCliente") {
        $inputProcura.mask('0000-00-00');
    } else {
        $inputProcura.unmask();
    }
}


