jQuery(document).ready(function() {
   jQuery('#gf-fb-brd-color').wpColorPicker({
        defaultColor: jQuery('#gf-fb-brd-color').val(),
        change: function(event, ui){
            var selectedColor = ui.color.toString();
            jQuery('#gf-fb-brd-color').val(selectedColor);
        }
    });
    
    jQuery('#gf-tw-brd-color').wpColorPicker({
        defaultColor: jQuery('#gf-tw-brd-color').val(),
        change: function(event, ui){
            var selectedColor = ui.color.toString();
            jQuery('#gf-tw-brd-color').val(selectedColor);
        }
    });
    
    jQuery('#gf-tw-lnk-color').wpColorPicker({
        defaultColor: jQuery('#gf-tw-lnk-color').val(),
        change: function(event, ui){
            var selectedColor = ui.color.toString();
            jQuery('#gf-tw-lnk-color').val(selectedColor);
        }
    });
    
    jQuery('#gf-fb-bg-color').wpColorPicker({
        defaultColor: jQuery('#gf-fb-bg-color').val(),
        change: function(event, ui){
            var selectedColor = ui.color.toString();
            jQuery('#gf-fb-bg-color').val(selectedColor);
        }
    });


});

function CheckFbForm() {
    var url = jQuery('#gffburl').val();
    if (url.length < 1) {
        alert(objTrans.urlToShort);
        return false;
    }
    
    return true;
}