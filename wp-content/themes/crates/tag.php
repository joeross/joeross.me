<?php get_header(); ?>

<div class="wrap">

<div id="content-full" class="blogpage">
<div id="content-left" >

<header>
<div class="pagetitle">
	<h1>Tags: <?php single_tag_title(); ?></h1>
</h1>
</div>
<div class="clear"></div>
</header>
<?php wp_reset_query(); ?>




<?php global $wp_query;
$args = array_merge( $wp_query->query, array( 'post_type' => 'any' ) );
query_posts( $args ); if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php get_template_part('post'); ?>

<?php endwhile; ?>

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