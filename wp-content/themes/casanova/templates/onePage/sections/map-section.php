<?php
################################################################################
# CONTACT MAP START
################################################################################

$s->startSection('map', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Map')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Contact')
	->addParam('advanced-picker-menu-id', 'contact')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('map'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('map').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Map');

				$s->addOption( ffOneOption::TYPE_CHECKBOX, 'fullwidth', 'Fullwidth', 1);
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXT, 'long', 'Longtitude', '107.60824');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->addOption( ffOneOption::TYPE_TEXT, 'lat', 'Latitude', '-6.91486');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->addOption( ffOneOption::TYPE_SELECT, 'zoom', 'Zoom', '12')
					->addSelectNumberRange(1,20)
					;
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# FACTS END
################################################################################
