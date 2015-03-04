	
	</div><!-- #container -->

	<div class="push"></div>

</div><!-- #wrapper -->

<footer id="colophon" role="contentinfo">
    <div id="site-generator">

        <?php echo __('&copy; ', 'hardpressed') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
        <?php if ( is_front_page() && ! is_paged() ) : ?>
        <?php _e('- Powered by ', 'hardpressed'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'hardpressed' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'hardpressed' ); ?>"><?php _e('WordPress' ,'hardpressed'); ?></a>
        <?php _e(' and ', 'hardpressed'); ?><a href="<?php echo esc_url( __( 'http://hostmarks.com/', 'hardpressed' ) ); ?>"><?php _e('Hostmarks', 'hardpressed'); ?></a>
        <?php endif; ?>
        <?php hardpressed_footer_nav(); ?>
        
    </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>


</body>
</html>