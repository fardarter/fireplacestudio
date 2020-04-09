<?php
################################################################################
# TEXT WITH LEFT ICON START
################################################################################

$s->startSection('text-left-icon', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Text blocks with icon on LEFT')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Common')
	->addParam('advanced-picker-menu-id', 'common')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('text-left-icon'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('text-left-icon').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/section-background-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/small-heading-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Text blocks with icon on left');

			$s->startSection('text-left-icon', ffOneSection::TYPE_REPEATABLE_VARIABLE );
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
# TEXT WITH LEFT ICON END
################################################################################
