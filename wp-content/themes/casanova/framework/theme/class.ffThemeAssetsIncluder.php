<?php

class ffThemeAssetsIncluder extends ffThemeAssetsIncluderAbstract {
	public function isAdmin() {
		$styleEnqueuer = $this->_getStyleEnqueuer();
		$scriptEnqueuer = $this->_getScriptEnqueuer();

		$styleEnqueuer->addStyleTheme( 'wp-color-picker' );
		$scriptEnqueuer->addScript( 'wp-color-picker');
	}

	private function _includeGoogleFont( $font_name ){
		if( FALSE !== strpos($font_name, ',') ){
			// THIS IS NOT GOOGLE FONT
			return;
		}

		$font_name = str_replace("'", "", $font_name);

		$fontIdValue = str_replace(' ', '-', $font_name );
		$fontIdValue = strtolower( $fontIdValue );

		$src = '//fonts.googleapis.com/css?family='.esc_attr( $font_name ).':300,400,600,700,300italic,400italic,600italic,700italic&subset=latin,latin-ext';
		$this->_getStyleEnqueuer()->addStyle( 'google-font-' . esc_attr( $fontIdValue ), $src);
	}


	private function _includeCss() {
		$styleEnqueuer = $this->_getStyleEnqueuer();
		//TODO GOOGLE FONTS MISSING!!!!

		$styleEnqueuer->addStyleTheme('ff-font-fa', '/src/fontawesome/css/font-awesome.min.css');
		$styleEnqueuer->addStyleFramework('ff-font-awesome', '/framework/extern/iconfonts/ff-font-awesome4/ff-font-awesome4.css');

		$iconfont_types = array(
			'bootstrap glyphicons'
			              => '/framework/extern/iconfonts/glyphicon/glyphicon.css',
			'brandico'    => '/framework/extern/iconfonts/ff-font-brandico/ff-font-brandico.css',
			'elusive'     => '/framework/extern/iconfonts/ff-font-elusive/ff-font-elusive.css',
			'entypo'      => '/framework/extern/iconfonts/ff-font-entypo/ff-font-entypo.css',
			'fontelico'   => '/framework/extern/iconfonts/ff-font-fontelico/ff-font-fontelico.css',
			'iconic'      => '/framework/extern/iconfonts/ff-font-iconic/ff-font-iconic.css',
			'linecons'    => '/framework/extern/iconfonts/ff-font-linecons/ff-font-linecons.css',
			'maki'        => '/framework/extern/iconfonts/ff-font-maki/ff-font-maki.css',
			'meteocons'   => '/framework/extern/iconfonts/ff-font-meteocons/ff-font-meteocons.css',
			'mfglabs'     => '/framework/extern/iconfonts/ff-font-mfglabs/ff-font-mfglabs.css',
			'modernpics'  => '/framework/extern/iconfonts/ff-font-modernpics/ff-font-modernpics.css',
			'typicons'    => '/framework/extern/iconfonts/ff-font-typicons/ff-font-typicons.css',
			'simple line icons'
			              => '/framework/extern/iconfonts/ff-font-simple-line-icons/ff-font-simple-line-icons.css',
			'weathercons' => '/framework/extern/iconfonts/ff-font-weathercons/ff-font-weathercons.css',
			'websymbols'  => '/framework/extern/iconfonts/ff-font-websymbols/ff-font-websymbols.css',
			'zocial'      => '/framework/extern/iconfonts/ff-font-zocial/ff-font-zocial.css',
		);

		$iconfontQuery = ffThemeOptions::getQuery('iconfont');
		foreach ($iconfont_types as $name => $path) {
			if( $iconfontQuery->get( str_replace(' ', '_', $name) ) ){
				$styleEnqueuer->addStyleFramework( 'icon-option-font-' . str_replace(' ', '_', $name), $path);
			}
		}



		$styleEnqueuer->addStyleTheme('ff-core','/css/core.css');
		$styleEnqueuer->addStyleTheme('ff-style','/css/style.css');
		// $styleEnqueuer->addStyleTheme('ff-custom','/css/custom.css');

		$styleEnqueuer->addStyleTheme('ff-responsive','/css/responsive.css');
		$styleEnqueuer->addStyleTheme('ff-tooltipster','/src/tooltipster/tooltipster.css');
		$styleEnqueuer->addStyleTheme('ff-swipebox','/src/swipebox/swipebox.css');
		$styleEnqueuer->addStyleTheme('style','/style.css');


		// CUSTOM FONT STYLE

		$fontQuery = ffThemeOptions::getQuery('font');
		// Has to be same as in class.ffThemeOptionsHolder.php
		$this->_includeGoogleFont( $fontQuery->get('body'    ) );
		$this->_includeGoogleFont( $fontQuery->get('headers' ) );
		$this->_includeGoogleFont( $fontQuery->get('inputs'  ) );
		$this->_includeGoogleFont( $fontQuery->get('code'    ) );

		ffContainer::getInstance()->getWPLayer()->wp_add_inline_style('ff-style',
			ff_get_font_selectors('body')
					. '{font-family: '
					. $fontQuery->get('body')
					. ', Helvetica, Arial, sans-serif; }'
					. "\n"
			.ff_get_font_selectors('headers')
					. '{font-family: '
					. $fontQuery->get('headers')
					. ', Helvetica, Arial, sans-serif; }'
					. "\n"
			.ff_get_font_selectors('inputs')
					. '{font-family: '
					. $fontQuery->get('inputs')
					. ', Helvetica, Arial, sans-serif; }'
					. "\n"
			.ff_get_font_selectors('code')
					. '{font-family: '
					. $fontQuery->get('code')
					. ', monospace; }'
					. "\n"
		);

		$custom_color_style = '';
		$colorsQuery = ffThemeOptions::getQuery('colors');

		// CUSTOM COLOR STYLE

		$primary_color = $colorsQuery->get('primary-color');
		$secondary_color = $colorsQuery->get('secondary-color');

		$custom_color_style .= 'a,
#site-nav > ul > li:not(.over) > a:hover,
.light .entry-date,
.dark  .entry-date,
.light .entry-title a:hover,
.dark  .entry-title a:hover,
.light .entry-meta a:hover,
.dark  .entry-meta a:hover,
.light .project-filter .active a,
.dark  .project-filter .active a,
.light .project-filter a:hover,
.dark  .project-filter a:hover,
.project .project-thumb figcaption .icon:hover,
.pricing .plan-price{
    color: '.$primary_color.';
}

.content-header.v3:after,
.breadcrumbs,
.pagenavi a:hover,
.pagenavi span.current,
.project .project-thumb figcaption,
.progress-bar .bar div,
.tabs.vertical .tabnav .active a{
    background-color: '.$primary_color.';
}

input[type="text"]:focus,
input[type="text"]:focus,
input[type="password"]:focus,
input[type="search"]:focus,
input[type="url"]:focus,
input[type="email"]:focus,
input[type="number"]:focus,
select:focus,
textarea:focus,
.pagenavi a:hover,
.pagenavi span.current,
.tabs.vertical .tabnav .active a,
.pricing .plan.recommended{
    border-color: '.$primary_color.';
}

.tabs.vertical .tabnav .active a:after{
    border-left-color: '.$primary_color.';
}
a:active, a:hover,
.light .entry-meta a:hover,
.dark  .entry-meta a:hover,
.light .masonry-entries .entry .entry-title a:hover,
.dark  .masonry-entries .entry .entry-title a:hover,
.light .post-list .details .title a:hover,
.dark  .post-list .details .title a:hover,
.light .entry-meta a:hover,
.dark  .entry-meta a:hover,
.light .project .project-title a:hover,
.dark  .project .project-title a:hover{
    color: '.$secondary_color.';
}

/* Black icon */
.icon.primary{
    color: '.$primary_color.';
}
.icon.circle.primary,
.icon.square.primary{
    background-color: '.$primary_color.';
    border-color: '.$primary_color.';
    color: #FFFFFF;
}
.icon.circle.primary:hover,
.icon.square.primary:hover{
    background-color: '.$secondary_color.';
    border-color: '.$secondary_color.';
    color: #FFFFFF;
}
';

		// CUSTOM ICONS AND BUTTONS STYLE

		foreach ($colorsQuery->get('colors') as $color) {
			$color_class_slug = 'custom-color-class-' . sanitize_title( $color->get('title') );
			$custom_color_style .= '
a.'.$color_class_slug.',
.icon.'.$color_class_slug.'{
    color:'.$color->get('nobg-color').';
}
.icon.circle.'.$color_class_slug.',
.icon.square.'.$color_class_slug.',
.button.'.$color_class_slug.'{
    background-color:'.$color->get('default-bg-color').';
    border-color:'.$color->get('default-border-color').';
    color:'.$color->get('default-color').';
}
.icon.circle.'.$color_class_slug.':hover,
.icon.square.'.$color_class_slug.':hover,
.button.'.$color_class_slug.':hover,
.button.'.$color_class_slug.':focus,
.button.'.$color_class_slug.':active,
.button.'.$color_class_slug.'.disabled,
.button.'.$color_class_slug.'[disabled]{
    background-color:'.$color->get('hover-border-color').';
    border-color:'.$color->get('hover-border-color').';
    color:'.$color->get('hover-color').';
}
';
		}

		ffContainer::getInstance()->getWPLayer()->wp_add_inline_style('style', $custom_color_style );

	}

	private function _includeJs() {
		$scriptEnqueuer = $this->_getScriptEnqueuer();

		// THESE SCRIPTS ARE INCLUDED IN HEADER
		$scriptEnqueuer->addScriptTheme('ff-modernizr','/src/modernizr/modernizr.custom.js', null, null, false, false, false);
		$scriptEnqueuer->addScriptTheme('jquery');

		// THESE SCRIPTS ARE INCLUDED IN FOOTER
        $scriptEnqueuer->addScriptFramework(
			'ff-frslib',
			'/framework/frslib/src/frslib.js',
			array( 'jquery' ),
            null,
            true
		);
		$scriptEnqueuer->addScript('ff-google-maps', 'http://maps.google.com/maps/api/js?v=3.13&amp;sensor=false&amp;libraries=geometry&amp;1343675513', null,null,true);
		$scriptEnqueuer->addScriptTheme('ff-maplace','/src/maplace/maplace.min.js', null, null, true);
		$scriptEnqueuer->addScriptTheme('ff-imagesloaded','/src/imagesloaded/imagesloaded.pkgd.min.js', null, null, true);
		$scriptEnqueuer->addScriptTheme('ff-isotope','/src/isotope/isotope.pkgd.min.js', null, null, true);
		$scriptEnqueuer->addScriptTheme('ff-bxslider','/src/bxslider/jquery.bxslider.min.js', null, null, true);
		$scriptEnqueuer->addScriptTheme('ff-hoverdir','/src/hoverdir/jquery.hoverdir.min.js', null, null, true);
		$scriptEnqueuer->addScriptTheme('ff-slicknav','/src/slicknav/jquery.slicknav.min.js', null, null, true);
		$scriptEnqueuer->addScriptTheme('ff-appear','/src/appear/jquery.appear.js', null, null, true);
		$scriptEnqueuer->addScriptTheme('ff-countup','/src/countup/countUp.min.js', null, null, true);
		$scriptEnqueuer->addScriptTheme('ff-easypiechart','/src/easypiechart/jquery.easypiechart.min.js', null, null, true);
		$scriptEnqueuer->addScriptTheme('ff-sticky','/src/sticky/jquery.sticky.js', null, null, true);
		$scriptEnqueuer->addScriptTheme('ff-tooltipster','/src/tooltipster/jquery.tooltipster.min.js', null, null, true);
		$scriptEnqueuer->addScriptTheme('ff-swipebox','/src/swipebox/jquery.swipebox.min.js', null, null, true);
		$scriptEnqueuer->addScriptTheme('ff-jquery.mb.YTPlayer','/js/jquery.mb.YTPlayer.js', null, null, true);

		// THESE ARE THE MAIN THEME JAVASCRIPTS (included in footer)
		$scriptEnqueuer->addScriptTheme('ff-casanova-menu','/js/casanova.menu.js', null, null, true);
		$scriptEnqueuer->addScriptTheme('ff-casanova-accordion','/js/casanova.accordion.js', null, null, true);
		$scriptEnqueuer->addScriptTheme('ff-casanova-tabs','/js/casanova.tabs.js', null, null, true);
		$scriptEnqueuer->addScriptTheme('ff-casanova-fitmedia','/js/casanova.fitmedia.js', null, null, true);
		$scriptEnqueuer->addScriptTheme('ff-casanova','/js/casanova.js', null, null, true);
		$scriptEnqueuer->addScriptTheme('ff-casanova-init','/js/init.js', null, null, true);

        if(is_singular()) wp_enqueue_script( 'comment-reply' );
	}

	public function isNotAdmin() {
		$this->_includeCss();
		$this->_includeJs();
	}
}




