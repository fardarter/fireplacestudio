<?php
################################################################################
# CALL TO ACTION START
################################################################################

$s->startSection('call-to-action', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Call to Action')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Common')
	->addParam('advanced-picker-menu-id', 'common')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('call-to-action'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('call-to-action').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/section-background-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Call to Action');

			$s->addOption( ffOneOption::TYPE_TEXTAREA, 'title', 'Title', 'Build Your Outstanding Website with Casanova');
			$s->addElement( ffOneElement::TYPE_NEW_LINE );

			$s->addOption( ffOneOption::TYPE_TEXTAREA, 'description', 'Description', 'Lorem ipsum veniam adipisicing cupidatat dolor do adipisicing commodo');
			$s->addElement( ffOneElement::TYPE_NEW_LINE );


			$s->startSection('buttons', ffOneSection::TYPE_REPEATABLE_VARIABLE );
				$s->startSection( 'one-button', ffOneSection::TYPE_REPEATABLE_VARIATION )->addParam('section-name', 'One Button');

					$s->addElement( ffOneElement::TYPE_TABLE_START );
					ff_load_section_options( '/templates/onePage/blocks/button-block.php', $s);
					$s->addElement( ffOneElement::TYPE_TABLE_END );

				$s->endSection();
			$s->endSection();

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# CALL TO ACTION END
################################################################################
