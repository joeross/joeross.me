<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php $video_url = get_post_meta($post->ID, 'video_url', true); if ( $video_url != '' ) : ?>
				
		<div class="featured-media">
		
			<?php if (strpos($video_url,'.mp4') !== false) : ?>
				
				<video controls>
				  <source src="<?php echo $video_url; ?>" type="video/mp4">
				</video>
																		
			<?php else : ?>
				
				<?php 
				
					$embed_code = wp_oembed_get($video_url); 
					
					echo $embed_code;
					
				?>
					
			<?php endif; ?>
			
		</div>
	
	<?php endif; ?>
	
	<?php 
		if ( is_sticky() ) { 
			echo '<a class="is-sticky" href="<?php the_permalink(); ?>" title="' . __('Sticky post','hoffman') . '"><span class="genericon genericon-pinned"></span></a>'; 
		} 
	?>
	
	<div class="post-inner section-inner thin">
		
		<div class="post-header">
			
			<div class="post-meta top">
			
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_time(get_option('date_format')); ?></a>
				
				<?php 
					if ( comments_open() ) {
						echo '<span class="sep">/</span> '; 
						comments_popup_link( __( '0 Comments', 'hoffman' ), __( '1 Comment', 'hoffman' ), __( '% Comments', 'hoffman' ) );
					}
				?> 
				
				<?php edit_post_link( __('Edit','hoffman'), '<span class="sep">/</span> ', ''); ?>
				
			</div>
			
		    <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		    	    
		</div> <!-- /post-header -->
		
		<div class="post-content">
		
			<?php the_content(); ?>
		
		</div>
	
	</div> <!-- /post-inner -->

</div>