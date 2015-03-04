<?php
$poll_id = $_GET['id'];
$widget_id = $_GET['wid'];
$width = $_GET['width'];
$height = $_GET['height'];
$legend = isset($_GET['legend']) ? $_GET['legend'] : 'none';
$btnId = "btn_{$poll_id}_{$widget_id}";
?>
    jQuery(function() {
        jQuery('#<?php echo $btnId; ?>').click(function() {
            var sel = jQuery('input[name="poll_<?php echo $widget_id; ?>"]:checked').val();
            if (sel == undefined) {
                alert(objPollServiceTrans.noanswer);
                return false;
            }
            jQuery(this).hide();
            jQuery('#wgarea_<?php echo $widget_id; ?>_<?php echo $poll_id; ?>').hide('slow');
            var data = {
                action: 'poll_vote',
                poll_id: <?php echo $poll_id; ?>,
                answer_id: sel,
                area: 'wgarea_<?php echo $widget_id . '_' . $poll_id; ?>',
                width: <?php echo $width; ?>,
                height: <?php echo $height; ?>,
                legend: '<?php echo $legend; ?>'
            };
            jQuery(this).fadeOut();
            jQuery.post(objPollServiceTrans.ajaxurl, data, function(response) {
                jQuery('#wgarea_<?php echo $widget_id; ?>_<?php echo $poll_id; ?>').html(response);
                jQuery('#wgarea_<?php echo $widget_id; ?>_<?php echo $poll_id; ?>').show('slow');
            }).error(function() {
                alert(objPollServiceTrans.ajaxerror);
                jQuery(this).show();
                jQuery('#wgarea_<?php echo $widget_id; ?>_<?php echo $poll_id; ?>').show('slow');
            });
            return false;
        });
    });
