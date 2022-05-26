$(function() {
    $("#cell_phone").blur(function() {
        var CellPhone = document.getElementById("cell_phone").value;
        var WhatsApp = document.getElementById("whatsapp").value;
        var Telegram = document.getElementById("telegram").value;
        if (WhatsApp == 0 || WhatsApp == null || WhatsApp == undefined) {
            var $whatsapp = $("input[name='whatsapp']");
            $whatsapp.val(CellPhone);
        }
        if (Telegram == 0 || Telegram == null || Telegram == undefined) {
            var $telegram = $("input[name='telegram']");
            $telegram.val(CellPhone);
        }
    });
});
