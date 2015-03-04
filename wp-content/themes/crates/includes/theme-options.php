<?php


function crates_customize_register( $wp_customize ) {
	$colors = array();
	$colors[] = array(
		'slug'=>'accentcolor', 
		'default' => '',
		'label' => __('Accent Colour', 'crates')
	);
	$colors[] = array(
		'slug'=>'logotextcolor', 
		'default' => '#27262b',
		'label' => __('Logo Text Colour', 'crates')
	);
	$colors[] = array(
		'slug'=>'titlecolor', 
		'default' => '',
		'label' => __('Title Colour', 'crates')
	);	
	$colors[] = array(
		'slug'=>'textcolor', 
		'default' => '',
		'label' => __('Text Colour', 'crates')
	);	
foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			'type' => 'option', 
			'capability' => 'edit_theme_options'
		)
	);

	$wp_customize->add_setting( 'headerlogo' );
	$wp_customize->add_setting( 'headerdescription' );
	$wp_customize->add_setting( 'headeravatar' );
	$wp_customize->add_setting( 'name' );
	$wp_customize->add_setting( 'twitterurl' );
	$wp_customize->add_setting( 'facebookurl' );
	$wp_customize->add_setting( 'instagramurl' );
	$wp_customize->add_setting( 'footertext' );
	$wp_customize->add_setting( 'customcss' );

	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'], 
			array('label' => $color['label'], 
			'section' => 'style',
			'settings' => $color['slug'])
		)
	);
}


$wp_customize->add_control(new WP_Customize_Image_Control ($wp_customize,'custom_logo',
        array(
            'label' => 'Custom Logo',
            'section' => 'header',
            'settings' => 'headerlogo',
            'priority' => '2'
        )
    )
);

$wp_customize->add_control(new WP_Customize_Image_Control ($wp_customize,'custom_avatar',
        array(
            'label' => 'Header Sidebar Avatar',
            'section' => 'headersidebar',
            'settings' => 'headeravatar',
            'priority' => '1',
        )
    )
);

class crates_Customize_Text_Control extends WP_Customize_Control {
	public $type = 'text';
	public function render_content() {
?>
	<label>
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<input type="text" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></input>
	</label>
<?php
	}
}

class crates_Customize_Textarea_Control extends WP_Customize_Control {
	public $type = 'textarea';
	public function render_content() {
?>
	<label>
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	</label>
<?php
	}
}

$textinput = 'crates_Customize_Text_Control';
$textarea = 'crates_Customize_Textarea_Control';


$wp_customize->add_control(new $textarea($wp_customize, 'headerdescription', array(
	'label' => 'Header Description',
	'section' => 'header',
	'settings' => 'headerdescription',
	'priority' => '1',
)));


$wp_customize->add_control(new $textarea($wp_customize, 'customcss', array(
	'label' => 'Custom Css',
	'section' => 'style',
	'settings' => 'customcss'
)));

$wp_customize->add_control(new $textarea($wp_customize, 'name', array(
	'label' => 'Name',
	'section' => 'headersidebar',
	'settings' => 'name',
	'priority' => '2',
)));

$wp_customize->add_control(new $textarea($wp_customize, 'twitterurl', array(
	'label' => 'Twitter URL',
	'section' => 'headersidebar',
	'settings' => 'twitterurl',
	'priority' => '3',
)));

$wp_customize->add_control(new $textarea($wp_customize, 'instagramurl', array(
	'label' => 'Instagram URL',
	'section' => 'headersidebar',
	'settings' => 'instagramurl',
	'priority' => '4',
)));

$wp_customize->add_control(new $textarea($wp_customize, 'facebookurl', array(
	'label' => 'Facebook URL',
	'section' => 'headersidebar',
	'settings' => 'facebookurl',
	'priority' => '5',
)));

$wp_customize->add_control(new $textarea($wp_customize, 'footertext', array(
	'label' => 'Footer Text',
	'section' => 'footer',
	'settings' => 'footertext',
	'priority' => '1',
)));


$wp_customize->add_section('general' , array(
    'title' => __('General Settings','crates'),
));

$wp_customize->add_section('style' , array(
    'title' => __('Style Settings','crates'),
));

$wp_customize->add_section('header' , array(
    'title' => __('Header Settings','crates'),
));

$wp_customize->add_section('headersidebar' , array(
    'title' => __('Header Sidebar Settings','crates'),
));

$wp_customize->add_section('footer' , array(
    'title' => __('Footer Settings','crates'),
));

} 
add_action( 'customize_register', 'crates_customize_register' );

?>