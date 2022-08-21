$(function () {
    var path = window.location.pathname;
    console.log(path);
    path = path.replace(/\/$/, "");
    path = decodeURIComponent(path);
    npath = "http://localhost:8000" + path + "";
    console.log(npath);
    $(".custom-navbar a").each(function () {
        var href = $(this).attr('href');
        console.log(href);
        if (npath === href) {
            $(".nav-item-active").removeClass("nav-item-active");
            var parent = $(this).parents(".collapse").prev().find("a").addClass("nav-item-active");
            $(this).addClass('nav-item-active');
//            $(this).addClass('white-text');
        }
    });
});


