/**
 * EnterSubmit jQuery plugin
 * @author XLT Lukasz Pawlik
 * @license http://www.gnu.org/licenses/lgpl.html [GNU Lesser General Public License]
 */
(function( $ ){
    $.fn.entersubmit = function(func) {
  
        this.each(function() {
            $(this).keypress(function(event) {
                if (event.keyCode == '13') {
                    if (func != undefined) {
                        func();
                    }
                    return false;
                }
            }
            )
        });
        
        return this;

    };
})( jQuery );