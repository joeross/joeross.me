<?php
/**
 * Template for displaying 404 pages.
 * 
 * @package Imprint
 * @since Imprint 1.0
 */

get_header();
?>

<div id="content-container" class="<?php echo imprint_get_container_class() ?>" >
    <div id="archive-container" class="archive-empty archive-content">
        
        <?php imprint_content_container_first_hook() ?>
        <?php imprint_404_content_hook() ?>
        <?php imprint_content_container_last_hook() ?>
        
    </div><!-- Archive Container ends here -->
</div><!-- Content Container ends here -->

<?php
get_sidebar();
get_footer();
?>
