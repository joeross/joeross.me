<?php
/**
 * Theme Variables (loaded before any class or functions)
 * 
 * @package Imprint
 * @subpackage Core
 * @category Setup
 * @since Imprint 1.0
 */

/**
 * Fontface Options
 * 
 * @since Imprint 1.0
 */
$imprint_fontface_options = array('global_f','site_title_f','site_desc_f','archive_title_f','archive_meta_f','archive_excerpt_f','rm_f','pri_sidebar_title_f','pri_sidebar_link_f','pri_sidebar_text_f','fb_w_title_f','fb_w_text_f','fb_w_link_f','footer_f','pri_menu_f','bott_menu_f','post_title_f','post_meta_f','post_content_f','post_pre_f','post_list_f','post_headings_f','authorbox_about_f','authorbox_info_f');

/**
 * KSES allowed HTML tags.
 * 
 * @since Imprint 1.0
 */
$imprint_kses_tags = array(
    'a' => array(
        'href' => true,
        'title' => true,
        'target' => true,
    ),
    'abbr' => array(
        'title' => true,
    ),
    'acronym' => array(
        'title' => true,
    ),
    'b' => array(),
    'blockquote' => array(
        'cite' => true,
    ),
    'cite' => array(),
    'code' => array(),
    'del' => array(
        'datetime' => true,
    ),
    'em' => array(),
    'i' => array(
        'class' => true,
    ),
    'q' => array(
        'cite' => true,
    ),
    'strike' => array(),
    'strong' => array(),
    'br' => array(),
    'ol'=>array(
        'class' => array(),
    ),
    'li' => array(),
);

/**
 * KSES allowed HTML tags for JS scripts.
 * Used to sanitize Google Analytics code in Options Framework.
 * Used only in PRO version
 * 
 * @since Imprint 1.0
 */
$imprint_kses_js_tags = array(
    'script' => array(
        'type' => true,
    ),
);

/**
 * Primary content width according to the design and stylesheet.
 * 
 * @global int $content_width
 * @since Imprint 1.0
 */
if (!isset($content_width)) {
    $content_width = 630;
}
