<?php
/**
 * The Sidebar containing the primary widget area
 *
 * @package Catch Themes
 * @subpackage Catch Base
 * @since Catch Base 1.0 
 */
?>

<?php
/** 
 * catchbase_before_secondary hook
 */
do_action( 'catchbase_before_secondary' );?>
	
<?php
	global $post, $wp_query;

	$options = catchbase_get_theme_options();
	
	$themeoption_layout = $options['theme_layout'];
	
	// Front page displays in Reading Settings
	$page_on_front = get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts'); 

	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();	
	
	// Post /Page /General Layout
	if ( $post) {
		if ( is_attachment() ) { 
			$parent = $post->post_parent;
			$layout = get_post_meta( $parent, 'catchbase-layout-option', true );
			$sidebaroptions = get_post_meta( $parent, 'catchbase-sidebar-options', true );
			
		} else {
			$layout = get_post_meta( $post->ID, 'catchbase-layout-option', true ); 
			$sidebaroptions = get_post_meta( $post->ID, 'catchbase-sidebar-options', true ); 
		}
	}
	else {
		$sidebaroptions = '';
	}
			
	if( empty( $layout ) || ( !is_page() && !is_single() ) ) {
		$layout = 'default';
	}
	
	if( 'no-sidebar' == $layout || 'no-sidebar-one-column' == $layout || 'no-sidebar-full-width' == $layout ) {
		return;
	}

	if( 'default' == $layout && ( 'no-sidebar' == $themeoption_layout || 'no-sidebar-one-column' == $themeoption_layout || 'no-sidebar-full-width' == $themeoption_layout ) ) {
		return;
	}

	do_action( 'catchbase_before_primary_sidebar' ); 
	?>   
		
		<aside class="sidebar sidebar-primary widget-area" role="complementary">
		<?php
		//Primary Sidebar
		if ( is_active_sidebar( 'primary-sidebar' ) ) {
        	dynamic_sidebar( 'primary-sidebar' ); 
   		}	
		else { ?>
			<section id="widget-default-text" class="widget widget_text">	
				<div class="widget-wrap">
                	<h4 class="widget-title"><?php _e( 'Primary Sidebar Widget Area', 'catchbase' ); ?></h4>
           		
           			<div class="textwidget">
                   		<p><?php _e( 'This is the Primary Sidebar Widget Area if you are using a two or three column site layout option.', 'catchbase' ); ?></p>
                   		<p><?php printf( __( 'You can add content to this area by visiting your <a href="%s">Widgets Panel</a> and adding new widgets to this area.', 'catchbase' ), admin_url( 'widgets.php' ) ); ?></p>
                 	</div>
           		</div><!-- .widget-wrap -->
       		</section><!-- #widget-default-text -->
		<?php
		} ?>
		</aside><!-- .sidebar sidebar-primary widget-area -->
		
	<?php 
	/** 
	 * catchbase_after_primary_sidebar hook
	 */
	do_action( 'catchbase_after_primary_sidebar' ); ?>    

<?php
/** 
 * catchbase_after_secondary hook
 *
 */
do_action( 'catchbase_after_secondary' );
