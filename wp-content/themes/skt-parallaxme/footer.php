<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT Parallaxme
 */
?>

</div><!-- #content_part -->

<!-- +++ Footer +++ -->
<footer class="footer cf">
    <div class="container">
        <div class="columns six text">
            <p><?php
			if ( (function_exists( 'of_get_option' ) && (of_get_option('footertext', true) != 1) ) ) {
			 	echo esc_url(of_get_option('footertext', true)); 
			} ?></p>
        </div>
        <!-- ./five -->
        <div class="columns three footer-logo">
			<?php if( of_get_option('footerlogo', true) != '' ) { ?>
                <img src="<?php echo esc_url( of_get_option('footerlogo', true) ); ?>" />
            <?php } else { ?>
                <h2><?php bloginfo( 'name' ); ?></h2>
            <?php } ?>
        </div>
        <!-- ./five -->
        <div class="columns six social-links">
			<?php  
			$facebook 	= ( of_get_option('facebook', true) != '' ) ? esc_url( of_get_option('facebook', true) ) : '';
			$twitter 	= ( of_get_option('twitter', true) != '' ) ? esc_url( of_get_option('twitter', true) ) : '';
			$gplus		= ( of_get_option('google', true) != '' ) ? esc_url( of_get_option('google', true) ) : '';
			$linkedin	= ( of_get_option('linkedin', true) != '' ) ? esc_url( of_get_option('linkedin', true) ) : '';
			$youtube	= ( of_get_option('youtube', true) != '' ) ? esc_url( of_get_option('youtube', true) ) : '';
			echo ($facebook != '') ? '<a target="_blank" href="'.$facebook.'"><img src="'.get_template_directory_uri().'/images/icon-facebook.png" width="27" height="27" alt="Social link" /></a>' : '';
			echo ($twitter != '') ? '<a target="_blank" href="'.$twitter.'"><img src="'.get_template_directory_uri().'/images/icon-twitter.png" width="27" height="27" alt="Social link" /></a>' : '';
			echo ($gplus != '') ? '<a target="_blank" href="'.$gplus.'"><img src="'.get_template_directory_uri().'/images/icon-gplus.png" width="27" height="27" alt="Social link" /></a>' : '';
			echo ($linkedin != '') ? '<a target="_blank" href="'.$linkedin.'"><img src="'.get_template_directory_uri().'/images/icon-linkedin.png" width="27" height="27" alt="Social link" /></a>' : '';
			echo ($youtube != '') ? '<a target="_blank" href="'.$youtube.'"><img src="'.get_template_directory_uri().'/images/icon-youtube.png" width="27" height="27" alt="Social link" /></a>' : '';
			?>
        </div><!-- ./five -->
        <div class="clear"></div>
    </div><!-- ./container -->
</footer><!-- ./footer -->
</div><!-- #wrap_all -->

<?php wp_footer(); ?>
</body>
</html>