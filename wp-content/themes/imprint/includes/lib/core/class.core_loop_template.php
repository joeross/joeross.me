<?php
/**
 * Imprint Core Loop Template
 * 
 * @package Imprint
 * @subpackage Core
 * @category Template
 * @since Imprint 1.0
 */

/**
 * Class used to implement the loop.php functionality into the theme.
 * 
 * @since Imprint 1.0
 */
class Imprint_Loop_Template {
    
    
        /**
         * Theme database options value
         * 
         * @var string Theme database options value
         * @since Imprint 1.0
         */
        private $db_option;
        
        
        /**
         * Constructor - Initialize the class.
         * 
         * @since Imprint 1.0
         */
        function __construct(){
            $this->_set_db_option();
            
            add_action( 'imprint_archive_title_hook', array( $this , 'show_title') );
            add_action( 'imprint_archive_meta_hook', array( $this , 'show_meta') );
            add_action( 'imprint_archive_excerpt_hook', array( $this , 'show_thumbnail') );
            add_action( 'imprint_archive_excerpt_hook', array( $this , 'show_excerpts') );
            add_action( 'imprint_archive_excerpt_hook', array( $this , 'show_paginated') );
            add_action( 'imprint_archive_excerpt_hook', array( $this , 'show_readme') );
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
         * Checks whether thumbnail images can be displayed
         * on the archive pages or not.
         *
         * @return bool
         * @since Imprint 1.0
         */
        private function _enable_thumbnail(){
            if ( $this->db_option['disable_thumbnails'] ):
                return FALSE;
            else:
		return TRUE;
            endif;
        }
        
        
        
        /**
         * Checks whether excerpts can be displayed on the archive
         * pages or not.
         * 
         * @return bool
         * @since Imprint 1.0
         */
        private function _enable_excerpt(){
            if ( $this->db_option['disable_excerpts'] ):
                    return FALSE;
            else:
                    return TRUE;
            endif;
        }

        
        
        /**
         * Changes the "read more" link text under the excerpts. If any
         * option in the database is not set then uses "Continue Reading..."
         * by default.
         * 
         * @since Imprint 1.0
         */
        private function _readme_text() {
            if ( ! $this->db_option['disable_rm'] ):
                if ( $this->db_option['rm_text'] ):
                    ?><a class="read-more" href="<?php the_permalink(); ?>"><?php printf( __( '%s', 'imprint' ), esc_html( $this->db_option['rm_text'] ) ); ?></a><?php
                else:
                    ?><a class="read-more" href="<?php the_permalink(); ?>"><?php printf( __( '%s', 'imprint' ), 'Continue Reading...' ); ?></a><?php
                endif;
            endif;
        }
        

        
        /**
         * Method is used to display the title of a post in archive loop.
         * 
         * @since Imprint 1.0
         */
        public function show_title() {
            ?>
            <h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permalink to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
            <?php
        }
        
        
        

        /**
         * Method shows the post meta data like: Date, Author, Category, Comments.
         * 
         * @since Imprint 1.0
         */
        public function show_meta() {      
            ?>
            <span><?php _e('Written on', 'imprint') ?> </span><span class="archive-meta-date"><?php echo get_the_time('M, d, Y'); ?></span>
            <span><?php _e('by', 'imprint') ?> </span><span class="archive-meta-author"><?php the_author_posts_link(); ?></span>
            <span><?php _e('in', 'imprint') ?> </span><span class="archive-meta-category"><?php the_category(', '); ?></span>
            <?php 
                $post = get_post();
                if ( post_password_required($post) ):
            ?>
            <span>  </span><span class="archive-meta-comment">&#124; <?php _e('Password Protected', 'imprint') ?></span>
            <?php else: ?>
            <span>  </span><span class="archive-meta-comment"><?php comments_popup_link( '&#124; Leave a comment', '&#124; 1 Comment.', '&#124; % Comments.', '', ''); ?></span>
            <?php endif; ?>

            <?php
        }
        
        
        
        /**
         * Method displays (readme text)
         * 
         * @uses self::_readme_text() To get the readme text.
         * @since Imprint 1.0
         */
        public function show_readme() {
            $this->_readme_text();
        }
        
        /**
         * Method displays thumbnail only when the post has fullfiled these conditions.
         * 1) The post has a thumbnail.
         * 2) Thumbnails are enabled by the user.
         * 3) Excerpts are enabled by the user.
         * 
         * @since Imprint 1.0
         */
        public function show_thumbnail() {
            if ( has_post_thumbnail() && $this->_enable_thumbnail() && $this->_enable_excerpt() && ! post_password_required() && ! is_attachment() ):
                ?><div class="archive-thumb"><?php the_post_thumbnail( 'imprintThumb' ) ?></div><?php
            endif;
        }
        
        /**
         * Method displays excerpt only if excerpts are enabled else content is displayed.
         * 
         * @uses self::_enable_excerpt() Returns 'true' is excerpts are enabled else returns 'false'.
         * 
         * @since Imprint 1.0
         */
        public function show_excerpts() {
            if ( $this->_enable_excerpt() ):
                the_excerpt();
            else:
                the_content();
            endif;
        }
        
        /**
         * Method displays paginated (Post divided into multiple pages) only if available.
         * 
         * @since Imprint 1.0
         */
        public function show_paginated() {
            wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages:', 'generous') . '</span>', 'after' => '</div>')); 
        }
    
    }

$Imprint_Loop_Obj = new Imprint_Loop_Template;