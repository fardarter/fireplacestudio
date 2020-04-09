<?php
################################################################################
# TEASER START
################################################################################

$s->startSection('teaser', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Teaser')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Common')
	->addParam('advanced-picker-menu-id', 'common')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('teaser'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('teaser').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/section-background-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Big image');

			$s->addOption( ffOneOption::TYPE_SELECT, 'image-position', 'Image position', 'left')
					->addSelectValue('Do not show', '')
					->addSelectValue('Left', 'left')
					->addSelectValue('Right', 'right');
			$s->addElement( ffOneElement::TYPE_NEW_LINE );
			$s->addOption( ffOneOption::TYPE_IMAGE, 'image', 'Image');

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/small-heading-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Features');

			$s->addOption( ffOneOption::TYPE_CHECKBOX, 'show-features', 'Show', 1);

			$s->startSection('features-cols', ffOneSection::TYPE_REPEATABLE_VARIABLE );
				$s->startSection( 'one-feature-col', ffOneSection::TYPE_REPEATABLE_VARIATION )->addParam('section-name', 'Column');

					$s->startSection('features-rows', ffOneSection::TYPE_REPEATABLE_VARIABLE );
						$s->startSection( 'one-feature-row', ffOneSection::TYPE_REPEATABLE_VARIATION )->addParam('section-name', 'One Feature');

							$s->addOption( ffOneOption::TYPE_ICON, 'icon', '', 'ff-font-awesome4 icon-dot-circle-o');
							$s->addElement( ffOneElement::TYPE_NEW_LINE );
							$s->addOption( ffOneOption::TYPE_TEXT, 'title', 'Title', 'Fully Responsive Layout')
								->addParam('class', 'edit-repeatable-item-title');

						$s->endSection();
					$s->endSection();

				$s->endSection();
			$s->endSection();

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Notes');

			$s->addOption( ffOneOption::TYPE_CHECKBOX, 'show-notes', 'Show', 1);

			$s->startSection('notes', ffOneSection::TYPE_REPEATABLE_VARIABLE );
				$s->startSection( 'one-note', ffOneSection::TYPE_REPEATABLE_VARIATION )->addParam('section-name', 'One Note');
					$s->addOption( ffOneOption::TYPE_TEXTAREA, 'title', 'Title', '<small><span style="color:red">*</span> Lorem ipsum In id magna esse veniam.</small>');
				$s->endSection();
			$s->endSection();

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/buttons-block.php', $s);

	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# TEASER END
################################################################################
