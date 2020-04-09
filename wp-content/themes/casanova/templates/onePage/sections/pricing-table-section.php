<?php
################################################################################
# PRICING TABLE START
################################################################################

$s->startSection('pricing-table', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Pricing Table')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Common')
	->addParam('advanced-picker-menu-id', 'common')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('pricing-table'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('pricing-table').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/section-background-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/small-heading-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Pricing Tables');

			$s->startSection('pricing-tables', ffOneSection::TYPE_REPEATABLE_VARIABLE );
				$s->startSection( 'one-table', ffOneSection::TYPE_REPEATABLE_VARIATION )->addParam('section-name', 'One Table');
					$s->addElement( ffOneElement::TYPE_TABLE_START );

						$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Settings');

							$s->addOption( ffOneOption::TYPE_TEXT, 'title', 'Title', 'Basic Plan');
							$s->addElement( ffOneElement::TYPE_NEW_LINE );

							$s->addOption( ffOneOption::TYPE_CHECKBOX, 'recommended', 'Recommended', 0);
							$s->addElement( ffOneElement::TYPE_NEW_LINE );

							$s->addOption( ffOneOption::TYPE_TEXT, 'price', 'Price', '&euro;15<sup>00</sup>');
							$s->addElement( ffOneElement::TYPE_NEW_LINE );

							$s->startSection('lines', ffOneSection::TYPE_REPEATABLE_VARIABLE );
								$s->startSection( 'line', ffOneSection::TYPE_REPEATABLE_VARIATION )->addParam('section-name', 'One Line');
									$s->addOption( ffOneOption::TYPE_TEXT, 'text', 'Text', '<strong>5</strong> Users');
								$s->endSection();
							$s->endSection();

						$s->addElement( ffOneElement::TYPE_TABLE_DATA_END);


						ff_load_section_options( '/templates/onePage/blocks/button-block.php', $s);


					$s->addElement( ffOneElement::TYPE_TABLE_END );

				$s->endSection();
			$s->endSection();

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# PRICING TABLE END
################################################################################
