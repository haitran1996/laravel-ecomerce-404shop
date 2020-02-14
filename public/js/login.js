$(document).ready(function () {
    $("#hide-pass").click(function () {
        changeMode($(this));
    });

    $("#show-pass").click(function () {
        changeMode($(this));
    });

    function changeMode(dom) {
        let passInput = document.getElementById("password");

        if ($(dom).attr("id") == "hide-pass") {
            passInput.setAttribute("type", "password");
            $(dom).attr("id", "show-pass");
            $(dom).attr("class", "fas fa-eye");
        } else {
            passInput.setAttribute("type", "text");
            $(dom).attr("id", "hide-pass");
            $(dom).attr("class", "fas fa-eye-slash");
        }
    }
});

