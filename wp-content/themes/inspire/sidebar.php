<!--Social share icons-->


		<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'right-sidebar' ); ?>
			
		</div>
		<?php endif; ?>

<?php /* Uncomment this line if you want thumbs to appears in sidemenu custom posts for recent posts and popular posts ?>
<!-- Recent posts with thumbs -->
		<li id="meta" class="widget widget-meta">
				<h3 class="widget-title"><?php echo  'Recent Posts'; ?></h3>
							<?php
							$the_query = new WP_Query('showposts=5&orderby=post_date&order=desc');	
							while ($the_query->have_posts()) : $the_query->the_post(); ?>
									<div class="inspire-widget"> 
										<?php the_post_thumbnail(array(100,100), array ('class' => 'alignleft')); ?>
										 <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
									</div>				
									
							<?php endwhile; ?>
							<?php wp_reset_query(); ?>
			</li>
		<!-- Popular posts based on comments with thumbs -->
		<li id="meta" class="widget widget-meta">
				<h3 class="widget-title"><?php echo 'Popular Posts';?></h3>
							<?php
							$the_query = new WP_Query( array( 'orderby' => 'comment_count' ) );
							while ($the_query->have_posts()) : $the_query->the_post(); ?>
									<div class="inspire-widget"> 
										<?php the_post_thumbnail(array(100,100), array ('class' => 'alignleft')); ?>
										 <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
									</div>				
									
							<?php endwhile; ?>
							<?php wp_reset_query(); ?>
			</li>

	<?php */ ?>		
