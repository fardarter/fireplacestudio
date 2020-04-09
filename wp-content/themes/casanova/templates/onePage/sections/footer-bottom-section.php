<?php
################################################################################
# FOOTER BOTTOM START
################################################################################

$s->startSection('footer-bottom', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Footer Bottom')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Footer')
	->addParam('advanced-picker-menu-id', 'footer')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('footer-bottom'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('footer-bottom').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/section-background-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'General');

			$s->addOption( ffOneOption::TYPE_CHECKBOX, 'show-text', 'Show left text', 1);
			$s->addElement( ffOneElement::TYPE_NEW_LINE );

			$s->addOption( ffOneOption::TYPE_TEXT, 'text', 'Left text', '&copy; Casanova');
			$s->addElement( ffOneElement::TYPE_NEW_LINE );

			$s->addOption( ffOneOption::TYPE_CHECKBOX, 'show-navigation', 'Show right navigation', 1);
			$s->addElement( ffOneElement::TYPE_NEW_LINE );

			$s->addOption( ffOneOption::TYPE_NAVIGATION_MENU_SELECTOR, 'navigation-menu-id', 'Navigation Menu');
			$s->addElement( ffOneElement::TYPE_NEW_LINE );


		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# FOOTER BOTTOM END
################################################################################
