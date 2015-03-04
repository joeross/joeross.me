<?php
/**
 * Contains all the Action Hooks that are implemented into the theme.
 * Not all these hooks may have been used while building the theme but
 * they have been implemented at the required place.
 *
 * @version Imprint_Hooks 1.0.0
 * @package Imprint
 * @subpackage Core
 * @category Hooks
 * @since Imprint 1.0
 * 
 * @todo More hooks will be implemented in upcoming versions.
 * @todo Documentation coming soon.
 * @todo Filter Hooks to be added soon.
 * 
 */


/**
 * Hook is called on Single Posts inside loop. It is basically used to
 * generate the entire Post Template.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 */
function imprint_post_template_hook() {
    do_action('imprint_post_template_hook');
}



/**
 * Hook is called in all the archive files.(eg. index.php, 
 * category.php, tag.php, search.php, archive.php) Basically used 
 * to generate the entire archive templated.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 */
function imprint_archive_template_hook() {
    do_action('imprint_archive_template_hook');
}



/**
 * Hook is called on the archive.php to display the entire archive page.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 */
function imprint_date_template_hook() {
    do_action('imprint_date_template_hook');
}



/**
 * Hook is called on the author.php to display the entire author page.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 */
function imprint_author_template_hook() {
    do_action('imprint_author_template_hook');
}



/**
 * Hook is called on the category.php to display the entire category page.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 */
function imprint_category_template_hook() {
    do_action('imprint_category_template_hook');
}



/**
 * Hook is called on the tag.php to display the entire tag page.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 */
function imprint_tag_template_hook() {
    do_action('imprint_tag_template_hook');
}



/**
 * Hook is called on the index.php to display the entire homepage.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 */
function imprint_index_template_hook() {
    do_action('imprint_index_template_hook');
}



/**
 * Hook is called in authorbox inside the author information section.
 * This hook has nothing to do with the Gravatar image.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 */
function imprint_authorbox_info_hook() {
    do_action('imprint_authorbox_info_hook');
}



/**
 * Hook is called below single posts inside the 'imprint_post_template_hook'.
 * HOOKED INTO: 'imprint_post_template_hook'.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 */
function imprint_below_post_hook() {
    do_action('imprint_below_post_hook');
}



/**
 * Hook is called first in the content container outside the loop.
 * Basically it is the first hook called in the content-container.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 */
function imprint_content_container_first_hook() {
    do_action('imprint_content_container_first_hook');
}



/**
 * Hook is called last in the content container outside the loop.
 * Basically it is the last hook called in the content-container.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 */
function imprint_content_container_last_hook() {
    do_action('imprint_content_container_last_hook');
}



/**
 * Hook is called in archive title section in the loop.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 */
function imprint_archive_title_hook() {
    do_action('imprint_archive_title_hook');
}



/**
 * Hook is called in archive meta section in the loop.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 */
function imprint_archive_meta_hook() {
    do_action('imprint_archive_meta_hook');
}



/**
 * Hook is called in archive excerpts section in the loop.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 */
function imprint_archive_excerpt_hook() {
    do_action('imprint_archive_excerpt_hook');
}



/**
 * Hook is called on the 404 page to display 404 error text.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 */
function imprint_404_content_hook() {
    do_action('imprint_404_content_hook');
}



/**
 * Hook is used for calling the header section of the theme.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 */
function imprint_header_hook(){
    do_action('imprint_header_hook');
}



/**
 * Hook is called in the header container.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 * @todo Make it the only hook in the header container by putting everything into it.
 */
function imprint_header_container_hook(){
    do_action('imprint_header_container_hook');
}



/**
 * Hook is the first to be called in wrapper.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 * @todo Make it the only hook in the header container by putting everything into it.
 */
function imprint_wrapper_hook(){
    do_action('imprint_wrapper_hook');
}




/**
 * Hook is used to call the social icons.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 */
function imprint_social_icons_hook(){
    do_action('imprint_social_icons_hook');
}



/**
 * Hook is used to remove attached social icons.
 * 
 * @since Imprint 1.0
 * @since Imprint_Hooks 1.0.0
 */

function remove_si_hooks(){
    do_action('remove_si_hooks');
}