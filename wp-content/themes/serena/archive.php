<?php get_header(); ?>
			
		<div id="content" class="wrap clearfix">
				
			    <div id="main" class="eightcol first clearfix" role="main">
				
				    <?php if (is_category()) { ?>
					    <h1 class="archive-title h2">
						    <?php single_cat_title(); ?>
				    	</h1>
					    
				    <?php } elseif (is_tag()) { ?> 
					    <h1 class="archive-title h2">
						    <span><?php _e("Posts Tagged:", "serena"); ?></span> <?php single_tag_title(); ?>
					    </h1>
					    
				    <?php } elseif (is_author()) { 
				    	global $post;
				    	$author_id = $post->post_author;
				    ?>
					    <h1 class="archive-title h2">

					    	<span><?php _e("Posts By:", "serena"); ?></span> <?php echo get_the_author_meta('display_name', $author_id); ?>

					    </h1>
				    <?php } elseif (is_day()) { ?>
					    <h1 class="archive-title h2">
    						<span><?php _e("Archives:", "serena"); ?></span> <?php the_time('l, F j, Y'); ?>
					    </h1>
		
	    			<?php } elseif (is_month()) { ?>
		    		    <h1 class="archive-title h2">
			    	    	<span><?php _e("Archives:", "serena"); ?></span> <?php the_time('F Y'); ?>
				        </h1>
					
				    <?php } elseif (is_year()) { ?>
				        <h1 class="archive-title h2">
				    	    <span><?php _e("Archives:", "serena"); ?></span> <?php the_time('Y'); ?>
				        </h1>
				    <?php } ?>

				    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
				    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
					    <header class="article-header">
							
						    <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							<p class="byline vcard"><?php
							  printf(__('by <span class="author">%3$s</span>, <time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'serena'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), serena_get_the_author_posts_link());
							?></p>
                  
						
					    </header> <!-- end article header -->
					
					    <section class="entry-content clearfix">
						    <?php the_excerpt(); ?>
							<span class="float-right"><?php echo(' <a href="'. get_permalink($post->ID) . '" title="Read '.get_the_title($post->ID).'">Read on &raquo;</a>') ?></span>
					    </section> <!-- end article section -->
						
					    <footer class="article-footer">
							
					    </footer> <!-- end article footer -->
					
				    </article> <!-- end article -->
					
				    <?php endwhile; ?>	
					
				        <nav class="wp-prev-next">
				            <ul>
				    	        <li class="prev-link"><?php next_posts_link(__('&laquo; Older', "serena")) ?></li>
				    	        <li class="next-link"><?php previous_posts_link(__('Newer &raquo;', "serena")) ?></li>
				            </ul>
				        </nav>	
					
				    <?php else : ?>
					
				        <article id="post-not-found" class="hentry clearfix">
				            <header class="article-header">
				        	    <h1><?php _e("Article Missing", "serena"); ?></h1>
				        	</header>
				            <section class="entry-content">
				        	    <p><?php _e("Sorry, but something is missing. Please try again!", "serena"); ?></p>
				        	</section>
				        	<footer class="article-footer">
				        	</footer>
				        </article>	
					
				    <?php endif; ?>
			
				</div> <!-- end #main -->
    
    			<?php get_sidebar(); ?>
                
			</div> <!-- end #content -->

<?php get_footer(); ?>
