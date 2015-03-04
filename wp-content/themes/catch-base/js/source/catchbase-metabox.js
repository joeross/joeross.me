/**
 * Admin Metabox 
 * Metabox custom jquery functions
 */
 
jQuery(document).ready(function() {
    var active = 0;
    if (jQuery.cookie('#catchbase-ui-tabs')) {
        active = jQuery.cookie('#catchbase-ui-tabs');
        jQuery.cookie('#catchbase-ui-tabs', null);
    }

    var tabs = jQuery('#catchbase-ui-tabs').tabs({
        active: active
    });

});