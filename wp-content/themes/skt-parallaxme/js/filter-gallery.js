jQuery(document).ready(function() {
	jQuery('ul#filter a').click(function() {
		var filter_a = jQuery(this);

		filter_a.css('outline','none');
		jQuery('ul#filter .current').removeClass('current');
		filter_a.parent().addClass('current');

		var filterVal = filter_a.text().toLowerCase().replace(' ','-');

		if(filterVal === 'all') {
			jQuery('ul#portfolio li.hidden').fadeIn('slow').removeClass('hidden');
		} else {
			jQuery('ul#portfolio li').each(function() {
				var portfolio_li = jQuery(this);

				if(!portfolio_li.hasClass(filterVal)) {
					portfolio_li.fadeOut('normal').addClass('hidden');
				} else {
					portfolio_li.fadeIn('slow').removeClass('hidden');
				}
			});
		}

		return false;
	});
});