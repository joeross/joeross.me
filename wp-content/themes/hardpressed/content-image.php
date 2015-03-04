
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'hardpressed' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header><!-- .entry-header -->
    
    <div class="entry-meta-wrap">
        <div class="entry-meta">
            <?php hardpressed_posted_on(); ?>
        </div><!-- .entry-meta -->
    </div><!-- .entry-meta-wrap -->

	<div class="entry-content post-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'hardpressed' ) ); ?>
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
