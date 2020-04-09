<?php
################################################################################
# Welcome to "Casanova" theme!
#===============================================================================
# thank you for purchasing. This is a functions.php file. Here you can find any
# theme specific functions ( for example ajax calls, custom post types and
# other things ). Most of the other functions are located in our plugin
# Fresh Framework, which has to be activated in order to run this template
# without any problems.
################################################################################
#																			   #
#																			   #
#																			   #
################################################################################
# Framework Initialisation
#===============================================================================
# this code initialise our fresh framework plugin. If the plugin is not
# presented, we run automatic installation which will result in installing
# and activating the plugin
################################################################################


require 'install/init.php';

if ( !class_exists('ffFrameworkVersionManager') && !is_admin() ) {
	echo '<span style="color:red; font-size:50px;">';
		echo 'The Fresh Framework plugin must be installed and activated in order to use this theme.';
	echo '</span>';
	die();
} else if( !class_exists('ffFrameworkVersionManager') && is_admin() ) {
	if( !function_exists('ff_plugin_fresh_framework_notification') ) {
		function ff_plugin_fresh_framework_notification() {
			?>
			<div class="error">
			<p><strong><em>Fresh</strong></em> plugins require the <strong><em>'Fresh Framework'</em></strong> plugin to be activated first.</p>
			</div>
			<?php
		}
		add_action( 'admin_notices', 'ff_plugin_fresh_framework_notification' );
	}

	return;
}
require 'framework/init.php';


################################################################################
# Framework Initialisation End
################################################################################


$layoutManager = ffContainer()->getThemeFrameworkFactory()->getLayoutsNamespaceFactory()->getThemeLayoutManager();

$layoutManager->setThemeName( ffThemeContainer::THEME_NAME_LOW );
$layoutManager->setLayoutsOptionsHolderClassName('ffComponent_Theme_LayoutOptions');
$layoutManager->addLayoutSupport();


ffContainer()->getThemeFrameworkFactory()->getLayoutsNamespaceFactory()->getLayoutPrinter()->setPrintSectionCallback('ff_print_section_callback');

function ff_print_section_callback( $section, $variation ) {
    $path = '/templates/onePage/sections/'.$variation.'.php';
    ff_load_section_printer( $path, $section );
}

ffContainer()->getThemeFrameworkFactory()->getLayoutsNamespaceFactory()->getLayoutPrinter()->setCallbackForEmptyPosition('ff_callback_for_empty_position');


function ff_callback_for_empty_position( $placement ){

    $type = null;
    if( $placement == 'content' && (int)ffThemeOptions::getQuery('layout default content')) {
			if( is_404() ) {
				$type = 'content-404';
			}else if( is_category() or is_tag() or is_home() or is_date() or is_search() or is_author() ){
				$type = 'content-blog-classic';
			}else if( is_single() ){
				$type = 'content-blog-single';
			}else if( is_tax('ff-portfolio-category') or is_tax('ff-portfolio-tag') ){
				$type = 'content-portfolio-archive';
			}
    } else if( $placement == 'header' && (int)ffThemeOptions::getQuery('layout default header') ) {
        $type = 'header';
    } else if ($placement == 'footer' && (int)ffThemeOptions::getQuery('layout default footer') ) {
        $type = 'footer';
    }

    if( $type != null ) {

		require get_template_directory().'/default_section_data/'.  $type.'.php';
		return $data;
    }

    return null;
}


################################################################################
# BASIC SETTINGS
################################################################################


// TGM plugin installer
require_once "install/install-plugins-by-tgm.php";
// content width
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 1080;

// filter icon names

// Used in options
// Used in menu

add_filter( ffConstActions::FILTER_QUERY_GET_ICON, 'ff_filter_query_get_icon');
function ff_filter_query_get_icon( $value ) {
	return $value;
	// $replaced = str_replace('ff-font-awesome4 icon-', 'fa fa-', $value);
	// return $replaced;
}

// enable just few fonts.
add_filter( 'ff_fonts', ffConstActions::FILTER_GET_FONTS );
function ff_filter_get_fonts( $fonts ){

	$iconfont = ffThemeOptions::getQuery('iconfont');

	foreach ($fonts as $key => $value) {

		if( 'awesome4' == $key ){
			continue;
		}

		if( 'awesome' == $key ){
			unset( $fonts[$key] );
			continue;
		}

		$_name_ = str_replace(' ', '_', $key );
		if( ! $iconfont->queryExists( $_name_ ) ){
			unset( $fonts[$_name_] );
			continue;
		}

		if( $iconfont->get( str_replace(' ', '_', $key ) ) ){
			continue;
		}

		unset( $fonts[$key] );

	}
	return $fonts;
}

add_action( 'after_setup_theme', 'ff_theme_setup' );
function ff_theme_setup() {
	register_nav_menus(
		array(
			'main-nav' => __( 'Main Navigation', '' ),
		)
	);
}


add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-formats', array(
'aside',
'gallery',
'link',
'image',
'quote',
'status',
'video',
'audio',
'chat',
) );

add_theme_support('title-tag');


################################################################################
# VC Disabling Frontend editation
################################################################################


if( function_exists('vc_disable_frontend') ){
	vc_disable_frontend();
}


################################################################################
# SECTION INCLUDING
################################################################################


function ff_load_section_options( $relativePath, ffOneStructure $s, $params = array() ) {
	$fileSystem = ffContainer()->getFileSystem();

	$absolutePath = $fileSystem->locateFileInChildTheme($relativePath);

	if( $fileSystem->fileExists( $absolutePath) ) {
		require $absolutePath;
	} else {
		throw new Exception('Failed to include section:'. $relativePath);
	}
}

function ff_load_section_printer( $relativePath, ffOptionsQuery $query, $params = array() ) {
	$fileSystem = ffContainer()->getFileSystem();

	$absolutePath = $fileSystem->locateFileInChildTheme($relativePath);

	if( $fileSystem->fileExists( $absolutePath) ) {
		require $absolutePath;
	} else {
		throw new Exception('Failed to include section:'. $relativePath);
	}
}


################################################################################
# Sidebar Registration
################################################################################
function ff_theme_register_sidebars() {
	if( !function_exists('register_sidebar') ) {
		return;
	}
		register_sidebar( array(
		'name'			=> 'Content Sidebar',
		'id'			=> 'sidebar-content',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="content-header widget-header v3"><h4>',
		'after_title'   => '</h4></div>'
		) );

	$numberOfFooterSidebars = 4;
	for( $i = 1; $i<= 4; $i++ ) {
		register_sidebar( array(
		'name'			=> 'Footer Sidebar #'.$i,
		'id'			=> 'sidebar-footer-'.$i,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="content-header widget-header v3"><h4>',
		'after_title'   => '</h4></div>'
		) );
	}
}

add_action( 'widgets_init', 'ff_theme_register_sidebars' );


add_action( 'after_setup_theme', 'casanova_theme_setup' );
function casanova_theme_setup() {
	register_nav_menus(
		array(
			'main-nav' => __( 'Main Navigation', '' ),
		)
	);
}

function ff_get_section_preview_image_url( $name ) {
	return get_template_directory_uri().'/templates/onePage/sections/'.  $name.'.jpg';
}

function ff_get_section_inside_preview_image_url( $name ) {
	return get_template_directory_uri().'/templates/onePage/sections/'.  $name.'.jpg';
}

function ff_get_section_options_dir() {
	return get_template_directory().'/framework/components/sectionOptions.php';
}

function ff_get_section_home_options_dir() {
	return get_template_directory().'/framework/components/sectionHomeOptions.php';
}

function ff_loop_single_pagination(){
	echo '<span class="pull-left">';
	previous_posts_link();
	echo '</span>';

	echo '<span class="pull-right">';
	next_posts_link();
	echo '</span>';

	echo '<div class="clearfix"></div>';
	echo '<div class="separator"></div>';
}

function ff_comment_form(){
	// See templates/onePage/blocks/comments-form.php
	comment_form(); // See templates/onePage/blocks/comments-form.php
	// See templates/onePage/blocks/comments-form.php
}

function ff_the_tags(){
	// See templates/onePage/sections/blog-single.php
	the_tags(); // See templates/onePage/sections/blog-single.php
	// See templates/onePage/sections/blog-single.php
}

function ff_the_post_thumbnail(){
	// See templates/onePage/blocks/post-classic-featured.php
	the_post_thumbnail(); // See templates/onePage/blocks/post-classic-featured.php
	// See templates/onePage/blocks/post-classic-featured.php
}

class ffSectionTemplateManager extends ffBasicObject {
	private static $_instance = null;

	private static function _getInstance() {
		if( self::$_instance == null ) {
			self::$_instance = new ffSectionTemplateManager();
		}

		return self::$_instance;
	}

	public static function requireSectionsFromQuery( ffOptionsQuery $query ) {
		return self::_getInstance()->_requireSectionsFromQuery( $query );
	}
	/**
	 * @return ffOptionsQuery
	 */
	public static function getCurrentSectionQuery(){
		return self::_getInstance()->_getCurrentSectionQuery();
	}

	private $_currentSectionQuery = null;

	private function _requireSectionsFromQuery( ffOptionsQuery $query ) {

		foreach( $query as $oneSection ) {
			$variation_type = $oneSection->getVariationType();
			$this->_currentSectionQuery = $oneSection;

			$path = '/templates/onePage/sections/'.$variation_type.'.php';

			ff_load_section_printer( $path, $oneSection );

			if( ffThemeOptions::getQuery('layout enable-developer-mode') ) {
				echo '<div style="background-color:pink;">'.  $variation_type.'</div>';
			}
		}
	}

	private function _getCurrentSectionQuery() {
		return $this->_currentSectionQuery;
	}

}

function ff_34_grid_translator( $numberOfParts ) {
	$columnNumber = 0;
	switch( $numberOfParts ) {
		case 1: $columnNumber =  1; break;
		case 2: $columnNumber = 18; break;
		case 3: $columnNumber = 24; break;
		case 4: $columnNumber = 27; break;
		case 5: $columnNumber = 29; break;
		case 6: $columnNumber = 30; break;
		case 7: $columnNumber = 31; break;
		case 8: $columnNumber = 32; break;
	}

	return 'col-'.$columnNumber;

}


################################################################################
# FONT CSS SELECTORS
################################################################################


function ff_get_font_selectors($font){
	switch ($font) {
		case 'body'   : return 'html, body';
		case 'headers': return 'h1, h2, h3, h4, h5, h6';
		case 'inputs' : return 'button, input, select, textarea';
		case 'code'   : return 'code, kbd, pre, samp';
	}
	return '';
}


function ff_has_read_more() {
	global $post;
	if( strpos($post->post_content, '<!--more-->') === false ) {
		return false;
	} else {
		return true;
	}
}


class ffTemporaryQueryHolder {
	private static $_queries = array();

	public static function setQuery( $name, $query ) {
		self::$_queries[ $name ] = $query;
	}

	public static function getQuery( $name ) {
		if( isset( self::$_queries[ $name ] ) ) {
			return self::$_queries[ $name ];
		} else {
			return null;
		}
	}

	public static function deleteQuery( $name ) {
		unset( self::$_queries[ $name ] );
	}
}

function ff_print_main_post_thumbnail() {
    the_post_thumbnail();
}


################################################################################
# SPECIAL HOOKS FOR WP ADMIN MENU
################################################################################


function ff_casanova__icons__admin_enqueue_scripts(){

	$js = ffContainer::getInstance()->getScriptEnqueuer();

	wp_enqueue_media();

	$js->getFrameworkScriptLoader()->requireFrsLib();

	$js->getFrameworkScriptLoader()->requireFrsLibOptions();

	$js->addScriptFramework('ff-fw-adminScreens', 'framework/adminScreens/assets/js/adminScreens.js', array('jquery'));
	$js->addScriptFramework('ff-fw-options', 'framework/options/assets/options.js', array('jquery'));

	ffContainer::getInstance()->getFrameworkScriptLoader()->requireFfAdmin();
}


function ff_casanova__icons__admin_footer(){

	ffContainer::getInstance()->getModalWindowFactory()->printModalWindowManagerLibraryIcon();

	?>
	<script type="text/javascript">
	(function($){


		function make_icon_from_description( $field ){
			var _name_ = $field.attr('name');
			var _id_   = $field.attr('id');
			var _val_  = $field.val();
			_val_ = _val_.replace(/[<>\"\']/g,'');

			var icon_picker_html = '';
			icon_picker_html +='<div class="ff-open-library-button-wrapper ff-open-icon-library-button-wrapper" style="display:block">';
				icon_picker_html +='<a class="ff-open-library-button ff-open-library-icon-button">';
					icon_picker_html +='<span class="ff-open-library-button-preview">';
						icon_picker_html +='<i class="'+_val_+'"></i>';
					icon_picker_html +='</span>';
					icon_picker_html +='<span class="ff-open-library-button-title">Select Icon</span>';
					icon_picker_html +='<input type="hidden" name="'+_name_+'" id="'+_id_+'" class="ff-icon" value="'+_val_+'" >';
				icon_picker_html +='</a>';
				icon_picker_html += '<a class="ff-open-library-remove"></a>';
			icon_picker_html +='</div>'

			$field.replaceWith( icon_picker_html );
		}

		window.setInterval(function(){
			$( '.field-description textarea' ).each(function(){
				make_icon_from_description( $(this) );
			});
		},1618);

		$('body').on('click', '.ff-open-icon-library-button-wrapper .ff-open-library-remove', function(){
			var $wrapper = $(this).parents('.ff-open-icon-library-button-wrapper');
			$wrapper.find('i').removeAttr('class');
			$wrapper.find('input').val('');
		});

	})(jQuery);
	</script>
	<style type="text/css"> .field-description{ display: block !important; } </style>
	<?php
}


function ff_casanova__megamenu_select__admin_footer(){

	ffContainer::getInstance()->getModalWindowFactory()->printModalWindowManagerLibraryIcon();

	?>
	<script type="text/javascript">
	(function($){
		function make_select_from_class_input( $field ){
			var _name_ = $field.attr('name');
			var _id_   = $field.attr('id');
			var _val_  = $field.val();
			_val_ = _val_.replace(/[<>\"\']/g,'');

			var icon_picker_html = '';
			icon_picker_html +='<select type="hidden" name="'+_name_+'" id="'+_id_+'" value="'+_val_+'">';
				icon_picker_html +='<option value="">Normal Submenus</option>';
				icon_picker_html +='<option value="mega-menu">Columns in submenu</option>';
				icon_picker_html +='<option value="mega-menu full">Columns in submenu and fullwidth</option>';
			icon_picker_html +='</select>';

			var $icon_picker = $( icon_picker_html );

			$field.replaceWith( $icon_picker );
			if( ( 'mega-menu full' == _val_ ) || ( 'mega-menu' == _val_ ) ){
				$icon_picker.val( _val_ );
			}

			$('.field-css-classes').removeClass('description-thin');
		}

		window.setInterval(function(){
			$('.menu-item-depth-0').each(function(){
				$(this).find( '.field-css-classes input' ).each(function(){
					make_select_from_class_input( $(this) );
				});
			});
		},1000);

	})(jQuery);
	</script>
	<style type="text/css"> .field-css-classes{ display: block !important; } </style>
	<?php
}


if( FALSE !== strpos( $_SERVER['REQUEST_URI'], '/nav-menus.php') ){
	add_action( 'admin_enqueue_scripts', 'ff_casanova__icons__admin_enqueue_scripts' );
	add_action( 'admin_footer', 'ff_casanova__icons__admin_footer', 99 );
	add_action( 'admin_footer', 'ff_casanova__megamenu_select__admin_footer', 99 );
}

require get_template_directory().'/framework/components/widgets/customized/tagCloud.php';
require get_template_directory().'/framework/components/widgets/customized/recentPosts.php';


################################################################################
# CONTACT FORM AJAX
################################################################################


ffContainer()->getWPLayer()->getHookManager()->addAjaxRequestOwner('contactform-send-ajax', 'ff_contact_form_send_ajax');

function ff_contact_form_send_ajax(  ffAjaxRequest $ajaxRequest ) {

	$data = $ajaxRequest->data;
	$formSerialize = $data['formInput'];

	$output = array();
	parse_str( $formSerialize, $output);

	$contactInfo = $data['contactInfo'];

	$contactInfoDecoded = ffContainer::getInstance()->getCiphers()->freshfaceCipher_decode( $contactInfo );
	$contactInfoParsed = json_decode($contactInfoDecoded);

	$headers = 'From: '.($output['name']).' <'.($output['email']).'>' . "\r\n";


	$message = '';
	$message .= 'Name: '.esc_attr($output['name']) ."\n";
	$message .= 'Email: '.esc_attr($output['email']) ."\n";
	$message .= 'Subject: '.esc_attr($contactInfoParsed->subject) ."\n";
	$message .= "\n";
	$message .= 'Message: '.esc_attr($output['message']) ."\n";

	if( !empty( $contactInfoParsed->email ) ) {
		$result = wp_mail( $contactInfoParsed->email, $contactInfoParsed->subject, $message, $headers );

		if( $result == false ) {
			echo 'false';
		} else {
			echo 'true';
		}
	}
}


################################################################################
# JAVASCRIPT CONSTANTS
################################################################################
add_action('wp_head', 'ff_print_js_constants', 1);
function ff_print_js_constants() {
	echo '<script type="text/javascript">'; echo "\n";
	echo 'var ajaxurl = "'.admin_url('admin-ajax.php').'";'; echo "\n";
	echo 'var ff_template_url = "'.get_template_directory_uri().'";'; echo "\n";
	echo '</script>'; echo "\n";
}


################################################################################
# USER DATA ESCAPING FUNCTION
################################################################################

// Sorry I know that this is ugly global variable, but I want to call
// this function just once

global $__ff__wp_kses_allowed_html;
$__ff__wp_kses_allowed_html = wp_kses_allowed_html('post');

function ff_wp_kses( $html ){
	global $__ff__wp_kses_allowed_html;
	$html = wp_kses( $html, $__ff__wp_kses_allowed_html );
	return $html;
}


################################################################################
# Featured areas
################################################################################

locate_template('templates/helpers/class.ff_Featured_Area.php', true, true);
locate_template('templates/helpers/func.ff_Gallery.php', true, true);

add_filter('wp_audio_shortcode_override',
								array('ff_Featured_Area', 'actionHijackFeaturedShortcode' ), 10, 2);
add_filter('post_playlist',     array('ff_Featured_Area', 'actionHijackFeaturedShortcode' ), 10, 2);
add_filter('embed_oembed_html', array('ff_Featured_Area', 'actionHijackFeaturedShortcode' ), 10, 2);
add_filter('post_gallery',      array('ff_Featured_Area', 'actionHijackFeaturedShortcode' ), 10, 2);


################################################################################
# REV SLIDER BANNED JS
################################################################################


add_action('ff_performance_cache_banned_js', 'ff_theme_banned_js_minification');

function ff_theme_banned_js_minification( $bannedFiles ) {

	if( !is_array( $bannedFiles ) ) {
		$bannedFiles = array();
	}
	$bannedFiles = array_merge( array('tp-tools', 'revmin'), $bannedFiles);

	return( $bannedFiles );
}

################################################################################
# ADD PORTFOLIO IF POSSIBLE
################################################################################

do_action( 'casanova_theme_initialized' );

