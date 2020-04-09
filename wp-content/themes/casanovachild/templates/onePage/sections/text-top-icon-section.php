<?php
################################################################################
# TEXT WITH ICON ON TOP START
################################################################################

$s->startSection('text-top-icon', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Text blocks with icon on TOP')
	->addParam('hide-default', false)

	->addParam('advanced-picker-menu-title', 'Common')
	->addParam('advanced-picker-menu-id', 'common')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('text-top-icon'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('text-top-icon').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/section-background-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/small-heading-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Text blocks with icon on top');

			$s->startSection('text-top-icon', ffOneSection::TYPE_REPEATABLE_VARIABLE );
				$s->startSection( 'one-row', ffOneSection::TYPE_REPEATABLE_VARIATION )->addParam('section-name', 'One Row');

					$s->startSection('one-row', ffOneSection::TYPE_REPEATABLE_VARIABLE );
						$s->startSection( 'one-block', ffOneSection::TYPE_REPEATABLE_VARIATION )->addParam('section-name', 'One Block');

							ff_load_section_options( '/templates/onePage/blocks/text-with-icon-block.php', $s);

						$s->endSection();
					$s->endSection();

				$s->endSection();
			$s->endSection();

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# TEXT WITH ICON ON TOP END
################################################################################
