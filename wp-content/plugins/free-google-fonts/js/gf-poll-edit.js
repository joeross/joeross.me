jQuery('#poll_type').change(function() {
    var v = jQuery(this).val();
    switch(v) {
        case '0':
            jQuery('.chart').hide();
            jQuery('.pie').show();
            break;
        case '1':
            jQuery('.chart').hide();
            jQuery('.bar').show();
            break;
        case '2':
            jQuery('.chart').hide();
            jQuery('.column').show();
            break;
        case '3':
            jQuery('.chart').hide();
            jQuery('.donut').show();
            break;
    }
});
                    
                    
jQuery(function() {
    var dt = jQuery('#poll_voting_end_date').val();
    jQuery('#poll_type').change();
    jQuery('#poll_voting_end_date').datepicker(); 
    jQuery('#poll_voting_end_date').datepicker( "option", "dateFormat", "yy-mm-dd" );
    jQuery('#poll_voting_end_date').datepicker('setDate', dt);
});

function GfPollValidator() {
    var poll_name = jQuery('#poll_name').val();
    var poll_title = jQuery('#poll_title').val();
    
    if (poll_name.trim().length == 0) {
        alert('You have to fill Poll name.');
        jQuery('#poll_name').focus();
        return false;
    }
    
    if (poll_title.trim().length == 0) {
        alert('You have to fill Poll title.');
        jQuery('#poll_title').focus();
        return false;
    }
    
    return true;
}

function GfValidatePollEdition() {
    
    if (!GfPollValidator()) {
        return false;
    }
    return confirm('Are you sure you want to save poll data?');
}