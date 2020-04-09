<?php
################################################################################
# TEAM START
################################################################################

$s->startSection('team', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Team')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Common')
	->addParam('advanced-picker-menu-id', 'common')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('team'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('team').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/section-background-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/small-heading-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Team');

			$s->startSection('team', ffOneSection::TYPE_REPEATABLE_VARIABLE );
				$s->startSection( 'member', ffOneSection::TYPE_REPEATABLE_VARIATION )->addParam('section-name', 'Member');

				$s->addOption( ffOneOption::TYPE_IMAGE, 'image', 'Image', '');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_ICON, 'icon', '', '');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXT, 'link', 'Link on image', '#');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXT, 'title', 'Title', 'John Doe')
					->addParam('class', 'edit-repeatable-item-title');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXT,'description', 'Description', 'The Founder' );
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->endSection();
			$s->endSection();

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# TEAM END
################################################################################
