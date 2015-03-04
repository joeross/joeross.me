<?php


/************************* Theme Initial setup ******************************/

add_action ('after_setup_theme','inspire_theme_setup');


function inspire_theme_setup () {

add_theme_support('post-thumbnails');
set_post_thumbnail_size(150, 150, true);
add_theme_support( 'automatic-feed-links' );

if ( ! isset( $content_width ) )
	$content_width = 788;
		

	
}




/********************** Adjust content width for full page templates *******************************/

function inspire_content_width() {
	
	global $content_width;
	
	$inspire_settings = get_option('inspire-options');
	
	if(isset($inspire_settings['fullcontent']) && $inspire_settings['fullcontent'] =='1')
			$content_width = 1115;

	
	if(is_page_template( 'fullwidth-page.php' ) ) 
		$content_width = 1115;
			
	
}

add_action( 'template_redirect', 'inspire_content_width' ); 

/**************** Register Sidebar Widgets *****************************************/


add_action('widgets_init','inspire_register_sidebar');


function inspire_register_sidebar() {

register_sidebar(array(
  'name' =>  'Right Hand Sidebar',
  'id' => 'right-sidebar',
  'description' => 'Widgets in this area will be shown on the right-hand side.',
  'before_title' => '<h3>',
  'after_title' => '</h3>'
));

}


			
/**************************** Theme Filter Excerpts **********************************/

add_filter('excerpt_more', 'inspire_excerpt_remove');

/* Excerpts fix */
function inspire_excerpt_remove( $more ) {
	return ' <p><a class="more-link" href="'. get_permalink( get_the_ID() ) . '">Continue Reading &raquo;</a></p>';
}




/********************************** Theme scripts and styles ****************************/

function inspire_scripts_styles()
{
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		
	/* Add the Styles */	
	
	
	wp_enqueue_style( 'default', get_stylesheet_uri() ); // default stylesheet
	wp_register_style('inspire-fonts','http://fonts.googleapis.com/css?family=Abel|Archivo+Narrow');
	wp_enqueue_style( 'inspire-fonts');
}

add_action ('wp_enqueue_scripts','inspire_scripts_styles');	






/********************************* Register Navigation menus ********************************/
 
add_action( 'init', 'inspire_nav_menu' );

 
//Register area for custom menu
function inspire_nav_menu() {
    register_nav_menu( 'primary-menu',  'Primary Menu');
    register_nav_menu( 'top-menu', 'Top Menu' );
    register_nav_menu( 'footer-menu', 'Footer Menu' );
}



/* Pagination */

function inspire_pagination() {
		global $wp_query;

		$big = 999999999; // need an unlikely integer
		
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		) );
	}

	
/*********************************** Theme Widgets *************************************/

add_action( 'widgets_init', 'inspire_footer_widgets_init' );

function inspire_footer_widgets_init() {
	
	/* Footer widgets */
	
	register_sidebar( array(
		'name' =>  'Footer Widget One',
		'id' => 'sidebar-5',
		'description' => 'First Footer widget - Found at the bottom on top of footer (left)',
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Footer Widget Two',
		'id' => 'sidebar-6',
		'description' => 'Second Footer Widget - Found on top of Footer widget (center).',
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Footer Widget Three',
		'id' => 'sidebar-7',
		'description' =>  'Third Footer Widget - Found on top of the footer (right)',
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) ); 
	
	/* Home page widgets */

	register_sidebar( array(
		'name' =>  'Home Widget One',
		'id' => 'sidebar-8',
		'description' => 'Home Widget - Found on the home page below showcase box (left one)',
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Home Widget Two',
		'id' => 'sidebar-9',
		'description' => 'Home widget found on the home page below the showcase bar (center one)',
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Home Widget Three',
		'id' => 'sidebar-10',
		'description' =>  'Home Widget found on the homepage below showcase box (right one).',
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) ); 



}	

/***************************** Hide Password Protected posts appearing on posts ***************************/

// Filter to hide protected posts
function inspire_exclude_protected($where) {
	global $wpdb;
	return $where .= " AND {$wpdb->posts}.post_password = '' ";
}

// Decide where to display them
function inspire_exclude_protected_action($query) {
	if( !is_single() && !is_page() && !is_admin() ) {
		add_filter( 'posts_where', 'inspire_exclude_protected' );
	}
}

// Action to queue the filter at the right time
add_action('pre_get_posts', 'inspire_exclude_protected_action');


/******************************** Filter the Title ****************************/

function inspire_wp_title( $title, $sep ) {
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
		$title = "$title $sep " . sprintf( 'Page %s', max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'inspire_wp_title', 10, 2 );


/******************************* Admin section ********************************/

if (is_admin()) {
add_action ('admin_menu', 'inspire_admin_menu');
}

function inspire_admin_menu() {
	
	add_theme_page( 'Theme Option', 'Inspire Options', 'edit_theme_options', 'theme_options.php', 'inspire_options_page'); 
	add_action( 'admin_init', 'inspire_register_settings' );

}

function inspire_register_settings() { // whitelist options
  register_setting( 'inspire-option-group', 'inspire-options','inspire_options_validate' );
}

/* Validate input data */
function inspire_options_validate($input) {

$input['logo'] = esc_url_raw($input['logo']);
$input['favicon'] = esc_url_raw($input['favicon']);
$input['footer'] = sanitize_text_field($input['footer']);


$input['homepage-image'] = esc_url_raw($input['homepage-image']);
$input['homepage-title'] = sanitize_text_field($input['homepage-title']);
$input['homepage-text'] = wp_kses($input['homepage-text'], array('a'=>array('href'=>array()),'strong'=>array(),'p'=>array(),'strong'=>array()));
$input['homepage-link'] = esc_url_raw($input['homepage-link']);


return $input;	

}

/************************* Theme Options Page *******************************************/

function inspire_options_page() {
?>	
	<div class="wrap">
<?php screen_icon(); ?>
<h2>Inspire Options</h2>
<form method="post" action="options.php"> 
<?php 
settings_fields( 'inspire-option-group' );
do_settings_sections( 'inspire-option-group' );
$inspire_options = get_option('inspire-options');
?>
<h2> General Settings </h2>
 
 <p>Please upload the logo and favicon to media library and paste the URL below.</p> 
Logo<br><input type="text" size="50" name="inspire-options[logo]" value="<?php echo esc_url($inspire_options['logo']); ?>"> (200x50 only transparent PNG) <br>
Favicon <br><input size="50" type="text" name="inspire-options[favicon]" value="<?php echo esc_url($inspire_options['favicon']); ?>"> <br>
Footer <br><input size="50" name="inspire-options[footer]" value="<?php echo esc_html($inspire_options['footer']); ?>"><br><br>
<h2>Home Page Showcasebox Settings </h2>
Showcase Image:<br><input size="50" name="inspire-options[homepage-image]" value="<?php echo esc_url($inspire_options['homepage-image']); ?>"> (works any size- try big sizes like 300x300)<br><br>
Showcase Title: <br><input size="50" name="inspire-options[homepage-title]" value="<?php echo esc_attr($inspire_options['homepage-title']); ?>"><br><br>
Showcase Text (allowed: a,p,strong) <br><textarea rows="4" cols="50" name="inspire-options[homepage-text]"><?php echo esc_html($inspire_options['homepage-text']); ?></textarea><br><br>
Showcase Link URL: <br><input size="50" name="inspire-options[homepage-link]" value="<?php echo esc_url($inspire_options['homepage-link']); ?>"><br><br>


<?php submit_button(); ?>
</form>
</div>

<?php
}
?>