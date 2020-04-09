<?php

class ffThemeOptionsHolder extends ffOptionsHolder {

	public function getOptions() {

		$s = $this->_getOnestructurefactory()->createOneStructure( ffThemeContainer::OPTIONS_NAME );

		$s->startSection( ffThemeContainer::OPTIONS_NAME, ffOneSection::TYPE_NORMAL );


////////////////////////////////////////////////////////////////////////////////
// LAYOUT
////////////////////////////////////////////////////////////////////////////////


		$s->addElement( ffOneElement::TYPE_HTML, 'TYPE_HTML', '<div class="ff-theme-mix-admin-tab-layout ff-theme-mix-admin-tab-content">' );

		$s->startSection('layout');

			$s->addElement( ffOneElement::TYPE_HEADING, '', 'Layout' );

			$s->addElement( ffOneElement::TYPE_TABLE_START );

				$s->startSection('default');
				$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Default Layout');

					$s->addOption( ffOneOption::TYPE_CHECKBOX, 'header', 'Header', 1);
					$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', 'Show Default header');
					$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', 'which could be overwritten in Layouts section');

					$s->addOption( ffOneOption::TYPE_CHECKBOX, 'content', 'Content', 1);
					$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', 'Show Default content');
					$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', 'which could be overwritten in Layouts section');

					$s->addOption( ffOneOption::TYPE_CHECKBOX, 'footer', 'Footer', 1);
					$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', 'Show Default footer');
					$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', 'which could be overwritten in Layouts section');
				$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );
				$s->endSection();

			$s->addElement( ffOneElement::TYPE_TABLE_END );

			$s->addElement( ffOneElement::TYPE_HTML, 'TYPE_HTML', '<div style="display:none">' );
			$s->addElement( ffOneElement::TYPE_HEADING, '', 'Special' );

			$s->addElement( ffOneElement::TYPE_TABLE_START );

				$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Developer Mode');
				$s->addOption( ffOneOption::TYPE_CHECKBOX, 'enable-developer-mode', 'Enable developer mode');

				$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

			$s->addElement( ffOneElement::TYPE_TABLE_END );
			$s->addElement( ffOneElement::TYPE_HTML, 'TYPE_HTML', '</div>' );

		$s->endSection();


////////////////////////////////////////////////////////////////////////////////
// COLORS
////////////////////////////////////////////////////////////////////////////////


			$s->addElement( ffOneElement::TYPE_HTML, 'TYPE_HTML', '</div><div class="ff-theme-mix-admin-tab-colors ff-theme-mix-admin-tab-content">' );

			$s->startSection('colors');

				$s->addElement( ffOneElement::TYPE_HEADING, '', 'Colors' );

				$s->addElement( ffOneElement::TYPE_TABLE_START );

					$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Primary color');
						$s->addOption(ffOneOption::TYPE_TEXT, 'primary-color', 'Pick Color', '#3498DB')
							->addParam('class', 'ff-default-wp-color-picker');
						$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', 'This color is used on links.' );
						$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', 'This color is used as background color for some specific elements like breadcrumbs or vertical tab active elements.' );
						$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', 'This color is used as border color for some active inputs' );
					$s->addElement( ffOneElement::TYPE_TABLE_DATA_END);

					$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Secondary color');
						$s->addOption(ffOneOption::TYPE_TEXT, 'secondary-color', 'Pick Color', '#3486BC')
							->addParam('class', 'ff-default-wp-color-picker');
						$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', 'This color is used on links with hover style.' );
					$s->addElement( ffOneElement::TYPE_TABLE_DATA_END);

					$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Colors for buttons and icons');
						$s->startSection('colors', ffOneSection::TYPE_REPEATABLE_VARIABLE );
							$s->startSection( 'color', ffOneSection::TYPE_REPEATABLE_VARIATION )->addParam('section-name', 'Color');
								$s->addElement( ffOneElement::TYPE_TABLE_START );

									$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Color name');

										$s->addOption( ffOneOption::TYPE_TEXT, 'title', '', 'Primary')
											->addParam('class', 'edit-repeatable-item-title');
										$s->addElement( ffOneElement::TYPE_NEW_LINE );

									$s->addElement( ffOneElement::TYPE_TABLE_DATA_END);

									$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Without BG Color');

										$s->addOption(ffOneOption::TYPE_TEXT, 'nobg-color', 'Pick Color', '#3498DB')
											->addParam('class', 'ff-default-wp-color-picker');
										$s->addElement( ffOneElement::TYPE_NEW_LINE );
										$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', 'This color is used (for example) in icons, with no shape (not circle, not square).' );
										$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', 'This bacically sets color of icon only, Background is transparent.' );

									$s->addElement( ffOneElement::TYPE_TABLE_DATA_END);

									$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'With BG Colors');

										$s->addOption(ffOneOption::TYPE_TEXT, 'default-bg-color', 'Pick Background Color', '#3498DB')
											->addParam('class', 'ff-default-wp-color-picker');
										$s->addElement( ffOneElement::TYPE_NEW_LINE );

										$s->addOption(ffOneOption::TYPE_TEXT, 'default-border-color', 'Pick Border Color', '#3498DB')
											->addParam('class', 'ff-default-wp-color-picker');
										$s->addElement( ffOneElement::TYPE_NEW_LINE );

										$s->addOption(ffOneOption::TYPE_TEXT, 'default-color', 'Pick Color', '#FFFFFF')
											->addParam('class', 'ff-default-wp-color-picker');
										$s->addElement( ffOneElement::TYPE_NEW_LINE );
										$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', 'This color is used in icons and buttons.' );

									$s->addElement( ffOneElement::TYPE_TABLE_DATA_END);

									$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'With BG Hover Colors');

										$s->addOption(ffOneOption::TYPE_TEXT, 'hover-bg-color', 'Pick Hover Background Color', '#3486BC')
											->addParam('class', 'ff-default-wp-color-picker');
										$s->addElement( ffOneElement::TYPE_NEW_LINE );

										$s->addOption(ffOneOption::TYPE_TEXT, 'hover-border-color', 'Pick Hover Border Color', '#3486BC')
											->addParam('class', 'ff-default-wp-color-picker');
										$s->addElement( ffOneElement::TYPE_NEW_LINE );

										$s->addOption(ffOneOption::TYPE_TEXT, 'hover-color', 'Pick Hover Color', '#FFFFFF')
											->addParam('class', 'ff-default-wp-color-picker');
										$s->addElement( ffOneElement::TYPE_NEW_LINE );
										$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', 'This color is used in icons and buttons, when you move with mouse above these elements.' );

									$s->addElement( ffOneElement::TYPE_TABLE_DATA_END);
								$s->addElement( ffOneElement::TYPE_TABLE_END );
							$s->endSection();
						$s->endSection();

				$s->addElement( ffOneElement::TYPE_TABLE_END );

			$s->endSection();


////////////////////////////////////////////////////////////////////////////////
// FONTS
////////////////////////////////////////////////////////////////////////////////


		$s->addElement( ffOneElement::TYPE_HTML, 'TYPE_HTML', '</div><div class="ff-theme-mix-admin-tab-fonts ff-theme-mix-admin-tab-content">' );

		$s->startSection('font');

			$s->addElement( ffOneElement::TYPE_HEADING, '', 'Fonts' );

			$s->addElement( ffOneElement::TYPE_TABLE_START );

				$font_types = array(
					'body'     => "'Open Sans'" ,
					'headers'  => "'Open Sans'" ,
					'inputs'   => "'Open Sans'" ,
					'code'     => "'Courier New', Courier, monospace" ,
				);

				foreach ($font_types as $title => $default) {
					$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', ucfirst($title));
						$s->addOption( ffOneOption::TYPE_FONT, $title, 'Family ', $default);
					$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );
				}

			$s->addElement( ffOneElement::TYPE_TABLE_END );

		$s->endSection();


////////////////////////////////////////////////////////////////////////////////
// ICON FONTS
////////////////////////////////////////////////////////////////////////////////


		$s->addElement( ffOneElement::TYPE_HTML, 'TYPE_HTML', '</div><div class="ff-theme-mix-admin-tab-iconfonts ff-theme-mix-admin-tab-content">' );

		$s->startSection('iconfont');

			$s->addElement( ffOneElement::TYPE_HEADING, '', 'Fonts' );

			$s->addElement( ffOneElement::TYPE_TABLE_START );


				$iconfont_examples = array(
					'bootstrap glyphicons'
					              => '<i class="glyphicon glyphicon-asterisk"></i><i class="glyphicon glyphicon-plus"></i><i class="glyphicon glyphicon-euro"></i><i class="glyphicon glyphicon-minus"></i><i class="glyphicon glyphicon-cloud"></i><i class="glyphicon glyphicon-envelope"></i><i class="glyphicon glyphicon-pencil"></i><i class="glyphicon glyphicon-glass"></i><i class="glyphicon glyphicon-music"></i><i class="glyphicon glyphicon-search"></i><i class="glyphicon glyphicon-heart"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star-empty"></i><i class="glyphicon glyphicon-user"></i><i class="glyphicon glyphicon-film"></i><i class="glyphicon glyphicon-th-large"></i><i class="glyphicon glyphicon-th"></i><i class="glyphicon glyphicon-th-list"></i><i class="glyphicon glyphicon-ok"></i><i class="glyphicon glyphicon-remove"></i>',
					'brandico'    => '<i class="ff-font-brandico icon-facebook"></i><i class="ff-font-brandico icon-facebook-rect"></i><i class="ff-font-brandico icon-twitter"></i><i class="ff-font-brandico icon-twitter-bird"></i><i class="ff-font-brandico icon-vimeo"></i><i class="ff-font-brandico icon-vimeo-rect"></i><i class="ff-font-brandico icon-tumblr"></i><i class="ff-font-brandico icon-tumblr-rect"></i><i class="ff-font-brandico icon-googleplus-rect"></i><i class="ff-font-brandico icon-github-text"></i><i class="ff-font-brandico icon-github"></i><i class="ff-font-brandico icon-skype"></i><i class="ff-font-brandico icon-icq"></i><i class="ff-font-brandico icon-yandex"></i><i class="ff-font-brandico icon-yandex-rect"></i><i class="ff-font-brandico icon-vkontakte-rect"></i><i class="ff-font-brandico icon-odnoklassniki"></i><i class="ff-font-brandico icon-odnoklassniki-rect"></i><i class="ff-font-brandico icon-friendfeed"></i><i class="ff-font-brandico icon-friendfeed-rect"></i>',
					'elusive'     => '<i class="ff-font-elusive icon-glass"></i><i class="ff-font-elusive icon-music"></i><i class="ff-font-elusive icon-search"></i><i class="ff-font-elusive icon-search-circled"></i><i class="ff-font-elusive icon-mail"></i><i class="ff-font-elusive icon-mail-circled"></i><i class="ff-font-elusive icon-heart"></i><i class="ff-font-elusive icon-heart-circled"></i><i class="ff-font-elusive icon-heart-empty"></i><i class="ff-font-elusive icon-star"></i><i class="ff-font-elusive icon-star-circled"></i><i class="ff-font-elusive icon-star-empty"></i><i class="ff-font-elusive icon-user"></i><i class="ff-font-elusive icon-group"></i><i class="ff-font-elusive icon-group-circled"></i><i class="ff-font-elusive icon-torso"></i><i class="ff-font-elusive icon-video"></i><i class="ff-font-elusive icon-video-circled"></i><i class="ff-font-elusive icon-video-alt"></i><i class="ff-font-elusive icon-videocam"></i>',
					'entypo'      => '<i class="ff-font-entypo icon-note"></i><i class="ff-font-entypo icon-note-beamed"></i><i class="ff-font-entypo icon-music"></i><i class="ff-font-entypo icon-search"></i><i class="ff-font-entypo icon-flashlight"></i><i class="ff-font-entypo icon-mail"></i><i class="ff-font-entypo icon-heart"></i><i class="ff-font-entypo icon-heart-empty"></i><i class="ff-font-entypo icon-star"></i><i class="ff-font-entypo icon-star-empty"></i><i class="ff-font-entypo icon-user"></i><i class="ff-font-entypo icon-users"></i><i class="ff-font-entypo icon-user-add"></i><i class="ff-font-entypo icon-video"></i><i class="ff-font-entypo icon-picture"></i><i class="ff-font-entypo icon-camera"></i><i class="ff-font-entypo icon-layout"></i><i class="ff-font-entypo icon-menu"></i><i class="ff-font-entypo icon-check"></i><i class="ff-font-entypo icon-cancel"></i>',
					'fontelico'   => '<i class="ff-font-fontelico icon-emo-happy"></i><i class="ff-font-fontelico icon-emo-wink"></i><i class="ff-font-fontelico icon-emo-wink2"></i><i class="ff-font-fontelico icon-emo-unhappy"></i><i class="ff-font-fontelico icon-emo-sleep"></i><i class="ff-font-fontelico icon-emo-thumbsup"></i><i class="ff-font-fontelico icon-emo-devil"></i><i class="ff-font-fontelico icon-emo-surprised"></i><i class="ff-font-fontelico icon-emo-tongue"></i><i class="ff-font-fontelico icon-emo-coffee"></i><i class="ff-font-fontelico icon-emo-sunglasses"></i><i class="ff-font-fontelico icon-emo-displeased"></i><i class="ff-font-fontelico icon-emo-beer"></i><i class="ff-font-fontelico icon-emo-grin"></i><i class="ff-font-fontelico icon-emo-angry"></i><i class="ff-font-fontelico icon-emo-saint"></i><i class="ff-font-fontelico icon-emo-cry"></i><i class="ff-font-fontelico icon-emo-shoot"></i><i class="ff-font-fontelico icon-emo-squint"></i><i class="ff-font-fontelico icon-emo-laugh"></i>',
					'iconic'      => '<i class="ff-font-iconic icon-search"></i><i class="ff-font-iconic icon-mail"></i><i class="ff-font-iconic icon-heart"></i><i class="ff-font-iconic icon-heart-empty"></i><i class="ff-font-iconic icon-star"></i><i class="ff-font-iconic icon-user"></i><i class="ff-font-iconic icon-video"></i><i class="ff-font-iconic icon-picture"></i><i class="ff-font-iconic icon-camera"></i><i class="ff-font-iconic icon-ok"></i><i class="ff-font-iconic icon-ok-circle"></i><i class="ff-font-iconic icon-cancel"></i><i class="ff-font-iconic icon-cancel-circle"></i><i class="ff-font-iconic icon-plus"></i><i class="ff-font-iconic icon-plus-circle"></i><i class="ff-font-iconic icon-minus"></i><i class="ff-font-iconic icon-minus-circle"></i><i class="ff-font-iconic icon-help"></i><i class="ff-font-iconic icon-info"></i><i class="ff-font-iconic icon-home"></i>',
					'linecons'    => '<i class="ff-font-linecons icon-music"></i><i class="ff-font-linecons icon-search"></i><i class="ff-font-linecons icon-mail"></i><i class="ff-font-linecons icon-heart"></i><i class="ff-font-linecons icon-star"></i><i class="ff-font-linecons icon-user"></i><i class="ff-font-linecons icon-videocam"></i><i class="ff-font-linecons icon-camera"></i><i class="ff-font-linecons icon-photo"></i><i class="ff-font-linecons icon-attach"></i><i class="ff-font-linecons icon-lock"></i><i class="ff-font-linecons icon-eye"></i><i class="ff-font-linecons icon-tag"></i><i class="ff-font-linecons icon-thumbs-up"></i><i class="ff-font-linecons icon-pencil"></i><i class="ff-font-linecons icon-comment"></i><i class="ff-font-linecons icon-location"></i><i class="ff-font-linecons icon-cup"></i><i class="ff-font-linecons icon-trash"></i><i class="ff-font-linecons icon-doc"></i>',
					'maki'        => '<i class="ff-font-maki icon-aboveground-rail"></i><i class="ff-font-maki icon-airfield"></i><i class="ff-font-maki icon-airport"></i><i class="ff-font-maki icon-art-gallery"></i><i class="ff-font-maki icon-bar"></i><i class="ff-font-maki icon-baseball"></i><i class="ff-font-maki icon-basketball"></i><i class="ff-font-maki icon-beer"></i><i class="ff-font-maki icon-belowground-rail"></i><i class="ff-font-maki icon-bicycle"></i><i class="ff-font-maki icon-bus"></i><i class="ff-font-maki icon-cafe"></i><i class="ff-font-maki icon-campsite"></i><i class="ff-font-maki icon-cemetery"></i><i class="ff-font-maki icon-cinema"></i><i class="ff-font-maki icon-college"></i><i class="ff-font-maki icon-commerical-building"></i><i class="ff-font-maki icon-credit-card"></i><i class="ff-font-maki icon-cricket"></i><i class="ff-font-maki icon-embassy"></i>',
					'meteocons'   => '<i class="ff-font-meteocons icon-windy-rain-inv"></i><i class="ff-font-meteocons icon-snow-inv"></i><i class="ff-font-meteocons icon-snow-heavy-inv"></i><i class="ff-font-meteocons icon-hail-inv"></i><i class="ff-font-meteocons icon-clouds-inv"></i><i class="ff-font-meteocons icon-clouds-flash-inv"></i><i class="ff-font-meteocons icon-temperature"></i><i class="ff-font-meteocons icon-compass"></i><i class="ff-font-meteocons icon-na"></i><i class="ff-font-meteocons icon-celcius"></i><i class="ff-font-meteocons icon-fahrenheit"></i><i class="ff-font-meteocons icon-clouds-flash-alt"></i><i class="ff-font-meteocons icon-sun-inv"></i><i class="ff-font-meteocons icon-moon-inv"></i><i class="ff-font-meteocons icon-cloud-sun-inv"></i><i class="ff-font-meteocons icon-cloud-moon-inv"></i><i class="ff-font-meteocons icon-cloud-inv"></i><i class="ff-font-meteocons icon-cloud-flash-inv"></i><i class="ff-font-meteocons icon-drizzle-inv"></i><i class="ff-font-meteocons icon-rain-inv"></i>',
					'mfglabs'     => '<i class="ff-font-mfglabs icon-search"></i><i class="ff-font-mfglabs icon-mail"></i><i class="ff-font-mfglabs icon-heart"></i><i class="ff-font-mfglabs icon-heart-broken"></i><i class="ff-font-mfglabs icon-star"></i><i class="ff-font-mfglabs icon-star-empty"></i><i class="ff-font-mfglabs icon-star-half"></i><i class="ff-font-mfglabs icon-star-half_empty"></i><i class="ff-font-mfglabs icon-user"></i><i class="ff-font-mfglabs icon-user-male"></i><i class="ff-font-mfglabs icon-user-female"></i><i class="ff-font-mfglabs icon-users"></i><i class="ff-font-mfglabs icon-movie"></i><i class="ff-font-mfglabs icon-videocam"></i><i class="ff-font-mfglabs icon-isight"></i><i class="ff-font-mfglabs icon-camera"></i><i class="ff-font-mfglabs icon-menu"></i><i class="ff-font-mfglabs icon-th-thumb"></i><i class="ff-font-mfglabs icon-th-thumb-empty"></i><i class="ff-font-mfglabs icon-th-list"></i>',
					'modernpics'  => '<i class="ff-font-modernpics icon-search"></i><i class="ff-font-modernpics icon-mail"></i><i class="ff-font-modernpics icon-heart"></i><i class="ff-font-modernpics icon-star"></i><i class="ff-font-modernpics icon-user"></i><i class="ff-font-modernpics icon-user-woman"></i><i class="ff-font-modernpics icon-user-pair"></i><i class="ff-font-modernpics icon-video-alt"></i><i class="ff-font-modernpics icon-videocam"></i><i class="ff-font-modernpics icon-videocam-alt"></i><i class="ff-font-modernpics icon-camera"></i><i class="ff-font-modernpics icon-th"></i><i class="ff-font-modernpics icon-th-list"></i><i class="ff-font-modernpics icon-ok"></i><i class="ff-font-modernpics icon-cancel"></i><i class="ff-font-modernpics icon-cancel-circle"></i><i class="ff-font-modernpics icon-plus"></i><i class="ff-font-modernpics icon-home"></i><i class="ff-font-modernpics icon-lock"></i><i class="ff-font-modernpics icon-lock-open"></i>',
					'typicons'    => '<i class="ff-font-typicons icon-music-outline"></i><i class="ff-font-typicons icon-music"></i><i class="ff-font-typicons icon-search-outline"></i><i class="ff-font-typicons icon-search"></i><i class="ff-font-typicons icon-mail"></i><i class="ff-font-typicons icon-heart"></i><i class="ff-font-typicons icon-heart-filled"></i><i class="ff-font-typicons icon-star"></i><i class="ff-font-typicons icon-star-filled"></i><i class="ff-font-typicons icon-user-outline"></i><i class="ff-font-typicons icon-user"></i><i class="ff-font-typicons icon-users-outline"></i><i class="ff-font-typicons icon-users"></i><i class="ff-font-typicons icon-user-add-outline"></i><i class="ff-font-typicons icon-user-add"></i><i class="ff-font-typicons icon-user-delete-outline"></i><i class="ff-font-typicons icon-user-delete"></i><i class="ff-font-typicons icon-video"></i><i class="ff-font-typicons icon-videocam-outline"></i><i class="ff-font-typicons icon-videocam"></i>',
					'simple line icons'
					              => '<i class="ff-font-simple-line-icons icon-user-female"></i><i class="ff-font-simple-line-icons icon-user-follow"></i><i class="ff-font-simple-line-icons icon-user-following"></i><i class="ff-font-simple-line-icons icon-user-unfollow"></i><i class="ff-font-simple-line-icons icon-trophy"></i><i class="ff-font-simple-line-icons icon-screen-smartphone"></i><i class="ff-font-simple-line-icons icon-screen-desktop"></i><i class="ff-font-simple-line-icons icon-plane"></i><i class="ff-font-simple-line-icons icon-notebook"></i><i class="ff-font-simple-line-icons icon-moustache"></i><i class="ff-font-simple-line-icons icon-mouse"></i><i class="ff-font-simple-line-icons icon-magnet"></i><i class="ff-font-simple-line-icons icon-energy"></i><i class="ff-font-simple-line-icons icon-emoticon-smile active"></i><i class="ff-font-simple-line-icons icon-disc"></i><i class="ff-font-simple-line-icons icon-cursor-move"></i><i class="ff-font-simple-line-icons icon-crop"></i><i class="ff-font-simple-line-icons icon-credit-card"></i><i class="ff-font-simple-line-icons icon-chemistry"></i><i class="ff-font-simple-line-icons icon-user"></i>',
					'weathercons' => '<i class="ff-font-weathercons icon-day-cloudy-gusts"></i><i class="ff-font-weathercons icon-day-cloudy-windy"></i><i class="ff-font-weathercons icon-day-cloudy"></i><i class="ff-font-weathercons icon-day-fog"></i><i class="ff-font-weathercons icon-day-hail"></i><i class="ff-font-weathercons icon-day-lightning"></i><i class="ff-font-weathercons icon-day-rain-mix"></i><i class="ff-font-weathercons icon-day-rain-wind"></i><i class="ff-font-weathercons icon-day-rain"></i><i class="ff-font-weathercons icon-day-showers"></i><i class="ff-font-weathercons icon-day-snow"></i><i class="ff-font-weathercons icon-day-sprinkle"></i><i class="ff-font-weathercons icon-day-sunny-overcast"></i><i class="ff-font-weathercons icon-day-sunny"></i><i class="ff-font-weathercons icon-day-storm-showers"></i><i class="ff-font-weathercons icon-day-thunderstorm"></i><i class="ff-font-weathercons icon-cloudy-gusts"></i><i class="ff-font-weathercons icon-cloudy-windy"></i><i class="ff-font-weathercons icon-cloudy"></i><i class="ff-font-weathercons icon-fog"></i>',
					'websymbols'  => '<i class="ff-font-websymbols icon-search"></i><i class="ff-font-websymbols icon-mail"></i><i class="ff-font-websymbols icon-heart"></i><i class="ff-font-websymbols icon-heart-empty"></i><i class="ff-font-websymbols icon-star"></i><i class="ff-font-websymbols icon-user"></i><i class="ff-font-websymbols icon-video"></i><i class="ff-font-websymbols icon-picture"></i><i class="ff-font-websymbols icon-th-large"></i><i class="ff-font-websymbols icon-th"></i><i class="ff-font-websymbols icon-th-list"></i><i class="ff-font-websymbols icon-ok"></i><i class="ff-font-websymbols icon-ok-circle"></i><i class="ff-font-websymbols icon-cancel"></i><i class="ff-font-websymbols icon-cancel-circle"></i><i class="ff-font-websymbols icon-plus-circle"></i><i class="ff-font-websymbols icon-minus-circle"></i><i class="ff-font-websymbols icon-link"></i><i class="ff-font-websymbols icon-attach"></i><i class="ff-font-websymbols icon-lock"></i>',
					'zocial'      => '<i class="ff-font-zocial icon-duckduckgo"></i><i class="ff-font-zocial icon-aim"></i><i class="ff-font-zocial icon-delicious"></i><i class="ff-font-zocial icon-paypal"></i><i class="ff-font-zocial icon-flattr"></i><i class="ff-font-zocial icon-android"></i><i class="ff-font-zocial icon-eventful"></i><i class="ff-font-zocial icon-smashmag"></i><i class="ff-font-zocial icon-gplus"></i><i class="ff-font-zocial icon-wikipedia"></i><i class="ff-font-zocial icon-lanyrd"></i><i class="ff-font-zocial icon-calendar"></i><i class="ff-font-zocial icon-stumbleupon"></i><i class="ff-font-zocial icon-fivehundredpx"></i><i class="ff-font-zocial icon-pinterest"></i><i class="ff-font-zocial icon-bitcoin"></i><i class="ff-font-zocial icon-w3c"></i><i class="ff-font-zocial icon-foursquare"></i><i class="ff-font-zocial icon-html5"></i><i class="ff-font-zocial icon-ie"></i>',
				);

				// Options
				foreach ($iconfont_examples as $name => $path) {
					$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', ucfirst($name));
						$s->addOption( ffOneOption::TYPE_CHECKBOX, str_replace(' ', '_', $name), 'Enable font '.ucfirst($name), 0);
						$s->addElement( ffOneElement::TYPE_NEW_LINE );
						$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', $iconfont_examples[ $name ] );
					$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );
				}

			$s->addElement( ffOneElement::TYPE_TABLE_END );

		$s->endSection();


////////////////////////////////////////////////////////////////////////////////
// PORTFOLIO
////////////////////////////////////////////////////////////////////////////////


		$s->addElement( ffOneElement::TYPE_HTML, 'TYPE_HTML', '</div><div class="ff-theme-mix-admin-tab-portfolio ff-theme-mix-admin-tab-content">' );

		$s->startSection('portfolio');
			$s->addElement( ffOneElement::TYPE_HEADING, '', 'Portfolio Slugs' );

			$s->addElement( ffOneElement::TYPE_TABLE_START );

				$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Portfolio post');
					$s->addOption( ffOneOption::TYPE_TEXT, 'portfolio_slug', 'Slug', 'ff-portfolio');
				$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

				$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Portfolio Category');
					$s->addOption( ffOneOption::TYPE_TEXT, 'portfolio_category_slug', 'Slug', 'ff-portfolio-category');
				$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

				$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Portfolio Tag');
					$s->addOption( ffOneOption::TYPE_TEXT, 'portfolio_tag_slug', 'Slug', 'ff-portfolio-tag');
				$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

			$s->addElement( ffOneElement::TYPE_TABLE_END );
		$s->endSection();


////////////////////////////////////////////////////////////////////////////////
// TRANSLATION
////////////////////////////////////////////////////////////////////////////////



		$s->addElement( ffOneElement::TYPE_HTML, 'TYPE_HTML', '</div><div class="ff-theme-mix-admin-tab-translations ff-theme-mix-admin-tab-content">' );
		$s->startSection('translation');


			$s->addElement( ffOneElement::TYPE_HEADING, '', 'Translations' );

			$s->addElement( ffOneElement::TYPE_TABLE_START );

				$s->startSection('portfolio');
				$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Portfolio');


					$s->addOption(ffOneOption::TYPE_TEXT, 'similar-projects', 'Similar Projects', 'Similar Projects');
					$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );
				$s->endSection();


				$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Search');

					$s->addOption( ffOneOption::TYPE_TEXT, 'Search_widget_input_text', 'Search...', 'Search...');
					$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', 'Placeholder in search form in search widget');
					$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );
			$s->addElement( ffOneElement::TYPE_TABLE_END );

	        $s->addElement(ffOneElement::TYPE_HEADING,'','Page comments settings');

			$s->addElement( ffOneElement::TYPE_TABLE_START );
				$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Comments List');
					$s->startSection('comments-list');
						ff_load_section_options( '/templates/onePage/blocks/comments-list-block.php', $s);
					$s->endSection();
				$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

				$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Comments Form');
					ff_load_section_options( '/templates/onePage/blocks/comments-form-block.php', $s);
				$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

			$s->addElement( ffOneElement::TYPE_TABLE_END );

		$s->endSection();
		$s->addElement( ffOneElement::TYPE_HTML, 'TYPE_HTML', '</div>' );

			$s->addElement( ffOneElement::TYPE_NEW_LINE );
			$s->addElement( ffOneElement::TYPE_BUTTON_PRIMARY, 'Save', 'Save Changes' );

		$s->endSection();

		return $s;
	}

}










