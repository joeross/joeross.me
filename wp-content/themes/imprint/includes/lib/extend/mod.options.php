<?php

if( !function_exists('imprint_options_vars') ):
    function imprint_options_vars($var){

        $custom_font_array = mudthemes_optionsframework_font_array();

            switch($var):

                case('imagepath'):
                    return get_template_directory_uri() . '/assets/admin/images/';

                case('custom_font_array'):                
                    return $custom_font_array;

                case('custom_font_scut'):
                    return mudthemes_optionsframework_font_scut();

                    //@todo: Remake this array.
                case('font_size_options'):
                    return array('sizes' => array('7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','52','53','54','55','56','57','58','59','60','61','62','63','64','65','66','67','68','69','70','71','72','73','74','75' ));

                case('carousel_options'):
                    return array('slideshow' => 'Slideshow', 'featured' => 'Featured Image', 'none' => 'Nothing');

                case('num_by_hundred'):
                    return array('100'=>'100', '200'=>'200', '300'=>'300', '400'=>'400', '500'=>'500', '600'=>'600', '700'=>'700', '800'=>'800', '900'=>'900', '1000'=>'1000', '1100'=>'1100', '1200'=>'1200', '1300'=>'1300', '1400'=>'1400', '1500'=>'1500', '1600'=>'1600', '1700'=>'1700', '1800'=>'1800', '1900'=>'1900', '2000'=>'2000', '2100'=>'2100', '2200'=>'2200', '2300'=>'2300', '2400'=>'2400', '2500'=>'2500', '2600'=>'2600', '2700'=>'2700', '2800'=>'2800', '2900'=>'2900', '3000'=>'3000', '3100'=>'3100', '3200'=>'3200', '3300'=>'3300', '3400'=>'3400', '3500'=>'3500', '3600'=>'3600', '3700'=>'3700', '3800'=>'3800', '3900'=>'3900', '4000'=>'4000', '4100'=>'4100', '4200'=>'4200', '4300'=>'4300', '4400'=>'4400', '4500'=>'4500', '4600'=>'4600', '4700'=>'4700', '4800'=>'4800', '4900'=>'4900', '5000'=>'5000', '5100'=>'5100', '5200'=>'5200', '5300'=>'5300', '5400'=>'5400', '5500'=>'5500', '5600'=>'5600', '5700'=>'5700', '5800'=>'5800', '5900'=>'5900', '6000'=>'6000', '6100'=>'6100', '6200'=>'6200', '6300'=>'6300', '6400'=>'6400', '6500'=>'6500', '6600'=>'6600', '6700'=>'6700', '6800'=>'6800', '6900'=>'6900', '7000'=>'7000', '7100'=>'7100', '7200'=>'7200', '7300'=>'7300', '7400'=>'7400', '7500'=>'7500', '7600'=>'7600', '7700'=>'7700', '7800'=>'7800', '7900'=>'7900', '8000'=>'8000', '8100'=>'8100', '8200'=>'8200', '8300'=>'8300', '8400'=>'8400', '8500'=>'8500', '8600'=>'8600', '8700'=>'8700', '8800'=>'8800', '8900'=>'8900', '9000'=>'9000', '9100'=>'9100', '9200'=>'9200', '9300'=>'9300', '9400'=>'9400', '9500'=>'9500', '9600'=>'9600', '9700'=>'9700', '9800'=>'9800', '9900'=>'9900', '10000'=>'10000');

                case('icons'):
                    return array('glass', 'music', 'search', 'envelope-o', 'heart', 'star', 'star-o', 'user', 'film', 'th-large', 'th', 'th-list', 'check', 'times', 'search-plus', 'search-minus', 'power-off', 'signal', 'gear', 'cog', 'trash-o', 'home', 'file-o', 'clock-o', 'road', 'download', 'arrow-circle-o-down', 'arrow-circle-o-up', 'inbox', 'play-circle-o', 'rotate-right', 'repeat', 'refresh', 'list-alt', 'lock', 'flag', 'headphones', 'volume-off', 'volume-down', 'volume-up', 'qrcode', 'barcode', 'tag', 'tags', 'book', 'bookmark', 'print', 'camera', 'font', 'bold', 'italic', 'text-height', 'text-width', 'align-left', 'align-center', 'align-right', 'align-justify', 'list', 'dedent', 'outdent', 'indent', 'video-camera', 'photo', 'image', 'picture-o', 'pencil', 'map-marker', 'adjust', 'tint', 'edit', 'pencil-square-o', 'share-square-o', 'check-square-o', 'arrows', 'step-backward', 'fast-backward', 'backward', 'play', 'pause', 'stop', 'forward', 'fast-forward', 'step-forward', 'eject', 'chevron-left', 'chevron-right', 'plus-circle', 'minus-circle', 'times-circle', 'check-circle', 'question-circle', 'info-circle', 'crosshairs', 'times-circle-o', 'check-circle-o', 'ban', 'arrow-left', 'arrow-right', 'arrow-up', 'arrow-down', 'mail-forward', 'share', 'expand', 'compress', 'plus', 'minus', 'asterisk', 'exclamation-circle', 'gift', 'leaf', 'fire', 'eye', 'eye-slash', 'warning', 'exclamation-triangle', 'plane', 'calendar', 'random', 'comment', 'magnet', 'chevron-up', 'chevron-down', 'retweet', 'shopping-cart', 'folder', 'folder-open', 'arrows-v', 'arrows-h', 'bar-chart-o', 'twitter-square', 'facebook-square', 'camera-retro', 'key', 'gears', 'cogs', 'comments', 'thumbs-o-up', 'thumbs-o-down', 'star-half', 'heart-o', 'sign-out', 'linkedin-square', 'thumb-tack', 'external-link', 'sign-in', 'trophy', 'github-square', 'upload', 'lemon-o', 'phone', 'square-o', 'bookmark-o', 'phone-square', 'twitter', 'facebook', 'github', 'unlock', 'credit-card', 'rss', 'hdd-o', 'bullhorn', 'bell', 'certificate', 'hand-o-right', 'hand-o-left', 'hand-o-up', 'hand-o-down', 'arrow-circle-left', 'arrow-circle-right', 'arrow-circle-up', 'arrow-circle-down', 'globe', 'wrench', 'tasks', 'filter', 'briefcase', 'arrows-alt', 'group', 'users', 'chain', 'link', 'cloud', 'flask', 'cut', 'scissors', 'copy', 'files-o', 'paperclip', 'save', 'floppy-o', 'square', 'navicon', 'reorder', 'bars', 'list-ul', 'list-ol', 'strikethrough', 'underline', 'table', 'magic', 'truck', 'pinterest', 'pinterest-square', 'google-plus-square', 'google-plus', 'money', 'caret-down', 'caret-up', 'caret-left', 'caret-right', 'columns', 'unsorted', 'sort', 'sort-down', 'sort-desc', 'sort-up', 'sort-asc', 'envelope', 'linkedin', 'rotate-left', 'undo', 'legal', 'gavel', 'dashboard', 'tachometer', 'comment-o', 'comments-o', 'flash', 'bolt', 'sitemap', 'umbrella', 'paste', 'clipboard', 'lightbulb-o', 'exchange', 'cloud-download', 'cloud-upload', 'user-md', 'stethoscope', 'suitcase', 'bell-o', 'coffee', 'cutlery', 'file-text-o', 'building-o', 'hospital-o', 'ambulance', 'medkit', 'fighter-jet', 'beer', 'h-square', 'plus-square', 'angle-double-left', 'angle-double-right', 'angle-double-up', 'angle-double-down', 'angle-left', 'angle-right', 'angle-up', 'angle-down', 'desktop', 'laptop', 'tablet', 'mobile-phone', 'mobile', 'circle-o', 'quote-left', 'quote-right', 'spinner', 'circle', 'mail-reply', 'reply', 'github-alt', 'folder-o', 'folder-open-o', 'smile-o', 'frown-o', 'meh-o', 'gamepad', 'keyboard-o', 'flag-o', 'flag-checkered', 'terminal', 'code', 'mail-reply-all', 'reply-all', 'star-half-empty', 'star-half-full', 'star-half-o', 'location-arrow', 'crop', 'code-fork', 'unlink', 'chain-broken', 'question', 'info', 'exclamation', 'superscript', 'subscript', 'eraser', 'puzzle-piece', 'microphone', 'microphone-slash', 'shield', 'calendar-o', 'fire-extinguisher', 'rocket', 'maxcdn', 'chevron-circle-left', 'chevron-circle-right', 'chevron-circle-up', 'chevron-circle-down', 'html5', 'css3', 'anchor', 'unlock-alt', 'bullseye', 'ellipsis-h', 'ellipsis-v', 'rss-square', 'play-circle', 'ticket', 'minus-square', 'minus-square-o', 'level-up', 'level-down', 'check-square', 'pencil-square', 'external-link-square', 'share-square', 'compass', 'toggle-down', 'caret-square-o-down', 'toggle-up', 'caret-square-o-up', 'toggle-right', 'caret-square-o-right', 'euro', 'eur', 'gbp', 'dollar', 'usd', 'rupee', 'inr', 'cny', 'rmb', 'yen', 'jpy', 'ruble', 'rouble', 'rub', 'won', 'krw', 'bitcoin', 'btc', 'file', 'file-text', 'sort-alpha-asc', 'sort-alpha-desc', 'sort-amount-asc', 'sort-amount-desc', 'sort-numeric-asc', 'sort-numeric-desc', 'thumbs-up', 'thumbs-down', 'youtube-square', 'youtube', 'xing', 'xing-square', 'youtube-play', 'dropbox', 'stack-overflow', 'instagram', 'flickr', 'adn', 'bitbucket', 'bitbucket-square', 'tumblr', 'tumblr-square', 'long-arrow-down', 'long-arrow-up', 'long-arrow-left', 'long-arrow-right', 'apple', 'windows', 'android', 'linux', 'dribbble', 'skype', 'foursquare', 'trello', 'female', 'male', 'gittip', 'sun-o', 'moon-o', 'archive', 'bug', 'vk', 'weibo', 'renren', 'pagelines', 'stack-exchange', 'arrow-circle-o-right', 'arrow-circle-o-left', 'toggle-left', 'caret-square-o-left', 'dot-circle-o', 'wheelchair', 'vimeo-square', 'turkish-lira', 'try', 'plus-square-o', 'space-shuttle', 'slack', 'envelope-square', 'wordpress', 'openid', 'institution', 'bank', 'university', 'mortar-board', 'graduation-cap', 'yahoo', 'google', 'reddit', 'reddit-square', 'stumbleupon-circle', 'stumbleupon', 'delicious', 'digg', 'pied-piper-square', 'pied-piper', 'pied-piper-alt', 'drupal', 'joomla', 'language', 'fax', 'building', 'child', 'paw', 'spoon', 'cube', 'cubes', 'behance', 'behance-square', 'steam', 'steam-square', 'recycle', 'automobile', 'car', 'cab', 'taxi', 'tree', 'spotify', 'deviantart', 'soundcloud', 'database', 'file-pdf-o', 'file-word-o', 'file-excel-o', 'file-powerpoint-o', 'file-photo-o', 'file-picture-o', 'file-image-o', 'file-zip-o', 'file-archive-o', 'file-sound-o', 'file-audio-o', 'file-movie-o', 'file-video-o', 'file-code-o', 'vine', 'codepen', 'jsfiddle', 'life-bouy', 'life-saver', 'support', 'life-ring', 'circle-o-notch', 'ra', 'rebel', 'ge', 'empire', 'git-square', 'git', 'hacker-news', 'tencent-weibo', 'qq', 'wechat', 'weixin', 'send', 'paper-plane', 'send-o', 'paper-plane-o', 'history', 'circle-thin', 'header', 'paragraph', 'sliders', 'share-alt', 'share-alt-square', 'bomb');

            endswitch;



    }
endif;

if( !function_exists('imprint_theme_options') ):
    function imprint_theme_options($options) {
        $imagepath = imprint_options_vars('imagepath');
        $custom_font_scut = imprint_options_vars('custom_font_scut');
        $font_size_options = imprint_options_vars('font_size_options');
        $carousel_options = imprint_options_vars('carousel_options');
        $num_by_hundred = imprint_options_vars('num_by_hundred');
        $icons = imprint_options_vars('icons');

        /* Basic Settings (Starts) */

        $options[] = array(
            'name' => __('Basic Settings', 'imprint'),
            'type' => 'heading');

        $options[] = array(
            'name' => __('Choose Theme Skin', 'imprint'),
            'desc' => __('Select skin for your theme. (Note: Premium skins are only available with Imprint Pro Version)', 'imprint'),
            'id' => 'skin_color',
            'std' => 'classic-white',
            'type' => 'select',
            'options' => array(
                'classic-white' => 'Classic white',
        ));

        $options[] = array(
            'name' => __('Theme Layout Type', 'imprint'),
            'desc' => __('Select layout type for your theme:'
                    . '<ol>'
                    . '<li>Box Fixed - Layout is unresponsiveness</li>'
                    . '<li>Box Responsive - Layout is responsive</li>'
                    . '<li>Full Width Responsive - Only with Imprint Pro</li>'
                    . '</ol><a href="'. IMPRINT_DOCS_URL .'" target="_blank"><i>See Documentation</i></a> <i class="fa fa-external-link valign-bottom font-11"></i>', 'imprint'),
            'id' => 'layout-type',
            'std' => 'boxed-res',
            'type' => 'select',
            'options' => array(
                'boxed-fix' => 'Box Fixed Layout',
                'boxed-res' => 'Box Responsive Layout',
            ));

        $options[] = array(
            'name' => __('Favicon Image:', 'imprint'),
            'desc' => __('Put the Favicon Icon image here. <a href="http://webdesign.about.com/od/favicon/f/blfaqfavicon1.htm" target="_blank"><i>What is Favicon?</i></a> <i class="fa fa-external-link valign-bottom font-11"></i>', 'imprint'),
            'std' => '',
            'id' => 'favicon',
            'type' => 'upload');

        $options[] = array(
            'name' => __('Organization Name:', 'imprint'),
            'desc' => __('This name will be displayed along with <strong>copyright information in the footer.</strong> (Can be either your company name or website name, <i>e.g.</i> : Example Inc or example.com)', 'imprint'),
            'id' => 'footer_name',
            'std' => '',
            'type' => 'text');
        
        $options[] = array(
            'name' => __('Body Font', 'imprint'),
            'desc' => __('Changing font type here will change font of the text which has no font-type "specified". You can use this option while redesigning your entire theme. <a href="'. IMPRINT_DOCS_URL .'" target="_blank"><i>See Documentation </i></a> <i class="fa fa-external-link valign-bottom font-11"></i> ', 'imprint'),
            'id' => 'global_f',
            'std' => 'Arial',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'name' => __('Wrapper Background Color:', 'imprint'),
            'desc' => __('Changes the background color of wrapper (main content area).', 'imprint'),
            'id' => 'wrapper_bg_c',
            'std' => '#FFFFFF',
            'type' => 'color');

        $options[] = array(
            'name' => __('Wrapper Border Color:', 'imprint'),
            'desc' => __('Changes the border color of wrapper (main content area).', 'imprint'),
            'id' => 'wrapper_border_c',
            'std' => '#E7E7E7',
            'type' => 'color');

        /* Basic Setting (ends) */

        /* Layout (Starts) */

        $options[] = array(
            'name' => __('Theme Layout', 'imprint'),
            'type' => 'heading');

        $options[] = array(
            'name' => 'Theme Layout',
            'desc' => 'Choose theme layout from the given options.'
            . '<ol>'
            . '<li>Right Sidebar</li>'
            . '<li>Left Sidebar</li>'
            . '<li>No Sidebar</li>'
            . '</ol>',
            'id' => 'viewport_layout',
            'std' => 'left_viewport_content',
            'type' => 'images',
            'options' => array(
                'left_viewport_content' => $imagepath . 'content-left.png',
                'right_viewport_content' => $imagepath . 'content-right.png',
                'only_viewport_content' => $imagepath . 'only-content.png')
        );

        $options[] = array(
            'name' => __('Footerbox Columns', 'imprint'),
            'desc' => __('Select the number of columns you want for Footerbox. <br /><i class="fa fa-warning font-11"></i> Why is footerbox is hidden? <a href="'. IMPRINT_DOCS_URL .'" target="_blank"><i>See Documentation </i></a> <i class="fa fa-external-link valign-bottom font-11"></i>.', 'imprint'),
            'id' => 'footer_box_columns',
            'std' => 'four',
            'type' => 'radio',
            'options' => array(
                'four' => 'Four Columns',
                'three' => 'Three Columns',
        ));

        $options[] = array(
            'name' => __('Disable Thumbnails:', 'imprint'),
            'desc' => __('Checking this will disable Thumbnail images on homepage and archive pages.', 'imprint'),
            'id' => 'disable_thumbnails',
            'std' => '0',
            'type' => 'checkbox');

        $options[] = array(
            'name' => __('Disable Excerpts:', 'imprint'),
            'desc' => __('Checking this will disable Excerpts and show full content on homepage and archive pages.', 'imprint'),
            'id' => 'disable_excerpts',
            'std' => '0',
            'type' => 'checkbox');

        $options[] = array(
            'name' => __('Hide Footerbox:', 'imprint'),
            'desc' => __('Checking this will disable Footerbox. <a href="'. IMPRINT_DOCS_URL .'" target="_blank"><i>See Documentation </i></a> <i class="fa fa-external-link valign-bottom font-11"></i>', 'imprint'),
            'id' => 'disable_footerbox',
            'std' => '0',
            'type' => 'checkbox');

        $options[] = array(
            'name' => __('Toggle Menu', 'imprint'),
            'desc' => __('Select the position of your Primary Menu.'
                    . '<ol>'
                    . '<li>Above - will display menu above Featured Image or Slideshow</li>'
                    . '<li>Below - will display menu below Featured Image or Slideshow</li>'                
                    . '</ol>', 'imprint'),
            'id' => 'menu_toggle',
            'std' => 'above',
            'type' => 'radio',
            'options' => array('above' => 'Above','bottom' => 'Bottom' ));

        $options[] = array(
            'name' => __('Hide Top Margin:', 'imprint'),
            'desc' => __('Checking this will hide top margin.', 'imprint'),
            'id' => 'disable_top_margin',
            'std' => '0',
            'type' => 'checkbox');

        $options[] = array(
            'name' => __('Hide Bottom Margin:', 'imprint'),
            'desc' => __('Checking this will hide bottom margin.', 'imprint'),
            'id' => 'disable_bottom_margin',
            'std' => '0',
            'type' => 'checkbox');

        $options[] = array(
            'name' => __('Hide Slideshow Margin:', 'imprint'),
            'desc' => __('Checking this will hide Slideshow margin.', 'imprint'),
            'id' => 'disable_carousel_margin',
            'std' => '1',
            'type' => 'checkbox');

        $options[] = array(
            'name' => __('Hide Margin Below Posts:', 'imprint'),
            'desc' => __('Checking this will hide margin below posts on Homepage and Archive Pages.', 'imprint'),
            'id' => 'disable_archive_posts_space',
            'std' => '0',
            'type' => 'checkbox');

        $options[] = array(
            'name' => __('Disable Tags:', 'imprint'),
            'desc' => __('Checking this will hide Tag links below posts.', 'imprint'),
            'id' => 'disable_tag_links',
            'std' => '0',
            'type' => 'checkbox');

        /*Layout (ends)*/

        /*Header (starts)*/

        $options[] = array(
            'name' => __('Header Settings', 'imprint'),
            'type' => 'heading');

        $options[] = array(
            'name' => __('Site Title:', 'imprint'),
            'desc' => __('Color of the Site Title (displayed at the top).', 'imprint'),
            'id' => 'site_title_c',
            'std' => '#555555',
            'type' => 'color');

        $options[] = array(
            'name' => __('Site Description:', 'imprint'),
            'desc' => __('Color of the Site Description (displayed below site title).', 'imprint'),
            'id' => 'site_desc_c',
            'std' => '#555555',
            'type' => 'color');

        $options[] = array(
            'name' => __('Logo:', 'imprint'),
            'desc' => __('Upload your Logo Image - PNG or JPEG file formats are recommended.', 'imprint'),
            'std' => '',
            'id' => 'logo_img',
            'type' => 'upload');

        $options[] = array(
            'name' => __('Disable Logo Image:', 'imprint'),
            'desc' => __('Checking this will display Site Title (text) rather than Image.', 'imprint'),
            'id' => 'disable_logo_img',
            'std' => '0',
            'type' => 'checkbox');

        $options[] = array(
            'name' => __('Hide Site Description:', 'imprint'),
            'desc' => __('Checking this will hide Site Description.', 'imprint'),
            'id' => 'disable_site_desc',
            'std' => '0',
            'type' => 'checkbox');

        /*Header (ends)*/
        
        /*3 Content Boxes (starts)*/

        $options[] = array(
            'name' => __('3 Featured Boxes', 'imprint'),
            'type' => 'heading');

        $options[] = array(
            'name' => __('Hide Featured Boxes:', 'imprint'),
            'desc' => __('Checking this will hide the \'3 featured boxes\' throughout the website. (This is a global setting and will override others)', 'imprint'),
            'id' => 'disable_featured_boxes',
            'std' => '1',
            'type' => 'checkbox');

        $options[] = array(
            'name' => __('Homepage Only:', 'imprint'),
            'desc' => __('Checking this will show \'3 featured boxes\' only on homepage and not anywhere else.', 'imprint'),
            'id' => 'featured_boxes_home_only',
            'std' => '1',
            'type' => 'checkbox');

        $options[] = array(
            'name' => __('Featured Box #1 Title:', 'imprint'),
            'desc' => __('This will be the title of the 1st column in Featured Area.', 'imprint'),
            'id' => 'featured_box_1_title',
            'std' => 'Responsive Layout',
            'type' => 'text');

        $options[] = array(
            'name' => __('Featured Box #1 Content:', 'imprint'),
            'desc' => __('This will be the content of the 1st column in Featured Area.', 'imprint'),
            'id' => 'featured_box_1_content',
            'std' => 'Adjust your screen to any size and you will notice this theme adjusting itself to fit into the screen without breaking any text.',
            'type' => 'textarea');

        $options[] = array(
            'name' => __('Featured Box #1 Icon:', 'imprint'),
            'desc' => __('This will be the icon of the 1st column in Featured Area.', 'imprint'),
            'id' => 'featured_box_1_icon',
            'std' => 'desktop',
            'type' => 'radioicons',
            'options' => $icons);

        $options[] = array(
            'name' => __('Featured Box #2 Title:', 'imprint'),
            'desc' => __('This will be the title of the 2nd column in Featured Area.', 'imprint'),
            'id' => 'featured_box_2_title',
            'std' => 'Theme Options Panel',
            'type' => 'text');

        $options[] = array(
            'name' => __('Featured Box #2 Content:', 'imprint'),
            'desc' => __('This will be the Content of the 2nd column in Featured Area.', 'imprint'),
            'id' => 'featured_box_2_content',
            'std' => 'Log inside your dashboard to find Theme options panel where you can change unlimited settings of this theme.',
            'type' => 'textarea');

        $options[] = array(
            'name' => __('Featured Box #2 Icon:', 'imprint'),
            'desc' => __('This will be the icon of the 2nd column in Featured Area.', 'imprint'),
            'id' => 'featured_box_2_icon',
            'std' => 'th-large',
            'type' => 'radioicons',
            'options' => $icons);

        $options[] = array(
            'name' => __('Featured Box #3 Title:', 'imprint'),
            'desc' => __('This will be the title of the 3rd column in Featured Area.', 'imprint'),
            'id' => 'featured_box_3_title',
            'std' => 'Premium Support',
            'type' => 'text');

        $options[] = array(
            'name' => __('Featured Box #3 Content:', 'imprint'),
            'desc' => __('This will be the content of the 3rd column in Featured Area.', 'imprint'),
            'id' => 'featured_box_3_content',
            'std' => 'Upgrade to Pro version and get premium support by the team of technical people with many more features included.',
            'type' => 'textarea');

        $options[] = array(
            'name' => __('Featured Box #3 Icon:', 'imprint'),
            'desc' => __('This will be the icon of the 3rd column in Featured Area.', 'imprint'),
            'id' => 'featured_box_3_icon',
            'std' => 'check',
            'type' => 'radioicons',
            'options' => $icons);


        /*3 Content Boxes (ends)*/

        /* Menu (Starts) */
        $options[] = array(
            'name' => __('Menu Styling', 'imprint'),
            'type' => 'heading');

        $options[] = array(
            'name' => __('Bottom Menu: <br />(text color)', 'imprint'),
            'desc' => __('Color of bottom menu text.', 'imprint'),
            'id' => 'bottom_menu_c',
            'std' => '#999999',
            'type' => 'color');

        $options[] = array(
            'name' => __('Bottom Menu: <br />(mouse hover)', 'imprint'),
            'desc' => __('Color of bottom menu (mouse hover).', 'imprint'),
            'id' => 'bottom_menu_hover_c',
            'std' => '#999999',
            'type' => 'color');
        
        $options[] = array(
            'id' => "mud_menu_upgrade",
            'type' => 'menu_upgrade');

        /*  Menu (Ends) */
        /* Social starts */
        $options[] = array(
            'name' => __('Social Options', 'imprint'),
            'type' => 'heading');

        $options[] = array(
            'name' => __('Hide Social Icons:', 'imprint'),
            'desc' => __('Checking this will hide social icons.', 'imprint'),
            'id' => 'disable_social_icons',
            'std' => '1',
            'type' => 'checkbox');

    $options[] = array(
        'name' => __('RSS Feed URL:', 'imprint'),
        'desc' => __('RSS feed url (include http:// or https:// in the beginning of the URL)', 'imprint'),
        'id' => 'si_rss',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Facebook Profile URL:', 'imprint'),
        'desc' => __('Facebook profile url (include http:// or https:// in the beginning of the URL)', 'imprint'),
        'id' => 'si_facebook',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Twitter Profile URL:', 'imprint'),
        'desc' => __('Twitter profile url (include http:// or https:// in the beginning of the URL)', 'imprint'),
        'id' => 'si_twitter',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Linkedin Profile URL: ', 'imprint'),
        'desc' => __('Linkedin profile url (include http:// or https:// in the beginning of the URL)', 'imprint'),
        'id' => 'si_linkedin',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('YouTube Channel URL:', 'imprint'),
        'desc' => __('YouTube channel url (include http:// or https:// in the beginning of the URL)', 'imprint'),
        'id' => 'si_youtube',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Google+ Profile URL:', 'imprint'),
        'desc' => __('Google+ profile url (include http:// or https:// in the beginning of the URL)', 'imprint'),
        'id' => 'si_gplus',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Pinterest Profile URL:', 'imprint'),
        'desc' => __('Pinterest profile url (include http:// or https:// in the beginning of the URL)', 'imprint'),
        'id' => 'si_pinterest',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Tumblr Profile URL:', 'imprint'),
        'desc' => __('Tumblr profile url (include http:// or https:// in the beginning of the URL)', 'imprint'),
        'id' => 'si_tumblr',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Skype Profile URL:', 'imprint'),
        'desc' => __('Skype profile url (include http:// or https:// in the beginning of the URL)', 'imprint'),
        'id' => 'si_skype',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Flickr Profile URL:', 'imprint'),
        'desc' => __('Flickr profile url (include http:// or https:// in the beginning of the URL)', 'imprint'),
        'id' => 'si_flickr',
        'std' => '',
        'type' => 'text');
    
    $options[] = array(
        'name' => __('Instagram Profile URL:', 'imprint'),
        'desc' => __('Instagram profile url (include http:// or https:// in the beginning of the URL)', 'imprint'),
        'id' => 'si_instagram',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Dribbble Profile URL:', 'imprint'),
        'desc' => __('Dribbble profile url (include http:// or https:// in the beginning of the URL)', 'imprint'),
        'id' => 'si_dribbble',
        'std' => '',
        'type' => 'text');
    
    $options[] = array(
        'name' => __('Github Profile URL:', 'imprint'),
        'desc' => __('Github profile url (include http:// or https:// in the beginning of the URL)', 'imprint'),
        'id' => 'si_github',
        'std' => '',
        'type' => 'text');
    
    $options[] = array(
        'name' => __('Bitbucket Profile URL:', 'imprint'),
        'desc' => __('Bitbucket profile url (include http:// or https:// in the beginning of the URL)', 'imprint'),
        'id' => 'si_bitbucket',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Stack Overflow Profile URL:', 'imprint'),
        'desc' => __('Stack Overflow profile url (include http:// or https:// in the beginning of the URL)', 'imprint'),
        'id' => 'si_stackoverflow',
        'std' => '',
        'type' => 'text');
    
        /* Colors */

        $options[] = array(
            'name' => __('Color Options', 'imprint'),
            'type' => 'heading');

        $options[] = array(
            'name' => __('Primary Sidebar Links:', 'imprint'),
            'desc' => __('Color of links that appear in primary sidebar.', 'imprint'),
            'id' => 'pri_sidebar_link_c',
            'std' => '#333333',
            'type' => 'color');

        $options[] = array(
            'name' => __('Footerbox Sidebar Link:', 'imprint'),
            'desc' => __('Color of links that appear in footerbox.', 'imprint'),
            'id' => 'fb_sidebar_link_c',
            'std' => '#DDDDDD',
            'type' => 'color');

        $options[] = array(
            'name' => __('Theme Links:', 'imprint'),
            'desc' => __('Color of all the links in your theme (globally).', 'imprint'),
            'id' => 'link_c',
            'std' => '#444444',
            'type' => 'color');

        $options[] = array(
            'name' => __('Theme Links: <br /> (mouse hover)', 'imprint'),
            'desc' => __('Theme link color - when mouse hovers upon it.', 'imprint'),
            'id' => 'link_hover_c',
            'std' => '#888888',
            'type' => 'color');

        $options[] = array(
            'name' => __('Theme Links: <br />(visited)', 'imprint'),
            'desc' => __('Theme link color which have been visited before.', 'imprint'),
            'id' => 'link_visited_c',
            'std' => '#444444',
            'type' => 'color');

        $options[] = array(
            'name' => __('Sticky Post:', 'imprint'),
            'desc' => __('Sticky Post Background Color', 'imprint'),
            'id' => 'sticky_bg_c',
            'std' => '#EEEEEE',
            'type' => 'color');

        $options[] = array(
            'name' => __('Read more [button] <br />(text color)', 'imprint'),
            'desc' => __('Read more (button) text color. <a href="'. IMPRINT_DOCS_URL .'" target="_blank"><i>What is readmore button?</i></a> <i class="fa fa-external-link valign-bottom font-11"></i>', 'imprint'),
            'id' => 'rm_text_c',
            'std' => '#FFFFFF',
            'type' => 'color');

        $options[] = array(
            'name' => __('Read more [button]: <br />(background color)', 'imprint'),
            'desc' => __('Changes the background color of "read more" button.', 'imprint'),
            'id' => 'rm_bg_c',
            'std' => '#1497EA',
            'type' => 'color');

        $options[] = array(
            'name' => __('Read more [button] <br />(border color)', 'imprint'),
            'desc' => __('Changes the color of shadow which appears at the sides of the box containing the "read more" button.', 'imprint'),
            'id' => 'rm_border_c',
            'std' => '#000000',
            'type' => 'color');

        $options[] = array(
            'name' => __('Homepage Post Title:', 'imprint'),
            'desc' => __('Homepage Post Title Color', 'imprint'),
            'id' => 'home_post_title_c',
            'std' => '#444444',
            'type' => 'color');

        $options[] = array(
            'name' => __('Homepage Post Meta:', 'imprint'),
            'desc' => __('Homepage Post Meta Color', 'imprint'),
            'id' => 'home_post_meta_c',
            'std' => '#353535',
            'type' => 'color');

        $options[] = array(
            'name' => __('Homepage Post Excerpt:', 'imprint'),
            'desc' => __('Homepage Post Excerpt Color', 'imprint'),
            'id' => 'home_post_excerpt_c',
            'std' => '#000000',
            'type' => 'color');

        $options[] = array(
            'name' => __('Homepage Thumbnail: <br /> (border color)', 'imprint'),
            'desc' => __('Homepage Thumbnail Border Color', 'imprint'),
            'id' => 'home_thumb_border_c',
            'std' => '#AAAAAA',
            'type' => 'color');

        $options[] = array(
            'name' => __('Homepage Divider:', 'imprint'),
            'desc' => __('Color of the line that divides each post on the homepage.', 'imprint'),
            'id' => 'home_divider_c',
            'std' => '#D7D7D7',
            'type' => 'color');

        $options[] = array(
            'name' => __('Single Post Title:', 'imprint'),
            'desc' => __('Color of single posts and pages - Title.', 'imprint'),
            'id' => 'post_title_c',
            'std' => '#444444',
            'type' => 'color');

        $options[] = array(
            'name' => __('single Post Meta:', 'imprint'),
            'desc' => __('Color of single posts and pages - Meta Text.', 'imprint'),
            'id' => 'post_meta_c',
            'std' => '#444444',
            'type' => 'color');

        $options[] = array(
            'name' => __('Single Post Content:', 'imprint'),
            'desc' => __('Color of single posts and pages - Content.', 'imprint'),
            'id' => 'post_content_c',
            'std' => '#222222',
            'type' => 'color');

        $options[] = array(
            'name' => __('Heading Tag:', 'imprint'),
            'desc' => __('Color of heading HTML tags {h1, h2, h3, h4, h5, h6} that appear inside a single post or page.', 'imprint'),
            'id' => 'post_heading_c',
            'std' => '#222222',
            'type' => 'color');

        $options[] = array(
            'name' => __('PRE Tag: <br />(background color)', 'imprint'),
            'desc' => __('Background Color of {pre} HTML tag that appear inside a single post or page.', 'imprint'),
            'id' => 'post_pre_bg_c',
            'std' => '#F7F7F7',
            'type' => 'color');

        $options[] = array(
            'name' => __('PRE Tag: <br />(text color)', 'imprint'),
            'desc' => __('Text Color of {pre} HTML tag that appear inside a single post or page.', 'imprint'),
            'id' => 'post_pre_c',
            'std' => '#222222',
            'type' => 'color');

        $options[] = array(
            'name' => __('HR Tag: <br />(color)', 'imprint'),
            'desc' => __('Color of {hr} HTML tag that appear inside a single post or page.', 'imprint'),
            'id' => 'post_hr_c',
            'std' => '#E7E7E7',
            'type' => 'color');

        $options[] = array(
            'name' => __('Tag Links:', 'imprint'),
            'desc' => __('Color of Tag Links that appear at the bottom of a single post.', 'imprint'),
            'id' => 'post_tag_c',
            'std' => '#444444',
            'type' => 'color');

        $options[] = array(
            'name' => __('Post Navigation: <br />(text color)', 'imprint'),
            'desc' => __('Color of 2 post navigation links that appear below a single post.', 'imprint'),
            'id' => 'post_nav_below_post_c',
            'std' => '#555555',
            'type' => 'color');

        $options[] = array(
            'name' => __('Image Caption: <br />(background color)', 'imprint'),
            'desc' => __('Background color of Image Captions.', 'imprint'),
            'id' => 'post_img_caption_bg_c',
            'std' => '#CCCCCC',
            'type' => 'color');

        $options[] = array(
            'name' => __('Image Caption: <br />(text color)', 'imprint'),
            'desc' => __('Color of Image Captions', 'imprint'),
            'id' => 'post_img_caption_c',
            'std' => '#888888',
            'type' => 'color');

        $options[] = array(
            'name' => __('Footer Box Widget Title: <br />(background color)', 'imprint'),
            'desc' => __('Changes the background image or color of the Footerbox widget\'s title.', 'imprint'),
            'id' => 'fb_widget_title_bg',
            'std' => array('color' => '#333333','image' => FALSE,'repeat' => 'repeat','position' => 'top left','attachment'=>'scroll' ),
            'type' => 'background');

        $options[] = array(
            'name' => __('Footer Box Widget Body: <br />(background color)', 'imprint'),
            'desc' => __('Changes the background image or color of the Footerbox widget\'s body.', 'imprint'),
            'id' => 'fb_widget_bg',
            'std' => array('color' => '#000000','image' => FALSE,'repeat' => 'repeat','position' => 'top left','attachment'=>'scroll' ),
            'type' => 'background');

        $options[] = array(
            'name' => __('Widgets Title: <br />(background color)', 'imprint'),
            'desc' => __('Changes the background image or color of the Primary sidebar\'s widget title.', 'imprint'),
            'id' => 'widget_title_bg',
            'std' => array('color' => '#444444','image' => FALSE,'repeat' => 'repeat','position' => 'top left','attachment'=>'scroll' ),
            'type' => 'background');

        $options[] = array(
            'name' => __('Widgets Body: <br />(background color)', 'imprint'),
            'desc' => __('Changes the background image or color of the Primary sidebar\'s widget body.', 'imprint'),
            'id' => 'widget_bg',
            'std' => array('color' => '#FFFFFF','image' => FALSE,'repeat' => 'repeat','position' => 'top left','attachment'=>'scroll' ),
            'type' => 'background');


        /*Colorify ends*/

        /*Font starts*/

        $options[] = array(
            'name' => __('Fonts Types', 'imprint'),
            'type' => 'heading');

        $options[] = array(
            'name' => __('Site Title:', 'imprint'),
            'desc' => __('Font Type for Site Title.', 'imprint'),
            'id' => 'site_title_f',
            'std' => 'Times',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'name' => __('Site Description:', 'imprint'),
            'desc' => __('Font Type for Site Description.', 'imprint'),
            'id' => 'site_desc_f',
            'std' => 'Arial',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'name' => __('Homepage Post Title:', 'imprint'),
            'desc' => __('Font Type for Homepage Post\'s Title.', 'imprint'),
            'id' => 'archive_title_f',
            'std' => 'Times',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'name' => __('Homepage Post Meta:', 'imprint'),
            'desc' => __('Font Type for Homepage Post\'s Meta.', 'imprint'),
            'id' => 'archive_meta_f',
            'std' => 'Arial',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'name' => __('Homepage Post Excerpt:', 'imprint'),
            'desc' => __('Font Type for Homepage Post\'s Excerpt.', 'imprint'),
            'id' => 'archive_excerpt_f',
            'std' => 'Arial',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'name' => __('Read more [button]:', 'imprint'),
            'desc' => __('Font Type for "read more" [button].', 'imprint'),
            'id' => 'rm_f',
            'std' => 'Arial',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'name' => __('Primary Sidebar Title:', 'imprint'),
            'desc' => __('Font Type for Primary Sidebar Title.', 'imprint'),
            'id' => 'pri_sidebar_title_f',
            'std' => 'Arial',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'name' => __('Primary Sidebar Links:', 'imprint'),
            'desc' => __('Font Type for Primary Sidebar Links.', 'imprint'),
            'id' => 'pri_sidebar_link_f',
            'std' => 'Arial',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'name' => __('Primary Sidebar Content:', 'imprint'),
            'desc' => __('Font Type for Primary Sidebar Content.', 'imprint'),
            'id' => 'pri_sidebar_text_f',
            'std' => 'Arial',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'name' => __('Footerbox Widget Title:', 'imprint'),
            'desc' => __('Font Type for Footerbox Title.', 'imprint'),
            'id' => 'fb_w_title_f',
            'std' => 'Arial',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'name' => __('Footerbox Widget Content:', 'imprint'),
            'desc' => __('Font Type for Footerbox Widget Content.', 'imprint'),
            'id' => 'fb_w_text_f',
            'std' => 'Arial',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'name' => __('Footerbox Links:', 'imprint'),
            'desc' => __('Font Type for Footerbox Links.', 'imprint'),
            'id' => 'fb_w_link_f',
            'std' => 'Arial',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'name' => __('Footer Text:', 'imprint'),
            'desc' => __('Font Type for Footer Text.', 'imprint'),
            'id' => 'footer_f',
            'std' => 'Verdana',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'name' => __('Single Post Title:', 'imprint'),
            'desc' => __('Font Type for Single Post or Page Title.', 'imprint'),
            'id' => 'post_title_f',
            'std' => 'Times',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'name' => __('Single Post Meta:', 'imprint'),
            'desc' => __('Font Type for Single Post or Page Meta.', 'imprint'),
            'id' => 'post_meta_f',
            'std' => 'Tahoma',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'name' => __('Single Post Content:', 'imprint'),
            'desc' => __('Font Type for Single Post or Page Content.', 'imprint'),
            'id' => 'post_content_f',
            'std' => 'Arial',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'name' => __('PRE Tag:', 'imprint'),
            'desc' => __('Font Type for {pre} HTML Tag.', 'imprint'),
            'id' => 'post_pre_f',
            'std' => 'Courier-New',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'name' => __('Single Post List:', 'imprint'),
            'desc' => __('Font Type for List {li HTML Tag} on Single Post or Page.', 'imprint'),
            'id' => 'post_list_f',
            'std' => 'Arial',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'name' => __('Single Post Headings:', 'imprint'),
            'desc' => __('Font Type for Post or Page Headings. {H1, H2, H3, H4, H5, H6 Tags}', 'imprint'),
            'id' => 'post_headings_f',
            'std' => 'Arial',
            'type' => 'select',
            'options' => $custom_font_scut);

        $options[] = array(
            'id' => "mud_font_upgrade",
            'type' => 'font_upgrade');
    /*
        $options[] = array(
            'name' => __('Read more (link) Text:', 'imprint'),
            'desc' => __('Changes the text of "read more" link which appears below excerpts on homepage and archives.', 'imprint'),
            'id' => 'rm_text',
            'std' => 'Continue Reading...',
            'type' => 'text');
    */


        /*     * *** Widgets (Starts) **** */
    /*
        $options[] = array(
            'name' => __('Widget Settings', 'imprint'),
            'type' => 'heading');

        $options[] = array(
            'id' => "mudwidget_section",
            'type' => 'divstart');

        $options[] = array(
            'name' => __('Primary Sidebar Styling', 'imprint'),
            'desc' => __('Change the look & style of the Default Primary Sidebar. (Appears on the right)', 'imprint'),
            'type' => 'info');


        $options[] = array(
            'id' => "mudwidget_section",
            'type' => 'divend');

        $options[] = array(
            'id' => "footerbox_section",
            'type' => 'divstart');

        $options[] = array(
            'name' => __('Footer Box Styling', 'imprint'),
            'desc' => __('Here you can style the 3-widget footer box at theme\'s bottom. <strong>(This box appears only when widgets are added to it)</strong>', 'imprint'),
            'type' => 'info');


        $options[] = array(
            'id' => "footerbox_section",
            'type' => 'divend');

    */
        /*     * *** Widgets (Ends) **** */



        /* Custom CSS (Starts) */

        $options[] = array(
            'name' => __('Custom CSS', 'imprint'),
            'type' => 'heading');

        $options[] = array(
            'id' => "mudcss_section",
            'type' => 'divstart');

        $options[] = array(
            'name' => __('Custom CSS Styles:', 'imprint'),
            'desc' => __('<strong>Important:</strong> Use this section only if you are well versed with CSS styling. Any bad input here can ruin the entire look of your theme. You can put your custom CSS styles here. It is recommended that you use this section rather than editing <i>style.css</i> directly. ', 'imprint'),
            'id' => 'custom_css',
            'std' => '',
            'type' => 'textarea');

        $options[] = array(
            'id' => "mudcss_section",
            'type' => 'divend');

        /* Custom CSS (Ends) */



        /*     * *** Slideshow (Starts) *** */

        $options[] = array(
            'name' => __('Slideshow', 'imprint'),
            'type' => 'heading');

        $options[] = array(
            'name' => __('Toggle Carousel', 'imprint'),
            'desc' => __('Type of Carousel', 'imprint'),
            'id' => 'carousel',
            'std' => 'featured',
            'type' => 'radio',
            'options' => $carousel_options);

        $options[] = array(
            'name' => __('Carousel Location', 'imprint'),
            'desc' => __('Choose where to display carousel.', 'imprint'),
            'id' => 'carousel_location',
            'std' => 'everywhere',
            'type' => 'radio',
            'options' => array('everywhere' => 'Everywhere', 'homepage' => 'Homepage', 'pages' => 'Pages', 'post' => 'Posts', 'both' => 'Pages/Posts'));

        $options[] = array(
            'name' => __('Slideshow Speed', 'imprint'),
            'desc' => __('Speed of slideshow', 'imprint'),
            'id' => 'slide_speed',
            'std' => '5000',
            'type' => 'select',
            'options' => $num_by_hundred);
        $options[] = array(
            'name' => __('Slideshow Animation Speed', 'imprint'),
            'desc' => __('Speed of slideshow animation', 'imprint'),
            'id' => 'slide_ani_speed',
            'std' => '700',
            'type' => 'select',
            'options' => $num_by_hundred);
        $options[] = array(
            'name' => __('Hide Navigation:', 'imprint'),
            'desc' => __('Hide left and right navigation', 'imprint'),
            'id' => 'disable_slide_nav',
            'std' => '0',
            'type' => 'checkbox');
        $options[] = array(
            'name' => __('Smooth Height:', 'imprint'),
            'desc' => __('Disable Smooth Height.', 'imprint'),
            'id' => 'disable_smooth_height',
            'std' => '1',
            'type' => 'checkbox');

        $options[] = array(
            'name' => __('Animation Type', 'imprint'),
            'desc' => __('Slideshow animation type.', 'imprint'),
            'id' => 'slide_animation_type',
            'std' => 'fade',
            'type' => 'select',
            'options' => array('fade'=>'fade','slide'=>'slide'));
        $options[] = array(
            'name' => __('Slideshow Direction', 'imprint'),
            'desc' => __('Slideshow Direction.', 'imprint'),
            'id' => 'slide_dir',
            'std' => 'horizontal',
            'type' => 'select',
            'options' => array('horizontal'=>'horizontal','vertical'=>'vertical'));

        $options[] = array(
            'name' => __('Slideshow Image 1:', 'imprint'),
            'desc' => __('First Slideshow Image', 'imprint'),
            'std' => '',
            'id' => 'slide_1',
            'type' => 'upload');

        $options[] = array(
            'name' => __('Slideshow Image 2:', 'imprint'),
            'desc' => __('Second Slideshow Image', 'imprint'),
            'std' => '',
            'id' => 'slide_2',
            'type' => 'upload');

        $options[] = array(
            'id' => "mud_carousel_upgrade",
            'type' => 'carousel_upgrade');

        /* Slideshow (Ends) */

        return $options;
    }
endif;