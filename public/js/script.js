$(document).ready(function() {
    $(".toast").toast("show");
});

$("#nowplaying_link").click(function(){
    console.log("CLICKED");
    $('html, body').animate({
        scrollTop: $("#nowplaying").offset().top-50
    }, 1000);
});