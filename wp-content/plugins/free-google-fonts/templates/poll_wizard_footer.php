</center>
<script type="text/javascript">
    function tb_position() {
        var isIE6 = typeof document.body.style.maxHeight === "undefined";
        jQuery("#TB_window").css({marginLeft: '-' + parseInt((TB_WIDTH / 2),10) + 'px', width: TB_WIDTH + 'px'});
        if ( ! isIE6 ) { // take away IE6
            jQuery("#TB_window").css({marginTop: '-' + parseInt((TB_HEIGHT / 2),10) + 'px', height: 'auto'});
        }
    }
    
    function CreatedPolls() {
        GfGoToStep('s2');
        return false;
    }
    
    function NewPollBuilder() {
        GfGoToStep('b2');
        return false;
    }
    
    function GfGoToStep(step) {
        jQuery('.steper').hide();
        jQuery('#' + step).show();
        return false;
    }
    
    function AcceptCreatedPoll() {
        var gfpollid = jQuery('#gf_poll_id').val();
        var gfpollwidth = jQuery('#gf_poll_width').val();
        var gfpollheight = jQuery('#gf_poll_height').val();
        var gfpolllegend = jQuery('#gf_poll_legend').val();
        
        if (gfpollid == 0) {
            alert('<?php _e('Please select poll from list.', GFontsEngine::PLUGIN_SLUG); ?>');
            return false;
        }
        if (isNaN(gfpollwidth)) {
            alert('<?php _e('Chart width must be a number.', GFontsEngine::PLUGIN_SLUG); ?>');
            return false;
        }        
        if (isNaN(gfpollheight)) {
            alert('<?php _e('Chart height must be a number.', GFontsEngine::PLUGIN_SLUG); ?>');
            return false;
        }
        
        if (confirm('<?php _e('Add this poll to article?', GFontsEngine::PLUGIN_SLUG); ?>')) {
            var gfpollcode = '[gfpoll id="' + gfpollid + '" width="' + gfpollwidth + '" height="' + gfpollheight + '" legend="' + gfpolllegend + '"]';
            tinymce.activeEditor.execCommand('mceInsertContent', false, gfpollcode);
            tb_remove();
        }
        return false;
    }
    
    function GfGoToAnswers() {
        if (!GfPollValidator()) {
            return false;
        }
        
        GfGoToStep("b3");
        return false;
    }
    
    function CreateNewPollAndAdd() {
        var gfpollwidth = jQuery('#gf_new_poll_width').val();
        var gfpollheight = jQuery('#gf_new_poll_height').val();
        var gfpolllegend = jQuery('#gf_new_poll_legend').val();
        var gfpollanswers = jQuery('#gf_new_poll_answers').val();
        
        if (isNaN(gfpollwidth)) {
            alert('<?php _e('Chart width must be a number.', GFontsEngine::PLUGIN_SLUG); ?>');
            return false;
        }        
        if (isNaN(gfpollheight)) {
            alert('<?php _e('Chart height must be a number.', GFontsEngine::PLUGIN_SLUG); ?>');
            return false;
        }
        
        if (gfpollanswers.trim().length == 0) {
            alert('<?php _e('Please fill poll answers.', GFontsEngine::PLUGIN_SLUG); ?>');
            return false;
        }
        
        if (confirm('<?php _e('Add this poll to article?', GFontsEngine::PLUGIN_SLUG); ?>')) {
            jQuery('.btnHide').hide('slow');
            jQuery('#gf_new_poll_wait').show('slow');
            
            var poll_name = jQuery('#poll_name').val();
            var poll_title = jQuery('#poll_title').val();
            var poll_type = jQuery('#poll_type').val();
            var button_title = jQuery('#button_title').val();
            var poll_results_type = jQuery('#poll_results_type').val();
            var poll_voting_end_date = jQuery('#poll_voting_end_date').val();
            var poll_voting_enabled = jQuery('#poll_voting_enabled').is(":checked") ? 1 : 0;
            var poll_client_mode = jQuery('#poll_client_mode').val();
            
            var data = {
                action: 'new_poll',
                answers: gfpollanswers,
                poll_name: poll_name,
                poll_title: poll_title,
                poll_type: poll_type,
                button_title: button_title,
                poll_results_type: poll_results_type,
                poll_voting_end_date: poll_voting_end_date,
                poll_voting_enabled: poll_voting_enabled,
                poll_client_mode: poll_client_mode
            };
            
            jQuery.post('admin-ajax.php', data, function(response) {
                var obj = jQuery.parseJSON(response);
                if (obj.result != 0) {
                    alert(obj.message);
                    jQuery('#gf_new_poll_wait').hide('slow');
                    jQuery('.btnHide').show('slow');
                } else {
                    var gfpollid = obj.gfpollid;
                    var gfpollcode = '[gfpoll id="' + gfpollid + '" width="' + gfpollwidth + '" height="' + gfpollheight + '" legend="' + gfpolllegend + '"]';
                    tinymce.activeEditor.execCommand('mceInsertContent', false, gfpollcode);
                    tb_remove(); 
                }
            }).error(function() {
                jQuery('#gfsaver').hide(); 
                jQuery('#btnSavePreset').show();
                alert('Some error happened.');
            });
            
            return false;
        }
    }
</script>
</div>