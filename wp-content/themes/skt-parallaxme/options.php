<?php 

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */ 

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'skt-parallaxme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */


function optionsframework_options() {

	// array of section content.
	$section_text = array(
		1 => array(
			'section_title'	=> 'Welcome to the <strong>Parallax <span>Me</span></strong>',
			'menu_title' 	=> '',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> '',
			'class'			=> 'services cf',
			'content'		=> '<p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam semper diam metus, ac laoreet justo fringilla sed. Integer sit amet erat libero. Vivamus consectetur facilisis fringilla. In cursus nisi non rhoncus aliquam. In sed augue massa. Ut congue mi vel tellus ultrices imperdiet. Praesent varius massa ornare, fermentum ipsum sed, tristique nisi. Aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam semper diam metus, ac laoreet justo fringilla sed. Integer sit amet erat libero. Vivamus consectetur facilisis fringilla. In cursus nisi non rhoncus aliquam. In sed augue massa. Ut congue mi vel tellus ultrices imperdiet. Praesent varius massa ornare, fermentum ipsum sed, tristique nisi. Aliquam erat volutpat.</p>'
		),
		2 => array(
			'section_title'	=> 'Who We Are',
			'menu_title' 	=> 'ABOUT',
			'bgcolor' 		=> '#f6f6f6',
			'bgimage'		=> '',
			'class'			=> 'parallaxme',
			'content'		=> '<p>Aenean et volutpat augue. Cras vitae tellus eget nunc sagittis cursus a quis leo. Curabitur lobortis, ligula ut dapibus semper, dui eros egestas sem, a tempus sapien turpis sit amet turpis. Sed viverra facilisis orci eget porta.</p><p>Fusce lacinia est in porta interdum. In quis iaculis augue. In euismod odio nec quam rutrum, quis gravida eros blandit. Morbi consectetur sapien nec euismod viverra. Mauris iaculis congue sapien et dictum. Maecenas iaculis mauris quis magna congue tempus.</p><p> Suspendisse pharetra elit vitae pellentesque tempor. Etiam ut bibendum enim. Vestibulum velit odio, rhoncus vitae orci semper, imperdiet pellentesque diam. Suspendisse potenti. Sed ac facilisis justo. </p>'
		),
		3 => array(
			'section_title'	=> 'Services',
			'menu_title' 	=> 'Services',
			'bgcolor' 		=> '#f0f1ec',
			'bgimage'		=> get_template_directory_uri().'/images/section-test-bg.jpg',
			'class'			=> 'services_txt cf',
			'content'		=> '
				<div class="service-icons">
					<div class="columns five item alpha">
					<p><img src="'.get_template_directory_uri().'/images/service01.png" alt="Service" /></p>
<h2>Web Design</h2>
<p>Donec velit augue, scelerisque non dignissim non, commodo eget erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>
			<div class="columns five item">
					<p><img src="'.get_template_directory_uri().'/images/service02.png" alt="Service" /></p>
<h2>Mobile Website</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec velit augue, scelerisque non dignissim non, commodo eget erat.</p>
</div>
			<div class="columns five item  omega">
					<p><img src="'.get_template_directory_uri().'/images/service03.png" alt="Service" /></p>
<h2>Wordpress Themes</h2>
<p>Donec velit augue, scelerisque non dignissim non, commodo eget erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>
				</div>'
		),
		4 => array(
			'section_title'	=> 'Photo Gallery',
			'menu_title' 	=> 'Gallery',
			'bgcolor' 		=> '#f6f6f6',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '<div class="photobooth cf">
            <div class="gallery">
                <ul class="clean" id="portfolio">
							<li class="images">
								<strong>Image 1</strong><em><span>Image 1</span></em><a href="'.get_template_directory_uri().'/images/gallery/img01.jpg" rel="prettyPhoto[pp_gal]"><img src="'.get_template_directory_uri().'/images/gallery/img01.jpg" width="313" height="225" /></a></li>
								<li class="images">
								<strong>Image 2</strong><em><span>Image 2</span></em><a href="'.get_template_directory_uri().'/images/gallery/img02.jpg" rel="prettyPhoto[pp_gal]"><img src="'.get_template_directory_uri().'/images/gallery/img02.jpg" width="313" height="225" /></a></li>
								<li class="images">
								<strong>Image 3</strong><em><span>Image 3</span></em><a href="'.get_template_directory_uri().'/images/gallery/img03.jpg" rel="prettyPhoto[pp_gal]"><img src="'.get_template_directory_uri().'/images/gallery/img03.jpg" width="313" height="225" /></a></li>
								<li class="images">
								<strong>Image 4</strong><em><span>Image 4</span></em><a href="'.get_template_directory_uri().'/images/gallery/img04.jpg" rel="prettyPhoto[pp_gal]"><img src="'.get_template_directory_uri().'/images/gallery/img04.jpg" width="313" height="225" /></a></li>
								<li class="images">
								<strong>Image 5</strong><em><span>Image 5</span></em><a href="'.get_template_directory_uri().'/images/gallery/img05.jpg" rel="prettyPhoto[pp_gal]"><img src="'.get_template_directory_uri().'/images/gallery/img05.jpg" width="313" height="225" /></a></li>
								<li class="images">
								<strong>Image 6</strong><em><span>Image 6</span></em><a href="'.get_template_directory_uri().'/images/gallery/img06.jpg" rel="prettyPhoto[pp_gal]"><img src="'.get_template_directory_uri().'/images/gallery/img06.jpg" width="313" height="225" /></a></li>
								
								
				</ul>
				</div>
				</div>'
		),
		5 => array(
			'section_title'	=> 'Features',
			'menu_title' 	=> 'Blog',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '<div class="service-icons"><div class="columns five item alpha ">
<p><a href="#" title="Lorem ipsum dolor"><img src="'.get_template_directory_uri().'/images/service01.png" class="attachment-thumbnail wp-post-image" alt="blog01"></a></p>
<h2><a href="#" title="Lorem ipsum dolor">Responsive</a></h2>
<p>Vivamus pellentesque pretium est eu molestie. Ut ut tincidunt turpis. Aliquam pretium vulputate pretium. Vivamus imperdiet lectus velit, a rutrum</p>
</div><div class="columns five item  ">
<p><a href="#" title=""><img src="'.get_template_directory_uri().'/images/service02.png" class="attachment-thumbnail wp-post-image" alt="blog02"></a></p>
<h2><a href="#" title="">Fast Loading</a></h2>
<p>Phasellus fermentum augue vulputate, pulvinar odio in, semper risus. Donec rhoncus dolor in tortor venenatis, ac pharetra mauris venenatis. Aliquam</p>
</div><div class="columns five item  omega">
<p><a href="#" title="Hello world!"><img src="'.get_template_directory_uri().'/images/service03.png" class="attachment-thumbnail wp-post-image" alt="blog03"></a></p>
<h2><a href="" title="">Customizable</a></h2>
<p>Phasellus fermentum augue vulputate, pulvinar odio in, semper risus. Donec rhoncus dolor in tortor venenatis, ac pharetra mauris venenatis. Aliquam</p>
</div><div class="clear"></div>'
		),
		6 => array(
			'section_title'	=> 'Contact Us',
			'menu_title' 	=> 'Contact',
			'bgcolor' 		=> '#f6f6f6',
			'bgimage'		=> '',
			'class'			=> 'hello cf',
			'content'		=> '<h2><strong>Parallax-Me</strong></h2>
                <p>123, Test Street Ave<br>Saltlake City, Utah<br>United States</p>
                <p>Email: <u><a href="#">you@example-mail.com </a></u></p>
                <p>Phone: 111-222-3333</p>
                <p>Fax: 333-444-5555</p>
                <p>Mobile: 222-333-4444</p>'
		),
	);

	$options = array();

	//Basic Settings
	$options[] = array(
		'name' => __('Basic Settings', 'skt-parallaxme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Logo', 'skt-parallaxme'),
		'desc' => __('Upload your main logo here', 'skt-parallaxme'),
		'id' => 'logo',
		'class' => '',
		'std'	=> "",
		'type' => 'upload');

	$options[] = array(
		'name' => __('Favicon', 'skt-parallaxme'),
		'desc' => __('Upload favicon for website', 'skt-parallaxme'),
		'id' => 'favicon',
		'class' => '',
		'std'	=> ' ',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Footer Logo', 'skt-parallaxme'),
		'desc' => __('Upload footer logo here', 'skt-parallaxme'),
		'id' => 'footerlogo',
		'class' => '',
		'std'	=> "",
		'type' => 'upload');

	$options[] = array(
		'name' => __('Footer Right (Designed by) Text', 'skt-parallaxme'),
		'desc' => __('Some text for footer of your site, you would like to display in the footer.', 'skt-parallaxme'),
		'id' => 'footertext',
		'std' => '&copy; 2014. Design by <a target="_blank" href="'.esc_url('http://sktthemes.net').'">SKT Themes</a>',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Custom CSS', 'skt-parallaxme'),
		'desc' => __('Some Custom Styling for your site. Place any css codes here instead of the style.css file.', 'skt-parallaxme'),
		'id' => 'style2',
		'std' => '',
		'type' => 'textarea');


	//Layout Settings
	$options[] = array(
		'name' => __('Sections', 'skt-parallaxme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Number of Sections', 'skt-parallaxme'),
		'desc' => __('Select number of sections', 'skt-parallaxme'),
		'id' => 'numsection',
		'type' => 'select',
		'std' => '6',
		'options' => array_combine(range(1,10), range(1,10)) );

	$numsecs = of_get_option( 'numsection', 6 );

	for( $n=1; $n<=$numsecs; $n++){
		$options[] = array(
			'desc' => __("<h3>Section</h3>", 'skt-parallaxme'),
			'class' => 'toggle_title',
			'type' => 'info');	
	
		$options[] = array(
			'name' => __('Section Title', 'skt-parallaxme'),
			'id' => 'sectiontitle'.$n,
			'std' => ( ( isset($section_text[$n]['section_title']) ) ? $section_text[$n]['section_title'] : '' ),
			'type' => 'text');
			
		$options[] = array(
			'name' => __('Menu Title', 'skt-parallaxme'),
			'desc' => __('This title will display in the header menu. Leave blank to hide in menu', 'skt-parallaxme'),
			'id' => 'menutitle'.$n,
			'std' => ( ( isset($section_text[$n]['menu_title']) ) ? $section_text[$n]['menu_title'] : '' ),
			'type' => 'text');

		$options[] = array(
			'name' => __('Section CSS Class', 'skt-parallaxme'),
			'desc' => __('Set class for this section.', 'skt-parallaxme'),
			'id' => 'sectionclass'.$n,
			'std' => ( ( isset($section_text[$n]['class']) ) ? $section_text[$n]['class'] : '' ),
			'type' => 'text');

		$options[] = array(
			'name' => __('Section Content', 'skt-parallaxme'),
			'id' => 'sectioncontent'.$n,
			'std' => ( ( isset($section_text[$n]['content']) ) ? $section_text[$n]['content'] : '' ),
			'type' => 'editor');
	}


	//SLIDER SETTINGS
	$options[] = array(
		'name' => __('Homepage Slider', 'skt-parallaxme'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Inner Page Slider', 'skt-parallaxme'),
		'desc' => __('Show / Hide inner page slider', 'skt-parallaxme'),
		'id' => 'innerpageslider',
		'type' => 'select',
		'std' => 'hide',
		'options' => array('show'=>'Show', 'hide'=>'Hide') );

	$options[] = array(
		'name' => __('Slider Image 1', 'skt-parallaxme'),
		'desc' => __('Upload / select image for slide 1', 'skt-parallaxme'),
		'id' => 'slide1',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slide01.jpg",
		'type' => 'upload');

	$options[] = array(
		'desc' => __('Title 1', 'skt-parallaxme'),
		'id' => 'slidetitle1',
		'std' => 'Awesome' ,
		'type' => 'text');

	$options[] = array(
		'name' => __('Slider Image 2', 'skt-parallaxme'),
		'desc' => __('Upload / select image for slide 2', 'skt-parallaxme'),
		'id' => 'slide2',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slide02.jpg",
		'type' => 'upload');

	$options[] = array(
		'desc' => __('Title 2', 'skt-parallaxme'),
		'id' => 'slidetitle2',
		'std' => 'Design' ,
		'type' => 'text');

	$options[] = array(
		'name' => __('Slider Image 3', 'skt-parallaxme'),
		'desc' => __('Upload / select image for slide 3', 'skt-parallaxme'),
		'id' => 'slide3',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slide03.jpg",
		'type' => 'upload');

	$options[] = array(
		'desc' => __('Title 3', 'skt-parallaxme'),
		'id' => 'slidetitle3',
		'std' => 'Meets' ,
		'type' => 'text');

	$options[] = array(
		'name' => __('Slider Image 4', 'skt-parallaxme'),
		'desc' => __('Upload / select image for slide 4', 'skt-parallaxme'),
		'id' => 'slide4',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slide04.jpg",
		'type' => 'upload');

	$options[] = array(
		'desc' => __('Title 4', 'skt-parallaxme'),
		'id' => 'slidetitle4',
		'std' => 'Easy' ,
		'type' => 'text');

	$options[] = array(
		'name' => __('Slider Image 5', 'skt-parallaxme'),
		'desc' => __('Upload / select image for slide 5', 'skt-parallaxme'),
		'id' => 'slide5',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slide05.jpg",
		'type' => 'upload');

	$options[] = array(
		'desc' => __('Title 5', 'skt-parallaxme'),
		'id' => 'slidetitle5',
		'std' => 'Set-up' ,
		'type' => 'text');


	//Social Settings
	$options[] = array(
		'name' => __('Social Settings', 'skt-parallaxme'),
		'type' => 'heading');
	
	$options[] = array(
		'desc' => __('Please set the value of following fields, as per the instructions given along. If you do not want to use an icon, just leave it blank. If some icons are showing up, even when no value is set then make sure they are completely blank, and just save the options once. They will not be shown anymore.', 'skt-parallaxme'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Facebook', 'skt-parallaxme'),
		'desc' => __('Facebook Profile or Page URL i.e. http://facebook.com/username/ ', 'skt-parallaxme'),
		'id' => 'facebook',
		'std' => '#',
		'type' => 'text',
		'subtype' => 'url');
	
	$options[] = array(
		'name' => __('Twitter', 'skt-parallaxme'),
		'desc' => __('Twitter Username', 'skt-parallaxme'),
		'id' => 'twitter',
		'std' => '#',
		'type' => 'text',
		'subtype' => 'url');
	
	$options[] = array(
		'name' => __('Google Plus', 'skt-parallaxme'),
		'desc' => __('Google Plus profile url, including "http://"', 'skt-parallaxme'),
		'id' => 'google',
		'std' => '#',
		'type' => 'text',
		'subtype' => 'url');
		
	$options[] = array(
		'name' => __('Linkedin', 'skt-parallaxme'),
		'desc' => __('Linkedin URL', 'skt-parallaxme'),
		'id' => 'linkedin',
		'std' => '#',
		'type' => 'text',
		'subtype' => 'url');	

	$options[] = array(
		'name' => __('YouTube', 'skt-parallaxme'),
		'desc' => __('YouTube URL', 'skt-parallaxme'),
		'id' => 'youtube',
		'std' => '#',
		'type' => 'text',
		'subtype' => 'url');

	// Support					
	$options[] = array(
		'name' => __('Our Themes', 'skt-parallaxme'),
		'type' => 'heading');

	$options[] = array(
		'desc' => __('SKT Parallax Me WordPress theme has been Designed and Created by SKT Themes.', 'skt-parallaxme'),
		'type' => 'info');	

	 $options[] = array(
		'desc' => __('<a href="'.esc_url(SKT_THEME_URL).'" target="_blank"><img src="'.get_template_directory_uri().'/images/sktskill.jpg"></a><p><em><a target="_blank" href="'.esc_url('http://www.sktthemes.net/themes/skt_parallax_me_pro/').'">Buy PRO version for only $30 with more features.</a></em></p>', 'skt-parallaxme'),
		'type' => 'info');	
	
	return $options;
}