<?php
################################################################################
# FACTS START
################################################################################

$s->startSection('clients-1', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Clients 1')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Common')
	->addParam('advanced-picker-menu-id', 'common')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('clients-1'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('clients-1').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/section-background-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/small-heading-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Image dimensions');
			$s->startSection('image-dimensions');

				$s->addOption( ffOneOption::TYPE_CHECKBOX, 'resize-images', 'Resize images to these dimensions:', 0);
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXT, 'width', 'Width (in px)', 150);
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXT, 'height', 'Height (in px)', 50);
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

			$s->endSection();
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Clients');

			$s->startSection('clients', ffOneSection::TYPE_REPEATABLE_VARIABLE );
				$s->startSection( 'one-client', ffOneSection::TYPE_REPEATABLE_VARIATION )->addParam('section-name', 'One Client');

				$s->addOption( ffOneOption::TYPE_IMAGE, 'image', 'Image', '');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXT, 'tooltip', 'Tooltip', 'Client Name');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXT, 'link', 'Client URL', '#');

				$s->endSection();
			$s->endSection();

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# FACTS END
################################################################################
