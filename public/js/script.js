$(document).ready(function(){
    //NICE SCROLL
    $('body').niceScroll({ styler: "fb", cursorcolor: "#66615b", cursorwidth: '4', cursorborderradius: '10px', spacebarenabled: false, cursorborder: '', zindex: '1000' });
    $('#container-items').niceScroll({ styler: "fb", cursorcolor: "#007ec7", cursorwidth: '4', cursorborderradius: '10px', spacebarenabled: false, cursorborder: '', zindex: '1000' });
    $('.table-responsive').on('show.bs.dropdown', function () {
        $('.table-responsive').css( "overflow", "inherit" );
    });

    $('.table-responsive').on('hide.bs.dropdown', function () {
        $('.table-responsive').css( "overflow", "auto" );
    })

    // $('.dropdown-menu').on('touchstart.dropdown.data-api', function(e) { e.stopPropagation() });
     $('.dropdown-toggle').dropdown();
});