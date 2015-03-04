<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Radium
 */

if ( ! function_exists( 'radium_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function radium_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'radium' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'radium' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'radium' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'radium_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function radium_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'radium' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'radium' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'radium' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'radium_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function radium_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', 'radium' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( '%s', 'post author', 'radium' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';
	
	if ( ! post_password_required() ) {
		echo '<span class="comments-link">';	
		comments_popup_link( __('Leave a comment', 'radium'), __( '1 Comment', 'radium' ), __( '% Comments', 'radium' ), __('Comments Off', 'radium'));
		echo '</span>';
	}

}
endif;

if ( ! function_exists( 'radium_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function radium_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		$categories_list = get_the_category_list( __( ' ', 'radium' ) );
		if ( $categories_list && radium_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'radium' ) . '</span>', $categories_list );
		}

		$tags_list = get_the_tag_list( '', __( ' ', 'radium' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'radium' ) . '</span>', $tags_list );
		}
	}
	edit_post_link( __( 'Edit', 'radium' ), '<span class="edit-link">', '</span>' );
}
endif;

if ( ! function_exists( 'radium_comments_number' ) ) :
/**
 * Prints HTML with meta information for the comments.
 */
function radium_comments_number() {

	if ( ! post_password_required() ) {
		echo '<span class="comments-link">';	
		comments_popup_link( __('Leave a comment', 'radium'), __( '1 Comment', 'radium' ), __( '% Comments', 'radium' ), __('comments-link', 'radium'), __('Comments Off', 'radium'));
		echo '</span>';
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function radium_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'radium_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'radium_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so radium_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so radium_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in radium_categorized_blog.
 */
function radium_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'radium_categories' );
}
add_action( 'edit_category', 'radium_category_transient_flusher' );
add_action( 'save_post',     'radium_category_transient_flusher' );
