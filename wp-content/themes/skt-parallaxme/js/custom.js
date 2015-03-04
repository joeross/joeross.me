// Adds a class 'js_on' to the <html> tag if JavaScript is enabled,
// also helps remove flickering...
document.documentElement.className += ' js_on ';

jQuery(document).ready(function(){
	jQuery("#commentForm").validate();

    // Initiate BX Slider for main feature slider
    jQuery('.bxslider').bxSlider({
        auto: true,
        mode: 'fade',
        autoControls: false
    });

    // Initiate BX Slider for testimonils slider
    jQuery('.testi').bxSlider({
        auto: true,
        //mode: 'fade',
        autoControls: false
    });

    // Initiate lightbox Jquery
    jQuery("a[rel^='prettyPhoto']").prettyPhoto();
	
	var scrPos = jQuery(window).scrollTop();
	if( scrPos > 40 ){
		jQuery('.show-bg.home_header').addClass('fixedmenu');
	}
	
	// add menu active class on section visible.
	jQuery( "section" )
		.mouseenter(function() {
			jQuery('nav ul li').removeClass('current-menu-item');
			jQuery('nav ul li').removeClass('current-menu-ancestor');
			jQuery('nav ul li').removeClass('current-menu-parent');
			var thisId = jQuery(this).attr('id');
			//alert( location.href.split(/\?|#/)[0]+'#'+thisId );
			jQuery('nav a[href="'+location.href.split(/\?|#/)[0]+'#'+thisId+'"]').parent().addClass('current-menu-item');
		}).mouseleave(function() {
			jQuery('nav ul li').removeClass('current-menu-item');
			jQuery('nav ul li').removeClass('current-menu-ancestor');
			jQuery('nav ul li').removeClass('current-menu-parent');
	});
});



// ON SCROLL CALLBACK
jQuery( window ).scroll(function() {
	var winWd = jQuery(window).width();
	var mht = jQuery('.show-bg.home_header').height();
	var scrPos = jQuery(window).scrollTop();
	if( scrPos > mht ){
		jQuery('.show-bg.home_header').addClass('fixedmenu');
	}else{
		jQuery('.show-bg.home_header').removeClass('fixedmenu');
	}

	var tpos = jQuery( '.testimonials' );
	var testOffset = tpos.offset();
	var wht = jQuery(window).height();
	var testAppear = testOffset - wht;
	if( scrPos > testAppear ){
		jQuery('.testimonials').css({
			backgroundPosition: 'center -'+((scrPos-testAppear)/2.5)+'px'
		});
	}
});

// NAVIGATION CALLBACK
var ww = jQuery(window).width();
jQuery(document).ready(function() { 
	jQuery(".show-bg nav li a").each(function() {
		if (jQuery(this).next().length > 0) {
			jQuery(this).addClass("parent");
		};
	})
	jQuery(".mobile_nav a").click(function(e) { 
		e.preventDefault();
		jQuery(this).toggleClass("active");
		jQuery(".show-bg nav").slideToggle('fast');
	});
	adjustMenu();
})

// navigation orientation resize callbak
jQuery(window).bind('resize orientationchange', function() {
	ww = jQuery(window).width();
	adjustMenu();
});

var adjustMenu = function() {
	if (ww < 768) {
		jQuery(".mobile_nav a").css("display", "block");
		if (!jQuery(".mobile_nav a").hasClass("active")) {
			jQuery(".show-bg nav").hide();
		} else {
			jQuery(".show-bg nav").show();
		}
		jQuery(".show-bg nav li").unbind('mouseenter mouseleave');
	} else {
		jQuery(".mobile_nav a").css("display", "none");
		jQuery(".show-bg nav").show();
		jQuery(".show-bg nav li").removeClass("hover");
		jQuery(".show-bg nav li a").unbind('click');
		jQuery(".show-bg nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
			jQuery(this).toggleClass('hover');
		});
	}
}

// Scroll to Top
jQuery(document).ready(function(){
    jQuery('a[href=#top]').click(function(){
        jQuery('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });
});

// CoolInput Plugin
jQuery(document).ready(function(){
    jQuery.fn.coolinput=function(b){
	var c={
	    hint:null,
	    source:"value",
	    blurClass:"blur",
	    iconClass:false,
	    clearOnSubmit:true,
	    clearOnFocus:true,
	    persistent:true
	};if(b&&typeof b=="object")
	    jQuery.extend(c,b);else
	    c.hint=b;return this.each(function(){
	    var d=jQuery(this);var e=c.hint||d.attr(c.source);var f=c.blurClass;function g(){
		if(d.val()=="")
		    d.val(e).addClass(f)
		    }
	    function h(){
		if(d.val()==e&&d.hasClass(f))
		    d.val("").removeClass(f)
		    }
	    if(e){
		if(c.persistent)
		    d.blur(g);if(c.clearOnFocus)
		    d.focus(h);if(c.clearOnSubmit)
		    d.parents("form:first").submit(h);if(c.iconClass)
		    d.addClass(c.iconClass);g()
		}
	    })
	}
});

jQuery(document).ready(function(){
	// first input box is a search box, notice passing of a custom class and an icon to the coolInput function
	jQuery('#search_field').coolinput({
		blurClass: 'blur'
	});
});


// ThumbCaption script
jQuery(document).ready(function(){
    jQuery(".portfolio-img-thumb-1-col, .portfolio-img-thumb-2-col, .portfolio-img-thumb-3-col, .portfolio-img-thumb-4-col").hover(function(){
	    var info=jQuery(this).find(".hover-opacity");
	    info.stop().animate({opacity:0.4},400);
    },
    function(){
	    var info=jQuery(this).find(".hover-opacity");
	    info.stop().animate({opacity:1},400);
    });

    jQuery(".post-image").hover(function(){
	    var info=jQuery(this).find(".hover-opacity");
	    info.stop().animate({opacity:0.6},400);
    },
    function(){
	    var info=jQuery(this).find(".hover-opacity");
	    info.stop().animate({opacity:1},400);
    });
});

// jQuery Validate
jQuery(document).ready(function(){
    if( jQuery('body').hasClass('page-template-page-Contact-php') ) {
	// load js translated strings only when Contact page template is loaded
	jQuery("#contactForm").validate({
	    rules: {
		    contact_name: {
			    required: true,
			    minlength: 2
		    },
		    contact_email: {
			    required: true,
			    email: true
		    },
		    contact_message: jQuery('input#rules_contact_message').val()
	    },
	    messages: {
		    contact_name: {
			    required: jQuery('input#contact_name_required').val(),
			    minlength: jQuery('input#contact_name_min_length').val()
		    },
		    contact_email: jQuery('input#messages_contact_email').val(),
		    contact_message: jQuery('input#messages_contact_message').val()
	    }
	});
	// phone number + extension format validator
	jQuery("#contact_phone_NA_format").mask("(999) 999-9999");
	jQuery("#contact_ext_NA_format").mask("? 99999");
    }
});

//Page Peel
jQuery(document).ready(function(){
    jQuery("#page-peel").hover(function() {
		jQuery("#page-peel img, .msg_block").stop()
			.animate({ width: '307px', height: '319px' }, 500);
    	}, function() {
		jQuery("#page-peel img").stop()
			.animate({ width: '50px', height: '52px' }, 220);
		jQuery(".msg_block").stop()
			.animate({ width: '50px', height: '50px' }, 200);
    });
});

// remove the title attributes from the main menu and Subpages Widget
jQuery(document).ready(function() {
	// remove 'title' attribute from menu items
	jQuery("#navigation-menu a, .widget_subpages a").removeAttr("title");
	// Add the 'default' cursor when hover to menu link that have no links
	jQuery('#navigation-menu a').each(function() {
		if ( !jQuery(this).attr("href") ) {
			jQuery(this).addClass("default-cursor");
		}
	});
});


// Signup Button
jQuery(document).ready(function(){
  jQuery('p.signup-button a')
    .css({ 'backgroundPosition': '0 0' })
    .hover(function(){
	jQuery(this).stop()
	  .animate({
	    'opacity': 0
	  }, 650);
	  },
	  function(){
	    jQuery(this).stop()
	      .animate({
		'opacity': 1
	      }, 650);
	  }
    );
});
