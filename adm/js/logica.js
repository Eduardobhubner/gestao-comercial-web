$(document).ready(function () {

    $("#login-area").hide();
    $("#main-area").show();
    mostraInicio();

    $("#btn-inicio").click(function () {
        mostraInicio();
    });

});

function mostraInicio() {

    $('#prod-area').hide();
    $('#venda-area').hide();
    $('#compra-area').hide();
    $('#categoria-area').hide();
    $('#cliente-area').hide();
    $('#fornecedor-area').hide();
    $('#inicio-area').show();

}


