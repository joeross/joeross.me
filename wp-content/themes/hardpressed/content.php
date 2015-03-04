
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
    	<?php if ( has_post_thumbnail()) : ?>
        	<?php $check_thumb = 1; ?>
            <div class="imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( array(640, 480) ); ?></a></div>
            <?php else : ?>
            <?php
            $postimgs =& get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
            if ( !empty($postimgs) ) {
                $firstimg = array_shift( $postimgs );
                $th_image = wp_get_attachment_image( $firstimg->ID, array(640, 480), false );
				$check_thumb = 1;
             ?>
                <div class="imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo $th_image; ?></a></div>
            <?php } else { 
				$check_thumb = 0;
			 } ?>
        <?php endif; ?>
        
		<h2 class="entry-title<?php if ($check_thumb == 1) echo ' with-thumb';  ?>"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'hardpressed' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

	</header><!-- .entry-header -->
    
    <?php if ( 'post' == get_post_type() ) : ?>
    <div class="entry-meta-wrap">
        <div class="entry-meta">
            <?php hardpressed_posted_on(); ?>
        </div><!-- .entry-meta -->
    </div><!-- .entry-meta-wrap -->
    <?php endif; ?>
    
    
	
	<div class="entry-content post-content">
		<?php the_content( __( 'Continue reading', 'hardpressed' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'hardpressed' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->


	<footer class="entry-meta">
    	<div class="footer-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'hardpressed' ) );
				if ( $categories_list && hardpressed_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'hardpressed' ), $categories_list ); ?>
			</span>
			<span class="sep"> / </span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'hardpressed' ) );
				if ( $tags_list ) :
			?>
			<span class="tag-links">
				<?php printf( __( 'Tagged %1$s', 'hardpressed' ), $tags_list ); ?>
			</span>
			<span class="sep"> / </span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'hardpressed' ), __( '1 Comment', 'hardpressed' ), __( '% Comments', 'hardpressed' ) ); ?></span>
		<span class="sep"> / </span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'hardpressed' ), '<span class="edit-link">', '</span>' ); ?>
        </div><!-- .footer-meta -->
	</footer><!-- #entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
