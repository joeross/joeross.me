<?php get_header(); ?>
<div class="category-title"><h2><?php
/*get archives header*/
if ( is_day() ) { $this_header = "Daily archives for " . get_the_date(); }
else if ( is_month() ){ $this_header = "Monthly archives for " . get_the_date('F, Y'); }
else if ( is_year() ){ $this_header = "Yearly archives for " . get_the_date('Y'); }
else { $this_header = "Archives"; }
echo $this_header;
?></h2> </div>
<div id="main">
<div id="content">
<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
	
         
        <div class="post">
                        <div class="featured-thumb"><?php the_post_thumbnail('thumbnail'); ?></div>

        <h1 class="singleposttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <div class="smallcontent">  <?php
			    if( strpos( get_the_content(), 'more-link' ) === false ) {
			        the_excerpt();
			    }
			    else {
			        the_content('Continue Reading &raquo;');
			    }
			?></div>
            <div class="entry">   
              
                 <div class="totalcomments"><a href="<?php comments_link(); ?>"><?php comments_number('0', '1', '%'); ?></a><span class="commentname">COMMENTS</span></div>
                 <p class="postmetadata">
                 
               
                <span class="author"><?php echo get_avatar( get_the_author_meta('ID'), '32' ); ?><?php the_author_posts_link(); ?></span>
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
