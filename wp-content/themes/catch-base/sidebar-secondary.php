<?php
/**
 * The Secondary Sidebar containing the secondary widget area
 *
 * @package Catch Themes
 * @subpackage Catch Base
 * @since Catch Base 1.0 
 */
?>

<?php 
/** 
 * catchbase_before_secondary_sidebar hook
 */
do_action( 'catchbase_before_secondary_sidebar' ); ?>

<aside class="sidebar sidebar-secondary widget-area" role="complementary">
	<?php 
	//Secondary Sidebar
	if ( is_active_sidebar( 'secondary-sidebar' ) ) {
    	dynamic_sidebar( 'secondary-sidebar' ); 
		}	
	else { ?>
		<aside class="widget widget_text">
            <h4 class="widget-title"><?php _e( 'Secondary Sidebar Widget Area', 'catchbase' ); ?></h4>
       		
       		<div class="textwidget">
               <p><?php _e( 'This is the Secondary Sidebar Widget Area if you are using a three column site layout option.', 'catchbase' ); ?></p>
               <p><?php printf( __( 'You can add content to this area by visiting your <a href="%s">Widgets Panel</a> and adding new widgets to this area.', 'catchbase' ), admin_url( 'widgets.php' ) ); ?></p>
             </div>
       </aside>
	<?php
	}
	?>
</aside><!-- .sidebar .sidebar-secondary .widget-area -->

<?php 
/** 
 * catchbase_after_secondary_sidebar hook
 *
 */
do_action( 'catchbase_after_secondary_sidebar' ); ?>
