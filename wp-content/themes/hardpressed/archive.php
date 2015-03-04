<?php get_header(); ?>

    <div id="content" class="clearfix">
        
        <div id="main" class="col620 clearfix" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
							if ( is_day() ) :
								printf( __( '<span class="arc-title">Daily Archives:</span> %s', 'hardpressed' ), '<span class="arc-item">' . get_the_date() . '</span>' );
							elseif ( is_month() ) :
								printf( __( '<span class="arc-title">Monthly Archives:</span> %s', 'hardpressed' ), '<span class="arc-item">' . get_the_date( 'F Y' ) . '</span>' );
							elseif ( is_year() ) :
								printf( __( '<span class="arc-title">Yearly Archives:</span> %s', 'hardpressed' ), '<span class="arc-item">' . get_the_date( 'Y' ) . '</span>' );
							else :
								_e( '<span class="arc-title">Archives</span>', 'hardpressed' );
							endif;
						?>
					</h1>
				</header>

				<?php rewind_posts(); ?>
				<?php /* Adds Odd/Even Classes */
				$i=0;
				$class=array('odd','even'); ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
                  <div class="<?php echo $class[$i++%2]; ?>">
					<?php
						/* Include the Post-Format-specific template for the content.
						 */
						get_template_part( 'content', get_post_format() );
					?>
                  </div>
				<?php endwhile; ?>

				<?php if (function_exists("hardpressed_pagination")) {
							hardpressed_pagination(); 
				} elseif (function_exists("hardpressed_content_nav")) { 
							hardpressed_content_nav( 'nav-below' );
				}?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'hardpressed' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content post-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'hardpressed' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

        </div> <!-- end #main -->

        <?php get_sidebar(); ?>

    </div> <!-- end #content -->
        
<?php get_footer(); ?>