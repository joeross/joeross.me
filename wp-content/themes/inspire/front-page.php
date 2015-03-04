<?php $inspire_settings = get_option('inspire-options'); ?>
<?php
 if ( 'posts' == get_option( 'show_on_front' ) ) {
	                    include( get_home_template() );
	                    exit;
	                } else {
	                    include( get_page_template() );
	                    exit;
	                }
?>
<?php get_header(); ?>
<div id="main">
 <div id="front-page-content">
      <?php if(  !empty($inspire_settings['homepage-title']) || !empty($inspire_settings['homepage-text']) ): ?>
      <div class="showcase">
      <?php if(!empty($inspire_settings['homepage-image'])): ?> <img src="<?php echo esc_url($inspire_settings['homepage-image']);?>"><?php endif; ?>
      <?php if(!empty($inspire_settings['homepage-title'])): ?><h1><?php echo esc_html($inspire_settings['homepage-title']); ?></h1><?php endif; ?>
      <?php if(!empty($inspire_settings['homepage-text'])): ?><p>
     <?php echo strip_tags($inspire_settings['homepage-text'],'<a><p><strong>'); ?></p>
     <?php endif; ?>
      <?php if(!empty($inspire_settings['homepage-link'])): ?><span class="button-grey alignright"><a href="<?php echo esc_url($inspire_settings['homepage-link']); ?>">Read more</a> </span><?php endif; ?>
      </div><!--end showcase-->
     <?php endif; ?> 
      <div class="portfolio">
      <?php if ( is_active_sidebar( 'sidebar-8' ) ) : ?>
      	<div class="tile">
         <?php dynamic_sidebar( 'sidebar-8' ); ?>
        </div>       
       <?php endif; ?>
      <?php if ( is_active_sidebar( 'sidebar-9' ) ) : ?>  
      	<div class="tile">
             <?php dynamic_sidebar( 'sidebar-9' ); ?>
      	</div>
      <?php endif; ?>
      <?php if ( is_active_sidebar( 'sidebar-10' ) ) : ?>	
      	<div class="tile">
            <?php dynamic_sidebar( 'sidebar-10' ); ?>
        </div>
       <?php endif; ?>  
      	
     
      </div><!--end portfolio-->
      
  </div> <!--end front content-->
</div> <!--end main-->
<?php get_footer(); ?>
