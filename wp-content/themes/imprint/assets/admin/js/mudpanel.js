/**
 * Prints out the inline javascript needed for the colorpicker and choosing
 * the tabs in the panel.
 */

jQuery(document).ready(function($) {

	// Color Picker
	$('.colorSelector').each(function(){
		var Othis = this; //cache a copy of the this variable for use inside nested function
		var initialColor = $(Othis).next('input').attr('value');
		$(this).ColorPicker({
		color: initialColor,
		onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
		},
		onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
		},
		onChange: function (hsb, hex, rgb) {
		$(Othis).children('div').css('backgroundColor', '#' + hex);
		$(Othis).next('input').attr('value','#' + hex);
	}
	});
	}); //end color picker

	// Image Options
	$('.of-radio-img-img').click(function(){
		$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
		$(this).addClass('of-radio-img-selected');
	});

	$('.of-radio-img-label').hide();
	$('.of-radio-img-img').show();
	$('.of-radio-img-radio').hide();

        function mudHideUpdateStatus(){
            $('.mudwrap .mud-admin-status').delay(3000).fadeOut(2000, 'swing');
        }mudHideUpdateStatus();

        function mudActiveTab(){
            
            // Find if a selected tab is saved in localStorage
            var active_tab = '';
            if (typeof (localStorage) != 'undefined') {
                active_tab = localStorage.getItem("active_tab");
                //localStorage.removeItem("active_tab");
            }
            // If active tab is saved and exists, load it's .group
                if (active_tab != '' && $(active_tab).length) {
                    $('#mudsettings-nav-wrapper a').removeClass('mudnav-active');
                    $('#mudsettings-nav-wrapper ' + active_tab + '-tab').addClass('mudnav-active');
                    $('#mudsettings-content, .mudwrap .group').hide();
                    $(active_tab).fadeIn();
                    $('#mudsettings-content, #optionsframework-submit').show();
                }
                else {
                    $('#mudsettings-nav-wrapper a').removeClass('mudnav-active');
                    $('#mudsettings-nav-wrapper a:first').addClass('mudnav-active');
                    $('#mudsettings-content, .mudwrap .group').hide();
                    $('.mudwrap #of-option-basicsettings').fadeIn();
                    $('#mudsettings-content, #optionsframework-submit').show();
            }

        }mudActiveTab();


	// Navigation Switches
	$('a.mudthemes-nav').click(function(evt){
        var $thisNavTab = $(this);
		(function() {
			$('#mudsettings-nav-wrapper a').removeClass('mudnav-active');
                        $thisNavTab.addClass('mudnav-active');
                        localStorage.setItem("active_tab", $thisNavTab.attr('href') );
		})();

		$('.mudwrap .group').hide();
		var mudclick = $(this).attr('href');
		$(mudclick).fadeIn();
		evt.preventDefault();
	});

        // Featured Icons
        
        var iconsSwitcher = function() {
            // Default Selection
            for(var i =1; i <= 3; i++){
                var strIconSelected = $('#section-featured_box_'+i+'_icon .of-featured-box-icons input[type=radio]:checked').val();
                $('#section-featured_box_'+i+'_icon .mdf-'+strIconSelected+'').addClass('iconselected');
            }
            // Manual Selection
            $('.featured_box_1_icon i').on('click', function(){
                //var strIconClicked = $(this).val();
                var strIconClicked = $(this).prev().val();
                $('.featured_box_1_icon i').removeClass('iconselected');
                $('.featured_box_1_icon i.mdf-'+strIconClicked).addClass('iconselected');
            });
            $('.featured_box_2_icon i').on('click', function(){                
                //var strIconClicked = $(this).val();
                var strIconClicked = $(this).prev().val();
                $('.featured_box_2_icon i').removeClass('iconselected');                
                $('.featured_box_2_icon i.mdf-'+strIconClicked).addClass('iconselected');
            });
            $('.featured_box_3_icon i').on('click', function(){
                //var strIconClicked = $(this).val();
                var strIconClicked = $(this).prev().val();
                $('.featured_box_3_icon i').removeClass('iconselected');                
                $('.featured_box_3_icon i.mdf-'+strIconClicked).addClass('iconselected');
            });
        };
        iconsSwitcher();

(function(){
	$('.mudwrap .section:last-child').addClass('sectionlast');
	$('.mudwrap .section:last-child').prev().addClass('sectionlast');
	$('.mudwrap .subsection .section:last-child').addClass('subsection-border');
	$('.mudwrap .subsection:first-child .section-info').css('border-top', 'none');
})();

});