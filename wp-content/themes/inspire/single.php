<?php get_header(); ?>
<div id="main">
 <div id="content">
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( ! post_password_required() ) {?>
		<div class="totalcomments"><a href="<?php comments_link(); ?>"><?php comments_number('0', '1', '%'); ?></a>
		<span class="commentname">COMMENTS</span>
		</div>
		<div style="clear:both"></div>
		<?php } ?>
		
       <?php if(has_post_thumbnail()): ?>
       <div class="small-thumbnail"><?php the_post_thumbnail('thumbnail'); ?></div>
       <?php endif; ?>
       <?php ?>
       <h1 class="singletitle"><?php the_title(); ?></h1>
        
            				<div style="clear:both"></div>				
 							
                                <div class="maincontent"><?php the_content(); ?></div>
                                
                                    <ul class="singlepostmetadata">
                
                <li><?php echo get_avatar( get_the_author_meta( 'ID' ), 24); ?> <?php the_author_posts_link(); ?></li>
               <li><Posted on <?php echo get_the_date(); ?></li>
               <li><?php echo get_the_time(); ?></li>
			   <li> <?php the_category('/'); ?></li>
	            <?php if(has_tag()): ?><li class="tags"> <?php the_tags(); endif;?></li>
   
                
                  
    
             </ul>
               	
   
        </div> <!--end post-->
       <div id="pagination">
        <?php wp_link_pages('before=<span>Page Sections:</span> <span id="page-links">&after=</span>'); ?>
        </div> <!--end pagination-->
                     
  
   
    <div id="post-author-info">
     <?php echo get_avatar( get_the_author_meta('ID'), '128' );?>
      <div class="authorname"><?php the_author(); ?></div>
  
  
		   <p><?php the_author_meta('description'); ?></p>
		 
   </div><!--end post author info-->
            


<?php	comments_template(); ?>

<?php endwhile; ?>

<?php endif; ?>
</div> <!--end content-->

<div id="sidemenu">
<?php get_sidebar(); ?> 
</div>

</div> <!--end main-->
<?php get_footer(); ?>
