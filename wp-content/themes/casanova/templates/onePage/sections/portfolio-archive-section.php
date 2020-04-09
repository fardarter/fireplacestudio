<?php
################################################################################
# PORTFOLIO ARCHIVE START
################################################################################

$s->startSection('portfolio-archive', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Portfolio Archive')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Blog &amp; Portfolio')
	->addParam('advanced-picker-menu-id', 'archives')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('portfolio-archive'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('portfolio-archive').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/section-background-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/small-heading-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Portfolio');

			$s->addOption( ffOneOption::TYPE_SELECT, 'number-of-columns', 'Number of columns', 2 )
				->addSelectValue('2',2)
				->addSelectValue('3',3)
				->addSelectValue('4',4)
				;
			$s->addElement( ffOneElement::TYPE_NEW_LINE);

			$s->addOption( ffOneOption::TYPE_TEXT, 'posts-per-page', 'Posts per page','0');
			$s->addElement( ffOneElement::TYPE_HTML, '', '<span class="description">( leave 0 for no limitation )</span>' );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );


		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Tags');
			$s->addOption( ffOneOption::TYPE_CHECKBOX, 'show-tags', 'Show Tags', 1);
			$s->addElement( ffOneElement::TYPE_NEW_LINE);
			$s->addOption( ffOneOption::TYPE_TEXT, 'tags-all','All Tags','All');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );


	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# PORTFOLIO ARCHIVE END
################################################################################
