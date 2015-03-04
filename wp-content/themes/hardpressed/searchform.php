<?php
/**
 * The Search Form
 */
?>

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
    	<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'hardpressed' ); ?></label>
        <input type="text" value="" name="s" id="s" placeholder="<?php _e( 'Search...', 'hardpressed' ); ?>" />
        <input type="submit" id="searchsubmit" value="Search" />
    </div>
</form>