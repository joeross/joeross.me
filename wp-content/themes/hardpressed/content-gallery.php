
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
    <?php if ( has_post_thumbnail()) : ?>
		<?php $check_thumb = 1; ?>
        <div class="imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( array(640, 480) ); ?></a></div>
            
        <?php else : ?>
        
    	<?php if( has_shortcode( $post->post_content, 'gallery' ) ) : ?>
		<?php
			$gallery = get_post_gallery( $post, false );
			if ( !empty($gallery['ids']) ) {
				$check_thumb = 1;
				$ids = explode( ",", $gallery['ids'] );
				$total_images = 0;
				foreach( $ids as $id ) {
					
					$title = get_post_field('post_title', $id);
					$meta = get_post_field('post_excerpt', $id);
					$link = wp_get_attachment_url( $id );
					$image  = wp_get_attachment_image( $id, array(640, 480));
					$total_images++;
					
					if ($total_images == 1) {
						$first_img = $image;
					}
				}
			} else {
				$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
				if ( $images ) {
					$check_thumb = 1;
					$total_images = count( $images );
					$first_img = array_shift( $images );
					$image = wp_get_attachment_image( $first_img->ID, array(640, 480) );
				} else {
					$check_thumb = 0;
					$total_images = '';
					$first_img = '';
					$image = '';	
				}
			}
        ?>
        <div class="imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo $first_img; ?></a></div>
      	<?php endif; ?>
      <?php endif; ?>

      <?php if ( is_single() ) : ?>
		<h1 class="entry-title<?php if ($check_thumb == 1) echo ' with-thumb';  ?>"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'hardpressed' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
      <?php else : ?>
        <h2 class="entry-title<?php if ($check_thumb == 1) echo ' with-thumb';  ?>"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'hardpressed' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
      <?php endif; ?>
	</header><!-- .entry-header -->
    
    <div class="entry-meta-wrap">
        <div class="entry-meta">
            <?php hardpressed_posted_on(); ?>
        </div><!-- .entry-meta -->
    </div><!-- .entry-meta-wrap -->
	
    

        <div class="entry-content post-content">
            <?php if ( post_password_required() ) : ?>
                <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'hardpressed' ) ); ?>
    
                <?php else : ?>
                <?php if( has_shortcode( $post->post_content, 'gallery' ) ) : ?>
		<?php
			$gallery = get_post_gallery( $post, false );
			if ( !empty($gallery['ids']) ) {
				$check_thumb = 1;
				$ids = explode( ",", $gallery['ids'] );
				$total_images = 0;
				foreach( $ids as $id ) {
					
					$title = get_post_field('post_title', $id);
					$meta = get_post_field('post_excerpt', $id);
					$link = wp_get_attachment_url( $id );
					$image  = wp_get_attachment_image( $id, array(640, 480));
					$total_images++;
					
					if ($total_images == 1) {
						$first_img = $image;
					}
				}
			} else {
				$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
				if ( $images ) {
					$check_thumb = 1;
					$total_images = count( $images );
					$first_img = array_shift( $images );
					$image = wp_get_attachment_image( $first_img->ID, array(640, 480) );
				} else {
					$check_thumb = 0;
					$total_images = '';
					$first_img = '';
					$image = '';	
				}
			}
        ?>
      	<?php endif; ?>

			<?php if ($total_images != '') : ?>
            <p><em><?php printf( _n( 'This gallery contains <a %1$s>%2$s photo</a>.', 'This gallery contains <a %1$s>%2$s photos</a>.', $total_images, 'hardpressed' ),
                    'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'hardpressed' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
                    number_format_i18n( $total_images )
                ); ?></em></p>
            <?php endif; ?>
                
                <?php the_excerpt(); ?>
            <?php endif; ?>
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
