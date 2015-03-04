<?php
/**
 * The template for displaying posts in the Gallery post format
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



	<article>
		<?php the_content (); ?>
		<div class="clear"></div>
	</article><!-- .entry-content -->
	
	<div class="atx-togg">
		<div class="atx-open">
			
			<div class="tray"><span class="entypo-comment"></span><?php comments_number( '0 Comments', '1 Comments', '% Comments' ); ?></div>
			<div class="tray"><span class="entypo-archive"></span><?php the_category(', '); ?></div>
			<?php if( has_tag() ) { ?>
			<div class="tray"><span class="entypo-tag"></span><?php the_tags(); ?></div>
            <?php } ?>
 
            <div class="tray">
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">View Gallery</a>
			</div>
            
            <div class="tray"><?php do_action('addthis_widget',get_permalink($post->ID), get_the_title($post->ID), 'fb_tw_sc'); ?></div>

		</div>
		<footer>
			<?php the_time('F j, Y'); ?>
			<span class="atx-ico"></span>  
		</footer>
	</div>

</div><!-- #post-## -->
