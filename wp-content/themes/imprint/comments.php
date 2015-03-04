<?php
/*
 * Template for displaying comments.
 * 
 * @package Imprint
 * @since Imprint 1.0
 */
?>

<div id="comments">

<?php if (post_password_required() ): ?>
      <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments', 'imprint' ) ?></p>
      </div>
<?php return; ?>
<?php endif; ?>


      <?php if ( have_comments() ): ?>

            <h3 id="comments-title"><?php
                      printf( _n( 'Comments', '%1$s Comments', get_comments_number(), 'imprint' ),
                      number_format_i18n( get_comments_number() ) );
            ?></h3>

                  <ol class="commentlist">
                      <?php wp_list_comments( array( 'callback' => 'imprint_comment_callback' ) ); ?>
                  </ol>

            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
                  <div class="comment-navigation">
                       <div class="nav-previous"><?php previous_comments_link( __( 'Older Comments <span class="meta-nav">&rarr;</span>', 'imprint' ) ); ?></div>
                       <div class="nav-next"><?php next_comments_link( __( '<span class="meta-nav">&larr;</span> Newer Comments', 'imprint' ) ); ?></div>
                  </div> <!-- .navigation -->
            <?php endif; ?>

      <?php endif; ?>

	  <?php if ( !comments_open() && !is_page() ) : ?>
            <p class="nocomments"><?php _e( 'Sorry, Comments are closed.', 'imprint' ); ?></p>
      <?php endif; ?>

      <?php comment_form(); ?>

</div>