<?php
    /* footer sidebar */
    if ( ! is_404() ) : ?>
  <div id="footer-widgets" class="widget-area three">
            <?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
                <?php dynamic_sidebar( 'sidebar-5' ); ?>
            <?php endif; ?>
 
            <?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
                <?php dynamic_sidebar( 'sidebar-6' ); ?>
            <?php endif; ?>
 
            <?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
                <?php dynamic_sidebar( 'sidebar-7' ); ?>
            <?php endif; ?>
      </div><!-- #footer-widgets -->
<?php endif; ?>
<?php $inspire_settings = get_option('inspire-options'); ?>
<div id="footer">
<p><?php echo esc_html($inspire_settings['footer']); ?></p>
<div class="author-footer">Theme by <a href="http://corpocrat.com/2014/01/01/inspire-wordpress-theme/">Corpocrat</a></div>
</div> <!--end footer -->

<div id="footer-menu">
<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
</div><!--end footer menu -->

</div> <!-- end wrapper-->
<?php wp_footer(); ?>

</body>
</html>
