<?php



// Content Width

if ( ! isset( $content_width ) ) $content_width = 824;


function crates_setup() {

// Theme Support

add_theme_support('automatic-feed-links');
add_theme_support('custom-background');
add_theme_support('post-thumbnails');
add_theme_support( 'post-formats', array(
  'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
) );



add_theme_support( 'custom-header', array(
'uploads'       => true,
'width'                  => 620,
'header-text'            => false
)
  );



// Extras
require_once(get_template_directory() . '/includes/theme-options.php');

// Thumbnails

get_option('thumbnail_crop');

add_image_size('original', 9999, 9999, true);
add_image_size('single', 9999, 400, true);
add_image_size('post', 620, 400, true);
add_image_size('imageformatmasonry', 260, 9999, false);
add_image_size('archive', 50, 50, true);
add_image_size('postfeatured', 360, 270, true);



}
add_action( 'after_setup_theme', 'crates_setup' );







// Navigation Menus

function crates_register_my_menus() {
  register_nav_menus(
    array(
      'main-nav' => __( 'Main Navigation' )
    )
  );
}
add_action( 'init', 'crates_register_my_menus' );




// Sidebars
  
register_sidebar(array('name'=>'Sidebar', 'id'=>'sidebar',
    'before_widget' => '<div class="widget">',
    'after_widget' => '<div class="clear"></div></div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>'
));
register_sidebar(array('name'=>'Header/Nav Sidebar', 'id'=>'header-sidebar',
    'before_widget' => '<section>',
    'after_widget' => '<div class="clear"></div></section>',
    'before_title' => '<h2>',
    'after_title' => '</h2>'
));
register_sidebar(array('name'=>'Footer Col 1', 'id'=>'footer1',
    'before_widget' => '<div class="widget">',
    'after_widget' => '<div class="clear"></div></div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>'
));
register_sidebar(array('name'=>'Footer Col 2', 'id'=>'footer2',
    'before_widget' => '<div class="widget">',
    'after_widget' => '<div class="clear"></div></div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>'
));
register_sidebar(array('name'=>'Footer Col 3', 'id'=>'footer3',
    'before_widget' => '<div class="widget">',
    'after_widget' => '<div class="clear"></div></div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>'
));

// Scripts

function crates_mason_script() {
  wp_enqueue_script( 'jquery-masonry' );
}
add_action( 'wp_enqueue_scripts', 'crates_mason_script' );




// Load js files

function crates_load_javascript_files() {
  wp_register_script( 'pageslide', get_template_directory_uri() . '/js/jquery.pageslide.js', array('jquery'), '1.0', true );
  wp_register_script( 'crates', get_template_directory_uri() . '/js/crates.js', array('jquery'), '1.0', false );
  wp_enqueue_script( 'pageslide' );
  wp_enqueue_script( 'crates' );
  wp_enqueue_script( 'jquery-masonry' );

  if( get_option( 'thread_comments' ) )  {
    wp_enqueue_script( 'comment-reply' );
  }

}
add_action( 'wp_enqueue_scripts', 'crates_load_javascript_files' );





/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Twenty Twelve 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function crates_wp_title( $title, $sep ) {
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
    $title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

  return $title;
}
add_filter( 'wp_title', 'crates_wp_title', 10, 2 );






/* Enqueue New Google Fonts */

function crates_load_google_fonts() {
            wp_register_style('googleFontsMontserrat','http://fonts.googleapis.com/css?family=Montserrat:700');
            wp_enqueue_style( 'googleFontsMontserrat'); 

            wp_register_style('googleFontsPTSans','http://fonts.googleapis.com/css?family=PT+Sans:400,700');
            wp_enqueue_style( 'googleFontsPTSans');

            wp_register_style('googleFontsOpenSans','http://fonts.googleapis.com/css?family=Open+Sans:400,700');
            wp_enqueue_style( 'googleFontsOpenSans');

            wp_register_style('googleFontsRaleway','http://fonts.googleapis.com/css?family=Raleway:400,300,100,500,600,700,900,800');
            wp_enqueue_style( 'googleFontsRaleway');
}
add_action('wp_print_styles', 'crates_load_google_fonts');







// Time ago

function crates_time_ago( $type = 'comment' ) {
  $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
  return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');
}
add_action( 'crates_time', 'crates_time_ago' );







function crates_style_settings() {
require get_template_directory() . '/css/style.php';

}
add_action('wp_head', 'crates_style_settings');





function crates_remove_gallery_css( $css ) {
    return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'crates_remove_gallery_css' );

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );

add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {

$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );

return $html; }

add_action( 'crates_gallery', 'crates_remove_gallery_css' );




function crates_limit_posts_per_archive_page() {

    if ( is_search() && is_category() && is_archive() && is_tag() && is_tax() )

        set_query_var('posts_per_archive_page', 10); // or use variable key: posts_per_page

}

add_filter('pre_get_posts', 'crates_limit_posts_per_archive_page');















// Comment Template

function crates_comment_template($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

<div id="comment-<?php comment_ID(); ?>" class="comment-box">
   
  <?php echo get_avatar($comment,$size='60'); ?>
  
  <div class="comment-text">
  
    <font class="author"><?php printf(__('%s'), comment_author_link()) ?></font> 
    
    <div class="clear"></div>
    
    <div class="comment-text-shift">
      <?php if ($comment->comment_approved == '0') : ?>
      <div class="moderation"><p><?php _e('Your comment is awaiting moderation.') ?></p></div>
      <?php endif; ?>
    
      <?php comment_text() ?>


<div class="commentmeta">
<?php comment_date('j M Y') ?> - 
        
<?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

<?php edit_comment_link('Edit',' - '); ?>
</div>

    </div>
    
  </div>
  <div class="clear"></div>

</div>  

<?php }
add_action( 'crates_comments', 'crates_comment_template' );








add_filter( 'comment_form_default_fields', 'crates_62742_comment_placeholders' );

/**
 * Change default fields, add placeholder and change type attributes.
 *
 * @param  array $fields
 * @return array
 */
function crates_62742_comment_placeholders( $fields )
{
    $fields['author'] = str_replace(
        '<input',
        '<input placeholder="'
        /* Replace 'theme_text_domain' with your theme’s text domain.
         * I use _x() here to make your translators life easier. :)
         * See http://codex.wordpress.org/Function_Reference/_x
         */
            . _x(
                'Name',
                'comment form placeholder',
                'theme_text_domain'
                )
            . '"',
        $fields['author']
    );
    $fields['email'] = str_replace(
        '<input id="email" name="email" type="text"',
        /* We use a proper type attribute to make use of the browser’s
         * validation, and to get the matching keyboard on smartphones.
         */
        '<input type="email" placeholder="Email"  id="email" name="email"',
        $fields['email']
    );
    $fields['url'] = str_replace(
        '<input id="url" name="url" type="text"',
        // Again: a better 'type' attribute value.
        '<input placeholder="Website" id="url" name="url" type="url"',
        $fields['url']
    );

    return $fields;
}












function crates_comment_field($comment_field) {
 
    $comment_field = 
        '<p class="comment-form-comment">
            <textarea required placeholder="Comment" id="comment" name="comment" cols="455" rows="8" aria-required="true"></textarea>
        </p>';
 
    return $comment_field;
}
add_filter('comment_form_field_comment','crates_comment_field');







/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
 
add_action( 'crates_register', 'crates_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function crates_register_required_plugins() {
 
    /**
     * Array of plugin arrays. Required keys are name, slug and required.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
 
        array(

            'name'                  => 'Symple Shortcodes', // The plugin name

            'slug'                  => 'symple-shortcodes', // The plugin slug (typically the folder name)

            'source'                => get_stylesheet_directory() . '/includes/symple-shortcodes.zip', // The plugin source

            'required'              => false, // If false, the plugin is only 'recommended' instead of required

            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

            'external_url'          => '', // If set, overrides default API URL and points to an external URL

        ),

        array(

            'name'                  => 'Zilla Dribbbler', // The plugin name

            'slug'                  => 'zilla-dribbbler', // The plugin slug (typically the folder name)

            'source'                => get_stylesheet_directory() . '/includes/zilla-dribbbler-1.0.zip', // The plugin source

            'required'              => false, // If false, the plugin is only 'recommended' instead of required

            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

            'external_url'          => '', // If set, overrides default API URL and points to an external URL

        ),

        array(

            'name'                  => 'Custom Post Templates', // The plugin name

            'slug'                  => 'custom-post-template', // The plugin slug (typically the folder name)

            'source'                => 'http://downloads.wordpress.org/plugin/custom-post-template.latest-stable.zip', // The plugin source

            'required'              => false, // If false, the plugin is only 'recommended' instead of required

            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

            'external_url'          => '', // If set, overrides default API URL and points to an external URL

        ),
        
        array(

            'name'                  => 'WP-PageNavi', // The plugin name

            'slug'                  => 'wp-pagenavi', // The plugin slug (typically the folder name)

            'source'                => 'http://downloads.wordpress.org/plugin/wp-pagenavi.latest-stable.zip', // The plugin source

            'required'              => false, // If false, the plugin is only 'recommended' instead of required

            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

            'external_url'          => '', // If set, overrides default API URL and points to an external URL

        ),

        array(

            'name'                  => 'AddThis Social Bookmarking Widget', // The plugin name

            'slug'                  => 'addthis', // The plugin slug (typically the folder name)

            'source'                => 'http://downloads.wordpress.org/plugin/addthis.latest-stable.zip', // The plugin source

            'required'              => false, // If false, the plugin is only 'recommended' instead of required

            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

            'external_url'          => '', // If set, overrides default API URL and points to an external URL

        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository

        array(

            'name'      => 'Wordpress SEO by Yoast',

            'slug'      => 'wordpress-seo',

            'required'  => false,

            'source' => 'http://downloads.wordpress.org/plugin/wordpress-seo.latest-stable.zip',

        ),
 
    );
 
    // Change this to your theme text domain, used for internationalising strings
    $theme_text_domain = 'crates';
 
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain'            => $theme_text_domain,           // Text domain - likely want to be the same as your theme.
        'default_path'      => '',                           // Default absolute path to pre-packaged plugins
        'parent_menu_slug'  => 'themes.php',         // Default parent menu slug
        'parent_url_slug'   => 'themes.php',         // Default parent URL slug
        'menu'              => 'install-required-plugins',   // Menu slug
        'has_notices'       => true,                         // Show admin notices or not
        'is_automatic'      => false,            // Automatically activate plugins after installation or not
        'message'           => '',               // Message to output right before the plugins table
        'strings'           => array(
            'page_title'                                => __( 'Install Required Plugins', $theme_text_domain ),
            'menu_title'                                => __( 'Install Plugins', $theme_text_domain ),
            'installing'                                => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
            'oops'                                      => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
            'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                                    => __( 'Return to Required Plugins Installer', $theme_text_domain ),
            'plugin_activated'                          => __( 'Plugin activated successfully.', $theme_text_domain ),
            'complete'                                  => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ) // %1$s = dashboard link
        )
    );
 
    crates( $plugins, $config );
 
}

