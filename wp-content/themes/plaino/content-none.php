<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package plaino
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'plaino' ); ?></h1>
	</header><!-- .page-header -->

	<div class="entry-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( '<br>Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'plaino' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( '<br>Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'plaino' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( '<br>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'plaino' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
