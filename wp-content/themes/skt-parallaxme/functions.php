<?php
/**
 * SKT Parallaxme functions and definitions
 *
 * @package SKT Parallaxme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */


if ( ! function_exists( 'skt_parallaxme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function skt_parallaxme_setup() {

	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'skt-parallaxme', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_image_size('homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'skt-parallaxme' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'E6E1C4',
		'default-image' => '',
	) );
	add_editor_style( 'editor-style.css' );
}
endif; // skt_parallaxme_setup
add_action( 'after_setup_theme', 'skt_parallaxme_setup' );


function skt_parallaxme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'skt-parallaxme' ),
		'description'   => __( 'Appears on blog page sidebar', 'skt-parallaxme' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'skt_parallaxme_widgets_init' );

if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}


function skt_parallaxme_scripts() {
	wp_enqueue_style( 'skt_parallaxme-gfonts', '//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700|PT+Sans:400,400italic,700,700italic' );
	wp_enqueue_style( 'skt_parallaxme-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'skt_parallaxme-editor-style', get_template_directory_uri()."/editor-style.css" );
	wp_enqueue_style( 'skt_parallaxme-normalize-style', get_template_directory_uri()."/css/normalize.css" );
	wp_enqueue_style( 'skt_parallaxme-boilerplate-style', get_template_directory_uri()."/css/boilerplate.css" );
	wp_enqueue_style( 'skt_parallaxme-prettyphoto-style', get_template_directory_uri()."/css/prettyphoto.css" );
	wp_enqueue_style( 'skt_parallaxme-jquery_bxslider-style', get_template_directory_uri()."/css/jquery.bxslider.css" );
	wp_enqueue_style( 'skt_parallaxme-layout-style', get_template_directory_uri()."/css/layout.css" );
	wp_enqueue_style( 'skt_parallaxme-skeleton-style', get_template_directory_uri()."/css/skeleton.css" );
	wp_enqueue_style( 'skt_parallaxme-base-style', get_template_directory_uri()."/css/style_base.css" );

	//supersized script and styles enque
	if ( (of_get_option('innerpageslider', true) != 'hide') || is_home() || is_front_page() ) {
		wp_enqueue_style( 'skt_parallaxme-supersized-default-theme', get_template_directory_uri()."/css/supersized.css" );
		wp_enqueue_style( 'skt_parallaxme-supersized-style', get_template_directory_uri()."/css/supersized.shutter.css" );
		
		wp_enqueue_script( 'skt_parallaxme-supersized-easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array('jquery') );
		wp_enqueue_script( 'skt_parallaxme-supersized-slider', get_template_directory_uri() . '/js/supersized.3.2.7.min.js', array('jquery') );
		wp_enqueue_script( 'skt_parallaxme-supersized-shutter', get_template_directory_uri() . '/js/supersized.shutter.js', array('jquery') );
	}

	wp_enqueue_script( 'skt_parallaxme-jquery_validate', get_template_directory_uri() . '/js/jquery.validate.js', array('jquery') );
	wp_enqueue_script( 'skt_parallaxme-jquery_bxslider', get_template_directory_uri() . '/js/jquery.bxslider.js', array('jquery') );
	wp_enqueue_script( 'skt_parallaxme-smooth_scroll', get_template_directory_uri() . '/js/smooth-scroll.js' );
	wp_enqueue_script( 'skt_parallaxme-filter_gallery', get_template_directory_uri() . '/js/filter-gallery.js' );
	wp_enqueue_script( 'skt_parallaxme-prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery') );
	wp_enqueue_script( 'skt_parallaxme-custom_js', get_template_directory_uri() . '/js/custom.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skt_parallaxme_scripts' );

function skt_parallaxme_enqueue_styles() {
global $wp_styles;
// Load the main stylesheet
wp_enqueue_style( 'skt-parallaxme', get_stylesheet_uri() );
/**
* Load our IE-only stylesheet for all versions of IE:
* <!--[if lt IE 9]> ... <![endif]-->
*
* NOTE: It is also possible to just check and see if the $is_IE global in WordPress is set to true before
* calling the wp_enqueue_style() function. If you are trying to load a stylesheet for all browsers
* EXCEPT for IE, then you would HAVE to check the $is_IE global since WordPress doesn't have a way to
* properly handle non-IE conditional comments.
*/
wp_enqueue_style( 'skt-parallaxme-ie', get_stylesheet_directory_uri() . "/css/ie.css", array( 'skt-parallaxme-style' ) );
$wp_styles->add_data( 'skt-pathway-ie', 'conditional', 'IE' );
}
add_action('wp_enqueue_scripts', 'skt_parallaxme_enqueue_styles');

// add ie conditional html5 to header
function skt_parallaxme_add_ie_html5() {
global $is_IE;
if ($is_IE)
echo '<!--[if lt IE 9]>';
echo '<script src="'.get_template_directory_uri().'/js/html5.js"></script>';
echo '<![endif]-->';
}
add_action('wp_head', 'skt_parallaxme_add_ie_html5');


function skt_parallaxme_custom_head_codes() { 
	if ( (function_exists( 'of_get_option' )) && (of_get_option('style2', true) != 1) ) {
		echo "<style>". esc_html( of_get_option('style2', true) ) ."</style>";
	}

	if ( (of_get_option('innerpageslider', true) != 'hide') || is_home() || is_front_page() ) {

		$slAr = array();
		for ($i=1; $i<6; $i++) {
			if ( of_get_option('slide'.$i, true) ) {
				$imgUrl 	= of_get_option('slide'.$i, true);
				$imgTitle	= ( of_get_option('slidetitle'.$i, true) != '') ? of_get_option('slidetitle'.$i, true) : 'aaaaa';
				if ( strlen($imgUrl) > 3 ) $slAr[$i] = of_get_option('slide'.$i, true);
			}
		}
		?>
		<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery.supersized({
				// Functionality
				slideshow               :   1,			// Slideshow on/off
				autoplay				:	1,			// Determines whether slideshow begins playing when page is loaded. 
				start_slide             :   1,			// Start slide (0 is random)
				stop_loop				:	0,			// Pauses slideshow on last slide
				random					: 	0,			// Randomize slide order (Ignores start slide)
				slide_interval          :   5000,		// Length between transitions
				transition              :   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
				transition_speed		:	1000,		// Speed of transition
				new_window				:	1,			// Image links open in new window/tab
				pause_hover             :   0,			// Pause slideshow on hover
				keyboard_nav            :   1,			// Keyboard navigation on/off
				performance				:	1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
				image_protect			:	0,			// Disables image dragging and right click with Javascript
				
				// Size & Position
				min_width		        :   0,			// Min width allowed (in pixels)
				min_height		        :   0,			// Min height allowed (in pixels)
				vertical_center         :   1,			// Vertically center background
				horizontal_center       :   1,			// Horizontally center background
				fit_always				:	0,			// Image will never exceed browser width or height (Ignores min. dimensions)
				fit_portrait         	:   1,			// Portrait images will not exceed browser height
				fit_landscape			:   0,			// Landscape images will not exceed browser width
				
				// Components 				
				slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
				thumb_links				:	1,			// Individual thumb links for each slide
				thumbnail_navigation    :   0,			// Thumbnail navigation
				slides 					:  	[			// Slideshow Images
												<?php
												$n = 0;
												foreach( $slAr as $sk => $sv ){
													$n++;
													echo "{image : '".$sv."', title : '<h1>".esc_attr(of_get_option('slidetitle'.$sk, true))."</h1>', thumb : '".$sv."', url : ''}".( (count($slAr) == $n) ? '' : ',' )."\n";
												}
												?>
											],
				// Theme Options 
				progress_bar			:	1,			// Timer for each slide							
				mouse_scrub				:	0
			});
		});

		</script><?php 
	}

}	
add_action('wp_head', 'skt_parallaxme_custom_head_codes');


function skt_parallaxme_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $page_format as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	}
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load custom functions file.
 */
require get_template_directory() . '/inc/custom-functions.php';


// get slug by id
function skt_parallaxme_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}

// Add custom script in admin footer
function skt_parallaxme_custom_admin_footer_js() {
	echo '<script>
		var nums = jQuery("#numsection").val();
		jQuery(".toggle_title h3").addClass("toggleTitle");
		jQuery(".toggle_title").each( function( index ){
			jQuery( "#section-sectiontitle"+(index+1)+", #section-sectioncontent"+(index+1)+", #section-menutitle"+(index+1)+", #section-sectionbgcolor"+(index+1)+", #section-sectionbgimage"+(index+1)+", #section-sectionclass"+(index+1) ).wrapAll( "<div class=\'toggle_wrapper\' />");
		});
		jQuery(".toggle_title h3").click( function(){
			jQuery(this).parent().next().slideToggle();
		});
	</script>"';
}
add_action('admin_footer', 'skt_parallaxme_custom_admin_footer_js');


function skt_parallaxme_len_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'skt_parallaxme' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'skt_parallaxme_len_title', 10, 2 );