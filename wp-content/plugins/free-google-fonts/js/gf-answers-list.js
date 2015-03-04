jQuery( "#dialog-answers-form" ).dialog({
    autoOpen: false,
    height: 500,
    width: 450,
    modal: true,
    buttons: {
        "Add answers": function() {
            var bValid = true;
            var fLength = jQuery('#gf_answers').val().length;
            bValid = (fLength > 0);
            if ( !bValid ) {
                alert('Please enter some answers.');
            } else {
                var data = {
                    action: 'mass_answers',
                    id: pollid,
                    answers: jQuery('#gf_answers').val()
                };
                jQuery('#gf_saver').show();
                jQuery.post(ajaxurl, data, function(response) {
                    var obj = jQuery.parseJSON(response);                
                    if (obj.result != 0) {
                        alert(obj.message);
                    } else {
                        jQuery( "#dialog-answers-form" ).dialog( "close" );
                        alert('Answers added successfully.');
                        window.location.reload();                    
                    }
                }).error(function() {
                    alert('Some error happened.');
                });
            }
        },
        "Cancel": function() {
            jQuery( this ).dialog( "close" );
        }
    },
    close: function() {
        
    }
});
    
function GfMassAddAnswers() {
    jQuery( "#dialog-answers-form" ).dialog( "open" );
    return false;
}    