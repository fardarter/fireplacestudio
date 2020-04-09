<?php

$s->startSection('social-links', ffOneSection::TYPE_REPEATABLE_VARIABLE );
	$s->startSection( 'link', ffOneSection::TYPE_REPEATABLE_VARIATION )->addParam('section-name', 'Social Link Button');

		$s->addOption( ffOneOption::TYPE_ICON, 'icon', '', 'ff-font-awesome4 icon-facebook');
		$s->addElement( ffOneElement::TYPE_NEW_LINE );
		$s->addElement( ffOneElement::TYPE_NEW_LINE );

		ff_load_section_options(
			'/templates/onePage/attrs/color-attr.php',
			$s, array(
				'name' => 'color'
				, 'title' => 'Color'
				, 'default' => ''
		));
		$s->addElement( ffOneElement::TYPE_NEW_LINE );

		$s->addOption( ffOneOption::TYPE_SELECT, 'shape', 'Shape', 'circle')
				->addSelectValue( 'No Shape, just icon' , '' )
				->addSelectValue( 'Circle' , 'circle' )
				->addSelectValue( 'Square' , 'square' )
			;
		$s->addElement( ffOneElement::TYPE_NEW_LINE );

		$s->addOption( ffOneOption::TYPE_CHECKBOX, 'show-tooltip', 'Show Tooltip&nbsp;', 1);
		$s->addOption( ffOneOption::TYPE_TEXT, 'title', 'Text', 'Find us on Facebook')
			->addParam('class', 'edit-repeatable-item-title');
		$s->addElement( ffOneElement::TYPE_NEW_LINE );

		$s->addOption( ffOneOption::TYPE_TEXT, 'url', 'URL', '//www.facebook.com/freshfacethemes');
		$s->addElement( ffOneElement::TYPE_NEW_LINE );

		$s->addOption(ffOneOption::TYPE_SELECT, 'target', 'Open in', '_blank')
			->addSelectValue('Same Window', '')
			->addSelectValue('New Window', '_blank')
		;

	$s->endSection();
$s->endSection();