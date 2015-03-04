<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Radium
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="inner-wrap">
			<div id="footer-widgets" class="widget-area three clear">
				<div class="footer-widget-wrapper">
					<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
						<?php dynamic_sidebar( 'sidebar-5' ); ?>
					<?php endif; ?>
				</div><!-- .footer-widget-wrapper -->
				<div class="footer-widget-wrapper">
					<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
						<?php dynamic_sidebar( 'sidebar-6' ); ?>
					<?php endif; ?>
				</div><!-- .footer-widget-wrapper -->
				<div class="footer-widget-wrapper">
					<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
						<?php dynamic_sidebar( 'sidebar-7' ); ?>
					<?php endif; ?>
				</div><!-- .footer-widget-wrapper -->
			</div><!-- #footer-widgets -->
		</div><!-- .inner-wrap -->
		<div class="site-info">
			<div class="inner-wrap">
				<?php _e( 'Copyright &#169; '.date('Y'), 'radium' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>. <?php printf( __( 'Powered by %1$s', 'radium' ), '<a href="http://wordpress.org/">WordPress</a>' ); ?>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s.', 'radium' ), '<a href="http://ovidiunicolae.com/themes/radium/">Radium</a>' ); ?>			
			</div><!-- .inner-wrap -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
