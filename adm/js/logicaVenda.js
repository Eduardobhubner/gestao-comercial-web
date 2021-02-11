$(document).ready(function () {

    $('#btn-venda').click(function () {

        $('#inicio-area').hide();
        $('#compra-area').hide();
        $('#categoria-area').hide();
        $('#fornecedor-area').hide();
        $('#cliente-area').hide();
        $('#prod-area').hide();
        $('#venda-area').show();

        listaClienteVenda();
        aplicaMaskVenda();
        // listarVenda();

    });

    var count = 1;
    var idSelect = '';
    var idQuant = '';
    var idCustoUnit = '';
    var idTotal = '';
    var idPorcen = '';

    $('#btn-add-prod-venda').click(function () {


        idSelect = "id-select" + count;
        idQuant = "id-quant" + count;
        idCustoUnit = "id-custo" + count;
        idPorcen = "id-porcen" + count;
        idTotal = "id-total" + count;

        // desabilita botão 
        $("#btn-add-prod-venda").attr("disabled", true);

        // aplica novos campos 
        $('#body-table-venda').append('<tr id="tr-table-venda' + count + '"><td scope="row"><select class="form-control select-prod-venda" id="' + idSelect + '" name="select-prod-venda[]"><option selected>...</option></select></td><td><input type="text" class="form-control quant-prod-venda" id="' + idQuant + '" name="quant-prod-venda[]"></td><td><input type="text" class="form-control custoUnit-prod-venda" id="' + idCustoUnit + '" name="custoUnit-prod-venda[]"></td><td><input type="text" class="form-control porcen-prod-venda" id="' + idPorcen + '" name="idPorcen"></td><td><input type="text" class="form-control nTotalVal" id="' + idTotal + '" name="nTotalVal[]" disabled></td><td><button type="button" class="btn btn-danger btn-apagar-prod-venda" id="' + count + '"><i class="fas fa-trash-alt"></i></button></td></tr>');

        // desabilita select
        $('#' + idSelect).attr("disabled", true);
        // receber valores de produtos com suas caracristicas
        $.get("php/venda/preencherSelectVenda.php", function (resultado) {
            // pega os nomes do produto
            for (let i = 0; i < resultado.length; i++) {
                //text, valor, alimenta o novo select com os produtos
                var resultOption = new Option(resultado[i][1], resultado[i][0]);
                $('#' + idSelect).append(resultOption);
            }

            // abilita botão e select
            $('#' + idSelect).attr("disabled", false);
            $("#btn-add-prod-venda").attr("disabled", false);
            somaValorProdTotal();
            aplicaMaskVenda();
        });
        count++;
    });

    // remover o <th> especifico
    $('#body-table-venda').on('click', '.btn-apagar-prod-venda', function () {
        var button_id = $(this).attr("id");
        $('#tr-table-venda' + button_id).remove();
        somaValorProdTotal();
    });

    $(document.body).on('change', '.select-prod-venda', function () {
        // recebo valor do id do produto
        var idProd = $(this).val();
        // recebe valor do id do select
        var numSelect = $(this).attr("id");
        // remove qualquer string deixando apenas o numero 
        var numClear = numSelect.replace(/\D+/g, "");

        $.ajax({

            url: 'php/venda/preencherInputVenda.php',
            type: 'post',
            datatype: 'json',
            data: {
                'valorSelectVenda': idProd,
            },
            success: function (data) {
                // recebe valor do produto selecionado
                var valorCompraProd = data.valorCompraProd;
                // recebe quantidade em estoque do produto
                var estoqueProd = data.estoqueProd;

                // preenche os inputs 
                $("#id-custo" + numClear).val(valorCompraProd);
                $("#id-quant" + numClear).val(estoqueProd);
                $("#id-porcen" + numClear).val(Number(0));

                //cria o custo total (estoq X valor)
                var CustTotal = estoqueProd * valorCompraProd;

                $("#id-total" + numClear).val(CustTotal);

                somaValorProdTotal();


            },
            error: function () {
                console.log("erro no sistema Venda");
            }


        }); //fim do ajax
    });


    // $(document.body).on('keyup', '.nTotalVal', function () {
    //     somaValorProdTotal();
    // });

    // frete
    $(document.body).on('keyup', '#val-embalagem-venda', function () {
        somaValorProdTotal();
    });

    //embalagem
    $(document.body).on('keyup', '#val-frete-venda', function () {
        somaValorProdTotal();
    });

    // quando mudar a quantidade de itens
    $(document.body).on('keyup', '.quant-prod-venda', function () {

        //recebe valor do id do input
        var numIdInput = $(this).attr("id");
        // remove qualquer string deixando apenas o numero 
        var numClearId = numIdInput.replace(/\D+/g, "");
        // valor escrito quantidade
        var valQuant = $(this).val();
        // valor escrito custoUnit
        var valCustoUnit = $("#id-custo" + numClearId).val();
        // valor escrito em porcentagem
        var valPorcen = $("#id-porcen" + numClearId).val();

        // se for nulo ou  NaN
        if (!isNaN(valPorcen) && (valPorcen != 0)) {
            
            console.log("sendo chamado if");

            console.log("porcen->"+ valPorcen);
            //lucro = (porcen/valor)*100
            var l = (valPorcen * valCustoUnit) / 100;
            console.log("l->"+l);
            //juntar lucro com valor do produto lf=lucroFinal
            var lf = l + valCustoUnit;
            console.log("lf->"+l);
            // valor em relação a quantidade
            var valTotalProd = lf * valQuant;
            console.log("valTotalProd->"+valTotalProd);
        } else {
            // valor total sem lucro
            var valTotalProd = valQuant * valCustoUnit;
            console.log("sendo chamado else");
        }
        // aplica no input total
        $("#id-total" + numClearId).val(valTotalProd);
        somaValorProdTotal();
    });

    // quando mudar o valor do custoUnid
    $(document.body).on('keyup', '.custoUnit-prod-venda', function () {
        //recebe valor do id do input
        var numIdInput = $(this).attr("id");
        // remove qualquer string deixando apenas o numero 
        var numClearId = numIdInput.replace(/\D+/g, "");
        // valor escrito custoUnit 
        var valCustoUnit = $(this).val();
        // valor escrito Quant
        var valQuant = $("#id-quant" + numClearId).val();
        // valor escrito em porcentagem
        var valPorcen = $("#id-porcen" + numClearId).val();

        // se for nulo ou  NaN
        if (isNaN(valPorcen) || (valPorcen = "")) {
            // valor total sem lucro
            var valTotalProd = valQuant * valCustoUnit;
        } else {
            //lucro = (porcen/valor)*100
            var l = ((valPorcen / valCustoUnit) * 100);
            //juntar lucro com valor do produto lf=lucroFinal
            var lf = l + valCustoUnit;
            // valor em relação a quantidade
            var valTotalProd = lf * valQuant;
        }

        // aplica no input total
        $("#id-total" + numClearId).val(valTotalProd);
        somaValorProdTotal();
    });


    function somaValorProdTotal() {

        var total = 0;
        // reler todos os valores dos inputs de valores totais
        $('.nTotalVal').each(function () {
            var valor = Number($(this).val());
            if (!isNaN(valor)) total += valor;
        });

        $("#inputValorTotalProd").val(parseFloat(total.toFixed(2)));

        var somaTotalVenda = 0;

        var valorTotalProd = Number($("#inputValorTotalProd").val());
        var valorFrete = Number($("#val-frete-venda").val());
        var valorEmbalagem = Number($("#val-embalagem-venda").val());

        var somaTotalVenda = valorTotalProd + valorFrete + valorEmbalagem;
        $("#inputValorTotalVenda").val(parseFloat(somaTotalVenda.toFixed(2)));

    }

    // preenche select de clientes 
    function listaClienteVenda() {
        $('#select-cliente-venda').html('');
        $('#select-cliente-venda').html('<option selected>Selecionar...</option>');
        $.get("php/venda/preencherClienteVenda.php", function (resultado) {

            for (let i = 0; i < resultado.length; i++) {
                //text, valor, alimenta o select com os clientes do bd
                var resultOption = new Option(resultado[i][1], resultado[i][0]);
                $('#select-cliente-venda').append(resultOption);
            }
            // console.log(resultado);
        });
    }

    function aplicaMaskVenda() {

        // frete
        $("#val-frete-venda").inputmask('currency', {
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

        // embalagem
        $("#val-embalagem-venda").inputmask('currency', {
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

        // valor total prod todos
        $("#inputValorTotalProd").inputmask('currency', {
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

        // valor total prod unit
        $(".nTotalVal").inputmask('currency', {
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

        // valor total da compra
        $("#inputValorTotalVenda").inputmask('currency', {
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

        // valor Unitario
        $(".custoUnit-prod-venda").inputmask('currency', {
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

    } //fim da function

});




