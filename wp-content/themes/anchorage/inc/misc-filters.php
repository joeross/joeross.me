<?php

/**
 * anchorage filtration.
 *
 * Miscellaneous filter functions for things like post class, body class,
 * menu item classes, etc.
 *
 * @package WordPress
 * @subpackage anchorage
 * @since  anchorage 1.0
 */

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 *
 * @since anchorage 1.0
 */
if( ! function_exists( 'anchorage_body_class' ) ) {
	function anchorage_body_class( $classes ) {
		
		// Add a class to respond to is_multi_author().
		if ( ! is_multi_author() ) {
			$classes[] = 'single-author';
		} else {
			$classes[] = 'multi-author';
		}

		if ( ! get_option( 'show_avatars' ) ){ $classes[] = 'no-avatars'; }

		return $classes;

	}
}
add_filter( 'body_class', 'anchorage_body_class' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds post classes:
 * 1. Adds our standard 'inner-wrapper' class, used for layout styles.
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 *
 * @since anchorage 1.0
 */
if( ! function_exists( 'anchorage_post_class' ) ) {
	function anchorage_post_class( $classes ) {

		global $post;

		if( is_single( $post ) ) {
			$classes[] = 'hentry-single';
		}

		$classes[] = 'inner-wrapper';

		return $classes;

	}
}
add_filter( 'post_class', 'anchorage_post_class' );

/**
 * Filter and return the post password form.
 *
 * @since anchorage 1.0
 * @return  string The post password form, filtered.
 */
if( ! function_exists( 'anchorage_get_post_password_form' ) ) {
	function anchorage_get_post_password_form() {
	    
	    global $post;
	    
	    // Build a unique string for each post to use as a "for" attribute.
	    $slug   = sanitize_html_class( $post -> post_name );
	    $id     = absint( $post -> ID );
	    $unique = $slug . $id;
	    
	    // Build the form label.
	    $label = __( 'To view this protected post, enter the password below:', 'anchorage' );
	   
	    // Build the url to which the form submits.
	    $url = esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) );
	    
	    // The form submit text.
	    $submit = esc_attr__( 'Submit', 'anchorage' );
	    
	    $out = "
	    	<form action='$url' method='post' class='post-password-form'>
	    		<label for='$unique'>$label</label>
	    		<input name='post_password' id='$unique' type='password'>
	    		<input type='submit' name='Submit' value='$submit' class='button'>
	    	</form>
	    ";

	    /**
	     * This function will get hit with whatever filters hit the_content, to include wpautop,
	     * so let's strip any line breaks to avoid unwanted <p> tags.
	     */
	    $out = trim( preg_replace( '/\s+/', ' ', $out ) );

	    return $out;
	}
}
add_filter( 'the_password_form', 'anchorage_get_post_password_form' );

/**
 * The cancel-reply-link is clutter.
 *
 * @since anchorage 1.0
 */
add_filter( 'cancel_comment_reply_link', '__return_false' );