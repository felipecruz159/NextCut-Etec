// Change active color in the nav

$(document).ready(function() {
    $(".nav-item").bind( "click", function(event) {
        event.preventDefault();
        var clickedItem = $( this );
        $( ".nav-item" ).each( function() {
            $( this ).removeClass( "active" );
        });
        clickedItem.addClass( "active" );
    });
});

// /Change active color in the nav

// Nav background when scrolling

window.onscroll = function() {
    var nav = document.getElementById('colorScroll');
    if ( window.pageYOffset > 300 ) {

        nav.classList.add("navbarScroll");
    } else {
 
        nav.classList.remove("navbarScroll");
    }
}

// /Nav background when scrolling