== Think Up Themes ==

- By Think Up Themes, http://www.thinkupthemes.com/

Requires at least:	3.4.1
Tested up to:		4.0.0

Renden (Pro) is a multi-purpose professional Premium WordPress Theme ideal for a business or blog website. The theme is responsive, HD retina ready and comes with 600+ Google Fonts which can easily be selected directly from the theme options panel. Never code again with the awesome page builder. Simply drag, drop and you're done! It couldn't be easier to create stunning websites with the beauty of Renden (Pro).

-----------------------------------------------------------------------------
	Support
-----------------------------------------------------------------------------

- For setup and use instructions please refer to the getting started section at www.thinkupthemes.com/support/.

-----------------------------------------------------------------------------
	Frequently Asked Questions
-----------------------------------------------------------------------------

- None Yet


-----------------------------------------------------------------------------
	Limitations
-----------------------------------------------------------------------------

- RTL support is yet to be added. This is planned for inclusion in v1.1.0


-----------------------------------------------------------------------------
	Copyright, Sources, Credits & Licenses
-----------------------------------------------------------------------------

Renden WordPress Theme, Copyright 2014 Think Up Themes Ltd
Renden is distributed under the terms of the GNU GPL

Demo images are licensed under CC0 1.0 Universal (CC0 1.0) and available from http://unsplash.com/

The following opensource projects, graphics, fonts, API's or other files as listed have been used in developing this theme. Thanks to the author for the creative work they made. All creative works are licensed as being GPL or GPL compatible.

    [1.01] Item:        Underscores (_s) starter theme - Copyright: Automattic, automattic.com
           Item URL:    http://underscores.me/
           Licence:     Licensed under GPLv2 or later
           Licence URL: http://www.gnu.org/licenses/gpl.html

    [1.02] Item:        Redux Framework
           Item URL:    https://github.com/ReduxFramework/ReduxFramework
           Licence:     GPLv3
           Licence URL: http://www.gnu.org/licenses/gpl.html

    [1.03] Item:        html5shiv (jQuery file)
           Item URL:    http://code.google.com/p/html5shiv/
           Licence:     MIT
           Licence MIT: http://opensource.org/licenses/mit-license.html

    [1.04] Item:        PrettyPhoto
           Item URL:    http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/
           Licence:     GPLv2
           Licence URL: http://www.gnu.org/licenses/gpl-2.0.html

    [1.05] Item:        ImagesLoaded
           Item URL:    https://github.com/desandro/imagesloaded
           Licence:     MIT
           Licence URL: http://opensource.org/licenses/mit-license.html

    [1.06] Item:        Retina js
           Item URL:    http://retinajs.com
           Licence:     MIT
           Licence URL: http://opensource.org/licenses/mit-license.html

    [1.07] Item:        ResponsiveSlides
           Item URL:    https://github.com/viljamis/ResponsiveSlides.js
           Licence:     MIT
           Licence URL: http://opensource.org/licenses/mit-license.html

    [1.08] Item:        Font Awesome
           Item URL:    http://fortawesome.github.io/Font-Awesome/#license
           Licence:     SIL Open Font &  MIT
           Licence OFL: http://scripts.sil.org/cms/scripts/page.php?site_id=nrsi&id=OFL
           Licence MIT: http://opensource.org/licenses/mit-license.html

    [1.09] Item:        Twitter Bootstrap
           Item URL:    https://github.com/twitter/bootstrap/wiki/License
           Licence:     Apache 2.0
           Licence URL: http://www.apache.org/licenses/LICENSE-2.0

    [1.10] Item:        Google Fonts - Open Sans
           Item URL:    http://www.google.com/fonts/specimen/Open+Sans
           Licence:     SIL Open Font
           Licence URL: http://scripts.sil.org/OFL

-----------------------------------------------------------------------------
	Changelog
-----------------------------------------------------------------------------

Version 1.0.5
- New:     Add WooCommerce compatibility to allow users to customize WooCommerce from theme folder.
- Updated: Page title is now output correctly using add_theme_support( 'title-tag' ) with backward compatibility for pre WordPress v4.1.
- Updated: Functions that are used to add additional image sizes are now child theme compatible allowing feature to be overwritten from child theme.

Version 1.0.4
- New:     three-columns tag added to style.css given the 3 column layout of the homepage feauted content section.
- Updated: Breadcrumbs display correctly  for taxonomy archive pages.
- Updated: Full compatibility (and backward compatibility) added for add_theme_support( 'title-tag' ) added.
- Updated: wp_title() no longer required in header.php. Title now hooked directly to wp_head using 'title-tag'.
- Updated: thinkup_input_wptitle() removed. Was used to filter wp_title. No longer required given introduction of 'title-tag'.

Version 1.0.3
- Fixed:   Breadcrumbs now display post categories correctly on single posts.
- Updated: Bootstrap.css updated with non-minified script from original Renden (free) release.

Version 1.0.2
- New:     Slider text css updated.
- New:     add_theme_support( 'title-tag' ) added to functions.php.
- New:     Scaling removed from featured images for homepage on hover.
- Fixed:   Page title now displays on left where no breadcrumbs are available for the page. (e.g. archive.php)
- Updated: Styling added for stick post.
- Updated: All custom style handles prefixed with thinkup-.
- Updated: All custom script handles prefixed with thinkup-.
- Updated: bootstrap.min minified css replaced with developer version.
- Updated: prettyPhoto.css minified css replaced with developer version.
- Updated: font-awesome.min.css minified css replaced with developer version.
- Updated: thinkup_input_breadcrumb() updated to "return" content rather than "echo".
- Updated: index.php and archive.php updated. Layout classes functions moved to 05.blog.php.
- Updated: Styling for overlay buttons on hover changed to be clear background and white border.
- Removed: wp_enqueue_script('jquery') removed as jQuery is enqueued when script dependent on this is enqueued.
- Removed: Theme version of Masonry removed and enqueued directly from WordPress core.
- Removed: Theme version of Dashicons removed and enqueued directly from WordPress core.
- Removed: Duplicate Font Awesome library removed.
- Removed: Blog style 2 removed.
- Removed: All references to $thinkup_blog_style removed.
- Removed: All references to $thinkup_blog_stylegrid removed.

Version 1.0.1
- New:     Featured content areas increased to 4 from 3.
- New:     Additional image size added so that images fit nicely in new layout.
- Fixed:   php notice errors fixed for initial theme activation.
- Updated: Screenshot updated to better reflect updated theme design.
- Updated: Redux global variable changed from thinkup_redux_variables to redux.

Version 1.0.0
- Initial release.