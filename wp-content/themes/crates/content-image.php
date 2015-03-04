<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<article class="image">
		<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('imageformatmasonry'); ?></a>
	</article><!-- .entry-content -->
	<div class="atx-togg">
		<div class="atx-open">
			
			<div class="tray"><span class="entypo-comment"></span><?php comments_number( '0 Comments', '1 Comments', '% Comments' ); ?></div>
			<div class="tray"><span class="entypo-archive"></span><?php the_category(', '); ?></div>
			<?php if( has_tag() ) { ?>
			<div class="tray"><span class="entypo-tag"></span><?php the_tags(); ?></div>
            <?php } ?>

            <div class="tray">
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">View Image</a>
			</div>

            <div class="tray"><?php do_action('addthis_widget',get_permalink($post->ID), get_the_title($post->ID), 'fb_tw_sc'); ?></div>

		</div>
		<footer>

<?php $title = get_the_title(); if (strlen($title) == 0) { ?> 
<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_time('F j, Y'); ?></a>
<?php }  else { ?>
<?php the_time('F j, Y'); ?>
<?php } ?>

			<span class="atx-ico"></span> 
		</footer>
	</div>
</div>