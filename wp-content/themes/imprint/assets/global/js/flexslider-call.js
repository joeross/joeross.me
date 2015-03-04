;jQuery(document).ready(function($) {

    $(window).load(function(){
      $('.flexslider').flexslider({
                animation: imprint_slide_vars.animation,
		direction: imprint_slide_vars.direction,
		slideshow: true,
		slideshowSpeed: parseInt(imprint_slide_vars.slideshowSpeed),
		animationSpeed: parseInt(imprint_slide_vars.animationSpeed),
		pauseOnAction: true,
		controlNav: false,
                directionNav: Boolean(imprint_slide_vars.directionNav),
		smoothHeight: Boolean(imprint_slide_vars.smoothHeight),
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });

});