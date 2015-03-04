<?php
/**
 * Functions loaded before classes.
 * 
 * @todo Functions will be modified
 * 
 * @package Imprint
 * @subpackage Core
 * @category Functions
 * @since Imprint 1.0
 */



/**
 * Defines the number of characters for post excerpts
 * and is added to excerpt_length filter.
 * 
 * @since Imprint 1.0
 * @return int
 */
function imprint_excerpt_length( $length ) {
	return 60;
}
add_filter( 'excerpt_length', 'imprint_excerpt_length' );



/**
 * Defines the text for the (read more) link for post excerpts
 * and is added to excerpt_more filter.
 * 
 * @since Imprint 1.0
 * @return string
 */
function imprint_auto_excerpt_more( $more ) {
	return ' &hellip;' ;
}
add_filter( 'excerpt_more', 'imprint_auto_excerpt_more' );



/**
 * Displays the content in case of 404 page, empty search query
 * and any other query which does not output any result.
 * 
 * Both heading and content of the page will be displayed with a
 * search form. Any modification to this module will effect only
 * 404 error or related pages.
 * 
 * @since Imprint 1.0
 */
function imprint_archive_empty() {
?>
    <div class="archive-meta-container">
	<div class="archive-head">
            <?php if ( is_404() ) : ?>
                <h1><?php _e( 'Ooops! Nothing Found', 'imprint' ); ?></h1>
            <?php elseif( is_search() ) : ?>
                <h1><?php printf( __( 'Nothing found for: %s', 'imprint' ), get_search_query() ); ?></h1>
            <?php else : ?>
                <h1><?php printf( __( 'Nothing found for: %s', 'imprint' ), single_term_title( '', false ) ); ?></h1>
            <?php endif; ?>
	</div>
    </div><!-- Archive Meta Container ends -->

    <div class="archive-loop-container archive-empty">
	<div class="archive-excerpt">
            <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'imprint' ); ?></p>
		<?php get_search_form(); ?>
	</div>
    </div><?php
}
add_action( 'imprint_404_content_hook', 'imprint_archive_empty' );



/**
 * Displays the navigation links for the archive pages. Is only
 * applicable if the total number of pages is more than 'one'.
 * 
 * @since Imprint 1.0
 */
function imprint_archive_nav() {
	global $wp_query; // Call the Global $wp_query object.
	
	// If the total number of archive pages is more than one.
	if ( $wp_query->max_num_pages > 1 ):
?>
<div class="archive-nav">
    <div class="nav-previous"><?php next_posts_link( __( 'Older posts <span class="meta-nav">&rarr;</span>', 'imprint' ) ); ?></div>
    <div class="nav-next"><?php previous_posts_link( __( '<span class="meta-nav">&larr;</span> Newer posts', 'imprint' ) ); ?></div>
</div>
<?php
endif;
}



/**
 * Modifies the basic behaviour of Wordpress by removing the
 * 'category' value from the 'rel' HTML attribute and replacing
 * it by 'tag' value.
 *
 * NOTE: Although this is unneccesary but because 'category' as 
 * 'rel' attribute value is not the part of HTML specification,
 * it is better to replace it with the standard 'tag' value. 
 * Without this procedure HTML will not be accurately validated.
 * 
 * @since Imprint 1.0
 */
function imprint_add_nofollow_cat( $text ) {
	$text = str_replace('rel="category"', 'rel="tag"', $text);
	$text = str_replace('rel="category tag"', 'rel="tag"', $text);
	return $text;
}
add_filter( 'the_category', 'imprint_add_nofollow_cat' );



/**
 * Adds custom CSS classes to the post_class filter.
 * 
 * @since Imprint 1.0
 */
function imprint_post_class( $classes ) {
	if ( is_page() ){
	// Custom CSS class added if the display query is page.
		$classes[] = 'page-container';
		$classes[] = 'post-template';
	}elseif ( is_single() ){
	// Custom CSS class added if the display query is post.
		$classes[] = 'post-container';
		$classes[] = 'post-template';
	}else {
	// Custom CSS class added if the display query is archive or any other than page or post.
		$classes[] = 'archive-loop-container';
	}

	return $classes; // Return variable
}
add_filter( 'post_class', 'imprint_post_class' );



/**
 * Displays the meta values of a post or page when viewed individually
 * and not in the archive pages.
 * 
 * @since Imprint 1.0
 */
function imprint_posted_on() {
    
    printf( __( '<span class="meta-date-url">Posted on</span> %1$s<span class="meta-author-url">, By %2$s </span>', 'imprint' ),
        sprintf( '<span class="entry-date">%1$s</span>',
            get_the_date()
	),
            sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
                get_author_posts_url( get_the_author_meta( 'ID' ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'imprint' ), get_the_author() ) ),
		get_the_author()
            )
	);
}



/**
 * Displays the title of the Wordpress site.
 * 
 * @since Imprint 1.0
 */
function imprint_logo() {
    global $imprint_options;
            
        if( $imprint_options['disable_logo_img'] || empty($imprint_options['logo_img'] )):

            ?>
            <div id="site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
                </a>
            </div>
            <?php if(!$imprint_options['disable_site_desc']): ?>
            <div id="site-description">
                <?php bloginfo( 'description' ); ?>
            </div>
            <?php endif; ?>
        <?php

        else:

            ?>
            <div id="site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                    <img src="<?php echo $imprint_options['logo_img'] ?>"/>
                </a>
            </div>
            <?php

        endif;
}



/**
 * Returns a value which will be used in date archive pages 
 * in the description of that specific archive page.
 *
 * @since Imprint 1.0
 * @return string
 */
function imprint_date_text() {
	if ( is_date() ):
		if ( is_day() ):
			$date_text = __('Day', 'imprint');
		elseif ( is_month() ):
			$date_text = __('Month', 'imprint');
		elseif ( is_year() ):
			$date_text = __('Year', 'imprint');
		else:
			$date_text = __('Period', 'imprint');
		endif;
		
		return $date_text;

	endif;
}



/**
 * Calls the recent comments widget and is called by 
 * Primary sidebar (Default).
 * 
 * @since Imprint 1.0
 */
function imprint_recent_comments_widget() {
	$comments = get_comments( array( 'status' => 'approve', 'post_status' => 'publish', 'number' => 5  ) );
	if ( $comments ):
		foreach ( (array) $comments as $comment ) 
		{
			echo '<li class="recentcomments">' . sprintf( _x( '%1$s on %2$s', 'widgets', 'imprint' ), get_comment_author_link($comment->comment_ID), '<a href="' . esc_url( get_comment_link($comment->comment_ID) ) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
		}
	endif;				
}



/**
 * Adds favicon icon link in the <head></head> section
 * of the theme and only when favicon option is activated
 * in the database.
 *
 * @since Imprint 1.0
 */
function imprint_favicon() {
        global $imprint_options;
	if ( $imprint_options['favicon'] ):
            echo '<link rel="shortcut icon" href="' . esc_attr( $imprint_options['favicon'] ) . '" type="image/x-icon" />';
	endif;
}
add_action( 'wp_head', 'imprint_favicon' );



/**
 * Modifies the default title of the blog and is
 * hooked to wp_title filter.
 *
 * @since Imprint 1.0
 */
function imprint_modify_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'imprint' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'imprint_modify_title', 10, 2 );



/**
 * Template for comments and pingbacks.
 * 
 * @since Imprint 1.0
 */
function imprint_comment_callback( $comment, $args, $depth ) {

  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ):

         case '' :
		 // Proceed with normal comments.
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
      <div id="comment-<?php comment_ID(); ?>" class="comment-block-container">
          
                      <div class="comment-info-container">
                          <div class="comment-author vcard">
                              <div class="comment-author-avatar-container"><?php echo get_avatar($comment, 40); ?></div>
                              <div class="comment-author-info-container">
                                  <div class="comment-author-name"><?php printf(__('%s <span class="says">says:</span>', 'imprint'), sprintf('<cite class="fn">%s</cite>', get_comment_author_link())); ?></div>
                                  <div class="comment-awaiting"><?php if ($comment->comment_approved == '0') : ?><em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'imprint'); ?></em><?php endif; ?></div>
                                  <div class="comment-meta commentmetadata"><a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"><?php printf(__('%1$s at %2$s', 'imprint'), get_comment_date(), get_comment_time()); ?></a></div>                                  
                              </div>
                          </div><!-- .comment-author .vcard -->
                     </div>
          
                     <div class="comment-body-container">
                        <div class="comment-body"><?php comment_text(); ?></div>
                        <div class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
                        <?php edit_comment_link(__('(Edit)', 'imprint'), '<div class="comment-edit">', '</div>');?>
                     </div>

      </div><!-- #comment-##  -->

<?php
         break;

         case 'pingback' :
  ?>

  <li class="post pingback">
      <p><?php _e( 'Pingback:', 'imprint' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'imprint' ), ' ' ); ?></p>

<?php
        break;

        case 'trackback' :
		 // Display trackbacks differently than normal comments.
  ?>

  <li class="post trackback">
      <p><?php _e( 'Trackback:', 'imprint' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'imprint' ), ' ' ); ?></p>

  <?php
         break;

  endswitch;
}



/**
 * Runs the Wordpress Loop
 * 
 * @since Imprint 1.0
 */
function imprint_run_the_loop() {
    while( have_posts() ): the_post();
    get_template_part( 'loop', get_post_format() );
    endwhile;
}


/**
 * Call the Top sidebar if active.
 * 
 * @since Imprint 1.0
 */
function imprint_sidebar_top() {
	if ( is_active_sidebar( 'sidebar_top'  ) ) :
?>
	<div id="sidebar-top" class="sidebar">
		<?php dynamic_sidebar( 'sidebar_top'  ); ?>
	</div>
<?php
	endif;
}


/**
 * Cleans the Header Style Tags
 * 
 * @param string $input
 * @return string
 * @since Imprint 1.0
 */
function imprint_clean_style_tag($input) {
  preg_match_all("!<link rel='stylesheet'\s?(id='[^']+')?\s+href='(.*)' type='text/css' media='(.*)' />!", $input, $matches);
  // Only display media if it's print
  $media = $matches[3][0] === 'print' ? ' media="print"' : '';
  return '<link rel="stylesheet" href="' . $matches[2][0] . '"' . $media . '>' . "\n";
}
add_filter('style_loader_tag', 'imprint_clean_style_tag');


/**
 * Modify Imprint Options for theme.
 * 
 * @since Imprint 1.0
 */
function imprint_add_up_options(){
    global $imprint_options;
    
    $imprint_options['disable_header'] = false;
    $imprint_options['disable_pri_menu'] = false;
    $imprint_options['disable_rm'] = false;
    $imprint_options['rm_text'] = 'Continue Reading...';
    $imprint_options['disable_bott_menu'] = false;
    $imprint_options['disable_ab'] = false;
}
