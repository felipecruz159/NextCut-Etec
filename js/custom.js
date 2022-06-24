// Nav background com rolagem

window.onscroll = function() {
    var nav = document.getElementById('colorScroll');
    if ( window.pageYOffset > 300 ) {

        nav.classList.add("navbarScroll");
    } else {
 
        nav.classList.remove("navbarScroll");
    }
}

// /Nav background com rolagem

// Arruma layout no responsivo/web
function changeHTML() {
    $("#headerRight").appendTo("#destination");
}

if ($(window).width() < 991) {
    changeHTML();
 }

 $(window).resize(function(){location.reload();});

 // /Arruma layout no responsivo/web

 // Intervalo de tempo do carousel

 $('#mainSlider').carousel({
    interval: 4000
});

// /Intervalo de tempo do carousel