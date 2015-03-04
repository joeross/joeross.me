jQuery(document).ready(function() {
    
    });

function RunTool(action, start) {
    if (start == 0 && !confirm('Are you sure you want to run mass title tool?')) {
        return;
    }
    jQuery('#mtitlecontent').hide();
    var data = {
        action: 'mass_title_tool',
        act: action,
        start: start
    };
    jQuery('#accwait').show();
    jQuery('.acchideable').show();
    if (start == 0) {
        jQuery('#accwaitinfo').html('........');
    }
    jQuery.post(ajaxurl, data, function(response) {
        var obj = jQuery.parseJSON(response);        
        if (obj.result != 0) {
            alert(obj.message);
        } else {
            jQuery('#accwaitinfo').html(obj.message);
            if (obj.finished == 0) {
                RunTool(action, obj.start);
            } else {
                jQuery('.acchideable').hide();
                jQuery('#mtitlecontent').show();
            }
        }
    }).error(function() {
        jQuery('#accwait').hide(); 
        jQuery('#mtitlecontent').show();
        alert('Some error happened.');
    });
    
    return false;
}