<?php
################################################################################
# NAVIGATION START
################################################################################

$s->startSection('navigation', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Header - Logo, Menu, Social Icons')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Header')
	->addParam('advanced-picker-menu-id', 'header')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('navigation'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('navigation').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/section-background-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'General');

			$s->addOption( ffOneOption::TYPE_NAVIGATION_MENU_SELECTOR, 'navigation-menu-id', 'Navigation Menu');

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Header Logo');
			$s->startSection('logo');

				$s->addOption( ffOneOption::TYPE_IMAGE, 'image', 'Logo Image' );
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->addOption( ffOneOption::TYPE_CHECKBOX, 'image_is_retina', 'Image is retina');

			$s->endSection();

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Header Compact Social Links');

			ff_load_section_options( '/templates/onePage/blocks/social-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# NAVIGATION END
################################################################################
