<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php $quote_content = get_post_meta($post->ID, 'quote_content', true); ?>
	<?php $quote_attribution = get_post_meta($post->ID, 'quote_attribution', true); ?>
	
	<?php 
		if ( is_sticky() ) { 
			echo '<a class="is-sticky" href="<?php the_permalink(); ?>" title="' . __('Sticky post','hoffman') . '"><span class="genericon genericon-pinned"></span></a>'; 
		} 
	?>
	
	<a class="post-quote" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	
		<div class="section-inner thin">
			
			<blockquote><?php echo $quote_content; ?></blockquote>
		
			<?php if ( $quote_attribution != '' ) : ?>
			
				<cite><?php echo $quote_attribution; ?></cite>
			
			<?php endif; ?>
		
		</div> <!-- /section-inner -->
	
	</a> <!-- /post-quote -->

</div>