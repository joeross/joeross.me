<article>

    <div class="blogpostinfo left">

		<div class="right blogpostimg">
		<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('archive'); ?></a>
	    </div>


    	
		<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title();?></a></h2>




		<div class="blogmeta">
			<span class="post-time"><?php the_time('M d, Y') ?></span> - 
			<span class="post-categories"><?php the_category(', '); ?></span> - 
			<span class="post-comment"><?php comments_number( '0 Comments', '1 Comments', '% Comments' ); ?></span>
			<span>- <?php echo get_post_format_string( get_post_format() ); ?></span>
		</div>
		 

		<?php the_excerpt(); ?>
		<?php wp_link_pages(); ?>

	</div>
	<div class="clear"></div>
</article>