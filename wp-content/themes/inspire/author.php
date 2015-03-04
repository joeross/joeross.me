<?php get_header(); ?>
<div class="category-title"><h1>About Author</h1> </div>
<div id="main">
<div id="content">
<div class="author-page-box">
<?php echo get_avatar( get_the_author_meta('ID'), $size = '128' );?>
    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>

    <h2><?php echo $curauth->nickname; ?></h2>
    <dl>
        <dt>Website</dt>
        <dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
        <dt><b>Author Summary</b></dt>
        <dd><?php echo $curauth->user_description; ?></dd>
        <dd>
   <div class="post-author-social-share"> Follow me folks:
  <?php if(!empty($inspire_settings['facebook-link'])):?><a href="<?php echo esc_url($inspire_settings['facebook-link']);?>"><img src="<?php echo get_template_directory_uri(); ?>/images/fac.png"></a><?php endif; ?>

<?php if(!empty($inspire_settings['twitter-link'])):?><a href="<?php echo esc_url($inspire_settings['twitter-link']);?>"><img src="<?php echo get_template_directory_uri(); ?>/images/twi.png"></a><?php endif; ?>

<?php if(!empty($inspire_settings['linkedin-link'])):?><a href="<?php echo esc_url($inspire_settings['linkedin-link']);?>"><img src="<?php echo get_template_directory_uri(); ?>/images/lin.png"></a><?php endif; ?>

<?php if(!empty($inspire_settings['google-plus-link'])):?><a href="<?php echo esc_url($inspire_settings['google-plus-link']);?>"><img src="<?php echo get_template_directory_uri(); ?>/images/goo.png"></a><?php endif; ?>

<a href="<?php bloginfo('rdf_url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/rsss.png"></a>	 

  </div>
  </dd>
</div>
    <h2>Posts by <?php echo $curauth->nickname; ?>:</h2>

    <ul class="author-page-posts">
<!-- The Loop -->

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <li>
            	<?php if(has_post_thumbnail()): ?><?php the_post_thumbnail(array(100,100)); endif; ?>
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
            
            <span><?php the_time('d M Y'); ?> in <?php the_category(' / ');?></span>
        </li>

    <?php endwhile; else: ?>
        <p><?php echo 'No posts by this author.'; ?></p>

    <?php endif; ?>

<!-- End Loop -->

    </ul>

     </div> <!--end content-->   
<div id="sidemenu">
<?php get_sidebar(); ?> 
</div>

</div> <!--end main-->
<?php get_footer(); ?>
