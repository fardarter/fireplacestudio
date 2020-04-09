<?php
################################################################################
# CALL TO ACTION 2 START
################################################################################

$s->startSection('call-to-action-2', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Call to Action 2')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Common')
	->addParam('advanced-picker-menu-id', 'common')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('call-to-action-2'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('call-to-action-2').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/section-background-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Content');

			$s->addOption( ffOneOption::TYPE_TEXTAREA, 'title', 'Title', 'Need an Advanced Plan for High Usage?');
			$s->addElement( ffOneElement::TYPE_NEW_LINE );

			$s->addOption( ffOneOption::TYPE_TEXTAREA, 'description', 'Description', 'Lorem ipsum Dolor magna labore velit eu ex dolore velit ut velit quis.');
			$s->addElement( ffOneElement::TYPE_NEW_LINE );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/button-block.php', $s);



	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# CALL TO ACTION 2 END
################################################################################
