<?php

function imprint_featured_boxes_show() {
    
    global $imprint_options;
    
    if ( array_key_exists('disable_featured_boxes', $imprint_options) ):
    
        $where_to_display = ! $imprint_options['disable_featured_boxes'] ? $imprint_options['featured_boxes_home_only'] ? 'homepage' : 'everywhere' : 'nowhere';

        switch($where_to_display):
            case('everywhere'):
                imprint_featured_boxes_html();
                break;

            case('homepage'):
                if(is_front_page()) imprint_featured_boxes_html();
                break;

            default:
                break;

        endswitch;
        
    endif;
}

function imprint_featured_boxes_html() {
    
    global $imprint_options;
    
    echo    '<div class="mudpack-shortcodes">
                <div class="mudpack-columns mudpack-contentbox">
                    <div class="mudpack-columns-3">';
        
    for($i = 1; $i <= 3; $i++){
        $fb_title = $imprint_options['featured_box_'.$i.'_title'];
        $fb_content = $imprint_options['featured_box_'.$i.'_content'];
        $fb_icon = $imprint_options['featured_box_'.$i.'_icon'];
        
        echo    '<div class="mudpack-column-'.$i.'">
                    <div class="mudpack-cb-icon-location-left mudpack-cb-icon-border-circular">
                        <div class="mudpack-cb-icon"><i class="mdf mdf-'.$fb_icon.'"></i></div>
                        <div class="mudpack-cb-title"><span>'.$fb_title.'</span></div>
                        <div class="mudpack-cb-content"><span>'.$fb_content.'</span></div>
                    </div>
                </div>';
    }
    
    echo            '</div>
                </div>
            </div>';

}