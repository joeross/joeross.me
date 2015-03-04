<?php 
/*
 Template Name: Full Width Template
 */
?>
<?php get_header(); ?>
<div id="main">
 <div id="fullwidthcontent">
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
        <h2 class="pagetitle"><?php the_title(); ?></h2>
            <div class="entry">  
           		
 				  
                <div class="featuredimage"><?php the_post_thumbnail('full'); ?></div>
                <div class="maincontent"><?php the_content(); ?></div>
 
                
            </div>
   
            </div> <!--end post-->
            <div id="pagination">
        <?php wp_link_pages('before=Page Sections: <span id="page-links">&after=</span>'); ?>
        </div> <!--end pagination-->
   
  	<?php	comments_template(); ?>

   </div>
                        



<?php endwhile; ?>

<?php endif; ?>
</div> <!--end content-->


</div> <!--end main-->
<?php get_footer(); ?>
