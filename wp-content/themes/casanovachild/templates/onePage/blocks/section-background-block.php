<?php

$s->startSection('section-background');
	$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Background');

		$s->addOption( ffOneOption::TYPE_CHECKBOX, 'show', 'Show', 0);
		$s->addElement( ffOneElement::TYPE_NEW_LINE );
		$s->addElement( ffOneElement::TYPE_NEW_LINE );

		$s->startSection('backgrounds', ffOneSection::TYPE_REPEATABLE_VARIABLE );

			$s->startSection( 'background-color', ffOneSection::TYPE_REPEATABLE_VARIATION )
					->addParam('section-name', 'Background Color')
					->addParam('hide-default', false);


				$s->addElement( ffOneElement::TYPE_TABLE_START );

					$s->addOption( ffOneOption::TYPE_TEXT, 'color', '', '#FFFFFF')
						->addParam('class', 'ff-default-wp-color-picker');

					$s->addElement( ffOneElement::TYPE_NEW_LINE );

					$opt= $s->addOption( ffOneOption::TYPE_SELECT, 'opacity', 'Opacity', '');
					$opt->addSelectValue('Transparent (invisible)', '0');
					$opt->addSelectValue('10%', '1');
					$opt->addSelectValue('20%', '2');
					$opt->addSelectValue('30%', '3');
					$opt->addSelectValue('40%', '4');
					$opt->addSelectValue('50%', '5');
					$opt->addSelectValue('60%', '6');
					$opt->addSelectValue('70%', '7');
					$opt->addSelectValue('80%', '8');
					$opt->addSelectValue('90%', '9');
					$opt->addSelectValue('No transparency', '');

				$s->addElement( ffOneElement::TYPE_TABLE_END );
			$s->endSection();

			$s->startSection( 'background-image', ffOneSection::TYPE_REPEATABLE_VARIATION )
					->addParam('section-name', 'Background Image')
					->addParam('hide-default', true);


				$s->addElement( ffOneElement::TYPE_TABLE_START );

					$s->addOption( ffOneOption::TYPE_IMAGE, 'image', 'Image');
					$s->addElement( ffOneElement::TYPE_NEW_LINE );

					$s->addOption( ffOneOption::TYPE_SELECT, 'fixed', 'Background attachment', '')
						->addSelectValue('Normal', '')
						->addSelectValue('Fixed background', '1');
					$s->addElement( ffOneElement::TYPE_NEW_LINE );

					$opt= $s->addOption( ffOneOption::TYPE_SELECT, 'opacity', 'Opacity', '');
					$opt->addSelectValue('Transparent (invisible)', '0');
					$opt->addSelectValue('10%', '1');
					$opt->addSelectValue('20%', '2');
					$opt->addSelectValue('30%', '3');
					$opt->addSelectValue('40%', '4');
					$opt->addSelectValue('50%', '5');
					$opt->addSelectValue('60%', '6');
					$opt->addSelectValue('70%', '7');
					$opt->addSelectValue('80%', '8');
					$opt->addSelectValue('90%', '9');
					$opt->addSelectValue('No transparency', '');

				$s->addElement( ffOneElement::TYPE_TABLE_END );
			$s->endSection();

			$s->startSection( 'background-pattern', ffOneSection::TYPE_REPEATABLE_VARIATION )
					->addParam('section-name', 'Background Pattern Image')
					->addParam('hide-default', true);


				$s->addElement( ffOneElement::TYPE_TABLE_START );

					$s->addOption( ffOneOption::TYPE_IMAGE, 'image', 'Pattern Image');
					$s->addElement( ffOneElement::TYPE_NEW_LINE );

					$s->addOption( ffOneOption::TYPE_SELECT, 'fixed', 'Background attachment', '')
						->addSelectValue('Normal', '')
						->addSelectValue('Fixed background', '1');
					$s->addElement( ffOneElement::TYPE_NEW_LINE );

					$opt= $s->addOption( ffOneOption::TYPE_SELECT, 'opacity', 'Opacity', '');
					$opt->addSelectValue('Transparent (invisible)', '0');
					$opt->addSelectValue('10%', '1');
					$opt->addSelectValue('20%', '2');
					$opt->addSelectValue('30%', '3');
					$opt->addSelectValue('40%', '4');
					$opt->addSelectValue('50%', '5');
					$opt->addSelectValue('60%', '6');
					$opt->addSelectValue('70%', '7');
					$opt->addSelectValue('80%', '8');
					$opt->addSelectValue('90%', '9');
					$opt->addSelectValue('No transparency', '');

				$s->addElement( ffOneElement::TYPE_TABLE_END );
			$s->endSection();

			$s->startSection( 'background-pattern-predefined', ffOneSection::TYPE_REPEATABLE_VARIATION )
					->addParam('section-name', 'Background Pattern Predefined')
					->addParam('hide-default', true);


				$s->addElement( ffOneElement::TYPE_TABLE_START );

					$s->addOption( ffOneOption::TYPE_SELECT, 'class', 'Background attachment', 'section-pattern dot')
						->addSelectValue('Dots', 'section-pattern dot')
						->addSelectValue('Stripes', 'section-pattern stripe');
					$s->addElement( ffOneElement::TYPE_NEW_LINE );

					$s->addOption( ffOneOption::TYPE_SELECT, 'fixed', 'Background attachment', '')
						->addSelectValue('Normal', '')
						->addSelectValue('Fixed background', '1');
					$s->addElement( ffOneElement::TYPE_NEW_LINE );

					$opt= $s->addOption( ffOneOption::TYPE_SELECT, 'opacity', 'Opacity', '');
					$opt->addSelectValue('Transparent (invisible)', '0');
					$opt->addSelectValue('10%', '1');
					$opt->addSelectValue('20%', '2');
					$opt->addSelectValue('30%', '3');
					$opt->addSelectValue('40%', '4');
					$opt->addSelectValue('50%', '5');
					$opt->addSelectValue('60%', '6');
					$opt->addSelectValue('70%', '7');
					$opt->addSelectValue('80%', '8');
					$opt->addSelectValue('90%', '9');
					$opt->addSelectValue('No transparency', '');

				$s->addElement( ffOneElement::TYPE_TABLE_END );
			$s->endSection();

			$s->startSection( 'background-youtube-video', ffOneSection::TYPE_REPEATABLE_VARIATION )
					->addParam('section-name', 'Background YouTube Video')
					->addParam('hide-default', true);


				$s->addElement( ffOneElement::TYPE_TABLE_START );

					$s->addOption( ffOneOption::TYPE_TEXT, 'url', 'URL', '');
					$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', 'In format: <code>https://www.youtube.com/watch?v=L83cTan6ESk</code>');
					$s->addElement( ffOneElement::TYPE_NEW_LINE );

					$opt= $s->addOption( ffOneOption::TYPE_SELECT, 'opacity', 'Opacity', '');
					$opt->addSelectValue('Transparent (invisible)', '0');
					$opt->addSelectValue('10%', '1');
					$opt->addSelectValue('20%', '2');
					$opt->addSelectValue('30%', '3');
					$opt->addSelectValue('40%', '4');
					$opt->addSelectValue('50%', '5');
					$opt->addSelectValue('60%', '6');
					$opt->addSelectValue('70%', '7');
					$opt->addSelectValue('80%', '8');
					$opt->addSelectValue('90%', '9');
					$opt->addSelectValue('No transparency', '');

				$s->addElement( ffOneElement::TYPE_TABLE_END );
			$s->endSection();

			$s->startSection( 'background-url-video', ffOneSection::TYPE_REPEATABLE_VARIATION )
					->addParam('section-name', 'Background Video from URL')
					->addParam('hide-default', true);


				$s->addElement( ffOneElement::TYPE_TABLE_START );

					$s->addOption( ffOneOption::TYPE_TEXT, 'mp4', 'MP4 Url', '' );
					$s->addElement( ffOneElement::TYPE_NEW_LINE );
					$s->addOption( ffOneOption::TYPE_TEXT, 'webm','WEBM Url','' );
					$s->addElement( ffOneElement::TYPE_NEW_LINE );
					$s->addOption( ffOneOption::TYPE_TEXT, 'ogg', 'OGV Url', '' );
					$s->addElement( ffOneElement::TYPE_NEW_LINE );

					$opt= $s->addOption( ffOneOption::TYPE_SELECT, 'opacity', 'Opacity', '');
					$opt->addSelectValue('Transparent (invisible)', '0');
					$opt->addSelectValue('10%', '1');
					$opt->addSelectValue('20%', '2');
					$opt->addSelectValue('30%', '3');
					$opt->addSelectValue('40%', '4');
					$opt->addSelectValue('50%', '5');
					$opt->addSelectValue('60%', '6');
					$opt->addSelectValue('70%', '7');
					$opt->addSelectValue('80%', '8');
					$opt->addSelectValue('90%', '9');
					$opt->addSelectValue('No transparency', '');

				$s->addElement( ffOneElement::TYPE_TABLE_END );
			$s->endSection();

		$s->endSection();

	$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );
$s->endSection();
