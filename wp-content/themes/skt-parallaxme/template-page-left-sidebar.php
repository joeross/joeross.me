<?php
/*
Template Name: Left Sidebar
*/

get_header(); ?>

<div id="primary" class="content-area">
    <div id="content" class="site-content container">
        <section class="site-main fright" id="sitemain">
            <div class="blog-post">
				<?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', 'page' ); ?>
                    <?php
					//If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
                    ?>
                <?php endwhile; // end of the loop. ?>
            </div><!-- blog-post -->
        </section>
        <div class="fleft">
	        <?php get_sidebar();?>
        </div>
        <div class="clear"></div>
    </div>
</div>
	
<?php get_footer(); ?>