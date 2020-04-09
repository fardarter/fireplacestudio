<?php
################################################################################
# FACTS START
################################################################################

$s->startSection('quotes', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Quotes')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Common')
	->addParam('advanced-picker-menu-id', 'common')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('quotes'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('quotes').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/section-background-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/small-heading-block.php', $s);


		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Quotes');

			$s->startSection('quotes', ffOneSection::TYPE_REPEATABLE_VARIABLE );
				$s->startSection( 'one-quote', ffOneSection::TYPE_REPEATABLE_VARIATION )->addParam('section-name', 'One Quote');


				$quoteText = 'Design can be art. Design can be aesthetics. Design is so</br> simple, thats why it is so complicated.';
				$s->addOption( ffOneOption::TYPE_TEXTAREA, 'text', 'Text', $quoteText);
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXT, 'author', 'Author', 'Paul Rand');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXT, 'position', 'Position', 'Expert Designer');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->endSection();
			$s->endSection();

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# FACTS END
################################################################################
