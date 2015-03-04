<?php
/**
 * Core functions and definitions
 *
 * Sets up the theme
 *
 * The first function, catchbase_initial_setup(), sets up the theme by registering support
 * for various features in WordPress, such as theme support, post thumbnails, navigation menu, and the like.
 *
 * Catchbase functions and definitions
 *
 * @package Catch Themes
 * @subpackage Catch Base
 * @since Catch Base 1.0 
 */

if ( ! defined( 'CATCHBASE_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}
	

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 1200; /* pixels */


if ( ! function_exists( 'catchbase_content_width' ) ) :
	/**
	 * Change the content width based on the Theme Settings and Page/Post Settings
	 */
	function catchbase_content_width() {
		global $post, $wp_query, $content_width;

		//Getting Ready to load options data
		$options					= catchbase_get_theme_options();
		
		$themeoption_layout 		= $options['theme_layout'];
		
		// Front page displays in Reading Settings
		$page_on_front = get_option('page_on_front') ;
		$page_for_posts = get_option('page_for_posts');

		// Get Page ID outside Loop
		$page_id = $wp_query->get_queried_object_id();

		// Blog Page setting in Reading Settings
		if ( $page_id == $page_for_posts ) {
			$layout = get_post_meta( $page_for_posts,'catchbase-sidebarlayout', true );
		}
		elseif ( $post)  {
			if ( is_attachment() ) {
				$parent = $post->post_parent;
				$layout = get_post_meta( $parent,'catchbase-sidebarlayout', true );
			} else {
				$layout = get_post_meta( $post->ID,'catchbase-sidebarlayout', true );
			}
		}

		if ( empty( $layout ) || ( !is_page() && !is_single() ) ) {
			$layout='default';
		}

		// Theme Columns: Default width sidebars
		if ( $layout == 'three-columns' || ( $layout=='default' && $themeoption_layout == 'three-columns' ) ) {
			$content_width = 540;
		}
		// Two Colums: Left and Right Sidebar & One Column: No Sidbear
		elseif ( $layout == 'right-sidebar' || $layout == 'left-sidebar' || $layout == 'no-sidebar' || ( $layout=='default' && $themeoption_layout == 'right-sidebar' ) || ( $layout=='default' && $themeoption_layout == 'left-sidebar' ) || ( $layout=='default' && $themeoption_layout == 'no-sidebar' ) ) {
			$content_width = 780;
		}	
	}
endif;
add_action( 'template_redirect', 'catchbase_content_width' );


if ( ! function_exists( 'catchbase_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 */
	function catchbase_setup() {
		/**
		 * Get Theme Options Values
		 */		
		$options 	= catchbase_get_theme_options();

		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 * If you're building a theme based on catchbase, use a find and replace
		 * to change 'catchbase' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'catchbase', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to head
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Enable support for Post Thumbnails on posts and pages
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// Add Catchbase custom image sizes
    	add_image_size( 'catchbase-featured-content', 400, 225, true); // used in Featured Content Options Ratio 16:9

        add_image_size( 'catchbase-slider', 1200, 514, true); // used in Featured Slider Ratio 21:9

		//One Archive Image
    	add_image_size( 'catchbase-featured', 780, 439, true); // used in Archive Landecape Ratio 16:9

    	/**
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus( array(
			'primary' 	=> __( 'Primary Menu', 'catchbase' ),
			'secondary' => __( 'Secondary Menu', 'catchbase' ),
		) );

		/**
		 * Enable support for Post Formats
		 */
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

		/**
		 * Setup the WordPress core custom background feature.
		 */
		if ( $options['color_scheme'] != 'light' ) {
			$default_color = '111';
		}
		else {
			$default_color = 'f2f2f2';
		}
		add_theme_support( 'custom-background', apply_filters( 'catchbase_custom_background_args', array(
			'default-color' => $default_color
		) ) );

		/**
		 * Setup Editor style
		 */
		add_editor_style( 'css/editor-style.css' );

		/**
		 * Setup title support for theme
		 * Supported from WordPress version 4.1 onwards 
		 * More Info: https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Setup Infinite Scroll using JetPack if navigation type is set
		 */
		$pagination_type	= $options['pagination_type'];

		if( 'infinite-scroll-click' == $pagination_type ) {
			add_theme_support( 'infinite-scroll', array(
				'type'		=> 'click',
				'container' => 'main',
				'footer'    => 'page'
			) );
		}
		else if ( 'infinite-scroll-scroll' == $pagination_type ) {
			add_theme_support( 'infinite-scroll', array(
				'type'		=> 'scroll',
				'container' => 'main',
				'footer'    => 'page'
			) );
		}
	}
endif; // catchbase_setup
add_action( 'after_setup_theme', 'catchbase_setup' );


/**
 * Enqueue scripts and styles
 *
 * @uses  wp_register_script, wp_enqueue_script, wp_register_style, wp_enqueue_style, wp_localize_script
 * @action wp_enqueue_scripts
 *
 * @since  Catchbase 1.0
 */
function catchbase_scripts() {
	$options			= catchbase_get_theme_options();

	wp_enqueue_style( 'catchbase-style', get_stylesheet_uri() );

	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.min.js', array(), '20120206', true );

	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.min.js', array(), '20130115', true );

	/**
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//For genericons
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/css/genericons/genericons.css', false, '3.3' );

	/**
	 * Enqueue the styles for the current color scheme for catchbase.
	 */
	if ( $options['color_scheme'] != 'light' )
		wp_enqueue_style( 'dark', get_template_directory_uri() . '/css/colors/'. $options['color_scheme'] .'.css', array(), null );
	
	/**
	 * Loads up Responsive stylesheet and Menu JS
	 */
	wp_enqueue_style( 'catchbase-responsive', get_template_directory_uri() . '/css/responsive.css' );

	//Responsive Menu		
	wp_enqueue_script('sidr', get_template_directory_uri() . '/js/jquery.sidr.min.js', array('jquery'), '1.2.1 - 2013-11-06', false );	

	wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/fitvids.min.js', array( 'jquery' ), '1.1', true );
	

	/**
	 * Loads up Cycle JS
	 */
	if( $options['featured_slider_option'] != 'disabled' ) {
		wp_register_script( 'jquery.cycle2', get_template_directory_uri() . '/js/jquery.cycle/jquery.cycle2.min.js', array( 'jquery' ), '2.1.5', true );

		/**
		 * Condition checks for additional slider transition plugins
		 */
		// Scroll Vertical transition plugin addition
		if ( 'scrollVert' ==  $options['featured_slide_transition_effect'] ){
			wp_enqueue_script( 'jquery.cycle2.scrollVert', get_template_directory_uri() . '/js/jquery.cycle/jquery.cycle2.scrollVert.min.js', array( 'jquery.cycle2' ), '20140128', true );
		}
		// Flip transition plugin addition
		else if ( 'flipHorz' ==  $options['featured_slide_transition_effect'] || 'flipVert' ==  $options['featured_slide_transition_effect'] ){
			wp_enqueue_script( 'jquery.cycle2.flip', get_template_directory_uri() . '/js/jquery.cycle/jquery.cycle2.flip.min.js', array( 'jquery.cycle2' ), '20140128', true );
		}
		// Suffle transition plugin addition
		else if ( 'tileSlide' ==  $options['featured_slide_transition_effect'] || 'tileBlind' ==  $options['featured_slide_transition_effect'] ){
			wp_enqueue_script( 'jquery.cycle2.tile', get_template_directory_uri() . '/js/jquery.cycle/jquery.cycle2.tile.min.js', array( 'jquery.cycle2' ), '20140128', true );
		}
		// Suffle transition plugin addition
		else if ( 'shuffle' ==  $options['featured_slide_transition_effect'] ){
			wp_enqueue_script( 'jquery.cycle2.shuffle', get_template_directory_uri() . '/js/jquery.cycle/jquery.cycle2.shuffle.min.js', array( 'jquery.cycle2' ), '20140128 ', true );
		}
		else {
			wp_enqueue_script( 'jquery.cycle2' );
		}
	}

	/**
	 * Loads up Scroll Up script
	 */	
	wp_enqueue_script( 'catchbase-scrollup', get_template_directory_uri() . '/js/catchbase-scrollup.min.js', array( 'jquery' ), '20072014', true  );

	/**
	 * Enqueue custom script for catchbase.
	 */
	wp_enqueue_script( 'catchbase-custom-scripts', get_template_directory_uri() . '/js/catchbase-custom-scripts.min.js', array( 'jquery' ), null );
}
add_action( 'wp_enqueue_scripts', 'catchbase_scripts' );


/**
 * Enqueue scripts and styles for Metaboxes
 * @uses wp_register_script, wp_enqueue_script, and  wp_enqueue_style
 *
 * @action admin_print_scripts-post-new, admin_print_scripts-post, admin_print_scripts-page-new, admin_print_scripts-page
 *
 * @since Catchbase 1.0
 */
function catchbase_enqueue_metabox_scripts() {
    //Scripts
	wp_register_script( 'jquery-cookie', get_template_directory_uri() . '/js/jquery.cookie.min.js' );
	wp_enqueue_script( 'catchbase-metabox', get_template_directory_uri() . '/js/catchbase-metabox.min.js', array( 'jquery-ui-tabs', 'jquery-cookie' ), '2013-10-05' );
	
	//CSS Styles
	wp_enqueue_style( 'catchbase-metabox-tabs', get_template_directory_uri() . '/css/catchbase-metabox-tabs.css' );
}
add_action( 'admin_print_scripts-post-new.php', 'catchbase_enqueue_metabox_scripts', 11 );
add_action( 'admin_print_scripts-post.php', 'catchbase_enqueue_metabox_scripts', 11 );
add_action( 'admin_print_scripts-page-new.php', 'catchbase_enqueue_metabox_scripts', 11 );
add_action( 'admin_print_scripts-page.php', 'catchbase_enqueue_metabox_scripts', 11 );


/**
 * Default Options.
 */
require get_template_directory() . '/inc/catchbase-default-options.php';

/**
 * Custom Header.
 */
require get_template_directory() . '/inc/catchbase-custom-header.php';


/**
 * Structure for catchbase
 */
require get_template_directory() . '/inc/catchbase-structure.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer-includes/catchbase-customizer.php';


/**
 * Custom Menus
 */
require get_template_directory() . '/inc/catchbase-menus.php';


/**
 * Load Slider file.
 */
require get_template_directory() . '/inc/catchbase-featured-slider.php';


/**
 * Load Featured Content.
 */
require get_template_directory() . '/inc/catchbase-featured-content.php';


/**
 * Load Breadcrumb file.
 */
require get_template_directory() . '/inc/catchbase-breadcrumb.php';


/**
 * Load Widgets and Sidebars
 */
require get_template_directory() . '/inc/catchbase-widgets.php';


/**
 * Load Social Icons
 */
require get_template_directory() . '/inc/catchbase-social-icons.php';


/**
 * Load Metaboxes
 */
require get_template_directory() . '/inc/catchbase-metabox.php';


/**
 * Returns the options array for catchbase.
 * @uses  get_theme_mod
 *
 * @since Catchbase 1.0
 */
function catchbase_get_theme_options() {
	return get_theme_mod( 'catchbase_theme_options', catchbase_get_default_theme_options() );
}


/**
 * Flush out all transients
 *
 * @uses delete_transient 
 * 
 * @action customize_save, catchbase_customize_preview (see catchbase_customizer function: catchbase_customize_preview)
 * 
 * @since  Catchbase 1.0
 */
function catchbase_flush_transients(){
	delete_transient( 'catchbase_featured_content' );
	
	delete_transient( 'catchbase_featured_slider' );

	delete_transient( 'catchbase_favicon' );

	delete_transient( 'catchbase_webclip' );

	delete_transient( 'catchbase_custom_css' );

	delete_transient( 'catchbase_footer_content' );	

	delete_transient( 'catchbase_promotion_headline' );

	delete_transient( 'catchbase_featured_image' );

	delete_transient( 'catchbase_social_icons' );	

	delete_transient( 'catchbase_scrollup' );

	delete_transient( 'all_the_cool_cats' );

	//Add Catchbase default themes if there is no values
	if ( !get_theme_mod('catchbase_theme_options') ) {
		set_theme_mod( 'catchbase_theme_options', catchbase_get_default_theme_options() );
	}
}
add_action( 'customize_save', 'catchbase_flush_transients' );

/**
 * Flush out category transients
 *
 * @uses delete_transient 
 * 
 * @action edit_category
 * 
 * @since  Catchbase 1.0
 */
function catchbase_flush_category_transients(){
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'catchbase_flush_category_transients' );


/**
 * Flush out post related transients
 *
 * @uses delete_transient 
 * 
 * @action save_post
 * 
 * @since  Catchbase 1.0
 */
function catchbase_flush_post_transients(){
	delete_transient( 'catchbase_featured_content' );
	
	delete_transient( 'catchbase_featured_slider' );

	delete_transient( 'catchbase_featured_image' );

	delete_transient( 'all_the_cool_cats' );
}
add_action( 'save_post', 'catchbase_flush_post_transients' );


if ( ! function_exists( 'catchbase_favicon' ) ) :
	/**
	 * Get the favicon Image options
	 *
	 * @uses favicon 
	 * @get the data value of image from options
	 * @display favicon
	 *
	 * @uses set_transient
	 *
	 * @action wp_head, admin_head
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_favicon() {
		if( ( !$catchbase_favicon = get_transient( 'catchbase_favicon' ) ) ) {
			$options 	= catchbase_get_theme_options();
			
			echo '<!-- refreshing cache -->';
			
			if ( isset( $options[ 'favicon' ] ) &&  $options[ 'favicon' ] != '' &&  !empty( $options[ 'favicon' ] ) ) {
				// if not empty fav_icon on options
				$catchbase_favicon = '<link rel="shortcut icon" href="'.esc_url( $options[ 'favicon' ] ).'" type="image/x-icon" />'; 	
			}

			set_transient( 'catchbase_favicon', $catchbase_favicon, 86940 );	
		}
		echo $catchbase_favicon ;	
	}
endif; //catchbase_favicon
//Load Favicon in Header Section
add_action( 'wp_head', 'catchbase_favicon' );
//Load Favicon in Admin Section
add_action( 'admin_head', 'catchbase_favicon' );


if ( ! function_exists( 'catchbase_web_clip' ) ) :
	/**
	 * Get the Web Clip Icon Image from options
	 *
	 * @uses web_clip and remove_web_clip 
	 * @get the data value of image from theme options
	 * @display web clip
	 *
	 * @uses default Web Click Icon if web_clip field on theme options is empty
	 *
	 * @uses set_transient and delete_transient 
	 *
	 * @action wp_head
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_web_clip() {
		if( ( !$catchbase_web_clip = get_transient( 'catchbase_web_clip' ) ) ) {
			$options 	= catchbase_get_theme_options();
			
			echo '<!-- refreshing cache -->';
			
			if ( isset( $options[ 'web_clip' ] ) &&  $options[ 'web_clip' ] != '' &&  !empty( $options[ 'web_clip' ] ) ){
				$catchbase_web_clip = '<link rel="apple-touch-icon-precomposed" href="'.esc_url( $options[ 'web_clip' ] ).'" />'; 	
			}

			set_transient( 'catchbase_web_clip', $catchbase_web_clip, 86940 );	
		}	
		echo $catchbase_web_clip ;	
	} // catchbase_web_clips
endif; //catchbase_web_clip
//Load Catchbase Icon in Header Section
add_action('wp_head', 'catchbase_web_clip');

if ( ! function_exists( 'catchbase_custom_css' ) ) :
	/**
	 * Enqueue Custon CSS
	 *
	 * @uses  set_transient, wp_head, wp_enqueue_style
	 *
	 * @action wp_enqueue_scripts
	 * 
	 * @since Catchbase 1.0
	 */
	function catchbase_custom_css() {
		//catchbase_flush_transients();
		$options 	= catchbase_get_theme_options();
		
		$defaults 	= catchbase_get_default_theme_options();
		
		if ( ( !$catchbase_custom_css = get_transient( 'catchbase_custom_css' ) ) ) {		
			$catchbase_custom_css ='';

			//Custom CSS Option		
			if( !empty( $options[ 'custom_css' ] ) ) {
				$catchbase_custom_css	.=  $options['custom_css'] . "\n";
			}

			if ( '' != $catchbase_custom_css ){
				echo '<!-- refreshing cache -->' . "\n";
				
				$catchbase_custom_css = '<!-- '.get_bloginfo('name').' inline CSS Styles -->' . "\n" . '<style type="text/css" media="screen">' . "\n" . $catchbase_custom_css;
			
				$catchbase_custom_css .= '</style>' . "\n";
			
			}
			
			set_transient( 'catchbase_custom_css', htmlspecialchars_decode( $catchbase_custom_css ), 86940 );
		}
		
		echo $catchbase_custom_css;
	}
endif; //catchbase_custom_css
add_action( 'wp_head', 'catchbase_custom_css', 101  );


if ( ! function_exists( 'catchbase_content_nav' ) ) :
	/**
	 * Display navigation to next/previous pages when applicable
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_content_nav( $nav_id ) {
		global $wp_query, $post;

		// Don't print empty markup on single pages if there's nowhere to navigate.
		if ( is_single() ) {
			$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
			$next = get_adjacent_post( false, '', false );

			if ( ! $next && ! $previous )
				return;
		}
		
		// Don't print empty markup in archives if there's only one page.
		if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) ) {
			return;
		}

		$options			= catchbase_get_theme_options();
		
		$pagination_type	= $options['pagination_type'];

		$nav_class = ( is_single() ) ? 'site-navigation post-navigation' : 'site-navigation paging-navigation';
		
		/**
		 * Check if navigation type is Jetpack Infinite Scroll and if it is enabled, else goto default pagination
		 * if it's active then disable pagination
		 */
		if ( ( 'infinite-scroll-click' == $pagination_type || 'infinite-scroll-scroll' == $pagination_type ) && class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) {
			return false;
		}

		?>
	        <nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>">
	        	<h3 class="screen-reader-text"><?php _e( 'Post navigation', 'catchbase' ); ?></h3>
				<?php
				/**
				 * Check if navigation type is numeric and if Wp-PageNavi Plugin is enabled
				 */
				if ( 'numeric' == $pagination_type && function_exists( 'wp_pagenavi' ) ) {
					wp_pagenavi();
	            }
	            else { ?>	
	                <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'catchbase' ) ); ?></div>
	                <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'catchbase' ) ); ?></div>
	            <?php 
	            } ?>
	        </nav><!-- #nav -->	
		<?php
	}
endif; // catchbase_content_nav


if ( ! function_exists( 'catchbase_comment' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;

		if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

		<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
			<div class="comment-body">
				<?php _e( 'Pingback:', 'catchbase' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'catchbase' ), '<span class="edit-link">', '</span>' ); ?>
			</div>

		<?php else : ?>

		<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
				<footer class="comment-meta">
					<div class="comment-author vcard">
						<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
						<?php printf( __( '%s <span class="says">says:</span>', 'catchbase' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
					</div><!-- .comment-author -->

					<div class="comment-metadata">
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'catchbase' ), get_comment_date(), get_comment_time() ); ?>
							</time>
						</a>
						<?php edit_comment_link( __( 'Edit', 'catchbase' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .comment-metadata -->

					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'catchbase' ); ?></p>
					<?php endif; ?>
				</footer><!-- .comment-meta -->

				<div class="comment-content">
					<?php comment_text(); ?>
				</div><!-- .comment-content -->

				<?php
					comment_reply_link( array_merge( $args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<div class="reply">',
						'after'     => '</div>',
					) ) );
				?>
			</article><!-- .comment-body -->

		<?php
		endif;
	}
endif; // catchbase_comment()


if ( ! function_exists( 'catchbase_the_attached_image' ) ) :
	/**
	 * Prints the attached image with a link to the next attached image.
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_the_attached_image() {
		$post                = get_post();
		$attachment_size     = apply_filters( 'catchbase_attachment_size', array( 1200, 1200 ) );
		$next_attachment_url = wp_get_attachment_url();

		/**
		 * Grab the IDs of all the image attachments in a gallery so we can get the
		 * URL of the next adjacent image in a gallery, or the first image (if
		 * we're looking at the last image in a gallery), or, in a gallery of one,
		 * just the link to that image file.
		 */
		$attachment_ids = get_posts( array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => 1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID'
		) );

		// If there is more than 1 attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {
			foreach ( $attachment_ids as $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					$next_id = current( $attachment_ids );
					break;
				}
			}

			// get the URL of the next image attachment...
			if ( $next_id )
				$next_attachment_url = get_attachment_link( $next_id );

			// or get the URL of the first image attachment.
			else
				$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}

		printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
			esc_url( $next_attachment_url ),
			the_title_attribute( array( 'echo' => false ) ),
			wp_get_attachment_image( $post->ID, $attachment_size )
		);
	}
endif; //catchbase_the_attached_image


if ( ! function_exists( 'catchbase_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_entry_meta() {
		echo '<p class="entry-meta">';

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

		printf( '<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
			sprintf( _x( '<span class="screen-reader-text">Posted on</span>', 'Used before publish date.', 'catchbase' ) ),
			esc_url( get_permalink() ),
			$time_string
		);

		if ( is_singular() || is_multi_author() ) {
			printf( '<span class="byline"><span class="author vcard">%1$s<a class="url fn n" href="%2$s">%3$s</a></span></span>',
				sprintf( _x( '<span class="screen-reader-text">Author</span>', 'Used before post author name.', 'catchbase' ) ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			);
		}

		if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'catchbase' ), esc_html__( '1 Comment', 'catchbase' ), esc_html__( '% Comments', 'catchbase' ) );
			echo '</span>';
		}

		edit_post_link( esc_html__( 'Edit', 'catchbase' ), '<span class="edit-link">', '</span>' ); 

		echo '</p><!-- .entry-meta -->';
	}
endif; //catchbase_entry_meta


if ( ! function_exists( 'catchbase_tag_category' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags.
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_tag_category() {
		echo '<p class="entry-meta">';

		if ( 'post' == get_post_type() ) {
			$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'catchbase' ) );
			if ( $categories_list && catchbase_categorized_blog() ) {
				printf( '<span class="cat-links">%1$s%2$s</span>',
					sprintf( _x( '<span class="screen-reader-text">Categories</span>', 'Used before category names.', 'catchbase' ) ),
					$categories_list
				);
			}

			$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'catchbase' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">%1$s%2$s</span>',
					sprintf( _x( '<span class="screen-reader-text">Tags</span>', 'Used before tag names.', 'catchbase' ) ),
					$tags_list
				);
			}
		}

		echo '</p><!-- .entry-meta -->';
	}
endif; //catchbase_tag_category


if ( ! function_exists( 'catchbase_categorized_blog' ) ) :
	/**
	 * Returns true if a blog has more than 1 category
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
			// Create an array of all the categories that are attached to posts
			$all_the_cool_cats = get_categories( array(
				'hide_empty' => 1,
			) );

			// Count the number of categories that are attached to the posts
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'all_the_cool_cats', $all_the_cool_cats );
		}

		if ( '1' != $all_the_cool_cats ) {
			// This blog has more than 1 category so catchbase_categorized_blog should return true
			return true;
		} else {
			// This blog has only 1 category so catchbase_categorized_blog should return false
			return false;
		}
	}
endif; //catchbase_categorized_blog


/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since Catchbase 1.0
 */
function catchbase_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'catchbase_page_menu_args' );


/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 *
 * @since Catchbase 1.0
 */
function catchbase_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'catchbase_enhanced_image_navigation', 10, 2 );


if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	* Filters wp_title to print a neat <title> tag based on what is being viewed.
	*
	* @param string $title Default title text for current view.
	* @param string $sep Optional separator.
	* @return string The filtered title.
	*/
	function catchbase_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}
		
		global $page, $paged;
		
		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );
		
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}
		
		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
		}
		
		return $title;
		
	}
		
	add_filter( 'wp_title', 'catchbase_wp_title', 10, 2 );
	
	/**
	* Title shim for sites older than WordPress 4.1.
	*
	* @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	* @todo Remove this function when WordPress 4.3 is released.
	*/
	function catchbase_render_title() {
	?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php
	}
	add_action( 'wp_head', 'catchbase_render_title' );
endif;


/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 *
 * @since Catchbase 1.0
 */
function catchbase_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'footer-1' ) )
		$count++;

	if ( is_active_sidebar( 'footer-2' ) )
		$count++;

	if ( is_active_sidebar( 'footer-3' ) )
		$count++;

	if ( is_active_sidebar( 'footer-4' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
		case '4':
			$class = 'four';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}


if ( ! function_exists( 'catchbase_excerpt_length' ) ) :
	/**
	 * Sets the post excerpt length to n words.
	 *
	 * function tied to the excerpt_length filter hook.
	 * @uses filter excerpt_length
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_excerpt_length( $length ) {
		// Getting data from Customizer Options
		$options	= catchbase_get_theme_options();
		$length	= $options['excerpt_length'];
		return $length;
	}
endif; //catchbase_excerpt_length
add_filter( 'excerpt_length', 'catchbase_excerpt_length' );


if ( ! function_exists( 'catchbase_continue_reading' ) ) :
	/**
	 * Returns a "Custom Continue Reading" link for excerpts
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_continue_reading() {
		// Getting data from Customizer Options
		$options		=	catchbase_get_theme_options();
		$more_tag_text	= $options['excerpt_more_text'];

		return ' <a class="more-link" href="'. esc_url( get_permalink() ) . '">' .  sprintf( __( '%s', 'catchbase' ) , $more_tag_text ) . '</a>';
	}
endif; //catchbase_continue_reading
add_filter( 'excerpt_more', 'catchbase_continue_reading' );


if ( ! function_exists( 'catchbase_excerpt_more' ) ) :
	/**
	 * Replaces "[...]" (appended to automatically generated excerpts) with catchbase_continue_reading().
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_excerpt_more( $more ) {
		return catchbase_continue_reading();	
	}
endif; //catchbase_excerpt_more
add_filter( 'excerpt_more', 'catchbase_excerpt_more' );


if ( ! function_exists( 'catchbase_custom_excerpt' ) ) :
	/**
	 * Adds Continue Reading link to more tag excerpts.
	 *
	 * function tied to the get_the_excerpt filter hook.
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_custom_excerpt( $output ) {
		if ( has_excerpt() && ! is_attachment() ) {
			$output .= catchbase_continue_reading();
		}
		return $output;
	}
endif; //catchbase_custom_excerpt
add_filter( 'get_the_excerpt', 'catchbase_custom_excerpt' );


if ( ! function_exists( 'catchbase_more_link' ) ) :
	/**
	 * Replacing Continue Reading link to the_content more.
	 *
	 * function tied to the the_content_more_link filter hook.
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_more_link( $more_link, $more_link_text ) {
	 	$options		=	catchbase_get_theme_options();
		$more_tag_text	= $options['excerpt_more_text'];

		return str_replace( $more_link_text, $more_tag_text, $more_link );
	}
endif; //catchbase_more_link
add_filter( 'the_content_more_link', 'catchbase_more_link', 10, 2 );


if ( ! function_exists( 'catchbase_body_classes' ) ) :
	/**
	 * Adds Catchbase layout classes to the array of body classes.
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_body_classes( $classes ) {
		global $post;

		// Adds a class of group-blog to blogs with more than 1 published author
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		if ( $post ) {
	 		if ( is_attachment() ) { 
				$parent = $post->post_parent;
				
				$layout = get_post_meta( $parent,'catchbase-layout-option', true );
			} else {
				$layout = get_post_meta( $post->ID,'catchbase-layout-option', true ); 
			}
		}

		if ( empty( $layout ) || ( !is_page() && !is_single() ) ) {
			$layout='default';
		}

		$options 		= catchbase_get_theme_options();
			
		$current_layout = $options['theme_layout'];

		if( 'default' == $layout ) {
			$layout_selector = $current_layout;
		}
		else {
			$layout_selector = $layout;
		}

		switch ( $layout_selector ) {
			case 'left-sidebar':
				$classes[] = 'two-columns content-right';
			break;
			
			case 'right-sidebar':
				$classes[] = 'two-columns content-left';
			break;
			
			case 'three-columns':
				$classes[] = 'three-columns';
			break;
			
			case 'three-columns-secondary-sidebar-first':
				$classes[] = 'three-columns secondary-first';
			break;
			
			case 'three-columns-equal-sidebars':
				$classes[] = 'three-columns equal-sidebars';
			break;
			
			case 'three-columns-equal-columns':
				$classes[] = 'three-columns equal-columns';
			break;
			
			case 'three-columns-content-left':
				$classes[] = 'three-columns content-left';
			break;
			
			case 'three-columns-content-right':
				$classes[] = 'three-columns content-right';
			break;
			
			case 'no-sidebar':
				$classes[] = 'no-sidebar content-width';
			break;
			
			case 'no-sidebar-one-column':
				$classes[] = 'no-sidebar one-column';
			break;
			
			case 'no-sidebar-full-width':
				$classes[] = 'no-sidebar full-width';
			break;
		}

		$current_content_layout = $options['content_layout'];
		if( "" != $current_content_layout ) {
			$classes[] = $current_content_layout;
		}

		//Count number of menus avaliable and set class accordingly
		$mobile_menu_count = 1; // For primary menu
		
		if ( has_nav_menu( 'secondary' ) ) {
			$mobile_menu_count++;
		}

		if ( has_nav_menu( 'header-right' ) ) {
			$mobile_menu_count++;
		}

		switch ( $mobile_menu_count ) {
			case 1:
				$classes[] = 'mobile-menu-one';
				break;

			case 2:
				$classes[] = 'mobile-menu-two';
				break;

			case 3:
				$classes[] = 'mobile-menu-three';
				break;
		}	

		$classes 	= apply_filters( 'catchbase_body_classes', $classes );

		return $classes;
	}
endif; //catchbase_body_classes
add_filter( 'body_class', 'catchbase_body_classes' );


if ( ! function_exists( 'catchbase_responsive' ) ) :
	/**
	 * Responsive Layout
	 *
	 * @get the data value of responsive layout from theme options
	 * @display responsive meta tag
	 * @action wp_head
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_responsive() {
		$options 			= catchbase_get_theme_options();

		$catchbase_responsive = '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
		
		echo $catchbase_responsive;
	}
endif; //catchbase_responsive
add_filter( 'wp_head', 'catchbase_responsive', 1 );


if ( ! function_exists( 'catchbase_archive_content_image' ) ) :
	/**
	 * Template for Featured Image in Archive Content
	 *
	 * To override this in a child theme
	 * simply create your own catchbase_archive_content_image(), and that function will be used instead.
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_archive_content_image() {
		$options = catchbase_get_theme_options();
		
		$featured_image = $options['content_layout'];
			
		if ( has_post_thumbnail() && 'excerpt-featured-image' == $featured_image ) {
		?>
			<figure class="featured-image">
	            <a rel="bookmark" href="<?php the_permalink(); ?>">
	                <?php 
	                	the_post_thumbnail( 'catchbase-featured' );		                
					?>
				</a>
	        </figure>
	   	<?php
		}
	}
endif; //catchbase_archive_content_image
add_action( 'catchbase_before_entry_container', 'catchbase_archive_content_image', 10 );


if ( ! function_exists( 'catchbase_single_content_image' ) ) :
	/**
	 * Template for Featured Image in Single Post
	 *
	 * To override this in a child theme
	 * simply create your own catchbase_single_content_image(), and that function will be used instead.
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_single_content_image() {
		global $post, $wp_query;

		// Getting data from Theme Options
	   	$options = catchbase_get_theme_options();
		
		$featured_image = $options['single_post_image_layout'];
		
		// Get Page ID outside Loop
		$page_id = $wp_query->get_queried_object_id();
		
		if( $post ) {
	 		if ( is_attachment() ) { 
				$parent = $post->post_parent;
				$individual_featured_image = get_post_meta( $parent,'catchbase-featured-image', true );
			} else {
				$individual_featured_image = get_post_meta( $page_id,'catchbase-featured-image', true ); 
			}
		}

		if( empty( $individual_featured_image ) || ( !is_page() && !is_single() ) ) {
			$individual_featured_image = 'default';
		}

		if ( ( $individual_featured_image == 'disable' || '' == get_the_post_thumbnail() || ( $individual_featured_image=='default' && $featured_image == 'disabled') ) ) {
			echo '<!-- Page/Post Single Image Disabled or No Image set in Post Thumbnail -->';
			return false;
		}
		else { 
			$class = '';

			if ( 'default' == $individual_featured_image ) {
				$class = $featured_image;
			}
			else {
				$class = 'from-metabox ' . $individual_featured_image;
			}

			?>
			<figure class="featured-image <?php echo $class; ?>">
                <?php 
				if ( $individual_featured_image == 'large' || ( $individual_featured_image=='default' && $featured_image == 'large' ) ) {
                     the_post_thumbnail( 'catchbase-large' );
                }
                elseif ( $individual_featured_image == 'medium' || ( $individual_featured_image=='default' && $featured_image == 'medium' ) ) {
					the_post_thumbnail( 'catchbase-medium' );
				}	
				elseif ( $individual_featured_image == 'slider-image-size' || ( $individual_featured_image=='default' && $featured_image == 'slider-image-size' ) ) {
					the_post_thumbnail( 'catchbase-slider' );
				}
				else {
					the_post_thumbnail( 'full' );
				} ?>
	        </figure>
	   	<?php
		}
	}
endif; //catchbase_single_content_image
add_action( 'catchbase_before_post_container', 'catchbase_single_content_image', 10 );
add_action( 'catchbase_before_page_container', 'catchbase_single_content_image', 10 );


if ( ! function_exists( 'catchbase_get_comment_section' ) ) :
	/**
	 * Comment Section
	 *
	 * @display comments_template
	 * @action catchbase_comment_section
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_get_comment_section() {
		if ( comments_open() || '0' != get_comments_number() )
			comments_template();
	}
endif;
add_action( 'catchbase_comment_section', 'catchbase_get_comment_section', 10 );


if ( ! function_exists( 'catchbase_promotion_headline' ) ) :
	/**
	 * Template for Promotion Headline
	 *
	 * To override this in a child theme
	 * simply create your own catchbase_promotion_headline(), and that function will be used instead.
	 *
	 * @uses catchbase_before_main action to add it in the header
	 * @since Catchbase 1.0
	 */
	function catchbase_promotion_headline() { 
		//delete_transient( 'catchbase_promotion_headline' );
		
		global $post, $wp_query;
	   	$options 	= catchbase_get_theme_options();

		$promotion_headline 		= $options['promotion_headline'];
		$promotion_subheadline 		= $options['promotion_subheadline'];
		$promotion_headline_button 	= $options['promotion_headline_button'];
		$promotion_headline_target 	= $options['promotion_headline_target'];
		$enablepromotion 			= $options['promotion_headline_option'];
		
		//support qTranslate plugin
		if ( function_exists( 'qtrans_convertURL' ) ) {
			$promotion_headline_url = qtrans_convertURL($options[ 'promotion_headline_url' ]);
		}
		else {
			$promotion_headline_url = $options[ 'promotion_headline_url' ];
		}
		
		// Front page displays in Reading Settings
		$page_on_front = get_option( 'page_on_front' ) ;
		$page_for_posts = get_option('page_for_posts'); 

		// Get Page ID outside Loop
		$page_id = $wp_query->get_queried_object_id();

		 if ( ( "" != $promotion_headline || "" != $promotion_subheadline || "" != $promotion_headline_url ) && ( $enablepromotion == 'entire-site' || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && $enablepromotion == 'homepage' ) ) ) { 	
			
			if ( !$catchbase_promotion_headline = get_transient( 'catchbase_promotion_headline' ) ) {
				
				echo '<!-- refreshing cache -->';	
				
				$catchbase_promotion_headline = '
				<div id="promotion-message">
					<div class="wrapper">
						<div class="section left">';
				
						if ( "" != $promotion_headline ) {
							$catchbase_promotion_headline .= '<h2>' . $promotion_headline . '</h2>';
						}

						if ( "" != $promotion_subheadline ) {
							$catchbase_promotion_headline .= '<p>' . $promotion_subheadline . '</p>';
						}			
						
						$catchbase_promotion_headline .= '
						</div><!-- .section.left -->';  
							
						if ( "" != $promotion_headline_url ) {
							if ( "1" == $promotion_headline_target ) {
								$headlinetarget = '_blank';
							}
							else {
								$headlinetarget = '_self';
							}
							
							$catchbase_promotion_headline .= '
							<div class="section right">
								<a href="' . esc_url( $promotion_headline_url ) . '" target="' . $headlinetarget . '">' . esc_attr( $promotion_headline_button ) . '
								</a>
							</div><!-- .section.right -->';
						}
				
				$catchbase_promotion_headline .= '
					</div><!-- .wrapper -->
				</div><!-- #promotion-message -->';
				
				set_transient( 'catchbase_promotion_headline', $catchbase_promotion_headline, 86940 );
			}
			echo $catchbase_promotion_headline;	
		 }
	}
endif; // catchbase_promotion_featured_content
add_action( 'catchbase_before_content', 'catchbase_promotion_headline', 30 );


/**
 * Footer Text
 *
 * @get footer text from theme options and display them accordingly
 * @display footer_text
 * @action catchbase_footer
 *
 * @since Catchbase 1.0
 */
function catchbase_footer_content() {
	//catchbase_flush_transients();
	if ( ( !$catchbase_footer_content = get_transient( 'catchbase_footer_content' ) ) ) {
		echo '<!-- refreshing cache -->';
		
		$catchbase_content = catchbase_get_content();

		$catchbase_footer_content =  '    	
    	<div id="site-generator" class="two">
    		<div class="wrapper">
    			<div id="footer-left-content" class="copyright">' . $catchbase_content['left'] . '</div>

    			<div id="footer-right-content" class="powered">' . $catchbase_content['right'] . '</div>
			</div><!-- .wrapper -->
		</div><!-- #site-generator -->';
		
    	set_transient( 'catchbase_footer_content', $catchbase_footer_content, 86940 );
    }

    echo $catchbase_footer_content;
}
add_action( 'catchbase_footer', 'catchbase_footer_content', 100 );


/**
 * Return the first image in a post. Works inside a loop.
 * @param [integer] $post_id [Post or page id]
 * @param [string/array] $size Image size. Either a string keyword (thumbnail, medium, large or full) or a 2-item array representing width and height in pixels, e.g. array(32,32).
 * @param [string/array] $attr Query string or array of attributes.
 * @return [string] image html
 *
 * @since Catchbase 1.0
 */

function catchbase_get_first_image( $postID, $size, $attr ) {
	ob_start();

	ob_end_clean();

	$image 	= '';

	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_post_field('post_content', $postID ) , $matches);

	if( isset( $matches [1] [0] ) ) {
		//Get first image
		$first_img = $matches [1] [0];
		
		return '<img class="pngfix wp-post-image" src="'. esc_url( $first_img ) .'">';
	}
	else {
		return false;
	}
}


if ( ! function_exists( 'catchbase_scrollup' ) ) {
	/**
	 * This function loads Scroll Up Navigation
	 *
	 * @action catchbase_footer action
	 * @uses set_transient and delete_transient
	 */
	function catchbase_scrollup() {
		//catchbase_flush_transients();
		if ( !$catchbase_scrollup = get_transient( 'catchbase_scrollup' ) ) {

			// get the data value from theme options
			$options = catchbase_get_theme_options();
			echo '<!-- refreshing cache -->';	
			
			$catchbase_scrollup =  '<a href="#masthead" id="scrollup" class="genericon"><span class="screen-reader-text">' . __( 'Scroll Up', 'catchbase' ) . '</span></a>' ;
			
			set_transient( 'catchbase_scrollup', $catchbase_scrollup, 86940 );
		}
		echo $catchbase_scrollup;	
	}
}
add_action( 'catchbase_after', 'catchbase_scrollup', 10 );


if ( ! function_exists( 'catchbase_page_post_meta' ) ) :
	/**
	 * Post/Page Meta for Google Structure Data
	 */
	function catchbase_page_post_meta() {
		$catchbase_author_url = esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) );
		
		$catchbase_page_post_meta = '<span class="post-time">' . __( 'Posted on', 'catchbase' ) . ' <time class="entry-date updated" datetime="' . esc_attr( get_the_date( 'c' ) ) . '" pubdate>' . esc_html( get_the_date() ) . '</time></span>';
	    $catchbase_page_post_meta .= '<span class="post-author">' . __( 'By', 'catchbase' ) . ' <span class="author vcard"><a class="url fn n" href="' . $catchbase_author_url . '" title="View all posts by ' . get_the_author() . '" rel="author">' .get_the_author() . '</a></span>';

		return $catchbase_page_post_meta;
	} 
endif; //catchbase_page_post_meta


if ( ! function_exists( 'catchbase_alter_home' ) ) :
	/**
	 * Alter the query for the main loop in homepage
	 *
	 * @action pre_get_posts action
	 */
	function catchbase_alter_home( $query ){
		$options = catchbase_get_theme_options();
			
	    $cats = $options[ 'front_page_category' ];

		if ( is_array( $cats ) && !in_array( '0', $cats ) ) {
			if( $query->is_main_query() && $query->is_home() ) {
				$query->query_vars['category__in'] = $options[ 'front_page_category' ];
			}
		}
	}
endif; //catchbase_alter_home
add_action( 'pre_get_posts','catchbase_alter_home' );