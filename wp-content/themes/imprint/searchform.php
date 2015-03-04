<?php
/*
 * Template for displaying Search Form.
 * 
 * @package Imprint
 * @since Imprint 1.0
 */
?>

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div><label class="screen-reader-text" for="s"><?php _e('Search:', 'imprint') ?></label>
        <input type="text" value="" name="s" id="s" placeholder="<?php echo esc_attr__('Search the site...', 'imprint') ?>"/>
        <input type="submit" id="searchsubmit" value="<?php echo esc_attr__('Go', 'imprint') ?>" />
    </div>
</form>