<?php
/**
 * The Sidebar containing the header widget areas.
 *
 * @package Sorbet
 */
?>
<div id="sidebar-toggle-nav" class="panel">
	<div class="widget-areas">
		<div class="widget-area">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div>
		<div class="widget-area">
			<?php dynamic_sidebar( 'sidebar-3' ); ?>
		</div>
		<div class="widget-area">
			<?php dynamic_sidebar( 'sidebar-4' ); ?>
		</div>
	</div>
</div>