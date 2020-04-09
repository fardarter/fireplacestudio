<?php
################################################################################
# INTRODUCTION START
################################################################################

$s->startSection('introduction', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Introduction')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Common')
	->addParam('advanced-picker-menu-id', 'common')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('introduction'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('introduction').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/section-background-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Image');
			$s->startSection('image');
				$s->addOption( ffOneOption::TYPE_SELECT, 'position', 'Position', 'left')
					->addSelectValue('Do not show', '')
					->addSelectValue('Left', 'left')
					->addSelectValue('Right', 'right')
				;
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_SELECT, 'grid-size', 'Image Grid Width', '20')
					->addSelectNumberRange( 10, 24 )
				;
				$s->addElement( ffOneElement::TYPE_HTML, '', ' / 36' );

				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_IMAGE, 'image', 'Image');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_CHECKBOX, 'resize', 'Resize Image to ', 0);
				$s->addOption( ffOneOption::TYPE_TEXT, 'width', ': width', 570);
				$s->addOption( ffOneOption::TYPE_TEXT, 'height', ', height', 366);
			$s->endSection();
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		$s->startSection('heading');
			$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Heading');

				$s->addOption( ffOneOption::TYPE_SELECT, 'text-align', 'Heading align', 'text-center')
						->addSelectValue('Left', '')
						->addSelectValue('Center', 'text-center')
						->addSelectValue('Right', 'text-right')
						->addSelectValue('Justify', 'text-justify');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_CHECKBOX, 'show-title', 'Show Title &nbsp; ', 1);
				$s->addOption( ffOneOption::TYPE_TEXT, 'title', '', 'The Industry Leader');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_CHECKBOX, 'show-description', 'Show Description', 1);
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_SELECT, 'description-style', 'Description style', '')
						->addSelectValue('Smaller', '')
						->addSelectValue('Bigger', 'lead');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXTAREA, 'description', '', 'Exercitation officia voluptate in ex irure consectetur Duis Ut exercitation sint laboris cupidatat Duis incididunt nulla officia irure proident sint labore et laboris dolor deserunt laboris amet ex pariatur.');

			$s->addElement( ffOneElement::TYPE_TABLE_DATA_END);
		$s->endSection();

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Texts with Icon');
			$s->startSection('text-left-icon', ffOneSection::TYPE_REPEATABLE_VARIABLE );
				$s->startSection( 'one-block', ffOneSection::TYPE_REPEATABLE_VARIATION );
					ff_load_section_options( '/templates/onePage/blocks/text-with-icon-block.php', $s);
				$s->endSection();
			$s->endSection();
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# INTRODUCTION END
################################################################################
