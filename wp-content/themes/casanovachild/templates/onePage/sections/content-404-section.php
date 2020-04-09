<?php
################################################################################
# PRICING TABLE START
################################################################################

$s->startSection('content-404', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Page 404 Content')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Special')
	->addParam('advanced-picker-menu-id', 'special')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('content-404'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('content-404').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/section-background-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Pricing Tables');

			$s->addOption( ffOneOption::TYPE_SELECT, 'text-align', 'Heading align', 'text-center')
					->addSelectValue('Left', '')
					->addSelectValue('Center', 'text-center')
					->addSelectValue('Right', 'text-right')
					->addSelectValue('Justify', 'text-justify');
			$s->addElement( ffOneElement::TYPE_NEW_LINE );
			$s->addElement( ffOneElement::TYPE_NEW_LINE );

			$s->addOption( ffOneOption::TYPE_CHECKBOX, 'show-icon', 'Show Icon &nbsp; ', 1);
			$s->addElement( ffOneElement::TYPE_NEW_LINE );

			ff_load_section_options(
				'/templates/onePage/attrs/color-attr.php',
				$s, array(
					'name' => 'icon-color'
					, 'title' => 'Color'
					, 'default' => 'primary'
			));
			$s->addElement( ffOneElement::TYPE_NEW_LINE );
			$s->addOption( ffOneOption::TYPE_ICON, 'icon', '', 'ff-font-awesome4 icon-exclamation');
			$s->addElement( ffOneElement::TYPE_NEW_LINE );
			$s->addElement( ffOneElement::TYPE_NEW_LINE );

			$s->addOption( ffOneOption::TYPE_CHECKBOX, 'show-title', 'Show Title &nbsp; ', 1);
			$s->addOption( ffOneOption::TYPE_TEXT, 'title', '', 'Not Found');
			$s->addElement( ffOneElement::TYPE_NEW_LINE );
			$s->addElement( ffOneElement::TYPE_NEW_LINE );

			$s->addOption( ffOneOption::TYPE_CHECKBOX, 'show-description', 'Show Description', 1);
			$s->addElement( ffOneElement::TYPE_NEW_LINE );
			$s->addOption( ffOneOption::TYPE_TEXTAREA, 'description', '', 'The page you are looking for might have been removed or is temporary unavailable.');
			$s->addElement( ffOneElement::TYPE_NEW_LINE );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# PRICING TABLE END
################################################################################
