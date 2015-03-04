<?php 

class hoffman_recent_posts extends WP_Widget {

	function hoffman_recent_posts() {
		parent::WP_Widget(false, $name = 'Recent posts', array('description' => __('Displays recent entries with thumbnails (optional).', 'hoffman') ));	
	}
	
	function widget($args, $instance) {
	
		// Outputs the content of the widget
		extract($args); // Make before_widget, etc available.
		
		$widget_title = apply_filters('widget_title', $instance['widget_title']);
		$number_of_posts = $instance['number_of_posts'];
		$show_featured_images = $instance['show_featured_images'] ? 'true' : 'false';
		
		echo $before_widget;
		
		
		if (!empty($widget_title)) {
		
			echo $before_title . $widget_title . $after_title;
			
		} ?>
		
			<ul>
				
				<?php
					global $wp_query;
					global $post;
					
					$sticky = get_option( 'sticky_posts' );					
					
					$not_in[] = $post->ID;
					$not_in[] = $sticky[0];
					
					if ( $number_of_posts == 0 ) $number_of_posts = 5;
					
					query_posts(
						array(
							'post_type' => 'post',
							'post__not_in' => $not_in, 
							'posts_per_page' => $number_of_posts,
							'post_status' => 'publish'
						)
					);
					
					while ( have_posts() ) : the_post();
				?>
				
				<li>
				
					<?php global $post; ?>
				
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					
						<?php if ( $show_featured_images == 'true' ) : ?>
						
							<div class="thumbnail">
							
								<?php 
									$post_format = get_post_format(); 
									if ( empty($post_format) ) { $post_format = 'standard'; }
								?>
							
								<div class="genericon genericon-<?php echo $post_format; ?>"></div>
						
								<?php the_post_thumbnail('thumbnail-square') ?>
							
							</div>
							
							<div class="inner">
					
								<p class="title"><?php the_title(); ?></p>
								<p class="meta"><?php the_time(get_option('date_format')); ?> <?php if ( comments_open() ) { echo '<span class="sep">/</span> '; comments_number( __('0 Comments','hoffman'), __('1 Comment','hoffman'), __('% Comments','hoffman'), 'post-comments' ); } ?></p>
							
							</div>
						
						<?php else : ?>
						
							<p class="title"><?php the_title(); ?></p>
							<p class="meta"><?php the_time(get_option('date_format')); ?> <?php if ( comments_open() ) { echo '<span class="sep">/</span> '; comments_number( __('0 Comments','hoffman'), __('1 Comment','hoffman'), __('% Comments','hoffman'), 'post-comments' ); } ?></p>
						
						<?php endif; ?>
					
					</a>
					
				</li>
			
			<?php endwhile; wp_reset_query(); ?>
			
			</ul>
					
		<?php echo $after_widget; 
	}
	
	
	function update($new_instance, $old_instance) {
	
		//update and save the widget
		return $new_instance;
		
	}
	
	function form($instance) {
	
		// Get the options into variables, escaping html characters on the way
		$widget_title = $instance['widget_title'];
		$number_of_posts = $instance['number_of_posts'];
		$show_featured_images = $instance['show_featured_images'];
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('widget_title'); ?>"><?php  _e('Widget title', 'hoffman'); ?>:
			<input id="<?php echo $this->get_field_id('widget_title'); ?>" name="<?php echo $this->get_field_name('widget_title'); ?>" type="text" class="widefat" value="<?php echo $widget_title; ?>" /></label>
		</p>
						
		<p>
			<label for="<?php echo $this->get_field_id('number_of_posts'); ?>"><?php _e('Number of posts to display:', 'hoffman'); ?>
			<input id="<?php echo $this->get_field_id('number_of_posts'); ?>" name="<?php echo $this->get_field_name('number_of_posts'); ?>" type="text" class="widefat" value="<?php echo $number_of_posts; ?>" /></label>
			<small>(<?php _e('Defaults to 5 if empty','hoffman'); ?>)</small>
		</p>
		
		<p>
		    <input class="checkbox widefat" type="checkbox" <?php checked($instance['show_featured_images'], 'on'); ?> id="<?php echo $this->get_field_id('show_featured_images'); ?>" name="<?php echo $this->get_field_name('show_featured_images'); ?>" /> 
		    <label for="<?php echo $this->get_field_id('show_featured_images'); ?>"><?php _e('Show featured images', 'hoffman'); ?></label>
		</p>
		
		<?php
	}
}
register_widget('hoffman_recent_posts'); ?>