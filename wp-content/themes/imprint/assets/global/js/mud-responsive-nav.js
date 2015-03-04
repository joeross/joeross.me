/* 
 * Mudthemes Responsive Navigation Script
 * 
 * Definition: This script is used to display a multilevel 
 * dropdown navigation for mobile devices.
 * Author: muthemes.com
 * 
 * Copyright @ 2013, mudthemes
 */

;jQuery(document).ready(function($) {

    var mudRespNav = function() {

        $(window).load(function() {
            var mudrnTabStatus = $('#menu-container .mudrn-tab').css('display');
            if (mudrnTabStatus === 'block') {
                $('#menu-container #menu').addClass('mudrn-menu');
            } else {
                $('#menu-container #menu').removeClass('mudrn-menu');
            }
        });

        $(window).resize(function() {
            var mudrnTabStatus = $('#menu-container .mudrn-tab').css('display');
            var menuStatus = $('#menu-container #menu').css('display');

            if (mudrnTabStatus === 'block') {
                $('#menu-container #menu').addClass('mudrn-menu');
                $('#menu-container #menu').hide();
            } else {
                $('#menu-container #menu').removeClass('mudrn-menu');
                if (menuStatus === 'none') {
                    $('#menu-container #menu').show();
                }
            }
        });

        $('#menu-container .mudrn-tab').click(function() {
            var menuStatus = $('#menu-container #menu').css('display');
            if (menuStatus === 'block') {
                $('#menu-container #menu').slideUp();
            } else {

                $('#menu-container #menu').slideDown();
            }
        });
    };
    mudRespNav(); // end mudRespNav

}); // end jQuery document ready
