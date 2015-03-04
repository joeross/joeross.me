<?php
/**
 * Theme setup functions.
 *
 * @package ThinkUpThemes
 */


//----------------------------------------------------------------------------------
//	ADD CUSTOM HOOKS
//----------------------------------------------------------------------------------

// Used at top if header.php
function thinkup_hook_header() { 
	do_action('thinkup_hook_header');
}


//----------------------------------------------------------------------------------
//	CORRECT Z-INDEX OF OEMBED OBJECTS
//----------------------------------------------------------------------------------
function thinkup_fix_oembed( $embed ) {
	if ( strpos( $embed, '<param' ) !== false ) {
   		$embed = str_replace( '<embed', '<embed wmode="transparent" ', $embed );
   		$embed = preg_replace( '/param>/', 'param><param name="wmode" value="transparent" />', $embed, 1);
	}
	return $embed;
}
add_filter( 'embed_oembed_html', 'thinkup_fix_oembed', 1 );


//----------------------------------------------------------------------------------
//	ADD PAGE TITLE
//----------------------------------------------------------------------------------

function thinkup_title_select() {
global $post;

	if ( is_page() ) {
		printf( __( '%s', 'renden' ), get_the_title() );
	} elseif ( is_attachment() ) {
		printf( __( 'Blog Post Image: %s', 'renden' ), esc_attr( get_the_title( $post->post_parent ) ) );
	} else if ( is_single() ) {
		printf( __( '%s', 'renden' ), get_the_title() );
	} else if ( is_search() ) {
		printf( __( 'Search Results: %s', 'renden' ), get_search_query() );
	} else if ( is_404() ) {
		printf( __( 'Page Not Found', 'renden' ) );
	} else if ( is_category() ) {
		printf( __( 'Category Archives: %s', 'renden' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		printf( __( 'Tag Archives: %s', 'renden' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		the_post();
		printf( __( 'Author Archives: %s', 'renden' ), get_the_author() );
		rewind_posts();
	} elseif ( is_day() ) {
		printf( __( 'Daily Archives: %s', 'renden' ), get_the_date() );
	} elseif ( is_month() ) {
		printf( __( 'Monthly Archives: %s', 'renden' ), get_the_date( 'F Y' ) );
	} elseif ( is_year() ) {
		printf( __( 'Yearly Archives: %s', 'renden' ), get_the_date( 'Y' ) );
	} elseif ( is_post_type_archive( 'portfolio' ) ) {
		printf( __( 'Portfolio', 'renden' ) );
	} elseif ( is_post_type_archive( 'client' ) ) {
		printf( __( 'Our Clients', 'renden' ) );
	} elseif ( is_post_type_archive( 'team' ) ) {
		printf( __( 'Our Team', 'renden' ) );
	} elseif ( is_post_type_archive( 'testimonial' ) ) {
		printf( __( 'Customer Testimonials', 'renden' ) );
	} elseif ( is_post_type_archive( 'product' ) and function_exists( 'thinkup_woo_titleshop_archive' ) ) {
		thinkup_woo_titleshop_archive();
	} elseif ( thinkup_check_isblog() ) {
		printf( __( 'Blog', 'renden' ) );
	} elseif ( is_tax() ) {
		echo single_term_title( "", false );
	} else {
		printf( __( '%s', 'renden' ), get_the_title() );
	}
}


//----------------------------------------------------------------------------------
//	ADD BREADCRUMBS FUNCTIONALITY
//----------------------------------------------------------------------------------

function thinkup_input_breadcrumb() {

	$output = NULL;
	$count_loop = NULL;
	$count_categories = NULL;

	$delimiter 		   = '<span class="delimiter">/</span>';

	$delimiter_inner   =   '<span class="delimiter_core"> &bull; </span>';
	$main              =   __( 'Home ', 'renden' );
	$maxLength         =   30;

	// Archive variables
	$arc_year       =   get_the_time('Y');
	$arc_month      =   get_the_time('F');
	$arc_day        =   get_the_time('d');
	$arc_day_full   =   get_the_time('l');  

	// URL variables
	$url_year    =   get_year_link($arc_year);
	$url_month   =   get_month_link($arc_year,$arc_month);

	// Display breadcumbs if NOT the home page
	if ( !is_home() ) {
		$output .= '<div id="breadcrumbs"><div id="breadcrumbs-core">';
		global $post, $cat;
		$homeLink = home_url( '/' );
		$output .=  '<a href="' . $homeLink . '">' . $main . '</a>' . $delimiter;    

		// Display breadcrumbs for single post
		if ( is_single() ) {
			$category = get_the_category();
			$num_cat = count($category);
			if ($num_cat <=1) {
				$output .=  ' ' . get_the_title();
			} else {

				// Count Total categories
				foreach( get_the_category() as $category) {
					$count_categories++;
				}
				
				// Output Categories
				foreach( get_the_category() as $category) {
					$count_loop++;

					if ( $count_loop < $count_categories ) {
						$output .= '<a href="'.get_category_link($category->term_id ).'">'.$category->cat_name.'</a>' . $delimiter_inner; 
					} else {
						$output .= '<a href="'.get_category_link($category->term_id ).'">'.$category->cat_name.'</a>'; 
					}
				}
				
				if (strlen(get_the_title()) >= $maxLength) {
					$output .=  ' ' . $delimiter . trim(substr(get_the_title(), 0, $maxLength)) . ' ...';
				} else {
					$output .=  ' ' . $delimiter . get_the_title();
				}
			}
		} elseif (is_category()) {
			$output .= __( 'Archive Category: ', 'renden' ) . get_category_parents($cat, true,' ' . $delimiter . ' ') ;
		} elseif ( is_tag() ) {
			$output .= __( 'Posts Tagged: ', 'renden' ) . single_tag_title("", false) . '"';
		} elseif ( is_day() ) {
			$output .=  '<a href="' . $url_year . '">' . $arc_year . '</a> ' . $delimiter . ' ';
			$output .=  '<a href="' . $url_month . '">' . $arc_month . '</a> ' . $delimiter . $arc_day . ' (' . $arc_day_full . ')';
		} elseif ( is_month() ) {
			$output .=  '<a href="' . $url_year . '">' . $arc_year . '</a> ' . $delimiter . $arc_month;
		} elseif ( is_year() ) {
			$output .=  $arc_year;
		} elseif ( is_search() ) {
			$output .= __( 'Search Results for: ', 'renden' ) . get_search_query() . '"';
		} elseif ( is_page() && !$post->post_parent ) {
			$output .=  get_the_title();
		} elseif ( is_page() && $post->post_parent ) {
			$post_array = get_post_ancestors( $post );
			krsort( $post_array ); 
			foreach( $post_array as $key=>$postid ){
				$post_ids = get_post( $postid );
				$title    = $post_ids->post_title;
				$output  .= '<a href="' . get_permalink($post_ids) . '">' . $title . '</a>' . $delimiter;
			}
			the_title();
		} elseif ( is_author() ) {
			global $author;
			$user_info = get_userdata($author);
			$output .= __( 'Archived Article(s) by Author: ', 'renden' ) . $user_info->display_name ;
		} elseif ( is_404() ) {
			$output .= __( 'Error 404 - Not Found.', 'renden' );
		} elseif( is_tax() ) {
			$output .= get_queried_object()->name;
		} elseif ( is_post_type_archive( 'portfolio' )	) {
			$output .= __( 'Portfolio', 'renden' );
		} elseif ( is_post_type_archive( 'product' ) and function_exists( 'thinkup_woo_titleshop_archive' ) ) {
			thinkup_woo_titleshop_archive();
		}
       $output .=  '</div></div>';
	   
	   return $output;
    }
}


//----------------------------------------------------------------------------------
//	ADD PAGINATION FUNCTIONALITY
//----------------------------------------------------------------------------------
function thinkup_input_pagination( $pages = "", $range = 2 ) {
global $paged;
global $wp_query;

$pag_before  = NULL;
$pag_after   = NULL;
$pag_current = NULL;
$pag_close   = NULL;

	$showitems = ($range)+1;  

	if(empty($paged)) $paged = 1;

	if($pages == "") {
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}

if ( $paged > 1 ) {
	$pag_before = '<span class="pag-before">';
	$pag_current = '</span><span class="pag-current">';
	$pag_after = '</span><span class="pag-after">';
	$pag_close = '</span>';
}

if ( $paged == 1 ) {
	$pag_class = ' pag-start';
} else if ( $paged == $pages ) {
	$pag_class = ' pag-end';
} else {
	$pag_class = ' pag-inner';
}

	if(1 != $pages) {
		echo '<ul class="pag' . $pag_class . '">';

			echo $pag_before;
	
			if($paged > 2 && $paged > $range+1 && $showitems < $pages)
				echo '<li class="pag-first"><a href="' . get_pagenum_link(1). '"><i class="fa fa-angle-double-left"></i></a></li>';
			if($paged > 1 && $showitems < $pages) 
				echo '<li class="pag-previous"><a href="' . get_pagenum_link($paged - 1). '"><i class="fa fa-angle-left"></i></a></li>';

			for ($i=1; $i <= $pages; $i++) {
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
					if ( $paged == $i ) {
						echo $pag_current;
							echo '<li class="current"><span>' . $i . '</span></li>'; 
						echo $pag_after;
					} else {
						echo '<li><a href="' . get_pagenum_link($i) . '">'. $i . '</a></li>';
					}
				}
			}

			if ($paged < $pages && $showitems < $pages)
				echo '<li class="pag-next"><a href="' . get_pagenum_link($paged + 1) . '"><i class="fa fa-angle-right"></i></a></li>';
			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
				echo '<li class="pag-last" ><a href="' . get_pagenum_link($pages) . '"><i class="fa fa-angle-double-right"></i></a></li>';

			echo $pag_close;
		echo '</ul>';
	}
}


//----------------------------------------------------------------------------------
//	ADD CUSTOM FEATURED IMAGE SIZES
//----------------------------------------------------------------------------------

function thinkup_input_addimagesizes() {

	// Image size for testimonial shortcode
	add_image_size( 'sc-testimonial', 53, 53, true );

	// 1 Column Layout
	add_image_size( 'column1-1/2', 1140, 570, true );
	add_image_size( 'column1-1/3', 1140, 380, true );
	add_image_size( 'column1-1/4', 1140, 285, true );
	add_image_size( 'column1-2/5', 1140, 456, true );

	// 2 Column Layout
	add_image_size( 'column2-1/1', 570, 570, true );
	add_image_size( 'column2-1/4', 570, 142, true );
	add_image_size( 'column2-1/2', 570, 285, true );
	add_image_size( 'column2-2/3', 570, 380, true );
	add_image_size( 'column2-3/5', 570, 342, true );

	// 3 Column Layout
	add_image_size( 'column3-1/1', 380, 380, true );
	add_image_size( 'column3-1/3', 320, 107, true );
	add_image_size( 'column3-2/5', 380, 152, true );	
	add_image_size( 'column3-2/3', 380, 254, true );
	add_image_size( 'column3-3/4', 380, 285, true );

	// 4 Column Layout
	add_image_size( 'column4-1/1', 285, 285, true );
	add_image_size( 'column4-2/3', 285, 190, true );
	add_image_size( 'column4-3/4', 285, 214, true );
}
add_action( 'init', 'thinkup_input_addimagesizes' );
 
function thinkup_input_showimagesizes($sizes) {

	// 1 Column Layout
	$sizes['column1-1/2'] = 'Full - 1:2';
	$sizes['column1-1/3'] = 'Full - 1:3';
	$sizes['column1-1/4'] = 'Full - 1:4';
	$sizes['column1-2/5'] = 'Full - 2:5';

	// 2 Column Layout
	$sizes['column2-1/1'] = 'Half - 1:1';
	$sizes['column2-1/2'] = 'Half - 1:2';
	$sizes['column2-2/3'] = 'Half - 2:3';
	$sizes['column2-3/5'] = 'Half - 3:5';

	// 3 Column Layout
	$sizes['column3-1/1'] = 'Third - 1:1';
	$sizes['column3-1/3'] = 'Third - 1:3';
	$sizes['column3-2/5'] = 'Third - 2:5';
	$sizes['column3-2/3'] = 'Third - 2:3';
	$sizes['column3-3/4'] = 'Third - 3:4';

	// 4 Column Layout
	$sizes['column4-1/1'] = 'Quarter - 1:1';
	$sizes['column4-2/3'] = 'Quarter - 2:3';
	$sizes['column4-3/4'] = 'Quarter - 3:4';

	return $sizes;
}
add_filter('image_size_names_choose', 'thinkup_input_showimagesizes');


//----------------------------------------------------------------------------------
//	ADD HOME: HOME TO CUSTOM MENU PAGE LIST
//----------------------------------------------------------------------------------

function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );


//----------------------------------------------------------------------------------
//	ADD FUNCTION TO GET CURRENT PAGE URL
//----------------------------------------------------------------------------------

function thinkup_check_currentpage() {
	$pageURL = 'http';
	if( isset($_SERVER["HTTPS"]) ) {
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	$pageURL = rtrim($pageURL, '/') . '/';

	$pageURL = str_replace( "www.", "", $pageURL );

	return $pageURL;
}

function thinkup_check_ishome() {
	$pageURL = 'http';
	if( isset($_SERVER["HTTPS"]) ) {
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	$pageURL = rtrim($pageURL, '/') . '/';

	$pageURL = str_replace( "www.", "", $pageURL );
	$siteURL = str_replace( "www.", "", site_url( '/' ) );

	if ( $pageURL == $siteURL ) {
		return true;
	} else {
		return false;
	}
}


//----------------------------------------------------------------------------------
//	ADD CUSTOM 'get_comments_popup_link' FUNCTION - Credit to http://www.thescubageek.com/code/wordpress-code/add-get_comments_popup_link-to-wordpress/
//----------------------------------------------------------------------------------

// Modifies WordPress's built-in comments_popup_link() function to return a string instead of echo comment results
function thinkup_get_comments_popup_link( $zero = false, $one = false, $more = false, $css_class = '', $none = false ) {
    global $wpcommentspopupfile, $wpcommentsjavascript;
 
    $id = get_the_ID();
 
    if ( false === $zero ) $zero = __( 'No Comments','renden' );
    if ( false === $one ) $one = __( '1 Comment','renden' );
    if ( false === $more ) $more = __( '% Comments','renden' );
    if ( false === $none ) $none = __( 'Comments Off','renden' );
 
    $number = get_comments_number( $id );
 
    $str = '';
 
    if ( 0 == $number && !comments_open() && !pings_open() ) {
        $str = '<span' . ((!empty($css_class)) ? ' class="' . esc_attr( $css_class ) . '"' : '') . '>' . $none . '</span>';
        return $str;
    }
 
    if ( post_password_required() ) {
        $str = __('Enter your password to view comments.','renden');
        return $str;
    }
 
    $str = '<a href="';
    if ( $wpcommentsjavascript ) {
        if ( empty( $wpcommentspopupfile ) )
            $home = home_url();
        else
            $home = get_option('siteurl');
        $str .= $home . '/' . $wpcommentspopupfile . '?comments_popup=' . $id;
        $str .= '" onclick="wpopen(this.href); return false"';
    } else { // if comments_popup_script() is not in the template, display simple comment link
        if ( 0 == $number )
            $str .= get_permalink() . '#respond';
        else
            $str .= get_comments_link();
        $str .= '"';
    }
 
    if ( !empty( $css_class ) ) {
        $str .= ' class="'.$css_class.'" ';
    }
    $title = the_title_attribute( array('echo' => 0 ) );
 
    $str .= apply_filters( 'comments_popup_link_attributes', '' );
 
    $str .= ' title="' . esc_attr( sprintf( __('Comment on %s','renden'), $title ) ) . '">';
    $str .= thinkup_get_comments_number_str( $zero, $one, $more );
    $str .= '</a>';
     
    return $str;
}
 
// Modifies WordPress's built-in comments_number() function to return string instead of echo
function thinkup_get_comments_number_str( $zero = false, $one = false, $more = false, $deprecated = '' ) {
    if ( !empty( $deprecated ) )
        _deprecated_argument( __FUNCTION__, '1.3' );
 
    $number = get_comments_number();
 
    if ( $number > 1 )
        $output = str_replace('%', number_format_i18n($number), ( false === $more ) ? __( '% Comments', 'renden' ) : $more);
    elseif ( $number == 0 )
        $output = ( false === $zero ) ? __( 'No Comments', 'renden' ) : $zero;
    else // must be one
        $output = ( false === $one ) ? __( '1 Comment', 'renden' ) : $one;
 
    return apply_filters('comments_number', $output, $number);
}


//----------------------------------------------------------------------------------
//	CHANGE FALLBACK WP_PAGE_MENU CLASSES TO MATCH WP_NAV_MENU CLASSES
//----------------------------------------------------------------------------------

function thinkup_add_menuclass( $ulclass ) {

	$ulclass = preg_replace( '/<ul>/', '<ul class="menu">', $ulclass, 1 );
	$ulclass = str_replace( 'children', 'sub-menu', $ulclass );

	return preg_replace('/<div (.*)>(.*)<\/div>/iU', '$2', $ulclass );
}
add_filter( 'wp_page_menu', 'thinkup_add_menuclass' );


//----------------------------------------------------------------------------------
//	DETERMINE IF THE PAGE IS A BLOG - USEFUL FOR HOMEPAGE BLOG.
//----------------------------------------------------------------------------------

// Credit to: http://www.poseidonwebstudios.com/web-development/wordpress-is_blog-function/
function thinkup_check_isblog() {
 
    global $post;
 
    //Post type must be 'post'.
    $post_type = get_post_type($post);
 
    //Check all blog-related conditional tags, as well as the current post type,
    //to determine if we're viewing a blog page.
    return (
        ( is_home() || is_archive() )
        && ($post_type == 'post')
    ) ? true : false ;
 
}


//----------------------------------------------------------------------------------
//	CONVERT HEX COLORS TO RGB.
//----------------------------------------------------------------------------------

function thinkup_convert_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}


//----------------------------------------------------------------------------------
//	ADD FEATURED IMAGE THUMBNAIL.
//----------------------------------------------------------------------------------

// Add featured images to posts
add_filter('manage_pages_columns', 'thinkup_posts_columns', 5);
add_filter('manage_posts_columns', 'thinkup_posts_columns', 5);
add_action('manage_posts_custom_column', 'thinkup_posts_custom_columns', 5, 2);
add_action('manage_pages_custom_column', 'thinkup_posts_custom_columns', 5, 2);
function thinkup_posts_columns($defaults){
    $defaults['riv_post_thumbs'] = __( 'Thumbs', 'renden' );
    return $defaults;
}
function thinkup_posts_custom_columns($column_name, $id){
        if($column_name === 'riv_post_thumbs'){
        echo the_post_thumbnail( 'thumbnail' );
    }
}


//----------------------------------------------------------------------------------
//	ADD GOOGLE FONT - OPEN SANS. (http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/)
//----------------------------------------------------------------------------------

function thinkup_googlefonts_url() {
    $fonts_url = '';

    // Translators: Translate thsi to 'off' if there are characters in your language that are not supported by Open Sans
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'renden' );
 
    if ( 'off' !== $open_sans ) {
        $font_families = array();
  
        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:300,400,600,700';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
 
    return $fonts_url;
}

function thinkup_googlefonts_scripts() {
   wp_enqueue_style( 'thinkup-google-fonts', thinkup_googlefonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'thinkup_googlefonts_scripts' );


?>