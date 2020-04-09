<?php
################################################################################
# FACTS START
################################################################################

$s->startSection('facts', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Facts')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Common')
	->addParam('advanced-picker-menu-id', 'common')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('facts'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('facts').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/section-background-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/small-heading-block.php', $s);


		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Facts');

			$s->startSection('facts', ffOneSection::TYPE_REPEATABLE_VARIABLE );
				$s->startSection( 'one-service', ffOneSection::TYPE_REPEATABLE_VARIATION )->addParam('section-name', 'One Service');

				$s->addOption( ffOneOption::TYPE_TEXT, 'number', 'Number', '12,457');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_ICON, 'icon', '', '');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXT, 'title', 'Title', 'TOTAL PROJECTS')
					->addParam('class', 'edit-repeatable-item-title');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->endSection();
			$s->endSection();

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# FACTS END
################################################################################
