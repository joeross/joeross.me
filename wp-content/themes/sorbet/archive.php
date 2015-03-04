<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sorbet
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'sorbet' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'sorbet' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'sorbet' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'sorbet' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'sorbet' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'sorbet' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'sorbet' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'sorbet');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'sorbet');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'sorbet' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'sorbet' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'sorbet' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'sorbet' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'sorbet' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'sorbet' );

						else :
							_e( 'Archives', 'sorbet' );

						endif;
					?>
				</h1>
				<?php if ( is_author() ) : ?>
					<div class="author-archives-header">
						<?php
								/* Queue the first post, that way we know
								 * what author we're dealing with (if that is the case).
								*/
								the_post();
								print( '<div class="author-info">' );
								printf( '<span class="author-archives-name">' . __( '%s', 'sorbet' ) . '</span>', '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
								printf( '<span class="author-archives-url">' . __( '%s', 'sorbet' ) . '</span>', '<a href="' .esc_url( get_the_author_meta( 'user_url', get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() . '\'s website' ) . '">' . get_the_author_meta( 'user_url', get_the_author_meta( 'ID' ) ) . '</a>' );
								printf( '<span class="author-archives-bio">' . __( '%s', 'sorbet' ) . '</span>', get_the_author_meta( 'user_description', get_the_author_meta( 'ID' ) ) );
								print( '</div>' );
								printf( '<span class="author-archives-img">%1$s</span>', get_avatar( get_the_author_meta( 'ID' ), '74' ) );
						?>
					</div>

					<?php rewind_posts(); ?>

				<?php endif; ?>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php sorbet_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
