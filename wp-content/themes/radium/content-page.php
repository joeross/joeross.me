<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Radium
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php if ( '' != get_theme_mod( 'post_sidebar' ) ) { get_sidebar();} ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<!-- Get the featured image -->
		<?php if ( ( '' != get_the_post_thumbnail() ) && ( '' == get_theme_mod( 'featured_header' ) ) ) { ?>
			<p><a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'large-image' ); ?></a></p>
		<?php } ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'radium' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer clear">
		<?php edit_post_link( __( 'Edit', 'radium' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
