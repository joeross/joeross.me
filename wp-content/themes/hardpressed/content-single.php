
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
    	<?php $check_thumb = 0; ?>
    	<?php if ( has_post_thumbnail()) : ?>
        	<?php $check_thumb = 1; ?>
            <div class="imgthumb"><?php the_post_thumbnail( array(640, 480) ); ?></div>
        <?php endif; ?>
		<h1 class="entry-title<?php if ($check_thumb == 1) echo ' with-thumb';  ?>"><?php the_title(); ?></h1>

	</header><!-- .entry-header -->
    
    <div class="entry-meta-wrap">
        <div class="entry-meta">
            <?php hardpressed_posted_on(); ?>
        </div><!-- .entry-meta -->
    </div><!-- .entry-meta-wrap -->

	<div class="entry-content post-content">
		<?php the_content(); ?>
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

		<?php edit_post_link( __( 'Edit', 'hardpressed' ), '<span class="edit-link">', '</span>' ); ?>
        </div><!-- .footer-meta -->
	</footer><!-- .entry-meta -->
    
    <?php if (get_theme_mod('hardpressed_author_bio') ) : ?>
    <!--BEGIN .author-bio-->
    <div class="author-bio-wrap">
        <div class="author-bio clearfix">
            <?php
            $author_avatar = get_avatar( get_the_author_meta('email'), '90' );
            if ($author_avatar) : ?>
                <div class="author-thumb"><?php echo $author_avatar; ?></div>
            <?php endif; ?>
            
            <div class="author-info">
                <?php $author_posts_url = get_author_posts_url( get_the_author_meta( 'ID' )); ?> 
                <h4 class="author-title"><?php _e('Written by ', 'hardpressed'); ?><a href="<?php echo esc_url($author_posts_url); ?>" title="<?php printf( __( 'View all posts by %s', 'hardpressed' ), get_the_author() ) ?>"><?php the_author(); ?></a></h4>
                <?php $author_desc = get_the_author_meta('description');
                if ( $author_desc ) : ?>
                <p class="author-description"><?php echo $author_desc; ?></p>
                <?php endif; ?>
                <?php $author_url = get_the_author_meta('user_url');
                if ( $author_url ) : ?>
                <p><?php _e('Website: ', 'hardpressed') ?><a href="<?php echo $author_url; ?>"><?php echo $author_url; ?></a></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
	<!--END .author-bio-->
    <?php endif; ?>
    
</article><!-- #post-<?php the_ID(); ?> -->
