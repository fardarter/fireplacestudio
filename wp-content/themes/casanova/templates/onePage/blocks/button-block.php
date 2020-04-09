<?php
$s->startSection('button');
	$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Button Link');

		$s->addOption( ffOneOption::TYPE_TEXT, 'title', 'Title', 'Learn More &rarr;');
		$s->addElement( ffOneElement::TYPE_NEW_LINE );

		$s->addOption( ffOneOption::TYPE_TEXT, 'url', 'URL', '#');
		$s->addElement( ffOneElement::TYPE_NEW_LINE );

		$s->addOption(ffOneOption::TYPE_SELECT, 'target', 'Open in', '_blank')
			->addSelectValue('Same Window', '')
			->addSelectValue('New Window', '_blank')
		;

	$s->addElement( ffOneElement::TYPE_TABLE_DATA_END);

	$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Button Style');

		$s->addOption( ffOneOption::TYPE_CHECKBOX, 'use-style', 'Use button style', 1);
		$s->addElement( ffOneElement::TYPE_NEW_LINE );

		$s->addOption( ffOneOption::TYPE_CHECKBOX, 'use-icon', 'Use icon &nbsp; ', 0);
		$s->addOption( ffOneOption::TYPE_ICON, 'icon', '', '');
		$s->addElement( ffOneElement::TYPE_NEW_LINE );

		ff_load_section_options(
			'/templates/onePage/attrs/color-attr.php',
			$s, array(
				'name' => 'color'
				, 'title' => 'Color'
				, 'default' => ''
		));

		$s->addElement( ffOneElement::TYPE_NEW_LINE );

		$s->addOption(ffOneOption::TYPE_SELECT, 'size', 'Size', '')
			->addSelectValue('Small', 'small')
			->addSelectValue('Default', '')
			->addSelectValue('Medium', 'medium')
			->addSelectValue('Large', 'large')
		;
		$s->addElement( ffOneElement::TYPE_NEW_LINE );

		$s->addOption( ffOneOption::TYPE_CHECKBOX, 'use-rounded-corners', 'Use rounded corners', 0);

	$s->addElement( ffOneElement::TYPE_TABLE_DATA_END);
$s->endSection();







