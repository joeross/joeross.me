<?php
/**
 * @package semplicemente
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if ( '' != get_the_post_thumbnail() ) {
			echo '<div class="entry-featuredImg">';
			the_post_thumbnail('normal-post');
			echo '</div>';
		}
	?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php semplicemente_posted_on(); ?>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="comments-link"><i class="fa fa-comments-o spaceRight"></i><?php comments_popup_link( __( 'Leave a comment', 'semplicemente' ), __( '1 Comment', 'semplicemente' ), __( '% Comments', 'semplicemente' ) ); ?></span>
			<?php endif; ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'semplicemente' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			$category_list = get_the_category_list( ' ' );

			$tag_list = get_the_tag_list( '', ' ' );

			if ( ! semplicemente_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = '<div class="dataBottom"><i class="fa spaceRight fa-tags"></i>%2$s</div>';
				} else {
					$meta_text = '<div class="dataBottom"><i class="fa spaceRight fa-link"></i><a href="%3$s" rel="bookmark">%3$s</a>.</div>';
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = '<div class="dataBottom"><i class="fa spaceRight fa-folder-open-o"></i>%1$s<br/><i class="fa spaceRight fa-tags"></i>%2$s</div>';
				} else {
					$meta_text = '<div class="dataBottom"><i class="fa spaceRight fa-folder-open-o"></i>%1$s</div>';
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

		<?php edit_post_link( __( 'Edit', 'semplicemente' ), '<span class="edit-link"><i class="fa fa-pencil-square-o spaceRight"></i>', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
