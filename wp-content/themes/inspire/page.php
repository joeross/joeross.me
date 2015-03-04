<?php get_header(); ?>
<div id="main">
 <div id="content">
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
        <h2 class="pagetitle"><?php the_title(); ?></h2>
            <div class="entry">  
           
                <div class="maincontent"><?php the_content(); ?></div>
 
                
            </div>
   
            </div> <!--end post-->
            <div id="pagination">
        <?php wp_link_pages('before=<span>Page Sections</span> <span id="page-links">&after=</span>'); ?>
        </div> <!--end pagination-->
   
   
                        


<?php	comments_template(); ?>

<?php endwhile; ?>

<?php endif; ?>
</div> <!--end content-->
<div id="sidemenu">
<?php get_sidebar(); ?> 
</div>

</div> <!--end main-->
<?php get_footer(); ?>
