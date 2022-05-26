$(document).ready(function () {
    function clear_form_zip_code() {
        $("#address").val("");
        $("#neighborhood").val("");
        $("#city").val("");
        $("#state").val("");
        $("#ibge").val("");
    }
    $("#zip_code").blur(function () {
        var zip_code = $(this).val().replace(/\D/g, '');
        if (zip_code != "") {
            var validacep = /^[0-9]{8}$/;
            if (validacep.test(zip_code)) {
                $("#address").val("...");
                $("#neighborhood").val("...");
                $("#city").val("...");
                $("#state").val("...");
                $("#ibge").val("...");
                $.getJSON("https://viacep.com.br/ws/" + zip_code + "/json/?callback=?", function (dados) {
                    if (!("erro" in dados)) {
                        $("#address").val(dados.logradouro);
                        $("#neighborhood").val(dados.bairro);
                        $("#city").val(dados.localidade);
                        $("#state").val(dados.uf);
                        $("#ibge").val(dados.ibge);
                    } //end if.
                    else {
                        clear_form_zip_code();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                clear_form_zip_code();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            clear_form_zip_code();
            alert("CEP não digitado.");
        }
    });
});