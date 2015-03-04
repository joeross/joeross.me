<?php
/*
 Template Name: FAQ Page Template
 */
 ?>
<?php get_header(); ?>

 <div id="faq-page">
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
		
        <h2 class="faq-title"><?php the_title(); ?></h2>
            <div class="entry">  
             	    
 				  
                
                <div class="faq-content"><?php the_content(); ?></div>
 
                
            </div>
   
            </div> <!--end post-->
          
     <div id="pagination">
        <?php echo inspire_pagination(); ?>
        </div> <!--end pagination-->
                   


<?php	//comments_template(); ?>

<?php endwhile; ?>

<?php endif; ?>
</div> <!--end content-->


<!--end main-->
<?php get_footer(); ?>
