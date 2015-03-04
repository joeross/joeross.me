// Search

jQuery(document).ready(function($){
    var hiddenContent = $( "#site-search" );
    $( "a.search-icon" ).click(function(event) {
        event.preventDefault();
        if (hiddenContent.is( ":visible" )) 
        {
            hiddenContent.slideUp( 300 );
        } 
        else 
        {
            hiddenContent.slideDown( 300 );
        }
    });
});
// ATX Toggle

jQuery(document).ready(function($){

    $(".atx-open").hide();

    // $(".atx-togg").click(function() {
    //     $(this).find(".atx-open").toggleClass("active").toggle("fast");
    // })

    $(".atx-togg").on('click',function(){
        $(this).find(".atx-open").slideToggle('fast');
        $(this).find(".atx-ico").toggleClass('active');
    });

    // $('.atx-ico').removeClass('active');
});

// Pageslide

jQuery(document).ready(function($){
    $(".pageslide").pageslide({ direction: "left" });
});

// Scroll to top

jQuery(document).ready(function($){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 50) {
            $('#backToTop').fadeIn('slow');
        } else {
            $('#backToTop').fadeOut('slow');
        }
    });
    $('#backToTop').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 500);
        return false;
    });
});


// Masonry

jQuery(document).ready(function() {
    jQuery('#masonrycontent').masonry({
        itemSelector : '.post',
        columnWidth: 20,
        gutterWidth: 20,
        isFitWidth: true,
        isAnimated: true,
  animationOptions: {
    duration: 200,
    easing: 'linear',
    queue: false
  }
    });
});


jQuery(window).load(function(){
    setInterval(function() {
        jQuery( '#masonrycontent' ).masonry( 'reload' );
     }, 500 );
});