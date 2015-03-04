<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<a class="post-quote" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		
		<div class="post-inner">
	
			<?php the_content(); ?>
		
		</div>
	
	</a> <!-- /post-quote -->

</div>