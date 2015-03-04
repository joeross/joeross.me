<?php get_header(); ?>

<div class="wrap">

<div id="content-full" class="blogpage">
<div id="content-left" >

<header>
<div class="pagetitle">
	<h1><?php wp_title(); ?></h1>
</h1>
</div>
<div class="clear"></div>
</header>
<?php wp_reset_query(); ?>



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php get_template_part('post'); ?>

<?php endwhile; ?>

<article><?php posts_nav_link() ?></article>

<?php endif; ?>

</div>

	<?php get_sidebar(); ?>

<div class="clear"></div>
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