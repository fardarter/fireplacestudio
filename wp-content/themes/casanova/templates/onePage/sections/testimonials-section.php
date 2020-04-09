<?php
################################################################################
# TESTIMONIALS START
################################################################################

$s->startSection('testimonials', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Testimonials')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Common')
	->addParam('advanced-picker-menu-id', 'common')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('testimonials'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('testimonials').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/section-background-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/small-heading-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Testimonials');

			$s->startSection('testimonials', ffOneSection::TYPE_REPEATABLE_VARIABLE );
				$s->startSection( 'one-testimonial', ffOneSection::TYPE_REPEATABLE_VARIATION )->addParam('section-name', 'One Testimonial');


				$quoteText = 'Lorem ipsum Quis et dolor sit veniam cupidatat non incididunt magna cupidatat id dolor esse et quis anim voluptate.';
				$s->addOption( ffOneOption::TYPE_TEXTAREA, 'text', 'Text', $quoteText);
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXT, 'author', 'Author', 'Michele Dunn');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXT, 'position', 'Position', 'Senior Designer');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->endSection();
			$s->endSection();

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# TESTIMONIALS END
################################################################################
