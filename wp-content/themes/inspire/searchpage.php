<?php get_header(); ?>
<div id="main">
<div id="content">
<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 

	<?php if (is_sticky()) { ?>
       <div class="ribbon-wrapper-green"><div class="ribbon-green">Sticky</div></div>
                        
     <?php } ?>                  
     	<?php if(has_post_thumbnail()): ?><div class="featured-thumb"><?php the_post_thumbnail('thumbnail'); ?></div><?php endif; ?>
        <h1 class="indexposttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <div class="smallcontent">
          <?php
			    if( strpos( get_the_content(), 'more-link' ) === false ) {
			        the_excerpt();
			    }
			    else {
			        the_content('Continue Reading &raquo;');
			    }
			?>
          </div>
            <div class="entry">   
              
                
                 <p class="postmetadata">
                 
               
                <span class="author"><?php echo get_avatar( get_the_author_meta('ID'), '32' ); ?> <?php the_author_posts_link(); ?></span>
                <span class="category"><?php the_category(' / ') ?></span>
                <span class="date"><?php the_date(); ?></span>
                
              	                

               </p>
               


              
                  
            </div>
            
            
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <div id="pagination">
        
        <?php echo inspire_pagination(); ?>
        </div> <!--end pagination-->
     </div> <!--end content-->   
<div id="sidemenu">
<?php get_sidebar(); ?> 
</div>

</div> <!--end main-->
<?php get_footer(); ?>
