<?php

class GFontsEngine {

	const PLUGIN_OPTION_VERSION = 'gfonts_version';
	const PLUGIN_OPTION_FONTLIST = 'gfonts_list';
	const PLUGIN_OPTION_FONT_UPDATE_STATE = 'gfonts_update_state';
	const PLUGIN_OPTION_FONT_UPDATE_STATE_MESSAGE = 'gfonts_update_state_msg';
	const PLUGIN_OPTION_FONT_UPDATE_DATE = 'gfonts_update_date';
	const PLUGIN_OPTION_FONT_DATABASE = 'gfonts_fontlist';
	const PLUGIN_OPTION_FONT_SIZE_ENABLED = 'gfonts_fontsizes';
	const PLUGIN_OPTION_FONT_SIZE_MINIMUM = 'gfonts_fontsizes_min';
	const PLUGIN_OPTION_FONT_SIZE_MAXIMUM = 'gfonts_fontsizes_max';
	const PLUGIN_OPTION_SOCIAL_BUTTONS_TITLE = 'gfonts_sb_settings_title';
	const PLUGIN_OPTION_SOCIAL_BUTTONS_SIZE = 'gfonts_sb_settings_size';
	const PLUGIN_OPTION_SOCIAL_BUTTONS_FB_COLOR = 'gfonts_sb_settings_fb_color';
	const PLUGIN_OPTION_SOCIAL_BUTTONS_TW_COLOR = 'gfonts_sb_settings_tw_color';
	const PLUGIN_OPTION_SOCIAL_BUTTONS_GP_COLOR = 'gfonts_sb_settings_gp_color';
	const PLUGIN_OPTION_SOCIAL_BUTTONS_HTML_BEFORE = 'gfonts_sb_setting_htmlb';
	const PLUGIN_OPTION_SOCIAL_BUTTONS_HTML_AFTER = 'gfonts_sb_setting_htmla';
	const PLUGIN_OPTION_SOCIAL_BUTTONS_GLOBAL_SETTING = 'gfonts_sb_gs';
	const PLUGIN_OPTION_SOCIAL_BUTTONS_FACEBOOK = 'gfonts_sb_fb';
	const PLUGIN_OPTION_SOCIAL_BUTTONS_TWITTER = 'gfonts_sb_tw';
	const PLUGIN_OPTION_SOCIAL_BUTTONS_GOOGLEPLUS = 'gfonts_sb_gp';
	const PLUGIN_ACTION_PREVIEW = 'gfonts_preview';
	const PLUGIN_ACTION_PREVIEW_FOR_ALL = 'gfonts_preview_for_all';
	const PLUGIN_ACTION_INSTALL_FONT = 'gfonts_install_font';
	const PLUGIN_ACTION_UNINSTALL_FONT = 'gfonts_uninstall_font';
	const PLUGIN_META_NO_FONT = 'gfonts_meta_no_font';
	const PLUGIN_VERSION = '2.0.4';
	const PLUGIN_MENU_NAME = 'Google Fonts';
	const PLUGIN_MENU_TITLE = 'Google Fonts';
	const PLUGIN_SLUG = 'gfonts';
	const PLUGIN_SLUG_SOCIAL = 'gfonts_social';
	const PLUGIN_SLUG_SOCIAL_FB = 'gfonts_social_fb';
	const PLUGIN_SLUG_SOCIAL_TW = 'gfonts_social_tw';
	const PLUGIN_FONT_LIST = 'gfonts_list';
	const PLUGIN_FONT_STATS = 'gfonts_stats';
	const PLUGIN_FONT_SIZE = 'gfonts_sizes';
	const PLUGIN_CUSTOM_TITLE_PRESETS = 'gfonts_title_presets';
	const PLUGIN_CUSTOM_TITLE_PRESETS_REPLACE = 'gfonts_title_presets_replacement';
	const PLUGIN_SOCIAL_BUTTONS_SETTINGS = 'gfonts_social_settings';
	const PLUGIN_POLLS = 'gfonts_polls';
	const PLUGIN_POLLS_NEW = 'gfonts_polls_new';
	const PLUGIN_THEME_LAYOUTS = 'gfonts_theme_layouts';
	const PLUGIN_URL = PLUGIN_URL;
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK = 'gfonts_social_fb_slider';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_HP = 'gfonts_social_fb_slider_hp';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_VP = 'gfonts_social_fb_slider_vp';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_WD = 'gfonts_social_fb_slider_width';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_HE = 'gfonts_social_fb_slider_height';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_SFACES = 'gfonts_social_fb_slider_faces';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_SHEADER = 'gfonts_social_fb_slider_header';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_SSTREAM = 'gfonts_social_fb_slider_stream';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_URL = 'gfonts_social_fb_slider_url';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BORDER = 'gfonts_social_fb_slider_border';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BORDER_COLOR = 'gfonts_social_fb_slider_border_color';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_ZINDEX = 'gfonts_social_fb_slider_zindex';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_COLOR_SCHEME = 'gfonts_social_fb_slider_cscheme';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_ICON = 'gfonts_social_fb_slider_icon';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BGCOLOR = 'gfonts_social_fb_slider_bgcolor';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_LEFT_TOP = 'gfonts_social_fb_slider_radius_lt';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_LEFT_BOTTOM = 'gfonts_social_fb_slider_radius_lb';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_RIGHT_TOP = 'gfonts_social_fb_slider_radius_rt';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_RIGHT_BOTTOM = 'gfonts_social_fb_slider_radius_rb';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_LANGUAGE = 'gfonts_social_fb_slider_language';
	const PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BUTTON_MARGIN = 'gfonts_social_fb_slider_bt_margin';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER = 'gfonts_social_tw_slider';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_HP = 'gfonts_social_tw_slider_hp';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_VP = 'gfonts_social_tw_slider_vp';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_WD = 'gfonts_social_tw_slider_width';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_HE = 'gfonts_social_tw_slider_height';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BORDER = 'gfonts_social_tw_slider_border';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BORDER_COLOR = 'gfonts_social_tw_slider_border_color';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_LINK_COLOR = 'gfonts_social_tw_slider_link_color';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_ZINDEX = 'gfonts_social_tw_slider_zindex';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_COLOR_SCHEME = 'gfonts_social_tw_slider_cscheme';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_ICON = 'gfonts_social_tw_slider_icon';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BGCOLOR = 'gfonts_social_tw_slider_bgcolor';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_LEFT_TOP = 'gfonts_social_tw_slider_radius_lt';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_LEFT_BOTTOM = 'gfonts_social_tw_slider_radius_lb';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_RIGHT_TOP = 'gfonts_social_tw_slider_radius_rt';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_RIGHT_BOTTOM = 'gfonts_social_tw_slider_radius_rb';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_LANGUAGE = 'gfonts_social_tw_slider_language';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_NAME = 'gfonts_social_tw_slider_name';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_WIDGETID = 'gfonts_social_tw_slider_widgetid';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_LIMIT = 'gfonts_social_tw_slider_limit';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_SFOOTER = 'gfonts_social_tw_slider_header';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_SHEADER = 'gfonts_social_tw_slider_footer';
	const PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BUTTON_MARGIN = 'gfonts_social_tw_slider_bt_margin';
	const PLUGIN_FULL_VERSION = 'gfonts_fv';
	const PLUGIN_CONTACT = 'gfonts_contact';

	public static $changeTitle = false;
	public static $defaultTitlePreset = false;
	public static $wpHeadSent = false;
	public static $wpTitleText = null;
	public static $wpDescText = null;
	public static $navMenuBegin = false;
	public static $navMenuClass = null;
	public static $editLoaded = false;
	public static $titleCustomized = false;
	public static $titleDescriptionCustomized = false;
	public static $bufferingStarted = false;

	public function Run( $file ) {
		if ( isset( $_GET['page'] ) && 'gf_help' === $_GET['page'] ) {
			self::GoogleFontsHelp();
		}
		if ( isset( $_REQUEST['action'] ) || isset( $_REQUEST['action2'] ) ) {
			$doaction = ( $_REQUEST['action'] != - 1 ) ? $_REQUEST['action'] : $_REQUEST['action2'];
			if ( isset( $_GET['page'] ) && ( ( $_GET['page'] == self::PLUGIN_THEME_LAYOUTS && ( $doaction == 'export' ) ) || ( $_GET['page'] == self::PLUGIN_CUSTOM_TITLE_PRESETS && $doaction == 'export' ) ) ) {
				self::DownloadAttachments( $doaction );
				die();
			}
		}
		if ( ! isset( $_GET['nocustomization'] ) ) {
			if ( isset( $_GET['layoutpreview'] ) ) {
				add_action( 'setup_theme', array(
					'GFontsEngine',
					'ThemeLayoutPreview'
				) );
			}

			register_activation_hook( $file, array(
				'GFontsEngine',
				'InstallHook'
			) );
			register_uninstall_hook( $file, array(
				'GFontsEngine',
				'UninstallHook'
			) );
			add_action( 'admin_head', array( 'GFontsEngine', 'GFontsCss' ) );
			add_action( 'admin_menu', array( 'GFontsEngine', 'AddMenuItem' ) );
			add_filter( 'mce_buttons', array(
				'GFontsEngine',
				'ManageFontSelection'
			), 9000 );
			add_filter( 'tiny_mce_before_init', array(
				'GFontsEngine',
				'ManageTinyMceFonts'
			), 9000 );
			add_action( 'admin_init', array(
				'GFontsEngine',
				'RegisterSettings'
			) );
			add_action( 'wp_print_styles', array(
				'GFontsEngine',
				'IncludeCssForFonts'
			) );
			add_action( 'wp_print_styles', array(
				'GFontsEngine',
				'CustomizeTemplate'
			), 9000 );
			add_action( 'admin_print_styles', array(
				'GFontsEngine',
				'IncludeCssForFonts'
			) );
			add_filter( 'plugin_action_links_' . PLUGIN_BASENAME, array(
				'GFontsEngine',
				'AddSettingLinkToPlugin'
			), 10, 2 );
			add_action( 'wp_ajax_' . self::PLUGIN_ACTION_PREVIEW, array(
				'GFontsEngine',
				'ShowPreview'
			) );
			add_action( 'wp_ajax_' . self::PLUGIN_ACTION_PREVIEW_FOR_ALL, array(
				'GFontsEngine',
				'ShowPreviewForAll'
			) );
			add_action( 'wp_ajax_' . self::PLUGIN_ACTION_INSTALL_FONT, array(
				'GFontsEngine',
				'InstallFont'
			) );
			add_action( 'wp_ajax_' . self::PLUGIN_ACTION_UNINSTALL_FONT, array(
				'GFontsEngine',
				'UninstallFont'
			) );
			add_filter( 'posts_where', array(
				'GFontsEngine',
				'FilterPostsByFont'
			) );
			add_action( 'pre_get_posts', array(
				'GFontsEngine',
				'FilterPostsByNoFont'
			), 10000 );
			add_action( 'restrict_manage_posts', array(
				'GFontsEngine',
				'AddFiltersToPostList'
			) );
			add_action( 'load-edit.php', array(
				'GFontsEngine',
				'AddHelpToEditPhp'
			), 20 );
			add_filter( 'content_save_pre', array(
				'GFontsEngine',
				'ContentSave'
			), 10000, 1 );
			add_action( 'before_delete_post', array(
				'GFontsEngine',
				'BeforeDelete'
			) );
			add_action( 'trashed_post', array(
				'GFontsEngine',
				'TrashedPost'
			) );
			add_action( 'untrashed_post', array(
				'GFontsEngine',
				'UntrashedPost'
			) );
			add_filter( 'pre_update_option_' . self::PLUGIN_OPTION_FONT_SIZE_MAXIMUM, array(
				'GFontsEngine',
				'PreSaveMaximum'
			), 10000, 1 );
			add_filter( 'pre_update_option_' . self::PLUGIN_OPTION_FONT_SIZE_MINIMUM, array(
				'GFontsEngine',
				'PreSaveMinimum'
			), 10000, 1 );
			add_filter( 'pre_update_option_' . self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_WIDGETID, array(
				'GFontsEngine',
				'PreSaveTwitterWidgetId'
			), 10000, 1 );
			add_action( 'edit_form_after_title', array(
				'GFontsEngine',
				'CustomizeEditTitle'
			) );
			$tm = get_theme_mod( 'gf_post_title_styling_override' );
			if ( isset( $_GET['layoutpreview'] ) ) {
				add_filter( 'the_title', array(
					'GFontsEngine',
					'ModifyPostTitleFromPreview'
				), 10000, 2 );
			} else {
				if ( ! isset( $_POST['wp_customize'] ) && $tm != true ) {
					add_filter( 'the_title', array(
						'GFontsEngine',
						'ModifyPostTitle'
					), 10000, 2 );
				} else {
					add_filter( 'the_title', array(
						'GFontsEngine',
						'ModifyPostTitleFromCustomization'
					), 10000, 2 );
				}
			}
			add_action( 'add_meta_boxes', array(
				'GFontsEngine',
				'AddMetaBoxes'
			) );
			add_action( 'save_post', array( 'GFontsEngine', 'SavePost' ) );
			add_filter( 'views_edit-post', array(
				'GFontsEngine',
				'ModifyEditPostViews'
			), 10000, 2 );
			add_filter( 'views_edit-page', array(
				'GFontsEngine',
				'ModifyEditPostViews'
			), 10000, 2 );
			add_action( 'wp_ajax_gf_title_save_preset', array(
				'GFontsEngine',
				'GfTitleSavePreset'
			) );
			add_action( 'wp_ajax_gf_title_update_preset', array(
				'GFontsEngine',
				'GfTitleUpdatePreset'
			) );
			add_action( 'wp_ajax_gf_title_delete_preset', array(
				'GFontsEngine',
				'GfTitleDeletePreset'
			) );
			add_action( 'load-edit.php', array(
				'GFontsEngine',
				'CatchLoadEdit'
			) );
			add_action( 'customize_register', array(
				'GFontsEngine',
				'ThemeCustomizator'
			), 10000, 1 );
			add_filter( 'comments_template', array(
				'GFontsEngine',
				'OpaqueCommentsTemplate'
			), 10000, 1 );
			add_action( 'dynamic_sidebar', array(
				'GFontsEngine',
				'SidebarCustomizator'
			) );
			add_filter( 'attribute_escape', array(
				'GFontsEngine',
				'StripTitle'
			), 100, 2 );
			add_filter( 'dynamic_sidebar_params', array(
				'GFontsEngine',
				'DynamcSidebarParams'
			), 100, 2 );
			add_action(
				'wp_head', array( 'GFontsEngine', 'OutputBufferStart' )
			);
			add_action(
				'wp_footer', array(
				'GFontsEngine',
				'OutputBufferEnd'
			), PHP_INT_MAX
			);
			add_action(
				'wp_head', array( 'GFontsEngine', 'ThemeModCustomCss' ), PHP_INT_MAX -1
			);
			if ( ! is_admin() ) {
				add_action(
					'wp_footer', array( 'GFontsEngine', 'Sliders' )
				);
			}
			add_filter( 'the_content', array(
				'GFontsEngine',
				'ContentFilterProcessor'
			), 9000 );
			add_action( 'wp_ajax_mass_answers', array(
				'GFontsEngine',
				'AddMassAnswers'
			) );
			add_action( 'widgets_init', array(
				'GFontsEngine',
				'RegisterWidgets'
			) );
			add_action( 'wp_ajax_nopriv_poll_vote', array(
				'GFontsEngine',
				'PollVote'
			) );
			add_action( 'wp_head', array(
				'GFontsEngine',
				'WpHead'
			), PHP_INT_MAX );
			add_action( 'init', array( 'GFontsEngine', 'RegisterShortCodes' ) );
			add_action( 'wp_ajax_gf_load_poll_wizard', array(
				'GFontsEngine',
				'AjaxLoadPollWizard'
			) );
			add_action( 'wp_ajax_new_poll', array(
				'GFontsEngine',
				'AddNewPollFromWizard'
			) );
			add_filter( 'bloginfo', array(
				'GFontsEngine',
				'BloginfoFilter'
			), 10000, 2 );
			add_filter( 'attribute_escape', array(
				'GFontsEngine',
				'AttributeEscape'
			), 10000, 2 );
			add_filter( 'option_blogname', array(
				'GFontsEngine',
				'BlognameOption'
			), 10000, 1 );
			add_filter( 'option_blogdescription', array(
				'GFontsEngine',
				'BlogdescriptionOption'
			), 10000, 1 );
			add_action( 'customize_preview_init', array(
				'GFontsEngine',
				'WpCustomization'
			) );
			add_filter( 'wp_nav_menu_args', array(
				'GFontsEngine',
				'NavigationMenuBegin'
			), 1000, 1 );
			add_filter( 'wp_page_menu', array(
				'GFontsEngine',
				'NavigationMenuEnd'
			), 1000, 1 );
			add_filter( 'wp_nav_menu', array(
				'GFontsEngine',
				'NavigationMenuEnd'
			), 1000, 1 );
			//add_filter('wp_nav_menu_objects', array('GFontsEngine', 'NavigationMenuEnd2', 1000, 2));
			//add_filter('wp_nav_menu_items', array('GFontsEngine', 'NavigationMenuEnd2', 1000, 2));
			add_action( 'wp_ajax_mass_title_tool', array(
				'GFontsEngine',
				'AjaxMassTitleTools'
			) );
			add_filter( 'esc_html', array(
				'GFontsEngine',
				'EscapeHtmlFilter'
			), 1000, 2 );
			add_filter( 'powerposts_fonts', array(
				'GFontsEngine',
				'FontsListFilter'
			) );
		}
	}

	static public function GFontsCss() {
		wp_register_style( 'gfonts-admin', PLUGIN_URL . 'css/gfonts.css' );
		wp_enqueue_style( 'gfonts-admin' );
	}

	static public function RegisterSettings() {
		//register_setting(self::PLUGIN_SLUG, self::PLUGIN_OPTION_VERSION);
		//register_setting(self::PLUGIN_SLUG, self::PLUGIN_OPTION_FONTLIST);
		//register_setting(self::PLUGIN_SLUG, self::PLUGIN_OPTION_FONT_UPDATE_STATE);
		//register_setting(self::PLUGIN_SLUG, self::PLUGIN_OPTION_FONT_UPDATE_STATE_MESSAGE);
		//register_setting(self::PLUGIN_SLUG, self::PLUGIN_OPTION_FONT_UPDATE_DATE);
		//register_setting(self::PLUGIN_SLUG, self::PLUGIN_OPTION_FONT_DATABASE);
		register_setting( self::PLUGIN_SLUG, self::PLUGIN_OPTION_FONT_SIZE_ENABLED );
		register_setting( self::PLUGIN_SLUG, self::PLUGIN_OPTION_FONT_SIZE_MINIMUM );
		register_setting( self::PLUGIN_SLUG, self::PLUGIN_OPTION_FONT_SIZE_MAXIMUM );
		register_setting( self::PLUGIN_SLUG_SOCIAL, self::PLUGIN_OPTION_SOCIAL_BUTTONS_SIZE );
		register_setting( self::PLUGIN_SLUG_SOCIAL, self::PLUGIN_OPTION_SOCIAL_BUTTONS_TITLE );
		register_setting( self::PLUGIN_SLUG_SOCIAL, self::PLUGIN_OPTION_SOCIAL_BUTTONS_FB_COLOR );
		register_setting( self::PLUGIN_SLUG_SOCIAL, self::PLUGIN_OPTION_SOCIAL_BUTTONS_TW_COLOR );
		register_setting( self::PLUGIN_SLUG_SOCIAL, self::PLUGIN_OPTION_SOCIAL_BUTTONS_GP_COLOR );
		register_setting( self::PLUGIN_SLUG_SOCIAL, self::PLUGIN_OPTION_SOCIAL_BUTTONS_HTML_AFTER );
		register_setting( self::PLUGIN_SLUG_SOCIAL, self::PLUGIN_OPTION_SOCIAL_BUTTONS_HTML_BEFORE );
		register_setting( self::PLUGIN_SLUG_SOCIAL, self::PLUGIN_OPTION_SOCIAL_BUTTONS_GLOBAL_SETTING );
		register_setting( self::PLUGIN_SLUG_SOCIAL, self::PLUGIN_OPTION_SOCIAL_BUTTONS_FACEBOOK );
		register_setting( self::PLUGIN_SLUG_SOCIAL, self::PLUGIN_OPTION_SOCIAL_BUTTONS_TWITTER );
		register_setting( self::PLUGIN_SLUG_SOCIAL, self::PLUGIN_OPTION_SOCIAL_BUTTONS_GOOGLEPLUS );

		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_HP );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_VP );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_WD );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_HE );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_SFACES );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_SHEADER );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_SSTREAM );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_URL );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BORDER );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BORDER_COLOR );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_ZINDEX );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_COLOR_SCHEME );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_ICON );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BGCOLOR );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_LEFT_TOP );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_LEFT_BOTTOM );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_RIGHT_TOP );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_RIGHT_BOTTOM );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_LANGUAGE );
		register_setting( self::PLUGIN_SLUG_SOCIAL_FB, self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BUTTON_MARGIN );

		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_HP );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_VP );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_WD );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_HE );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BORDER );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BORDER_COLOR );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_LINK_COLOR );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_ZINDEX );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_COLOR_SCHEME );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_ICON );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BGCOLOR );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_LEFT_TOP );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_LEFT_BOTTOM );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_RIGHT_TOP );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_RIGHT_BOTTOM );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_LANGUAGE );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_NAME );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_WIDGETID );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_LIMIT );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_SHEADER );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_SFOOTER );
		register_setting( self::PLUGIN_SLUG_SOCIAL_TW, self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BUTTON_MARGIN );

		self::IncludeCssForFonts();
	}

	static public function AddSettingLinkToPlugin( $links, $file ) {
		$settings_link = '<a href="admin.php?page=' . self::PLUGIN_SLUG . '">' . __( 'Settings', GFontsEngine::PLUGIN_SLUG ) . '</a>';
		array_unshift( $links, $settings_link ); // before other links
		return $links;
	}

	static public function InstallHook() {
		$version = get_option( self::PLUGIN_OPTION_VERSION, 0 );
		update_option( self::PLUGIN_OPTION_VERSION, self::PLUGIN_VERSION );
		GFontsDB::InstallDB();
		self::InstallFonts();
		update_option( self::PLUGIN_OPTION_FONT_SIZE_ENABLED, true );
		update_option( self::PLUGIN_OPTION_FONT_SIZE_MINIMUM, 6 );
		update_option( self::PLUGIN_OPTION_FONT_SIZE_MAXIMUM, 48 );
		if ( - 1 === version_compare( $version, self::PLUGIN_VERSION ) ) {
			GFontsDB::RecalculateStats();
			self::InstallFonts();
		}
	}

	static public function UninstallHook() {
		delete_option( self::PLUGIN_OPTION_VERSION );
		GFontsDB::UninstallDB();
	}

	static public function AddMenuItem() {
		$mp = add_menu_page( self::PLUGIN_MENU_TITLE, self::PLUGIN_MENU_NAME, 'manage_options', self::PLUGIN_FULL_VERSION, array(
			'GFontsEngine',
			'FullVersion'
		) );
		add_submenu_page( self::PLUGIN_FULL_VERSION, __( 'Commercial Usage', self::PLUGIN_SLUG ), __( 'Commercial Usage', self::PLUGIN_SLUG ), 'manage_options', self::PLUGIN_FULL_VERSION, array(
			'GFontsEngine',
			'FullVersion'
		) );
		add_submenu_page( self::PLUGIN_FULL_VERSION, __( 'Contact', self::PLUGIN_SLUG ), __( 'Contact', self::PLUGIN_SLUG ), 'manage_options', self::PLUGIN_CONTACT, array(
			'GFontsEngine',
			'AuthorContact'
		) );
		add_submenu_page( self::PLUGIN_FULL_VERSION, __( 'Fonts', self::PLUGIN_SLUG ), __( 'Fonts', self::PLUGIN_SLUG ), 'manage_options', self::PLUGIN_SLUG, array(
			'GFontsEngine',
			'MainOptions'
		) );
		add_submenu_page( self::PLUGIN_FULL_VERSION, __( 'Title Presets & Tools', self::PLUGIN_SLUG ), __( 'Title Presets & Tools', self::PLUGIN_SLUG ), 'manage_options', self::PLUGIN_CUSTOM_TITLE_PRESETS, array(
			'GFontsEngine',
			'CustomTitlePresets'
		) );
		add_submenu_page( self::PLUGIN_FULL_VERSION, __( 'Social Settings', self::PLUGIN_SLUG ), __( 'Social Settings', self::PLUGIN_SLUG ), 'manage_options', self::PLUGIN_SOCIAL_BUTTONS_SETTINGS, array(
			'GFontsEngine',
			'SocialSettings'
		) );
		add_submenu_page( self::PLUGIN_FULL_VERSION, __( 'Polls', self::PLUGIN_SLUG ), __( 'Polls', self::PLUGIN_SLUG ), 'manage_options', self::PLUGIN_POLLS, array(
			'GFontsEngine',
			'Polls'
		) );
		add_submenu_page( self::PLUGIN_FULL_VERSION, __( 'Theme Customization', self::PLUGIN_SLUG ), __( 'Theme Customization', self::PLUGIN_SLUG ), 'manage_options', 'customize.php' );
		add_submenu_page( self::PLUGIN_FULL_VERSION, __( 'Theme Layouts', self::PLUGIN_SLUG ), __( 'Theme Layouts', self::PLUGIN_SLUG ), 'manage_options', self::PLUGIN_THEME_LAYOUTS, array(
			'GFontsEngine',
			'ThemeLayouts'
		) );
		add_submenu_page( self::PLUGIN_FULL_VERSION, __( 'Help', self::PLUGIN_SLUG ), __( 'Help', self::PLUGIN_SLUG ), 'manage_options', 'gf_help', array(
			'GFontsEngine',
			'GoogleFontsHelp'
		) );
	}

	static function GoogleFontsHelp() {
		header( 'Location: http://goo.gl/cZiwCd' );
		exit();
	}

	static public function MainOptions() {
		self::DrawFontTabs();

		if ( isset( $_GET['act'] ) && $_GET['act'] == 'update' ) {
			self::InstallFonts();
		}
		if ( isset( $_GET['actio'] ) ) {
			switch ( $_GET['actio'] ) {
				case self::PLUGIN_FONT_LIST:
					self::FontList();
					break;
				case self::PLUGIN_FONT_STATS:
					self::FontStats();
					break;
				case self::PLUGIN_FONT_SIZE:
					self::FontSize();
					break;
			}
		} else {

			print "<div class='wrap'>";
			//screen_icon();
			print "<h2>" . __( 'Google Fonts Options', self::PLUGIN_SLUG ) . "</h2>";
			print "<form method=\"post\" action=\"options.php\"> ";
			settings_fields( self::PLUGIN_SLUG );
			do_settings_fields( self::PLUGIN_SLUG, '' );
			?>
			<?php
			$upstatus = (bool) get_option( self::PLUGIN_OPTION_FONT_UPDATE_STATE );
			$txt      = __( 'Last font update', GFontsEngine::PLUGIN_SLUG ) . "&nbsp; " . get_option( self::PLUGIN_OPTION_FONT_UPDATE_DATE ) . "&nbsp;finished with status: "
			            . ( $upstatus ? __( 'Success', self::PLUGIN_SLUG ) : __( 'Error', self::PLUGIN_SLUG ) )
			            . "<br/>" . sprintf( __( 'There is %s available fonts', self::PLUGIN_SLUG ), self::AvailableFontCount() )
			            . "<br/>"
			            . "<a href=\"admin.php?page=" . self::PLUGIN_SLUG . "&act=update\">" . __( 'Update now!', self::PLUGIN_SLUG ) . "</a>";
			GFontsUI::Notice( $txt );
			?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><b><?php print __( "Available Google Fonts", self::PLUGIN_SLUG ); ?></b></th>
                </tr>
                <tr valign="top">
                    <td><strong><?php _e( 'Select font', self::PLUGIN_SLUG ) ?>&nbsp;(<span id="fono"><?php echo self::AvailableFontCount() ?></span>&nbsp;<?php _e( "items", self::PLUGIN_SLUG ) ?>)</strong>&nbsp;<select name="<?php echo self::PLUGIN_OPTION_FONTLIST; ?>" id="<?php echo self::PLUGIN_OPTION_FONTLIST; ?>" style="width: 350px;"><?php echo self::AvailableFontListAsHtmlOptions() ?></select>
                        <strong><?php _e( 'or search font by name (or part of name)', self::PLUGIN_SLUG ); ?></strong>&nbsp;<input type="text" id="search_font" style="width: 250px;"></td>
                </tr>

            </table>
            </form>
            <div style="margin-top: 20px;">
                <button class="button button-primary" onclick="return ShowPreview();"><?php _e( 'Show example', self::PLUGIN_SLUG ); ?></button>&nbsp;&nbsp;
                <button class="button button-primary" onclick="return ShowPreviewForAll(1);"><?php _e( 'Show all fonts', self::PLUGIN_SLUG ); ?></button>&nbsp;&nbsp;
                <?php _e( 'Preview font size', self::PLUGIN_SLUG ); ?>&nbsp;<input type="text" id="preview_fontsize" value="18" />&nbsp;px&nbsp;&nbsp;
                <?php _e( 'Preview text', self::PLUGIN_SLUG ); ?>&nbsp;<input type="text" id="preview_text" value="Grumpy wizards make toxic brew for the evil Queen and Jack" style="width: 500px;"/>
                <br/><br/>
                <input type="checkbox" name="gf_autopreview" id="gf_autopreview" checked="true"/><label for="gf_autopreview"><?php _e( 'Auto preview', self::PLUGIN_SLUG ) ?></label>
                <br/><br/>
                <div id="example_area" style="display: none; margin: 15px;">

                </div>
                <div id="loader_area" style="display: none;">
                    <center>
                        <img src="<?php print PLUGIN_URL . 'assets/loader.gif' ?>" />
                        <br/>
                        <?php _e( 'Please wait for preview...', self::PLUGIN_SLUG ); ?>
                    </center>
                </div>
            </div>
            <?php
			//submit_button(__("Update settings"));

			self::PrintVariantsAndCharactersAsJavascript();
			wp_enqueue_script( 'jquery-ui-autocomplete' );

			wp_register_script( 'gf-jquery-entersubmit', PLUGIN_URL . 'js/jquery.entersubmit.js', false );
			wp_register_script( 'gf-jquery-selectfilter', PLUGIN_URL . 'js/jquery.selectfilter.js', false );
			wp_register_script( 'gf-backend', PLUGIN_URL . 'js/backend.js', false );

			wp_enqueue_script( 'gf-jquery-entersubmit' );
			wp_enqueue_script( 'gf-jquery-selectfilter' );
			wp_enqueue_script( 'gf-backend' );

			print '<script type="text/javascript">';
			print "jQuery(document).ready(function() {";
			print "	SetValuesForCurrentFont();";
			print "	jQuery('#gfonts_list').change(function() {";
			print "		SetValuesForCurrentFont();";
			print "	});";
			print "	";
			print "	jQuery('#search_font').textfilter({";
			print "	   select_id : \"#gfonts_list\", ondemand: false, count_output: true, count_output_placeholder: \"#fono\"";
			print "	});";
			print "});";
			print "</script>";

			$fonts = self::AllAvailableFontNames();
			print "<script>";
			print "  jQuery(document).ready(function() {";
			print "	var availableFonts = [";
			foreach ( $fonts as $font ) {
				printf( "	  \"%s\",", $font );
			}
			print "	];";
			print "	jQuery( \"#search_font\" ).autocomplete({";
			print "	  source: availableFonts,minLength: 0";
			print "	});";
			print "	jQuery('#preview_text, #preview_fontsize').entersubmit(function() { return ShowPreview(); });";
			print "  });";
			print "  </script>";
		}
	}

	static public function ManageFontSelection( $btns ) {
		array_push( $btns, 'fontselect' );
		array_push( $btns, 'fontsizeselect' );

		return $btns;
	}

	static public function ManageTinyMceFonts( $config ) {

		$extraFonts      = GFontsDB::GetInstalledFonts();
		$additionalFonts = '';
		$contentCssArray = array();
		$contentCss      = null;
		$families        = array();
		$variants        = array();
		if ( $extraFonts ) {
			foreach ( $extraFonts as $item ) {
				$fname = sprintf( "%s %s", $item->name, self::TranslateVariantName( $item->variant ) );
				//$additionalFonts .= sprintf('%s=%s, sans-serif;font-weight: %s; font-style: %s;', $fname, $item->name, self::TranslateVariantNameToWeight($item->variant), self::TranslateVariantToFontStyle($item->variant));
				if ( ! in_array( $item->name, $families ) ) {
					$families[] = $item->name;
					$additionalFonts .= sprintf( '%s=\'%s\', sans-serif;', $item->name, $item->name ); //, self::TranslateVariantNameToWeight($item->variant), self::TranslateVariantToFontStyle($item->variant));
				}
				$variants[ $item->name ][] = $item->variant;
			}
			foreach ( $families as $family ) {
				foreach ( $variants[ $family ] as $variant ) {
					$contentCssArray[] = sprintf( '//fonts.googleapis.com/css?family=%s:%s', str_replace( ' ', '+', $family ), $variant );
				}
			}
		}
		$contentCss = implode( ",", $contentCssArray );

		$additionalFonts .= 'Andale Mono=Andale Mono, Times;';
		$additionalFonts .= 'Arial=Arial, Helvetica, sans-serif;';
		$additionalFonts .= 'Arial Black=Arial Black, Avant Garde;';
		$additionalFonts .= 'Book Antiqua=Book Antiqua, Palatino;';
		$additionalFonts .= 'Comic Sans MS=Comic Sans MS, sans-serif;';
		$additionalFonts .= 'Courier New=Courier New, Courier;';
		$additionalFonts .= 'Georgia=Georgia, Palatino;';
		$additionalFonts .= 'Helvetica=Helvetica;';
		$additionalFonts .= 'Impact=Impact, Chicago;';
		$additionalFonts .= 'Symbol=Symbol;';
		$additionalFonts .= 'Tahoma=Tahoma, Arial, Helvetica, sans-serif;';
		$additionalFonts .= 'Terminal=Terminal, Monaco;';
		$additionalFonts .= 'Times New Roman=Times New Roman, Times;';
		$additionalFonts .= 'Trebuchet MS=Trebuchet MS, Geneva;';
		$additionalFonts .= 'Verdana=Verdana, Geneva;';
		$additionalFonts .= 'Webdings=Webdings;';
		$additionalFonts .= 'Wingdings=Wingdings, Zapf Dingbats';

		$config['editor_selector']      = 'tinymce-textarea';
		$config['theme_advanced_fonts'] = $additionalFonts;
		$config['font_formats']         = $additionalFonts;
		$config['content_css'] .= $contentCss;
		//$config['wordpress_adv_hidden'] = false;
		if (
			isset( $config['theme_advanced_buttons1'] ) &&
			strpos( $config['theme_advanced_buttons1'], 'fontsizeselect' ) === false
		) {
			$config['theme_advanced_buttons1'] .= ',fontsizeselect';
		}
		if (
			isset( $config['theme_advanced_buttons1'] ) &&
			strpos( $config['theme_advanced_buttons1'], 'fontselect' ) === false
		) {
			$config['theme_advanced_buttons1'] .= ',fontselect';
		}
		if ( get_option( self::PLUGIN_OPTION_FONT_SIZE_ENABLED ) == true ) {
			if ( isset( $config['theme_advanced_buttons1'] ) ) {
				$config['theme_advanced_buttons1'] = $config['theme_advanced_buttons1'] . ',fontsizeselect';
			}
			$config['theme_advanced_font_sizes'] = self::BuildFontSizes();
			$config['fontsize_formats']          = str_replace(
				',', ' ', GFontsEngine::BuildFontSizes()
			);
		}

		return $config;
	}

	static public function IncludeCssForFonts( $output = false ) {
		$extraFonts = GFontsDB::GetInstalledFonts();
		if ( $extraFonts ) {
			$list    = $extraFonts;
			$fonts   = array();
			$cnt     = 0;
			$subsets = array();
			foreach ( $list as $item ) {
				if ( ( trim( $item->name ) != '' ) ) {
					$fonts[ $cnt ][] = str_replace( ' ', '+', trim( $item->name ) ) . ':' . str_replace( 'regular', '400', $item->variant );
					$subset          = explode( ",", $item->subsets );
					foreach ( $subset as $sub ) {
						if ( trim( $sub ) != '' && ! in_array( $sub, $subsets ) ) {
							$subsets[] = $sub;
						}
					}
					if ( count( $fonts[ $cnt ] ) == 20 ) {
						$cnt ++;
					}
				}
			}
			$cnt = 0;
			foreach ( $fonts as $fontspart ) {
				$lnk = '//fonts.googleapis.com/css?family=' . implode( "|", $fontspart ) . '&subset=' . implode( ",", $subsets );
				if ( ! $output ) {
					//wp_register_style('googleWebFonts', '//fonts.googleapis.com/css?family=' . implode("|", $fonts));
					add_filter( 'style_loader_tag', array(
						'GFontsEngine',
						'GfUrlFilter'
					), 1000, 2 );
					wp_enqueue_style( 'googleWebFonts' . $cnt, $lnk, null, '2' );
					remove_filter( 'style_loader_tag', array(
						'GFontsEngine',
						'GfUrlFilter'
					) );
				} else {
					print "<link href='" . $lnk . "' rel='stylesheet' type='text/css'>";
				}
				$cnt ++;
			}
		}
	}

	static public function GfUrlFilter( $tag = null, $handle = null ) {
		if ( $handle == 'googleWebFonts' ) {
			$tag = str_replace( '#038;', '', $tag );
			$tag = str_replace( '%3A', ':', $tag );
			$tag = str_replace( '%2C', ',', $tag );
			$tag = str_replace( '%7C', '|', $tag );
		}

		return $tag;
	}

	static public function InstallFonts() {
		$content = wp_remote_get( 'http://powerposts.net/fonts/fonts.php ' );
		$error   = is_wp_error( $content );
		if ( $error ) {
			update_option( self::PLUGIN_OPTION_FONT_UPDATE_STATE, - 1 );
			update_option( self::PLUGIN_OPTION_FONT_UPDATE_STATE_MESSAGE, __( 'There was an error during fetching fonts update.' ) );
			update_option( self::PLUGIN_OPTION_FONT_UPDATE_DATE, date( "Y-m-d H:i:s" ) );
		} else {
			$json = json_decode( $content['body'] );
			if ( isset( $json->kind ) && $json->kind == 'webfonts#webfontList' ) {
				$fontsArray = array();
				foreach ( $json->items as $item ) {
					if ( isset( $item->kind ) && $item->kind == 'webfonts#webfont' ) {
						$fontItem         = array();
						$fontItem['name'] = $item->family;
						foreach ( $item->variants as $variant ) {
							$fontItem['variants'][] = $variant;
						}
						foreach ( $item->subsets as $subset ) {
							$fontItem['subsets'][] = $subset;
						}
						$fontsArray[] = $fontItem;
						foreach ( $fontItem['variants'] as $_variant ) {
							GFontsDB::InstallFont(
								$item->family, $_variant, implode( ',', $fontItem['subsets'] ), true
							);
						}
					}
				}

				update_option( self::PLUGIN_OPTION_FONT_DATABASE, serialize( $fontsArray ) );
				update_option( self::PLUGIN_OPTION_FONT_UPDATE_STATE, 1 );
				update_option( self::PLUGIN_OPTION_FONT_UPDATE_STATE_MESSAGE, null );
				update_option( self::PLUGIN_OPTION_FONT_UPDATE_DATE, date( "Y-m-d H:i:s" ) );
			}
		}
	}

	static public function AvailableFontListAsHtmlOptions() {
		$serializedItems = get_option( self::PLUGIN_OPTION_FONT_DATABASE );
		if ( ! $serializedItems ) {
			return null;
		} else {
			if ( is_array( $serializedItems ) ) {
				$items = $serializedItems;
			} else {
				$items = unserialize( $serializedItems );
			}
			$options = array();
			if ( is_array( $items ) ) {
				foreach ( $items as $item ) {
					$options[] = sprintf( '<option value="%s">%s</option>', $item['name'], $item['name'] );
				}
			}

			return implode( "\n", $options );
		}
	}

	static public function AllAvailableFontNames() {
		$serializedItems = get_option( self::PLUGIN_OPTION_FONT_DATABASE );
		if ( ! $serializedItems ) {
			return null;
		} else {
			if ( is_array( $serializedItems ) ) {
				$items = $serializedItems;
			} else {
				$items = unserialize( $serializedItems );
			}
			$names = array();
			if ( is_array( $items ) ) {
				foreach ( $items as $item ) {
					$names[] = $item['name'];
				}
			}

			return $names;
		}
	}

	static public function AvailableFontCount() {
		$serializedItems = get_option( self::PLUGIN_OPTION_FONT_DATABASE );
		if ( ! $serializedItems ) {
			return 0;
		} else {
			if ( is_array( $serializedItems ) ) {
				$items = $serializedItems;
			} else {
				$items = unserialize( $serializedItems );
			}
			if ( is_array( $items ) ) {
				return count( $items );
			} else {
				return 0;
			}
		}
	}

	static public function PrintVariantsAndCharactersAsJavascript() {
		$serializedItems = get_option( self::PLUGIN_OPTION_FONT_DATABASE );
		if ( $serializedItems ) {
			print '<script type="text/javascript">' . "\n";
			print 'var gFontsVariants = new Array();' . "\n";
			print 'var gFontsSubsets = new Array();' . "\n";
			$items = unserialize( $serializedItems );
			foreach ( $items as $item ) {
				$variants = $item['variants'];
				$subsets  = $item['subsets'];
				$v        = array();
				$s        = array();
				foreach ( $variants as $var ) {
					$v[] = "'" . $var . "'";
				}
				foreach ( $subsets as $subset ) {
					$s[] = "'" . $subset . "'";
				}
				print "gFontsVariants['" . $item['name'] . "'] = new Array(" . implode( ",", $v ) . ");\n";
				print "gFontsSubsets['" . $item['name'] . "'] = new Array(" . implode( ",", $s ) . ");\n";
			}
			print '</script>';
		}
	}

	static public function ShowPreview() {
		$serializedItems = get_option( self::PLUGIN_OPTION_FONT_DATABASE );
		if ( ! $serializedItems ) {
			echo '<span style="color: red;">' . __( 'Could not find font list. Consider updating database?', self::PLUGIN_SLUG ) . '</span>';
			die();
		} else {
			$items = unserialize( $serializedItems );
			if ( is_array( $items ) ) {
				foreach ( $items as $item ) {
					if ( $item['name'] == $_POST['font'] ) {
						// output of css
						$cssUrl = '//fonts.googleapis.com/css?family=' . str_replace( ' ', '+', $item['name'] );
						$cssUrl .= ':';
						$variants = array( 'regular' ); //$item['variants'];
						$cssUrl .= implode( ",", $variants );
						$subsets = $item['subsets'];
						if ( count( $subsets ) > 1 ) {
							$cssUrl .= '&subset=' . implode( ',', $subsets );
						}
						print '<style type="text/css">
/* <![CDATA[ */
@import url(' . $cssUrl . ');
/* ]]> */
</style>';
						$fontsize = (int) $_POST['size'];
						if ( $fontsize == 0 ) {
							$fontsize = 18;
						}
						$text           = ( isset( $_POST['text'] ) ) ? $_POST['text']
							: 'Grumpy wizards make toxic brew for the evil Queen and Jack';
						$installedFonts = GFontsDB::GetInstalledFonts();
						foreach ( $variants as $variant ) {
							$class = self::TranslateVariantToCSS( $item['name'], $variant );
							printf( '<div style="padding-bottom: 5px; font-size: %spx; %s">%s - %s</div>%s<br/><br/>', $fontsize, $class, $variant, $text, self::CheckIsInstalled( $item['name'], $variant, $installedFonts ) );
							printf( '<div style="padding-bottom: 5px; font-size: %spx; %s"><b>%s - %s</b></div><br/>', $fontsize, $class, 'bold', $text );
							printf( '<div style="padding-bottom: 5px; font-size: %spx; %s"><em>%s - %s</em></div><br/>', $fontsize, $class, 'italic', $text );
						}
						die();
					}
				}
			}

			echo '<span style="color: red;">' . __( 'Could not find specified font. Consider updating database?', self::PLUGIN_SLUG ) . '</span>';
			die();
		}
	}

	static public function TranslateVariantToCSS( $fontname, $variant ) {
		$css = "font-family: " . $fontname . ';';
		if ( strpos( $variant, 'italic' ) !== false ) {
			$css .= ' font-style: italic;';
		}

		$v = (int) $variant;
		if ( $v == 0 ) {
			$v = 400;
		}
		$css .= ' font-weight: ' . $v . ';';

		return $css;
	}

	static public function TranslateVariantName( $variant ) {
		$name = $variant;
		switch ( $variant ) {
			case '100':
				$name = 'Thin 100';
				break;
			case '100italic':
				$name = 'Thin 100 Italic';
				break;
			case '200':
				$name = 'Extra-Light 200';
				break;
			case '200italic':
				$name = 'Extra-Light 200 Italic';
				break;
			case '300':
				$name = 'Light 300';
				break;
			case '300italic':
				$name = 'Light 300 Italic';
				break;
			case 'regular':
				$name = 'Normal 400';
				break;
			case 'italic':
				$name = 'Normal 400 Italic';
				break;
			case '500':
				$name = 'Medium 500';
				break;
			case '500italic':
				$name = 'Medium 500 Italic';
				break;
			case '600':
				$name = 'Semi-Bold 600';
				break;
			case '600italic':
				$name = 'Semi-Bold 600 Italic';
				break;
			case '700':
				$name = 'Bold 700';
				break;
			case '700italic':
				$name = 'Bold 700 Italic';
				break;
			case '800':
				$name = 'Extra-Bold 800';
				break;
			case '800italic':
				$name = 'Extra-Bold 800 Italic';
				break;
			case '900':
				$name = 'Ultra-Bold 900';
				break;
			case '900italic':
				$name = 'Ultra-Bold 900 Italic';
				break;
		}

		return $name;
	}

	static public function ShowPreviewForAll() {
		$serializedItems = get_option( self::PLUGIN_OPTION_FONT_DATABASE );
		if ( ! $serializedItems ) {
			echo '<span style="color: red;">' . __( 'Could not find font list. Consider updating database?', self::PLUGIN_SLUG ) . '</span>';
			die();
		} else {
			$items    = unserialize( $serializedItems );
			$limit    = 25;
			$page     = isset( $_POST['page'] ) ? (int) $_POST['page'] : 1;
			$offset   = ( $page - 1 ) * $limit;
			$number   = $page * $limit;
			$maxpages = ceil( (float) ( count( $items ) / $limit ) );
			$index    = 0;
			print '<input type="hidden" id="gfpage" value="' . $page . '"/>';
			self::ShowPreviewForAllPaginator( $page, $maxpages );
			$installedFonts = GFontsDB::GetInstalledFonts();
			foreach ( $items as $item ) {
				// output of css
				if ( ( $index < $number ) && ( $index >= $offset ) ) {
					$cssUrl = '//fonts.googleapis.com/css?family=' . str_replace( ' ', '+', $item['name'] );
					$cssUrl .= ':';
					$variants = array( 'regular' );
					$item['variants'];
					$cssUrl .= implode( ",", $variants );
					$subsets = $item['subsets'];
					if ( count( $subsets ) > 1 ) {
						$cssUrl .= '&subset=' . implode( ',', $subsets );
					}
					print '<style type="text/css">
/* <![CDATA[ */
@import url(' . $cssUrl . ');
/* ]]> */
</style>';
					$fontsize = (int) $_POST['size'];
					if ( $fontsize == 0 ) {
						$fontsize = 18;
					}
					$text = ( isset( $_POST['text'] ) ) ? $_POST['text'] : 'Grumpy wizards make toxic brew for the evil Queen and Jack';
					foreach ( $variants as $variant ) {
						$class = self::TranslateVariantToCSS( $item['name'], $variant );
						printf( '<div style="padding-bottom: 5px; font-size: %spx; %s">%s - %s</div>%s<br/><br/>', $fontsize, $class, $variant, $text, self::CheckIsInstalled( $item['name'], $variant, $installedFonts ) );
						printf( '<div style="padding-bottom: 5px; font-size: %spx; %s"><b>%s - %s</b></div><br/>', $fontsize, $class, 'bold', $text );
						printf( '<div style="padding-bottom: 5px; font-size: %spx; %s"><em>%s - %s</em></div><br/>', $fontsize, $class, 'italic', $text );
					}

					print '<hr style="margin-top: 10px; margin-bottom: 10px;"/>';
				}
				$index ++;
			}
			self::ShowPreviewForAllPaginator( $page, $maxpages );
			die();
		}
	}

	static public function ShowPreviewForAllPaginator( $page, $maxpages ) {
		$ten    = ceil( $page / 10 );
		$maxten = ceil( $maxpages / 10 );

		print '<div style="height: 100px;"><center>';
		printf( __( 'Page <b>%d</b> of <b>%d</b>', self::PLUGIN_SLUG ), $page, $maxpages );
		print( "<br/><br/>" );

		$first = __( 'First', self::PLUGIN_SLUG );
		echo '<button class="button button-primary" onclick="return ShowPreviewForAll(1);" style="margin-right: 10px;">' . $first . '</button>';

		if ( $ten > 1 ) {
			$prev = __( 'Previous', self::PLUGIN_SLUG );
			echo '<button class="button button-primary" onclick="return ShowPreviewForAll(' . ( ( $ten - 1 ) * 10 ) . ');" style="margin-right: 20px;">' . $prev . '</button>';
		}
		for ( $i = 1; $i <= 10; $i ++ ) {
			$pg = ( $i + ( $ten - 1 ) * 10 );
			if ( $pg <= $maxpages ) {
				$clr = '';
				if ( $pg == $page ) {
					$clr = "color: #100027; font-weight: bold;";
				}
				echo '<button class="button button-primary" style="margin-right: 10px;' . $clr . '" onclick="return ShowPreviewForAll(' . $pg . ');">' . ( $i + ( $ten - 1 ) * 10 ) . '</button>';
			}
		}

		if ( $ten < $maxten ) {
			$next = __( 'Next', self::PLUGIN_SLUG );
			echo '<button class="button button-primary" onclick="return ShowPreviewForAll(' . ( $i + ( $ten - 1 ) * 10 ) . ');" style="margin-left: 10px; margin-bottom: 50px;">' . $next . '</button>';
		}

		$last = __( 'Last', self::PLUGIN_SLUG );
		echo '<button class="button button-primary" onclick="return ShowPreviewForAll(' . $maxpages . ');" style="margin-left: 10px;">' . $last . '</button>';

		print '</center>';
		print '</div>';
	}

	static public function InstallFont() {
		self::InstallOrUninstallFont( true );
	}

	static public function UninstallFont() {
		self::InstallOrUninstallFont( false );
	}

	static public function InstallOrUninstallFont( $install ) {
		$count = GFontsDB::CountFonts();
		if ( $install && $count >= 10 ) {
			echo '<span style="color: red;">' . __( 'You can install maximum 10 fonts with Free Version. If you need more please purchase PRO. <a href="http://powerposts.net" target="_blank" >Click here for PRO</a>', self::PLUGIN_SLUG ) . '</span>';
			die();
		}
		$serializedItems = get_option( self::PLUGIN_OPTION_FONT_DATABASE );
		if ( ! $serializedItems ) {
			echo '<span style="color: red;">' . __( 'Could not find font list. Consider updating database?', self::PLUGIN_SLUG ) . '</span>';
			die();
		} else {
			$fontname = isset( $_POST['name'] ) ? $_POST['name'] : false;
			if ( $fontname === false ) {
				echo '<span style="color: red;">' . __( 'Font name is not set.', self::PLUGIN_SLUG ) . '</span>';
				die();
			}
			$items = unserialize( $serializedItems );
			foreach ( $items as $item ) {
				if ( $item['name'] == $fontname ) {
					$variant = isset( $_POST['variant'] ) ? $_POST['variant'] : false;
					if ( $variant === false ) {
						echo '<span style="color: red;">' . __( 'Font variant is not set.', self::PLUGIN_SLUG ) . '</span>';
						die();
					} else {
						if ( $install ) {
							$usedin = GFontsDB::InstallFont( $fontname, $variant, implode( ",", $item['subsets'] ) );
						} else {
							$usedin = GFontsDB::UninstallFont( $fontname, $variant, implode( ",", $item['subsets'] ) );
						}
						$usedtext = "";
						if ( $usedin > 0 ) {
							$usedtext = ' (' . sprintf( _n( 'used in %d post', 'used in %d posts', $usedin, self::PLUGIN_SLUG ), $usedin ) . ')';
						}
						if ( $install ) {
							printf( '<a href="#" onclick="return GfUninstallFont(\'%s\', \'%s\', this);">%s %s %s%s</a>', $fontname, $variant, __( 'Uninstall', self::PLUGIN_SLUG ), $fontname, $variant, $usedtext );
						} else {
							printf( '<a href="#" onclick="return GfInstallFont(\'%s\', \'%s\', this);">%s %s %s%s</a>', $fontname, $variant, __( 'Install', self::PLUGIN_SLUG ), $fontname, $variant, $usedtext );
						}
						die();
					}
				}
			}

			echo '<span style="color: red;">' . __( 'Could not find specified font.', self::PLUGIN_SLUG ) . '</span>';
			die();
		}
	}

	static public function CheckIsInstalled( $name, $variant, $installedFonts ) {
		foreach ( $installedFonts as $if ) {
			if ( ( $if->name == $name ) && ( $if->variant == $variant ) ) {
				return sprintf( '<span id="%s"><a href="#" onclick="return GfUninstallFont(\'%s\', \'%s\', this)">%s %s %s</a></span>', md5( $name . ':' . $variant ), $name, $variant, __( 'Uninstall', self::PLUGIN_SLUG ), $name, $variant );
			}
		}

		return sprintf( '<span id="%s"><a href="#" onclick="return GfInstallFont(\'%s\', \'%s\', this)">%s %s %s</a></span>', md5( $name . ':' . $variant ), $name, $variant, __( 'Install', self::PLUGIN_SLUG ), $name, $variant );
	}

	static public function FontList() {
		print "<div class='wrap'>";
		print "<h2>" . __( 'Google Fonts - List of installed fonts', self::PLUGIN_SLUG ) . "</h2>";

		if ( isset( $_GET['act'] ) && $_GET['act'] == 'uninstall' ) {
			$fid = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : false;
			if ( is_int( $fid ) ) {
				GFontsDB::UninstallFontById( $fid );
				GFontsUI::Success( __( 'Font uninstalled succesfully.', self::PLUGIN_SLUG ) );
			}
		}

		if ( isset( $_GET['act'] ) && $_GET['act'] == 'bulk' ) {
			$t = $_POST;
			switch ( $t['action'] ) {
				case 'uninstall':
					$fontArray = $t['font'];
					GFontsDB::UninstallFontByIdCollection( $fontArray );
					GFontsUI::Success( __( 'Fonts uninstalled succesfully.', self::PLUGIN_SLUG ) );
					break;
			}
		}

		if ( isset( $_GET['s'] ) && $_GET['s'] != '' ) {
			$nameFilter = strip_tags( trim( $_GET['s'] ) );
		} else {
			$nameFilter = '';
		}

		$orderby   = '';
		$direction = '';

		if ( isset( $_GET['orderby'] ) ) {
			switch ( $_GET['orderby'] ) {
				case 'usedin':
					$orderby = 'used_in_posts';
					break;
				case 'fontname':
					$orderby = 'name';
					break;
			}

			switch ( $_GET['order'] ) {
				case 'asc':
					$direction = 'asc';
					break;
				case 'desc':
					$direction = 'desc';
					break;
			}
		}

		if ( ! isset( $_GET['f'] ) ) {
			$installedFonts = GFontsDB::GetInstalledFonts( 0, $nameFilter, $orderby, $direction );
		} else {
			switch ( $_GET['f'] ) {
				case 'used':
					$installedFonts = GFontsDB::GetInstalledFonts( 1, $nameFilter, $orderby, $direction );
					break;
				case 'unused':
					$installedFonts = GFontsDB::GetInstalledFonts( 2, $nameFilter, $orderby, $direction );
					break;
			}
		}
		$stats = GFontsDB::GetInstalledFontsStats();
		print "<ul class='subsubsub'>";
		printf( "<li class='all'><a href='admin.php?%s' " . ( ! isset( $_GET['f'] )
				? "class=\"current\"" : "" ) . ">%s <span class=\"count\">(%d)</span></a> |</li>", 'page=' . self::PLUGIN_SLUG . '&actio=' . self::PLUGIN_FONT_LIST, __( 'All', self::PLUGIN_SLUG ), isset( $stats[2] )
			? $stats[2]->qty : 0 );
		printf( "<li class='used'><a href='admin.php?%s&f=used' " . ( ( isset( $_GET['f'] ) && ( $_GET['f'] == 'used' ) )
				? "class=\"current\"" : "" ) . ">%s <span class=\"count\">(%d)</span></a> |</li>", 'page=' . self::PLUGIN_SLUG . '&actio=' . self::PLUGIN_FONT_LIST, __( 'Used', self::PLUGIN_SLUG ), isset( $stats[0] )
			? $stats[0]->qty : 0 );
		printf( "<li class='unused'><a href='admin.php?%s&f=unused' " . ( ( isset( $_GET['f'] ) && ( $_GET['f'] == 'unused' ) )
				? "class=\"current\"" : "" ) . ">%s <span class=\"count\">(%d)</span></a></li>", 'page=' . self::PLUGIN_SLUG . '&actio=' . self::PLUGIN_FONT_LIST, __( 'Unused', self::PLUGIN_SLUG ), isset( $stats[1] )
			? $stats[1]->qty : 0 );
		print "</ul>";

		print "<form id=\"fonts-filter\" action=\"\" method=\"get\">";
		print "<p class=\"search-box\">";
		//printf("<label class=\"screen-reader-text\" for=\"font-search-input\">%s :</label>", __("Search fonts", self::PLUGIN_SLUG));
		printf( "<input type=\"search\" id=\"font-search-input\" name=\"s\" value=\"%s\" />", $nameFilter );
		printf( "<input type=\"submit\" name=\"\" id=\"search-submit\" class=\"button\" value=\"%s\"  />", __( "Search fonts", self::PLUGIN_SLUG ) );
		print "</p>";
		printf( "<input type=\"hidden\" name=\"page\" value=\"%s\" />", self::PLUGIN_SLUG );
		printf( "<input type=\"hidden\" name=\"actio\" value=\"%s\" />", self::PLUGIN_FONT_LIST );
		print "</form>";
		printf( "<form id=\"posts-filter\" action=\"admin.php?page=%s&actio=%s&act=bulk\" method=\"post\">", self::PLUGIN_SLUG, self::PLUGIN_FONT_LIST );
		print "<div class=\"tablenav top\">";
		print "<div class=\"alignleft actions\">";
		print "	<select name='action'>";
		printf( "		<option value='-1' selected='selected'>%s</option>", __( "Bulk actions", self::PLUGIN_SLUG ) );
		printf( "		<option value='uninstall'>%s</option>", __( "Uninstall", self::PLUGIN_SLUG ) );
		print "	</select>";
		print "<input type=\"submit\" name=\"\" id=\"doaction\" class=\"button action\" value=\"" . __( "Apply", self::PLUGIN_SLUG ) . "\"  />";
		print "</div>";
		$paginationcode = '';
		printf( "<div class='tablenav-pages'><span class=\"displaying-num\">%s</span>%s</div>", sprintf( _n( '%d font', '%d fonts', isset( $stats[2] )
			? $stats[2]->qty : 0 ), isset( $stats[2] ) ? $stats[2]->qty
			: 0 ), $paginationcode );
		print "</div>";
		self::IncludeCssForFonts( true );
		print '<table class="wp-list-table widefat fixed" cellspacing="0">';
		print '<thead>';
		print '<tr>';
		print '<th scope=\'col\' id=\'cb\' class=\'manage-column column-cb check-column\' style=""><label class="screen-reader-text" for="cb-select-all-1">' . __( 'Select all', self::PLUGIN_SLUG ) . '</label><input id="cb-select-all-1" type="checkbox" /></th>';
		print '<th scope=\'col\' id=\'fontname\' class=\'manage-column column-fontname sortable ' . self::GetCurrentOrder() . ' \' style=""><a href="' . admin_url( 'admin.php?page=' . self::PLUGIN_SLUG . '&actio=' . self::PLUGIN_FONT_LIST . '&orderby=fontname&order=' . self::GetOrderBy() ) . '"><span>' . __( 'Font', self::PLUGIN_SLUG ) . '</span><span class="sorting-indicator"></span></a></th>';
		print '<th scope=\'col\' id=\'usedin\' class=\'manage-column column-fontname sortable ' . self::GetCurrentOrder() . ' \' style=""><a href="' . admin_url( 'admin.php?page=' . self::PLUGIN_SLUG . '&actio=' . self::PLUGIN_FONT_LIST . '&orderby=usedin&order=' . self::GetOrderBy() ) . '"><span>' . __( 'Used in posts', self::PLUGIN_SLUG ) . '</span><span class="sorting-indicator"></span></a></th>';
		print '</tr>';
		print '</thead>';
		print '<tfoot>';
		print '<tr>';
		print '<th scope=\'col\' id=\'cb\' class=\'manage-column column-cb check-column\' style=""><label class="screen-reader-text" for="cb-select-all-1">' . __( 'Select all', self::PLUGIN_SLUG ) . '</label><input id="cb-select-all-1" type="checkbox" /></th>';
		print '<th scope=\'col\' id=\'fontname\' class=\'manage-column column-fontname sortable ' . self::GetCurrentOrder() . ' \' style=""><a href="' . admin_url( 'admin.php?page=' . self::PLUGIN_SLUG . '&actio=' . self::PLUGIN_FONT_LIST . '&orderby=fontname&order=' . self::GetOrderBy() ) . '"><span>' . __( 'Font', self::PLUGIN_SLUG ) . '</span><span class="sorting-indicator"></span></a></th>';
		print '<th scope=\'col\' id=\'usedin\' class=\'manage-column column-fontname sortable ' . self::GetCurrentOrder() . ' \' style=""><a href="' . admin_url( 'admin.php?page=' . self::PLUGIN_SLUG . '&actio=' . self::PLUGIN_FONT_LIST . '&orderby=usedin&order=' . self::GetOrderBy() ) . '"><span>' . __( 'Used in posts', self::PLUGIN_SLUG ) . '</span><span class="sorting-indicator"></span></a></th>';
		print '</tr>';
		print '</tfoot>';
		print '<tbody id="the-list">';

		foreach ( $installedFonts as $fnt ) {
			print '<tr id="fnt-' . $fnt->id . '" class="alternate iedit" valign="top" style="font-family: ' . $fnt->name . ';">';
			print '<th scope="row" class="check-column">';
			print '<label class="screen-reader-text" for="cb-select-' . $fnt->id . '">' . sprintf( '%s %s', __( 'Select', self::PLUGIN_SLUG ), $fnt->name ) . '</label>';
			print '<input id="cb-select-' . $fnt->id . '" type="checkbox" name="font[]" value="' . $fnt->id . '" />';
			print '<div class="locked-indicator"></div>';
			print '</th>';
			print '<td style="font-size: 17px;">';
			print '<strong>' . $fnt->name . '</strong>';
			print '<div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>';
			print '<div class="row-actions">';
			if ( $fnt->total_used == 0 ) {
				$onclick = '';
			} else {
				$txt     = sprintf( _n( 'This font is used in %d post. If you uninstall it this post will loose font styling.', 'This font is used in %d posts. If you uninstall it these posts will loose font styling.', $fnt->total_used ), $fnt->total_used );
				$onclick = sprintf( ' onclick="return confirm(\'%s\');"', $txt );
			}
			print '<span class=\'trash\'><a class=\'submitdelete\' title=\'' . __( 'Uninstall', self::PLUGIN_SLUG ) . '\' href=\'' . admin_url( 'admin.php?page=' . self::PLUGIN_SLUG . '&actio=' . self::PLUGIN_FONT_LIST . '&id=' . $fnt->id . '&act=uninstall' ) . '\'' . $onclick . '>' . __( 'Uninstall', self::PLUGIN_SLUG ) . '</a></span>';
			print '</div>';
			print '</td>';
			print '<td style="font-size: 17px;">';
			print '<strong>' . sprintf( _n( '%d post', '%d posts', $fnt->used_in_posts, self::PLUGIN_SLUG ), $fnt->used_in_posts ) . '</strong>';
			if ( $fnt->in_trash > 0 ) {
				print '&nbsp; + <strong>' . sprintf( _n( '%d post in trash', '%d posts in trash', $fnt->in_trash, self::PLUGIN_SLUG ), $fnt->in_trash ) . '</strong>';
			}
			if ( $fnt->total_used > 0 ) {
				print '<div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>';
				print '<div class="row-actions">';
				print '<span class=\'view\'><a title=\'' . __( 'View', self::PLUGIN_SLUG ) . '\' href=\'' . admin_url( 'edit.php?gfontfilter=1&gfid=' . $fnt->id ) . '\' target="_blank">' . __( 'View', self::PLUGIN_SLUG ) . '</a></span>';
				if ( $fnt->in_trash > 0 ) {
					print '&nbsp;|&nbsp;<span class=\'view\'><a title=\'' . __( 'View in trash', self::PLUGIN_SLUG ) . '\' href=\'' . admin_url( 'edit.php?post_status=trash&gfontfilter=1&gfid=' . $fnt->id ) . '\' target="_blank">' . __( 'View in trash', self::PLUGIN_SLUG ) . '</a></span>';
				}
				print '</div>';
			}
			print '</td>';
			print '</tr>';
		}
		print '</tbody>';
		print '</table>';
		print '</form>';
	}

	static public function GetOrderBy() {
		$order = 'asc';
		if ( isset( $_GET['order'] ) ) {
			$v = strtolower( $_GET['order'] );
			if ( $v == 'asc' ) {
				$order = 'desc';
			} else {
				$order = 'asc';
			}
		}

		return $order;
	}

	static public function GetCurrentOrder() {
		$order = '';
		if ( isset( $_GET['order'] ) ) {
			$order = $_GET['order'];
		}

		return $order;
	}

	static public function FilterPostsByFont( $where ) {
		if ( is_admin() ) {
			global $wpdb;

			if ( isset( $_GET['gfontfilter'] ) && ! empty( $_GET['gfid'] ) && intval( $_GET['gfid'] ) != 0 ) {
				$fntId = intval( $_GET['gfid'] );
				$where .= " AND ID IN (SELECT wp_post_id FROM {$wpdb->prefix}gf_font_post WHERE gf_fontlist_id=$fntId )";
			}
		}

		return $where;
	}

	static public function FilterPostsByNoFont( $q ) {
		if ( isset( $_GET['gfontfilter'] ) && isset( $_GET['nofont'] ) && ( $_GET['nofont'] == 1 ) ) {
			//$q->query_vars['meta_key'] = self::PLUGIN_META_NO_FONT;
			//$q->query['meta_value'] = 1;
			$q->set( 'meta_key', self::PLUGIN_META_NO_FONT );
			$q->set( 'meta_value', '1' );
		}
	}

	static public function AddFiltersToPostList() {
		global $post_type;
		if ( ( ( $post_type == 'page' || $post_type == 'post' ) ) && ( self::$editLoaded ) ) {
			print '<input type="hidden" name="gfontfilter" value="true" />';
			print '<select name="gfid" class="postform" style="width: 250px;">';
			print '<option value="0">' . __( 'Select font to filter', self::PLUGIN_SLUG ) . '</option>';
			$fnts = GFontsDB::GetFontsWithPosts();
			foreach ( $fnts as $fnt ) {
				$selected = "";
				if ( isset( $_GET['gfid'] ) ) {
					$gfid = intval( $_GET['gfid'] );
					if ( $gfid == $fnt->id ) {
						$selected = " selected";
					}
				}
				if ( isset( $_GET['post_status'] ) && ( $_GET['post_status'] == 'trash' ) ) {
					if ( $fnt->in_trash > 0 ) {
						print sprintf( '<option value="' . $fnt->id . '"%s>', $selected );
						if ( $fnt->gfont ) {
							print '(g) ';
						}
						printf( '%s (%s)', $fnt->name, sprintf( _n( '%d post', '%d posts', $fnt->in_trash, self::PLUGIN_SLUG ), $fnt->in_trash ) );
						print '</option>';
					}
				} else {
					if ( $fnt->used_in_posts > 0 ) {
						print sprintf( '<option value="' . $fnt->id . '"%s>', $selected );
						if ( $fnt->gfont ) {
							print '(g) ';
						}
						printf( '%s (%s)', $fnt->name, sprintf( _n( '%d post', '%d posts', $fnt->used_in_posts, self::PLUGIN_SLUG ), $fnt->used_in_posts ) );
						print '</option>';
					}
				}
			}
			print '</select>';
			printf( "<input type=\"checkbox\" id=\"nofont\" name=\"nofont\" value=\"1\"%s />&nbsp;<label for=\"nofont\">No fonts posts</label>&nbsp;", ( isset( $_GET['nofont'] ) && $_GET['nofont'] == 1 )
				? " checked" : "" );
			if ( isset( $_GET['nofont'] ) && $_GET['nofont'] == 1 ) {
				print "<script type=\"text/javascript\">";
				//print "	jQuery(function() {";
				print "		jQuery('#icon-edit').next().append('<br/>Filtered for posts without font.');";
				//print "	});";
				print "</script>";
			}
		}
	}

	static public function AddHelpToEditPhp() {
		self::$editLoaded = true;
		if ( function_exists( 'get_current_screen' ) ) {
			get_current_screen()->add_help_tab( array(
				'id'      => 'fontfilter',
				'title'   => __( 'Font Filter', self::PLUGIN_SLUG ),
				'content' =>
					'<p>' . __( 'You can filter post by used fonts.', self::PLUGIN_SLUG ) .
					'<p><strong><u>' . __( 'Font list is filtered only to items which are used not for all fonts.', self::PLUGIN_SLUG ) . '</u></strong></p>' .
					'<p>' . __( 'No fonts posts - filter only for posts without any font style.', self::PLUGIN_SLUG ) . '</p>'
			) );
		}
	}

	static public function TranslateVariantNameToWeight( $variant ) {
		$name = $variant;
		switch ( $variant ) {
			case 'regular':
				$name = '400';
				break;
			case 'italic':
				$name = '400';
				break;
		}

		$r = intval( $name );

		return $r;
	}

	static public function TranslateVariantToFontStyle( $variant ) {
		return ( strpos( $variant, 'italic' ) !== false ) ? 'italic' : 'normal';
	}

	static public function FontStats() {
		if ( isset( $_POST['act'] ) && $_POST['act'] == 'update' ) {
			print "<div id=\"accwait\" style=\"font-size: 36px; padding-top: 15px;\"><center><strong>" . __( "Wait, it may take a while...", self::PLUGIN_SLUG ) . "</strong><br/><br/>";
			print "<img src=\"" . PLUGIN_URL . "assets/loader.gif\"/></div>";
			ob_flush();
			GFontsDB::RecalculateStats();
			GFontsUI::Success( __( 'Stats recalculated successfully.', self::PLUGIN_SLUG ) );
			print "<script type=\"text/javascript\">jQuery('#accwait').hide();</script>";
		}

		if ( isset( $_GET['act'] ) && $_GET['act'] == 'replace' ) {
			$p = $_POST;
			if ( isset( $p['srcfont'] ) && isset( $p['dstfont'] ) ) {
				print "<div id=\"accwait\" style=\"font-size: 36px; padding-top: 15px;\"><center><strong>" . __( "Wait, it may take a while...", self::PLUGIN_SLUG ) . "</strong><br/><br/>";
				print "<img src=\"" . PLUGIN_URL . "assets/loader.gif\"/></div>";
				ob_flush();
				GFontsDB::ReplaceFont( $p['srcfont'], $p['dstfont'] );
				GFontsUI::Success( __( 'Fonts replaced successfully.', self::PLUGIN_SLUG ) );
				print "<script type=\"text/javascript\">jQuery('#accwait').hide();</script>";
			}
		}

		$count             = count( GFontsDB::GetInstalledFonts() );
		$allFonts          = self::AvailableFontCount();
		$postsWithoutFonts = self::CountPostsWithoutFonts();

		print "<div class='wrap'>";
		print "<h2>" . __( 'Google Fonts - WordPress Font Statistics & Tools', self::PLUGIN_SLUG ) . "</h2>";
		print "<h3 class=\"title\">" . __( 'General information', self::PLUGIN_SLUG ) . "</h3>";
		print "<table border=\"0\">";
		print "<tr>";
		print "<td style=\"width: 200px;\">" . __( 'Google Fonts available', self::PLUGIN_SLUG ) . "</td>";
		print "<th style=\"width: 100px;\" align=\"left\">" . $allFonts . "</th>";
		print "</tr>";
		print "<tr>";
		print "<td style=\"width: 200px;\">" . __( 'Google Fonts installed', self::PLUGIN_SLUG ) . "</td>";
		print "<th style=\"width: 100px;\" align=\"left\">" . $count . "</th>";
		print "</tr>";
		print "<tr>";
		print "<td style=\"width: 200px;\">" . __( 'Posts without any font', self::PLUGIN_SLUG ) . "</td>";
		print "<th style=\"width: 100px;\" align=\"left\">" . $postsWithoutFonts . "&nbsp;(<a href=\"edit.php?gfontfilter=true&nofont=1\">" . __( 'view', self::PLUGIN_SLUG ) . "</a>)</th>";
		print "</tr>";
		print "</table>";
		print "<div style=\"height: 20px;\"></div>";
		print "<form method=\"post\" action=\"admin.php?page=" . self::PLUGIN_SLUG . "&actio=" . self::PLUGIN_FONT_STATS . "\"><input type=\"hidden\" name=\"act\" value=\"update\"><button class=\"button button-primary\">" . __( 'Find and fix missing fonts', self::PLUGIN_SLUG ) . "</button></form>";

		if ( isset( $_GET['s'] ) && $_GET['s'] != '' ) {
			$nameFilter = strip_tags( trim( $_GET['s'] ) );
		} else {
			$nameFilter = '';
		}

		$orderby   = '';
		$direction = '';

		if ( isset( $_GET['orderby'] ) ) {
			switch ( $_GET['orderby'] ) {
				case 'usedin':
					$orderby = 'used_in_posts';
					break;
				case 'fontname':
					$orderby = 'name';
					break;
			}

			switch ( $_GET['order'] ) {
				case 'asc':
					$direction = 'asc';
					break;
				case 'desc':
					$direction = 'desc';
					break;
			}
		}

		$allFonts = GFontsDB::GetFontsWithPosts( $nameFilter, $orderby, $direction );

		print "<form id=\"fonts-filter\" action=\"\" method=\"get\">";
		print "<p class=\"search-box\">";
		printf( "<label class=\"screen-reader-text\" for=\"font-search-input\">%s :</label>", __( "Search fonts", self::PLUGIN_SLUG ) );
		printf( "<input type=\"search\" id=\"font-search-input\" name=\"s\" value=\"%s\" />", $nameFilter );
		printf( "<input type=\"submit\" name=\"\" id=\"search-submit\" class=\"button\" value=\"%s\"  />", __( "Search fonts", self::PLUGIN_SLUG ) );
		print "</p>";
		printf( "<input type=\"hidden\" name=\"page\" value=\"%s\" />", self::PLUGIN_SLUG );
		printf( "<input type=\"hidden\" name=\"actio\" value=\"%s\" />", self::PLUGIN_FONT_STATS );
		print "</form>";
		print "<div class=\"tablenav top\">";

		$paginationcode = '';
		printf( "<div class='tablenav-pages'><span class=\"displaying-num\">%s</span>%s</div>", sprintf( _n( '%d font', '%d fonts', count( $allFonts ) ), count( $allFonts ) ), $paginationcode );
		print "</div>";
		self::IncludeCssForFonts( true );
		print '<table class="wp-list-table widefat fixed" cellspacing="0">';
		print '<thead>';
		print '<tr>';
		print '<th width=\'50%\' scope=\'col\' id=\'fontname\' class=\'manage-column column-fontname sortable ' . self::GetCurrentOrder() . ' \' style=""><a href="' . admin_url( 'admin.php?page=' . self::PLUGIN_SLUG . '&actio=' . self::PLUGIN_FONT_STATS . '&orderby=fontname&order=' . self::GetOrderBy() ) . '"><span>' . __( 'Font', self::PLUGIN_SLUG ) . '</span><span class="sorting-indicator"></span></a></th>';
		print '<th width=\'50%\' scope=\'col\' id=\'usedin\' class=\'manage-column column-fontname sortable ' . self::GetCurrentOrder() . ' \' style=""><a href="' . admin_url( 'admin.php?page=' . self::PLUGIN_SLUG . '&actio=' . self::PLUGIN_FONT_STATS . '&orderby=usedin&order=' . self::GetOrderBy() ) . '"><span>' . __( 'Used in posts', self::PLUGIN_SLUG ) . '</span><span class="sorting-indicator"></span></a></th>';
		print '</tr>';
		print '</thead>';
		print '<tfoot>';
		print '<tr>';
		print '<th scope=\'col\' id=\'fontname\' class=\'manage-column column-fontname sortable ' . self::GetCurrentOrder() . ' \' style=""><a href="' . admin_url( 'admin.php?page=' . self::PLUGIN_SLUG . '&actio=' . self::PLUGIN_FONT_STATS . '&orderby=fontname&order=' . self::GetOrderBy() ) . '"><span>' . __( 'Font', self::PLUGIN_SLUG ) . '</span><span class="sorting-indicator"></span></a></th>';
		print '<th scope=\'col\' id=\'usedin\' class=\'manage-column column-fontname sortable ' . self::GetCurrentOrder() . ' \' style=""><a href="' . admin_url( 'admin.php?page=' . self::PLUGIN_SLUG . '&actio=' . self::PLUGIN_FONT_STATS . '&orderby=usedin&order=' . self::GetOrderBy() ) . '"><span>' . __( 'Used in posts', self::PLUGIN_SLUG ) . '</span><span class="sorting-indicator"></span></a></th>';
		print '</tr>';
		print '</tfoot>';
		print '<tbody id="the-list">';

		foreach ( $allFonts as $fnt ) {
			print '<tr id="fnt-' . $fnt->id . '" class="alternate iedit" valign="top" style="font-family: ' . $fnt->name . ';">';
			print '<td style="font-size: 17px;">';
			print '<strong>' . $fnt->name . '</strong>';
			print '<div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>';
			print '<div>'; // class="row-actions">';
			print "<form action=\"admin.php?page=" . self::PLUGIN_SLUG . "&actio=" . self::PLUGIN_FONT_STATS . "&act=replace\" method=\"post\" onsubmit=\"return confirm('Are you sure you want replace " . $fnt->name . " with selected font?');\">";
			print "<span style=\"font-size: 12px; font-family: Verdana;\">Replace this font with&nbsp;</span>";
			print "<select name=\"dstfont\" style=\"width: 200px; font-size: 12px; font-family: Verdana;\">";
			$avFonts = GFontsDB::GetFontsToReplace( $fnt->name );
			foreach ( $avFonts as $font ) {
				printf( "<option value=\"%s\" >%s</option>", $font, $font );
			}
			print "</select>";
			print "<input type=\"hidden\" name=\"srcfont\" value=\"" . $fnt->id . "\" />";
			print "<input type=\"submit\" value=\"Change!\" class=\"button button-primary\" style=\"font-size: 12px; font-family: Verdana;\"/>";
			print "</form>";
			print '</div>';
			print "<br/>";
			print '</td>';
			print '<td style="font-size: 17px;">';
			print '<strong>' . sprintf( _n( '%d post', '%d posts', $fnt->used_in_posts, self::PLUGIN_SLUG ), $fnt->used_in_posts ) . '</strong>';
			if ( $fnt->in_trash > 0 ) {
				print '&nbsp; + <strong>' . sprintf( _n( '%d post in trash', '%d posts in trash', $fnt->in_trash, self::PLUGIN_SLUG ), $fnt->in_trash ) . '</strong>';
			}
			if ( $fnt->total_used > 0 ) {
				print '<div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>';
				print '<div class="row-actions">';
				print '<span class=\'view\'><a title=\'' . __( 'View', self::PLUGIN_SLUG ) . '\' href=\'' . admin_url( 'edit.php?gfontfilter=1&gfid=' . $fnt->id ) . '\' target="_blank">' . __( 'View', self::PLUGIN_SLUG ) . '</a></span>';
				if ( $fnt->in_trash > 0 ) {
					print '&nbsp;|&nbsp;<span class=\'view\'><a title=\'' . __( 'View in trash', self::PLUGIN_SLUG ) . '\' href=\'' . admin_url( 'edit.php?post_status=trash&gfontfilter=1&gfid=' . $fnt->id ) . '\' target="_blank">' . __( 'View in trash', self::PLUGIN_SLUG ) . '</a></span>';
				}
				print '</div>';
			}
			print '</td>';
			print '</tr>';
		}
		print '</tbody>';
		print '</table>';
	}

	static public function CountPostsWithoutFonts() {
		$query = array(
			'posts_per_page'   => 20000000,
			'offset'           => 0,
			'category'         => '',
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => self::PLUGIN_META_NO_FONT,
			'meta_value'       => '1',
			'post_type'        => 'any',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'post_status'      => 'any',
			'suppress_filters' => true
		);
		$posts = get_posts( $query );

		return count( $posts );
	}

	static public function ContentSave( $content ) {
		$r   = $_REQUEST;
		$old = null;
		if ( isset( $r['post_ID'] ) && isset( $r['action'] ) ) {
			if ( $r['action'] == 'editpost' ) {
				$old = get_post( $r['post_ID'] );
			} elseif ( $r['action'] == 'autosave' ) {
				$old = get_post( $r['post_id'] );
			}
			if ( ( $old instanceof WP_Post ) || ( is_object( $old ) ) ) {
				$oldContent = $old->post_content;
				GFontsDB::ContentSave( $old->ID, $oldContent, $content );
			}
		}

		return $content;
	}

	static public function BeforeDelete( $postid ) {
		GFontsDB::PostDeleted( $postid );
	}

	static public function TrashedPost( $postid ) {
		GFontsDB::TrashedPost( $postid );
	}

	static public function UntrashedPost( $postid ) {
		GFontsDB::UntrashedPost( $postid );
	}

	static public function FontSize() {
		print "<div class='wrap'>";
		print "<h2>" . __( 'Fonts - enable extra font sizing', self::PLUGIN_SLUG ) . "</h2>";
		print "<h3 class=\"title\">" . __( 'By enabling this function you will be able to change font sizes in pixels', self::PLUGIN_SLUG ) . "</h3>";
		if ( @$_GET['settings-updated'] == 'true' ) {
			$min = get_option( self::PLUGIN_OPTION_FONT_SIZE_MINIMUM );
			$max = get_option( self::PLUGIN_OPTION_FONT_SIZE_MAXIMUM );
			if ( $min > $max ) {
				update_option( self::PLUGIN_OPTION_FONT_SIZE_MINIMUM, $max );
			}
			GFontsUI::Success( __( "Changes has been saved.", self::PLUGIN_SLUG ) );
		}
		print "<form method=\"post\" action=\"options.php\"> ";
		settings_fields( self::PLUGIN_SLUG );
		do_settings_fields( self::PLUGIN_SLUG, '' );
		?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><?php print __( "Enabled Extra Font Sizes", self::PLUGIN_SLUG ); ?></th>
				<td><input type="checkbox"
				           name="<?php echo self::PLUGIN_OPTION_FONT_SIZE_ENABLED ?>" <?php
					echo ( get_option( self::PLUGIN_OPTION_FONT_SIZE_ENABLED, true ) )
						? "checked" : "";
					?> /></td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php print __( "Min size (6px min)", self::PLUGIN_SLUG ); ?></th>
				<td><input type="text"
				           name="<?php echo self::PLUGIN_OPTION_FONT_SIZE_MINIMUM ?>"
				           value="<?php echo get_option( self::PLUGIN_OPTION_FONT_SIZE_MINIMUM, 6 ); ?>"/>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php print __( "Max size (48px max)", self::PLUGIN_SLUG ); ?></th>
				<td><input type="text"
				           name="<?php echo self::PLUGIN_OPTION_FONT_SIZE_MAXIMUM ?>"
				           value="<?php echo get_option( self::PLUGIN_OPTION_FONT_SIZE_MAXIMUM, 48 ); ?>"/>
				</td>
			</tr>

		</table>
		<?php
		submit_button( __( "Update options", self::PLUGIN_SLUG ) );
		print "</form></div>";
	}

	static public function BuildFontSizes() {
		$min = intval( get_option( self::PLUGIN_OPTION_FONT_SIZE_MINIMUM ) );
		if ( ( $min == 0 ) || ( $min < 6 ) ) {
			$min = 6;
		}
		$max = intval( get_option( self::PLUGIN_OPTION_FONT_SIZE_MAXIMUM ) );
		if ( ( $max == 0 ) || ( $max > 48 ) ) {
			$max = 48;
		}

		$fs = array();
//		$fs[] = '8pt';
//		$fs[] = '10pt';
//		$fs[] = '12pt';
//		$fs[] = '14pt';
//		$fs[] = '18pt';
//		$fs[] = '24pt';
//		$fs[] = '36pt';
		for ( $i = $min; $i <= $max; $i ++ ) {
			$fs[] = $i . "px";
		}

		return implode( ",", $fs );
	}

	static public function BuildFontSizesAsOptions( $v = null ) {
		$sizes         = self::BuildFontSizes();
		$sizesExploded = explode( ",", $sizes );
		foreach ( $sizesExploded as $sz ) {
			$selected = "";
			if ( $v == $sz ) {
				$selected = " selected";
			}
			printf( "<option value=\"%s\"%s>%s</option>", $sz, $selected, $sz );
		}
	}

	static public function PreSaveMaximum( $val ) {
		$v = intval( $val );
		if ( $v > 48 ) {
			$v = 48;
		}

		if ( $v == 0 ) {
			$v = 48;
		}

		if ( $v < 6 ) {
			$v = 6;
		}

		if ( $v == 0 ) {
			$v = 6;
		}

		return $v;
	}

	static public function PreSaveMinimum( $val ) {
		$v = intval( $val );
		if ( $v < 6 ) {
			$v = 6;
		}

		if ( $v == 0 ) {
			$v = 6;
		}

		if ( $v > 48 ) {
			$v = 48;
		}

		if ( $v == 0 ) {
			$v = 48;
		}

		return $v;
	}

	static function CustomizeEditTitle( $post ) {
		global $post_type;
		if ( $post_type != 'page' && $post_type != 'post' ) {
			return;
		}

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_register_script( 'gf-postedit-colorpicker', PLUGIN_URL . 'js/advedit.js' );
		wp_enqueue_script( 'gf-postedit-colorpicker' );

		print "<div style=\"border: 1px solid #dfdfdf; margin-bottom: 15px;\">";
		print "<a href=\"#\" id=\"gf_custom_title_show\" class=\"gf_custom_title_shown\">" . __( "Show advanced title settings", self::PLUGIN_SLUG ) . "</a>";
		print "<a href=\"#\" id=\"gf_custom_title_hide\" style=\"display: none;\" class=\"gf_custom_title_hidden\">" . __( "Hide advanced title settings", self::PLUGIN_SLUG ) . "</a>";
		print "<div id=\"gf_custom_title_div\" style=\"display: none;\" class=\"gf_custom_title_hidden\">";
		print "<h3><strong>" . __( "Choose custom title font", self::PLUGIN_SLUG ) . "</strong>&nbsp;";
		print "<select name=\"gf_custom_title_font\" id=\"gf_custom_title_font\" style=\"width: 250px;\" class=\"gfadveditable\">";
		$fonts = GFontsDB::GetInstalledFonts();
		$ctf   = get_post_meta( $post->ID, 'gf_custom_title_font' );
		$ctf   = isset( $ctf[0] ) ? $ctf[0] : "";
		print "<option value=\"\">" . __( "Default font", self::PLUGIN_SLUG ) . "</option>";
		foreach ( $fonts as $font ) {
			$selected = "";
			if ( $ctf == $font->name ) {
				$selected = " selected";
			}
			printf( "<option value=\"%s\"%s>%s</option>", $font->name, $selected, $font->name );
		}
		$sFonts = self::StandardFonts();
		foreach ( $sFonts as $font ) {
			$selected = "";
			if ( $ctf == $font ) {
				$selected = " selected";
			}
			printf( "<option value=\"%s\"%s>%s</option>", $font, $selected, $font );
		}
		print "</select>";

		$ctf   = get_post_meta( $post->ID, 'gf_custom_title_font' );
		$ctfs  = get_post_meta( $post->ID, 'gf_custom_title_font_size' );
		$ctfb  = get_post_meta( $post->ID, 'gf_custom_title_font_bold' );
		$ctfi  = get_post_meta( $post->ID, 'gf_custom_title_font_italic' );
		$ctfc  = get_post_meta( $post->ID, 'gf_custom_title_font_color' );
		$ctfu  = get_post_meta( $post->ID, 'gf_custom_title_font_underline' );
		$ctfsv = get_post_meta( $post->ID, 'gf_custom_title_font_shadow_vertical' );
		$ctfsh = get_post_meta( $post->ID, 'gf_custom_title_font_shadow_horizontal' );
		$ctfsb = get_post_meta( $post->ID, 'gf_custom_title_font_shadow_blur' );
		$ctfsc = get_post_meta( $post->ID, 'gf_custom_title_font_shadow_color' );

		$ctf   = isset( $ctf[0] ) ? $ctf[0] : "";
		$ctfs  = isset( $ctfs[0] ) ? $ctfs[0] : "";
		$ctfb  = isset( $ctfb[0] ) ? $ctfb[0] : "";
		$ctfi  = isset( $ctfi[0] ) ? $ctfi[0] : "";
		$ctfc  = isset( $ctfc[0] ) ? $ctfc[0] : "";
		$ctfu  = isset( $ctfu[0] ) ? $ctfu[0] : "";
		$ctfsv = isset( $ctfsv[0] ) ? intval( $ctfsv[0] ) : "0";
		$ctfsh = isset( $ctfsh[0] ) ? intval( $ctfsh[0] ) : "0";
		$ctfsb = isset( $ctfsb[0] ) ? intval( $ctfsb[0] ) : "0";
		$ctfsc = isset( $ctfsc[0] ) ? $ctfsc[0] : $ctfc;

		print "&nbsp;&nbsp;<strong>" . __( "Choose custom title color", self::PLUGIN_SLUG ) . "</strong>&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"gf_custom_title_font_color\" id=\"gf_custom_title_font_color\" value=\"" . $ctfc . "\" />";
		print "&nbsp;&nbsp;<strong>Choose custom title font size</strong>&nbsp;";
		print "<select name=\"gf_custom_title_font_size\" id=\"gf_custom_title_font_size\" style=\"width: 150px;\" class=\"gfadveditable\">";
		print "<option value=\"\">" . __( "Default font", self::PLUGIN_SLUG ) . "</option>";
		self::BuildFontSizesAsOptions( $ctfs );
		print "</select>";
		print "&nbsp;&nbsp;<input type=\"checkbox\" name=\"gf_custom_title_font_bold\" id=\"gf_custom_title_font_bold\"" . ( $ctfb
				? " checked" : "" ) . " class=\"gfadveditable\">&nbsp;<label for=\"gf_title_font_bold\"><strong>Bold</strong></label>";
		print "&nbsp;&nbsp;<input type=\"checkbox\" name=\"gf_custom_title_font_italic\" id=\"gf_custom_title_font_italic\"" . ( $ctfi
				? " checked" : "" ) . " class=\"gfadveditable\">&nbsp;<label for=\"gf_title_font_italic\"><em>Italic</em></label>";
		print "&nbsp;&nbsp;<input type=\"checkbox\" name=\"gf_custom_title_font_underline\" id=\"gf_custom_title_font_underline\"" . ( $ctfu
				? " checked" : "" ) . " class=\"gfadveditable\">&nbsp;<label for=\"gf_title_font_underline\"><u>Underline</u></label>";
		print "</h3>";
		print "<h3>";
		print "<strong>" . __( "Vertical shadow", self::PLUGIN_SLUG ) . "</strong>&nbsp;<button class=\"button button-primary\" id=\"gf_title_vshadow_left\" rel=\"gf_custom_title_font_shadow_vertical\">" . __( "Left -", self::PLUGIN_SLUG ) . "</button>&nbsp;<input type=\"text\" name=\"gf_custom_title_font_shadow_vertical\" id=\"gf_custom_title_font_shadow_vertical\" value=\"" . $ctfsv . "\" style=\"width: 40px;\" class=\"gfadveditable\">&nbsp;<button class=\"button button-primary\" id=\"gf_title_vshadow_right\" rel=\"gf_custom_title_font_shadow_vertical\">" . __( "Right +", self::PLUGIN_SLUG ) . "</button>";
		print "&nbsp;&nbsp;<strong>" . __( "Horizontal shadow", self::PLUGIN_SLUG ) . "</strong>&nbsp;<button class=\"button button-primary\" id=\"gf_title_hshadow_left\"  rel=\"gf_custom_title_font_shadow_horizontal\">" . __( "Up -", self::PLUGIN_SLUG ) . "</button>&nbsp;<input type=\"text\" name=\"gf_custom_title_font_shadow_horizontal\" id=\"gf_custom_title_font_shadow_horizontal\" value=\"" . $ctfsh . "\" style=\"width: 40px;\" class=\"gfadveditable\">&nbsp;<button class=\"button button-primary\" id=\"gf_title_hshadow_right\" rel=\"gf_custom_title_font_shadow_horizontal\">" . __( "Down +", self::PLUGIN_SLUG ) . "</button>";
		print "&nbsp;&nbsp;<strong>" . __( "Blur shadow", self::PLUGIN_SLUG ) . "</strong>&nbsp;<button class=\"button button-primary\" id=\"gf_title_bshadow_left\" rel=\"gf_custom_title_font_shadow_blur\" min=\"0\">" . __( "Less -", self::PLUGIN_SLUG ) . "</button>&nbsp;<input type=\"text\" name=\"gf_custom_title_font_shadow_blur\" id=\"gf_custom_title_font_shadow_blur\" value=\"" . $ctfsb . "\" style=\"width: 40px;\" class=\"gfadveditable\">&nbsp;<button class=\"button button-primary\" id=\"gf_title_bshadow_right\" rel=\"gf_custom_title_font_shadow_blur\">" . __( "More +", self::PLUGIN_SLUG ) . "</button>";
		print "&nbsp;&nbsp;<strong>" . __( "Shadow color", self::PLUGIN_SLUG ) . "</strong>&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"gf_custom_title_font_shadow_color\" id=\"gf_custom_title_font_shadow_color\" value=\"" . $ctfsc . "\" />";
		print "&nbsp;&nbsp;<button class=\"button button-primary\" id=\"gf_remove_post_title_styles\">" . __( "Remove title styling", self::PLUGIN_SLUG ) . "</button>";
		print "</h3><br/>";
		print "<center><span id=\"gf_title_livepreview\" style=\"" . self::BuildTitleStyles( $ctf, $ctfs, $ctfc, $ctfb, $ctfi, $ctfu, $ctfsv, $ctfsh, $ctfsb, $ctfsc ) . "\">" . $post->post_title . "</span></center><br/><br/>";
		print "<br/><a href=\"#\" id=\"lnkGfSavePreset\">" . __( "Save this preset", self::PLUGIN_SLUG ) . "</a>";
		$presets       = GFontsDB::LoadTitlePresets();
		$presetsAsJSON = null;
		if ( count( $presets ) > 0 ) {
			$presetsAsJSON = array();
			print "&nbsp;&nbsp;&nbsp;<strong>" . __( "or load previous preset", self::PLUGIN_SLUG ) . "</strong>&nbsp;<select name=\"gf_pv_preset\" id=\"gf_pv_preset\" style=\"width: 150px;\">";
			$index = 0;
			foreach ( $presets as $preset ) {
				printf( "<option value=\"%d\">%s</option>", $index ++, $preset->name );
				$presetsAsJSON[] = json_encode(
					array(
						'id'                      => $preset->id,
						'font'                    => $preset->font,
						'title_color'             => $preset->title_color,
						'title_size'              => $preset->title_size,
						'title_bold'              => $preset->title_bold,
						'title_italic'            => $preset->title_italic,
						'title_underline'         => $preset->title_underline,
						'title_shadow_vertical'   => $preset->title_shadow_vertical,
						'title_shadow_horizontal' => $preset->title_shadow_horizontal,
						'title_shadow_blur'       => $preset->title_shadow_blur,
						'title_shadow_color'      => $preset->title_shadow_color,
					)
				);
			}
			print "</select>&nbsp;<button class=\"button button-primary\" id=\"gf_load_preset\">" . __( "Load", self::PLUGIN_SLUG ) . "</button>&nbsp;"; //<strong>" . __("or", self::PLUGIN_SLUG) . "</strong>&nbsp;<button class=\"button button-primary\" id=\"gf_update_preset\">" . __("Save preset", self::PLUGIN_SLUG) . "</button>&nbsp;";
			//print "&nbsp;<strong>" . __("or", self::PLUGIN_SLUG) . "</strong>&nbsp;<button class=\"button button-primary\" id=\"gf_delete_preset\">" . __("Delete selected preset", self::PLUGIN_SLUG) . "</button>&nbsp;";
			print "<img id=\"gfupdater\" src=\"" . PLUGIN_URL . "assets/saver.gif\" style=\"display: none;\">";
		}
		print "<br/><div id=\"gf_title_save_preset\" style=\"display: none;\">";
		//print "<input type=\"text\" name=\"gf_preset_title2\" id=\"gf_preset_title2\" value=\"\" />";
		print "<a href=\"#\" id=\"lnkGfCloseBox\">" . __( "Close save box", self::PLUGIN_SLUG ) . "</a><br/><br/>";
		print "<strong>" . __( "Preset name", self::PLUGIN_SLUG ) . "</strong>&nbsp;&nbsp;";
		print "<input type=\"text\" name=\"gf_preset_title\" id=\"gf_preset_title\" /><button class=\"button button-primary\" id=\"btnSavePreset\">" . __( "Save this preset", self::PLUGIN_SLUG ) . "</button>&nbsp;<img id=\"gfsaver\" src=\"" . PLUGIN_URL . "assets/saver.gif\" style=\"display: none;\">";
		print "</div><br/>";
		print "</div>";
		print "</div>";
		if ( is_array( $presetsAsJSON ) ) {
			print "<script>";
			print "var presetList = new Array();";
			print "jQuery(document).ready(function() {";
			foreach ( $presetsAsJSON as $pr ) {
				print "presetList.push(new TPresetOption('" . $pr . "'));";
			}
			print "});";
			print "</script>";
		}
	}

	static function ModifyPostTitle( $title, $id ) {
		if ( is_feed() ) {
			return $title;
		}
		$sth = current_theme_supports( 'menus' );
		if ( self::$navMenuBegin && $sth ) {
			return '<span class="gfcustomizedmenuitem ' . self::$navMenuClass . '">' . $title . "</span>";
		}

		$post = get_post( $id );

		if ( ( $post->post_type != 'post' ) && ( $post->post_type != 'page' ) ) {
			return $title;
		}

		$force = (bool) get_option( 'gf_title_live_preview_' . get_current_user_id(), true );
		if ( ( is_front_page() || is_page() || is_single() ) || ( $force && self::$changeTitle ) ) {
			$ctf   = get_post_meta( $id, 'gf_custom_title_font' );
			$ctfs  = get_post_meta( $id, 'gf_custom_title_font_size' );
			$ctfb  = get_post_meta( $id, 'gf_custom_title_font_bold' );
			$ctfi  = get_post_meta( $id, 'gf_custom_title_font_italic' );
			$ctfc  = get_post_meta( $id, 'gf_custom_title_font_color' );
			$ctfu  = get_post_meta( $id, 'gf_custom_title_font_underline' );
			$ctfsv = get_post_meta( $id, 'gf_custom_title_font_shadow_vertical' );
			$ctfsh = get_post_meta( $id, 'gf_custom_title_font_shadow_horizontal' );
			$ctfsb = get_post_meta( $id, 'gf_custom_title_font_shadow_blur' );
			$ctfsc = get_post_meta( $id, 'gf_custom_title_font_shadow_color' );

			$ctf   = isset( $ctf[0] ) ? $ctf[0] : "";
			$ctfs  = isset( $ctfs[0] ) ? $ctfs[0] : "";
			$ctfb  = isset( $ctfb[0] ) ? $ctfb[0] : "";
			$ctfi  = isset( $ctfi[0] ) ? $ctfi[0] : "";
			$ctfc  = isset( $ctfc[0] ) ? $ctfc[0] : "";
			$ctfu  = isset( $ctfc[0] ) ? $ctfu[0] : "";
			$ctfsv = isset( $ctfsv[0] ) ? intval( $ctfsv[0] ) : "0";
			$ctfsh = isset( $ctfsh[0] ) ? intval( $ctfsh[0] ) : "0";
			$ctfsb = isset( $ctfsb[0] ) ? intval( $ctfsb[0] ) : "0";
			$ctfsc = isset( $ctfsc[0] ) ? $ctfsc[0] : $ctfc;

			$style = self::BuildTitleStyles( $ctf, $ctfs, $ctfc, $ctfb, $ctfi, $ctfu, $ctfsv, $ctfsh, $ctfsb, $ctfsc, '', false );
			if ( $style != '' ) {
				$title = sprintf( "<span style=\"%s\" class=\"gfcustomized\">%s</span>", $style, $title );
			} else {
				if ( self::$defaultTitlePreset === false ) {
					$d                        = GFontsDB::GetDefaultTitlePreset();
					self::$defaultTitlePreset = $d;
				}

				if ( self::$defaultTitlePreset !== null ) {
					$d     = self::$defaultTitlePreset;
					$ctf   = ( $d->font != '' ) ? $d->font : "";
					$ctfs  = ( $d->title_size != '' ) ? $d->title_size : "";
					$ctfb  = ( $d->title_bold != '' ) ? $d->title_bold : "";
					$ctfi  = ( $d->title_italic != '' ) ? $d->title_italic : "";
					$ctfc  = ( $d->title_color != '' ) ? $d->title_color : "";
					$ctfu  = ( $d->title_underline != '' ) ? $d->title_underline : "";
					$ctfsv = ( $d->title_shadow_vertical != '' ) ? $d->title_shadow_vertical
						: "0";
					$ctfsh = ( $d->title_shadow_horizontal != '' ) ? $d->title_shadow_horizontal
						: "0";
					$ctfsb = ( $d->title_shadow_blur != '' ) ? $d->title_shadow_blur
						: "0";
					$ctfsc = ( $d->title_shadow_color != '' ) ? $d->title_shadow_color
						: "0";
					$ctfc;
					$style = self::BuildTitleStyles( $ctf, $ctfs, $ctfc, $ctfb, $ctfi, $ctfu, $ctfsv, $ctfsh, $ctfsb, $ctfsc, '', false );
					if ( $style != '' ) {
						$title = sprintf( "<span style=\"%s\" class=\"gfcustomized\">%s</span>", $style, $title );
					}
				}
			}
		}//

		return $title;
	}

	static public function ModifyPostTitleFromCustomization( $title, $id ) {
		if ( is_feed() ) {
			return $title;
		}
		$sth = current_theme_supports( 'menus' );
		if ( self::$navMenuBegin && $sth ) {
			return '<span class="gfcustomizedmenuitem ' . self::$navMenuClass . '">' . $title . "</span>";
		}

		if ( isset( $_REQUEST['wp_customize'] ) && $_REQUEST['wp_customize'] == 'on' ) {
			$c    = stripslashes( $_REQUEST['customized'] );
			$r    = json_decode( $c );
			$uuid = $r->gf_post_title_styling_override_preset_uuid;
			$or   = $r->gf_post_title_styling_override;
			if ( ! $or ) {
				return self::ModifyPostTitle( $title, $id );
			}
			$d = GFontsDB::GetTitlePresetForUuid( $uuid );
		} else {
			$d = GFontsDB::GetTitlePresetForUuid( get_theme_mod( 'gf_post_title_styling_override_preset_uuid' ) );
		}
		if ( ! $d ) {
			return $title;
		}
		$force = (bool) get_option( 'gf_title_live_preview_' . get_current_user_id(), true );
		if ( ( is_front_page() || is_page() || is_single() ) || ( $force && self::$changeTitle ) ) {
			$ctf   = ( $d->font != '' ) ? $d->font : "";
			$ctfs  = ( $d->title_size != '' ) ? $d->title_size : "";
			$ctfb  = ( $d->title_bold != '' ) ? $d->title_bold : "";
			$ctfi  = ( $d->title_italic != '' ) ? $d->title_italic : "";
			$ctfc  = ( $d->title_color != '' ) ? $d->title_color : "";
			$ctfu  = ( $d->title_underline != '' ) ? $d->title_underline : "";
			$ctfsv = ( $d->title_shadow_vertical != '' ) ? $d->title_shadow_vertical
				: "0";
			$ctfsh = ( $d->title_shadow_horizontal != '' ) ? $d->title_shadow_horizontal
				: "0";
			$ctfsb = ( $d->title_shadow_blur != '' ) ? $d->title_shadow_blur : "0";
			$ctfsc = ( $d->title_shadow_color != '' ) ? $d->title_shadow_color : "0";
			$ctfc;
			$style = self::BuildTitleStyles( $ctf, $ctfs, $ctfc, $ctfb, $ctfi, $ctfu, $ctfsv, $ctfsh, $ctfsb, $ctfsc, '', false );
			if ( $style != '' ) {
				$title = sprintf( "<span style=\"%s\" class=\"gfcustomized\">%s</span>", $style, $title );
			}
		}

		return $title;
	}

	static function AddMetaBoxes() {
		$screens = array( 'post', 'page' );
		foreach ( $screens as $screen ) {
			add_meta_box(
				'gf_mb1', __( 'Comments settings', self::PLUGIN_SLUG ), array(
				'GFontsEngine',
				'AddPostMetaBox'
			), $screen, 'side', 'core'
			);
			add_meta_box(
				'gf_mb2', __( 'Social buttons', self::PLUGIN_SLUG ), array(
				'GFontsEngine',
				'AddPostSocialButtonsMetaBox'
			), $screen, 'side', 'core'
			);
		}
	}

	static function AddPostMetaBox( $post, $o ) {
		$gft = get_post_meta( $post->ID, 'gf_comment_type', true );
		if ( $gft == '' ) {
			$gft = 'default';
		}
		print "<h3>" . __( "Select comment system", self::PLUGIN_SLUG ) . "</h3>";
		print "<br/>";
		print "<input type=\"radio\" name=\"gf_comment_type\" value=\"disabled\" id=\"gct1\"/" . ( ( $gft == "disabled" )
				? " checked" : "" ) . ">&nbsp;&nbsp;<label for=\"gct1\">" . __( "Disabled", self::PLUGIN_SLUG ) . "</label><br/>";
		print "<input type=\"radio\" name=\"gf_comment_type\" value=\"default\" id=\"gct4\"/" . ( ( $gft == "default" )
				? " checked" : "" ) . ">&nbsp;&nbsp;<label for=\"gct4\">" . __( "Default", self::PLUGIN_SLUG ) . "</label><br/>";
		print "<input type=\"radio\" name=\"gf_comment_type\" value=\"wordpress\" id=\"gct2\"/" . ( ( $gft == "wordpress" )
				? " checked" : "" ) . ">&nbsp;&nbsp;<label for=\"gct2\">" . __( "WordPress", self::PLUGIN_SLUG ) . "</label><br/>";
		print "<input type=\"radio\" name=\"gf_comment_type\" value=\"facebook\" id=\"gct3\"/" . ( ( $gft == "facebook" )
				? " checked" : "" ) . ">&nbsp;&nbsp;<label for=\"gct3\">" . __( "Facebook", self::PLUGIN_SLUG ) . "</label><br/>";
	}

	static function AddPostSocialButtonsMetaBox( $post, $o ) {
		print "<h3>" . __( "Add social buttons to post", self::PLUGIN_SLUG ) . "</h3>";
		print "<br/>";

		$soc = get_post_meta( $post->ID, 'gf_social_buttons', true );

		print "<input type=\"checkbox\" name=\"gf_socbut_fb\" id=\"gf_socbut_fb\" " . ( @$soc['facebook']
				? "checked" : "" ) . "/>&nbsp;<label for=\"gf_socbut_fb\">Facebook</label><br/>";
		print "<input type=\"checkbox\" name=\"gf_socbut_tw\" id=\"gf_socbut_tw\" " . ( @$soc['twitter']
				? "checked" : "" ) . "/>&nbsp;<label for=\"gf_socbut_tw\">Twitter</label><br/>";
		print "<input type=\"checkbox\" name=\"gf_socbut_gp\" id=\"gf_socbut_gp\" " . ( @$soc['googleplus']
				? "checked" : "" ) . "/>&nbsp;<label for=\"gf_socbut_gp\">Google+</label><br/>";
	}

	static public function SavePost( $post_id ) {
		if ( isset( $_POST['action'] ) && ( ( $_POST['action'] == 'editpost' ) || ( $_POST['action'] == 'autosave' ) ) ) {
			$ctf                        = isset( $_POST['gf_custom_title_font'] )
				? $_POST['gf_custom_title_font'] : "";
			$ctfs                       = isset( $_POST['gf_custom_title_font_size'] )
				? $_POST['gf_custom_title_font_size'] : "";
			$ctfb                       = isset( $_POST['gf_custom_title_font_bold'] )
				? 1 : 0;
			$ctfi                       = isset( $_POST['gf_custom_title_font_italic'] )
				? 1 : 0;
			$ctfc                       = isset( $_POST['gf_custom_title_font_color'] )
				? $_POST['gf_custom_title_font_color'] : "";
			$ctfu                       = isset( $_POST['gf_custom_title_font_underline'] )
				? 1 : 0;
			$ctfsv                      = isset( $_POST['gf_custom_title_font_shadow_vertical'] )
				? $_POST['gf_custom_title_font_shadow_vertical'] : "";
			$ctfsh                      = isset( $_POST['gf_custom_title_font_shadow_horizontal'] )
				? $_POST['gf_custom_title_font_shadow_horizontal'] : "";
			$ctfsb                      = isset( $_POST['gf_custom_title_font_shadow_blur'] )
				? $_POST['gf_custom_title_font_shadow_blur'] : "";
			$ctfsc                      = isset( $_POST['gf_custom_title_font_shadow_color'] )
				? $_POST['gf_custom_title_font_shadow_color'] : "";
			$commentsystem              = isset( $_POST['gf_comment_type'] ) ? $_POST['gf_comment_type']
				: "default";
			$socialbutton['facebook']   = isset( $_POST['gf_socbut_fb'] ) ? true
				: false;
			$socialbutton['twitter']    = isset( $_POST['gf_socbut_tw'] ) ? true
				: false;
			$socialbutton['googleplus'] = isset( $_POST['gf_socbut_gp'] ) ? true
				: false;

			update_post_meta( $post_id, 'gf_custom_title_font', $ctf );
			update_post_meta( $post_id, 'gf_custom_title_font_size', $ctfs );
			update_post_meta( $post_id, 'gf_custom_title_font_bold', $ctfb );
			update_post_meta( $post_id, 'gf_custom_title_font_italic', $ctfi );
			update_post_meta( $post_id, 'gf_custom_title_font_color', $ctfc );
			update_post_meta( $post_id, 'gf_custom_title_font_underline', $ctfu );
			update_post_meta( $post_id, 'gf_custom_title_font_shadow_vertical', $ctfsv );
			update_post_meta( $post_id, 'gf_custom_title_font_shadow_horizontal', $ctfsh );
			update_post_meta( $post_id, 'gf_custom_title_font_shadow_blur', $ctfsb );
			update_post_meta( $post_id, 'gf_custom_title_font_shadow_color', $ctfsc );
			update_post_meta( $post_id, 'gf_comment_type', $commentsystem );
			update_post_meta( $post_id, 'gf_social_buttons', $socialbutton );
		}
	}

	static public function StandardFonts() {
		return array(
			'Andale Mono',
			'Arial',
			'Arial Black',
			'Book Antiqua',
			'Comic Sans MS',
			'Courier New',
			'Georgia',
			'Helvetica',
			'Impact',
			'Symbol',
			'Tahoma',
			'Terminal',
			'Times New Roman',
			'Trebuchet MS',
			'Verdana',
			'Webdings',
			'Wingdings'
		);
	}

	/**
	 * Build custom title styles
	 *
	 * @param type $ctf Font family
	 * @param type $ctfs Font size
	 * @param type $ctfc Font color
	 * @param type $ctfb Font bold
	 * @param type $ctfi Font italic
	 * @param type $ctfu Font underline
	 */
	static public function BuildTitleStyles( $ctf, $ctfs, $ctfc, $ctfb, $ctfi, $ctfu, $ctfsv, $ctfsh, $ctfsb, $ctfsc, $important = '', $alternatives = true, $textalign = '', $leftmargin = '', $rightmargin = '' ) {
		$style = "";
		if ( $ctf != '' ) {
			$style .= sprintf( "font-family: %s$important; ", $ctf );
		}
		if ( $ctfs != '' ) {
			$style .= sprintf( "font-size: %s$important; ", $ctfs );
		}
		if ( $ctfc != '' ) {
			$style .= sprintf( "color: %s$important; ", $ctfc );
		}
		if ( $ctfb == '1' ) {
			$style .= "font-weight: bold$important; ";
		} else {
			if ( $alternatives ) {
				$style .= "font-weight: normal$important; ";
			}
		}
		if ( $ctfi == '1' ) {
			$style .= "font-style: italic$important; ";
		} else {
			if ( $alternatives ) {
				$style .= "font-style: normal$important; ";
			}
		}
		if ( $ctfu == '1' ) {
			$style .= "text-decoration: underline$important; ";
		} else {
			if ( $alternatives ) {
				$style .= "text-decoration: none$important; ";
			}
		}

		if ( $ctfsc != '' ) {
			$style .= sprintf( "text-shadow: %dpx %dpx %dpx %s$important; ", $ctfsv, $ctfsh, $ctfsb, $ctfsc );
		}

		if ( $textalign != '' ) {
			$style .= sprintf( "text-align: %s$important;", $textalign );
		}
		if ( $leftmargin != '' ) {
			$style .= sprintf( "margin-left: %s$important;", $leftmargin );
		}
		if ( $rightmargin != '' ) {
			$style .= sprintf( "margin-right: %s$important;", $rightmargin );
		}

		return $style;
	}

	static public function ModifyEditPostViews( $views ) {
		$link = '';
		$act  = isset( $_GET['gftp'] ) ? $_GET['gftp'] : null;
		if ( $act !== null ) {
			unset( $_GET['gftp'] );
			update_option( 'gf_title_live_preview_' . get_current_user_id(), $act );
		}
		if ( count( $_GET ) > 0 ) {
			$link = '?';
			foreach ( $_GET as $k => $v ) {
				$link .= $k . '=' . $v . '&';
			}
		}
		$enabledLivePreview = (bool) get_option( 'gf_title_live_preview_' . get_current_user_id(), true );
		if ( $link == '' ) {
			$link .= '?';
		}

		if ( ! $enabledLivePreview ) {
			$previewText = 'Enable live title font preview';
			$link .= 'gftp=1';
		} else {
			$previewText = 'Disable live title font preview';
			$link .= 'gftp=0';
		}
		$views[] = sprintf( '<a href="%s">%s</a>', $link, __( $previewText, self::PLUGIN_SLUG ) );

		return $views;
	}

	static public function GfTitleSavePreset() {
		$fields = array(
			'name',
			'font',
			'title_color',
			'title_size',
			'title_bold',
			'title_italic',
			'title_underline',
			'title_shadow_vertical',
			'title_shadow_horizontal',
			'title_shadow_blur',
			'title_shadow_color',
			'is_default'
		);
		$values = array();
		foreach ( $fields as $field ) {
			$values[ $field ] = isset( $_POST[ $field ] ) ? $_POST[ $field ] : null;
		}
		if ( $values['name'] == null ) {
			$values['name'] = 'auto preset name';
		}

		GFontsDB::SaveTitlePreset( $values );

		$response = array(
			'result'  => 0,
			'message' => ''
		);

		echo json_encode( $response );
		die();
	}

	static public function GfTitleUpdatePreset() {
		$fields = array(
			'id',
			'font',
			'title_color',
			'title_size',
			'title_bold',
			'title_italic',
			'title_underline',
			'title_shadow_vertical',
			'title_shadow_horizontal',
			'title_shadow_blur',
			'title_shadow_color',
			'title_name',
			'is_default'
		);
		$values = array();
		foreach ( $fields as $field ) {
			$values[ $field ] = isset( $_POST[ $field ] ) ? $_POST[ $field ] : null;
		}

		GFontsDB::UpdateTitlePreset( $values );

		$response = array(
			'result'  => 0,
			'message' => ''
		);

		echo json_encode( $response );
		die();
	}

	static public function GfTitleDeletePreset() {
		$id = $_POST['id'];
		GFontsDB::DeletePreset( $id );
		$response = array(
			'result'  => 0,
			'message' => ''
		);

		echo json_encode( $response );
		die();
	}

	static public function GfTitleDeleteForPost() {
		$id = $_POST['id'];
		GFontsDB::RemoveTitlePresetFromPost( $id );
		$response = array(
			'result'  => 0,
			'message' => ''
		);

		echo json_encode( $response );
		die();
	}

	static public function CatchLoadEdit() {
		add_action( 'admin_footer', array(
			'GFontsEngine',
			'AddCustomBulkActionToEdit'
		) );
		self::$changeTitle = true;
		$get               = $_GET;
		$wp_list_table     = _get_list_table( 'WP_Posts_List_Table' );
		$action            = $wp_list_table->current_action();
		if ( $action == 'masstitlepreset' ) {
			$presetName = ( $get['gf_preset_name'] != '' ) ? $get['gf_preset_name']
				: $get['gf_preset_name2'];
			if ( $presetName != null ) {
				$posts  = $get['post'];
				$preset = GFontsDB::GetPresetByName( $presetName );
				if ( $preset != null ) {
					foreach ( $posts as $post_id ) {
						GFontsDB::SetTitlePresetForPost( $post_id, $preset );
					}
				}
			}
		}
		if ( $action == 'masstitlepresetremove' ) {
			$posts = $get['post'];
			foreach ( $posts as $post_id ) {
				GFontsDB::RemoveTitlePresetFromPost( $post_id );
			}
		}
	}

	static public function AddCustomBulkActionToEdit() {
		?>
		<div id="gf_custom_title_preset" style="display: none;">
			<select name="gf_preset_name" id="gf_preset_name">
				<option
					value=""><?php _e( "Select preset", self::PLUGIN_SLUG ) ?></option>
				<?php
				$presets = GFontsDB::LoadTitlePresets();
				foreach ( $presets as $preset ) {
					printf( "<option value=\"%s\">%s</option>", $preset->name, $preset->name );
				}
				?>
			</select>
		</div>
		<div id="gf_custom_title_preset2" style="display: none;">
			<select name="gf_preset_name2" id="gf_preset_name2">
				<option
					value=""><?php _e( "Select preset", self::PLUGIN_SLUG ) ?></option>
				<?php
				$presets = GFontsDB::LoadTitlePresets();
				foreach ( $presets as $preset ) {
					printf( "<option value=\"%s\">%s</option>", $preset->name, $preset->name );
				}
				?>
			</select>
		</div>
		<?php
		global $post_type;
		if ( ( ( $post_type == 'page' || $post_type == 'post' ) ) ) {
			?>
			<script type="text/javascript">
				jQuery(document).ready(function () {
					jQuery('<option>').val('masstitlepreset').text('<?php _e( 'Set Title Preset Style', self::PLUGIN_SLUG ) ?>').appendTo("select[name='action']");
					jQuery('<option>').val('masstitlepreset').text('<?php _e( 'Set Title Preset Style', self::PLUGIN_SLUG ) ?>').appendTo("select[name='action2']");
					jQuery('<option>').val('masstitlepresetremove').text('<?php _e( 'Remove Title Preset Style', self::PLUGIN_SLUG ) ?>').appendTo("select[name='action']");
					jQuery('<option>').val('masstitlepresetremove').text('<?php _e( 'Remove Title Preset Style', self::PLUGIN_SLUG ) ?>').appendTo("select[name='action2']");

					jQuery("select[name='action']").after('<span id="gf_custom_title_preset_selector1"></span>');
					jQuery("select[name='action2']").after('<span id="gf_custom_title_preset_selector2"></span>');
					jQuery("select[name='action']").change(function () {
						if (jQuery(this).val() == 'masstitlepreset') {
							jQuery('#gf_custom_title_preset_selector1').html(jQuery('#gf_custom_title_preset').html());
						} else {
							jQuery('#gf_custom_title_preset_selector1').html('');
						}
						return false;
					});
					jQuery("select[name='action2']").change(function () {
						if (jQuery(this).val() == 'masstitlepreset') {
							jQuery('#gf_custom_title_preset_selector2').html(jQuery('#gf_custom_title_preset2').html());
						} else {
							jQuery('#gf_custom_title_preset_selector2').html('');
						}
						return false;
					});
				});
			</script>
		<?php } ?>
	<?php
	}

	static public function CustomTitlePresets() {
		print "<div class=\"wrap\">";
		print "<h2>" . __( "Custom Title Presets", self::PLUGIN_SLUG ) . "</h2>";
		$tabs[] = array(
			'title'  => __( "Manage presets", self::PLUGIN_SLUG ),
			'href'   => '?page=' . self::PLUGIN_CUSTOM_TITLE_PRESETS,
			'active' => isset( $_GET['act'] ) ? false : true
		);
		$tabs[] = array(
			'title'  => __( "Import presets", self::PLUGIN_SLUG ),
			'href'   => '?page=' . self::PLUGIN_CUSTOM_TITLE_PRESETS . '&act=import',
			'active' => isset( $_GET['act'] ) ? ( $_GET['act'] == 'import' || $_GET['act'] == 'import2' )
				: false
		);

		$tabs[] = array(
			'title'  => __( "Mass Title Tools", self::PLUGIN_SLUG ),
			'href'   => '?page=' . self::PLUGIN_CUSTOM_TITLE_PRESETS . '&act=mtt',
			'active' => isset( $_GET['act'] ) ? $_GET['act'] == 'mtt' : false
		);
		GFontsUITabs::DrawTabs( $tabs );

		$action = isset( $_GET['act'] ) ? $_GET['act'] : 'main';
		switch ( $action ) {
			case 'main':
				self::CustomTitlePresetsMain();
				break;
			case 'mtt':
				self::CustomTitlePresetsTools();
				break;
			case 'import':
				self::PresetsImport();
				break;
			case 'import2':
				self::PresetsImport2();
				break;
		}

		print "</div>";
	}

	static public function CustomTitlePresetsMain() {
		$table  = new K8_UI_Table();
		$action = $table->current_action();

		if ( $action != false ) {
			self::CustomTitlePresetsMainAction( $action );
		}

		$rowActions[] = array(
			__( 'Edit', self::PLUGIN_SLUG ),
			'?page=' . self::PLUGIN_CUSTOM_TITLE_PRESETS . '&action=edit',
			'id'
		);
		$rowActions[] = array(
			__( 'Delete', self::PLUGIN_SLUG ),
			'?page=' . self::PLUGIN_CUSTOM_TITLE_PRESETS . '&action=delete',
			'id'
		);
		$rowActions[] = array(
			__( 'Set preset for all unstyled titles', self::PLUGIN_SLUG ),
			'?page=' . self::PLUGIN_CUSTOM_TITLE_PRESETS . '&action=massunstyled',
			'id'
		);
		$rowActions[] = array(
			__( 'Set preset for all titles', self::PLUGIN_SLUG ),
			'?page=' . self::PLUGIN_CUSTOM_TITLE_PRESETS . '&action=mass',
			'id'
		);
		$rowActions[] = array(
			__( 'Set as default for all titles', self::PLUGIN_SLUG ),
			'?page=' . self::PLUGIN_CUSTOM_TITLE_PRESETS . '&action=default',
			'id'
		);
		$table
			->setBaseUrl( 'admin.php' )
			->setPageName( self::PLUGIN_CUSTOM_TITLE_PRESETS )
			//->setUrlSuffix()
			->setFontSize( 17 )
			->addColumn( null, null, 'preset', true )
			->addColumn( __( 'Preset', self::PLUGIN_SLUG ), true, 'name', false, array(
				'?page=' . self::PLUGIN_CUSTOM_TITLE_PRESETS . '&action=edit',
				'id'
			), $rowActions )
			->addColumn( __( 'Is default', self::PLUGIN_SLUG ), true, 'is_default_tf', false, array(
				'?page=' . self::PLUGIN_CUSTOM_TITLE_PRESETS . '&action=edit',
				'id'
			), null, true );
		$searchBox = new K8_UI_Table_SearchBox();
		$searchBox->setButtonText( __( "Search presets", self::PLUGIN_SLUG ) )->setInputName( 'preset_name' )->addHiddenField( 'page', self::PLUGIN_CUSTOM_TITLE_PRESETS );
		$table->setSearchBox( $searchBox );
		//$table->addFilterElement('?page=' . self::PLUGIN_CUSTOM_TITLE_PRESETS, __("All", self::PLUGIN_SLUG), 'f', '');
		//$table->addFilterElement('?page=' . self::PLUGIN_CUSTOM_TITLE_PRESETS . '&f=x', __("None", self::PLUGIN_SLUG), 'f', 'x');
		//$table->addFilterElement('?page=' . self::PLUGIN_CUSTOM_TITLE_PRESETS . '&f=o', __("Other", self::PLUGIN_SLUG), 'f', 'o');
		$table->addBulkAction( 'delete', __( 'Delete', self::PLUGIN_SLUG ) );
		$table->addBulkAction( 'export', __( 'Export', self::PLUGIN_SLUG ) );
		$ds = new GFontsPresetsDataSource();
		if ( isset( $_GET['s'] ) ) {
			$ds->setFilterField( 'name' )->setFilterValue( $_GET['s'] );
		}
		if ( isset( $_GET['orderby'] ) ) {
			$ds->setOrderBy( $_GET['orderby'] )->setOrderDirection( $_GET['order'] );
		} else {
			$ds->setOrderBy( 'name' )->setOrderDirection( 'asc' );
		}
		$table->setDataSource( $ds );
		print "<a class=\"button\" href=\"?page=" . self::PLUGIN_CUSTOM_TITLE_PRESETS . "&action=edit\">" . __( "Add new preset", self::PLUGIN_SLUG ) . "</a>&nbsp;&nbsp;";
		print "<a class=\"button\" href=\"?page=" . self::PLUGIN_CUSTOM_TITLE_PRESETS . "&action=removeall\" onclick=\"return confirm('Are you sure you want to remve all title presets from all posts?');\">" . __( "Remove all title presets from all posts", self::PLUGIN_SLUG ) . "</a>";
		print "<br/>";
		$table->display();
	}

	static public function CustomTitlePresetsMainAction( $action ) {
		switch ( $action ) {
			case 'delete':

				if ( isset( $_GET['id'] ) ) {
					print "<div id=\"message\" class=\"updated\"><p><strong>";
					GFontsDB::DeletePreset( intval( $_GET['id'] ) );
					_e( 'Preset successfully deleted.', self::PLUGIN_SLUG );
					print "</strong></p></div>";
				}
				if ( isset( $_GET['ids'] ) ) {
					foreach ( $_GET['ids'] as $id ) {
						GFontsDB::DeletePreset( intval( $id ) );
					}
					print "<div id=\"message\" class=\"updated\"><p><strong>";
					printf( _n( '%d preset deleted.', '%d presets deleted.', count( $_GET['ids'] ) ), count( $_GET['ids'] ) );
					print "</strong></p></div>";
				}
				break;
			case 'edit':
				wp_enqueue_style( 'wp-color-picker' );
				wp_enqueue_script( 'wp-color-picker' );
				wp_register_script( 'gf-postedit-colorpicker', PLUGIN_URL . 'js/advedit.js' );
				wp_enqueue_script( 'gf-postedit-colorpicker' );

				if ( isset( $_GET['id'] ) ) {
					$presetId = intval( $_GET['id'] );
					$preset   = GFontsDB::GetPresetById( $presetId );
				} else {
					$preset = null;
				}

				print "<div style=\"border: 1px solid #dfdfdf; margin-bottom: 15px;\"><h3>";
				print "<strong>" . __( "Preset name", self::PLUGIN_SLUG ) . "</strong>&nbsp;";
				if ( $preset != null ) {
					print "<input type=\"text\" name=\"gf_preset_title2\" id=\"gf_preset_title2\" value=\"" . $preset->name . "\" /><br/>";
				} else {
					print "<input type=\"text\" name=\"gf_preset_title\" id=\"gf_preset_title\" value=\"\" /><br/>";
				}
				_e( "Is default", self::PLUGIN_SLUG );
				print '&nbsp;&nbsp;<input type="checkbox" name="gf_is_default" id="gf_is_default"';
				if ( $preset && $preset->is_default ) {
					print ' checked';
				}
				print '/><br/>';
				print "<strong>" . __( "Choose custom title font", self::PLUGIN_SLUG ) . "</strong>&nbsp;";
				print "<select name=\"gf_custom_title_font\" id=\"gf_custom_title_font\" style=\"width: 250px;\" class=\"gfadveditable\">";
				$fonts = GFontsDB::GetInstalledFonts();
				$ctf   = ( $preset != null ) ? $preset->font : "";
				print "<option value=\"\">" . __( "Default font", self::PLUGIN_SLUG ) . "</option>";
				foreach ( $fonts as $font ) {
					$selected = "";
					if ( $ctf == $font->name ) {
						$selected = " selected";
					}
					printf( "<option value=\"%s\"%s>%s</option>", $font->name, $selected, $font->name );
				}
				$sFonts = self::StandardFonts();
				foreach ( $sFonts as $font ) {
					$selected = "";
					if ( $ctf == $font ) {
						$selected = " selected";
					}
					printf( "<option value=\"%s\"%s>%s</option>", $font, $selected, $font );
				}
				print "</select>";

				$ctfs  = ( $preset != null ) ? $preset->title_size : "";
				$ctfb  = ( $preset != null ) ? $preset->title_bold : 0;
				$ctfi  = ( $preset != null ) ? $preset->title_italic : 0;
				$ctfc  = ( $preset != null ) ? $preset->title_color : "";
				$ctfu  = ( $preset != null ) ? $preset->title_underline : 0;
				$ctfsv = ( $preset != null ) ? $preset->title_shadow_vertical : 0;
				$ctfsh = ( $preset != null ) ? $preset->title_shadow_horizontal : 0;
				$ctfsb = ( $preset != null ) ? $preset->title_shadow_blur : 0;
				$ctfsc = ( $preset != null ) ? $preset->title_shadow_color : "";

				print "&nbsp;&nbsp;<strong>" . __( "Choose custom title color", self::PLUGIN_SLUG ) . "</strong>&nbsp;&nbsp;&nbsp;<span style=\"\"><input type=\"text\" name=\"gf_custom_title_font_color\" id=\"gf_custom_title_font_color\" value=\"" . $ctfc . "\" /></span>";
				print "&nbsp;&nbsp;<strong>Choose custom title font size</strong>&nbsp;";
				print "<select name=\"gf_custom_title_font_size\" id=\"gf_custom_title_font_size\" style=\"width: 150px;\" class=\"gfadveditable\">";
				print "<option value=\"\">" . __( "Default font", self::PLUGIN_SLUG ) . "</option>";
				self::BuildFontSizesAsOptions( $ctfs );
				print "</select>";
				print "&nbsp;&nbsp;<input type=\"checkbox\" name=\"gf_custom_title_font_bold\" id=\"gf_custom_title_font_bold\"" . ( $ctfb
						? " checked" : "" ) . " class=\"gfadveditable\">&nbsp;<label for=\"gf_title_font_bold\"><strong>Bold</strong></label>";
				print "&nbsp;&nbsp;<input type=\"checkbox\" name=\"gf_custom_title_font_italic\" id=\"gf_custom_title_font_italic\"" . ( $ctfi
						? " checked" : "" ) . " class=\"gfadveditable\">&nbsp;<label for=\"gf_title_font_italic\"><em>Italic</em></label>";
				print "&nbsp;&nbsp;<input type=\"checkbox\" name=\"gf_custom_title_font_underline\" id=\"gf_custom_title_font_underline\"" . ( $ctfu
						? " checked" : "" ) . " class=\"gfadveditable\">&nbsp;<label for=\"gf_title_font_underline\"><u>Underline</u></label>";
				print "</h3>";
				print "<h3>";
				print "<strong>" . __( "Vertical shadow", self::PLUGIN_SLUG ) . "</strong>&nbsp;<button class=\"button button-primary\" id=\"gf_title_vshadow_left\" rel=\"gf_custom_title_font_shadow_vertical\">" . __( "Left -", self::PLUGIN_SLUG ) . "</button>&nbsp;<input type=\"text\" name=\"gf_custom_title_font_shadow_vertical\" id=\"gf_custom_title_font_shadow_vertical\" value=\"" . $ctfsv . "\" style=\"width: 40px;\" class=\"gfadveditable\">&nbsp;<button class=\"button button-primary\" id=\"gf_title_vshadow_right\" rel=\"gf_custom_title_font_shadow_vertical\">" . __( "Right +", self::PLUGIN_SLUG ) . "</button>";
				print "&nbsp;&nbsp;<strong>" . __( "Horizontal shadow", self::PLUGIN_SLUG ) . "</strong>&nbsp;<button class=\"button button-primary\" id=\"gf_title_hshadow_left\"  rel=\"gf_custom_title_font_shadow_horizontal\">" . __( "Up -", self::PLUGIN_SLUG ) . "</button>&nbsp;<input type=\"text\" name=\"gf_custom_title_font_shadow_horizontal\" id=\"gf_custom_title_font_shadow_horizontal\" value=\"" . $ctfsh . "\" style=\"width: 40px;\" class=\"gfadveditable\">&nbsp;<button class=\"button button-primary\" id=\"gf_title_hshadow_right\" rel=\"gf_custom_title_font_shadow_horizontal\">" . __( "Down +", self::PLUGIN_SLUG ) . "</button>";
				print "&nbsp;&nbsp;<strong>" . __( "Blur shadow", self::PLUGIN_SLUG ) . "</strong>&nbsp;<button class=\"button button-primary\" id=\"gf_title_bshadow_left\" rel=\"gf_custom_title_font_shadow_blur\" min=\"0\">" . __( "Less -", self::PLUGIN_SLUG ) . "</button>&nbsp;<input type=\"text\" name=\"gf_custom_title_font_shadow_blur\" id=\"gf_custom_title_font_shadow_blur\" value=\"" . $ctfsb . "\" style=\"width: 40px;\" class=\"gfadveditable\">&nbsp;<button class=\"button button-primary\" id=\"gf_title_bshadow_right\" rel=\"gf_custom_title_font_shadow_blur\">" . __( "More +", self::PLUGIN_SLUG ) . "</button>";
				print "&nbsp;&nbsp;<strong>" . __( "Shadow color", self::PLUGIN_SLUG ) . "</strong>&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"gf_custom_title_font_shadow_color\" id=\"gf_custom_title_font_shadow_color\" value=\"" . $ctfsc . "\" />";
				print "&nbsp;&nbsp;<button class=\"button button-primary\" id=\"gf_remove_post_title_styles\">" . __( "Remove title styling", self::PLUGIN_SLUG ) . "</button>";
				print "</h3><br/>";
				print "<center><span id=\"gf_title_livepreview\" style=\"" . self::BuildTitleStyles( $ctf, $ctfs, $ctfc, $ctfb, $ctfi, $ctfu, $ctfsv, $ctfsh, $ctfsb, $ctfsc ) . "\">Example Title</span></center><br/><br/>";
				print "<br/>";
				if ( $preset != null ) {
					print "<button class=\"button button-primary\" id=\"gf_update_preset\" style=\"float: left;\">" . __( "Save preset", self::PLUGIN_SLUG ) . "</button>&nbsp;";
				} else {
					print "<button class=\"button button-primary\" id=\"btnSavePreset\" style=\"float: left;\">" . __( "Save preset", self::PLUGIN_SLUG ) . "</button>&nbsp;&nbsp;<img id=\"gfsaver\" src=\"" . PLUGIN_URL . "assets/saver.gif\" style=\"display: none;\">";
				}
				print "<img id=\"gfupdater\" src=\"" . PLUGIN_URL . "assets/saver.gif\" style=\"display: none;\">";
				print "<a class=\"button\" href=\"?page=" . self::PLUGIN_CUSTOM_TITLE_PRESETS . "\" id=\"cancellink\">" . __( "Cancel", self::PLUGIN_SLUG ) . "</a><br/>";
				print "<br/><br/></div>";
				print "<input type=\"hidden\" name=\"gf_pv_preset\" id=\"gf_pv_preset\" value=\"0\">";
				$presetsAsJSON = array();
				if ( $preset != null ) {
					print "<script>";
					$presets = GFontsDB::LoadTitlePresets();
					if ( count( $presets ) > 0 ) {
						$index = 0;
						foreach ( $presets as $presetObject ) {
							if ( $preset->name == $presetObject->name ) {
								$presetsAsJSON[] = json_encode(
									array(
										'id'                      => $presetObject->id,
										'font'                    => $presetObject->font,
										'title_color'             => $presetObject->title_color,
										'title_size'              => $presetObject->title_size,
										'title_bold'              => $presetObject->title_bold,
										'title_italic'            => $presetObject->title_italic,
										'title_underline'         => $presetObject->title_underline,
										'title_shadow_vertical'   => $presetObject->title_shadow_vertical,
										'title_shadow_horizontal' => $presetObject->title_shadow_horizontal,
										'title_shadow_blur'       => $presetObject->title_shadow_blur,
										'title_shadow_color'      => $presetObject->title_shadow_color,
									)
								);
							}
						}
					}
					print "var presetList = new Array();";
					print "jQuery(document).ready(function() {";
					foreach ( $presetsAsJSON as $pr ) {
						print "presetList.push(new TPresetOption('" . $pr . "'));";
					}
					print "});";
					print "jQuery('.wp-color-result').css('margin', '0px');";
					print "</script>";
				}
				break;
			case 'massunstyled':
				print "<div id=\"message\" class=\"updated\"><p><strong>";
				if ( isset( $_GET['id'] ) ) {
					$c = GFontsDB::SetTitlePresetForPosts( intval( $_GET['id'] ) );
					printf( _n( "%d title changed.", "%d titles changed.", $c ), $c );
				} else {
					_e( "Wrong parameters.", self::PLUGIN_SLUG );
				}
				print "</strong></p></div>";
				break;
			case 'mass':
				print "<div id=\"message\" class=\"updated\"><p><strong>";
				if ( isset( $_GET['id'] ) ) {
					$c = GFontsDB::SetTitlePresetForPosts( intval( $_GET['id'] ), false );
					printf( _n( "%d title changed.", "%d titles changed.", $c ), $c );
				} else {
					_e( "Wrong parameters.", self::PLUGIN_SLUG );
				}
				print "</strong></p></div>";
				break;
			case 'removeall':
				print "<div id=\"message\" class=\"updated\"><p><strong>";
				$c = GFontsDB::RemoveTitlePresetFromPosts();
				printf( _n( "%d title changed.", "%d titles changed.", $c ), $c );
				print "</strong></p></div>";
				break;
			case 'default':
				print "<div id=\"message\" class=\"updated\"><p><strong>";
				if ( isset( $_GET['id'] ) ) {
					$c = GFontsDB::SetTitlePresetDefault( intval( $_GET['id'] ) );
					_e( "Preset set as default", self::PLUGIN_SLUG );
				} else {
					_e( "Wrong parameters.", self::PLUGIN_SLUG );
				}
				print "</strong></p></div>";
				break;
		}
	}

	static public function CustomTitlePresetsTools() {
		wp_register_script( 'gfonts-masstitletools', PLUGIN_URL . "js/masstitletools.js" );
		wp_enqueue_script( 'gfonts-masstitletools' );

		print "<div id=\"accwait\" style=\"font-size: 36px; padding-top: 15px; display: none;\"><center><span class=\"acchideable\"><strong>" . __( "Wait, it may take a while...", self::PLUGIN_SLUG ) . "</strong></span><br/><br/>";
		print "<img src=\"" . PLUGIN_URL . "assets/loader.gif\" class=\"acchideable\"/><br/><br/><div id=\"accwaitinfo\" style=\"margin: 15px;\ font-size: 20px;\"></div><br/><br/></center></div>";

//		$table = new K8_UI_Table();
//		$action = $table->current_action();
//
//		if ($action != false) {
//			self::CustomTitlePresetsToolsAction($action);
//		}
		print "<div id=\"mtitlecontent\">";
		print "<div style=\"color: red; font-size: 26px; font-family: Arial; margin-bottom: 10px;\">" . __( "ALWAYS BACKUP DATA BEFORE LAUNCH TOOLS", self::PLUGIN_SLUG ) . "</div>";
		print "<div style=\"border: 1px solid #dfdfdf; margin-bottom: 15px; padding-left: 5px; padding-top: 5px; padding-bottom: 5px;\">";
		print "<h3>Capitalize all titles</h3>";
		print "<strong>" . __( "This action can't be reverted.", self::PLUGIN_SLUG ) . "</strong><br/><br/>";
		print "This Is Example Title<br/><br/>";
		print "<a class=\"button\" href=\"#\" onclick=\"return RunTool('capitalize', 0);\">Run tool</a>";
		print "</div>";
		print "<div style=\"border: 1px solid #dfdfdf; margin-bottom: 15px; padding-left: 5px; padding-top: 5px; padding-bottom: 5px;\">";
		print "<h3>Uppercase first word in all titles</h3>";
		print "<strong>" . __( "This action can't be reverted.", self::PLUGIN_SLUG ) . "</strong><br/><br/>";
		print "This is example title<br/><br/>";
		print "<a class=\"button\" href=\"#\" onclick=\"return RunTool('upperfirst', 0);\">Run tool</a>";
		print "</div>";
		print "<div style=\"border: 1px solid #dfdfdf; margin-bottom: 15px; padding-left: 5px; padding-top: 5px; padding-bottom: 5px;\">";
		print "<h3>Uppercase all titles</h3>";
		print "<strong>" . __( "This action can't be reverted.", self::PLUGIN_SLUG ) . "</strong><br/><br/>";
		print "THIS IS EXAMPLE TITLE<br/><br/>";
		print "<a class=\"button\" href=\"#\" onclick=\"return RunTool('upper', 0);\">Run tool</a>";
		print "</div>";
		print "<div style=\"border: 1px solid #dfdfdf; margin-bottom: 15px; padding-left: 5px; padding-top: 5px; padding-bottom: 5px;\">";
		print "<h3>Lowercase all titles</h3>";
		print "<strong>" . __( "This action can't be reverted.", self::PLUGIN_SLUG ) . "</strong><br/><br/>";
		print "this is example title<br/><br/>";
		print "<a class=\"button\" href=\"#\" onclick=\"return RunTool('lower', 0);\">Run tool</a>";
		print "</div>";
		print "<div style=\"border: 1px solid #dfdfdf; margin-bottom: 15px; padding-left: 5px; padding-top: 5px; padding-bottom: 5px;\">";
		print "<h3>Replace text in all titles</h3>";
		print "<strong>" . __( "This action can't be reverted.", self::PLUGIN_SLUG ) . "</strong><br/><br/>";
		print "<strong>" . __( "White spaces are allowed (space etc).", self::PLUGIN_SLUG ) . "</strong><br/><br/>";
		print "<form method=\"get\" action=\"\">";
		print "Replace text <input type=\"text\" name=\"src\" \"/> with <input type=\"text\" name=\"dst\" />";
		print "<input type=\"submit\" class=\"button\" value=\"Replace!\" />";
		print "<input type=\"hidden\" name=\"page\" value=\"" . self::PLUGIN_CUSTOM_TITLE_PRESETS . "\" />";
		print "<input type=\"hidden\" name=\"action\" value=\"replace\" />";
		print "<input type=\"hidden\" name=\"act\" value=\"mtt\" />";
		print "</form>";
		print "</div>";
		print "</div>";
	}

	static public function CustomTitlePresetsToolsAction( $action ) {
		print "<div id=\"accwait\" style=\"font-size: 36px; padding-top: 15px;\"><center><strong>" . __( "Wait, it may take a while...", self::PLUGIN_SLUG ) . "</strong><br/><br/>";
		print "<img src=\"" . PLUGIN_URL . "assets/loader.gif\"/></div>";
		ob_flush();
		print "<div id=\"message\" class=\"updated\" style=\"font-size: 24px;\"><center><p><strong>";
		switch ( $action ) {
			default:
				_e( "Choose proper action.", self::PLUGIN_SLUG );
				break;
			case 'capitalize':
				$c = GFontsDB::ModifyCapitalizeUpperLowerTitles( 'capitalize' );
				printf( _n( "%d title capitalized.", "%d titles capitalized.", $c ), $c );
				break;
			case 'upper':
				$c = GFontsDB::ModifyCapitalizeUpperLowerTitles( 'upper' );
				printf( _n( "%d title uppercased.", "%d titles uppercased.", $c ), $c );
				break;
			case 'lower':
				$c = GFontsDB::ModifyCapitalizeUpperLowerTitles( 'lower' );
				printf( _n( "%d title chalowercasednged.", "%d titles lowercased.", $c ), $c );
				break;
			case 'upperfirst':
				$c = GFontsDB::ModifyCapitalizeUpperLowerTitles( 'upfirst' );
				printf( _n( "%d title changed.", "%d titles changed.", $c ), $c );
				break;
			case 'replace':
				$src = isset( $_GET['src'] ) ? $_GET['src'] : null;
				$dst = isset( $_GET['dst'] ) ? $_GET['dst'] : '';
				if ( $src == '' ) {
					_e( "Text to replace could not be empty.", self::PLUGIN_SLUG );
				} else {
					$c = GFontsDB::ReplaceInTitles( $src, $dst );
					printf( _n( "%d title changed.", "%d titles changed.", $c ), $c );
				}
				break;
		}
		print "</strong></p></center></div>";
		print "<script type=\"text/javascript\">jQuery('#accwait').hide();</script>";
		ob_flush();
	}

	static public function ThemeCustomizator( $wp_customize ) {

		require_once PLUGIN_DIR . '/class/GFonts.CustomizeControl.TextArea.php';
		$wp_customize->add_setting( 'gf_title_font', array( 'default' => '' ) );
		$wp_customize->add_setting( 'gf_title_font_size', array( 'default' => '' ) );
		$wp_customize->add_setting( 'gf_title_font_bold', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_title_font_italic', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_title_font_underline', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_title_font_shadow_vertical', array( 'default' => '' ) );
		$wp_customize->add_setting( 'gf_title_font_shadow_horizontal', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_title_font_shadow_blur', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_title_font_shadow_color', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_title_tagline_font', array( 'default' => '' ) );
		$wp_customize->add_setting( 'gf_title_tagline_font_size', array( 'default' => '' ) );
		$wp_customize->add_setting( 'gf_title_tagline_font_bold', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_title_tagline_font_italic', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_title_tagline_font_underline', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_title_tagline_font_shadow_vertical', array( 'default' => '' ) );
		$wp_customize->add_setting( 'gf_title_tagline_font_shadow_horizontal', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_title_tagline_font_shadow_blur', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_title_tagline_font_shadow_color', array( 'default' => '#000' ) );
		$wp_customize->add_setting( 'gf_title_tagline_font_color', array( 'default' => '#000' ) );

		$locations      = get_registered_nav_menus();
		$menu_locations = get_nav_menu_locations();

		foreach ( $menu_locations as $menu_location => $id ) {
			$wp_customize->add_setting( 'gf_menu_font_name_' . $menu_location, array( 'default' => '' ) );
			$wp_customize->add_setting( 'gf_menu_font_size_' . $menu_location, array( 'default' => '' ) );
			$wp_customize->add_setting( 'gf_menu_font_bold_' . $menu_location, array( 'default' => 0 ) );
			$wp_customize->add_setting( 'gf_menu_font_italic_' . $menu_location, array( 'default' => 0 ) );
			$wp_customize->add_setting( 'gf_menu_font_underline_' . $menu_location, array( 'default' => 0 ) );
			$wp_customize->add_setting( 'gf_menu_font_color_' . $menu_location, array( 'default' => 0 ) );
			$wp_customize->add_setting( 'gf_menu_font_shadow_vertical_' . $menu_location, array( 'default' => '' ) );
			$wp_customize->add_setting( 'gf_menu_font_shadow_horizontal_' . $menu_location, array( 'default' => 0 ) );
			$wp_customize->add_setting( 'gf_menu_font_shadow_blur_' . $menu_location, array( 'default' => 0 ) );
			$wp_customize->add_setting( 'gf_menu_font_shadow_color_' . $menu_location, array( 'default' => 0 ) );
			$wp_customize->add_setting( 'gf_menu_font_hover_name_' . $menu_location, array( 'default' => '' ) );
			$wp_customize->add_setting( 'gf_menu_font_hover_size_' . $menu_location, array( 'default' => '' ) );
			$wp_customize->add_setting( 'gf_menu_font_hover_bold_' . $menu_location, array( 'default' => 0 ) );
			$wp_customize->add_setting( 'gf_menu_font_hover_italic_' . $menu_location, array( 'default' => 0 ) );
			$wp_customize->add_setting( 'gf_menu_font_hover_underline_' . $menu_location, array( 'default' => 0 ) );
			$wp_customize->add_setting( 'gf_menu_font_hover_color_' . $menu_location, array( 'default' => 0 ) );
			$wp_customize->add_setting( 'gf_menu_font_hover_shadow_vertical_' . $menu_location, array( 'default' => '' ) );
			$wp_customize->add_setting( 'gf_menu_font_hover_shadow_horizontal_' . $menu_location, array( 'default' => 0 ) );
			$wp_customize->add_setting( 'gf_menu_font_hover_shadow_blur_' . $menu_location, array( 'default' => 0 ) );
			$wp_customize->add_setting( 'gf_menu_font_hover_shadow_color_' . $menu_location, array( 'default' => 0 ) );
		}

		////////////////////////////////////////////////////////////////////////////////////
		$wp_customize->add_setting( 'gf_post_title_styling_override', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_post_title_styling_override_preset_uuid', array( 'default' => '' ) );
		/////////////////////////////////////// COMMENT ///////////////////////////////////
		$wp_customize->add_setting( 'gf_comment_use_facebook', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_comment_use_facebook_width', array( 'default' => 470 ) );
		$wp_customize->add_setting( 'gf_comment_font_name', array( 'default' => '' ) );
		$wp_customize->add_setting( 'gf_comment_font_size', array( 'default' => '' ) );
		$wp_customize->add_setting( 'gf_comment_font_bold', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_comment_font_italic', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_comment_font_underline', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_comment_font_color', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_comment_font_shadow_vertical', array( 'default' => '' ) );
		$wp_customize->add_setting( 'gf_comment_font_shadow_horizontal', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_comment_font_shadow_blur', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_comment_font_shadow_color', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_comment_textarea_styling', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_comment_submit_radius', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_comment_submit_color', array( 'default' => '' ) );
		$wp_customize->add_setting( 'gf_comment_submit_text_color', array( 'default' => '' ) );
		$wp_customize->add_setting( 'gf_comment_submit_box_shadow_h', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_comment_submit_box_shadow_v', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_comment_submit_box_shadow_blur', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_comment_submit_box_shadow_spread', array( 'default' => 0 ) );
		$wp_customize->add_setting( 'gf_comment_submit_box_shadow_color', array( 'default' => '' ) );
		$wp_customize->add_setting( 'gf_comment_submit_box_float', array( 'default' => '' ) );
		$wp_customize->add_setting( 'gf_comment_submit_box_force_position', array( 'default' => '' ) );
		$wp_customize->add_setting( 'gf_comment_submit_box_force_position_left', array( 'default' => '' ) );
		$wp_customize->add_setting( 'gf_comment_submit_box_force_position_top', array( 'default' => '' ) );
		///////////////////////////////////////////////////////////////////////////////////
		$wp_customize->get_setting( 'blogname' )->transport         = 'refresh';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'refresh';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';
		///////////////////////////////////////////////////////////////////////////////////
		$wp_customize->add_setting( 'gf_custom_theme_css', array( 'default' => '' ) );
		///////////////////////////////////////////////////////////////////////////////////

		$allFonts = GFontsDB::GetInstalledFonts();
		$choices  = array( '' => '' );
		foreach ( $allFonts as $font ) {
			$choices[ $font->name ] = $font->name;
		}

		$stFonts = self::StandardFonts();
		foreach ( $stFonts as $font ) {
			$choices[ $font ] = $font;
		}

		$wp_customize->add_control( 'gf_title_font', array(
				'label'    => 'Power Posts Title Font',
				'section'  => 'title_tagline',
				'type'     => 'select',
				'choices'  => $choices,
				'priority' => 100
			)
		);

		$wp_customize->add_control( 'gf_title_tagline_font', array(
				'label'    => 'Power Posts Tagline Font',
				'section'  => 'title_tagline',
				'type'     => 'select',
				'choices'  => $choices,
				'priority' => 200
			)
		);

		$sizesArray = array( '' => '' );
		for ( $s = 8; $s <= 120; $s ++ ) {
			$sizesArray[ $s . "px" ] = $s . "px";
		}
		$fullSizesArray = array( '' => '' );
		for ( $s = 1; $s <= 120; $s ++ ) {
			$fullSizesArray[ $s . "px" ] = $s . "px";
		}
		$wp_customize->add_control( 'gf_title_font_size', array(
				'label'    => 'Power Posts Title Font Size',
				'section'  => 'title_tagline',
				'type'     => 'select',
				'choices'  => $sizesArray,
				'priority' => 101
			)
		);
		$wp_customize->add_control( 'gf_title_font_bold', array(
				'label'    => 'Power Posts Title Bold',
				'section'  => 'title_tagline',
				'type'     => 'checkbox',
				'priority' => 102
			)
		);

		$wp_customize->add_control( 'gf_title_font_italic', array(
				'label'    => 'Power Posts Title italic',
				'section'  => 'title_tagline',
				'type'     => 'checkbox',
				'priority' => 103
			)
		);

		$wp_customize->add_control( 'gf_title_font_underline', array(
				'label'    => 'Power Posts Title Underline',
				'section'  => 'title_tagline',
				'type'     => 'checkbox',
				'priority' => 104
			)
		);

		$wp_customize->add_control( 'gf_title_tagline_font_size', array(
				'label'    => 'Power Posts Tagline Font Size',
				'section'  => 'title_tagline',
				'type'     => 'select',
				'choices'  => $sizesArray,
				'priority' => 201
			)
		);
		$wp_customize->add_control( 'gf_title_tagline_font_bold', array(
				'label'    => 'Power Posts Tagline Bold',
				'section'  => 'title_tagline',
				'type'     => 'checkbox',
				'priority' => 202
			)
		);

		$wp_customize->add_control( 'gf_title_tagline_font_italic', array(
				'label'    => 'Power Posts Tagline italic',
				'section'  => 'title_tagline',
				'type'     => 'checkbox',
				'priority' => 203
			)
		);

		$wp_customize->add_control( 'gf_title_tagline_font_underline', array(
				'label'    => 'Power Posts Tagline Underline',
				'section'  => 'title_tagline',
				'type'     => 'checkbox',
				'priority' => 204
			)
		);

		$shadowsVertical = array( '' => '' );
		for ( $v = - 1; $v >= - 30; $v -- ) {
			$shadowsVertical[ $v ] = __( "Left", self::PLUGIN_SLUG ) . " " . $v;
		}
		for ( $v = 1; $v <= 30; $v ++ ) {
			$shadowsVertical[ $v ] = __( "Right", self::PLUGIN_SLUG ) . " +" . $v;
		}

		$wp_customize->add_control( 'gf_title_font_shadow_vertical', array(
				'label'    => 'Power Posts Title Font Shadow Vertical',
				'section'  => 'title_tagline',
				'type'     => 'select',
				'choices'  => $shadowsVertical,
				'priority' => 105
			)
		);

		$wp_customize->add_control( 'gf_title_tagline_font_shadow_vertical', array(
				'label'    => 'Power Posts Tagline Font Shadow Vertical',
				'section'  => 'title_tagline',
				'type'     => 'select',
				'choices'  => $shadowsVertical,
				'priority' => 205
			)
		);

		$shadowsHorizontal = array( '' => '' );
		for ( $v = - 1; $v >= - 30; $v -- ) {
			$shadowsHorizontal[ $v ] = __( "Over", self::PLUGIN_SLUG ) . " " . $v;
		}
		for ( $v = 1; $v <= 30; $v ++ ) {
			$shadowsHorizontal[ $v ] = __( "Under", self::PLUGIN_SLUG ) . " +" . $v;
		}

		$wp_customize->add_control( 'gf_title_font_shadow_horizontal', array(
				'label'    => 'Power Posts Title Font Shadow Horizontal',
				'section'  => 'title_tagline',
				'type'     => 'select',
				'choices'  => $shadowsHorizontal,
				'priority' => 106
			)
		);

		$wp_customize->add_control( 'gf_title_tagline_font_shadow_horizontal', array(
				'label'    => 'Power Posts Tagline Font Shadow Horizontal',
				'section'  => 'title_tagline',
				'type'     => 'select',
				'choices'  => $shadowsHorizontal,
				'priority' => 206
			)
		);

		$shadowsBlur    = array();
		$shadowsBlur[0] = __( "No blur", self::PLUGIN_SLUG );
		for ( $i = 1; $i < 50; $i ++ ) {
			$shadowsBlur[ $i ] = __( "More", self::PLUGIN_SLUG ) . " +" . $i;
		}

		$wp_customize->add_control( 'gf_title_font_shadow_blur', array(
				'label'    => 'Power Posts Title Font Shadow Blur',
				'section'  => 'title_tagline',
				'type'     => 'select',
				'choices'  => $shadowsBlur,
				'priority' => 107
			)
		);

		$wp_customize->add_control( 'gf_title_tagline_font_shadow_blur', array(
				'label'    => 'Power Posts Tagline Font Shadow Blur',
				'section'  => 'title_tagline',
				'type'     => 'select',
				'choices'  => $shadowsBlur,
				'priority' => 207
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 'gf_title_tagline_font_color', array(
				'label'    => __( 'Power Posts Tagline color', self::PLUGIN_SLUG ),
				'section'  => 'colors',
				'settings' => 'gf_title_tagline_font_color',
				'priority' => 100
			) )
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 'gf_title_font_shadow_color', array(
				'label'    => __( 'Power Posts Title shadow color', self::PLUGIN_SLUG ),
				'section'  => 'colors',
				'settings' => 'gf_title_font_shadow_color',
				'default'  => '#FFF',
				'priority' => 100
			) )
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 'gf_title_tagline_font_shadow_color', array(
				'label'    => __( 'Power Posts Tagline shadow color', self::PLUGIN_SLUG ),
				'section'  => 'colors',
				'settings' => 'gf_title_tagline_font_shadow_color',
				'default'  => '#FFF',
				'priority' => 200
			) )
		);

		foreach ( $menu_locations as $menu_location => $id ) {
			$wp_customize->add_section( 'gf_menu_font_' . $menu_location, array(
					'title'    => __( "Power Posts " . $locations[ $menu_location ] . " Fonts", self::PLUGIN_SLUG ),
					'priority' => 50
				)
			);

			$wp_customize->add_control( 'gf_menu_font_name_' . $menu_location, array(
					'label'    => 'Power Posts Item Font',
					'section'  => 'gf_menu_font_' . $menu_location,
					'type'     => 'select',
					'choices'  => $choices,
					'priority' => 100
				)
			);

			$wp_customize->add_control( 'gf_menu_font_size_' . $menu_location, array(
					'label'    => 'Power Posts Item Font Size',
					'section'  => 'gf_menu_font_' . $menu_location,
					'type'     => 'select',
					'choices'  => $sizesArray,
					'priority' => 101
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'gf_menu_font_color_' . $menu_location, array(
					'label'    => __( 'Power Posts Menu Item Color', self::PLUGIN_SLUG ),
					'section'  => 'gf_menu_font_' . $menu_location,
					'settings' => 'gf_menu_font_color_' . $menu_location,
					'default'  => '#FFF',
					'priority' => 103
				) )
			);

			$wp_customize->add_control( 'gf_menu_font_bold_' . $menu_location, array(
					'label'    => 'Power Posts Menu Item Bold',
					'section'  => 'gf_menu_font_' . $menu_location,
					'type'     => 'checkbox',
					'priority' => 104
				)
			);

			$wp_customize->add_control( 'gf_menu_font_italic_' . $menu_location, array(
					'label'    => 'Power Posts Menu Item italic',
					'section'  => 'gf_menu_font_' . $menu_location,
					'type'     => 'checkbox',
					'priority' => 105
				)
			);

			$wp_customize->add_control( 'gf_menu_font_underline_' . $menu_location, array(
					'label'    => 'Power Posts Menu Item Underline',
					'section'  => 'gf_menu_font_' . $menu_location,
					'type'     => 'checkbox',
					'priority' => 106
				)
			);

			$wp_customize->add_control( 'gf_menu_font_shadow_vertical_' . $menu_location, array(
					'label'    => 'Power Posts Title Font Shadow Vertical',
					'section'  => 'gf_menu_font_' . $menu_location,
					'type'     => 'select',
					'choices'  => $shadowsVertical,
					'priority' => 107
				)
			);
			$wp_customize->add_control( 'gf_menu_font_shadow_horizontal_' . $menu_location, array(
					'label'    => 'Power Posts Title Font Shadow Horizontal',
					'section'  => 'gf_menu_font_' . $menu_location,
					'type'     => 'select',
					'choices'  => $shadowsHorizontal,
					'priority' => 108
				)
			);
			$wp_customize->add_control( 'gf_menu_font_shadow_blur_' . $menu_location, array(
					'label'    => 'Power Posts Title Font Shadow Blur',
					'section'  => 'gf_menu_font_' . $menu_location,
					'type'     => 'select',
					'choices'  => $shadowsBlur,
					'priority' => 109
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'gf_menu_font_shadow_color_' . $menu_location, array(
					'label'    => __( 'Power Posts Title shadow color', self::PLUGIN_SLUG ),
					'section'  => 'gf_menu_font_' . $menu_location,
					'settings' => 'gf_menu_font_shadow_color_' . $menu_location,
					'default'  => '#FFF',
					'priority' => 110
				) )
			);

			/////////////////////////////////////////////////////////////////////
			$wp_customize->add_section( 'gf_menu_font_hover_' . $menu_location, array(
					'title'    => __( "Power Posts Hover " . $locations[ $menu_location ] . " Fonts", self::PLUGIN_SLUG ),
					'priority' => 51
				)
			);

			$wp_customize->add_control( 'gf_menu_font_hover_name_' . $menu_location, array(
					'label'    => 'Power Posts Hover Item Font',
					'section'  => 'gf_menu_font_hover_' . $menu_location,
					'type'     => 'select',
					'choices'  => $choices,
					'priority' => 100
				)
			);

			$wp_customize->add_control( 'gf_menu_font_hover_size_' . $menu_location, array(
					'label'    => 'Power Posts Hover Item Font Size',
					'section'  => 'gf_menu_font_hover_' . $menu_location,
					'type'     => 'select',
					'choices'  => $sizesArray,
					'priority' => 101
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'gf_menu_font_hover_color_' . $menu_location, array(
					'label'    => __( 'Power Posts Hover Menu Item Color', self::PLUGIN_SLUG ),
					'section'  => 'gf_menu_font_hover_' . $menu_location,
					'settings' => 'gf_menu_font_hover_color_' . $menu_location,
					'default'  => '#FFF',
					'priority' => 103
				) )
			);

			$wp_customize->add_control( 'gf_menu_font_hover_bold_' . $menu_location, array(
					'label'    => 'Power Posts Hover Menu Item Bold',
					'section'  => 'gf_menu_font_hover_' . $menu_location,
					'type'     => 'checkbox',
					'priority' => 104
				)
			);

			$wp_customize->add_control( 'gf_menu_font_hover_italic_' . $menu_location, array(
					'label'    => 'Power Posts Hover Menu Item italic',
					'section'  => 'gf_menu_font_hover_' . $menu_location,
					'type'     => 'checkbox',
					'priority' => 105
				)
			);

			$wp_customize->add_control( 'gf_menu_font_hover_underline_' . $menu_location, array(
					'label'    => 'Power Posts Hover Menu Item Underline',
					'section'  => 'gf_menu_font_hover_' . $menu_location,
					'type'     => 'checkbox',
					'priority' => 106
				)
			);

			$wp_customize->add_control( 'gf_menu_font_hover_shadow_vertical_' . $menu_location, array(
					'label'    => 'Power Posts Hover Title Font Shadow Vertical',
					'section'  => 'gf_menu_font_hover_' . $menu_location,
					'type'     => 'select',
					'choices'  => $shadowsVertical,
					'priority' => 107
				)
			);
			$wp_customize->add_control( 'gf_menu_font_hover_shadow_horizontal_' . $menu_location, array(
					'label'    => 'Power Posts Hover Title Font Shadow Horizontal',
					'section'  => 'gf_menu_font_hover_' . $menu_location,
					'type'     => 'select',
					'choices'  => $shadowsHorizontal,
					'priority' => 108
				)
			);
			$wp_customize->add_control( 'gf_menu_font_hover_shadow_blur_' . $menu_location, array(
					'label'    => 'Power Posts Hover Title Font Shadow Blur',
					'section'  => 'gf_menu_font_hover_' . $menu_location,
					'type'     => 'select',
					'choices'  => $shadowsBlur,
					'priority' => 109
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'gf_menu_font_hover_shadow_color_' . $menu_location, array(
					'label'    => __( 'Power Posts Title shadow color', self::PLUGIN_SLUG ),
					'section'  => 'gf_menu_font_hover_' . $menu_location,
					'settings' => 'gf_menu_font_hover_shadow_color_' . $menu_location,
					'default'  => '#FFF',
					'priority' => 110
				) )
			);
		}
		/////////////////////////////////////////////////////////////////////
		$wp_customize->add_section( 'gf_post_title_fonts', array(
			'title'    => __( "Power Posts Post Title Styles", self::PLUGIN_SLUG ),
			'priority' => 52
		) );
		$wp_customize->add_control( 'gf_post_title_styling_override', array(
				'label'    => 'Override post title styling',
				'section'  => 'gf_post_title_fonts',
				'type'     => 'checkbox',
				'priority' => 111
			)
		);

		$presets = GFontsDB::LoadTitlePresets();

		$options = array();
		foreach ( $presets as $preset ) {
			$options[ $preset->uuid ] = $preset->name;
		}

		$wp_customize->add_control( 'gf_post_title_styling_override_preset_uuid', array(
				'label'    => 'Preset name',
				'section'  => 'gf_post_title_fonts',
				'type'     => 'select',
				'choices'  => $options,
				'priority' => 112
			)
		);
		///////////////////////// COMMENTS //////////////////////////////////

		$wp_customize->add_section( 'gf_comment_font', array(
				'title'    => __( "Power Posts Comment Box Style", self::PLUGIN_SLUG ),
				'priority' => 53
			)
		);

		$wp_customize->add_control( 'gf_comment_use_facebook', array(
				'label'    => 'Power Posts Use Facebook Comments',
				'section'  => 'gf_comment_font',
				'type'     => 'checkbox',
				'priority' => 90
			)
		);

		$wp_customize->add_control( 'gf_comment_use_facebook_width', array(
				'label'    => 'Power Posts Facebook Comments Width (in px)',
				'section'  => 'gf_comment_font',
				'type'     => 'text',
				'priority' => 91
			)
		);

		$wp_customize->add_control( 'gf_comment_font_name', array(
				'label'    => 'Power Posts Comment Fonts',
				'section'  => 'gf_comment_font',
				'type'     => 'select',
				'choices'  => $choices,
				'priority' => 100
			)
		);

		$wp_customize->add_control( 'gf_comment_font_size', array(
				'label'    => 'Power Posts Comment Font Size',
				'section'  => 'gf_comment_font',
				'type'     => 'select',
				'choices'  => $sizesArray,
				'priority' => 101
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 'gf_comment_font_color', array(
				'label'    => __( 'Power Posts Comment Font Color', self::PLUGIN_SLUG ),
				'section'  => 'gf_comment_font',
				'settings' => 'gf_comment_font_color',
				'default'  => '#FFF',
				'priority' => 103
			) )
		);

		$wp_customize->add_control( 'gf_comment_font_bold', array(
				'label'    => 'Power Posts Comment Font Bold',
				'section'  => 'gf_comment_font',
				'type'     => 'checkbox',
				'priority' => 104
			)
		);

		$wp_customize->add_control( 'gf_comment_font_italic', array(
				'label'    => 'Power Posts Comment Font italic',
				'section'  => 'gf_comment_font',
				'type'     => 'checkbox',
				'priority' => 105
			)
		);

		$wp_customize->add_control( 'gf_comment_font_underline', array(
				'label'    => 'Power Posts Comment Font Underline',
				'section'  => 'gf_comment_font',
				'type'     => 'checkbox',
				'priority' => 106
			)
		);

		$wp_customize->add_control( 'gf_comment_font_shadow_vertical', array(
				'label'    => 'Power Posts Comment Font Shadow Vertical',
				'section'  => 'gf_comment_font',
				'type'     => 'select',
				'choices'  => $shadowsVertical,
				'priority' => 107
			)
		);
		$wp_customize->add_control( 'gf_comment_font_shadow_horizontal', array(
				'label'    => 'Power Posts Comment  Font Shadow Horizontal',
				'section'  => 'gf_comment_font',
				'type'     => 'select',
				'choices'  => $shadowsHorizontal,
				'priority' => 108
			)
		);
		$wp_customize->add_control( 'gf_comment_font_shadow_blur', array(
				'label'    => 'Power Posts Comment Font Shadow Blur',
				'section'  => 'gf_comment_font',
				'type'     => 'select',
				'choices'  => $shadowsBlur,
				'priority' => 109
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 'gf_comment_font_shadow_color', array(
				'label'    => __( 'Power Posts Comment shadow color', self::PLUGIN_SLUG ),
				'section'  => 'gf_comment_font',
				'settings' => 'gf_comment_font_shadow_color',
				'default'  => '#FFF',
				'priority' => 110
			) )
		);
		$wp_customize->add_control( 'gf_comment_textarea_styling', array(
				'label'    => 'Power Posts Text input styling',
				'section'  => 'gf_comment_font',
				'type'     => 'checkbox',
				'priority' => 111
			)
		);

		$radiuses[0] = __( "None", self::PLUGIN_SLUG );
		for ( $i = 1; $i <= 50; $i ++ ) {
			$radiuses[ $i ] = __( "More", self::PLUGIN_SLUG ) . " +" . $i;
		}

		$wp_customize->add_control( 'gf_comment_submit_radius', array(
				'label'    => 'Power Posts Button rounding corners',
				'section'  => 'gf_comment_font',
				'type'     => 'select',
				'choices'  => $radiuses,
				'priority' => 112
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 'gf_comment_submit_color', array(
				'label'    => __( 'Power Posts Button color', self::PLUGIN_SLUG ),
				'section'  => 'gf_comment_font',
				'settings' => 'gf_comment_submit_color',
				'default'  => '#FFF',
				'priority' => 113
			) )
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 'gf_comment_submit_text_color', array(
				'label'    => __( 'Power Posts Button text color', self::PLUGIN_SLUG ),
				'section'  => 'gf_comment_font',
				'settings' => 'gf_comment_submit_text_color',
				'default'  => '#FFF',
				'priority' => 113
			) )
		);

		$wp_customize->add_control( 'gf_comment_submit_box_shadow_v', array(
				'label'    => 'Power Posts Comment Box Shadow Vertical',
				'section'  => 'gf_comment_font',
				'type'     => 'select',
				'choices'  => $shadowsVertical,
				'priority' => 114
			)
		);
		$wp_customize->add_control( 'gf_comment_submit_box_shadow_h', array(
				'label'    => 'Power Posts Comment Box Shadow Horizontal',
				'section'  => 'gf_comment_font',
				'type'     => 'select',
				'choices'  => $shadowsHorizontal,
				'priority' => 115
			)
		);
		$wp_customize->add_control( 'gf_comment_submit_box_shadow_blur', array(
				'label'    => 'Power Posts Comment Box Shadow Blur',
				'section'  => 'gf_comment_font',
				'type'     => 'select',
				'choices'  => $shadowsBlur,
				'priority' => 116
			)
		);

		$shadowsSpread    = array();
		$shadowsSpread[0] = __( "No spread", self::PLUGIN_SLUG );
		for ( $i = 1; $i < 50; $i ++ ) {
			$shadowsSpread[ $i ] = __( "More", self::PLUGIN_SLUG ) . " +" . $i;
		}

		$wp_customize->add_control( 'gf_comment_submit_box_shadow_spread', array(
				'label'    => 'Power Posts Comment Box Shadow Spread',
				'section'  => 'gf_comment_font',
				'type'     => 'select',
				'choices'  => $shadowsSpread,
				'priority' => 117
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 'gf_comment_submit_box_shadow_color', array(
				'label'    => __( 'Power Posts Button shadow color', self::PLUGIN_SLUG ),
				'section'  => 'gf_comment_font',
				'settings' => 'gf_comment_submit_box_shadow_color',
				'default'  => '#FFF',
				'priority' => 118
			) )
		);

		$floats['']      = __( "Default", self::PLUGIN_SLUG );
		$floats['left']  = __( "Left", self::PLUGIN_SLUG );
		$floats['right'] = __( "Right", self::PLUGIN_SLUG );

		$wp_customize->add_control( 'gf_comment_submit_box_float', array(
				'label'    => __( 'Power Posts Button align', self::PLUGIN_SLUG ),
				'section'  => 'gf_comment_font',
				'type'     => 'select',
				'choices'  => $floats,
				'priority' => 119
			)
		);
		$wp_customize->add_control( 'gf_comment_submit_box_force_position', array(
				'label'    => __( 'Power Posts Button force position', self::PLUGIN_SLUG ),
				'section'  => 'gf_comment_font',
				'type'     => 'checkbox',
				'priority' => 120
			)
		);

		$wp_customize->add_control( 'gf_comment_submit_box_force_position_left', array(
				'label'    => 'Power Posts Button left margin (in px)',
				'section'  => 'gf_comment_font',
				'type'     => 'text',
				'priority' => 121
			)
		);

		$wp_customize->add_control( 'gf_comment_submit_box_force_position_top', array(
				'label'    => 'Power Posts Button top margin (in px)',
				'section'  => 'gf_comment_font',
				'type'     => 'text',
				'priority' => 122
			)
		);

		/////////////////////////////////////////////////////////////////////
		//////////////////////////// SIDEBARS ///////////////////////////////

		$aligns['']       = __( "Default", self::PLUGIN_SLUG );
		$aligns['left']   = __( "Left", self::PLUGIN_SLUG );
		$aligns['right']  = __( "Right", self::PLUGIN_SLUG );
		$aligns['center'] = __( "Center", self::PLUGIN_SLUG );

		global $wp_registered_sidebars;
		$index = 0;
		foreach ( $wp_registered_sidebars as $id => $sidebar ) {
			$sname = $sidebar['name'];
			if ( strpos( strtolower( $sname ), 'sidebar' ) === false ) {
				$sname .= ' Sidebar';
			}

			$wp_customize->add_section( 'gf_custom_widget_' . $id, array(
					'title'    => 'Power Posts ' . $sname,
					'priority' => ( 200 + $index ++ )
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_font_name', array( 'default' => '' ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_font_name', array(
					'label'    => 'Power Posts Title Font',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $choices,
					'priority' => 100
				)
			);
			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_font_size', array( 'default' => '' ) );

			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_font_size', array(
					'label'    => 'Power Posts Title Font Size',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $sizesArray,
					'priority' => 101
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_text_align', array( 'default' => '' ) );

			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_text_align', array(
					'label'    => 'Power Posts Title Text Align',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $aligns,
					'priority' => 102
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_text_padding_top', array( 'default' => 0 ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_text_padding_top', array(
					'label'    => 'Power Posts Title Top Padding',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $fullSizesArray,
					'priority' => 103
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_text_padding_bottom', array( 'default' => 0 ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_text_padding_bottom', array(
					'label'    => 'Power Posts Title Bottom Padding',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $fullSizesArray,
					'priority' => 104
				)
			);


			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_font_color', array( 'default' => '' ) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'gf_custom_widget_' . $id . '_font_color', array(
					'label'    => __( 'Power Posts Title Font Color', self::PLUGIN_SLUG ),
					'section'  => 'gf_custom_widget_' . $id,
					'settings' => 'gf_custom_widget_' . $id . '_font_color',
					'default'  => '#FFF',
					'priority' => 113
				) )
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_font_bold', array( 'default' => '' ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_font_bold', array(
					'label'    => 'Power Posts Title Font Bold',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'checkbox',
					'priority' => 114
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_font_italic', array( 'default' => '' ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_font_italic', array(
					'label'    => 'Power Posts Title Font Italic',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'checkbox',
					'priority' => 115
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_font_underline', array( 'default' => '' ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_font_underline', array(
					'label'    => 'Power Posts Title Font Underline',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'checkbox',
					'priority' => 116
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_font_shadow_vertical', array( 'default' => '' ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_font_shadow_vertical', array(
					'label'    => 'Power Posts Title Font Shadow Vertical',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $shadowsVertical,
					'priority' => 117
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_font_shadow_horizontal', array( 'default' => '' ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_font_shadow_horizontal', array(
					'label'    => 'Power Posts Title Font Shadow Horizontal',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $shadowsHorizontal,
					'priority' => 118
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_font_shadow_blur', array( 'default' => '' ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_font_shadow_blur', array(
					'label'    => 'Power Posts Title Font Shadow Blur',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $shadowsBlur,
					'priority' => 119
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_font_shadow_color', array( 'default' => '' ) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'gf_custom_widget_' . $id . '_font_shadow_color', array(
					'label'    => __( 'Power Posts Title Shadow color', self::PLUGIN_SLUG ),
					'section'  => 'gf_custom_widget_' . $id,
					'settings' => 'gf_custom_widget_' . $id . '_font_shadow_color',
					'default'  => '#FFF',
					'priority' => 120
				) )
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_background_color', array( 'default' => '' ) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'gf_custom_widget_' . $id . '_background_color', array(
					'label'    => __( 'Power Posts Title Background color', self::PLUGIN_SLUG ),
					'section'  => 'gf_custom_widget_' . $id,
					'settings' => 'gf_custom_widget_' . $id . '_background_color',
					'default'  => '#FFF',
					'priority' => 121
				) )
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_top_left_radius', array( 'default' => 0 ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_top_left_radius', array(
					'label'    => 'Power Posts Title Top Left Corner Round',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $radiuses,
					'priority' => 1221
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_top_right_radius', array( 'default' => 0 ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_top_right_radius', array(
					'label'    => 'Power Posts Title Top Right Corner Round',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $radiuses,
					'priority' => 123
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_bottom_right_radius', array( 'default' => 0 ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_bottom_right_radius', array(
					'label'    => 'Power Posts Title Bottom Right Corner Round',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $radiuses,
					'priority' => 124
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_bottom_left_radius', array( 'default' => 0 ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_bottom_left_radius', array(
					'label'    => 'Power Posts Title Bottom Left Corner Round',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $radiuses,
					'priority' => 125
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_content_font_name', array( 'default' => '' ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_content_font_name', array(
					'label'    => 'Power Posts Content Font',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $choices,
					'priority' => 200
				)
			);
			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_content_font_size', array( 'default' => '' ) );

			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_content_font_size', array(
					'label'    => 'Power Posts Content Font Size',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $sizesArray,
					'priority' => 201
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_content_text_align', array( 'default' => '' ) );

			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_content_text_align', array(
					'label'    => 'Power Posts Content Text Align',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $aligns,
					'priority' => 202
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_content_text_left_margin', array( 'default' => '' ) );

			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_content_text_left_margin', array(
					'label'    => 'Power Posts Content Text Left Margin',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $fullSizesArray,
					'priority' => 203
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_content_text_right_margin', array( 'default' => '' ) );

			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_content_text_right_margin', array(
					'label'    => 'Power Posts Content Text Right Margin',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $fullSizesArray,
					'priority' => 203
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_content_font_color', array( 'default' => '' ) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'gf_custom_widget_' . $id . '_content_font_color', array(
					'label'    => __( 'Power Posts Content Font Color', self::PLUGIN_SLUG ),
					'section'  => 'gf_custom_widget_' . $id,
					'settings' => 'gf_custom_widget_' . $id . '_content_font_color',
					'default'  => '#FFF',
					'priority' => 204
				) )
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_content_font_bold', array( 'default' => '' ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_content_font_bold', array(
					'label'    => 'Power Posts Content Font Bold',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'checkbox',
					'priority' => 205
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_content_font_italic', array( 'default' => '' ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_content_font_italic', array(
					'label'    => 'Power Posts Content Font Italic',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'checkbox',
					'priority' => 206
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_content_font_underline', array( 'default' => '' ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_content_font_underline', array(
					'label'    => 'Power Posts Content Font Underline',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'checkbox',
					'priority' => 207
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_content_font_shadow_vertical', array( 'default' => '' ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_content_font_shadow_vertical', array(
					'label'    => 'Power Posts Content Font Shadow Vertical',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $shadowsVertical,
					'priority' => 208
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_content_font_shadow_horizontal', array( 'default' => '' ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_content_font_shadow_horizontal', array(
					'label'    => 'Power Posts Content Font Shadow Horizontal',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $shadowsHorizontal,
					'priority' => 209
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_content_font_shadow_blur', array( 'default' => '' ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_content_font_shadow_blur', array(
					'label'    => 'Power Posts Content Font Shadow Blur',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $shadowsBlur,
					'priority' => 210
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_content_font_shadow_color', array( 'default' => '' ) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'gf_custom_widget_' . $id . '_content_font_shadow_color', array(
					'label'    => __( 'Power Posts Content Shadow color', self::PLUGIN_SLUG ),
					'section'  => 'gf_custom_widget_' . $id,
					'settings' => 'gf_custom_widget_' . $id . '_content_font_shadow_color',
					'default'  => '#FFF',
					'priority' => 211
				) )
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_content_background_color', array( 'default' => '' ) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize, 'gf_custom_widget_' . $id . '_content_background_color', array(
					'label'    => __( 'Power Posts Content Background color', self::PLUGIN_SLUG ),
					'section'  => 'gf_custom_widget_' . $id,
					'settings' => 'gf_custom_widget_' . $id . '_content_background_color',
					'default'  => '#FFF',
					'priority' => 212
				) )
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_content_top_left_radius', array( 'default' => 0 ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_content_top_left_radius', array(
					'label'    => 'Power Posts Content Top Left Corner Round',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $radiuses,
					'priority' => 213
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_content_top_right_radius', array( 'default' => 0 ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_content_top_right_radius', array(
					'label'    => 'Power Posts Content Top Right Corner Round',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $radiuses,
					'priority' => 214
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_content_bottom_right_radius', array( 'default' => 0 ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_content_bottom_right_radius', array(
					'label'    => 'Power Posts Content Bottom Right Corner Round',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $radiuses,
					'priority' => 215
				)
			);

			$wp_customize->add_setting( 'gf_custom_widget_' . $id . '_content_bottom_left_radius', array( 'default' => 0 ) );
			$wp_customize->add_control( 'gf_custom_widget_' . $id . '_content_bottom_left_radius', array(
					'label'    => 'Power Posts Content Bottom Left Corner Round',
					'section'  => 'gf_custom_widget_' . $id,
					'type'     => 'select',
					'choices'  => $radiuses,
					'priority' => 216
				)
			);
		}
		/////////////////////////////////////////////////////////////////////
		$wp_customize->add_section( 'gf_custom_css_section', array(
				'title'    => __( "Power Posts Custom CSS", self::PLUGIN_SLUG ),
				'priority' => 300
			)
		);

		$wp_customize->add_control( new GFonts_Customize_Textarea_Control( $wp_customize, 'gf_custom_theme_css', array(
			'label'    => 'Extra CSS',
			'section'  => 'gf_custom_css_section',
			'settings' => 'gf_custom_theme_css',
		) ) );
	}

	static public function CustomizeTemplate() {
		print "\r\n<style type=\"text/css\">";
		$_r = $_REQUEST;
		if ( isset( $_r['wp_customize'] ) && ( $_r['wp_customize'] == 'on' ) ) {
			$s          = stripslashes( $_r['customized'] );
			$customized = json_decode( $s );
			$style      = self::LiveTitleCustomization( $customized );
			$style2     = self::LiveDescriptionCustomization( $customized );
			$style3     = self::LiveMenuItemCustomization( $customized );
			$style4     = self::LiveHoverMenuItemCustomization( $customized );
			$style5     = self::LiveCommentBoxCustomization( $customized );
			$style6     = self::LiveCommentBoxSubmitCustomization( $customized );
			$style7     = self::LiveSidebarsCustomization( $customized );
		} else {
			$style  = '';
			$stylecss = self::ThemeTitleCustomization();
			if ( $stylecss['modified'] ) {
				$style = $stylecss['css'];
			}
			$style2 = '';
			$style2css = self::ThemeDescriptionCustomization();
			if ( $style2css['modified'] ) {
				$style2 = $style2css['css'];
			}
			$style3 = '';
			$style3css = self::ThemeMenuItemCustomization();
			if ( $style3css['modified'] ) {
				$style3 = $style3css['css'];
			}
			$style4 = '';
			$style4css = self::ThemeHoverMenuItemCustomization();
			if ( $style4css['modified'] ) {
				$style4 = $style4css['css'];
			}
			$style5 = '';
			$style5css = self::ThemeCommentBoxCustomization();
			if ( $style5css['modified'] ) {
				$style5 = $style5css['css'];
			}
			$style6 = '';
			$style6css = self::ThemeCommentBoxSubmitCustomization();
			if ( $style6css['modified'] ) {
				$style6 = $style6css['css'];
			}
			$style7 = '';
			$style7css = self::ThemeSidebarsCustomization();
			if ( $style7css['modified'] ) {
				$style7 = $style7css['css'];
			}
		}
		self::$titleCustomized = false;
		self::$titleDescriptionCustomized = false;

		if ( !empty( $style) ) {
			print ".gftitle_customized {" . $style . "}\r\n";
			self::$titleCustomized = ( 'font-weight: normal!important; font-style: normal!important; text-decoration: none!important; ' !== $style );
		}
		if ( !empty( $style2 ) ) {
			print ".gfdescription_customized {" . $style2 . "}\r\n";
			self::$titleDescriptionCustomized = true;
		}
		//print ".gfcustomizedmenu  li a{" . $style3 . "}\r\n";
		print $style3 . "\r\n";
		print $style4 . "\r\n";
		//print ".gfcustomizedmenu li a:hover {" . $style4 . "}\r\n";

		$textareastyling = get_theme_mod( 'gf_comment_textarea_styling' );
		if ( $textareastyling ) {
			$textarea = ",#gfcustomizedcomments textarea";
		} else {
			$textarea = "";
		}
		if ( '' !== $textarea || '' !== $style5 ) {
			print "#gfcustomizedcomments, #gfcustomizedcomments h1,#gfcustomizedcomments h2,#gfcustomizedcomments h3,#gfcustomizedcomments div,#gfcustomizedcomments p,#gfcustomizedcomments span" . $textarea . ",#gfcustomizedcomments input[type=\"submit\"], #gfcustomizedcomments a{" . $style5 . "}\r\n";
		}

		if ( $style6 != '' ) {
			print "#gfcustomizedcomments input[type=\"submit\"] { " . $style6 . " }\r\n";
		}
		if ( $style7 != '' ) {
			print $style7;
		}

		print "</style>\r\n";
	}

	static public function LiveTitleCustomization( $customized ) {
		$ctf   = isset( $customized->gf_title_font ) ? $customized->gf_title_font
			: get_theme_mod( 'gf_title_font' );
		$ctfs  = isset( $customized->gf_title_font_size ) ? $customized->gf_title_font_size
			: get_theme_mod( 'gf_title_font_size' );
		$ctfb  = isset( $customized->gf_title_font_bold ) ? ( $customized->gf_title_font_bold
			? 1 : 0 ) : get_theme_mod( 'gf_title_font_bold' );
		$ctfi  = isset( $customized->gf_title_font_italic ) ? ( $customized->gf_title_font_italic
			? 1 : 0 ) : get_theme_mod( 'gf_title_font_italic' );
		$ctfu  = isset( $customized->gf_title_font_underline ) ? ( $customized->gf_title_font_underline
			? 1 : 0 ) : get_theme_mod( 'gf_title_font_underline' );
		$ctfc  = '';
		$ctfsv = isset( $customized->gf_title_font_shadow_vertical ) ? $customized->gf_title_font_shadow_vertical
			: get_theme_mod( 'gf_title_font_shadow_vertical' );
		$ctfsh = isset( $customized->gf_title_font_shadow_horizontal ) ? $customized->gf_title_font_shadow_horizontal
			: get_theme_mod( 'gf_title_font_shadow_horizontal' );
		$ctfsb = isset( $customized->gf_title_font_shadow_blur ) ? $customized->gf_title_font_shadow_blur
			: get_theme_mod( 'gf_title_font_shadow_blur' );
		$ctfsc = isset( $customized->gf_title_font_shadow_color ) ? $customized->gf_title_font_shadow_color
			: get_theme_mod( 'gf_title_font_shadow_color' );

		$styles = self::BuildTitleStyles( $ctf, $ctfs, $ctfc, $ctfb, $ctfi, $ctfu, $ctfsv, $ctfsh, $ctfsb, $ctfsc, '!important' );

		return $styles;
	}

	static public function LiveDescriptionCustomization( $customized ) {
		$ctf   = isset( $customized->gf_title_tagline_font ) ? $customized->gf_title_tagline_font
			: get_theme_mod( 'gf_title_tagline_font' );
		$ctfs  = isset( $customized->gf_title_tagline_font_size ) ? $customized->gf_title_tagline_font_size
			: get_theme_mod( 'gf_title_tagline_font_size' );
		$ctfb  = isset( $customized->gf_title_tagline_font_bold ) ? ( $customized->gf_title_tagline_font_bold
			? 1 : 0 ) : get_theme_mod( 'gf_title_tagline_font_bold' );
		$ctfi  = isset( $customized->gf_title_tagline_font_italic ) ? ( $customized->gf_title_tagline_font_italic
			? 1 : 0 ) : get_theme_mod( 'gf_title_tagline_font_italic' );
		$ctfu  = isset( $customized->gf_title_tagline_font_underline ) ? ( $customized->gf_title_tagline_font_underline
			? 1 : 0 ) : get_theme_mod( 'gf_title_tagline_font_underline' );
		$ctfc  = isset( $customized->gf_title_tagline_font_color ) ? $customized->gf_title_tagline_font_color
			: get_theme_mod( 'gf_title_tagline_font_color' );
		$ctfsv = isset( $customized->gf_title_tagline_font_shadow_vertical ) ? $customized->gf_title_tagline_font_shadow_vertical
			: get_theme_mod( 'gf_title_tagline_font_shadow_vertical' );
		$ctfsh = isset( $customized->gf_title_tagline_font_shadow_horizontal ) ? $customized->gf_title_tagline_font_shadow_horizontal
			: get_theme_mod( 'gf_title_tagline_font_shadow_horizontal' );
		$ctfsb = isset( $customized->gf_title_tagline_font_shadow_blur ) ? $customized->gf_title_tagline_font_shadow_blur
			: get_theme_mod( 'gf_title_tagline_font_shadow_blur' );
		$ctfsc = isset( $customized->gf_title_tagline_font_shadow_color ) ? $customized->gf_title_tagline_font_shadow_color
			: get_theme_mod( 'gf_title_tagline_font_shadow_color' );

		$styles = self::BuildTitleStyles( $ctf, $ctfs, $ctfc, $ctfb, $ctfi, $ctfu, $ctfsv, $ctfsh, $ctfsb, $ctfsc, '!important' );

		return $styles;
	}

	static public function ThemeTitleCustomization() {
		$modified = false;
		$ctf   = get_theme_mod( 'gf_title_font', '' );
		if ( '' !== $ctf ) {
			$modified = true;
		}
		$ctfs  = get_theme_mod( 'gf_title_font_size', '' );
		if ( '' !== $ctfs ) {
			$modified = true;
		}
		$ctfb  = get_theme_mod( 'gf_title_font_bold', 0 );
		if ( 0 != $ctfb ) {
			$modified = true;
		}
		$ctfi  = get_theme_mod( 'gf_title_font_italic', 0 );
		if ( 0 != $ctfi ) {
			$modified = true;
		}
		$ctfu  = get_theme_mod( 'gf_title_font_underline', 0 );
		if ( 0 != $ctfu ) {
			$modified = true;
		}
		$ctfc  = '';
		$ctfsv = get_theme_mod( 'gf_title_font_shadow_vertical', 0 );
		if ( 0 !== $ctfsv && ! empty( $ctfsv ) ) {
			$modified = true;
		}
		$ctfsh = get_theme_mod( 'gf_title_font_shadow_horizontal', 0 );
		if ( 0 !== $ctfsh && ! empty( $ctfsh ) ) {
			$modified = true;
		}
		$ctfsb = get_theme_mod( 'gf_title_font_shadow_blur', 0 );
		if ( 0 !== $ctfsb && ! empty( $ctfsb ) ) {
			$modified = true;
		}
		$ctfsc = get_theme_mod( 'gf_title_font_shadow_color', 0 );
		if ( 0 !== $ctfsc && ! empty( $ctfsc ) ) {
			$modified = true;
		}
		$styles = '';
		if ( $modified ) {
			$styles = self::BuildTitleStyles( $ctf, $ctfs, $ctfc, $ctfb, $ctfi, $ctfu, $ctfsv, $ctfsh, $ctfsb, $ctfsc, '!important' );
		}

		return array(
			'css' => $styles,
			'modified' => $modified
		);
	}

	static public function ThemeDescriptionCustomization() {
		$modified = false;
		$ctf   = get_theme_mod( 'gf_title_tagline_font', '' );
		if ( '' !== $ctf ) {
			$modified = true;
		}
		$ctfs  = get_theme_mod( 'gf_title_tagline_font_size', '' );
		if ( '' !== $ctfs ) {
			$modified = true;
		}
		$ctfb  = get_theme_mod( 'gf_title_tagline_font_bold', 0 );
		if ( 0 != $ctfb ) {
			$modified = true;
		}
		$ctfi  = get_theme_mod( 'gf_title_tagline_font_italic', 0 );
		if ( 0 != $ctfi ) {
			$modified = true;
		}
		$ctfu  = get_theme_mod( 'gf_title_tagline_font_underline', 0 );
		if ( 0 != $ctfu ) {
			$modified = true;
		}
		$ctfc  = get_theme_mod( 'gf_title_tagline_font_color', '' );
		if ( '' !== $ctfc ) {
			$modified = true;
		}
		$ctfsv = get_theme_mod( 'gf_title_tagline_font_shadow_vertical', 0 );
		if ( 0 !== $ctfsv && ! empty( $ctfsv ) ) {
			$modified = true;
		}
		$ctfsh = get_theme_mod( 'gf_title_tagline_font_shadow_horizontal', 0 );
		if ( 0 != $ctfsh && ! empty( $ctfsh ) ) {
			$modified = true;
		}
		$ctfsb = get_theme_mod( 'gf_title_tagline_font_shadow_blur', 0 );
		if ( 0 !== $ctfsb && ! empty( $ctfsb ) ) {
			$modified = true;
		}
		$ctfsc = get_theme_mod( 'gf_title_tagline_font_shadow_color', 0 );
		if ( 0 !== $ctfsc && ! empty( $ctfsc ) ) {
			$modified = true;
		}

		$styles = '';
		if ( $modified ) {
			$styles = self::BuildTitleStyles( $ctf, $ctfs, $ctfc, $ctfb, $ctfi, $ctfu, $ctfsv, $ctfsh, $ctfsb, $ctfsc, '!important' );
		}

		return array(
			'css' => $styles,
			'modified' => $modified,
		);
	}

	static public function LiveMenuItemCustomization( $customized ) {

		$locations      = get_registered_nav_menus();
		$menu_locations = get_nav_menu_locations();
		$styles         = '';
		foreach ( $menu_locations as $menu_location => $id ) {
			$cst   = (array) ( $customized );
			$ctf   = isset( $cst[ 'gf_menu_font_name_' . $menu_location ] ) ? $cst[ 'gf_menu_font_name_' . $menu_location ]
				: '';
			$ctfs  = isset( $cst[ 'gf_menu_font_size_' . $menu_location ] ) ? $cst[ 'gf_menu_font_size_' . $menu_location ]
				: '';
			$ctfb  = isset( $cst[ 'gf_menu_font_bold_' . $menu_location ] ) ? ( $cst[ 'gf_menu_font_bold_' . $menu_location ]
				? 1 : 0 ) : 0;
			$ctfi  = isset( $cst[ 'gf_menu_font_italic_' . $menu_location ] ) ? ( $cst[ 'gf_menu_font_italic_' . $menu_location ]
				? 1 : 0 ) : 0;
			$ctfu  = isset( $cst[ 'gf_menu_font_underline_' . $menu_location ] ) ? ( $cst[ 'gf_menu_font_underline_' . $menu_location ]
				? 1 : 0 ) : 0;
			$ctfc  = isset( $cst[ 'gf_menu_font_color_' . $menu_location ] ) ? $cst[ 'gf_menu_font_color_' . $menu_location ]
				: '';
			$ctfsv = isset( $cst[ 'gf_menu_font_shadow_vertical_' . $menu_location ] )
				? $cst[ 'gf_menu_font_shadow_vertical_' . $menu_location ] : 0;
			$ctfsh = isset( $cst[ 'gf_menu_font_shadow_horizontal_' . $menu_location ] )
				? $cst[ 'gf_menu_font_shadow_horizontal_' . $menu_location ] : 0;
			$ctfsb = isset( $cst[ 'gf_menu_font_shadow_blur_' . $menu_location ] )
				? $cst[ 'gf_menu_font_shadow_blur_' . $menu_location ] : 0;
			$ctfsc = isset( $cst[ 'gf_menu_font_shadow_color_' . $menu_location ] )
				? $cst[ 'gf_menu_font_shadow_color_' . $menu_location ] : '';
			$styles .= '.gfcustomizedmenu-' . $menu_location . ' li a { ';
			$styles .= self::BuildTitleStyles( $ctf, $ctfs, $ctfc, $ctfb, $ctfi, $ctfu, $ctfsv, $ctfsh, $ctfsb, $ctfsc, '!important' );
			$styles .= " }\r\n";
		}

		return $styles;
	}

	static public function ThemeMenuItemCustomization() {
		$modifiedg = false;
		$menu_locations = get_nav_menu_locations();
		$styles         = '';
		foreach ( $menu_locations as $menu_location => $id ) {
			$modified = false;
			$ctf   = get_theme_mod( 'gf_menu_font_name_' . $menu_location, '' );
			if ( '' !== $ctf ) {
				$modified = true;
			}
			$ctfs  = get_theme_mod( 'gf_menu_font_size_' . $menu_location, '' );
			if ( '' !== $ctfs ) {
				$modified = true;
			}
			$ctfb  = get_theme_mod( 'gf_menu_font_bold_' . $menu_location, 0 );
			if ( 0 !== $ctfb ) {
				$modified = true;
			}
			$ctfi  = get_theme_mod( 'gf_menu_font_italic_' . $menu_location, 0 );
			if ( 0 !== $ctfi ) {
				$modified = true;
			}
			$ctfu  = get_theme_mod( 'gf_menu_font_underline_' . $menu_location, 0 );
			if ( 0 !== $ctfu ) {
				$modified = true;
			}
			$ctfc  = get_theme_mod( 'gf_menu_font_color_' . $menu_location, '' );
			if ( '' !== $ctfc ) {
				$modified = true;
			}
			$ctfsv = get_theme_mod( 'gf_menu_font_shadow_vertical_' . $menu_location, 0 );
			if ( 0 !== $ctfsv ) {
				$modified = true;
			}
			$ctfsh = get_theme_mod( 'gf_menu_font_shadow_horizontal_' . $menu_location, 0 );
			if ( 0 !== $ctfsh ) {
				$modified = true;
			}
			$ctfsb = get_theme_mod( 'gf_menu_font_shadow_blur_' . $menu_location, 0 );
			if ( 0 !== $ctfsb ) {
				$modified = true;
			}
			$ctfsc = get_theme_mod( 'gf_menu_font_shadow_color_' . $menu_location, 0 );
			if ( 0 !== $ctfsc ) {
				$modified = true;
			}
			if ( $modified ) {
				$styles .= '.gfcustomizedmenu-' . $menu_location . ' li a { ';
				$styles .= self::BuildTitleStyles( $ctf, $ctfs, $ctfc, $ctfb, $ctfi, $ctfu, $ctfsv, $ctfsh, $ctfsb, $ctfsc, '!important' );
				$styles .= " }\r\n";
				$modifiedg = true;
			}
		}

		return array(
			'css' => $styles,
			'modified' => $modifiedg,
		);
	}

	static public function LiveHoverMenuItemCustomization( $customized ) {
		$locations      = get_registered_nav_menus();
		$menu_locations = get_nav_menu_locations();
		$styles         = '';
		foreach ( $menu_locations as $menu_location => $id ) {
			$cst   = (array) ( $customized );
			$ctf   = isset( $cst[ 'gf_menu_font_hover_name_' . $menu_location ] ) ? $cst[ 'gf_menu_font_hover_name_' . $menu_location ]
				: '';
			$ctfs  = isset( $cst[ 'gf_menu_font_hover_size_' . $menu_location ] ) ? $cst[ 'gf_menu_font_hover_size_' . $menu_location ]
				: '';
			$ctfb  = isset( $cst[ 'gf_menu_font_hover_bold_' . $menu_location ] ) ? ( $cst[ 'gf_menu_font_hover_bold_' . $menu_location ]
				? 1 : 0 ) : 0;
			$ctfi  = isset( $cst[ 'gf_menu_font_hover_italic_' . $menu_location ] )
				? ( $cst[ 'gf_menu_font_hover_italic_' . $menu_location ] ? 1 : 0 )
				: 0;
			$ctfu  = isset( $cst[ 'gf_menu_font_hover_underline_' . $menu_location ] )
				? ( $cst[ 'gf_menu_font_hover_underline_' . $menu_location ] ? 1
					: 0 ) : 0;
			$ctfc  = isset( $cst[ 'gf_menu_font_hover_color_' . $menu_location ] )
				? $cst[ 'gf_menu_font_hover_color_' . $menu_location ] : '';
			$ctfsv = isset( $cst[ 'gf_menu_font_hover_shadow_vertical_' . $menu_location ] )
				? $cst[ 'gf_menu_font_hover_shadow_vertical_' . $menu_location ]
				: 0;
			$ctfsh = isset( $cst[ 'gf_menu_font_hover_shadow_horizontal_' . $menu_location ] )
				? $cst[ 'gf_menu_font_hover_shadow_horizontal_' . $menu_location ]
				: 0;
			$ctfsb = isset( $cst[ 'gf_menu_font_hover_shadow_blur_' . $menu_location ] )
				? $cst[ 'gf_menu_font_hover_shadow_blur_' . $menu_location ] : 0;
			$ctfsc = isset( $cst[ 'gf_menu_font_hover_shadow_color_' . $menu_location ] )
				? $cst[ 'gf_menu_font_hover_shadow_color_' . $menu_location ] : '';
			$styles .= '.gfcustomizedmenu-' . $menu_location . ' li a:hover { ';
			$styles .= self::BuildTitleStyles( $ctf, $ctfs, $ctfc, $ctfb, $ctfi, $ctfu, $ctfsv, $ctfsh, $ctfsb, $ctfsc, '!important' );
			$styles .= " }\r\n";
		}

		return $styles;
	}

	static public function ThemeHoverMenuItemCustomization() {
		$menu_locations = get_nav_menu_locations();
		$styles         = '';
		$modifiedg      = false;
		foreach ( $menu_locations as $menu_location => $id ) {
			$modified       = false;
			$ctf   = get_theme_mod( 'gf_menu_font_hover_name_' . $menu_location, '' );
			if ( '' !== $ctf ) {
				$modified = true;
			}
			$ctfs  = get_theme_mod( 'gf_menu_font_hover_size_' . $menu_location, '' );
			if ( '' !== $ctfs ) {
				$modified = true;
			}
			$ctfb  = get_theme_mod( 'gf_menu_font_hover_bold_' . $menu_location, 0 );
			if ( 0 !== $ctfb ) {
				$modified = true;
			}
			$ctfi  = get_theme_mod( 'gf_menu_font_hover_italic_' . $menu_location, 0 );
			if ( 0 !== $ctfi ) {
				$modified = true;
			}
			$ctfu  = get_theme_mod( 'gf_menu_font_hover_underline_' . $menu_location, 0 );
			if ( 0 !== $ctfu ) {
				$modified = true;
			}
			$ctfc  = get_theme_mod( 'gf_menu_font_hover_color_' . $menu_location, '' );
			if ( '' !== $ctfc ) {
				$modified = true;
			}
			$ctfsv = get_theme_mod( 'gf_menu_font_hover_shadow_vertical_' . $menu_location, 0 );
			if ( 0 !== $ctfsv ) {
				$modified = true;
			}
			$ctfsh = get_theme_mod( 'gf_menu_font_hover_shadow_horizontal_' . $menu_location, 0 );
			if ( 0 !== $ctfsh ) {
				$modified = true;
			}
			$ctfsb = get_theme_mod( 'gf_menu_font_hover_shadow_blur_' . $menu_location, 0 );
			if ( 0 !== $ctfsb ) {
				$modified = true;
			}
			$ctfsc = get_theme_mod( 'gf_menu_font_hover_shadow_color_' . $menu_location, 0 );
			if ( 0 !== $ctfsc ) {
				$modified = true;
			}

			if ( $modified ) {
				$styles .= '.gfcustomizedmenu-' . $menu_location . ' li a:hover { ';
				$styles .= self::BuildTitleStyles( $ctf, $ctfs, $ctfc, $ctfb, $ctfi, $ctfu, $ctfsv, $ctfsh, $ctfsb, $ctfsc, '!important' );
				$styles .= " }\r\n";
				$modifiedg = true;
			}
		}

		return array(
			'css' => $styles,
			'modified' => $modifiedg,
		);
	}

	static public function OpaqueCommentsTemplate( $file ) {
		global $post;
		$commenttype = 'default';
		if ( is_object( $post ) ) {
			$meta = get_post_meta( $post->ID, 'gf_comment_type', true );
			if ( '' !== $meta ) {
				$commenttype = $meta;
			}
		}

		if ( isset( $_POST['wp_customize'] ) && $_POST['wp_customize'] == 'on' ) {
			$f          = $_POST;
			$s          = stripslashes( $_POST['customized'] );
			$customized = json_decode( $s );
			if ( isset( $customized->gf_comment_use_facebook ) && ( $customized->gf_comment_use_facebook == 'on' ) ) {
				$commenttype = 'facebook';
			} else {
				$commenttype = 'wordpress';
			}
		}
		$useFacebook = false;
		if ( $commenttype == 'default' ) {
			$useFacebook = get_theme_mod( 'gf_comment_use_facebook' );
		} elseif ( $commenttype == 'facebook' ) {
			$useFacebook = true;
		} elseif ( ( $commenttype == 'wordpress' ) || ( $commenttype == 'disabled' ) ) {
			$useFacebook = false;
		}

		if ( ! $useFacebook ) {
			if ( $commenttype == 'wordpress' || $commenttype == 'default' ) {
				$th   = wp_get_theme();
				$name = $th->get( 'Name' );
				if ( file_exists( $file ) ) {
					define('COMMENT_INCLUDE_FILE', $file);
					$file = plugin_dir_path(__FILE__) . '../utils/comments.php';
				}
			} elseif ( $commenttype == 'disabled' ) {
				$file = plugin_dir_path( __FILE__ ) . '../utils/nocomments.php';
			}
		} else {
			$file = plugin_dir_path( __FILE__ ) . '../utils/fbcomments.php';
		}

		return $file;
	}

	static public function SidebarCustomizator( $v ) {
		$x = $v;
	}

	static public function StripTitle( $title, $title2 ) {
		if ( strpos( $title, 'span style' ) !== false ) {
			$title = strip_tags( html_entity_decode( $title ) );
		}

		return $title;
	}

	static public function LiveCommentBoxCustomization( $customized ) {
		$ctf   = isset( $customized->gf_comment_font_name ) ? $customized->gf_comment_font_name
			: '';
		$ctfs  = isset( $customized->gf_comment_font_size ) ? $customized->gf_comment_font_size
			: '';
		$ctfb  = isset( $customized->gf_comment_font_bold ) ? ( $customized->gf_comment_font_bold
			? 1 : 0 ) : 0;
		$ctfi  = isset( $customized->gf_comment_font_italic ) ? ( $customized->gf_comment_font_italic
			? 1 : 0 ) : 0;
		$ctfu  = isset( $customized->gf_comment_font_underline ) ? ( $customized->gf_comment_font_underline
			? 1 : 0 ) : 0;
		$ctfc  = isset( $customized->gf_comment_font_color ) ? $customized->gf_comment_font_color
			: '';
		$ctfsv = isset( $customized->gf_comment_font_shadow_vertical ) ? $customized->gf_comment_font_shadow_vertical
			: 0;
		$ctfsh = isset( $customized->gf_comment_font_shadow_horizontal ) ? $customized->gf_comment_font_shadow_horizontal
			: 0;
		$ctfsb = isset( $customized->gf_comment_font_shadow_blur ) ? $customized->gf_comment_font_shadow_blur
			: 0;
		$ctfsc = isset( $customized->gf_comment_font_shadow_color ) ? $customized->gf_comment_font_shadow_color
			: '';

		$styles = self::BuildTitleStyles( $ctf, $ctfs, $ctfc, $ctfb, $ctfi, $ctfu, $ctfsv, $ctfsh, $ctfsb, $ctfsc, '!important' );

		return $styles;
	}

	static public function ThemeCommentBoxCustomization() {
		$modified = false;
		$ctf   = get_theme_mod( 'gf_comment_font_name', '' );
		if ( '' !== $ctf ) {
			$modified = true;
		}
		$ctfs  = get_theme_mod( 'gf_comment_font_size', '' );
		if ( '' !== $ctfs ) {
			$modified = true;
		}
		$ctfb  = get_theme_mod( 'gf_comment_font_bold', 0 );
		if ( 0 !== $ctfb ) {
			$modified = true;
		}
		$ctfi  = get_theme_mod( 'gf_comment_font_italic', 0 );
		if ( 0 !== $ctfi ) {
			$modified = true;
		}
		$ctfu  = get_theme_mod( 'gf_comment_font_underline', 0 );
		if ( 0 !== $ctfu ) {
			$modified = true;
		}
		$ctfc  = get_theme_mod( 'gf_comment_font_color', '' );
		if ( '' !== $ctfc ) {
			$modified = true;
		}
		$ctfsv = get_theme_mod( 'gf_comment_font_shadow_vertical', 0 );
		if ( 0 !== $ctfsv ) {
			$modified = true;
		}
		$ctfsh = get_theme_mod( 'gf_comment_font_shadow_horizontal', 0 );
		if ( 0 !== $ctfsh ) {
			$modified = true;
		}
		$ctfsb = get_theme_mod( 'gf_comment_font_shadow_blur', 0 );
		if ( 0 !== $ctfsb ) {
			$modified = true;
		}
		$ctfsc = get_theme_mod( 'gf_comment_font_shadow_color', 0 );
		if ( 0 !== $ctfsc ) {
			$modified = true;
		}
		if ( $modified ) {
			$styles = self::BuildTitleStyles( $ctf, $ctfs, $ctfc, $ctfb, $ctfi, $ctfu, $ctfsv, $ctfsh, $ctfsb, $ctfsc, '!important' );
		}
		return array(
			'css' => $styles,
			'modified' => $modified,
		);
	}

	static public function LiveCommentBoxSubmitCustomization( $customized ) {
		$radius          = isset( $customized->gf_comment_submit_radius ) ? $customized->gf_comment_submit_radius
			: 0;
		$color           = isset( $customized->gf_comment_submit_color ) ? $customized->gf_comment_submit_color
			: '';
		$textcolor       = isset( $customized->gf_comment_submit_text_color ) ? $customized->gf_comment_submit_text_color
			: '';
		$boxshadowv      = isset( $customized->gf_comment_submit_box_shadow_v ) ? $customized->gf_comment_submit_box_shadow_v
			: 0;
		$boxshadowh      = isset( $customized->gf_comment_submit_box_shadow_h ) ? $customized->gf_comment_submit_box_shadow_h
			: 0;
		$boxshadowblur   = isset( $customized->gf_comment_submit_box_shadow_blur )
			? $customized->gf_comment_submit_box_shadow_blur : 0;
		$boxshadowspread = isset( $customized->gf_comment_submit_box_shadow_spread )
			? $customized->gf_comment_submit_box_shadow_spread : 0;
		$boxshadowcolor  = isset( $customized->gf_comment_submit_box_shadow_color )
			? $customized->gf_comment_submit_box_shadow_color : '';
		$buttonfloat     = isset( $customized->gf_comment_submit_box_float ) ? $customized->gf_comment_submit_box_float
			: '';
		$buttonforce     = isset( $customized->gf_comment_submit_box_force_position )
			? ( $customized->gf_comment_submit_box_force_position == 'on' ) : false;
		$buttonleft      = isset( $customized->gf_comment_submit_box_force_position_left )
			? (int) $customized->gf_comment_submit_box_force_position_left : '';
		$buttontop       = isset( $customized->gf_comment_submit_box_force_position_top )
			? (int) $customized->gf_comment_submit_box_force_position_top : '';

		$style = "";
		if ( intval( $radius ) > 0 ) {
			$style .= self::BuildBorderRadiusStyle( null, null, null, null, $radius );
		}

		if ( $color != '' ) {
			$style .= 'background-color: ' . $color . '!important;';
		}

		if ( $textcolor != '' ) {
			$style .= 'color: ' . $textcolor . '!important;';
		}

		if ( $boxshadowcolor != '' && ( $boxshadowv != 0 || $boxshadowh != 0 || $boxshadowblur != 0 || $boxshadowspread != 0 ) ) {
			$style .= sprintf( 'box-shadow: %dpx %dpx %dpx %dpx %s!important;', $boxshadowv, $boxshadowh, $boxshadowblur, $boxshadowspread, $boxshadowcolor );
		}

		if ( ( $buttonfloat != '' ) && ( ! $buttonforce ) ) {
			$style .= 'float: ' . $buttonfloat . '!important;';
		}

		if ( $buttonforce ) {
			$style .= 'position: relative!important;';
		}

		if ( $buttonforce && $buttonleft != '' ) {
			$style .= 'left: ' . (int) $buttonleft . 'px!important;';
		}

		if ( $buttonforce && $buttontop != '' ) {
			$style .= 'top: ' . (int) $buttontop . 'px!important;';
		}

		return $style;
	}

	static public function ThemeCommentBoxSubmitCustomization() {
		$modified = false;
		$radius              = get_theme_mod( 'gf_comment_submit_radius', 0 );
		if ( 0 !== $radius ) {
			$modified = true;
		}
		$color               = get_theme_mod( 'gf_comment_submit_color', '' );
		if ( '' !== $color ) {
			$modified = true;
		}
		$textcolor           = get_theme_mod( 'gf_comment_submit_text_color', '' );
		if ( '' !== $textcolor ) {
			$modified = true;
		}
		$boxshadowv          = get_theme_mod( 'gf_comment_submit_box_shadow_v', 0 );
		if ( 0 !== $boxshadowv ) {
			$modified = true;
		}
		$boxshadowh          = get_theme_mod( 'gf_comment_submit_box_shadow_h', 0 );
		if ( 0 !== $boxshadowh ) {
			$modified = true;
		}
		$boxshadowblur       = get_theme_mod( 'gf_comment_submit_box_shadow_blur', 0 );
		if ( 0 !== $boxshadowblur ) {
			$modified = true;
		}
		$boxshadowspread     = get_theme_mod( 'gf_comment_submit_box_shadow_spread', 0 );
		if ( 0 !== $boxshadowspread ) {
			$modified = true;
		}
		$boxshadowcolor      = get_theme_mod( 'gf_comment_submit_box_shadow_color', '' );
		if ( '' !== $boxshadowcolor ) {
			$modified = true;
		}
		$buttonfloat         = get_theme_mod( 'gf_comment_submit_box_float', '' );
		if ( '' !== $buttonfloat ) {
			$modified = true;
		}
		$forcebuttonposition = get_theme_mod( 'gf_comment_submit_box_force_position', '' );
		if ( '' !== $forcebuttonposition ) {
			$modified = true;
		}
		$forcebuttoleft      = get_theme_mod( 'gf_comment_submit_box_force_position_left', '' );
		if ( '' !== $forcebuttoleft ) {
			$modified = true;
		}
		$forcebuttotop       = get_theme_mod( 'gf_comment_submit_box_force_position_top', '' );
		if ( '' !== $forcebuttotop ) {
			$modified = true;
		}
		$buttonforce         = get_theme_mod( 'gf_comment_submit_box_force_position', false );
		if ( false !== $buttonforce ) {
			$modified = true;
		}
		$buttonleft          = get_theme_mod( 'gf_comment_submit_box_force_position_left', '' );
		if ( '' !== $buttonleft ) {
			$modified = true;
		}
		$buttontop           = get_theme_mod( 'gf_comment_submit_box_force_position_top', '' );
		if ( '' !== $buttontop ) {
			$modified = true;
		}

		$style = '';
		if ( intval( $radius ) > 0 ) {
			$style .= self::BuildBorderRadiusStyle( null, null, null, null, $radius );
			$modified = true;
		}

		if ( $color != '' ) {
			$style .= 'background-color: ' . $color . '!important;';
			$modified = true;
		}

		if ( $textcolor != '' ) {
			$style .= 'color: ' . $textcolor . '!important;';
			$modified = true;
		}

		if ( $boxshadowcolor != '' && ( $boxshadowv != 0 || $boxshadowh != 0 || $boxshadowblur != 0 || $boxshadowspread != 0 ) ) {
			$style .= sprintf( 'box-shadow: %dpx %dpx %dpx %dpx %s!important;', $boxshadowv, $boxshadowh, $boxshadowblur, $boxshadowspread, $boxshadowcolor );
			$modified = true;
		}

		if ( ( $buttonfloat != '' ) && ( ! $buttonforce ) ) {
			$style .= 'float: ' . $buttonfloat . '!important;';
			$modified = true;
		}

		if ( $buttonforce ) {
			$style .= 'position: relative!important;';
			$modified = true;
		}

		if ( $buttonforce && $buttonleft != '' ) {
			$style .= 'left: ' . (int) $buttonleft . 'px!important;';
			$modified = true;
		}

		if ( $buttonforce && $buttontop != '' ) {
			$style .= 'top: ' . (int) $buttontop . 'px!important;';
			$modified = true;
		}

		return array(
			'css' => $style,
			'modified' => $modified,
		);
	}

	static public function DynamcSidebarParams( $params ) {
		global $wp_registered_sidebars;
		if ( ! is_admin() ) {
			$before_title  = "gfcustomized-{$params[0]['id']} gfcustomized-sidebar gfcustomized-widget-body-{$params[0]['id']} gfcustomized-widget-body";
			$before_widget = "gfcustomized-widget-{$params[0]['widget_id']} gfcustomized-widget-{$params[0]['id']} gfcustomized-widget";
			$params[0]['before_title'] = preg_replace(
				'#(<.+class\s?+=[\'|"])([a-z0-9\s_\-]+)([\'|"].*?>)#i',
				'$1$2 ' . $before_title . '$3',
				$params[0]['before_title']
			);
			$params[0]['before_widget'] = preg_replace(
				'#(<.+class\s?+=[\'|"])([a-z0-9\s_\-]+)([\'|"].*?>)#i',
				'$1$2 ' . $before_widget . '$3',
				$params[0]['before_widget']
			);
		}

		return $params;
	}

	static public function ThemeSidebarsCustomization() {
		global $wp_registered_sidebars;
		$style        = "";
		$stylecontent = "";
		$modifiedg = false;
		$modified  = false;
		foreach ( $wp_registered_sidebars as $sb ) {
			$id        = $sb['id'];
			$ctf       = get_theme_mod( 'gf_custom_widget_' . $id . '_font_name', '' );
			if ( '' !== $ctf ) {
				$modified = true;
			}
			$ctfs      = get_theme_mod( 'gf_custom_widget_' . $id . '_font_size', '' );
			if ( '' !== $ctfs ) {
				$modified = true;
			}
			$ccta      = get_theme_mod( 'gf_custom_widget_' . $id . '_text_align', '' );
			if ( '' !== $ccta ) {
				$modified = true;
			}
			$ctfb      = get_theme_mod( 'gf_custom_widget_' . $id . '_font_bold', 0 );
			if ( 0 !== $ctfb ) {
				$modified = true;
			}
			$ctfi      = get_theme_mod( 'gf_custom_widget_' . $id . '_font_italic', 0 );
			if ( 0 !== $ctfi ) {
				$modified = true;
			}
			$ctfu      = get_theme_mod( 'gf_custom_widget_' . $id . '_font_underline', 0 );
			if ( 0 !== $ctfu ) {
				$modified = true;
			}
			$ctfc      = get_theme_mod( 'gf_custom_widget_' . $id . '_font_color', '' );
			if ( '' !== $ctfc ) {
				$modified = true;
			}
			$ctfsv     = get_theme_mod( 'gf_custom_widget_' . $id . '_font_shadow_vertical', 0 );
			if ( 0 !== $ctfsv ) {
				$modified = true;
			}
			$ctfsh     = get_theme_mod( 'gf_custom_widget_' . $id . '_font_shadow_horizontal', 0 );
			if ( 0 !== $ctfsh ) {
				$modified = true;
			}
			$ctfsb     = get_theme_mod( 'gf_custom_widget_' . $id . '_font_shadow_blur', 0 );
			if ( 0 !== $ctfsb ) {
				$modified = true;
			}
			$ctfsc     = get_theme_mod( 'gf_custom_widget_' . $id . '_font_shadow_color', '' );
			if ( '' !== $ctfsc ) {
				$modified = true;
			}
			$ctbgcolor = get_theme_mod( 'gf_custom_widget_' . $id . '_background_color', '' );
			if ( '' !== $ctbgcolor ) {
				$modified = true;
			}
			$cltr      = get_theme_mod( 'gf_custom_widget_' . $id . '_top_left_radius', 0 );
			if ( 0 !== $cltr ) {
				$modified = true;
			}
			$crtr      = get_theme_mod( 'gf_custom_widget_' . $id . '_top_right_radius', 0 );
			if ( 0 !== $crtr ) {
				$modified = true;
			}
			$crbr      = get_theme_mod( 'gf_custom_widget_' . $id . '_bottom_right_radius', 0 );
			if ( 0 !== $crbr ) {
				$modified = true;
			}
			$clbr      = get_theme_mod( 'gf_custom_widget_' . $id . '_bottom_left_radius', 0 );
			if ( 0 !== $clbr ) {
				$modified = true;
			}

			$_titlepaddingtop     = 'gf_custom_widget_' . $id . '_text_padding_top';
			$_titlepaddingbottom  = 'gf_custom_widget_' . $id . '_text_padding_bottom';
			$v_titlepaddingbottom = get_theme_mod( $_titlepaddingbottom, '' );
			if ( '' !== $v_titlepaddingbottom ) {
				$modified = true;
			}
			$v_titlepaddingtop    = get_theme_mod( $_titlepaddingtop, '' );
			if ( '' !== $v_titlepaddingtop ) {
				$modified = true;
			}

			//////////////////////////////////////
			$cctf       = get_theme_mod( 'gf_custom_widget_' . $id . '_content_font_name', '' );
			if ( '' !== $cctf ) {
				$modified = true;
			}
			$cctfs      = get_theme_mod( 'gf_custom_widget_' . $id . '_content_font_size', '' );
			if ( '' !== $cctfs ) {
				$modified = true;
			}
			$cctta      = get_theme_mod( 'gf_custom_widget_' . $id . '_content_text_align', '' );
			if ( '' !== $cctta ) {
				$modified = true;
			}
			$ccttalm    = get_theme_mod( 'gf_custom_widget_' . $id . '_content_text_left_margin', 0 );
			if ( 0 !== $ccttalm ) {
				$modified = true;
			}
			$ccttarm    = get_theme_mod( 'gf_custom_widget_' . $id . '_content_text_right_margin', 0 );
			if ( 0 !== $ccttarm ) {
				$modified = true;
			}
			$cctfb      = get_theme_mod( 'gf_custom_widget_' . $id . '_content_font_bold', 0 );
			if ( 0 !== $cctfb ) {
				$modified = true;
			}
			$cctfi      = get_theme_mod( 'gf_custom_widget_' . $id . '_content_font_italic', 0 );
			if ( 0 !== $cctfi ) {
				$modified = true;
			}
			$cctfu      = get_theme_mod( 'gf_custom_widget_' . $id . '_content_font_underline', 0 );
			if ( 0 !== $cctfu ) {
				$modified = true;
			}
			$cctfc      = get_theme_mod( 'gf_custom_widget_' . $id . '_content_font_color', '' );
			if ( '' !== $cctfc ) {
				$modified = true;
			}
			$cctfsv     = get_theme_mod( 'gf_custom_widget_' . $id . '_content_font_shadow_vertical', 0 );
			if ( 0 !== $cctfsv ) {
				$modified = true;
			}
			$cctfsh     = get_theme_mod( 'gf_custom_widget_' . $id . '_content_font_shadow_horizontal', 0 );
			if ( 0 !== $cctfsh ) {
				$modified = true;
			}
			$cctfsb     = get_theme_mod( 'gf_custom_widget_' . $id . '_content_font_shadow_blur', 0 );
			if ( 0 !== $cctfsb ) {
				$modified = true;
			}
			$cctfsc     = get_theme_mod( 'gf_custom_widget_' . $id . '_content_font_shadow_color', '' );
			if ( '' !== $cctfsc ) {
				$modified = true;
			}
			$cctbgcolor = get_theme_mod( 'gf_custom_widget_' . $id . '_content_background_color', '' );
			if ( '' !== $cctbgcolor ) {
				$modified = true;
			}
			$ccltr      = get_theme_mod( 'gf_custom_widget_' . $id . '_content_top_left_radius', 0 );
			if ( 0 !== $ccltr ) {
				$modified = true;
			}
			$ccrtr      = get_theme_mod( 'gf_custom_widget_' . $id . '_content_top_right_radius', 0 );
			if ( 0 !== $ccrtr ) {
				$modified = true;
			}
			$ccrbr      = get_theme_mod( 'gf_custom_widget_' . $id . '_content_bottom_right_radius', 0 );
			if ( 0 !== $ccrbr ) {
				$modified = true;
			}
			$cclbr      = get_theme_mod( 'gf_custom_widget_' . $id . '_content_bottom_left_radius', 0 );
			if ( 0 !== $cclbr ) {
				$modified = true;
			}
			//////////////////////////////////////
			$styles = '';
			if ( $modified ) {
				$styles = self::BuildTitleStyles( $ctf, $ctfs, $ctfc, $ctfb, $ctfi, $ctfu, $ctfsv, $ctfsh, $ctfsb, $ctfsc, '!important', true, $ccta );
			}
			if ( $ctbgcolor != '' ) {
				$styles .= "background-color: " . $ctbgcolor . "!important;";
				$modified = true;
			}

			$bradius = self::BuildBorderRadiusStyle( $cltr, $crtr, $crbr, $clbr );
			if ( $bradius != '' ) {
				$styles .= $bradius;
				$modified = true;
			}

			if ( $v_titlepaddingbottom != '' ) {
				$styles .= 'padding-bottom: ' . $v_titlepaddingbottom . ';';
				$modified = true;
			}

			if ( $v_titlepaddingtop != '' ) {
				$styles .= 'padding-top: ' . $v_titlepaddingtop . ';';
				$modified = true;
			}

			if ( $styles != '' ) {
				$style .= ".gfcustomized-" . $sb['id'] . " { " . $styles . " }\r\n";
				$modified = true;
			}

			$stylescontent = '';
			$stylescontent2 = '';
			if ( $modified ) {
				$stylescontent = self::BuildTitleStyles(
					$cctf,
					$cctfs,
					$cctfc,
					$cctfb,
					$cctfi,
					false,
					$cctfsv,
					$cctfsh,
					$cctfsb,
					$cctfsc,
					'!important',
					true,
					$cctta
				); //, $ccttalm, $ccttarm);
				$stylescontent2 = self::BuildTitleStyles(
					$cctf,
					$cctfs,
					$cctfc,
					$cctfb,
					$cctfi,
					$cctfu,
					$cctfsv,
					$cctfsh,
					$cctfsb,
					$cctfsc,
					'!important',
					true,
					'',
					$ccttalm,
					$ccttarm
				);
			}
			if ( $cctbgcolor != '' ) {
				$stylescontent .= "background-color: " . $cctbgcolor . "!important;";
				$modified = true;
			}

			$bradiuscontent = self::BuildBorderRadiusStyle( $ccltr, $ccrtr, $ccrbr, $cclbr );
			if ( $bradiuscontent != '' ) {
				$stylescontent .= $bradiuscontent;
				$stylescontent2 .= $bradiuscontent;
				$modified = true;
			}

			if ( $stylescontent != '' ) {
				$stylecontent .= ".gfcustomized-widget-" . $sb['id'] . " a, .gfcustomized-widget-" . $sb['id'] . ",  .gfcustomized-widget-" . $sb['id'] . " { " . $stylescontent . " }\r\n";
				$modified = true;
			}

			if ( $stylescontent2 != '' ) {
				$stylecontent .= ".gfcustomized-widget-body-" . $sb['id'] . "+, .gfcustomized-widget-body-" . $sb['id'] . "+ { " . $stylescontent2 . " }\r\n";
				$modified = true;
			}
		}

		return array(
			'css' => $style . $stylecontent,
			'modified' => $modified,
		);
	}

	static public function LiveSidebarsCustomization( $customized ) {
		global $wp_registered_sidebars;
		global $wp_registered_widgets;
		$style        = "";
		$stylecontent = "";
		foreach ( $wp_registered_sidebars as $sb ) {
			$id    = $sb['id'];
			$_ctf  = 'gf_custom_widget_' . $id . '_font_name';
			$_ctfs = 'gf_custom_widget_' . $id . '_font_size';
			$_ctta = 'gf_custom_widget_' . $id . '_text_align';
			$_ctfb = 'gf_custom_widget_' . $id . '_font_bold';
			$_ctfi = 'gf_custom_widget_' . $id . '_font_italic';
			$_ctfu = 'gf_custom_widget_' . $id . '_font_underline';
			$_ctfc = 'gf_custom_widget_' . $id . '_font_color';

			$_titlepaddingtop    = 'gf_custom_widget_' . $id . '_text_padding_top';
			$_titlepaddingbottom = 'gf_custom_widget_' . $id . '_text_padding_bottom';

			$_ctfsv     = 'gf_custom_widget_' . $id . '_font_shadow_vertical';
			$_ctfsh     = 'gf_custom_widget_' . $id . '_font_shadow_horizontal';
			$_ctfsb     = 'gf_custom_widget_' . $id . '_font_shadow_blur';
			$_ctfsc     = 'gf_custom_widget_' . $id . '_font_shadow_color';
			$_ctbgcolor = 'gf_custom_widget_' . $id . '_background_color';

			$_cltr = 'gf_custom_widget_' . $id . '_top_left_radius';
			$_crtr = 'gf_custom_widget_' . $id . '_top_right_radius';
			$_crbr = 'gf_custom_widget_' . $id . '_bottom_right_radius';
			$_clbr = 'gf_custom_widget_' . $id . '_bottom_left_radius';

			$_cctf    = 'gf_custom_widget_' . $id . '_content_font_name';
			$_cctfs   = 'gf_custom_widget_' . $id . '_content_font_size';
			$_cctta   = 'gf_custom_widget_' . $id . '_content_text_align';
			$_ccttalm = 'gf_custom_widget_' . $id . '_content_text_left_margin';
			$_ccttarm = 'gf_custom_widget_' . $id . '_content_text_right_margin';
			$_cctfb   = 'gf_custom_widget_' . $id . '_content_font_bold';
			$_cctfi   = 'gf_custom_widget_' . $id . '_content_font_italic';
			$_cctfu   = 'gf_custom_widget_' . $id . '_content_font_underline';
			$_cctfc   = 'gf_custom_widget_' . $id . '_content_font_color';

			$_ctcfsv     = 'gf_custom_widget_' . $id . '_content_font_shadow_vertical';
			$_ctcfsh     = 'gf_custom_widget_' . $id . '_content_font_shadow_horizontal';
			$_ctcfsb     = 'gf_custom_widget_' . $id . '_content_font_shadow_blur';
			$_ctcfsc     = 'gf_custom_widget_' . $id . '_content_font_shadow_color';
			$_ctcbgcolor = 'gf_custom_widget_' . $id . '_content_background_color';

			$_ccltr = 'gf_custom_widget_' . $id . '_content_top_left_radius';
			$_ccrtr = 'gf_custom_widget_' . $id . '_content_top_right_radius';
			$_ccrbr = 'gf_custom_widget_' . $id . '_content_bottom_right_radius';
			$_cclbr = 'gf_custom_widget_' . $id . '_content_bottom_left_radius';

			$ctf       = ( isset( $customized->$_ctf ) ) ? $customized->$_ctf : get_theme_mod( $_ctf );
			$ctfs      = ( isset( $customized->$_ctfs ) ) ? $customized->$_ctfs : get_theme_mod( $_ctfs );
			$ctta      = ( isset( $customized->$_ctta ) ) ? $customized->$_ctta : get_theme_mod( $_ctta );
			$ctfb      = ( isset( $customized->$_ctfb ) ) ? $customized->$_ctfb : get_theme_mod( $_ctfb );
			$ctfi      = ( isset( $customized->$_ctfi ) ) ? $customized->$_ctfi : get_theme_mod( $_ctfi );
			$ctfu      = ( isset( $customized->$_ctfu ) ) ? $customized->$_ctfu : get_theme_mod( $_ctfu );
			$ctfc      = ( isset( $customized->$_ctfc ) ) ? $customized->$_ctfc : get_theme_mod( $_ctfc );
			$ctfsv     = ( isset( $customized->$_ctfsv ) ) ? $customized->$_ctfsv : get_theme_mod( $_ctfsv );
			$ctfsh     = ( isset( $customized->$_ctfsh ) ) ? $customized->$_ctfsh : get_theme_mod( $_ctfsh );
			$ctfsb     = ( isset( $customized->$_ctfsb ) ) ? $customized->$_ctfsb : get_theme_mod( $_ctfsb );
			$ctfsc     = ( isset( $customized->$_ctfsc ) ) ? $customized->$_ctfsc : get_theme_mod( $_ctfsc );
			$ctbgcolor = ( isset( $customized->$_ctbgcolor ) ) ? $customized->$_ctbgcolor : get_theme_mod( $_ctbgcolor );

			$cltr = ( isset( $customized->$_cltr ) ) ? $customized->$_cltr : get_theme_mod( $_cltr );
			$crtr = ( isset( $customized->$_crtr ) ) ? $customized->$_crtr : get_theme_mod( $_crtr );
			$crbr = ( isset( $customized->$_crbr ) ) ? $customized->$_crbr : get_theme_mod( $_crbr );
			$clbr = ( isset( $customized->$_clbr ) ) ? $customized->$_clbr : get_theme_mod( $_clbr );

			/////////////////
			$cctf       = ( isset( $customized->$_cctf ) ) ? $customized->$_cctf : get_theme_mod( $_cctf );
			$cctfs      = ( isset( $customized->$_cctfs ) ) ? $customized->$_cctfs : get_theme_mod( $_cctfs );
			$cctta      = ( isset( $customized->$_cctta ) ) ? $customized->$_cctta : get_theme_mod( $_cctta );
			$ccttalm    = ( isset( $customized->$_ccttalm ) ) ? $customized->$_ccttalm : get_theme_mod( $_ccttalm );
			$ccttarm    = ( isset( $customized->$_ccttarm ) ) ? $customized->$_ccttarm : get_theme_mod( $_ccttarm );
			$cctfb      = ( isset( $customized->$_cctfb ) ) ? $customized->$_cctfb : get_theme_mod( $_cctfb );
			$cctfi      = ( isset( $customized->$_cctfi ) ) ? $customized->$_cctfi : get_theme_mod( $_cctfi );
			$cctfu      = ( isset( $customized->$_cctfu ) ) ? $customized->$_cctfu : get_theme_mod( $_cctfu );
			$cctfc      = ( isset( $customized->$_cctfc ) ) ? $customized->$_cctfc : get_theme_mod( $_cctfc );
			$cctfsv     = ( isset( $customized->$_ctcfsv ) ) ? $customized->$_ctcfsv : get_theme_mod( $_ctcfsv );
			$cctfsh     = ( isset( $customized->$_ctcfsh ) ) ? $customized->$_ctcfsh : get_theme_mod( $_ctcfsh );
			$cctfsb     = ( isset( $customized->$_ctcfsb ) ) ? $customized->$_ctcfsb : get_theme_mod( $_ctcfsb );
			$cctfsc     = ( isset( $customized->$_ctcfsc ) ) ? $customized->$_ctcfsc : get_theme_mod( $_ctcfsc );
			$cctbgcolor = ( isset( $customized->$_ctcbgcolor ) ) ? $customized->$_ctcbgcolor : get_theme_mod( $_ctcbgcolor );

			$ccltr = ( isset( $customized->$_ccltr ) ) ? $customized->$_ccltr : get_theme_mod( $_ccltr );
			$ccrtr = ( isset( $customized->$_ccrtr ) ) ? $customized->$_ccrtr : get_theme_mod( $_ccrtr );
			$ccrbr = ( isset( $customized->$_ccrbr ) ) ? $customized->$_ccrbr : get_theme_mod( $_ccrbr );
			$cclbr = ( isset( $customized->$_cclbr ) ) ? $customized->$_cclbr : get_theme_mod( $_cclbr );


			$styles = self::BuildTitleStyles( $ctf, $ctfs, $ctfc, $ctfb, $ctfi, $ctfu, $ctfsv, $ctfsh, $ctfsb, $ctfsc, '!important', true, $ctta );
			if ( $ctbgcolor != '' ) {
				$styles .= "background-color: " . $ctbgcolor . "!important;";
			}

			$bradius = self::BuildBorderRadiusStyle( $cltr, $crtr, $crbr, $clbr );
			if ( $bradius != '' ) {
				$styles .= $bradius;
			}

			if ( $customized->$_titlepaddingbottom != '' ) {
				$styles .= 'padding-bottom: ' . $customized->$_titlepaddingbottom . ';';
			}

			if ( $customized->$_titlepaddingtop != '' ) {
				$styles .= 'padding-top: ' . $customized->$_titlepaddingtop . ';';
			}

			if ( $styles != '' ) {
				$style .= ".gfcustomized-" . $sb['id'] . " { " . $styles . " }\r\n";
			}

			$stylescontent  = self::BuildTitleStyles( $cctf, $cctfs, $cctfc, $cctfb, $cctfi, false, $cctfsv, $cctfsh, $cctfsb, $cctfsc, '!important', true, $cctta ); //, $ccttalm, $ccttarm);
			$stylescontent2 = self::BuildTitleStyles( $cctf, $cctfs, $cctfc, $cctfb, $cctfi, $cctfu, $cctfsv, $cctfsh, $cctfsb, $cctfsc, '!important', true, '', $ccttalm, $ccttarm );
			if ( $cctbgcolor != '' ) {
				$stylescontent .= "background-color: " . $cctbgcolor . "!important;";
				$stylescontent2 .= "background-color: " . $cctbgcolor . "!important;";
			}

			$bradiuscontent = self::BuildBorderRadiusStyle( $ccltr, $ccrtr, $ccrbr, $cclbr );
			if ( $bradiuscontent != '' ) {
				$stylescontent .= $bradiuscontent;
				$stylescontent2 .= $bradiuscontent;
			}

			if ( $stylescontent != '' ) {
				$stylecontent .= ".gfcustomized-widget-" . $sb['id'] . " a, .gfcustomized-widget-" . $sb['id'] . ",  .gfcustomized-widget-" . $sb['id'] . " { " . $stylescontent . " }\r\n";
			}

			if ( $stylescontent2 != '' ) {
				$stylecontent .= ".gfcustomized-widget-body-" . $sb['id'] . "+, .gfcustomized-widget-body-" . $sb['id'] . "+ { " . $stylescontent2 . " }\r\n";
			}
		}

		return $style . $stylecontent;
	}

	static public function BuildBorderRadiusStyle( $topleft, $topright, $bottomright, $bottomleft, $overrideall = 0 ) {
		$style = "";
		if ( intval( $overrideall ) > 0 ) {
			$radius = intval( $overrideall );
			$style  = sprintf( "-webkit-border-radius: %dpx!important; -moz-border-radius: %dpx!important; border-radius: %dpx!important;", $radius, $radius, $radius );
		} else {
			$vtopleft     = intval( $topleft );
			$vtopright    = intval( $topright );
			$vbottomright = intval( $bottomright );
			$vbottomleft  = intval( $bottomleft );
			if ( $vtopleft > 0 || $vtopright > 0 || $vbottomright > 0 || $vbottomleft > 0 ) {
				$style = sprintf( "-webkit-border-radius: %dpx %dpx %dpx %dpx!important; -moz-border-radius: %dpx %dpx %dpx %dpx!important; border-radius: %dpx %dpx %dpx %dpx!important;", $vtopleft, $vtopright, $vbottomright, $vbottomleft, $vtopleft, $vtopright, $vbottomright, $vbottomleft, $vtopleft, $vtopright, $vbottomright, $vbottomleft );
			}
		}

		return $style;
	}

	static public function ContentFilterProcessor( $content ) {
		$wmode = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_GLOBAL_SETTING, 3 );
		if ( is_single() && ( $wmode < 3 ) ) {
			$id = get_the_ID();
			if ( $id ) {
				$buttons = "";
				if ( $wmode == 2 ) {
					$soc = get_post_meta( $id, 'gf_social_buttons', true );
				} elseif ( $wmode == 1 ) {
					$enabled_fb = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_FACEBOOK, true );
					$enabled_tw = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_TWITTER, true );
					$enabled_gp = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_GOOGLEPLUS, true );
					$soc        = array(
						'facebook'   => $enabled_fb,
						'twitter'    => $enabled_tw,
						'googleplus' => $enabled_gp
					);
				}
				if ( $soc['facebook'] ) {
					$size     = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_SIZE, '32' );
					$fb_color = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_FB_COLOR, 'blue' );
					$buttons .= SocialGenerator::Facebook( PLUGIN_URL, $size, $fb_color );
				}

				if ( $soc['twitter'] ) {
					$size     = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_SIZE, '32' );
					$tw_color = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_TW_COLOR, 'white_blue' );
					$buttons .= SocialGenerator::Twitter( PLUGIN_URL, $size, $tw_color );
				}

				if ( $soc['googleplus'] ) {
					$size     = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_SIZE, '32' );
					$gp_color = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_GP_COLOR, 'red' );
					$buttons .= SocialGenerator::GooglePlus( PLUGIN_URL, $size, $gp_color );
				}

				if ( $buttons != "" ) {
					$codebefore = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_HTML_BEFORE, '' );
					$codeafter  = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_HTML_AFTER, '' );
					$title      = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_TITLE, __( 'Share with', self::PLUGIN_SLUG ) );
					$content .= "<br/>" . $codebefore . $title . $buttons . $codeafter;
				}
			}
		}

		return $content;
	}

	static public function SocialSettings() {
		print "<div class=\"wrap\">";
		print "<h2>" . __( "Social Settings", self::PLUGIN_SLUG ) . "</h2>";
		$tabs[] = array(
			'title'  => __( "Social Buttons", self::PLUGIN_SLUG ),
			'href'   => '?page=' . self::PLUGIN_SOCIAL_BUTTONS_SETTINGS,
			'active' => ! isset( $_GET['act'] )
		);
		$tabs[] = array(
			'title'  => __( "Facebook Slider", self::PLUGIN_SLUG ),
			'href'   => '?page=' . self::PLUGIN_SOCIAL_BUTTONS_SETTINGS . '&act=fb',
			'active' => isset( $_GET['act'] ) ? $_GET['act'] == 'fb' : false
		);
		$tabs[] = array(
			'title'  => __( "Twitter Slider", self::PLUGIN_SLUG ),
			'href'   => '?page=' . self::PLUGIN_SOCIAL_BUTTONS_SETTINGS . '&act=tw',
			'active' => isset( $_GET['act'] ) ? $_GET['act'] == 'tw' : false
		);
		$tabs[] = array(
			'title'  => __( "Ready Configs", self::PLUGIN_SLUG ),
			'href'   => '?page=' . self::PLUGIN_SOCIAL_BUTTONS_SETTINGS . '&act=rc',
			'active' => isset( $_GET['act'] ) ? ( $_GET['act'] == 'rc' || $_GET['act'] == 'sli' )
				: false
		);

		GFontsUITabs::DrawTabs( $tabs );

		$action = isset( $_GET['act'] ) ? $_GET['act'] : 'main';
		switch ( $action ) {
			case 'main':
				self::SocialButtonsSettingsMain();
				break;
			case 'fb':
				self::SocialSettingsFacebookSlider();
				break;
			case 'tw':
				self::SocialSettingsTwitterSlider();
				break;
			case 'rc':
				self::SocialSettingsReadyConfigs();
				break;
			case 'sli':
				self::ImportSocialSettingConfig();
				break;
		}

		print "</div>";
	}

	static public function SocialButtonsSettingsMain() {
		if ( @$_GET['settings-updated'] == 'true' ) {
			GFontsUI::Success( __( "Changes has been saved.", self::PLUGIN_SLUG ) );
		}
		wp_register_style( 'gfonts-admin', PLUGIN_URL . 'css/gfonts.css' );
		wp_enqueue_style( 'gfonts-admin' );
		print "<form method=\"post\" action=\"options.php\"> ";
		settings_fields( self::PLUGIN_SLUG_SOCIAL );
		do_settings_fields( self::PLUGIN_SLUG_SOCIAL, '' );
		$size       = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_SIZE, '32' );
		$fb_color   = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_FB_COLOR, 'blue' );
		$tw_color   = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_TW_COLOR, 'white_blue' );
		$gp_color   = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_GP_COLOR, 'red' );
		$wmode      = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_GLOBAL_SETTING, 3 );
		$enabled_fb = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_FACEBOOK, true );
		$enabled_tw = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_TWITTER, true );
		$enabled_gp = get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_GOOGLEPLUS, true );
		?>
		<table class="form-table" style="max-width: 900px;">
			<tr valign="top">
				<th scopre="row"><?php _e( "Social Buttons Working Mode", self::PLUGIN_SLUG ); ?></th>
				<td>
					<select
						name="<?php echo self::PLUGIN_OPTION_SOCIAL_BUTTONS_GLOBAL_SETTING; ?>"
						style="width: 500px;">
						<option value="1"<?php
						if ( $wmode == 1 ) {
							echo " selected";
						}
						?>><?php _e( 'Enabled for all posts', self::PLUGIN_SLUG ); ?></option>
						<option value="2"<?php
						if ( $wmode == 2 ) {
							echo " selected";
						}
						?>><?php _e( 'Enabled for single posts (individual post settings)', self::PLUGIN_SLUG ); ?></option>
						<option value="3"<?php
						if ( $wmode == 3 ) {
							echo " selected";
						}
						?>><?php _e( 'Disabled', self::PLUGIN_SLUG ); ?></option>
					</select>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php print __( "Social Networks", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="checkbox"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_BUTTONS_FACEBOOK ?>"
					       id="sbfb" <?php
					if ( $enabled_fb ) {
						echo "checked";
					}
					?>/>&nbsp;<label for="sbfb">Facebook</label><br/>
					<input type="checkbox"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_BUTTONS_TWITTER ?>"
					       id="sbtw" <?php
					if ( $enabled_tw ) {
						echo "checked";
					}
					?>/>&nbsp;<label for="sbtw">Twitter</label><br/>
					<input type="checkbox"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_BUTTONS_GOOGLEPLUS ?>"
					       id="sbgp" <?php
					if ( $enabled_gp ) {
						echo "checked";
					}
					?>/>&nbsp;<label for="sbgp">Google+</label><br/>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php print __( "Social Buttons Title (you can use HTML)", self::PLUGIN_SLUG ); ?></th>
				<td><input type="text"
				           name="<?php echo self::PLUGIN_OPTION_SOCIAL_BUTTONS_TITLE ?>"
				           value="<?php echo( get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_TITLE, __( 'Share with', self::PLUGIN_SLUG ) ) ) ?>"
				           style="width: 500px;"/></td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php print __( "Icon size", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_BUTTONS_SIZE ?>"
					       value="24" id="b24" <?php
					if ( $size == 24 ) {
						echo "checked";
					}
					?> />&nbsp;<label for="b24">24 x 24 px</label><br/>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_BUTTONS_SIZE ?>"
					       value="32" id="b32" <?php
					if ( $size == 32 ) {
						echo "checked";
					}
					?> />&nbsp;<label for="b32">32 x 32 px</label><br/>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_BUTTONS_SIZE ?>"
					       value="48" id="b48" <?php
					if ( $size == 48 ) {
						echo "checked";
					}
					?> />&nbsp;<label for="b48">48 x 48 px</label><br/>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_BUTTONS_SIZE ?>"
					       value="64" id="b64" <?php
					if ( $size == 64 ) {
						echo "checked";
					}
					?> />&nbsp;<label for="b64">64 x 64 px</label><br/>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php print __( "Facebook Colors", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_BUTTONS_FB_COLOR ?>"
					       value="blue" id="fbblue" <?php
					if ( $fb_color == "blue" ) {
						echo "checked";
					}
					?> />&nbsp;
					<img
						src="<?php echo PLUGIN_URL . "imgs/social/24/fb_blue.png" ?>"/>
					<img
						src="<?php echo PLUGIN_URL . "imgs/social/32/fb_blue.png" ?>"/>
					<img
						src="<?php echo PLUGIN_URL . "imgs/social/48/fb_blue.png" ?>"/>
					<img
						src="<?php echo PLUGIN_URL . "imgs/social/64/fb_blue.png" ?>"/>
					<br/>

					<div
						style="background-color: #9E9E9E; width: 216px; height: 70px; margin-top: 5px; padding-top: 5px; display: inline-block;">
						<input type="radio"
						       name="<?php echo self::PLUGIN_OPTION_SOCIAL_BUTTONS_FB_COLOR ?>"
						       value="trans" id="fbtrans" <?php
						if ( $fb_color == "trans" ) {
							echo "checked";
						}
						?> />&nbsp;
						<img
							src="<?php echo PLUGIN_URL . "imgs/social/24/fb_trans.png" ?>"/>
						<img
							src="<?php echo PLUGIN_URL . "imgs/social/32/fb_trans.png" ?>"/>
						<img
							src="<?php echo PLUGIN_URL . "imgs/social/48/fb_trans.png" ?>"/>
						<img
							src="<?php echo PLUGIN_URL . "imgs/social/64/fb_trans.png" ?>"/>
					</div>
					<?php _e( "Icons are transparent. Background is only for example.", self::PLUGIN_SLUG ); ?>
					<br/>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php print __( "Twitter Colors", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_BUTTONS_TW_COLOR ?>"
					       value="white_blue" id="fbblue" <?php
					if ( $tw_color == "white_blue" ) {
						echo "checked";
					}
					?> />&nbsp;
					<img
						src="<?php echo PLUGIN_URL . "imgs/social/24/twitter_white_blue.png" ?>"/>
					<img
						src="<?php echo PLUGIN_URL . "imgs/social/32/twitter_white_blue.png" ?>"/>
					<img
						src="<?php echo PLUGIN_URL . "imgs/social/48/twitter_white_blue.png" ?>"/>
					<img
						src="<?php echo PLUGIN_URL . "imgs/social/64/twitter_white_blue.png" ?>"/>
					<br/>

					<div
						style="background-color: #9E9E9E; width: 216px; height: 70px; margin-top: 5px; padding-top: 5px; margin-bottom: 5px; display: inline-block;">
						<input type="radio"
						       name="<?php echo self::PLUGIN_OPTION_SOCIAL_BUTTONS_TW_COLOR ?>"
						       value="blue_white" id="fbblue" <?php
						if ( $tw_color == "blue_white" ) {
							echo "checked";
						}
						?> />&nbsp;
						<img
							src="<?php echo PLUGIN_URL . "imgs/social/24/twitter_blue_white.png" ?>"/>
						<img
							src="<?php echo PLUGIN_URL . "imgs/social/32/twitter_blue_white.png" ?>"/>
						<img
							src="<?php echo PLUGIN_URL . "imgs/social/48/twitter_blue_white.png" ?>"/>
						<img
							src="<?php echo PLUGIN_URL . "imgs/social/64/twitter_blue_white.png" ?>"/>
					</div>
					<?php _e( "Icon background is white. Background is only for example.", self::PLUGIN_SLUG ); ?>
					<br/>

					<div
						style="background-color: #9E9E9E; width: 216px; height: 70px; margin-top: 5px; padding-top: 5px; display: inline-block;">
						<input type="radio"
						       name="<?php echo self::PLUGIN_OPTION_SOCIAL_BUTTONS_TW_COLOR ?>"
						       value="blue_trans" id="fbtrans" <?php
						if ( $tw_color == "blue_trans" ) {
							echo "checked";
						}
						?> />&nbsp;
						<img
							src="<?php echo PLUGIN_URL . "imgs/social/24/twitter_blue_trans.png" ?>"/>
						<img
							src="<?php echo PLUGIN_URL . "imgs/social/32/twitter_blue_trans.png" ?>"/>
						<img
							src="<?php echo PLUGIN_URL . "imgs/social/48/twitter_blue_trans.png" ?>"/>
						<img
							src="<?php echo PLUGIN_URL . "imgs/social/64/twitter_blue_trans.png" ?>"/>
					</div>
					<?php _e( "Icons are transparent. Background is only for example.", self::PLUGIN_SLUG ); ?>
					<br/>

					<div
						style="background-color: #9E9E9E; width: 216px; height: 70px; margin-top: 5px; padding-top: 5px; display: inline-block;">
						<input type="radio"
						       name="<?php echo self::PLUGIN_OPTION_SOCIAL_BUTTONS_TW_COLOR ?>"
						       value="white_trans" id="fbtrans" <?php
						if ( $tw_color == "white_trans" ) {
							echo "checked";
						}
						?> />&nbsp;
						<img
							src="<?php echo PLUGIN_URL . "imgs/social/24/twitter_white_trans.png" ?>"/>
						<img
							src="<?php echo PLUGIN_URL . "imgs/social/32/twitter_white_trans.png" ?>"/>
						<img
							src="<?php echo PLUGIN_URL . "imgs/social/48/twitter_white_trans.png" ?>"/>
						<img
							src="<?php echo PLUGIN_URL . "imgs/social/64/twitter_white_trans.png" ?>"/>
					</div>
					<?php _e( "Icons are transparent. Background is only for example.", self::PLUGIN_SLUG ); ?>
					<br/>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Google+ Colors", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_BUTTONS_GP_COLOR ?>"
					       value="red" id="fbblue" <?php
					if ( $gp_color == "red" ) {
						echo "checked";
					}
					?> />&nbsp;
					<img
						src="<?php echo PLUGIN_URL . "imgs/social/24/gp_red.png" ?>"/>
					<img
						src="<?php echo PLUGIN_URL . "imgs/social/32/gp_red.png" ?>"/>
					<img
						src="<?php echo PLUGIN_URL . "imgs/social/48/gp_red.png" ?>"/>
					<img
						src="<?php echo PLUGIN_URL . "imgs/social/64/gp_red.png" ?>"/>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Optional HTML code before buttons", self::PLUGIN_SLUG ) ?></th>
				<td>
					<textarea
						name="<?php echo self::PLUGIN_OPTION_SOCIAL_BUTTONS_HTML_BEFORE ?>"
						style="width: 500px; height: 250px;"><?php echo get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_HTML_BEFORE ); ?></textarea>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Optional HTML code after buttons", self::PLUGIN_SLUG ) ?></th>
				<td>
					<textarea
						name="<?php echo self::PLUGIN_OPTION_SOCIAL_BUTTONS_HTML_AFTER ?>"
						style="width: 500px; height: 250px;"><?php echo get_option( self::PLUGIN_OPTION_SOCIAL_BUTTONS_HTML_AFTER ); ?></textarea>
				</td>
			</tr>
		</table>
		<div class="gf-button-save">
		<?php
		submit_button( __( "Save settings", self::PLUGIN_SLUG ) );
		//echo '<span class="info">';
		//_e('Please don\'t forget to save changes.', self::PLUGIN_SLUG);
		//echo '</span>';
		?></div><?php
		print "</form>";
	}

	static public function SocialSettingsFacebookSlider() {

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_register_script( 'gf-fb-slider', PLUGIN_URL . 'js/fb-slider.js' );
		wp_enqueue_script( 'gf-fb-slider' );
		wp_register_style( 'gfonts-admin', PLUGIN_URL . 'css/gfonts.css' );
		wp_enqueue_style( 'gfonts-admin' );
		$trans = array(
			'urlToShort' => GFontsLang::GetTranslation( 'Facebook URL address is too short.' )
		);
		wp_localize_script( 'gf-fb-slider', 'objTrans', $trans );

		if ( @$_GET['settings-updated'] == 'true' ) {
			GFontsUI::Success( __( "Changes has been saved.", self::PLUGIN_SLUG ) );
		}

		print "<form method=\"post\" action=\"options.php\" onsubmit=\"return CheckFbForm();\"> ";
		settings_fields( self::PLUGIN_SLUG_SOCIAL_FB );
		do_settings_fields( self::PLUGIN_SLUG_SOCIAL_FB, '' );
		$enabled_fb  = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK, false );
		$horizontal  = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_HP, 'left' );
		$vertical    = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_VP, 'middle' );
		$show_faces  = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_SFACES, true );
		$show_header = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_SHEADER, true );
		$show_stream = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_SSTREAM, false );
		$cscheme     = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_COLOR_SCHEME, 'light' );
		$icon        = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_ICON, 'fb_blue_r2' );
		$lng         = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_LANGUAGE, WPLANG );
		$xml         = simplexml_load_file( 'http://www.facebook.com/translations/FacebookLocales.xml' );
		$langs       = array();
		foreach ( $xml->locale as $element ) {
			$name           = $element->englishName;
			$code           = (string) $element->codes->code->standard->representation;
			$langs[ $code ] = (string) $name;
		}
		?>
		<table class="form-table">
			<tr valign="top">
				<th scopre="row"><?php _e( "Enable facebook slider", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="checkbox"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK ?>"
					       id="sbfb" <?php
					if ( $enabled_fb ) {
						echo "checked";
					}
					?>><br/>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Horizontal position", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_HP ?>" <?php
					if ( $horizontal == 'left' ) {
						echo "checked";
					}
					?> value="left" id="sbfbleft"/>&nbsp;<label
						for="sbfbleft"><?php _e( 'Left', self::PLUGIN_SLUG ); ?></label><br/>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_HP ?>" <?php
					if ( $horizontal == 'right' ) {
						echo "checked";
					}
					?> value="right" id="sbfbright"/>&nbsp;<label
						for="sbfbright"><?php _e( 'Right', self::PLUGIN_SLUG ); ?></label><br/>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Vertical position", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_VP ?>" <?php
					if ( $vertical == 'top' ) {
						echo "checked";
					}
					?> value="top" id="sbfbtop"/>&nbsp;<label
						for="sbfbtop"><?php _e( 'Top', self::PLUGIN_SLUG ); ?></label><br/>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_VP ?>" <?php
					if ( $vertical == 'middle' ) {
						echo "checked";
					}
					?> value="middle" id="sbfbmiddle"/>&nbsp;<label
						for="sbfbmiddle"><?php _e( 'Middle', self::PLUGIN_SLUG ); ?></label><br/>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_VP ?>" <?php
					if ( $vertical == 'bottom' ) {
						echo "checked";
					}
					?> value="bottom" id="sbfbbottom"/>&nbsp;<label
						for="sbfbbottom"><?php _e( 'Bottom', self::PLUGIN_SLUG ); ?></label><br/>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Facebook slider button", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_ICON ?>" <?php
					if ( $icon == 'fb_blue_64' ) {
						echo "checked";
					}
					?> value="fb_blue_64"/>&nbsp;<img
						src="<?php echo PLUGIN_URL . "imgs/social/64/fb_blue.png" ?>"/>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_ICON ?>" <?php
					if ( $icon == 'fb_blue_n1' ) {
						echo "checked";
					}
					?> value="fb_blue_n1"/>&nbsp;<img
						src="<?php echo PLUGIN_URL . "imgs/social/other/fb/n1_left.png" ?>"/>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_ICON ?>" <?php
					if ( $icon == 'fb_blue_n2' ) {
						echo "checked";
					}
					?> value="fb_blue_n2"/>&nbsp;<img
						src="<?php echo PLUGIN_URL . "imgs/social/other/fb/n2_left.png" ?>"/>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_ICON ?>" <?php
					if ( $icon == 'fb_blue_r1' ) {
						echo "checked";
					}
					?> value="fb_blue_r1"/>&nbsp;<img
						src="<?php echo PLUGIN_URL . "imgs/social/other/fb/r1_left.png" ?>"/>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_ICON ?>" <?php
					if ( $icon == 'fb_blue_r2' ) {
						echo "checked";
					}
					?> value="fb_blue_r2"/>&nbsp;<img
						src="<?php echo PLUGIN_URL . "imgs/social/other/fb/r2_left.png" ?>"/>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Facebook button extra margin", self::PLUGIN_SLUG ) ?></th>
				<td>
					<input type="text"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BUTTON_MARGIN ?>"
					       style="width: 70px;"
					       value="<?php echo intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BUTTON_MARGIN, 0 ) ); ?>"/>&nbsp;px</br>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Color scheme", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_COLOR_SCHEME ?>" <?php
					if ( $cscheme == 'light' ) {
						echo "checked";
					}
					?> value="light" id="sbfbdark"/>&nbsp;<label
						for="sbfblight"><?php _e( 'Light', self::PLUGIN_SLUG ); ?></label><br/>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_COLOR_SCHEME ?>" <?php
					if ( $cscheme == 'dark' ) {
						echo "checked";
					}
					?> value="dark" id="sbfbdark"/>&nbsp;<label
						for="sbfbdark"><?php _e( 'Dark', self::PLUGIN_SLUG ); ?></label><br/>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Width", self::PLUGIN_SLUG ) ?></th>
				<td>
					<input type="text"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_WD ?>"
					       style="width: 70px;"
					       value="<?php echo intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_WD, 200 ) ); ?>"/>&nbsp;px</br>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Height", self::PLUGIN_SLUG ) ?></th>
				<td>
					<input type="text"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_HE ?>"
					       style="width: 70px;"
					       value="<?php echo intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_HE, 500 ) ); ?>"/>&nbsp;px</br>
				</td>
			</tr>
			<tr valign="top">
				<th scopre="row"><?php _e( "Show faces", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="checkbox"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_SFACES ?>"
					       id="sbfb_sf" <?php
					if ( $show_faces ) {
						echo "checked";
					}
					?>/><br/>
				</td>
			</tr>
			<tr valign="top">
				<th scopre="row"><?php _e( "Show header", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="checkbox"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_SHEADER ?>"
					       id="sbfb_sh" <?php
					if ( $show_header ) {
						echo "checked";
					}
					?>/><br/>
				</td>
			</tr>
			<tr valign="top">
				<th scopre="row"><?php _e( "Show stream", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="checkbox"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_SSTREAM ?>"
					       id="sbfb_ss" <?php
					if ( $show_stream ) {
						echo "checked";
					}
					?>/><br/>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Facebook URL", self::PLUGIN_SLUG ) ?></th>
				<td>
					http://www.facebook.com/&nbsp;<input type="text"
					                                     id="gffburl"
					                                     name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_URL ?>"
					                                     style="width: 250px;"
					                                     value="<?php echo get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_URL, '' ); ?>"/></br>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Facebook language", self::PLUGIN_SLUG ) ?></th>
				<td>
					<select
						name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_LANGUAGE ?>"
						style="width: 250px;">
						<?php
						foreach ( $langs as $code => $name ) {
							if ( $code == $lng ) {
								$selected = ' selected';
							} else {
								$selected = '';
							}
							echo sprintf( "<option value=\"%s\"%s>%s</option>\n", $code, $selected, $name );
						}
						?>
					</select>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Border", self::PLUGIN_SLUG ) ?></th>
				<td>
					<input type="text"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BORDER ?>"
					       style="width: 70px;"
					       value="<?php echo intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BORDER, 5 ) ); ?>"/>&nbsp;px</br>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Border color (Default: #3B5998)", self::PLUGIN_SLUG ) ?></th>
				<td>
					<input type="text"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BORDER_COLOR ?>"
					       style="width: 70px;" id="gf-fb-brd-color"
					       value="<?php echo get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BORDER_COLOR, "#3B5998" ); ?>"/></br>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Background color (Default: #FFFFFF)", self::PLUGIN_SLUG ) ?></th>
				<td>
					<input type="text"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BGCOLOR ?>"
					       style="width: 70px;" id="gf-fb-bg-color"
					       value="<?php echo get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BGCOLOR, "#FFFFFF" ); ?>"/></br>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "CSS z-index parameter", self::PLUGIN_SLUG ) ?></th>
				<td>
					<input type="text"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_ZINDEX ?>"
					       style="width: 70px;"
					       value="<?php echo intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_ZINDEX, 10000 ) ); ?>"/></br>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Rounded corners", self::PLUGIN_SLUG ) ?></th>
				<td>
					<?php _e( 'Left top', self::PLUGIN_SLUG ); ?>&nbsp;<input
						type="text"
						name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_LEFT_TOP ?>"
						style="width: 70px;"
						value="<?php echo intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_LEFT_TOP, 0 ) ); ?>"/>&nbsp;px</br>
					<?php _e( 'Left bottom', self::PLUGIN_SLUG ); ?>&nbsp;<input
						type="text"
						name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_LEFT_BOTTOM ?>"
						style="width: 70px;"
						value="<?php echo intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_LEFT_BOTTOM, 0 ) ); ?>"/>&nbsp;px</br>
					<?php _e( 'Right top', self::PLUGIN_SLUG ); ?>&nbsp;<input
						type="text"
						name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_RIGHT_TOP ?>"
						style="width: 70px;"
						value="<?php echo intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_RIGHT_TOP, 0 ) ); ?>"/>&nbsp;px</br>
					<?php _e( 'Right bottom', self::PLUGIN_SLUG ); ?>
					&nbsp;<input type="text"
					             name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_RIGHT_BOTTOM ?>"
					             style="width: 70px;"
					             value="<?php echo intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_RIGHT_BOTTOM, 0 ) ); ?>"/>&nbsp;px</br>
				</td>
			</tr>
		</table>
		<div class="gf-button-save">
		<?php
		submit_button( __( "Save settings", self::PLUGIN_SLUG ) );
		//echo '<span class="info">';
		//_e('Please don\'t forget to save changes.', self::PLUGIN_SLUG);
		//echo '</span>';
		?></div><?php
	}

	static public function Polls() {
		print "<div class=\"wrap\">";
		print "<h2>" . __( "Polls", self::PLUGIN_SLUG ) . "</h2>";
		$action = isset( $_GET['act'] ) ? $_GET['act'] : 'main';
		switch ( $action ) {
			case 'main':
				self::PollsMain();
				break;
			case 'edit':
				?><a
				href="?page=<?php echo self::PLUGIN_POLLS ?>"><?php _e( "Back to poll list", self::PLUGIN_SLUG ); ?></a>
				<br/><br/><?php
				self::PollsEdit();
				break;
			case 'save':
				self::PollsSave();
				break;
			case 'answers':
				?><a
				href="?page=<?php echo self::PLUGIN_POLLS ?>"><?php _e( "Back to poll list", self::PLUGIN_SLUG ); ?></a>
				<br/><br/><?php
				self::PollsAnswers();
				break;
			case 'editanswer':
				self::AnswerEdit();
				break;
			case 'saveanswer':
				self::AnswerSave();
				break;
		}

		print "</div>";
	}

	static public function PollsMain() {
		$table  = new K8_UI_Table();
		$action = $table->current_action();

		if ( $action != false ) {
			self::PollsMainAction( $action );
		}

		$rowActions[] = array(
			__( 'Edit', self::PLUGIN_SLUG ),
			'?page=' . self::PLUGIN_POLLS . '&act=edit',
			'id'
		);
		$rowActions[] = array(
			__( 'Delete', self::PLUGIN_SLUG ),
			'?page=' . self::PLUGIN_POLLS . '&action=delete',
			'id'
		);
		$table
			->setBaseUrl( 'admin.php' )
			->setPageName( self::PLUGIN_POLLS )
			//->setUrlSuffix()
			->setFontSize( 17 )
			->addColumn( null, null, 'poll_name', true )
			->addColumn( __( 'Poll name', self::PLUGIN_SLUG ), true, 'name', false, array(
				'?page=' . self::PLUGIN_POLLS . '&act=edit',
				'id'
			), $rowActions )
			->addColumn( __( 'Poll title', self::PLUGIN_SLUG ), true, 'title', false, array(
				'?page=' . self::PLUGIN_POLLS . '&act=edit',
				'id'
			), null )
			->addColumn( __( 'Voting enabled', self::PLUGIN_SLUG ), true, 'voting_enabled', false, array(
				'?page=' . self::PLUGIN_POLLS . '&act=edit',
				'id'
			), null, true )
			->addColumn( __( 'Voting end date', self::PLUGIN_SLUG ), true, 'voting_end_date', false, array(
				'?page=' . self::PLUGIN_POLLS . '&act=edit',
				'id'
			), null );
		$searchBox = new K8_UI_Table_SearchBox();
		$searchBox->setButtonText( __( "Search polls", self::PLUGIN_SLUG ) )->setInputName( 'poll_name' )->addHiddenField( 'page', self::PLUGIN_POLLS );
		$table->setSearchBox( $searchBox );
		//$table->addFilterElement('?page=' . self::PLUGIN_CUSTOM_TITLE_PRESETS, __("All", self::PLUGIN_SLUG), 'f', '');
		//$table->addFilterElement('?page=' . self::PLUGIN_CUSTOM_TITLE_PRESETS . '&f=x', __("None", self::PLUGIN_SLUG), 'f', 'x');
		//$table->addFilterElement('?page=' . self::PLUGIN_CUSTOM_TITLE_PRESETS . '&f=o', __("Other", self::PLUGIN_SLUG), 'f', 'o');
		$table->addBulkAction( 'delete', __( 'Delete', self::PLUGIN_SLUG ) );
		$ds = new GFontsPollsDataSource();
		if ( isset( $_GET['s'] ) ) {
			$ds->setFilterField( 'name' )->setFilterValue( $_GET['s'] );
		}
		if ( isset( $_GET['orderby'] ) ) {
			$ds->setOrderBy( $_GET['orderby'] )->setOrderDirection( $_GET['order'] );
		} else {
			$ds->setOrderBy( 'id' )->setOrderDirection( 'desc' );
		}
		$table->setDataSource( $ds );
		print "<a class=\"button\" href=\"?page=" . self::PLUGIN_POLLS . "&act=edit\">" . __( "Add new poll", self::PLUGIN_SLUG ) . "</a>&nbsp;&nbsp;";
		print "<br/>";
		$table->display();
	}

	static public function PollsEdit() {
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_style( 'jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/smoothness/jquery-ui.css' );
		wp_register_script( 'gf-poll-edit', PLUGIN_URL . "js/gf-poll-edit.js" );
		wp_enqueue_script( 'gf-poll-edit' );
		$id         = ( isset( $_GET['id'] ) ) ? $_GET['id'] : - 1;
		$poll_count = GFontsDB::CountPolls();
		if ( $id === - 1 && $poll_count >= 5 ) {
			echo '<span style="color: red;">' . __( 'You can create maximum 5 polls with Free Version. If you need more please purchase PRO. <a href="http://powerposts.net" target="_blank" >Click here for PRO</a>', self::PLUGIN_SLUG ) . '</span>';

			return;
		}
		if ( $id === - 1 ) {
			$pollname        = "";
			$polltitle       = "";
			$polltype        = "0";
			$voting_end_date = date( "Y-m-d", mktime( 0, 0, 0, date( "m" ) + 1, date( "d" ), date( "Y" ) ) );
			$voting_enabled  = true;
			$results_type    = 0;
			$client_mode     = 1; // 0 - cookie, 1 - ip based
			$button_title    = 'Vote';
		} else {
			$poll            = GFontsDB::GetPoll( $id );
			$pollname        = $poll->name;
			$polltitle       = $poll->title;
			$polltype        = $poll->type;
			$results_type    = $poll->results_type;
			$voting_end_date = $poll->voting_end_date;
			$voting_enabled  = ( $poll->voting_enabled == 1 );
			$client_mode     = $poll->client_mode;
			$button_title    = $poll->button_title;
		}

		$tabs = self::GetPollEditTabs( $id, true, false, $pollname );

		GFontsUITabs::DrawTabs( $tabs );
		?>

		<form method="post"
		      action="?page=<?php echo self::PLUGIN_POLLS ?>&act=save"
		      onsubmit="return GfValidatePollEdition();">
			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
			<?php self::PollFormBuilder( $pollname, $polltitle, $polltype, $results_type, $results_type, $voting_end_date, $voting_enabled, $client_mode, $button_title ); ?>
			<?php submit_button( __( "Save", self::PLUGIN_SLUG ) ); ?>
		</form>
	<?php
	}

	static public function GetPollEditTabs( $id, $t1, $t2, $title = null ) {
		$tabs[] = array(
			'title'  => __( "Poll data", self::PLUGIN_SLUG ),
			'href'   => '?page=' . self::PLUGIN_POLLS . '&act=edit' . ( ( $id != - 1 )
					? '&id=' . $id : '' ),
			'active' => $t1
		);
		if ( intval( $id ) > 0 ) {
			$tabs[] = array(
				'title'  => sprintf( __( "Poll answers (%s)", self::PLUGIN_SLUG ), $title ),
				'href'   => '?page=' . self::PLUGIN_POLLS . '&act=answers&pollid=' . $id,
				'active' => $t2
			);
		}

		return $tabs;
	}

	static public function PollsSave() {
		$id              = $_POST['id'];
		$name            = $_POST['poll_name'];
		$title           = $_POST['poll_title'];
		$type            = $_POST['poll_type'];
		$results_type    = $_POST['poll_results_type'];
		$voting_end_date = $_POST['poll_voting_end_date'];
		if ( $voting_end_date == '' ) {
			$voting_end_date = date( "Y-m-d", mktime( 0, 0, 0, date( "m" ) + 1, date( "d" ), date( "Y" ) ) );
		}
		$voting_enabled = isset( $_POST['poll_voting_enabled'] );
		$client_mode    = $_POST['poll_client_mode'];
		$button_title   = $_POST['button_title'];
		$idn            = GFontsDB::SavePoll( $id, $name, $title, $type, $results_type, $voting_enabled, $voting_end_date, $client_mode, $button_title );
		GFontsUI::Success( __( 'Poll data saved successfully.', self::PLUGIN_SLUG ) );
		?>
		<a
		href="?page=<?php echo self::PLUGIN_POLLS; ?>"><?php _e( "Back to poll list", self::PLUGIN_SLUG ); ?></a><?php
	}

	static public function PollsMainAction( $action ) {
		switch ( $action ) {
			default:
				GFontsUI::Notice( __( "Choose proper action.", self::PLUGIN_SLUG ) );
				break;
			case 'delete':
				if ( isset( $_GET['ids'] ) ) {
					foreach ( $_GET['ids'] as $id ) {
						GFontsDB::DeletePoll( intval( $id ) );
					}

					GFontsUI::Success( sprintf( _n( '%d poll deleted.', '%d polls deleted.', count( $_GET['ids'] ) ), count( $_GET['ids'] ) ) );
				}
				if ( isset( $_GET['id'] ) ) {
					$id = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : null;
					if ( $id !== null ) {
						GFontsDB::DeletePoll( $id );
						GFontsUI::Success( __( "Poll deleted.", self::PLUGIN_SLUG ) );
					} else {
						GFontsUI::Error( __( 'Wrong poll ID.', self::PLUGIN_SLUG ) );
						break;
					}
				}
				break;
			case 'deleteanswers':
				if ( isset( $_GET['ids'] ) ) {
					foreach ( $_GET['ids'] as $id ) {
						GFontsDB::DeleteAnswer( intval( $id ) );
					}

					GFontsUI::Success( sprintf( _n( '%d poll answer deleted.', '%d poll answers deleted.', count( $_GET['ids'] ) ), count( $_GET['ids'] ) ) );
				}
				if ( isset( $_GET['id'] ) ) {
					$id = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : null;
					if ( $id !== null ) {
						GFontsDB::DeleteAnswer( $id );
						GFontsUI::Success( __( "Poll answer deleted.", self::PLUGIN_SLUG ) );
					} else {
						GFontsUI::Error( __( 'Wrong poll answer ID.', self::PLUGIN_SLUG ) );
						break;
					}
				}
				break;
		}
	}

	static public function PollsAnswers() {

		wp_enqueue_script( 'jquery-ui-dialog' );
		wp_enqueue_style( 'jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/smoothness/jquery-ui.css' );
		wp_enqueue_script( 'gf-answers-list', PLUGIN_URL . "js/gf-answers-list.js" );

		$id   = ( isset( $_GET['pollid'] ) ) ? $_GET['pollid'] : - 1;
		$poll = GFontsDB::GetPoll( $id );
		$tabs = self::GetPollEditTabs( $id, false, true, $poll->name );

		GFontsUITabs::DrawTabs( $tabs );

		$table  = new K8_UI_Table();
		$action = $table->current_action();

		if ( $action != false ) {
			self::PollsMainAction( $action );
		}

		$rowActions[] = array(
			__( 'Edit', self::PLUGIN_SLUG ),
			'?page=' . self::PLUGIN_POLLS . '&act=editanswer&pollid=' . $_GET['pollid'],
			'id'
		);
		$rowActions[] = array(
			__( 'Delete', self::PLUGIN_SLUG ),
			'?page=' . self::PLUGIN_POLLS . '&act=answers&pollid=' . $_GET['pollid'] . '&action=deleteanswers',
			'id'
		);
		$table
			->setBaseUrl( 'admin.php' )
			->setPageName( self::PLUGIN_POLLS )
			//->setUrlSuffix()
			->setFontSize( 17 )
			->addColumn( null, null, 'answer', true )
			->addColumn( __( 'Answer', self::PLUGIN_SLUG ), true, 'answer', false, array(
				'?page=' . self::PLUGIN_POLLS . '&act=editanswer&pollid=' . $_GET['pollid'],
				'id'
			), $rowActions )
			->addColumn( __( 'Hits', self::PLUGIN_SLUG ), true, 'hits', false, array(
				'?page=' . self::PLUGIN_POLLS . '&act=editanswer&pollid=' . $_GET['pollid'],
				'id'
			), null );

		$searchBox = new K8_UI_Table_SearchBox();
		$searchBox->setButtonText( __( "Search answers", self::PLUGIN_SLUG ) )->setInputName( 'answer' )->addHiddenField( 'page', self::PLUGIN_POLLS )->addHiddenField( 'act', 'answers' )->addHiddenField( 'pollid', $id );
		$table->setSearchBox( $searchBox );
		//$table->addFilterElement('?page=' . self::PLUGIN_CUSTOM_TITLE_PRESETS, __("All", self::PLUGIN_SLUG), 'f', '');
		//$table->addFilterElement('?page=' . self::PLUGIN_CUSTOM_TITLE_PRESETS . '&f=x', __("None", self::PLUGIN_SLUG), 'f', 'x');
		//$table->addFilterElement('?page=' . self::PLUGIN_CUSTOM_TITLE_PRESETS . '&f=o', __("Other", self::PLUGIN_SLUG), 'f', 'o');
		$table->addBulkAction( 'deleteanswers', __( 'Delete', self::PLUGIN_SLUG ) );
		$ds = new GFontsPollsAnswersDataSource();
		$ds->addExtraWhereText( 'gf_polls_id = ' . intval( $_GET['pollid'] ) );
		if ( isset( $_GET['s'] ) ) {
			$ds->setFilterField( 'answer' )->setFilterValue( $_GET['s'] );
		}
		if ( isset( $_GET['orderby'] ) ) {
			$ds->setOrderBy( $_GET['orderby'] )->setOrderDirection( $_GET['order'] );
		} else {
			$ds->setOrderBy( 'id' )->setOrderDirection( 'desc' );
		}
		$table->setDataSource( $ds );
		print "<a class=\"button\" href=\"?page=" . self::PLUGIN_POLLS . "&act=editanswer&pollid=" . intval( $_GET['pollid'] ) . "\">" . __( "Add new answer", self::PLUGIN_SLUG ) . "</a>&nbsp;&nbsp;";
		print "<a class=\"button\" href=\"#\" onclick=\"return GfMassAddAnswers();\">" . __( "Mass add answers", self::PLUGIN_SLUG ) . "</a>&nbsp;&nbsp;";
		print "<br/>";
		$table->display();
		?>
		<script type="text/javascript">
			var pollid = <?php echo $id; ?>;
		</script>
	<div id="dialog-answers-form"
	     title="<?php _e( 'Mass add answers', self::PLUGIN_SLUG ); ?>">
		<p class="validateTips"><?php _e( 'Add answers - each per line', self::PLUGIN_SLUG ); ?></p>

		<p id="gf_saver" style="display: none; width: 320px;"><img
				src="<?php echo PLUGIN_URL; ?>assets/saver.gif"/><?php _e( 'Saving data... Please wait...', self::PLUGIN_SLUG ); ?>
		</p>

		<form>
			<fieldset>
				<label for="name">Answers</label>
				<textarea name="gf_answers" id="gf_answers"
				          style="width: 424px; height: 273px;"></textarea>
			</fieldset>
		</form>
		</div><?php
	}

	static public function AnswerEdit() {
		wp_register_script( 'gf-answer-edit', PLUGIN_URL . "js/gf-answer-edit.js" );
		wp_enqueue_script( 'gf-answer-edit' );
		$id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : - 1;
		if ( $id == - 1 ) {
			$answerText  = "";
			$hits        = "0";
			$gf_polls_id = $_GET['pollid'];
		} else {
			$answer      = GFontsDB::GetAnswer( $id );
			$answerText  = $answer->answer;
			$hits        = $answer->hits;
			$gf_polls_id = $answer->gf_polls_id;
		}

		$pollid = ( isset( $_GET['pollid'] ) ) ? $_GET['pollid'] : - 1;
		$poll   = GFontsDB::GetPoll( $pollid );
		$tabs   = self::GetPollEditTabs( $pollid, false, true, $poll->name );

		GFontsUITabs::DrawTabs( $tabs );
		?>
		<a href="?page=<?php echo self::PLUGIN_POLLS; ?>&act=answers&pollid=<?php echo $pollid; ?>"><?php _e( "Cancel and go to answers list", self::PLUGIN_SLUG ); ?></a>
		<br/>
		<h3><?php _e( 'Adding or editing poll answer', self::PLUGIN_SLUG ); ?></h3>
		<form method="post"
		      action="?page=<?php echo self::PLUGIN_POLLS ?>&act=saveanswer&pollid=<?php echo $pollid; ?>"
		      onsubmit="return GfValidateAnswerEdition();">
			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
			<input type="hidden" name="gf_polls_id"
			       value="<?php echo $gf_polls_id; ?>"/>
			<table border="0">
				<tr valign="top">
					<th align="left"
					    width="200"><?php _e( "Answer", self::PLUGIN_SLUG ); ?></th>
					<td><input type="text" name="answer" id="answer"
					           value="<?php echo stripslashes( $answerText ); ?>"
					           style="width: 500px;"/></td>
				</tr>
				<tr valign="top">
					<th align="left"
					    width="200"><?php _e( "Hits", self::PLUGIN_SLUG ); ?></th>
					<td><input type="text" name="hits" id="hits"
					           value="<?php echo $hits; ?>"
					           style="width: 500px;"/></td>
				</tr>
			</table><?php submit_button( __( "Save", self::PLUGIN_SLUG ) ); ?>
		</form>
	<?php
	}

	static public function AnswerSave() {
		$id          = $_POST['id'];
		$gf_polls_id = $_POST['gf_polls_id'];
		$answer      = $_POST['answer'];
		$hits        = intval( $_POST['hits'] );
		$idn         = GFontsDB::SaveAnswer( $id, $answer, $hits, $gf_polls_id );
		GFontsUI::Success( __( 'Poll answer saved successfully.', self::PLUGIN_SLUG ) );
		$pollid = ( isset( $_GET['pollid'] ) ) ? $_GET['pollid'] : - 1;
		$poll   = GFontsDB::GetPoll( $pollid );
		$tabs   = self::GetPollEditTabs( $pollid, false, true, $poll->name );

		GFontsUITabs::DrawTabs( $tabs );
		?>
		<a
		href="?page=<?php echo self::PLUGIN_POLLS; ?>&act=answers&pollid=<?php echo $gf_polls_id; ?>"><?php _e( "Back to poll answers", self::PLUGIN_SLUG ); ?></a><?php
	}

	static public function AddMassAnswers() {
		$id       = $_POST['id'];
		$answers  = $_POST['answers'];
		$oAnswers = explode( "\n", $answers );
		foreach ( $oAnswers as $oa ) {
			if ( trim( $oa ) != '' ) {
				GFontsDB::SaveAnswer( - 1, $oa, 0, $id );
			}
		}
		$response = array(
			'result'  => 0,
			'message' => ''
		);

		echo json_encode( $response );
		die();
	}

	static public function RegisterWidgets() {
		register_widget( 'GF_Poll_Widget' );
	}

	static public function PollVote() {
		$poll_id = $_POST['poll_id'];
		$oPoll   = GFontsDB::GetPoll( $poll_id );
		$width   = $_POST['width'];
		$height  = $_POST['height'];
		$legend  = $_POST['legend'];
		if ( ! $oPoll ) {
			_e( 'Wrong poll ID.', self::PLUGIN_SLUG );
			die();
		} else {
			$client_mode = $oPoll->client_mode;
			$allowed     = true;
			$ip          = $_SERVER['REMOTE_ADDR'];
			if ( isset( $_SERVER['HTTP_X_REAL_IP'] ) ) {
				$ip = $_SERVER['HTTP_X_REAL_IP'];
			}
			$allowed = ( $oPoll->voting_enabled == 1 );

			if ( $allowed ) {
				$enddate = strtotime( $oPoll->voting_end_date );
				$today   = time();
				if ( $enddate < $today ) {
					$allowed = false;
				}
			}
			if ( $client_mode == 0 ) {
				if ( isset( $_COOKIE[ 'poll_vote_' . $poll_id ] ) ) {
					$allowed = false;
				}
			} else {
				$c = GFontsDB::CheckVoteIpForPoll( $poll_id, $ip );
				if ( $c > 0 ) {
					$allowed = false;
				}
			}

			if ( ! $allowed ) {
				echo GF_Poll_Output::GeneratePollOutput( $oPoll, $_POST['area'], $width, $height, $legend );
			} else {
				$answer_id = isset( $_POST['answer_id'] ) ? intval( $_POST['answer_id'] )
					: 0;
				if ( $answer_id == 0 ) {
					echo GF_Poll_Output::GeneratePollOutput( $oPoll, $_POST['area'], $width, $height, $legend );
				} else {
					GFontsDB::AddPollHit( $poll_id, $answer_id, $client_mode, $ip );
					if ( $client_mode == 0 ) {
						setcookie( 'poll_vote_' . $poll_id, 1, time() + 7776000, '/' );
					}
					echo GF_Poll_Output::GeneratePollOutput( $oPoll, $_POST['area'], $width, $height, $legend );
				}
			}
		}
		die();
	}

	static public function WpHead() {
		print "<script type=\"text/javascript\" src=\"https://www.google.com/jsapi\"></script>";
		self::$wpHeadSent = true;
	}

	static public function RegisterShortCodes() {
		add_shortcode( 'gfpoll', array( 'GFontsEngine', 'GfPollShortCode' ) );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_style( 'jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/smoothness/jquery-ui.css' );

		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			return;
		}

		if ( get_user_option( 'rich_editing' ) == 'true' ) {
			add_filter( 'mce_external_plugins', array(
				'GFontsEngine',
				'GfPollMcePlugin'
			) );
			add_filter( 'mce_buttons_2', array(
				'GFontsEngine',
				'GfPollMcePluginButtons'
			) );
		}
	}

	static public function GfPollMcePlugin( $plugin_array ) {
		$plugin_array['gf_poll'] = PLUGIN_URL . 'js/gf-poll-mce-plugin.js';

		return $plugin_array;
	}

	static public function GfPollMcePluginButtons( $buttons ) {
		array_push( $buttons, "|", "gf_poll" );
		if ( ! in_array( 'styleselect', $buttons ) ) {
			array_unshift( $buttons, 'styleselect' );
		}

		return $buttons;
	}

	static public function GfPollShortCode( $atts, $content ) {
		$poll_id = $atts['id'];
		$width   = $atts['width'];
		$height  = $atts['height'];
		$legend  = $atts['legend'];

		return GF_Poll_Output::PollOutputForShortCode( $poll_id, $width, $height, $legend );
	}

	static public function AjaxLoadPollWizard() {
		$step     = ( isset( $_GET['step'] ) ) ? intval( $_GET['step'] ) : 1;
		$maxsteps = 5;
		include( PLUGIN_DIR . '/templates/poll_wizard_header.php' );
		switch ( $step ) {
			case 1 :
				include( PLUGIN_DIR . '/templates/poll_wizard_1.php' );
				break;
		}
		include( PLUGIN_DIR . '/templates/poll_wizard_footer.php' );
		die();
	}

	static public function PollFormBuilder( $pollname, $polltitle, $polltype, $results_type, $results_type, $voting_end_date, $voting_enabled, $client_mode, $button_title ) {
		?>
		<table border="0">
			<tr valign="top">
				<th align="left"
				    width="200"><?php _e( "Poll name", self::PLUGIN_SLUG ); ?></th>
				<td><input type="text" name="poll_name" id="poll_name"
				           value="<?php echo $pollname; ?>"
				           style="width: 500px;"/></td>
			</tr>
			<tr valign="top">
				<th align="left"
				    width="200"><?php _e( "Poll title", self::PLUGIN_SLUG ); ?></th>
				<td><input type="text" name="poll_title" id="poll_title"
				           value="<?php echo $polltitle; ?>"
				           style="width: 500px;"/></td>
			</tr>
			<tr valign="top">
				<th align="left"
				    width="200"><?php _e( "Voting button text", self::PLUGIN_SLUG ); ?></th>
				<td><input type="text" name="button_title" id="button_title"
				           value="<?php echo $button_title; ?>"
				           style="width: 500px;"/></td>
			</tr>
			<tr valign="top">
				<th align="left"
				    width="200"><?php _e( "Poll type", self::PLUGIN_SLUG ); ?></th>
				<td valign="top"><select name="poll_type" id="poll_type"
				                         style="width: 500px;">
						<option value="0"<?php
						if ( $polltype == 0 ) {
							echo " selected";
						}
						?>><?php _e( "Pie chart", self::PLUGIN_SLUG ); ?></option>
						<option value="1"<?php
						if ( $polltype == 1 ) {
							echo " selected";
						}
						?>><?php _e( "Bar chart", self::PLUGIN_SLUG ); ?></option>
						<option value="2"<?php
						if ( $polltype == 2 ) {
							echo " selected";
						}
						?>><?php _e( "Column chart", self::PLUGIN_SLUG ); ?></option>
						<option value="3"<?php
						if ( $polltype == 3 ) {
							echo " selected";
						}
						?>><?php _e( "Donut chart", self::PLUGIN_SLUG ); ?></option>
					</select><br/>
					<img
						src="<?php echo self::PLUGIN_URL; ?>assets/charts/pie.png"
						class="chart pie" style="display: none;"/>
					<img
						src="<?php echo self::PLUGIN_URL; ?>assets/charts/bar.png"
						class="chart bar" style="display: none;"/>
					<img
						src="<?php echo self::PLUGIN_URL; ?>assets/charts/column.png"
						class="chart column" style="display: none;"/>
					<img
						src="<?php echo self::PLUGIN_URL; ?>assets/charts/donut.png"
						class="chart donut" style="display: none;"/>
			</tr>
			<tr valign="top">
				<th align="left"
				    width="200"><?php _e( "Results type", self::PLUGIN_SLUG ); ?></th>
				<td valign="top"><select name="poll_results_type"
				                         id="poll_results_type"
				                         style="width: 500px;">
						<option value="0"<?php
						if ( $results_type == 0 ) {
							echo " selected";
						}
						?>><?php _e( "Percentage", self::PLUGIN_SLUG ); ?></option>
						<option value="1"<?php
						if ( $results_type == 1 ) {
							echo " selected";
						}
						?>><?php _e( "Vote numbers (recommended for BarChart and ColumnChart)", self::PLUGIN_SLUG ); ?></option>
						<option value="2"<?php
						if ( $results_type == 2 ) {
							echo " selected";
						}
						?>><?php _e( "Label (recommended for PieChart and DonutChart)", self::PLUGIN_SLUG ); ?></option>
					</select>
			</tr>
			<tr valign="top">
				<th align="left"
				    width="200"><?php _e( "Voting end date", self::PLUGIN_SLUG ); ?></th>
				<td><input type="text" name="poll_voting_end_date"
				           id="poll_voting_end_date"
				           value="<?php echo $voting_end_date; ?>"
				           style="width: 500px;"/></td>
			</tr>
			<tr valign="top">
				<th align="left"
				    width="200"><?php _e( "Voting enabled", self::PLUGIN_SLUG ); ?></th>
				<td><input type="checkbox" name="poll_voting_enabled"
				           id="poll_voting_enabled" <?php
					if ( $voting_enabled ) {
						echo "checked";
					}
					?> /></td>
			</tr>
			<tr valign="top">
				<th align="left"
				    width="200"><?php _e( "Client limitation mode", self::PLUGIN_SLUG ); ?></th>
				<td valign="top"><select name="poll_client_mode"
				                         id="poll_client_mode"
				                         style="width: 500px;">
						<option value="0"<?php
						if ( $client_mode == 1 ) {
							echo " selected";
						}
						?>><?php _e( "Cookie - can be easly faked", self::PLUGIN_SLUG ); ?></option>
						<option value="1"<?php
						if ( $client_mode == 1 ) {
							echo " selected";
						}
						?>><?php _e( "Ip based - 1 vote per IP", self::PLUGIN_SLUG ); ?></option>
					</select>
			</tr>
		</table>
	<?php
	}

	static public function AddNewPollFromWizard() {
		$name            = $_POST['poll_name'];
		$title           = $_POST['poll_title'];
		$type            = $_POST['poll_type'];
		$results_type    = $_POST['poll_results_type'];
		$voting_end_date = $_POST['poll_voting_end_date'];
		if ( $voting_end_date == '' ) {
			$voting_end_date = date( "Y-m-d", mktime( 0, 0, 0, date( "m" ) + 1, date( "d" ), date( "Y" ) ) );
		}
		$voting_enabled = ( $_POST['poll_voting_enabled'] == 1 );
		$client_mode    = $_POST['poll_client_mode'];
		$button_title   = $_POST['button_title'];
		$idn            = GFontsDB::SavePoll( - 1, $name, $title, $type, $results_type, $voting_enabled, $voting_end_date, $client_mode, $button_title );
		$answers        = $_POST['answers'];
		$oAnswers       = explode( "\n", $answers );
		foreach ( $oAnswers as $oa ) {
			if ( trim( $oa ) != '' ) {
				GFontsDB::SaveAnswer( - 1, $oa, 0, $idn );
			}
		}
		$response = array(
			'result'   => 0,
			'message'  => '',
			'gfpollid' => $idn
		);

		echo json_encode( $response );
		die();
	}

	static public function BloginfoFilter( $value, $name ) {
		if ( self::$wpHeadSent ) {
			if ( $name == 'description' ) {
				$value = wp_specialchars_decode( $value, ENT_QUOTES );
			}
			if ( $name == 'name' ) {
				$value = wp_specialchars_decode( $value, ENT_QUOTES );
			}
		}

		return $value;
	}

	static public function AttributeEscape( $safe_text, $text ) {
		if (
			( $text == self::$wpTitleText ) ||
			( $text == self::$wpDescText ) ||
			( preg_match( '/\<span class="gfdescription_customized">(.+)<\/span>/i', $text ) )
		) {
			return strip_tags( $text );
		} else {
			return $safe_text;
		}
	}

	static public function BlognameOption( $value ) {
		if (
			self::$wpHeadSent &&
			self::$titleCustomized &&
			! empty( $value )
		) {
			$value             = '<span class="gftitle_customized">' . $value . "</span>";
			self::$wpTitleText = $value;

			return $value;
		} else {
			return $value;
		}
	}

	static public function BlognamePreOption( $value ) {
		if (
			self::$wpHeadSent &&
			! empty( $value )
		) {
			$value             = '<span class="gftitle_customized">' . $value . "</span>";
			self::$wpTitleText = $value;
		}

		return $value;
	}

	static public function BlogdescriptionOption( $value ) {
		if (
			self::$wpHeadSent &&
			! empty( $value ) &&
		    self::$titleDescriptionCustomized
		) {
			$value             = '<span class="gfdescription_customized">' . $value . "</span>";
			self::$wpTitleText = $value;

			return $value;
		} else {
			return $value;
		}
	}

	static public function BlogdescriptionPreOption( $value ) {
		if (
			self::$wpHeadSent &&
			! empty( $value ) &&
		    self::$titleDescriptionCustomized
		) {
			$value             = '<span class="gfdescription_customized">' . $value . "</span>";
			self::$wpTitleText = $value;
		}

		return $value;
	}

	static public function WpCustomization() {
		add_filter( 'pre_option_blogname', array(
			'GFontsEngine',
			'BlognamePreOption'
		), 10000, 1 );
		add_filter( 'pre_option_blogdescription', array(
			'GFontsEngine',
			'BlogdescriptionPreOption'
		), 10000, 1 );
		wp_enqueue_script( 'kaplugins-customizer', PLUGIN_URL . 'js/wp-customizer.js', array( 'customize-preview' ), time(), true );
	}

	static public function NavigationMenuBegin( $args ) {
		self::$navMenuBegin        = true;
		self::$navMenuClass        = 'gfcustomizedmedmenuitem-' . $args['theme_location'];
		$args['menu_class']        = 'gfcustomizedmenu-' . $args['theme_location'] . ' ' . $args['menu_class'];
		$args['_orig_fallback_cb'] = $args['fallback_cb'];
		$args['fallback_cb']       = array(
			'GFontsEngine',
			'NavigationMenuEnd2'
		);

		return $args;
	}

	static public function NavigationMenuEnd( $args ) {
		self::$navMenuBegin = false;

		return $args;
	}

	static public function NavigationMenuEnd2( $items, $args = null ) {
		if ( function_exists( $items['_orig_fallback_cb'] ) ) {
			call_user_func( $items['_orig_fallback_cb'], (array) $items );
		}
		self::$navMenuBegin = false;
	}

	static public function DrawFontTabs() {
		print "<div class=\"wrap\">";
		print "<h2>" . __( "Fonts", self::PLUGIN_SLUG ) . "</h2>";
		$tabs[] = array(
			'title'  => __( "Install / uninstall", self::PLUGIN_SLUG ),
			'href'   => '?page=' . self::PLUGIN_SLUG,
			'active' => ! isset( $_GET['actio'] )
		);
		$tabs[] = array(
			'title'  => __( "Your fonts", self::PLUGIN_SLUG ),
			'href'   => '?page=' . self::PLUGIN_SLUG . '&actio=' . self::PLUGIN_FONT_LIST,
			'active' => @$_GET['actio'] == self::PLUGIN_FONT_LIST
		);
		$tabs[] = array(
			'title'  => __( "Statistics & Tools", self::PLUGIN_SLUG ),
			'href'   => '?page=' . self::PLUGIN_SLUG . '&actio=' . self::PLUGIN_FONT_STATS,
			'active' => @$_GET['actio'] == self::PLUGIN_FONT_STATS
		);
		$tabs[] = array(
			'title'  => __( "Extra Font Sizes", self::PLUGIN_SLUG ),
			'href'   => '?page=' . self::PLUGIN_SLUG . '&actio=' . self::PLUGIN_FONT_SIZE,
			'active' => @$_GET['actio'] == self::PLUGIN_FONT_SIZE
		);
		GFontsUITabs::DrawTabs( $tabs );
	}

	static public function AjaxMassTitleTools() {
		$action    = @$_POST['act'];
		$start     = (int) @$_POST['start'];
		$all_posts = wp_count_posts( 'post' );
		$total     = $all_posts->publish + $all_posts->draft + $all_posts->pending + $all_posts->future + $all_posts->private + $all_posts->trash;
		switch ( $action ) {
			case 'capitalize':
				$c = GFontsDB::ModifyCapitalizeUpperLowerTitlesLimited( 'capitalize', $start, 5 );
				break;
			case 'upperfirst':
				$c = GFontsDB::ModifyCapitalizeUpperLowerTitlesLimited( 'upfirst', $start, 5 );
				break;
			case 'upper':
				$c = GFontsDB::ModifyCapitalizeUpperLowerTitlesLimited( 'upper', $start, 5 );
				break;
			case 'lower':
				$c = GFontsDB::ModifyCapitalizeUpperLowerTitlesLimited( 'lower', $start, 5 );
				break;
		}

		$response = array(
			'result'   => 0,
			'start'    => (int) $c,
			'message'  => sprintf( __( 'Finished %d of %d (%d%%)', self::PLUGIN_SLUG ), $c, $total, ( $c * 100 ) / $total ),
			'finished' => ( $c >= $total ) ? 1 : 0
		);

		echo json_encode( $response );
		die();
	}

	static public function ThemeLayouts() {
		print "<div class=\"wrap\">";
		print "<h2>" . __( "Theme Layouts", self::PLUGIN_SLUG ) . "</h2>";
		$tabs[] = array(
			'title'  => __( "Manage layouts", self::PLUGIN_SLUG ),
			'href'   => '?page=' . self::PLUGIN_THEME_LAYOUTS,
			'active' => ! isset( $_GET['act'] ) ? true : false
		);
		$tabs[] = array(
			'title'  => __( "Import layouts", self::PLUGIN_SLUG ),
			'href'   => '?page=' . self::PLUGIN_THEME_LAYOUTS . '&act=import',
			'active' => isset( $_GET['act'] ) ? ( $_GET['act'] == 'import' || $_GET['act'] == 'import2' )
				: false
		);

		GFontsUITabs::DrawTabs( $tabs );

		$action = isset( $_GET['act'] ) ? $_GET['act'] : 'main';
		switch ( $action ) {
			case 'main':
				self::ThemeLayoutsMain();
				break;
			case 'import':
				self::ThemeLayoutsImport();
				break;
			case 'import2':
				self::ThemeLayoutsImport2();
				break;
		}

		print "</div>";
	}

	static public function ThemeLayoutsMain() {
		wp_register_script( 'gf-theme-layout', PLUGIN_URL . 'js/themelayout.js' );
		wp_enqueue_script( 'gf-theme-layout' );
		$trans = array(
			'not_empty' => GFontsLang::GetTranslation( 'Layout settings name could not be empty' )
		);
		wp_localize_script( 'gf-theme-layout', 'objTrans', $trans );

		$table  = new K8_UI_Table();
		$action = $table->current_action();
		$v      = true;
		if ( $action != false ) {
			$v = self::ThemeLayoutsMainAction( $action );
		}

		if ( ! $v ) {
			return false;
		}
		$rowActions[]  = array(
			__( 'Edit name', self::PLUGIN_SLUG ),
			'?page=' . self::PLUGIN_THEME_LAYOUTS . '&action=edit',
			'id'
		);
		$rowActions[]  = array(
			__( 'Delete', self::PLUGIN_SLUG ),
			'?page=' . self::PLUGIN_THEME_LAYOUTS . '&action=delete',
			'id'
		);
		$rowActions[]  = array(
			__( 'Set layout as active', self::PLUGIN_SLUG ),
			'?page=' . self::PLUGIN_THEME_LAYOUTS . '&action=activate',
			'id'
		);
		$rowActions2[] = array(
			__( 'Preview', self::PLUGIN_SLUG ),
			get_home_url() . '?layoutpreview=1',
			'id'
		);
		$table
			->setBaseUrl( 'admin.php' )
			->setPageName( self::PLUGIN_THEME_LAYOUTS )
			//->setUrlSuffix()
			->setFontSize( 17 )
			->addColumn( null, null, 'layout', true )
			->addColumn( __( 'Name', self::PLUGIN_SLUG ), true, 'gtl_name', false, array(
				'?page=' . self::PLUGIN_THEME_LAYOUTS . '&action=edit',
				'id'
			), $rowActions )
			->addColumn( __( 'Theme', self::PLUGIN_SLUG ), true, 'gtl_layout', false, array(
				'?page=' . self::PLUGIN_THEME_LAYOUTS . '&action=edit',
				'id'
			), $rowActions2, false, true );
		$searchBox = new K8_UI_Table_SearchBox();
		$searchBox->setButtonText( __( "Search layouts", self::PLUGIN_SLUG ) )->setInputName( 'layout_name' )->addHiddenField( 'page', self::PLUGIN_THEME_LAYOUTS );
		$table->setSearchBox( $searchBox );
		$table->addBulkAction( 'delete', __( 'Delete', self::PLUGIN_SLUG ) );
		$table->addBulkAction( 'export', __( 'Export', self::PLUGIN_SLUG ) );
		$ds = new GFontsThemeLayoutsDataSource();
		if ( isset( $_GET['s'] ) ) {
			$ds->setFilterField( 'gtl_name' )->setFilterValue( $_GET['s'] );
		}
		if ( isset( $_GET['orderby'] ) ) {
			$ds->setOrderBy( $_GET['orderby'] )->setOrderDirection( $_GET['order'] );
		} else {
			$ds->setOrderBy( 'gtl_name' )->setOrderDirection( 'asc' );
		}
		$table->setDataSource( $ds );
		print "<a class=\"button\" href=\"?page=" . self::PLUGIN_THEME_LAYOUTS . "&action=resetcurrentlayout\" onclick=\"return ResetCurrentLayoutSettings('" . __( 'Are you sure you want to reset current layout settings?', self::PLUGIN_SLUG ) . "');\">" . __( "Reset Current Power Posts Layout settings", self::PLUGIN_SLUG ) . "</a>&nbsp;&nbsp;";
		print "<form id=\"gf-lsave\" method=\"post\" action=\"?page=" . self::PLUGIN_THEME_LAYOUTS . "&action=savecurrent\" style=\"display: inline;\">";
		print "<a class=\"button\" href=\"#\" onclick=\"return SaveCurrentLayoutSettings('" . __( 'Are you sure you want to save current layout settings?', self::PLUGIN_SLUG ) . "'   );\">" . __( "Save current layout settings", self::PLUGIN_SLUG ) . "</a>&nbsp;&nbsp;";
		print "<input type=\"text\" name=\"gf_layout_name\" id=\"gf_layout_name\" value=\"\" />&nbsp;<label for=\"gf_layout_name\">" . __( 'Layout settings name', self::PLUGIN_SLUG ) . "</label>";
		print "</form>";
		print "<br/>";
		$table->display();
	}

	static public function ThemeLayoutsMainAction( $action ) {
		switch ( $action ) {
			case 'delete':
				if ( isset( $_GET['id'] ) ) {
					print "<div id=\"message\" class=\"updated\"><p><strong>";
					GFontsDB::DeleteThemeLayout( intval( $_GET['id'] ) );
					_e( 'Layout successfully deleted.', self::PLUGIN_SLUG );
					print "</strong></p></div>";
				}
				if ( isset( $_GET['ids'] ) ) {
					foreach ( $_GET['ids'] as $id ) {
						GFontsDB::DeleteThemeLayout( intval( $id ) );
					}
					print "<div id=\"message\" class=\"updated\"><p><strong>";
					printf( _n( '%d layout deleted.', '%d layouts deleted.', count( $_GET['ids'] ) ), count( $_GET['ids'] ) );
					print "</strong></p></div>";
				}

				return true;
				break;
			case 'export':
				return true;
				break;
			case 'savecurrent':
				if ( isset( $_POST['gf_layout_name'] ) ) {
					GFontsDB::SaveCurrentLayoutSettings( $_POST['gf_layout_name'] );
					print "<div id=\"message\" class=\"updated\"><p><strong>" . GFontsLang::GetTranslation( 'Layout settings saved successfully.' );
					print "</strong></p></div>";
				}

				return true;
				break;
			case 'resetcurrentlayout':
				$mods = get_theme_mods();
				foreach ( $mods as $mod => $value ) {
					set_theme_mod( $mod, null );
				}
				print "<div id=\"message\" class=\"updated\"><p><strong>" . GFontsLang::GetTranslation( 'Layout settings resetted successfully.' );
				print "</strong></p></div>";

				return true;
				break;
			case 'activate':
				$v = GFontsDB::ActivateLayoutSettings( $_GET['id'], $name );
				print "<div id=\"message\" class=\"updated\"><p><strong>";
				if ( $v ) {
					print GFontsLang::GetTranslation( 'Layout activated successfully.' );
				} else {
					print sprintf( GFontsLang::GetTranslation( 'Layout settings could not be activated for theme %s. Please switch to theme %s and try again.' ), wp_get_theme()->name, $name );
				}
				print "</strong></p></div>";

				return true;
				break;
			case 'edit':
				return self::EditThemeLayout( $_GET['id'] );
				break;
			case 'editsave':
				GFontsDB::RenameThemeLayout( $_POST['id'], $_POST['gf_layout_name'] );

				return true;
			default:
				return true;
				break;
		}
	}

	static public function EditThemeLayout( $id ) {
		$lo = GFontsDB::GetThemeLayout( $id );
		if ( $lo == null ) {
			print "<div id=\"message\" class=\"updated\"><p><strong>";
			_e( 'Unable to load theme.', self::PLUGIN_SLUG );
			print "</strong></p></div>";

			return true;
		} else {
			?>
			<form method="post"
			      action="?page=<?php echo self::PLUGIN_THEME_LAYOUTS; ?>&action=editsave"
			      onsubmit="return CheckEdition('<?php _e( 'Are you sure you want to save data?', self::PLUGIN_SLUG ); ?>');">
				<input type="hidden" name="id" value="<?php echo $lo->id; ?>"/>
				<strong><?php _e( 'Layout theme name', self::PLUGIN_SLUG ); ?></strong><br/><input
					type="text" name="gf_layout_name" id="gf_layout_name"
					value="<?php echo $lo->gtl_name; ?>"/>
				<br/><br/>
				<button
					style="cursor:pointer;"><?php _e( 'Save new name', self::PLUGIN_SLUG ); ?></button>
				<button style="cursor:pointer;"
				        onclick="return CancelEdition();"><?php _e( 'Cancel', self::PLUGIN_SLUG ); ?></button>
			</form>
		<?php
		}
	}

	static public function DownloadAttachments( $doaction ) {
		if ( $_GET['page'] == self::PLUGIN_THEME_LAYOUTS && ( $doaction == 'export' ) ) {
			if ( isset( $_GET['ids'] ) ) {
				$ids = $_GET['ids'];
				$xml = GFontsDB::ExportThemeLayouts( $ids );
				header( 'Content-Description: File Transfer' );
				header( 'Content-type: text/xml' );
				header( 'Content-Disposition: attachment; filename="export' . date( "YmdHis" ) . '.xml"' );
				echo $xml;
				die();
			}
		}

		if ( $_GET['page'] == self::PLUGIN_CUSTOM_TITLE_PRESETS && $doaction == 'export' ) {
			if ( isset( $_GET['ids'] ) ) {
				$ids = $_GET['ids'];
				$xml = GFontsDB::ExportTitlePresets( $ids );
				header( 'Content-Description: File Transfer' );
				header( 'Content-type: text/xml' );
				header( 'Content-Disposition: attachment; filename="presets' . date( "YmdHis" ) . '.xml"' );
				echo $xml;
				die();
			}
		}
	}

	static public function ThemeLayoutsImport() {
		?>
		<h3><?php _e( 'Import XML file with theme layout settings', self::PLUGIN_SLUG ); ?></h3>
		<form method="post" enctype="multipart/form-data"
		      action="?page=<?php echo self::PLUGIN_THEME_LAYOUTS; ?>&act=import2">
			<input type="file" name="importfile" id="file"><br/><br/>
			<input type="submit" name="submit"
			       value="<?php _e( 'Upload import file', self::PLUGIN_SLUG ); ?>">
		</form>
	<?php
	}

	static public function ThemeLayoutsImport2() {
		$plik = $_FILES;
		if ( ! isset( $plik['importfile'] ) ) {
			GFontsUI::Error( __( 'Please upload import file. Try again.', self::PLUGIN_SLUG ) );
			self::ThemeLayoutsImport();

			return;
		} else {
			$error = intval( $plik['importfile']['error'] );
			if ( $error != 0 ) {
				GFontsUI::Error( __( 'Error while uploading import file. Try again.', self::PLUGIN_SLUG ) );
				self::ThemeLayoutsImport();

				return;
			}

			$type = $plik['importfile']['type'];
			if ( $type != 'text/xml' ) {
				GFontsUI::Error( sprintf( __( 'Expected type text/xml - got %s', self::PLUGIN_SLUG ), $type ) );
				self::ThemeLayoutsImport();

				return;
			}

			$xml = simplexml_load_file( $plik['importfile']['tmp_name'] );
			if ( $xml === false ) {
				GFontsUI::Error( __( 'Error in XML structure.', self::PLUGIN_SLUG ) );
				self::ThemeLayoutsImport();

				return;
			}
			$sum = 0;
			foreach ( $xml->layouts->layout as $layout ) {
				if ( GFontsDB::ImportThemeLayout( $layout ) ) {
					$sum ++;
				}
			}
			$sum2 = 0;
			foreach ( $xml->presets->preset as $preset ) {
				if ( GFontsDB::ImportPreset( $preset ) ) {
					$sum2 ++;
				}
			}

			GFontsUI::Success( sprintf( __( "%d theme layouts imported. %d title presets imported.", self::PLUGIN_SLUG ), $sum, $sum2 ) );
			self::ThemeLayoutsImport();
		}
	}

	static public function PresetsImport() {
		?>
		<h3><?php _e( 'Import XML file with title presets', self::PLUGIN_SLUG ); ?></h3>
		<form method="post" enctype="multipart/form-data"
		      action="?page=<?php echo self::PLUGIN_CUSTOM_TITLE_PRESETS; ?>&act=import2">
			<input type="file" name="importfile" id="file"><br/><br/>
			<input type="submit" name="submit"
			       value="<?php _e( 'Upload import file', self::PLUGIN_SLUG ); ?>">
		</form>
	<?php
	}

	static public function PresetsImport2() {
		$plik = $_FILES;
		if ( ! isset( $plik['importfile'] ) ) {
			GFontsUI::Error( __( 'Please upload import file. Try again.', self::PLUGIN_SLUG ) );
			self::PresetsImport();

			return;
		} else {
			$error = intval( $plik['importfile']['error'] );
			if ( $error != 0 ) {
				GFontsUI::Error( __( 'Error while uploading import file. Try again.', self::PLUGIN_SLUG ) );
				self::PresetsImport();

				return;
			}

			$type = $plik['importfile']['type'];
			if ( $type != 'text/xml' ) {
				GFontsUI::Error( sprintf( __( 'Expected type text/xml - got %s', self::PLUGIN_SLUG ), $type ) );
				self::PresetsImport();

				return;
			}

			$xml = simplexml_load_file( $plik['importfile']['tmp_name'] );
			if ( $xml === false ) {
				GFontsUI::Error( __( 'Error in XML structure.', self::PLUGIN_SLUG ) );
				self::PresetsImport();

				return;
			}
			$sum = 0;
			foreach ( $xml->presets->preset as $preset ) {
				if ( GFontsDB::ImportPreset( $preset ) ) {
					$sum ++;
				}
			}

			GFontsUI::Success( sprintf( __( "%d presets imported.", self::PLUGIN_SLUG ), $sum ) );
			self::PresetsImport();
		}
	}

	static public function ThemeLayoutPreview() {
		global $mods;
		global $theme_settings;
		$id     = $_GET['id'];
		$dtheme = GFontsDB::GetThemeLayout( $id );
		if ( ! $id ) {
			return false;
		}
		$ctheme = wp_get_theme();
		if ( $ctheme->name == $dtheme->gtl_layout ) {
			$mods = unserialize( $dtheme->gtl_settings );
			add_filter( 'pre_option_theme_mods_' . $ctheme->template, array(
				'GFontsEngine',
				'ModsModifications'
			) );

			return false;
		} else {
			$mods   = unserialize( $dtheme->gtl_settings );
			$themes = wp_get_themes();
			$ntheme = null;
			foreach ( $themes as $stheme ) {
				if ( $stheme->name == $dtheme->gtl_layout ) {
					$ntheme = $stheme;
					break;
				}
			}
			if ( $ntheme != null ) {
				add_filter( 'pre_option_theme_mods_' . $ctheme->template, array(
					'GFontsEngine',
					'ModsModifications'
				) );
				add_filter( 'template', array(
					'GFontsEngine',
					'ThemePreviewTemplate'
				) );
				add_filter( 'stylesheet', array(
					'GFontsEngine',
					'ThemePreviewStylesheet'
				) );
				if ( ! is_array( $theme_settings ) ) {
					$theme_settings               = array();
					$theme_settings['stylesheet'] = $ntheme->stylesheet;
					$theme_settings['template']   = $ntheme->template;
				}
			}
			//add_filter('pre_option_theme_mods_' . $ctheme->template, '__return_empty_array');
		}
	}

	static public function ThemeModOverride( $value ) {
		global $mods;

		return ( isset( $mods['gf_post_title_styling_override'] ) ) ? $mods['gf_post_title_styling_override']
			: value;
	}

	static public function ModsModifications( $false ) {
		global $mods;

		return $mods;
	}

	static public function ThemePreviewTemplate( $in ) {
		global $theme_settings;

		return isset( $theme_settings['template'] ) ? $theme_settings['template']
			: $in;
	}

	static public function ThemePreviewStylesheet( $in ) {
		global $theme_settings;

		return isset( $theme_settings['stylesheet'] ) ? $theme_settings['stylesheet']
			: $in;
	}

	static public function ModifyPostTitleFromPreview( $title, $id ) {
		if ( is_feed() ) {
			return $title;
		}
		$sth = current_theme_supports( 'menus' );
		if ( self::$navMenuBegin && $sth ) {
			return '<span class="gfcustomizedmenuitem ' . self::$navMenuClass . '">' . $title . "</span>";
		}

		$dtheme = GFontsDB::GetThemeLayout( $_GET['id'] );
		if ( ! $dtheme ) {
			return self::ModifyPostTitle( $title, $id );
		}

		$post = get_post( $id );

		if ( ( $post->post_type != 'post' ) && ( $post->post_type != 'page' ) ) {
			return $title;
		}


		$mod = unserialize( $dtheme->gtl_settings );
		if ( ! isset( $mod['gf_post_title_styling_override_preset_uuid'] ) ) {
			return self::ModifyPostTitle( $title, $id );
		}
		$d = GFontsDB::GetTitlePresetForUuid( $mod['gf_post_title_styling_override_preset_uuid'] );

		if ( ! $d ) {
			return self::ModifyPostTitle( $title, $id );
		}
		$ctf   = ( $d->font != '' ) ? $d->font : "";
		$ctfs  = ( $d->title_size != '' ) ? $d->title_size : "";
		$ctfb  = ( $d->title_bold != '' ) ? $d->title_bold : "";
		$ctfi  = ( $d->title_italic != '' ) ? $d->title_italic : "";
		$ctfc  = ( $d->title_color != '' ) ? $d->title_color : "";
		$ctfu  = ( $d->title_underline != '' ) ? $d->title_underline : "";
		$ctfsv = ( $d->title_shadow_vertical != '' ) ? $d->title_shadow_vertical : "0";
		$ctfsh = ( $d->title_shadow_horizontal != '' ) ? $d->title_shadow_horizontal
			: "0";
		$ctfsb = ( $d->title_shadow_blur != '' ) ? $d->title_shadow_blur : "0";
		$ctfsc = ( $d->title_shadow_color != '' ) ? $d->title_shadow_color : "0";
		$ctfc;
		$style = self::BuildTitleStyles( $ctf, $ctfs, $ctfc, $ctfb, $ctfi, $ctfu, $ctfsv, $ctfsh, $ctfsb, $ctfsc, '', false );
		if ( $style != '' ) {
			$title = sprintf( "<span style=\"%s\" class=\"gfcustomized\">%s</span>", $style, $title );
		}

		return $title;
	}

	static public function Sliders() {
		self::SlidersFacebook();
		self::SlidersTwitter();
	}

	static public function SlidersFacebook() {
		$v = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK, false );
		if ( ! $v ) {
			return;
		}

		$horizontal        = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_HP, 'left' );
		$width             = intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_WD, 200 ) );
		$height            = intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_HE, 500 ) );
		$border            = intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BORDER, 5 ) );
		$bordercolor       = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BORDER_COLOR, '#3B5998' );
		$vertical          = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_VP, 'middle' );
		$colorscheme       = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_COLOR_SCHEME, 'light' );
		$fburl             = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_URL, '' );
		$zindex            = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_ZINDEX, 10000 );
		$showheader        = (bool) get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_SHEADER, true )
			? "true" : "false";
		$showfaces         = (bool) get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_SFACES, true )
			? "true" : "false";
		$showstream        = (bool) get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_SSTREAM, false )
			? "true" : "false";
		$buttontype        = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_ICON, 'fb_blue_r2' );
		$bgcolor           = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BGCOLOR, '#FFFFFF' );
		$radiuslefttop     = intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_LEFT_TOP, 0 ) );
		$radiusleftbottom  = intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_LEFT_BOTTOM, 0 ) );
		$radiusrighttop    = intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_RIGHT_TOP, 0 ) );
		$radiusrightbottom = intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_RADIUS_RIGHT_BOTTOM, 0 ) );
		$lang              = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_LANGUAGE, WPLANG );
		$buttonmargin      = intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_FACEBOOK_BUTTON_MARGIN, 0 ) );


		if ( $horizontal != 'left' && $horizontal != 'right' ) {
			$horizontal = 'left';
		}

		if ( $vertical != 'top' && $vertical != 'middle' && $vertical != 'bottom' ) {
			$vertical = 'middle';
		}

		if ( $colorscheme != 'light' && $colorscheme != 'dark' ) {
			$colorscheme = 'light';
		}


		$datawidth = $width;
		if ( $width == 0 ) {
			$width = 200;
		}

		if ( $border == 0 ) {
			$border = 5;
		}

		$bo = null;
		switch ( $buttontype ) {
			case 'fb_blue_64':
				$bo = array(
					'uri'    => PLUGIN_URL . 'imgs/social/64/fb_blue.png',
					'width'  => 64,
					'height' => 64
				);
				break;
			case 'fb_blue_n1':
				$bo = array(
					'uri'    => PLUGIN_URL . 'imgs/social/other/fb/n1_' . $horizontal . '.png',
					'width'  => 50,
					'height' => 155
				);
				break;
			case 'fb_blue_n2':
				$bo = array(
					'uri'    => PLUGIN_URL . 'imgs/social/other/fb/n2_' . $horizontal . '.png',
					'width'  => 50,
					'height' => 155
				);
				break;
			case 'fb_blue_r1':
				$bo = array(
					'uri'    => PLUGIN_URL . 'imgs/social/other/fb/r1_' . $horizontal . '.png',
					'width'  => 50,
					'height' => 155
				);
				break;
			case 'fb_blue_r2':
				$bo = array(
					'uri'    => PLUGIN_URL . 'imgs/social/other/fb/r2_' . $horizontal . '.png',
					'width'  => 50,
					'height' => 155
				);
				break;
		}

		$areawidth = $width + $border;
		$width += 3 * $border;
		$rborder = $border;

		$width *= - 1;
		$rborder *= - 1;

		$buttontop = 0;
		switch ( $vertical ) {
			case 'top':
				$buttontop = 0;
				break;
			case 'bottom':
				$buttontop = $height - $bo['height'] + 2 * $border;
				break;
			case 'middle':
				$buttontop = round( ( $height + 2 * $border ) / 2 ) - round( $bo['height'] / 2 );
				break;
		}

		$buttontop += $buttonmargin;
		$buttonposition = $areawidth + $border;

		wp_register_style( 'gf-slider-css', PLUGIN_URL . 'css/slider.css' );
		wp_enqueue_style( 'gf-slider-css' );
		?>
		<div id="fb-root"></div>
		<script>(function (d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id))
					return;
				js = d.createElement(s);
				js.id = id;
				js.src = "//connect.facebook.net/<?php echo $lang ?>/all.js#xfbml=1";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>

		<div id="gf-fb-slider" class="gf-slider-box"
		     style="<?php echo $horizontal; ?>: <?php echo $width; ?>px; z-index: <?php echo $zindex; ?>;">
			<div style="vertical-align: middle; display: table-cell;">
				<img class="gf-slider-button" src="<?php echo $bo['uri']; ?>"
				     style="cursor: pointer; width: <?php echo $bo['width'] ?>px; height: <?php echo $bo['height'] ?>px; position: absolute; margin-top: <?php echo $buttontop; ?>px; display: block;<?php echo $horizontal; ?>: <?php echo $buttonposition; ?>px; z-index: -1;"/>

				<div class="gf-slider-box-content" id="gf-fb-slider-content"
				     style="width: <?php echo $areawidth; ?>px; height: <?php echo $height; ?>px; border: <?php echo $border; ?>px solid <?php echo $bordercolor; ?>; border-radius: <?php echo $radiuslefttop; ?>px <?php echo $radiusrighttop; ?>px <?php echo $radiusrightbottom; ?>px <?php echo $radiusleftbottom; ?>px; background-color: <?php echo $bgcolor; ?>;">
					<div style="z-index: 0;">
						<div class="fb-like-box"
						     data-href="http://www.facebook.com/<?php echo $fburl; ?>"
						     data-width="<?php echo $datawidth; ?>"
						     data-height="<?php echo $height; ?>"
						     data-colorscheme="<?php echo $colorscheme; ?>"
						     data-show-faces="<?php echo $showfaces; ?>"
						     data-header="<?php echo $showheader; ?>"
						     data-stream="<?php echo $showstream; ?>"
						     data-show-border="false"></div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			jQuery('#gf-fb-slider').hover(function () {
				jQuery(this).css('z-index', '<?php echo $zindex + 1; ?>');
				jQuery(this).stop(true, false).animate({
				<?php echo $horizontal; ?>:
				"<?php echo $rborder; ?>px"
			}, 500);
			},
			function () {
				jQuery(this).stop(true, false).animate({
				<?php echo $horizontal; ?>:
				"<?php echo $width; ?>px"
			}
			,
			500, 'swing', function () {
				jQuery(this).css('z-index', '<?php echo $zindex; ?>');
			}
			)
			;
			})
			;
		</script>

	<?php
	}

	static public function SocialSettingsTwitterSlider() {

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_register_script( 'gf-fb-slider', PLUGIN_URL . 'js/fb-slider.js' );
		wp_enqueue_script( 'gf-fb-slider' );
		wp_register_style( 'gfonts-admin', PLUGIN_URL . 'css/gfonts.css' );
		wp_enqueue_style( 'gfonts-admin' );

		$trans = array(
			'twurlToShort' => GFontsLang::GetTranslation( 'Twitter WIDGETID is empty.' )
		);
		wp_localize_script( 'gf-fb-slider', 'objTrans', $trans );

		if ( @$_GET['settings-updated'] == 'true' ) {
			GFontsUI::Success( __( "Changes has been saved.", self::PLUGIN_SLUG ) );
		}

		print "<form method=\"post\" action=\"options.php\" onsubmit=\"return CheckTwForm();\"> ";
		settings_fields( self::PLUGIN_SLUG_SOCIAL_TW );
		do_settings_fields( self::PLUGIN_SLUG_SOCIAL_TW, '' );
		$enabled_tw  = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER, false );
		$horizontal  = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_HP, 'left' );
		$vertical    = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_VP, 'middle' );
		$cscheme     = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_COLOR_SCHEME, 'light' );
		$icon        = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_ICON, 'twitter_white_blue' );
		$lng         = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_LANGUAGE, 'en' );
		$twlangs     = json_decode( file_get_contents( PLUGIN_DIR . 'data/twlangs.json' ) );
		$show_header = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_SHEADER, true );
		$show_footer = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_SFOOTER, true );

		$langs = array();
		foreach ( $twlangs as $lang ) {
			$langs[ $lang->code ] = $lang->name;
		}
		?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><?php _e( "Enable Twitter slider", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="checkbox"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER ?>"
					       id="sbfb" <?php
					if ( $enabled_tw ) {
						echo "checked";
					}
					?>><br/>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Account name", self::PLUGIN_SLUG ) ?></th>
				<td>
					<input type="text"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_NAME ?>"
					       style="width: 300px;"
					       value="<?php echo get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_NAME, 'name' ); ?>"/></br>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"
				    style="width: 380px;"><?php print __( "Widget ID or edit url(like https://twitter.com/settings/widget/XXXX/edit)", self::PLUGIN_SLUG ) ?></th>
				<td>
					<input type="text"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_WIDGETID ?>"
					       style="width: 300px;"
					       value="<?php echo get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_WIDGETID, '' ); ?>"/></br>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Horizontal position", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_HP ?>" <?php
					if ( $horizontal == 'left' ) {
						echo "checked";
					}
					?> value="left" id="sbfbleft"/>&nbsp;<label
						for="sbfbleft"><?php _e( 'Left', self::PLUGIN_SLUG ); ?></label><br/>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_HP ?>" <?php
					if ( $horizontal == 'right' ) {
						echo "checked";
					}
					?> value="right" id="sbfbright"/>&nbsp;<label
						for="sbfbright"><?php _e( 'Right', self::PLUGIN_SLUG ); ?></label><br/>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Vertical position", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_VP ?>" <?php
					if ( $vertical == 'top' ) {
						echo "checked";
					}
					?> value="top" id="sbfbtop"/>&nbsp;<label
						for="sbfbtop"><?php _e( 'Top', self::PLUGIN_SLUG ); ?></label><br/>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_VP ?>" <?php
					if ( $vertical == 'middle' ) {
						echo "checked";
					}
					?> value="middle" id="sbfbmiddle"/>&nbsp;<label
						for="sbfbmiddle"><?php _e( 'Middle', self::PLUGIN_SLUG ); ?></label><br/>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_VP ?>" <?php
					if ( $vertical == 'bottom' ) {
						echo "checked";
					}
					?> value="bottom" id="sbfbbottom"/>&nbsp;<label
						for="sbfbbottom"><?php _e( 'Bottom', self::PLUGIN_SLUG ); ?></label><br/>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Twitter slider button", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_ICON ?>" <?php
					if ( $icon == 'twitter_white_blue' ) {
						echo "checked";
					}
					?> value="twitter_white_blue"/>&nbsp;<img
						src="<?php echo PLUGIN_URL . "imgs/social/64/twitter_white_blue.png" ?>"/>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_ICON ?>" <?php
					if ( $icon == 'tw_n1' ) {
						echo "checked";
					}
					?> value="tw_n1"/>&nbsp;<img
						src="<?php echo PLUGIN_URL . "imgs/social/other/tw/n1_left.png" ?>"/>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_ICON ?>" <?php
					if ( $icon == 'tw_n2' ) {
						echo "checked";
					}
					?> value="tw_n2"/>&nbsp;<img
						src="<?php echo PLUGIN_URL . "imgs/social/other/tw/n2_left.png" ?>"/>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_ICON ?>" <?php
					if ( $icon == 'tw_r1' ) {
						echo "checked";
					}
					?> value="tw_r1"/>&nbsp;<img
						src="<?php echo PLUGIN_URL . "imgs/social/other/tw/r1_left.png" ?>"/>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_ICON ?>" <?php
					if ( $icon == 'tw_r2' ) {
						echo "checked";
					}
					?> value="tw_r2"/>&nbsp;<img
						src="<?php echo PLUGIN_URL . "imgs/social/other/tw/r2_left.png" ?>"/>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Twitter button extra margin", self::PLUGIN_SLUG ) ?></th>
				<td>
					<input type="text"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BUTTON_MARGIN ?>"
					       style="width: 70px;"
					       value="<?php echo intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BUTTON_MARGIN, 0 ) ); ?>"/>&nbsp;px</br>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php print __( "Color scheme", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_COLOR_SCHEME ?>" <?php
					if ( $cscheme == 'light' ) {
						echo "checked";
					}
					?> value="light" id="sbfbdark"/>&nbsp;<label
						for="sbfblight"><?php _e( 'Light', self::PLUGIN_SLUG ); ?></label><br/>
					<input type="radio"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_COLOR_SCHEME ?>" <?php
					if ( $cscheme == 'dark' ) {
						echo "checked";
					}
					?> value="dark" id="sbfbdark"/>&nbsp;<label
						for="sbfbdark"><?php _e( 'Dark', self::PLUGIN_SLUG ); ?></label><br/>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Width", self::PLUGIN_SLUG ) ?></th>
				<td>
					<input type="text"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_WD ?>"
					       style="width: 70px;"
					       value="<?php echo intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_WD, 200 ) ); ?>"/>&nbsp;px</br>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Height", self::PLUGIN_SLUG ) ?></th>
				<td>
					<input type="text"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_HE ?>"
					       style="width: 70px;"
					       value="<?php echo intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_HE, 500 ) ); ?>"/>&nbsp;px</br>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Twitter language", self::PLUGIN_SLUG ) ?></th>
				<td>
					<select
						name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_LANGUAGE ?>"
						style="width: 250px;">
						<?php
						foreach ( $langs as $code => $name ) {
							if ( $code == $lng ) {
								$selected = ' selected';
							} else {
								$selected = '';
							}
							echo sprintf( "<option value=\"%s\"%s>%s</option>\n", $code, $selected, $name );
						}
						?>
					</select>
				</td>
			</tr>
			<tr valign="top">
				<th scopre="row"><?php _e( "Show header", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="checkbox"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_SHEADER ?>"
					       id="sbfb_sh" <?php
					if ( $show_header ) {
						echo "checked";
					}
					?>/><br/>
				</td>
			</tr>
			<tr valign="top">
				<th scopre="row"><?php _e( "Show footer", self::PLUGIN_SLUG ); ?></th>
				<td>
					<input type="checkbox"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_SFOOTER ?>"
					       id="sbfb_ss" <?php
					if ( $show_footer ) {
						echo "checked";
					}
					?>/><br/>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Border", self::PLUGIN_SLUG ) ?></th>
				<td>
					<input type="text"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BORDER ?>"
					       style="width: 70px;"
					       value="<?php echo intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BORDER, 5 ) ); ?>"/>&nbsp;px</br>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Tweet limit", self::PLUGIN_SLUG ) ?></th>
				<td>
					<input type="text"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_LIMIT ?>"
					       style="width: 70px;"
					       value="<?php echo intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_LIMIT, 10 ) ); ?>"/></br>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Border color (Default: #4099FF)", self::PLUGIN_SLUG ) ?></th>
				<td>
					<input type="text"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BORDER_COLOR ?>"
					       style="width: 70px;" id="gf-tw-brd-color"
					       value="<?php echo get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BORDER_COLOR, "#4099FF" ); ?>"/></br>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Link color (Default: #47A61E)", self::PLUGIN_SLUG ) ?></th>
				<td>
					<input type="text"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_LINK_COLOR ?>"
					       style="width: 70px;" id="gf-tw-lnk-color"
					       value="<?php echo get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_LINK_COLOR, "#47A61E" ); ?>"/></br>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Background color (Default: #FFFFFF)", self::PLUGIN_SLUG ) ?></th>
				<td>
					<input type="text"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BGCOLOR ?>"
					       style="width: 70px;" id="gf-fb-bg-color"
					       value="<?php echo get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BGCOLOR, "#FFFFFF" ); ?>"/></br>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "CSS z-index parameter", self::PLUGIN_SLUG ) ?></th>
				<td>
					<input type="text"
					       name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_ZINDEX ?>"
					       style="width: 70px;"
					       value="<?php echo intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_ZINDEX, 10000 ) ); ?>"/></br>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php print __( "Rounded corners", self::PLUGIN_SLUG ) ?></th>
				<td>
					<?php _e( 'Left top', self::PLUGIN_SLUG ); ?>&nbsp;<input
						type="text"
						name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_LEFT_TOP ?>"
						style="width: 70px;"
						value="<?php echo intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_LEFT_TOP, 0 ) ); ?>"/>&nbsp;px</br>
					<?php _e( 'Left bottom', self::PLUGIN_SLUG ); ?>&nbsp;<input
						type="text"
						name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_LEFT_BOTTOM ?>"
						style="width: 70px;"
						value="<?php echo intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_LEFT_BOTTOM, 0 ) ); ?>"/>&nbsp;px</br>
					<?php _e( 'Right top', self::PLUGIN_SLUG ); ?>&nbsp;<input
						type="text"
						name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_RIGHT_TOP ?>"
						style="width: 70px;"
						value="<?php echo intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_RIGHT_TOP, 0 ) ); ?>"/>&nbsp;px</br>
					<?php _e( 'Right bottom', self::PLUGIN_SLUG ); ?>
					&nbsp;<input type="text"
					             name="<?php echo self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_RIGHT_BOTTOM ?>"
					             style="width: 70px;"
					             value="<?php echo intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_RIGHT_BOTTOM, 0 ) ); ?>"/>&nbsp;px</br>
				</td>
			</tr>
		</table>
		<div class="gf-button-save">
		<?php
		submit_button( __( "Save settings", self::PLUGIN_SLUG ) );
		//echo '<span class="info">';
		//_e('Please don\'t forget to save changes.', self::PLUGIN_SLUG);
		//echo '</span>';
		?></div><?php
	}

	static public function PreSaveTwitterWidgetId( $value ) {
		if ( preg_match( '/http[s]?:\/\/twitter.com\/settings\/widgets\/(\d+)\/edit/', $value, $matches ) ) {
			$value = $matches[1];
		}

		return $value;
	}

	static public function SlidersTwitter() {
		$v = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER, false );
		if ( ! $v ) {
			return;
		}

		$widgetid = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_WIDGETID, 0 );
		if ( intval( $widgetid ) == 0 ) {
			return false;
		}

		$horizontal        = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_HP, 'left' );
		$width             = intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_WD, 200 ) );
		$height            = intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_HE, 500 ) );
		$border            = intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BORDER, 5 ) );
		$bordercolor       = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BORDER_COLOR, '#4099FF' );
		$linkcolor         = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_LINK_COLOR, '#47A61E' );
		$vertical          = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_VP, 'middle' );
		$colorscheme       = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_COLOR_SCHEME, 'light' );
		$name              = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_NAME, '' );
		$tweetlimit        = intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_LIMIT, 10 ) );
		$zindex            = intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_ZINDEX, 10000 ) );
		$showheader        = (bool) get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_SHEADER, true );
		$showfooter        = (bool) get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_SFOOTER, false );
		$buttontype        = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_ICON, 'tw_n1' );
		$bgcolor           = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BGCOLOR, '#FFFFFF' );
		$radiuslefttop     = intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_LEFT_TOP, 0 ) );
		$radiusleftbottom  = intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_LEFT_BOTTOM, 0 ) );
		$radiusrighttop    = intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_RIGHT_TOP, 0 ) );
		$radiusrightbottom = intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_RADIUS_RIGHT_BOTTOM, 0 ) );
		$lang              = get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_LANGUAGE, 'en_US' );
		$buttonmargin      = intval( get_option( self::PLUGIN_OPTION_SOCIAL_SLIDER_TWITTER_BUTTON_MARGIN, 0 ) );


		if ( $horizontal != 'left' && $horizontal != 'right' ) {
			$horizontal = 'left';
		}

		if ( $vertical != 'top' && $vertical != 'middle' && $vertical != 'bottom' ) {
			$vertical = 'middle';
		}

		if ( $colorscheme != 'light' && $colorscheme != 'dark' ) {
			$colorscheme = 'light';
		}


		$datawidth = $width;
		if ( $width == 0 ) {
			$width = 200;
		}

		if ( $border == 0 ) {
			$border = 5;
		}

		$bo = null;
		switch ( $buttontype ) {
			case 'twitter_white_blue':
				$bo = array(
					'uri'    => PLUGIN_URL . 'imgs/social/64/twitter_white_blue.png',
					'width'  => 64,
					'height' => 64
				);
				break;
			case 'tw_n1':
				$bo = array(
					'uri'    => PLUGIN_URL . 'imgs/social/other/tw/n1_' . $horizontal . '.png',
					'width'  => 50,
					'height' => 155
				);
				break;
			case 'tw_n2':
				$bo = array(
					'uri'    => PLUGIN_URL . 'imgs/social/other/tw/n2_' . $horizontal . '.png',
					'width'  => 50,
					'height' => 155
				);
				break;
			case 'tw_r1':
				$bo = array(
					'uri'    => PLUGIN_URL . 'imgs/social/other/tw/r1_' . $horizontal . '.png',
					'width'  => 50,
					'height' => 155
				);
				break;
			case 'tw_r2':
				$bo = array(
					'uri'    => PLUGIN_URL . 'imgs/social/other/tw/r2_' . $horizontal . '.png',
					'width'  => 50,
					'height' => 155
				);
				break;
		}

		$areawidth = $width + $border;
		$width += 3 * $border;
		$rborder = $border;

		$width *= - 1;
		$rborder *= - 1;

		$buttontop = 0;
		switch ( $vertical ) {
			case 'top':
				$buttontop = 0;
				break;
			case 'bottom':
				$buttontop = $height - $bo['height'] + 2 * $border;
				break;
			case 'middle':
				$buttontop = round( ( $height + 2 * $border ) / 2 ) - round( $bo['height'] / 2 ) - 15;
				break;
		}

		$buttontop += $buttonmargin;
		$buttonposition = $areawidth + $border;

		wp_register_style( 'gf-slider-css', PLUGIN_URL . 'css/slider.css' );
		wp_enqueue_style( 'gf-slider-css' );
		?>
		<div id="gf-tw-slider" class="gf-slider-box"
		     style="<?php echo $horizontal; ?>: <?php echo $width; ?>px; z-index: <?php echo $zindex; ?>;">
			<div style="vertical-align: middle; display: table-cell;">
				<img class="gf-slider-button" src="<?php echo $bo['uri']; ?>"
				     style="cursor: pointer; width: <?php echo $bo['width'] ?>px; height: <?php echo $bo['height'] ?>px; position: absolute; margin-top: <?php echo $buttontop; ?>px; display: block;<?php echo $horizontal; ?>: <?php echo $buttonposition; ?>px; z-index: -1;"/>

				<div class="gf-slider-box-content" id="gf-tw-slider-content"
				     style="width: <?php echo $areawidth; ?>px; height: <?php echo $height; ?>px; border: <?php echo $border; ?>px solid <?php echo $bordercolor; ?>; border-radius: <?php echo $radiuslefttop; ?>px <?php echo $radiusrighttop; ?>px <?php echo $radiusrightbottom; ?>px <?php echo $radiusleftbottom; ?>px; background-color: <?php echo $bgcolor; ?>;">
					<div
						style="z-index: 0; margin-left: 5px; max-height: <?php echo $height; ?>px;">
						<a data-dnt="true" lang="<?php echo $lang; ?>"
						   class="twitter-timeline"
						   data-chrome="noborders transparent<?php
						   if ( ! $showheader ) {
							   echo " noheader";
						   }
						   ?><?php
						   if ( ! $showfooter ) {
							   echo " nofooter";
						   }
						   ?>" data-link-color="<?php echo $linkcolor; ?>"
						   width="<?php echo $datawidth; ?>"
						   height="<?php echo $height; ?>"
						   href="https://twitter.com/<?php echo str_replace( '@', '', $name ); ?>"
						   data-widget-id="<?php echo $widgetid; ?>"
						   data-theme="<?php echo $colorscheme; ?>">Tweets by
							@<?php echo str_replace( '@', '', $name ); ?></a>
						<script>!function (d, s, id) {
								var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
								if (!d.getElementById(id)) {
									js = d.createElement(s);
									js.id = id;
									js.src = p + "://platform.twitter.com/widgets.js";
									fjs.parentNode.insertBefore(js, fjs);
								}
							}(document, "script", "twitter-wjs");</script>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			jQuery('#gf-tw-slider').hover(function () {
				jQuery(this).css('z-index', '<?php echo $zindex + 1; ?>');
				jQuery(this).stop(true, false).animate({
				<?php echo $horizontal; ?>:
				"<?php echo $rborder; ?>px"
			}, 500);
			},
			function () {
				jQuery(this).stop(true, false).animate({
				<?php echo $horizontal; ?>:
				"<?php echo $width; ?>px"
			}
			,
			500, 'swing', function () {
				jQuery(this).css('z-index', '<?php echo $zindex; ?>');
			}
			)
			;
			})
			;
		</script>
	<?php
	}

	static public function SavePresets() {
		global $wpdb;
		$sql    = "SELECT * FROM {$wpdb->prefix}options where option_name like 'gfonts_social_%'";
		$wyniki = $wpdb->get_results( $sql );
		$sett   = '';
		foreach ( $wyniki as $wynik ) {
			$sett .= sprintf( "<%s>%s</%s>\n", $wynik->option_name, $wynik->option_value, $wynik->option_name );
		}
	}

	static public function ThemeModCustomCss() {
		$css = get_theme_mod( 'gf_custom_theme_css' );
		if ( trim( $css ) != '' ) {
			print "\r\n<style type=\"text/css\">";
			print $css;
			print "</style>";
		}
		print '<style>';
		print '@-ms-viewport{ width: auto !important; }';
		print '</style>';
	}

	static public function SocialSettingsReadyConfigs() {
		if ( @$_GET['settings-updated'] == 'true' ) {
			GFontsUI::Success( __( "Changes has been saved.", self::PLUGIN_SLUG ) );
		}
		wp_register_style( 'gfonts', PLUGIN_URL . 'css/gfonts.css' );
		wp_enqueue_style( 'gfonts' );

		$xml = simplexml_load_file( PLUGIN_DIR . 'data/social-slider-configs.xml' );
		foreach ( $xml->config as $config ) {
			?>
			<div class="social-preview">
				<h2 class="head"><?php echo (string) $config->name; ?></h2>
				<img
					src="<?php echo PLUGIN_URL; ?>assets/previews/<?php echo (string) $config->img; ?>"/>

				<div class="aclink">
					<a href="?page=<?php echo self::PLUGIN_SOCIAL_BUTTONS_SETTINGS; ?>&act=sli&id=<?php echo (string) $config->id; ?>"><?php _e( 'Activate this config', self::PLUGIN_SLUG ); ?></a>
				</div>
			</div>
		<?php
		}
	}

	static public function ImportSocialSettingConfig() {
		$id = intval( $_GET['id'] );
		if ( $id == 0 ) {
			GFontsUI::Error( __( 'Bad id parameter.', self::PLUGIN_SLUG ) );
			self::SocialSettingsReadyConfigs();

			return;
		}

		$xml = simplexml_load_file( PLUGIN_DIR . 'data/social-slider-configs.xml' );
		$cfg = null;
		foreach ( $xml->config as $config ) {
			if ( intval( $config->id ) == $id ) {
				$cfg = $config;
				break;
			}
		}

		if ( $cfg == null ) {
			GFontsUI::Error( __( 'Unknown config.', self::PLUGIN_SLUG ) );
			self::SocialSettingsReadyConfigs();

			return;
		}

		$data = (array) $cfg->data;
		foreach ( $data as $key => $value ) {
			update_option( $key, (string) $value );
		}
		GFontsUI::Success( sprintf( __( 'Config %s has been set.', self::PLUGIN_SLUG ), (string) $cfg->name ) );
		self::SocialSettingsReadyConfigs();
	}

	static public function EscapeHtmlFilter( $safe_text, $text ) {
		if ( preg_match( '/\<span class="gfdescription_customized">(.+)<\/span>/i', $text ) ) {
			return $text;
		} else {
			return $safe_text;
		}
	}

	static public function OutputBufferStart() {
		self::$bufferingStarted = true;
		ob_start( array( 'GFontsEngine', 'FilterOutputHtml' ) );
	}

	static public function OutputBufferEnd() {
		if ( ! self::$bufferingStarted ) {
			return;
		}
		self::$bufferingStarted = false;
		ob_end_flush();
	}

	static public function FilterOutputHtml( $buffer ) {
		//$buffer = file_get_contents("E:\\pl.txt");
		$r1 = '/title=["|\'](\<span.+?\<\/span>)["|\']/im';
		if ( preg_match_all( $r1, $buffer, $matchesarray ) ) {
			$index = 0;
			foreach ( $matchesarray[0] as $itm ) {
				//$out = $matchesarray[1][$index];
				//$out = strip_tags($out);
				$out2   = strip_tags( $itm );
				$buffer = str_replace( $itm, $out2, $buffer );
				//$index++;
			}
		}
		$r1 = '/alt=["|\'](\<span.+?\<\/span>)["|\']/im';
		if ( preg_match_all( $r1, $buffer, $matchesarray ) ) {
			$index = 0;
			foreach ( $matchesarray[0] as $itm ) {
				//$out = $matchesarray[1][$index];
				//$out = strip_tags($out);
				$out2   = strip_tags( $itm );
				$buffer = str_replace( $itm, $out2, $buffer );
				//$index++;
			}
		}

		return $buffer;
	}

	static public function FontsListFilter( $fonts ) {
		if ( ! is_array( $fonts ) ) {
			$fonts = array();
		}

		$extraFonts = GFontsDB::GetInstalledFonts();
		$aFonts     = array();
		foreach ( $extraFonts as $item ) {
			$aFonts[] = $item->name;
		}
		$aFonts[] = 'Andale Mono';
		$aFonts[] = 'Arial';
		$aFonts[] = 'Arial Black';
		$aFonts[] = 'Book Antiqua';
		$aFonts[] = 'Comic Sans MS';
		$aFonts[] = 'Courier New';
		$aFonts[] = 'Georgia';
		$aFonts[] = 'Helvetica;';
		$aFonts[] = 'Impact';
		$aFonts[] = 'Symbol';
		$aFonts[] = 'Tahoma';
		$aFonts[] = 'Terminal';
		$aFonts[] = 'Times New Roman';
		$aFonts[] = 'Trebuchet MS';
		$aFonts[] = 'Verdana';
		$aFonts[] = 'Webdings';
		$aFonts[] = 'Wingdings';
		foreach ( $aFonts as $aFont ) {
			if ( ! isset( $fonts[ $aFont ] ) ) {
				$fonts[] = $aFont;
			}
		}

		return $fonts;
	}

	static public function FullVersion() {
		print "<div class='wrap'>";
		?>
		<h2>Commercial usage</h2>
		<h3>
			This software is released under GNU General Public License. You can
			use it in any commercial or non-commercial work.<br/>
			This free plugin doesn't have any support and only purchased
			licenses are supported. If you want to purchase one please <a
				href='http://goo.gl/cZiwCd'>follow this link.</a><br/>
			<br/>
			<center>Please check my other product:</center>
		</h3>
		<?php
		include_once GFONTS_ABS_PATH . '/adv/adv.php';
		print "</div>";
	}

	static public function AuthorContact() {
		?>
		<div class="wrap">
			<h2>Business inquiries</h2>

			<h3>Plugin Support URL:
				https://wordpress.org/support/plugin/free-google-fonts</h3>

			<p>Business inquiries are welcome at: lukasz@pawlik.it</p>
		</div>
	<?php
	}
}
