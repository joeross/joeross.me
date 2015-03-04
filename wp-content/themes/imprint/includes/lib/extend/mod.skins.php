<?php

if( !function_exists('imprint_skin_classic_white') ):
    function imprint_skin_classic_white($input){
        $input['wrapper_bg_c'] = '#FFFFFF';
        $input['wrapper_border_c'] = '#E7E7E7';
        $input['site_title_c'] = '#555555';
        $input['site_desc_c'] = '#555555';
        $input['menu_bg'] = array('color' => '#F6F6F6','image' => FALSE, 'repeat' => 'repeat','position' => 'top left','attachment'=>'scroll' );
        $input['menu_bg_hover'] = array('color' => '#444444','image' => FALSE,'repeat' => 'repeat','position' => 'top left','attachment'=>'scroll' );
        $input['menu_dd_bg'] = array('color' => '#EEEEEE','image' => FALSE,'repeat' => 'repeat','position' => 'top left','attachment'=>'scroll' );
        $input['menu_dd_bg_hover'] = array('color' => '#E0E0E0','image' => FALSE,'repeat' => 'repeat','position' => 'top left','attachment'=>'scroll' );
        $input['widget_title_bg'] = array('color' => '#444444','image' => FALSE,'repeat' => 'repeat','position' => 'top left','attachment'=>'scroll' );
        $input['widget_bg'] = array('color' => '#FFFFFF','image' => FALSE,'repeat' => 'repeat','position' => 'top left','attachment'=>'scroll' );
        $input['fb_widget_title_bg'] = array('color' => '#333333','image' => FALSE,'repeat' => 'repeat','position' => 'top left','attachment'=>'scroll' );
        $input['fb_widget_bg'] = array('color' => '#000000','image' => FALSE,'repeat' => 'repeat','position' => 'top left','attachment'=>'scroll' );
        $input['fb_bg'] = array('color' => '#000000','image' => FALSE,'repeat' => 'repeat','position' => 'top left','attachment'=>'scroll' );
        $input['pri_sidebar_link_c'] = '#333333';
        $input['fb_sidebar_link_c'] = '#dddddd';
        $input['sticky_bg_c'] = '#eeeeee';
        $input['link_c'] = '#444444';
        $input['link_hover_c'] = '#888888';
        $input['link_visited_c'] = '#444444';
        $input['rm_bg_c'] = '#1497ea';
        $input['rm_border_c'] = '#000000';
        $input['rm_text_c'] = '#ffffff';
        $input['home_post_title_c'] = '#444444';
        $input['home_post_meta_c'] = '#353535';
        $input['home_post_excerpt_c'] = '#000000';
        $input['home_thumb_border_c'] = '#aaaaaa';
        $input['home_divider_c'] = '#d7d7d7';
        $input['home_nav_bg_c'] = '#ffffff';
        $input['home_nav_border_c'] = '#aaaaaa';
        $input['home_nav_text_c'] = '#aaaaaa';
        $input['post_title_c'] = '#444444';
        $input['post_meta_c'] = '#444444';
        $input['post_content_c'] = '#222222';
        $input['post_heading_c'] = '#222222';
        $input['post_pre_bg_c'] = '#f7f7f7';
        $input['post_pre_c'] = '#222222';
        $input['post_hr_c'] = '#e7e7e7';
        $input['post_tag_c'] = '#444444';
        $input['authorbox_border_c'] = '#cccccc';
        $input['authorbox_gravatar_bg_c'] = '#eeeeee';
        $input['authorbox_info_bg_c'] = '#ffffff';
        $input['authorbox_about_c'] = '#555555';
        $input['authorbox_desc_c'] = '#444444';
        $input['post_nav_below_post_c'] = '#555555';
        $input['post_img_caption_bg_c'] = '#cccccc';
        $input['post_img_caption_c'] = '#888888';
        $input['footer_bg_c'] = '#333333';    
        $input['global_f'] = 'Arial';
        $input['site_title_f'] = 'Times';
        $input['site_desc_f'] = 'Arial';
        $input['archive_title_f'] = 'Times';
        $input['archive_meta_f'] = 'Arial';
        $input['archive_excerpt_f'] = 'Arial';
        $input['rm_f'] = 'Arial';
        $input['pri_sidebar_title_f'] = 'Arial';
        $input['pri_sidebar_link_f'] = 'Arial';
        $input['pri_sidebar_text_f'] = 'Arial';
        $input['fb_w_title_f'] = 'Arial';
        $input['fb_w_text_f'] = 'Arial';
        $input['fb_w_link_f'] = 'Arial';
        $input['footer_f'] = 'Verdana';
        $input['pri_menu_f'] = 'Arial';
        $input['bott_menu_f'] = 'Verdana';
        $input['post_title_f'] = 'Times';
        $input['post_meta_f'] = 'Tahoma';
        $input['post_content_f'] = 'Arial';
        $input['post_pre_f'] = 'Courier-New';
        $input['post_list_f'] = 'Arial';
        $input['post_headings_f'] = 'Arial';
        $input['authorbox_about_f'] = 'Georgia';
        $input['authorbox_info_f'] = 'Arial';

        return $input;
    }
endif;

if( !function_exists('imprint_options_on_skin_change') ):
    function imprint_options_on_skin_change($input){
        return imprint_skin_classic_white($input);
    }
endif;