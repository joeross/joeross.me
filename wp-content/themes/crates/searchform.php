<form method="get" class="searchform" action="<?php  echo home_url(); ?>/">
	<input type="text" value="Search..." onblur="if(this.value == '') { this.value='Search...'}" onfocus="if (this.value == 'Search...') {this.value=''}" name="s" class="searchbar" />
	<input type="hidden" class="searchsubmit" value="Search" />
</form>