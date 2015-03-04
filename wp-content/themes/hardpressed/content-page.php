
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
    	<?php $check_thumb = 0; ?>
    	<?php if ( has_post_thumbnail()) : ?>
        	<?php $check_thumb = 1; ?>
            <div class="imgthumb"><?php the_post_thumbnail( array(640, 480) ); ?></div>
        <?php endif; ?>
		<h1 class="entry-title<?php if ($check_thumb == 1) echo ' with-thumb';  ?>"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content post-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'hardpressed' ), 'after' => '</div>' ) ); ?>
        <?php edit_post_link( __( 'Edit', 'hardpressed' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->
	
</article><!-- #post-<?php the_ID(); ?> -->
