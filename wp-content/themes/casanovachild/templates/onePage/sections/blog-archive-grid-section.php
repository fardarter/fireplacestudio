<?php
################################################################################
# BLOG ARCHIVE GRID START
################################################################################

$s->startSection('blog-archive-grid', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Blog Archive Grid')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Blog &amp; Portfolio')
	->addParam('advanced-picker-menu-id', 'archives')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('blog-archive-grid'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('blog-archive-grid').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);


		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'General');
			$s->startSection( 'general' );
				$s->addOption( ffOneOption::TYPE_SELECT, 'sidebar-position', 'Sidebar position', 'right')
					->addSelectValue( 'Right', 'right')
					->addSelectValue( 'Fullwidth', 'fullwidth')
					->addSelectValue( 'Left', 'left')
					;
				$s->addElement( ffOneElement::TYPE_NEW_LINE);
				$s->addOption( ffOneOption::TYPE_SELECT, 'number-of-columns', 'Number of columns', 2 )
					->addSelectValue('1',1)
					->addSelectValue('2',2)
					->addSelectValue('3',3)
					->addSelectValue('4',4)
					->addSelectValue('5',5)
					->addSelectValue('6',6)
					->addSelectValue('7',7)
					->addSelectValue('8',8)
					;

				$s->addElement( ffOneElement::TYPE_NEW_LINE);

				$s->addOption( ffOneOption::TYPE_TEXT, 'posts-per-page', 'Posts per page (leave 0 for no limitation)','0');
				$s->addElement( ffOneElement::TYPE_NEW_LINE);
				$s->addOption( ffOneOption::TYPE_CHECKBOX,'show-pagination', 'Show Pagination',1);
				$s->addElement( ffOneElement::TYPE_NEW_LINE);

			$s->endSection();
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Post settings');
			$s->startSection( 'post' );

				$s->startSection('featured-image');
					$s->addOption( ffOneOption::TYPE_CHECKBOX,'show', 'Show Featured Image',1);
					$s->addElement( ffOneElement::TYPE_NEW_LINE);

					$s->addOption( ffOneOption::TYPE_TEXT,'width', 'Featured Image width',0);
					$s->addElement( ffOneElement::TYPE_NEW_LINE);

					$s->addOption( ffOneOption::TYPE_TEXT,'height', 'Featured Image height',0);
					$s->addElement( ffOneElement::TYPE_NEW_LINE);
				$s->endSection();

				$s->startSection('date');
					$s->addOption( ffOneOption::TYPE_CHECKBOX,'show', 'Show date',1);
					$s->addElement( ffOneElement::TYPE_NEW_LINE);

					$s->addOption( ffOneOption::TYPE_TEXT,'format', 'Date format','F j, Y');
					$s->addElement( ffOneElement::TYPE_NEW_LINE);
				$s->endSection();

				$s->startSection('footer');
					$s->addOption( ffOneOption::TYPE_CHECKBOX,'show', 'Show Footer (Author and Comments number)',1);
					$s->addElement( ffOneElement::TYPE_NEW_LINE);
				$s->endSection();

				$s->addElement( ffOneElement::TYPE_NEW_LINE);

				$s->addOption( ffOneOption::TYPE_TEXT, 'posts-per-page', 'Posts per page (leave 0 for no limitation)','0');
			$s->endSection();
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Pagination');
			ff_load_section_options( '/templates/onePage/blocks/pagination-block.php', $s);
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# BLOG ARCHIVE GRID END
################################################################################
