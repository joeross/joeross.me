<?php get_header(); ?>




<div class="wrap">
<div id="content-full" class="blogpage">
<div id="content-left" >

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<header>
				<div class="pagetitle"><h1><?php the_title();?></h1></div>
				<div class="clear"></div>
		</header>

		<article>
				<?php the_content(); ?>
		</article>

<?php if (comments_open()){ ?>
		<footer>
					    <?php comments_template(); ?>
		</footer>
<?php } ?>

				<div class="clear"></div>

		<?php endwhile; endif; ?>
			<div class="clear"></div>
		</div>

	<?php get_sidebar(); ?>
	<div class="clear"></div>
</div>

<div class="clear"></div>
</div>

<?php get_footer(); ?>