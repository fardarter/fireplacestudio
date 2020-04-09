<?php
$s->startSection('section-settings');
	$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Section Options');

		$s->addOption( ffOneOption::TYPE_TEXT, 'id', 'Section ID ', '' );
		$s->addElement( ffOneElement::TYPE_HTML, '', ' <span class="description">Option is used for linking. Leave blank for no ID.</span>');
		$s->addElement( ffOneElement::TYPE_NEW_LINE );

		$s->addOption( ffOneOption::TYPE_SELECT, 'color-type', 'Color type', 'light')
			->addSelectValue('Light BG / Dark text', 'light')
			->addSelectValue('Dark BG / Light text', 'dark')
			;

	$s->addElement( ffOneElement::TYPE_TABLE_DATA_END);
$s->endSection();