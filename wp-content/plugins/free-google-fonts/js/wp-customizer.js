( function( $ ) {
    var apiC = wp.customize;
    wp.customize = function() {
        if ((arguments[0] != 'blogname') && (arguments[0] != 'blogdescription') && (arguments[0] != 'header_textcolor')) {
            return apiC(arguments[0], arguments[1]);
        } else {            
            return false;
        }
        };
} )( jQuery );
