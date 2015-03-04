<?php
/**
 * Primary Sidebar Section of Imprint Theme
 * 
 * @package Imprint
 * @since Imprint 1.0
 */

if( imprint_is_sidebar_left() ):
?>

<div id="primary-sidebar" class="sidebar sidebar-fl-left <?php echo imprint_get_sidebar_class(); ?>">

      <?php if ( !dynamic_sidebar( 'primary_sidebar' ) ): ?>
      
      		<div class="widget widget_recent_entries">
            	<h4 class="widget-title"><?php _e( 'Recent Posts', 'imprint' ); ?></h4>
                <ul><?php wp_get_archives( array( 'type' => 'postbypost', 'limit' => 5, 'format' => 'html' ) ); ?></ul>
            </div>


      		<div class="widget widget_recent_comments">
            	<h4 class="widget-title"><?php _e( 'Recent Comments', 'imprint' ); ?></h4>
                <ul><?php imprint_recent_comments_widget(); ?></ul>
            </div>

      		<div class="widget widget_search">
            	<h4 class="widget-title"><?php _e( 'Search', 'imprint' ); ?></h4>
                <?php get_search_form(); ?>
            </div>

      		<div class="widget widget_tag_cloud">
            	<h4 class="widget-title"><?php _e( 'Tags', 'imprint' ); ?></h4>
                <div class="tagcloud">
				<?php wp_tag_cloud( array( 'taxonomy' => 'post_tag' ) ); ?>
				</div>

            </div>



      <?php endif; ?>

      </div><!-- Primary sidebar ends (left) -->
      
<?php endif; ?>
      

<?php if( imprint_is_sidebar_right() ): ?>


<div id="primary-sidebar" class="sidebar sidebar-fl-right <?php echo imprint_get_sidebar_class(); ?>">

      <?php if ( !dynamic_sidebar( 'primary_sidebar' ) ): ?>
      
      		<div class="widget widget_recent_entries">
            	<h4 class="widget-title"><?php _e( 'Recent Posts', 'imprint' ); ?></h4>
                <ul><?php wp_get_archives( array( 'type' => 'postbypost', 'limit' => 5, 'format' => 'html' ) ); ?></ul>
            </div>


      		<div class="widget widget_recent_comments">
            	<h4 class="widget-title"><?php _e( 'Recent Comments', 'imprint' ); ?></h4>
                <ul><?php imprint_recent_comments_widget(); ?></ul>
            </div>

      		<div class="widget widget_search">
            	<h4 class="widget-title"><?php _e( 'Search', 'imprint' ); ?></h4>
                <?php get_search_form(); ?>
            </div>

      		<div class="widget widget_tag_cloud">
            	<h4 class="widget-title"><?php _e( 'Tags', 'imprint' ); ?></h4>
                <div class="tagcloud">
				<?php wp_tag_cloud( array( 'taxonomy' => 'post_tag' ) ); ?>
				</div>

            </div>



      <?php endif; ?>

      </div><!-- Primary sidebar ends (right) -->
      
<?php endif; ?>