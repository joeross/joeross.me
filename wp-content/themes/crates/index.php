<?php get_header(); ?>
<div class="wrap">

	<div id="content" class="animated fadeInLeft">
		<div id="masonrycontent">
		<?php if ( have_posts() ) : ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>


		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		<div class="clear"></div>
	</div>
	</div>



	<div class="navigation">
<?php if(function_exists('wp_pagenavi')) : ?>
		<?php wp_pagenavi(); ?>
		<?php else : ?>
			<div class="alignright"><?php next_posts_link(__('&laquo; Older Entries')); ?></div>
			<div class="alignleft"><?php previous_posts_link(__('Newer Entries &raquo;')); ?></div>
		<?php endif; ?>
		<div class="clear"></div>
	</div>
</div>


<?php get_footer(); ?>
