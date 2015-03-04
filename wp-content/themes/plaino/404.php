<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package plaino
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main entry-content">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'plaino' ); ?></h1>
				</header><!-- .page-header -->

				<div class="entry-content">
					<p><?php _e( '<br>It looks like nothing was found at this location. Maybe try one of the links on right or a search?', 'plaino' ); ?></p>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
