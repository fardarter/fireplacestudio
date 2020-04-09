<?php
################################################################################
# DIVIDER START
################################################################################

$s->startSection('divider', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Divider')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Common')
	->addParam('advanced-picker-menu-id', 'common')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('divider'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('divider').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/section-background-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Divider');

		$s->addOption( ffOneOption::TYPE_SELECT, 'icon-position', 'Icon', '')
			->addSelectValue( 'Do not show' , '' )
			->addSelectValue( 'Left'   , 'text-left' )
			->addSelectValue( 'Center' , 'text-center' )
			->addSelectValue( 'Right'  , 'text-right' )
		;
		$s->addElement( ffOneElement::TYPE_NEW_LINE );
		$s->addOption( ffOneOption::TYPE_ICON, 'icon', '', '');
		$s->addElement( ffOneElement::TYPE_NEW_LINE );
		$s->addElement( ffOneElement::TYPE_NEW_LINE );

		$s->addOption( ffOneOption::TYPE_SELECT, 'type', 'Type', '')
			->addSelectValue( 'Normal' , '' )
			->addSelectValue( 'Double' , 'double' )
		;

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# DIVIDER END
################################################################################
