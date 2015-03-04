<?php
/**
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 */


if ( ! function_exists( 'hardpressed_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function hardpressed_setup() {
		
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'hardpressed', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'hardpressed' ),
		'secondary' => __('Footer Menu', 'hardpressed')
	) );

	add_theme_support('post-thumbnails'); 
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	
	
	// custom backgrounds
	$hardpressed_custom_background = array(
		// Background color default
		'default-color' => 'f7f7ef',
		// Background image default
		'default-image' => '',
		'wp-head-callback' => '_custom_background_cb'
	);
	add_theme_support('custom-background', $hardpressed_custom_background );

	
	// adding post format support
	add_theme_support( 'post-formats', 
		array( 
			'aside', /* Typically styled without a title. Similar to a Facebook note update */
			'gallery', /* A gallery of images. Post will likely contain a gallery shortcode and will have image attachments */
			'link', /* A link to another site. Themes may wish to use the first link tag in the post content as the external link for that post. An alternative approach could be if the post consists only of a URL, then that will be the URL and the title (post_title) will be the name attached to the anchor for it */
			'image', /* A single image. The first <img /> tag in the post could be considered the image. Alternatively, if the post consists only of a URL, that will be the image URL and the title of the post (post_title) will be the title attribute for the image */
			'quote', /* A quotation. Probably will contain a blockquote holding the quote content. Alternatively, the quote may be just the content, with the source/author being the title */
			'status', /*A short status update, similar to a Twitter status update */
			'video', /* A single video. The first <video /> tag or object/embed in the post content could be considered the video. Alternatively, if the post consists only of a URL, that will be the video URL. May also contain the video as an attachment to the post, if video support is enabled on the blog (like via a plugin) */
			'audio', /* An audio file. Could be used for Podcasting */
			'chat' /* A chat transcript */
		)
	);
}
endif;
add_action( 'after_setup_theme', 'hardpressed_setup' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! function_exists( 'hardpressed_content_width' ) ) :
	function hardpressed_content_width() {
		global $content_width;
		if (!isset($content_width))
			$content_width = 625; /* pixels */
	}
endif;
add_action( 'after_setup_theme', 'hardpressed_content_width' );


/*******************************************************************
* These are settings for the Theme Customizer in the admin panel. 
*******************************************************************/
if ( ! function_exists( 'hardpressed_theme_customizer' ) ) :

	function hardpressed_theme_customizer( $wp_customize ) {
		
		$wp_customize->remove_section( 'title_tagline');
		
		/* site title color option */
		$wp_customize->add_setting( 'hardpressed_site_title_color', array (
			'default'	=> '#73878F',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hardpressed_site_title_color', array(
			'label'    => __( 'Site Title Text Color', 'hardpressed' ),
			'section'  => 'colors',
			'settings' => 'hardpressed_site_title_color',
			'priority' => 101
		) ) );
		
		/* nav links and widget title color option */
		$wp_customize->add_setting( 'hardpressed_nav_color', array (
			'default'	=> '#73878F',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hardpressed_nav_color', array(
			'label'    => __( 'Text Color for: Nav Links &amp; Widget Title', 'hardpressed' ),
			'section'  => 'colors',
			'settings' => 'hardpressed_nav_color',
			'priority' => 102
		) ) );
		
		/* entry title color option */
		$wp_customize->add_setting( 'hardpressed_title_color', array (
			'default'	=> '#67C8E2',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hardpressed_title_color', array(
			'label'    => __( 'Background Color for: Post Entry Titles, Section Titles, Pagination', 'hardpressed' ),
			'section'  => 'colors',
			'settings' => 'hardpressed_title_color',
			'priority' => 103,
		) ) );
		
		$wp_customize->add_setting( 'hardpressed_title_color_txt', array (
			'default'	=> '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hardpressed_title_color_txt', array(
			'label'    => __( 'Text Color for: Post &amp; Section Titles, Pagination', 'hardpressed' ),
			'section'  => 'colors',
			'settings' => 'hardpressed_title_color_txt',
			'priority' => 104,
		) ) );
		
		/* meta color option */
		$wp_customize->add_setting( 'hardpressed_meta_color', array (
			'default'	=> '#FFCD50',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hardpressed_meta_color', array(
			'label'    => __( 'Background Color for: Meta "Posted on...", Buttons, Bullets', 'hardpressed' ),
			'section'  => 'colors',
			'settings' => 'hardpressed_meta_color',
			'priority' => 105,
		) ) );
		
		$wp_customize->add_setting( 'hardpressed_meta_color_txt', array (
			'default'	=> '#353e42',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hardpressed_meta_color_txt', array(
			'label'    => __( 'Text Color for: Meta "Posted on...", Buttons, Bullets', 'hardpressed' ),
			'section'  => 'colors',
			'settings' => 'hardpressed_meta_color_txt',
			'priority' => 106,
		) ) );
		
		/* main text color option */
		$wp_customize->add_setting( 'hardpressed_text_color', array (
			'default' => '#353e42',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hardpressed_text_color', array(
			'label'    => __( 'Body Text Color', 'hardpressed' ),
			'section'  => 'colors',
			'settings' => 'hardpressed_text_color',
			'priority' => 107,
		) ) );
		
		/* post links color option */
		$wp_customize->add_setting( 'hardpressed_link_color', array (
			'default' => '#47b4d1',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hardpressed_link_color', array(
			'label'    => __( 'Post/Page Links Color', 'hardpressed' ),
			'section'  => 'colors',
			'settings' => 'hardpressed_link_color',
			'priority' => 108,
		) ) );
		
		/* widget background color option */
		$wp_customize->add_setting( 'hardpressed_widget_color', array (
			'default'	=> '#EFF0E9',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hardpressed_widget_color', array(
			'label'    => __( 'Widget Background Color', 'hardpressed' ),
			'section'  => 'colors',
			'settings' => 'hardpressed_widget_color',
			'priority' => 109,
		) ) );
		
		
		/* logo option */
		$wp_customize->add_section( 'hardpressed_logo_section' , array(
			'title'       => __( 'Site Logo', 'hardpressed' ),
			'priority'    => 31,
			'description' => __( 'Upload a logo to replace the default site name in the header', 'hardpressed' ),
		) );
		
		$wp_customize->add_setting( 'hardpressed_logo', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hardpressed_logo', array(
			'label'    => __( 'Choose your logo (ideal width is 100-300px and ideal height is 40-100px)', 'hardpressed' ),
			'section'  => 'hardpressed_logo_section',
			'settings' => 'hardpressed_logo',
		) ) );
	
		
		/* social media option */
		$wp_customize->add_section( 'hardpressed_social_section' , array(
			'title'       => __( 'Social Media Icons', 'hardpressed' ),
			'priority'    => 32,
			'description' => __( 'Optional media icons in the header', 'hardpressed' ),
		) );
		
		$wp_customize->add_setting( 'hardpressed_facebook', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hardpressed_facebook', array(
			'label'    => __( 'Enter your Facebook url', 'hardpressed' ),
			'section'  => 'hardpressed_social_section',
			'settings' => 'hardpressed_facebook',
			'priority'    => 101,
		) ) );
	
		$wp_customize->add_setting( 'hardpressed_twitter', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hardpressed_twitter', array(
			'label'    => __( 'Enter your Twitter url', 'hardpressed' ),
			'section'  => 'hardpressed_social_section',
			'settings' => 'hardpressed_twitter',
			'priority'    => 102,
		) ) );
		
		$wp_customize->add_setting( 'hardpressed_google', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hardpressed_google', array(
			'label'    => __( 'Enter your Google+ url', 'hardpressed' ),
			'section'  => 'hardpressed_social_section',
			'settings' => 'hardpressed_google',
			'priority'    => 103,
		) ) );
		
		$wp_customize->add_setting( 'hardpressed_pinterest', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hardpressed_pinterest', array(
			'label'    => __( 'Enter your Pinterest url', 'hardpressed' ),
			'section'  => 'hardpressed_social_section',
			'settings' => 'hardpressed_pinterest',
			'priority'    => 104,
		) ) );
		
		$wp_customize->add_setting( 'hardpressed_linkedin', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hardpressed_linkedin', array(
			'label'    => __( 'Enter your Linkedin url', 'hardpressed' ),
			'section'  => 'hardpressed_social_section',
			'settings' => 'hardpressed_linkedin',
			'priority'    => 105,
		) ) );
		
		$wp_customize->add_setting( 'hardpressed_youtube', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hardpressed_youtube', array(
			'label'    => __( 'Enter your Youtube url', 'hardpressed' ),
			'section'  => 'hardpressed_social_section',
			'settings' => 'hardpressed_youtube',
			'priority'    => 106,
		) ) );
		
		$wp_customize->add_setting( 'hardpressed_tumblr', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hardpressed_tumblr', array(
			'label'    => __( 'Enter your Tumblr url', 'hardpressed' ),
			'section'  => 'hardpressed_social_section',
			'settings' => 'hardpressed_tumblr',
			'priority'    => 107,
		) ) );
		
		$wp_customize->add_setting( 'hardpressed_instagram', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hardpressed_instagram', array(
			'label'    => __( 'Enter your Instagram url', 'hardpressed' ),
			'section'  => 'hardpressed_social_section',
			'settings' => 'hardpressed_instagram',
			'priority'    => 108,
		) ) );
		
		$wp_customize->add_setting( 'hardpressed_flickr', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hardpressed_flickr', array(
			'label'    => __( 'Enter your Flickr url', 'hardpressed' ),
			'section'  => 'hardpressed_social_section',
			'settings' => 'hardpressed_flickr',
			'priority'    => 109,
		) ) );
		
		$wp_customize->add_setting( 'hardpressed_vimeo', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hardpressed_vimeo', array(
			'label'    => __( 'Enter your Vimeo url', 'hardpressed' ),
			'section'  => 'hardpressed_social_section',
			'settings' => 'hardpressed_vimeo',
			'priority'    => 110,
		) ) );
		
		$wp_customize->add_setting( 'hardpressed_yelp', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hardpressed_yelp', array(
			'label'    => __( 'Enter your Yelp url', 'hardpressed' ),
			'section'  => 'hardpressed_social_section',
			'settings' => 'hardpressed_yelp',
			'priority'    => 111,
		) ) );
		
		$wp_customize->add_setting( 'hardpressed_rss', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hardpressed_rss', array(
			'label'    => __( 'Enter your RSS url', 'hardpressed' ),
			'section'  => 'hardpressed_social_section',
			'settings' => 'hardpressed_rss',
			'priority'    => 112,
		) ) );
		
		$wp_customize->add_setting( 'hardpressed_email', array (
			'sanitize_callback' => 'sanitize_email',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hardpressed_email', array(
			'label'    => __( 'Enter your email address', 'hardpressed' ),
			'section'  => 'hardpressed_social_section',
			'settings' => 'hardpressed_email',
			'priority'    => 113,
		) ) );
		
		
		/* author bio in posts option */
		$wp_customize->add_section( 'hardpressed_author_bio_section' , array(
			'title'       => __( 'Disable Author Bio?', 'hardpressed' ),
			'priority'    => 32,
			'description' => __( 'Option to show/hide the author bio in the posts.', 'hardpressed' ),
		) );
		
		$wp_customize->add_setting( 'hardpressed_author_bio', array (
			'sanitize_callback' => 'hardpressed_sanitize_checkbox',
		) );
		
		 $wp_customize->add_control('author_bio', array(
			'settings' => 'hardpressed_author_bio',
			'label' => __('Show the author bio in posts?', 'hardpressed'),
			'section' => 'hardpressed_author_bio_section',
			'type' => 'checkbox',
		));

		
	}
	
endif;
add_action('customize_register', 'hardpressed_theme_customizer');


/**
 * Sanitize checkbox
 */
if ( ! function_exists( 'hardpressed_sanitize_checkbox' ) ) :
	function hardpressed_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}
endif;

if ( ! function_exists( 'hardpressed_apply_color' ) ) :
	function hardpressed_apply_color() { ?>
		<style id="hardpressed-color-settings">
			
			<?php if ( get_theme_mod( 'hardpressed_site_title_color' ) ) { // Main Site Title Color
				$hardpressed_site_title_color = get_theme_mod( 'hardpressed_site_title_color' );
			} else {
				$hardpressed_site_title_color = __('#73878F', 'hardpressed');
			} ?>
			#site-title a {
				color: <?php echo $hardpressed_site_title_color; ?>;
			}
			
			<?php if ( get_theme_mod( 'hardpressed_nav_color' ) ) { // Nav Link and Widget Title Color
				$hardpressed_nav_color = get_theme_mod( 'hardpressed_nav_color' );
			} else {
				$hardpressed_nav_color = __('#73878F', 'hardpressed');
			} ?>
			nav[role=navigation] .menu ul li a, nav[role=navigation] .menu #menu-icon, #sidebar .widget-title, #sidebar .widget-title a {
				color: <?php echo $hardpressed_nav_color; ?>;
			}
        	
			<?php if ( get_theme_mod( 'hardpressed_title_color' ) ) { // Post Title BG Color
				$hardpressed_title_color = get_theme_mod( 'hardpressed_title_color' );
			} else {
				$hardpressed_title_color = __('#67C8E2', 'hardpressed');
			} ?>
			.entry-title, .arc-title, .format-quote .entry-content blockquote cite, .pagination .page-numbers:hover, .pagination span.page-numbers.current, #comments-title, #reply-title {
				background-color: <?php echo $hardpressed_title_color; ?>;
			}
			
			<?php if ( get_theme_mod( 'hardpressed_title_color_txt' ) ) { // Post Title Text Color
				$hardpressed_title_color_txt = get_theme_mod( 'hardpressed_title_color_txt' );
			} else {
				$hardpressed_title_color_txt = __('#ffffff', 'hardpressed');
			} ?>
			.entry-title, .entry-title a, .arc-title, .arc-title a, .format-quote .entry-content blockquote cite, .format-quote .entry-content blockquote cite a, .pagination .page-numbers:hover, .pagination span.page-numbers.current, #comments-title, #reply-title {
				color: <?php echo $hardpressed_title_color_txt; ?>;
			}
			
			<?php if ( get_theme_mod( 'hardpressed_text_color' ) ) { // Body Text Color
				$hardpressed_text_color = get_theme_mod( 'hardpressed_text_color' );
			} else {
				$hardpressed_text_color = __('#353e42', 'hardpressed');
			} ?>
			.post-content, .comment-content, .author-bio, #respond {
				color: <?php echo $hardpressed_text_color; ?>;
			}
			
			
			<?php if ( get_theme_mod( 'hardpressed_link_color' ) ) { // Link Color
				$hardpressed_link_color = get_theme_mod( 'hardpressed_link_color' );
			} else {
				$hardpressed_link_color = __('#47b4d1', 'hardpressed');
			} ?>
			.post-content a, .post-content a:visited, .commentlist li.comment .comment-head a, .commentlist li.comment .comment-head a:visited, .commentlist li.comment .comment-content a, .commentlist li.comment .comment-content a:visited, .author-bio a, .author-bio a:visited, #respond a, #respond a:visited {
				color: <?php echo $hardpressed_link_color; ?>;
			}
			
			a.more-link,
			a.more-link:visited {
				color: #73878f !important;
			}
			
			a.more-link:hover {
				color: <?php echo $hardpressed_link_color; ?> !important;
			}
			
			<?php if ( get_theme_mod( 'hardpressed_meta_color' ) ) { // Meta BG Color
				$hardpressed_meta_color = get_theme_mod( 'hardpressed_meta_color' );
			} else {
				$hardpressed_meta_color = __('#ffcd50', 'hardpressed');
			} ?>
			.entry-meta-wrap div.entry-meta, .footer-meta.fm2, .post-content ol > li:before, .post-content ul > li:before, .commentlist a.comment-reply-link, .commentlist a.comment-reply-login, #respond #submit, .post-content form input[type=submit], .post-content form input[type=button], .more-link:after {
				background-color: <?php echo $hardpressed_meta_color; ?>;
			}
			
			
			<?php if ( get_theme_mod( 'hardpressed_meta_color_txt' ) ) { // Meta Text Color
				$hardpressed_meta_color_txt = get_theme_mod( 'hardpressed_meta_color_txt' );
			} else {
				$hardpressed_meta_color_txt = __('#353e42', 'hardpressed');
			} ?>
			.entry-meta-wrap div.entry-meta, .entry-meta-wrap div.entry-meta a, .footer-meta.fm2, .footer-meta.fm2 a, .post-content ol > li:before, .post-content ul > li:before, .commentlist a.comment-reply-link, .commentlist a.comment-reply-login, #respond #submit, .post-content form input[type=submit], .post-content form input[type=button] {
				color: <?php echo $hardpressed_meta_color_txt; ?>;
			}
			
			
			<?php if ( get_theme_mod( 'hardpressed_widget_color' ) ) {
				$hardpressed_widget_color = get_theme_mod( 'hardpressed_widget_color' );
			} else {
				$hardpressed_widget_color = __('#eff0e9', 'hardpressed');
			} ?>
			#sidebar .widget li, .widget_nav_menu li, #meta.widget aside a, .tagcloud, #calendar_wrap, .widget form {
				background-color: <?php echo $hardpressed_widget_color; ?>;
			}
        </style>
<?php }
endif;
add_action( 'wp_head', 'hardpressed_apply_color' );


/**
 * Title filter 
 */
if ( ! function_exists( 'hardpressed_filter_wp_title' ) ) :
	function hardpressed_filter_wp_title( $old_title, $sep, $sep_location ) {
		
		if ( is_feed() ) return $old_title;
	
		$site_name = get_bloginfo( 'name' );
		$site_description = get_bloginfo( 'description' );
		// add padding to the sep
		$ssep = ' ' . $sep . ' ';
		
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			return $site_name . ' | ' . $site_description;
		} else {
			// find the type of index page this is
			if( is_category() ) $insert = $ssep . __( 'Category', 'hardpressed' );
			elseif( is_tag() ) $insert = $ssep . __( 'Tag', 'hardpressed' );
			elseif( is_author() ) $insert = $ssep . __( 'Author', 'hardpressed' );
			elseif( is_year() || is_month() || is_day() ) $insert = $ssep . __( 'Archives', 'hardpressed' );
			else $insert = NULL;
			 
			// get the page number we're on (index)
			if( get_query_var( 'paged' ) )
			$num = $ssep . __( 'Page ', 'hardpressed' ) . get_query_var( 'paged' );
			 
			// get the page number we're on (multipage post)
			elseif( get_query_var( 'page' ) )
			$num = $ssep . __( 'Page ', 'hardpressed' ) . get_query_var( 'page' );
			 
			// else
			else $num = NULL;
			 
			// concoct and return new title
			return $site_name . $insert . $old_title . $num;
			
		}
	
	}
endif;
// call our custom wp_title filter, with normal (10) priority, and 3 args
add_filter( 'wp_title', 'hardpressed_filter_wp_title', 10, 3 );


/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
if ( ! function_exists( 'hardpressed_main_nav' ) ) :
function hardpressed_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu( 
    	array( 
    		'theme_location' => 'primary', /* where in the theme it's assigned */
    		'container_class' => 'menu', /* div container class */
    		'fallback_cb' => 'hardpressed_main_nav_fallback' /* menu fallback */
    	)
    );
}
endif;

if ( ! function_exists( 'hardpressed_main_nav_fallback' ) ) :
	function hardpressed_main_nav_fallback() { wp_page_menu( 'show_home=Home&container_class=menu' ); }
endif;


if ( ! function_exists( 'hardpressed_footer_nav' ) ) :
	function hardpressed_footer_nav() {
		// display the wp3 menu if available
		wp_nav_menu( 
			array( 
				'theme_location' => 'secondary', /* where in the theme it's assigned */
				'container_class' => 'footer-menu', /* container class */
				'fallback_cb' => false,
			)
		);
	}
endif;


if ( ! function_exists( 'hardpressed_page_menu_args' ) ) :
	function hardpressed_page_menu_args( $args ) {
		$args['show_home'] = true;
		return $args;
	}
endif;
add_filter( 'wp_page_menu_args', 'hardpressed_page_menu_args' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function hardpressed_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar Right', 'hardpressed' ),
		'id' => 'sidebar-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );

}
add_action( 'widgets_init', 'hardpressed_widgets_init' );

if ( ! function_exists( 'hardpressed_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 */
function hardpressed_content_nav( $nav_id ) {
	global $wp_query;
	?>
	<nav id="<?php echo $nav_id; ?>">
		<h1 class="assistive-text section-heading"><?php _e( 'Post navigation', 'hardpressed' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr; Previous', 'Previous post link', 'hardpressed' ) . '</span>' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '<span class="meta-nav">' . _x( 'Next &rarr;', 'Next post link', 'hardpressed' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'hardpressed' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'hardpressed' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo $nav_id; ?> -->
	<?php
}
endif;


if ( ! function_exists( 'hardpressed_comment' ) ) :
/**
 * Template for comments and pingbacks.
 */
function hardpressed_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'hardpressed' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'hardpressed' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>">
			<footer class="clearfix comment-head">
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 72 ); ?>
					<?php printf( __( '%s', 'hardpressed' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'hardpressed' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( '(Edit)', 'hardpressed' ), ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content">
            	<?php if ( $comment->comment_approved == '0' ) : ?>
					<h6><em><?php _e( 'Your comment is awaiting moderation.', 'hardpressed' ); ?></em></h6>
				<?php endif; ?>
				<?php comment_text(); ?>
            </div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif;

if ( ! function_exists( 'hardpressed_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function hardpressed_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'hardpressed' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'hardpressed' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
endif;

/**
 * Adds custom classes to the array of body classes.
 */
if ( ! function_exists( 'hardpressed_body_classes' ) ) :
	function hardpressed_body_classes( $classes ) {
		// Adds a class of single-author to blogs with only 1 published author
		if ( ! is_multi_author() ) {
			$classes[] = 'single-author';
		}
	
		return $classes;
	}
endif;
add_filter( 'body_class', 'hardpressed_body_classes' );

/**
 * Returns true if a blog has more than 1 category
 */
if ( ! function_exists( 'hardpressed_categorized_blog' ) ) :
function hardpressed_categorized_blog() {
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
		// This blog has more than 1 category so hardpressed_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so hardpressed_categorized_blog should return false
		return false;
	}
}
endif;
/**
 * Flush out the transients used in hardpressed_categorized_blog
 */
if ( ! function_exists( 'hardpressed_category_transient_flusher' ) ) :
	function hardpressed_category_transient_flusher() {
		// Like, beat it. Dig?
		delete_transient( 'all_the_cool_cats' );
	}
endif;
add_action( 'edit_category', 'hardpressed_category_transient_flusher' );
add_action( 'save_post', 'hardpressed_category_transient_flusher' );

/**
 * Remove WP default gallery styling
 */
add_filter( 'use_default_gallery_style', '__return_false' );


/**
 * The Pagination Function
 */
if ( ! function_exists( 'hardpressed_pagination' ) ) :
	function hardpressed_pagination() {
	
		global $wp_query; 
		
		$big = 999999999;
		  
		$total_pages = $wp_query->max_num_pages;  
		  
		if ($total_pages > 1){  
		  
		  $wp_query->query_vars['paged'] > 1 ? $current_page = $wp_query->query_vars['paged'] : $current_page = 1;  
			
		  echo '<div class="pagination">';  
			
		  echo paginate_links(array(  
			  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ), 
			  'format' => '/page/%#%',  
			  'current' => $current_page,  
			  'total' => $total_pages,  
			  'prev_text' => __('&lsaquo; Prev', 'hardpressed'),  
			  'next_text' => __('Next &rsaquo;', 'hardpressed') 
			));  
		  
		  echo '</div>';  
			
		} 
	
	}
endif;

/**
 * Add "Untitled" for posts without title, 
 */
function hardpressed_post_title($title) {
	if ($title == '') {
		return __('Untitled', 'hardpressed');
	} else {
		return $title;
	}
}
add_filter('the_title', 'hardpressed_post_title');

/**
 * Fix for W3C validation
 */
if ( ! function_exists( 'hardpressed_w3c_valid_rel' ) ) :
	function hardpressed_w3c_valid_rel( $text ) {
		$text = str_replace('rel="category tag"', 'rel="tag"', $text); return $text; 
	}
endif;
add_filter( 'the_category', 'hardpressed_w3c_valid_rel' );

/*
 * Modernizr functions
 */
if ( ! function_exists( 'hardpressed_modernizr_addclass' ) ) :
	function hardpressed_modernizr_addclass($output) {
		return $output . ' class="no-js"';
	}
endif;
add_filter('language_attributes', 'hardpressed_modernizr_addclass');

/**
 * Enqueue scripts & styles
 */
function hardpressed_custom_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/library/js/modernizr-2.6.2.min.js', false, '2.6.2');
	wp_enqueue_script( 'hardpressed_custom_js', get_template_directory_uri() . '/library/js/scripts.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_style( 'hardpressed_google_fonts', '//fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700,700italic|Lato:900' );
	wp_enqueue_style( 'hardpressed_style', get_stylesheet_uri() );
}

add_action('wp_enqueue_scripts', 'hardpressed_custom_scripts');

?>