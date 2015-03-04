<?php
/**
 * Theme Header File
 * 
 * @since Imprint 1.0
 * @todo Convert into class based.
 */

function imprint_header(){
    ?>
    <div id="header-container"><!-- Header Container starts -->
        <?php imprint_header_container_hook() ?>
          <div id="branding-left" class="header-column">
               <div id="logo">
               <?php imprint_logo(); // Calls the site name and description ?>
               </div>
          </div><!-- Logo wrapper container ends -->
          <div id="branding-right" class="header-column">
               <div id="top-banner" class="sidebar">
               <?php imprint_sidebar_top(); // This sidebar appears on the right side of the logo. ?>
               </div>
          </div>
    </div><!-- Header Container ends -->
    <?php
}

if(!$imprint_options['disable_header']):
    add_action( 'imprint_header_hook', 'imprint_header' );
endif;