<?php
/**
 * The template for displaying the Featured Content
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


if( !function_exists( 'catchbase_featured_content_display' ) ) :
/**
* Add Featured content.
*
* @uses action hook catchbase_before_content.
*
* @since Catchbase 1.0
*/
function catchbase_featured_content_display() {
	//catchbase_flush_transients();
	
	global $post, $wp_query;

	// get data value from options
	$options 		= catchbase_get_theme_options();
	$enablecontent 	= $options['featured_content_option'];
	$contentselect 	= $options['featured_content_type'];
	
	// Front page displays in Reading Settings
	$page_on_front 	= get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts'); 


	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();
	if ( $enablecontent == 'entire-site' || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && $enablecontent == 'homepage' ) ) {
		if( ( !$catchbase_featured_content = get_transient( 'catchbase_featured_content_display' ) ) ) {
			$layouts 	 = $options ['featured_content_layout'];
			$headline 	 = $options ['featured_content_headline'];
			$subheadline = $options ['featured_content_subheadline'];
	
			echo '<!-- refreshing cache -->';

			if ( !empty( $layouts ) ) {
				$classes = $layouts ;
			}

			if( $contentselect == 'demo-featured-content' ) {
				$classes 		.= ' demo-featured-content' ;
				$headline 		= __( 'Featured Content', 'catchbase' );
				$subheadline 	= __( 'Here you can showcase the x number of Featured Content. You can edit this Headline, Subheadline and Feaured Content from "Appearance -> Customize -> Featured Content Options".', 'catchbase' );
			} 
			elseif ( $contentselect == 'featured-page-content' ) {
				$classes .= ' featured-page-content' ;
			}

			//Check Featured Content Position
			if ( isset( $options [ 'featured_content_position' ] ) ) {
				$featured_content_position = $options [ 'featured_content_position' ];
			}
			// Providing Backward Compatible with Version 1.0
			else {
				$featured_content_position =  $options [ 'move_posts_home' ];
			}

			if ( '1' == $featured_content_position ) {
				$classes .= ' border-top' ;
			}

			$catchbase_featured_content ='
				<section id="featured-content" class="' . $classes . '">
					<div class="wrapper">
						<div class="featured-heading-wrap">
							<h1 id="featured-heading" class="entry-title">'. esc_attr( $headline ) .'</h1>
							<p>'. esc_attr( $subheadline ) .'</p>
						</div><!-- .featured-heading-wrap -->

						<div class="featured-content-wrap">';

							// Select content
							if ( $contentselect == 'demo-featured-content'  && function_exists( 'catchbase_demo_content' ) ) {
								$catchbase_featured_content .= catchbase_demo_content( $options );
							}
							elseif ( $contentselect == 'featured-page-content' && function_exists( 'catchbase_page_content' ) ) {
								$catchbase_featured_content .= catchbase_page_content( $options );
							}

			$catchbase_featured_content .='
						</div><!-- .featured-content-wrap -->
					</div><!-- .wrapper -->
				</section><!-- #featured-content -->';
		set_transient( 'catchbase_featured_content', $catchbase_featured_content, 86940 );
		}
	echo $catchbase_featured_content;
	}
}
endif;


if ( ! function_exists( 'catchbase_featured_content_display_position' ) ) :
/**
 * Homepage Featured Content Position
 *
 * @action catchbase_content, catchbase_after_secondary
 * 
 * @since Catchbase 1.0
 */
function catchbase_featured_content_display_position() {
	// Getting data from Theme Options
	$options 		= catchbase_get_theme_options();
	
	//Check Featured Content Position
	if ( isset( $options [ 'featured_content_position' ] ) ) {
		$featured_content_position = $options [ 'featured_content_position' ];
	}
	// Providing Backward Compatible with Version 1.0
	else {
		$featured_content_position =  $options [ 'move_posts_home' ];
	}

	if ( '1' != $featured_content_position ) { 
		add_action( 'catchbase_before_content', 'catchbase_featured_content_display', 40 );
	} else {
		add_action( 'catchbase_after_content', 'catchbase_featured_content_display', 40 );
	}
	
}
endif; // catchbase_featured_content_display_position
add_action( 'catchbase_before', 'catchbase_featured_content_display_position' );


if ( ! function_exists( 'catchbase_demo_content' ) ) :
/**
 * This function to display featured posts content
 *
 * @get the data value from customizer options
 *
 * @since Catchbase 1.0
 *
 */
function catchbase_demo_content( $options ) {
	$catchbase_demo_content = '
		<article id="featured-post-1" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Durbar Square" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured1-400x225.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h1 class="entry-title">
						Durbar Square
					</h1>
				</header>
				<div class="entry-content">
					The Kathmandu Durbar Square holds the palaces of the Malla and Shah kings who ruled over the city. Along with these palaces, the square surrounds quadrangles revealing courtyards and temples.
				</div>
			</div><!-- .entry-container -->			
		</article>

		<article id="featured-post-2" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Seto Ghumba" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured2-400x225.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h1 class="entry-title">
						Seto Ghumba
					</h1>
				</header>
				<div class="entry-content">
					Situated western part in the outskirts of the Kathmandu valley, Seto Gumba also known as Druk Amitabh Mountain or White Monastery, is one of the most popular Buddhist monasteries of Nepal.
				</div>
			</div><!-- .entry-container -->			
		</article>
		
		<article id="featured-post-3" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Swayambhunath" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured3-400x225.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h1 class="entry-title">
						Swayambhunath
					</h1>
				</header>
				<div class="entry-content">
					Swayambhunath is an ancient religious site up in the hill around Kathmandu Valley. It is also known as the Monkey Temple as there are holy monkeys living in the north-west parts of the temple.
				</div>
			</div><!-- .entry-container -->			
		</article>';

	if( 'layout-four' == $options ['featured_content_layout']) {
		$catchbase_demo_content .= '
		<article id="featured-post-4" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Dhulikhel" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured4-400x225.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h1 class="entry-title">
						Dhulikhel
					</h1>
				</header>
				<div class="entry-content">
					Dhulikhel is a popular place to observe the high Himalaya - A Tourist Paradise: The spectacular snowfed mountains seen from Dhuklikhel must be one of the finest panoramic views in the world. 
				</div>
			</div><!-- .entry-container -->			
		</article>';
	}

	return $catchbase_demo_content;
}
endif; // catchbase_demo_content


if ( ! function_exists( 'catchbase_page_content' ) ) :
/**
 * This function to display featured page content
 *
 * @param $options: catchbase_theme_options from customizer
 *
 * @since Catchbase 1.0
 */
function catchbase_page_content( $options ) {
	global $post;

	$quantity 					= $options [ 'featured_content_number' ];

	$more_link_text				= $options['excerpt_more_text'];
	
	$catchbase_page_content 	= '';

   	$number_of_page 			= 0; 		// for number of pages

	$page_list					= array();	// list of valid pages ids

	//Get valid pages
	for( $i = 1; $i <= $quantity; $i++ ){
		if( isset ( $options['featured_content_page_' . $i] ) && $options['featured_content_page_' . $i] > 0 ){
			$number_of_page++;

			$page_list	=	array_merge( $page_list, array( $options['featured_content_page_' . $i] ) );
		}

	}
	if ( !empty( $page_list ) && $number_of_page > 0 ) {
		$get_featured_posts = new WP_Query( array(
                    'posts_per_page' 		=> $number_of_page,
                    'post__in'       		=> $page_list,
                    'orderby'        		=> 'post__in',
                    'post_type'				=> 'page',
                ));

		$i=0; 
		while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post(); $i++;
			$title_attribute = apply_filters( 'the_title', get_the_title( $post->ID ) );
			
			$excerpt = get_the_excerpt();
			
			$catchbase_page_content .= '
				<article id="featured-post-' . $i . '" class="post hentry featured-page-content">';	
				if ( has_post_thumbnail() ) {
					$catchbase_page_content .= '
					<figure class="featured-homepage-image">
						<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">
						'. get_the_post_thumbnail( $post->ID, 'medium', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'pngfix' ) ) .'
						</a>
					</figure>';
				}
				else {
					$catchbase_first_image = catchbase_get_first_image( $post->ID, 'medium', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'pngfix' ) );

					if ( '' != $catchbase_first_image ) {
						$catchbase_page_content .= '
						<figure class="featured-homepage-image">
							<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">
								'. $catchbase_first_image .'
							</a>
						</figure>';
					}
				}

				$catchbase_page_content .= '
					<div class="entry-container">';
						$catchbase_page_content .= the_title( '<h2>','</h2>', false );
						$catchbase_page_content .= '<p>'. get_the_content( $more_link_text , true ) .'</p>';
						$catchbase_page_content .= '<a href="' . get_permalink() . '" title="Permalink to '.the_title( '', '', false ).'"></a>';
					$catchbase_page_content .= '
					</div><!-- .entry-container -->
				</article><!-- .featured-post-'. $i .' -->';
		endwhile;

		wp_reset_query();
	}		
	
	return $catchbase_page_content;
}
endif; // catchbase_page_content