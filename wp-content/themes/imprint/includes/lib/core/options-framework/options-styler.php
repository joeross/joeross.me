<?php
/**
 * Options Styler
 * 
 * @package Imprint
 * @subpackage Core-Options
 * @category Options
 * @since Imprint 1.0 
 */

function imprint_font_finder(){
    
        global $imprint_options, $imprint_fonts, $imprint_fontface_options;
        
        $return_fonts_array = array();

        foreach( $imprint_fontface_options as $key => $val ):
            if(array_key_exists($val, $imprint_options)):
                foreach( $imprint_fonts as $key_ifonts => $val_ifonts ):                    
                    if($val_ifonts['shortname'] == $imprint_options[$val]):
                        
                        $return_fonts_array[$val] = array(
                                                        'name'      =>  $val_ifonts['name'],
                                                        'family'    =>  $val_ifonts['family'],
                                                    );                        
                        break;
                    endif;
                endforeach;
            endif;
        endforeach;
        
        return $return_fonts_array;
}


function imprint_custom_typography() {
    
        global $imprint_options;

        $fonts_array = imprint_font_finder();
        $css_type = 'fonts';

        foreach ($fonts_array as $key => $value):
            
            if(!empty($imprint_options)):
                
		if( $key == 'global_f'):
			$css_selector = 'body';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'site_title_f'):
			$css_selector = '#site-title a';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'site_desc_f'):
			$css_selector = '#site-description';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'archive_title_f'):
			$css_selector = '#archive-container .archive-title h1 a';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'archive_meta_f'):
			$css_selector = '#archive-container .archive-meta span, #archive-container .archive-meta a, #archive-container .archive-meta .archive-meta-date, #archive-container .archive-meta .archive-meta-author a,#archive-container .archive-meta .archive-meta-category a, #archive-container .archive-meta .archive-meta-comment a';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'archive_excerpt_f'):
			$css_selector = '#archive-container .archive-excerpt';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'rm_f'):
			$css_selector = '#archive-container .read-more';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'pri_sidebar_title_f'):
			$css_selector = '#primary-sidebar h4.widget-title';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'pri_sidebar_link_f'):
			$css_selector = '#primary-sidebar a';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'pri_sidebar_text_f'):
			$css_selector = '#primary-sidebar';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'fb_w_title_f'):
			$css_selector = '#sidebar-box h4.widget-title';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'fb_w_text_f'):
			$css_selector = '#sidebar-box .widget';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'fb_w_link_f'):
			$css_selector = '#sidebar-box .widget a';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'footer_f'):
			$css_selector = '#footer a, #footer';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'pri_menu_f'):
			$css_selector = '#menu-container #menu #imprint_primary_menu a';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'bott_menu_f'):
			$css_selector = '#bottom_menu a';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'post_title_f'):
			$css_selector = '.post-template .post-title h1';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'post_meta_f'):
			$css_selector = '.post-template .post-meta, .post-template .post-meta a';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'post_content_f'):
			$css_selector = '.post-template .post-content';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'post_pre_f'):
			$css_selector = '.post-template .post-content pre';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'post_list_f'):
			$css_selector = '.post-template .post-content li';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'post_headings_f'):
			$css_selector = '.post-content h1, .post-content h2, .post-content h3, .post-content h4, .post-content h5, .post-content h6';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'authorbox_about_f'):
			$css_selector = '.post-template .authorbox-name-title';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $key == 'authorbox_info_f'):
			$css_selector = '.post-template .authorbox-desc';
			$css_style = $value['name'] . ',' . $value['family'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                                
            endif;
        
        endforeach;
}

function imprint_custom_color() {
        
        global $imprint_options;
        
        $css_type = 'color';        
        
	if ( $imprint_options ):

		if( $imprint_options['wrapper_bg_c'] ):
			$css_selector = '#wrapper';
			$css_style = $imprint_options['wrapper_bg_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'background' );
		endif;
                
		if( $imprint_options['wrapper_border_c'] ):
			$css_selector = '#wrapper';
			$css_style = $imprint_options['wrapper_border_c'];
			imprint_custom_style_apply( $css_selector, $css_style, 'border', 'all' );
		endif;
                
		if( $imprint_options['site_title_c'] ):
			$css_selector = '#site-title a';
			$css_style = $imprint_options['site_title_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $imprint_options['site_desc_c'] ):
			$css_selector = '#site-description';
			$css_style = $imprint_options['site_desc_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $imprint_options['pri_sidebar_link_c'] ):
			$css_selector = '#primary-sidebar a';
			$css_style = $imprint_options['pri_sidebar_link_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'link' );
		endif;
                
		if( $imprint_options['fb_sidebar_link_c'] ):
			$css_selector = '#sidebar-box .widget a';
			$css_style = $imprint_options['fb_sidebar_link_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'link' );
		endif;
                
		if( $imprint_options['sticky_bg_c'] ):
			$css_selector = '.sticky';
			$css_style = $imprint_options['sticky_bg_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'background' );
		endif;
                
		if( $imprint_options['link_c'] ):
			$css_selector = 'a:link';
			$css_style = $imprint_options['link_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'link' );
		endif;
                
		if( $imprint_options['link_hover_c'] ):
			$css_selector = 'a:hover';
			$css_style = $imprint_options['link_hover_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'link' );
		endif;
                
		if( $imprint_options['link_visited_c'] ):
			$css_selector = 'a:visited';
			$css_style = $imprint_options['link_visited_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'link' );
		endif;
                
		if( $imprint_options['rm_bg_c'] ):
			$css_selector = '#archive-container a.read-more';
			$css_style = $imprint_options['rm_bg_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'background' );
		endif;
                
		if( $imprint_options['rm_border_c'] ):
			$css_selector = '#archive-container a.read-more';
			$css_style = $imprint_options['rm_border_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'border' );
		endif;
                
		if( $imprint_options['rm_text_c'] ):
			$css_selector = '#archive-container a.read-more';
			$css_style = $imprint_options['rm_text_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $imprint_options['home_post_title_c'] ):
			$css_selector = '#archive-container .archive-title h1 a';
			$css_style = $imprint_options['home_post_title_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'link' );
		endif;
                
		if( $imprint_options['home_post_meta_c'] ):
                        $css_selector = '#archive-container .archive-meta span, #archive-container .archive-meta a, #archive-container .archive-meta .archive-meta-date, #archive-container .archive-meta .archive-meta-author a,#archive-container .archive-meta .archive-meta-category a, #archive-container .archive-meta .archive-meta-comment a';
			$css_style = $imprint_options['home_post_meta_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'link' );
		endif;
                
		if( $imprint_options['home_post_excerpt_c'] ):
			$css_selector = '#archive-container .archive-excerpt p';
			$css_style = $imprint_options['home_post_excerpt_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $imprint_options['home_thumb_border_c'] ):
			$css_selector = '#archive-container .archive-excerpt img';
			$css_style = $imprint_options['home_thumb_border_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'border' );
		endif;
                
		if( $imprint_options['home_divider_c'] ):
			$css_selector = '.archive-loop-container';
			$css_style = $imprint_options['home_divider_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'border' );
		endif;
                
		if( array_key_exists('home_nav_bg_c', $imprint_options )):
			$css_selector = '.archive-pagination a';
			$css_style = $imprint_options['home_nav_bg_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'background' );
		endif;
                
		if( array_key_exists('home_nav_border_c', $imprint_options )):
			$css_selector = '.archive-pagination a';
			$css_style = $imprint_options['home_nav_border_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'border' );
		endif;
                
		if( array_key_exists('home_nav_text_c', $imprint_options )):
			$css_selector = '.archive-pagination a';
			$css_style = $imprint_options['home_nav_text_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $imprint_options['post_title_c'] ):
			$css_selector = '.post-template .post-title h1';
			$css_style = $imprint_options['post_title_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'link' );
		endif;
                
		if( $imprint_options['post_meta_c'] ):
			$css_selector = '.post-template .post-meta, .post-template .post-meta a';
			$css_style = $imprint_options['post_meta_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'link' );
		endif;
                
		if( $imprint_options['post_content_c'] ):
			$css_selector = 'div.post-template .post-content, .post-content strong, .post-content dt';
			$css_style = $imprint_options['post_content_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $imprint_options['post_heading_c'] ):
			$css_selector = '.post-template h1, .post-template h2, .post-template h3, .post-template h4, .post-template h5, .post-template h6';
			$css_style = $imprint_options['post_heading_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'link' );
		endif;
                
		if( $imprint_options['post_pre_bg_c'] ):
			$css_selector = '.post-template pre';
			$css_style = $imprint_options['post_pre_bg_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'background' );
		endif;
                
		if( $imprint_options['post_pre_c'] ):
			$css_selector = '.post-template pre';
			$css_style = $imprint_options['post_pre_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type,  FALSE );
		endif;
                
		if( $imprint_options['post_hr_c'] ):
			$css_selector = '.post-template hr';
			$css_style = $imprint_options['post_hr_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'background' );
		endif;
                
		if( $imprint_options['post_tag_c'] ):
			$css_selector = '.tags-below-content, .tags-below-content a';
			$css_style = $imprint_options['post_tag_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'link' );
		endif;
                
		if( array_key_exists('authorbox_border_c', $imprint_options )):
			$css_selector = '.post-template .authorbox';
			$css_style = $imprint_options['authorbox_border_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'border' );
		endif;
                
		if( array_key_exists('authorbox_gravatar_bg_c', $imprint_options )):
			$css_selector = '.post-template .authorbox';
			$css_style = $imprint_options['authorbox_gravatar_bg_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'background' );
		endif;
                
                if( array_key_exists('authorbox_info_bg_c', $imprint_options )):
			$css_selector = '.post-template .authorbox-info';
			$css_style = $imprint_options['authorbox_info_bg_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'background' );
		endif;
                
                if( array_key_exists('authorbox_about_c', $imprint_options )):
			$css_selector = '.post-template .authorbox-name-title';
			$css_style = $imprint_options['authorbox_about_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'link' );
		endif;
                
                if( array_key_exists('authorbox_desc_c', $imprint_options )):
			$css_selector = '.post-template .authorbox-desc';
			$css_style = $imprint_options['authorbox_desc_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
		if( $imprint_options['post_nav_below_post_c'] ):
			$css_selector = '.post-template .post-nav a, .archive-nav a';
			$css_style = $imprint_options['post_nav_below_post_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'link' );
		endif;
                
		if( $imprint_options['post_img_caption_bg_c'] ):
			$css_selector = '.wp-caption';
			$css_style = $imprint_options['post_img_caption_bg_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'background' );
		endif;
                
		if( $imprint_options['post_img_caption_c'] ):
			$css_selector = '.wp-caption, .wp-caption p';
			$css_style = $imprint_options['post_img_caption_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
		endif;
                
                if( array_key_exists('footer_bg_c', $imprint_options )):
			$css_selector = '#footer';
			$css_style = $imprint_options['footer_bg_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'background' );
		endif;
                
                if( array_key_exists('fb_bg', $imprint_options )):
                        $css_selector = '#sidebar-box';
                        $css_style = $imprint_options['fb_bg'];
                        imprint_custom_style_apply( $css_selector, $css_style, 'background', FALSE );
                endif;
                
                if( $imprint_options['widget_title_bg'] ):
                        $css_selector = '#primary-sidebar h4.widget-title';
                        $css_style = $imprint_options['widget_title_bg'];
                        imprint_custom_style_apply( $css_selector, $css_style, 'background', FALSE );
                endif;
                
                if( $imprint_options['widget_bg'] ):
                        $css_selector = '#primary-sidebar .widget';
                        $css_style = $imprint_options['widget_bg'];
                        imprint_custom_style_apply( $css_selector, $css_style, 'background', FALSE );
                endif;
                
                if( $imprint_options['fb_widget_title_bg'] ):
                        $css_selector = '#sidebar-box h4.widget-title';
                        $css_style = $imprint_options['fb_widget_title_bg'];
                        imprint_custom_style_apply( $css_selector, $css_style, 'background', FALSE );
                endif;
                
                if( $imprint_options['fb_widget_bg'] ):
                        $css_selector = '#sidebar-box .widget';
                        $css_style = $imprint_options['fb_widget_bg'];
                        imprint_custom_style_apply( $css_selector, $css_style, 'background', FALSE );
                endif;
                
                if( array_key_exists('social_icons_c', $imprint_options )):
			$css_selector = '.social_icon_solo a i';
			$css_style = $imprint_options['social_icons_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'color' );
		endif;
                
                if( array_key_exists('social_icons_hover_c', $imprint_options )):
			$css_selector = '.social_icon_solo a i:hover';
			$css_style = $imprint_options['social_icons_hover_c'];
			imprint_custom_style_apply( $css_selector, $css_style, $css_type, 'color' );
		endif;

	endif;
	
}

function imprint_menu_styler(){
    
        global $imprint_options;
    
	if ($imprint_options['bottom_menu_c']):
            $css_selector = '#bottom_menu a';
            $css_style = $imprint_options['bottom_menu_c'];
            imprint_custom_style_apply($css_selector, $css_style, 'color', 'link');
        endif;

        if ($imprint_options['bottom_menu_hover_c']):
            $css_selector = '#bottom_menu a:hover';
            $css_style = $imprint_options['bottom_menu_hover_c'];
            imprint_custom_style_apply($css_selector, $css_style, 'color', 'link');
        endif;
        
        if( array_key_exists('menu_pri_border_c', $imprint_options )):
            $css_selector = '#menu-container #menu, #menu-container #menu > ul > li > a';
            $css_style = $imprint_options['menu_pri_border_c'];
            imprint_custom_style_apply( $css_selector, $css_style, 'color', 'border' );
        endif;

        if( array_key_exists('menu_dd_border_c', $imprint_options )):
            $css_selector = '#menu-container .sfHover ul.sub-menu a,'
                        .   '#menu-container .sfHover ul.children a';
            $css_style = $imprint_options['menu_dd_border_c'];
            imprint_custom_style_apply( $css_selector, $css_style, 'color', 'border' );
        endif;
        
        if( array_key_exists('menu_dd_border_hover_c', $imprint_options )):
            $css_selector = '#menu-container .sfHover ul.sub-menu a:hover,'
                        .   '#menu-container .sfHover ul.children a:hover';
            $css_style = $imprint_options['menu_dd_border_hover_c'];
            imprint_custom_style_apply( $css_selector, $css_style, 'color', 'border' );
        endif;
        
        if( array_key_exists('menu_pri_text_c', $imprint_options )):
            $css_selector = '#menu-container #menu > ul > li > a';
            $css_style = $imprint_options['menu_pri_text_c'];
            imprint_custom_style_apply( $css_selector, $css_style, 'color', FALSE );
        endif;
        
        if( array_key_exists('menu_pri_text_hover_c', $imprint_options )):
            $css_selector = '#menu-container #menu > ul > li > a:hover';
            $css_style = $imprint_options['menu_pri_text_hover_c'];
            imprint_custom_style_apply( $css_selector, $css_style, 'color', FALSE );
        endif;
        
        if( array_key_exists('menu_pri_dd_text_c', $imprint_options )):
            $css_selector = '#menu-container .sfHover ul.sub-menu a,'
                        .   '#menu-container .sfHover ul.children a';
            $css_style = $imprint_options['menu_pri_dd_text_c'];
            imprint_custom_style_apply( $css_selector, $css_style, 'color', FALSE );
        endif;
        
        if( array_key_exists('menu_pri_dd_text_hover_c', $imprint_options )):
            $css_selector = '#menu-container .sfHover ul.sub-menu a:hover,'
                        .   '#menu-container .sfHover ul.children a:hover';
            $css_style = $imprint_options['menu_pri_dd_text_hover_c'];
            imprint_custom_style_apply( $css_selector, $css_style, 'color', FALSE );
        endif;        

        if( array_key_exists('menu_bg', $imprint_options )):
            $css_selector = '#menu-container #menu > ul > li > a, '
                        .   '#menu-container #menu';
            $css_style = $imprint_options['menu_bg'];
            imprint_custom_style_apply( $css_selector, $css_style, 'background', FALSE );
        endif;
        
        if( array_key_exists('menu_bg_hover', $imprint_options )):
		$css_selector = '#menu-container #menu > ul > li > a:hover';
		$css_style = $imprint_options['menu_bg_hover'];
		imprint_custom_style_apply( $css_selector, $css_style, 'background', FALSE );
	endif;
        
        if( array_key_exists('menu_dd_bg', $imprint_options )):
		$css_selector = '#menu-container .sfHover ul.sub-menu a, '
                            .   '#menu-container .sfHover ul.children a';
		$css_style = $imprint_options['menu_dd_bg'];
		imprint_custom_style_apply( $css_selector, $css_style, 'background', FALSE );
	endif;
        
        if( array_key_exists('menu_dd_bg_hover', $imprint_options )):
		$css_selector = '#menu-container .sfHover ul.sub-menu a:hover,'
                            .   '#menu-container .sfHover ul.children a:hover';
		$css_style = $imprint_options['menu_dd_bg_hover'];
		imprint_custom_style_apply( $css_selector, $css_style, 'background', FALSE );
	endif;
        
}

/*
function imprint_custom_background() {
    
        global $imprint_options;

	$css_type = 'background';
	$css_options = $imprint_options;
	
	$menu_bg = $css_options['menu_bg'];
	$menu_bg_hover = $css_options['menu_bg_hover'];
	//$menu_dd = $css_options['menu_dd'];
	//$w_title_bg = $css_options['w_title_bg'];

	if( esc_attr( $menu_bg ) ):
		$css_selector = '#menu-container #menu > ul > li > a';
		$css_style = $menu_bg;
		imprint_custom_style_apply( $css_selector, $css_style, $css_type, FALSE );
	endif;

	if( esc_attr( $menu_bg_hover ) ):
		$css_selector = '#menu-container #menu > ul > li > a:hover';
		$css_style = $menu_bg_hover;
		imprint_custom_style_apply( $css_selector, $css_style, $css_type );
	endif;

	if( esc_attr( $menu_dd ) ):
		$css_selector = '#menu-container .sf-menu li ul a';
		$css_style = $menu_dd;
		imprint_custom_style_apply( $css_selector, $css_style, $css_type );
	endif;

	if( esc_attr( $w_title_bg ) ):
		$css_selector = '#primary-sidebar h4.widget-title';
		$css_style = $w_title_bg;
		imprint_custom_style_apply( $css_selector, $css_style, $css_type );
	endif;
 

}
*/

function imprint_custom_areas() {
    
    global $imprint_options;
    
    if($imprint_options['disable_top_margin']):
        imprint_custom_style_apply('#wrapper', '0', 'margin', 'top');
    endif;
    
    if($imprint_options['disable_bottom_margin']):
        imprint_custom_style_apply('#wrapper', '0', 'margin', 'bottom');
    endif;
    
    if($imprint_options['disable_carousel_margin']):
        imprint_custom_style_apply('.flexslider', '0', 'margin', 'top-bottom');
    endif;

    if($imprint_options['disable_archive_posts_space']):
        imprint_custom_style_apply('#archive-container .archive-loop-container', '20px', 'margin', 'bottom');
        imprint_custom_style_apply('#archive-container .archive-loop-container', '20px', 'padding', 'bottom');
    endif;
    
    if(array_key_exists('full_width_width', $imprint_options )):
        imprint_custom_style_apply('.container-only', $imprint_options['full_width_width'] . '%' , 'width', 'width');
        imprint_custom_style_apply('.container-only', $imprint_options['full_width_width'] . '%' , 'width', 'max_width');
    endif;
    
    
    if( array_key_exists('menu_bg_hover', $imprint_options )):
//        imprint_custom_style_apply('#menu-container #menu .sfHover > a', $imprint_options['menu_bg_hover']['color'], 'border-color', 'bottom');
    endif;
}

function imprint_custom_unknown(){
    
    // Example:
    //imprint_custom_style_apply('#copyright a', '#B7B7B7', 'color', 'link');
    
}

function imprint_custom_style_apply( $css_selector, $css_style, $css_type, $css_extra = FALSE ) {

	$imprint_style = '';
	
	switch ( $css_type ):
		
		case "typography":

			if( esc_attr($css_style) ):
				$imprint_style .= 
				$css_selector . ' { ';
				
				foreach ($css_style as $key_typography => $val_typography):
					$css_typography[$key_typography] = esc_attr($val_typography);
				endforeach;
		
				if( $css_typography['size'] ):
					$imprint_style .=
					'font-size: ' . $css_typography['size'] . '; ';
				endif;
				if( $css_typography['face'] ):
					$imprint_style .= 
					'font-family: ' . wp_specialchars_decode( $css_typography['face'], ENT_COMPAT ) . '; ';
				endif;
				if( $css_typography['style'] ):
					$imprint_style .= 
					'font-weight: ' . $css_typography['style'] . '; ';
				endif;
				if( $css_typography['color'] ):
					$imprint_style .= 
					'color: ' . $css_typography['color']  . ';';
				endif;
		
				$imprint_style .= ' }';
		
			endif;
			break;
                
                case "width":
                    
                        switch ( $css_extra ):

                            case "width":
                                $imprint_style .= $css_selector . '{width:' . $css_style . ';}';
                                break;

                            case "max_width":
                                $imprint_style .= $css_selector . '{max-width:' . $css_style . ';}';
                                break;

                            case "min_width":
                                $imprint_style .= $css_selector . '{min-width:' . $css_style . ';}';
                                break;

                        endswitch;
                    
                    break;

                case "fonts":
                    $imprint_style .= $css_selector . '{font-family:' . htmlspecialchars_decode($css_style, ENT_COMPAT) . ';}';
                    break;

		case "color":
		
			if( esc_attr($css_style) ):
								
				switch ( $css_extra ):
					case "background":
						$imprint_style .= 
						$css_selector . ' {background-color: ' . esc_attr( $css_style ) . '}';
						break;
					case "border":
						$imprint_style .= 
						$css_selector . ' {border-color: ' . esc_attr( $css_style ) . '}';
						break;
					case "link":
						$imprint_style .= 
						$css_selector . ' {color: ' . esc_attr( $css_style ) . '; border-color: ' . esc_attr( $css_style ) . '}';
						break;
					default:
						$imprint_style .= 
						$css_selector . ' {color: ' . esc_attr( $css_style ) . '}';
				endswitch;

			endif;
			break;
                
                case "margin":
                    
                    switch ( $css_extra ):
                    
                        case "top":
                            $imprint_style .= $css_selector . '{margin-top:' . $css_style . ';}';
                            break;
                        
                        case "bottom":
                            $imprint_style .= $css_selector . '{margin-bottom:' . $css_style . ';}';
                            break;
                        
                        case "top-bottom":
                            $imprint_style .= $css_selector . '{margin-top:' . $css_style . ';' . 'margin-bottom:' . $css_style . ';}';
                            break;
                        
                    endswitch;
                    
                    break;

                
                case "padding":
                    
                    switch ( $css_extra ):
                    
                        case "top":
                            $imprint_style .= $css_selector . '{padding-top:' . $css_style . ';}';
                            break;
                        
                        case "bottom":
                            $imprint_style .= $css_selector . '{padding-bottom:' . $css_style . ';}';
                            break;
                        
                        case "left":
                            $imprint_style .= $css_selector . '{padding-left:' . $css_style . ';}';
                            break;
                        
                        case "right":
                            $imprint_style .= $css_selector . '{padding-right:' . $css_style . ';}';
                            break;
                        
                        case "top-bottom":
                            $imprint_style .= $css_selector . '{padding-top:' . $css_style . ';' . 'padding-bottom:' . $css_style . ';}';
                            break;
                        
                    endswitch;
                    
                    break;
                
                case "border":
                    
                    switch ( $css_extra ):
                    
                        case "top":
                            $imprint_style .= $css_selector . '{border-top: 1px solid ' . $css_style . ';}';
                            break;
                        
                        case "bottom":
                            $imprint_style .= $css_selector . '{border-bottom: 1px solid ' . $css_style . ';}';
                            break;
                        
                        case "left":
                            $imprint_style .= $css_selector . '{border-left: 1px solid ' . $css_style . ';}';
                            break;
                        
                        case "right":
                            $imprint_style .= $css_selector . '{border-right: 1px solid ' . $css_style . ';}';
                            break;
                        
                        case "top-bottom":
                            $imprint_style .= $css_selector . '{border-top: 1px solid ' . $css_style . ';' . 'border-bottom: 1px solid ' . $css_style . ';}';
                            break;
                        
                        case "left-right":
                            $imprint_style .= $css_selector . '{border-left: 1px solid ' . $css_style . ';' . 'border-right: 1px solid ' . $css_style . ';}';
                            break;
                        
                        case "all":
                            $imprint_style .= $css_selector . '{border: 1px solid ' . $css_style . ';}';
                            break;

                    endswitch;
                    
                    break;
                
                case "border-color":
                    
                    switch ( $css_extra ):
                    
                        case "top":
                            $imprint_style .= $css_selector . '{border-top-color:' . $css_style . ';}';
                            break;
                        
                        case "bottom":
                            $imprint_style .= $css_selector . '{border-bottom-color:' . $css_style . ';}';
                            break;
                        
                        case "top-bottom":
                            $imprint_style .= $css_selector . '{border-top-color:' . $css_style . ';' . 'border-bottom-color:' . $css_style . ';}';
                            break;
                        
                    endswitch;
                    
                    break;

			
		case "background":
		
			if( esc_attr($css_style) ):
				$imprint_style .= 
				$css_selector . ' { ';
				
				foreach ($css_style as $key_background => $val_background):
					$css_style[$key_background] = esc_attr($val_background);
				endforeach;
				
				if ( $css_style['color'] ):
					$imprint_style .=
					'background-color: ' . $css_style['color'] . '; ';
				endif;

				if ( $css_style['image'] ):
					$imprint_style .=
					'background-image: url("' . $css_style['image'] . '"); ';
					
						if ( $css_style['position'] ):
							$imprint_style .=
							'background-position: ' . $css_style['position'] . '; ';
						endif;
						if ( $css_style['repeat'] ):
							$imprint_style .=
							'background-repeat: ' . $css_style['repeat'] . '; ';
						endif;
						if ( $css_style['attachment'] ):
							$imprint_style .=
							'background-attachment: ' . $css_style['attachment'] . '; ';
						endif;
					
				else:
					$imprint_style .=
					'background-image: none; ';
				endif;
				


				$imprint_style .= '}';				

			endif;
		
			

	endswitch;
	
	
	
	echo $imprint_style; //. "\n";
}

function imprint_custom_css_code() {
    
        global $imprint_options;
	
	$custom_css = $imprint_options['custom_css'];

	if($custom_css):
		$imprint_style = '';
		$imprint_style .= $custom_css;
		
		echo '<!-- User Defined Custom CSS Styles -->' . "\n";
		echo '<style type="text/css">' . "\n";
		echo $imprint_style;
		echo "\n" . '</style>' . "\n\n";

	endif;
}

function imprint_custom_style() {
	echo "\n\n" . '<!-- Mudthemes Framework Settings -->' . "\n";
	echo '<style type="text/css">' . "\n";

	imprint_custom_typography();
	imprint_custom_color();
	//imprint_custom_background();
        imprint_menu_styler();
        imprint_custom_areas();
        imprint_custom_unknown();
	echo "\n" . '</style>' . "\n\n";

	imprint_custom_css_code();

}
add_action('wp_head', 'imprint_custom_style');

?>