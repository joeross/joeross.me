jQuery(document).ready(function() {
   
});

function ResetCurrentLayoutSettings(question) {
    return confirm(question);
}

function SaveCurrentLayoutSettings(question) {
    var ln = jQuery('#gf_layout_name').val();
    if (ln.length == 0) {
        alert(objTrans.not_empty);
        return false;
    }
    if (confirm(question)) {
        jQuery('#gf-lsave').submit();
    }
    
    return false;
}

function CheckEdition(question) {
    var ln = jQuery('#gf_layout_name').val();
    if (ln.length == 0) {
        alert(objTrans.not_empty);
        return false;
    }
    
    return confirm(question);
}

function CancelEdition() {
    window.location.href = '?page=gfonts_theme_layouts';
    return false;
}