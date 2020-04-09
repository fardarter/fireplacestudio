<?php
################################################################################
# PAGE TITLE START
################################################################################

$s->startSection('page-heading', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Page Heading and Breadcrumbs')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Header')
	->addParam('advanced-picker-menu-id', 'header')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('page-heading'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('page-heading').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/section-background-block.php', $s);

		$s->startSection('translation');
			$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Translations');

				$s->addOption( ffOneOption::TYPE_TEXT, 'title-front-page', 'Front Page', get_bloginfo('name') );
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->addOption( ffOneOption::TYPE_TEXT, 'title-posts-page', 'Posts Page', 'Blog' );
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->addOption( ffOneOption::TYPE_TEXT, 'title-404', '404', '404 Not Found' );
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXT, 'title-post', 'Post', '%s' );
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->addOption( ffOneOption::TYPE_TEXT, 'title-category', 'Category', 'Category %s' );
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->addOption( ffOneOption::TYPE_TEXT, 'title-tag', 'Tag', 'Tagged as %s' );
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXT, 'title-author', 'Author', 'Author %s' );
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->addOption( ffOneOption::TYPE_TEXT, 'title-search', 'Search', 'Search results for: %s' );
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXT, 'title-day', 'Day', 'Day %s' );
				$s->addOption( ffOneOption::TYPE_TEXT, 'title-day-format', 'Day Format', 'F j, Y' );
				$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', 'For right date format please see <a href="//php.net/manual/en/function.date.php" target="_blank">Date PHP function manual</a>.' );
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXT, 'title-month', 'Month', 'Month %s' );
				$s->addOption( ffOneOption::TYPE_TEXT, 'title-month-format', 'Month Format', 'F Y' );
				$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', 'For right date format please see <a href="//php.net/manual/en/function.date.php" target="_blank">Date PHP function manual</a>.' );
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXT, 'title-year', 'Year', 'Year %s' );
				$s->addOption( ffOneOption::TYPE_TEXT, 'title-year-format', 'Year Format', 'Y' );
				$s->addElement( ffOneElement::TYPE_DESCRIPTION, '', 'For right date format please see <a href="//php.net/manual/en/function.date.php" target="_blank">Date PHP function manual</a>.' );
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
			$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );
		$s->endSection();

		$s->startSection('page-title');
			$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Heading Title');
				$s->addOption( ffOneOption::TYPE_CHECKBOX, 'show-title', 'Show Title ', 1);
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->addOption( ffOneOption::TYPE_CHECKBOX, 'is-custom-title', 'Use custom &nbsp; ', 0);
				$s->addOption( ffOneOption::TYPE_TEXT, 'title', '', 'Custom Page Title');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
			$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );


			$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );
			$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Subheading');

				$s->addOption( ffOneOption::TYPE_CHECKBOX, 'show-description', 'Show Description', 1);
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->addOption( ffOneOption::TYPE_SELECT, 'description-style', 'Description style', 'lead')
						->addSelectValue('Smaller', '')
						->addSelectValue('Bigger', 'lead');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->addOption( ffOneOption::TYPE_TEXTAREA, 'description', '', 'This is a sub-title placeholder, you can put your page description here.');
				$s->addOption( ffOneOption::TYPE_CHECKBOX, 'replace-with-category-description', 'Replace with Category or Tag Description if it is not empty', 1);

			$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );
		$s->endSection();

		$s->startSection('breadcrumbs');
			$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Breadcrumbs');
				$s->addOption( ffOneOption::TYPE_CHECKBOX, 'show', 'Show', 1);
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->addOption( ffOneOption::TYPE_TEXT, 'before', 'Text before', 'You are here: ');

                $s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->addOption( ffOneOption::TYPE_TEXT, 'homepage', 'Text Homepage', 'Home');
			$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );
		$s->endSection();

	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# PAGE TITLE END
################################################################################
