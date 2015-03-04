<?php
/**
 * @package plaino
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="index-box">

	<div class="entry-content">
		<?php the_content(); ?>
		 <?php plaino_posted_on(); ?>
                        <?php edit_post_link( __( ' Edit', 'plaino' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer aside-footer">
           
	</footer><!-- .entry-footer -->
    </div>
</article><!-- #post-## -->