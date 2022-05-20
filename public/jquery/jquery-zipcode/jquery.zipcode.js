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
            var validazipcode = /^[0-9]{8}$/;
            if (validazipcode.test(zip_code)) {
                $("#address").val("...");
                $("#neighborhood").val("...");
                $("#city").val("...");
                $("#state").val("...");
                $("#ibge").val("...");
                $.getJSON("https://viacep.com.br/ws/" + zip_code + "/json/?callback=?", function (data) {
                    if (!("erro" in data)) {
                        $("#address").val(data.logradouro);
                        $("#neighborhood").val(data.bairro);
                        $("#city").val(data.localidade);
                        $("#state").val(data.uf);
                        $("#ibge").val(data.ibge);
                        $( "#number" ).focus();
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
        }
    });
});
