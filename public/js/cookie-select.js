window.addEventListener('load', function() {
    if (getCookie("checked") == null) {
        document.cookie = "checked=one"
    } else {
        $("[for]").each(function (index, item) {
            if ($(item).attr("for") == getCookie("checked")) {
                $(item).addClass("active");
            } else {
                $(item).removeClass("active");
            }
        })
    }
}, false);

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
