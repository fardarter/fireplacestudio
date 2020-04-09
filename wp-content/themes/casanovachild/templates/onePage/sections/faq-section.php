<?php
################################################################################
# FAQ START
################################################################################

$s->startSection('faq', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'FAQ')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Common')
	->addParam('advanced-picker-menu-id', 'common')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('faq'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('faq').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/section-background-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Frequently Asked Questions');

			$s->startSection('accordeon', ffOneSection::TYPE_REPEATABLE_VARIABLE );
				$s->startSection( 'accordeon', ffOneSection::TYPE_REPEATABLE_VARIATION )->addParam('section-name', 'Accordeon item');

					$s->addOption( ffOneOption::TYPE_CHECKBOX, 'use-icon', 'Use icon &nbsp; ', 1);
					$s->addOption( ffOneOption::TYPE_ICON, 'icon', '', 'ff-font-awesome4 icon-question');
					$s->addElement( ffOneElement::TYPE_NEW_LINE );
					$s->addElement( ffOneElement::TYPE_NEW_LINE );

					$s->addOption( ffOneOption::TYPE_TEXT, 'title', 'Title', 'Deserunt consequat magna Ut est eu occaecat aute?')
						->addParam('class', 'edit-repeatable-item-title');
					$s->addElement( ffOneElement::TYPE_NEW_LINE );

					$s->addOption( ffOneOption::TYPE_TEXTAREA, 'description', 'Description',
						'Lorem ipsum Deserunt consequat magna Ut est eu occaecat aute in ut laborum nulla ullamco est'
						. ' incididunt esse nulla esse nulla cupidatat labore laboris aute exercitation in ullamco incididunt ut'
						. '  dolor consectetur in sint consequat pariatur do amet consequat adipisicing velit sed et laborum sit'
						. '  adipisicing tempor tempor magna pariatur eiusmod nisi officia in aliqua exercitation nulla labore do'
						. '  ut consequat incididunt ad incididunt laborum deserunt veniam et exercitation reprehenderit sint sed'
						. '  dolore in eu amet quis esse consequat incididunt Ut sed velit enim pariatur est cupidatat fugiat laborum quis cillum.');

				$s->endSection();
			$s->endSection();

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# FAQ END
################################################################################
