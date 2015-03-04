<a href="#" id="backToTop"></a>



<?php if (is_active_sidebar( 'footer1' ) OR is_active_sidebar( 'footer2' ) OR is_active_sidebar( 'footer3' ) ) { ?>

<div class="footerwidget">

	<div class="wrap">
		<div class="footerwidgets">
			<?php if ( is_active_sidebar( 'footer1' ) ) : ?>
				<div class="footer-col-left">
					<?php dynamic_sidebar( 'footer1' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer2' ) ) : ?>
				<div class="footer-col-center">
					<?php dynamic_sidebar( 'footer2' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer3' ) ) : ?>
				<div class="footer-col-right">
					<?php dynamic_sidebar( 'footer3' ); ?>
				</div>
			<?php endif; ?>
			<div class="clear"></div>
		</div>
	</div>
</div>

<?php } ?>








<div class="footer">
	<div class="wrap">
			<div class="left">
			<?php if (get_theme_mod('footertext')) { ?>
			<?php echo get_theme_mod( 'footertext'); ?><br>
			<?php } else { ?> 
			&copy; <?php echo date("Y")?>  <?php bloginfo('name'); ?><br>
			<?php } ?>
			<b>Crates</b> - Responsive Wordpress Tumblog Theme by <a title="Artexor" href="http://artexor.com" target="_blank">Artexor</a> | <a title="Powered by Wordpress" href="http://wordpress.org" target="_blank">Powered by Worpress</a>
		    </div>

		    <div class="clear"></div>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>