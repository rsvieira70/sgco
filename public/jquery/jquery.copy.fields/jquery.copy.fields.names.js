$(function () {
    $("#name").blur(function () {
        var name = document.getElementById("name").value;
        var socialName = document.getElementById("social_name").value;
        var nickname = document.getElementById("nickname").value;
        var firstNickname = name.split(' ')[0];
        if (socialName == '' || socialName == null || socialName == undefined) {
            var $social_name = $("input[name='social_name']");
            $social_name.val(name);
        }
        if (nickname == '' || nickname == null || nickname == undefined) {
            var $nickname = $("input[name='nickname']");
            $nickname.val(firstNickname);
        }
    });
});
