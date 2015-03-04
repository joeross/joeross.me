<?php
/**
 * Imprint Post Template Class
 * 
 * @package Imprint
 * @subpackage Core
 * @category Template
 * @since Imprint 1.0
 */


/**
 * Class is used to display the entire single post.
 * 
 * @since Imprint 1.0
 */
class Imprint_Post_Template {
        
        /**
         * @var string Database Options value
         * 
         * @since Imprint 1.0
         */
        private $db_option;

        /**
         * Constructor - Initialize the class.
         * 
         * @uses imprint_post_template_hook() Hook called on single post.
         * @uses imprint_below_post_hook() Hook called below single posts.
         * 
         * @since Imprint 1.0
         */
        function __construct(){
            $this->_set_db_option();

            add_action( 'imprint_post_template_hook', array( $this , 'show_title'), 10 );
            add_action( 'imprint_post_template_hook', array( $this , 'show_post_meta'), 20 );
            add_action( 'imprint_post_template_hook', array( $this , 'show_post_content'), 30 );
            add_action( 'imprint_post_template_hook', array( $this , 'show_below_post_content'), 40 );
            add_action( 'imprint_post_template_hook', array( $this , 'show_navigation'), 60 );
            add_action( 'imprint_post_template_hook', array( $this , 'show_comments'), 70 );
            add_action( 'imprint_below_post_hook', array( $this , 'show_edit_post') );
            add_action( 'imprint_below_post_hook', array( $this , 'show_tags') );

        }


        
        /**
         * Method sets $db_option property with the Imprint db options value.
         * 
         * @global string $imprint_theme_name Name of the theme
         * @since Imprint 1.0
         */
        private function _set_db_option() {
            global $imprint_options;
            $this->db_option = $imprint_options;
        }
    
        
        
        /**
         * Displays the meta values of a single post.
         * 
         * @since Imprint 1.0
         */
        private function _get_post_meta() {
    
            printf( __( '<span class="meta-author-url">Posted By</span> %1$s<span class="meta-date-url">, On %2$s </span>', 'imprint' ),
                sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
                        get_author_posts_url( get_the_author_meta( 'ID' ) ),
                        esc_attr( sprintf( __( 'View all posts by %s', 'imprint' ), get_the_author() ) ),
                        get_the_author()
                    ),
                sprintf( '<span class="entry-date">%1$s</span>',
                    get_the_date()
                )/*,
                    sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
                        get_author_posts_url( get_the_author_meta( 'ID' ) ),
                        esc_attr( sprintf( __( 'View all posts by %s', 'imprint' ), get_the_author() ) ),
                        get_the_author()
                    )*/
            );
    }

        
    
        /**
         * Method is used to display the post title. The post title container differs
         * on the basis of where it is being displayed. If it is displayed on the
         * homepage then <h1> container is used and if it is displayed on single posts
         * then <h2> container is used.
         * 
         * @since Imprint 1.0
         */
        public function show_title() {
            ?>
            <div class="post-title">
                    <h1><?php the_title(); ?></h1>
           </div>
           <?php
        }
    
        
        
        
        /**
         * Method used to display post meta like date, author, etc..
         * 
         * @since Imprint 1.0
         */
        public function show_post_meta() {
            ?>
            <div class="post-meta">
                <?php $this->_get_post_meta(); ?>
            </div>
            <?php
        }
        
        
        
        
        /**
         * Method used to display post content and post pagination links.
         * 
         * @since Imprint 1.0
         */
        public function show_post_content() {
            ?>
            <div class="post-content">
                <?php the_content(); ?>
                <?php wp_link_pages(array('before' => '<div class="post-nav-link"><span>' . __('Pages:', 'imprint') . '</span>', 'after' => '</div>')); ?>
            </div>
            <?php
            
        }
        
        
        
        /**
         * Method displays content below post. 
         * 
         * HOOK: 'imprint_below_post_hook' is also executed in this function.
         * 
         * @uses imprint_below_post_hook() Hook called below single posts.
         * 
         * @since Imprint 1.0
         */
        public function show_below_post_content() {
            ?>
            <div class="post-below-content">
                <?php imprint_below_post_hook(); ?>                       
            </div>
            <?php
        }

        
        
        
        /**
         * Displays the bottom navigation links for the single posts.
         * 
         * @since Imprint 1.0
         */
        public function show_navigation() {
        ?>
        <div class="post-nav">
            <div class="nav-next">
                <?php previous_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Previous post link', 'imprint' ) . '</span>' ); ?>
            </div>
            <div class="nav-previous">
                <?php next_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Next post link', 'imprint' ) . '</span> %title' ); ?>
            </div>
        </div>
        <?php
        }
        
        
        
        
        /**
         * Method calls the comment template.
         * 
         * @since Imprint 1.0
         */
        public function show_comments() {
            comments_template( '', true );
        }


        
       
        /**
         * Method shows tags below single post.
         * 
         * HOOKED into 'imprint_below_post_hook'
         * 
         * @uses imprint_below_post_hook() Hook called below single posts.
         * 
         * @since Imprint 1.0
         */
        public function show_tags() {
            if ( has_tag() && ! $this->db_option['disable_tag_links'] ):
        ?>
            <p class="tags-below-content"><?php the_tags( __( 'Tags: ', 'imprint' ) , ', ', ''); ?></p>

        <?php
            endif;
        }
        
        /**
         * Method shows edit-post link below single posts. (Only for looged in users)
         * 
         * HOOKED into 'imprint_below_post_hook'
         * 
         * @uses imprint_below_post_hook() Hook called below single posts.
         * 
         * @since Imprint 1.0
         */
        public function show_edit_post(){
            edit_post_link( __( 'edit post', 'imprint' ), '<div class="edit-link">', '</div>' );
        }
        
        
}
$Imprint_Post_Template_Obj = new Imprint_Post_Template;