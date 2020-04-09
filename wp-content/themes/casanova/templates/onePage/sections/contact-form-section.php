<?php
################################################################################
# CONTACT MAP START
################################################################################

$s->startSection('contact-form', ffOneSection::TYPE_REPEATABLE_VARIATION)
	->addParam('section-name', 'Contact Form')
	->addParam('hide-default', true)

	->addParam('advanced-picker-menu-title', 'Contact')
	->addParam('advanced-picker-menu-id', 'contact')
	->addParam('advanced-picker-section-image', ff_get_section_preview_image_url('contact-form'));


	$s->addElement( ffOneElement::TYPE_TABLE_START );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Preview');
			$s->addElement(ffOneElement::TYPE_HTML,'','<img src="'.ff_get_section_preview_image_url('contact-form').'" width="250">');
		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		ff_load_section_options( '/templates/onePage/blocks/section-settings-block.php', $s);

		ff_load_section_options( '/templates/onePage/blocks/small-heading-block.php', $s);

        $s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Contact Form Email Informations');
            $s->startSection('msg');

                $s->addOption( ffOneOption::TYPE_TEXT, 'email', 'Your email', 'your@email.com');
                $s->addElement( ffOneElement::TYPE_NEW_LINE );
                $s->addOption( ffOneOption::TYPE_TEXT, 'subject', 'Your subject', 'Casanova contact form');
                $s->addElement( ffOneElement::TYPE_NEW_LINE );
                $s->addOption( ffOneOption::TYPE_TEXT, 'good', 'Message sent', 'Your message has been sent successfully');
                $s->addElement( ffOneElement::TYPE_NEW_LINE );
                $s->addOption( ffOneOption::TYPE_TEXT, 'bad', 'Message NOT sent', 'There was a problem, please send your message later');
                $s->addElement( ffOneElement::TYPE_NEW_LINE );

            $s->endSection();

        $s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Contact Form Translation');
			$s->startSection('form-trans');

				$s->startSection('field-name');
					$s->addOption( ffOneOption::TYPE_TEXT, 'title', 'Name title', 'Name: ');
					$s->addElement( ffOneElement::TYPE_NEW_LINE );
					$s->addOption( ffOneOption::TYPE_TEXT, 'placeholder', 'Name placeholder', '');
				$s->endSection();
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->startSection('field-email');
					$s->addOption( ffOneOption::TYPE_TEXT, 'title', 'Email title', 'E-mail: ');
					$s->addElement( ffOneElement::TYPE_NEW_LINE );
					$s->addOption( ffOneOption::TYPE_TEXT, 'placeholder', 'Email placeholder', '');
				$s->endSection();
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->startSection('field-website');
					$s->addOption( ffOneOption::TYPE_TEXT, 'title', 'Website title', 'Website: ');
					$s->addElement( ffOneElement::TYPE_NEW_LINE );
					$s->addOption( ffOneOption::TYPE_TEXT, 'placeholder', 'Website placeholder', '');
				$s->endSection();
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->startSection('field-subject');
					$s->addOption( ffOneOption::TYPE_TEXT, 'title', 'Subject title', 'Subject: ');
					$s->addElement( ffOneElement::TYPE_NEW_LINE );
					$s->addOption( ffOneOption::TYPE_TEXT, 'placeholder', 'Subject placeholder', '');
				$s->endSection();
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->startSection('field-message');
					$s->addOption( ffOneOption::TYPE_TEXT, 'title', 'Message title', 'Message: ');
					$s->addElement( ffOneElement::TYPE_NEW_LINE );
					$s->addOption( ffOneOption::TYPE_TEXT, 'placeholder', 'Message placeholder', '');
					$s->addElement( ffOneElement::TYPE_NEW_LINE );
					$s->addOption( ffOneOption::TYPE_TEXT, 'rows', 'Message number of rows', '11');
				$s->endSection();
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->startSection('field-submit');
					$s->addOption( ffOneOption::TYPE_TEXT, 'title', 'Submit button title','Send Message');
				$s->endSection();

			$s->endSection();

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Right description');
			$s->startSection('right-description');

				$s->addOption( ffOneOption::TYPE_CHECKBOX, 'show', 'Show right description', 1);

				$s->startSection('boxes', ffOneSection::TYPE_REPEATABLE_VARIABLE );

					$s->startSection( 'one-box', ffOneSection::TYPE_REPEATABLE_VARIATION )->addParam('section-name', 'One Box');

						$s->addOption( ffOneOption::TYPE_TEXT, 'title', 'Title', 'Main Office:');

						$s->startSection('lines', ffOneSection::TYPE_REPEATABLE_VARIABLE );

							$s->startSection( 'one-line', ffOneSection::TYPE_REPEATABLE_VARIATION )->addParam('section-name', 'One Line');
								$s->addOption( ffOneOption::TYPE_TEXT, 'text', 'One line', 'Address: 123 Gold Apt. West Java, Indonesia 40556');
							$s->endSection();
						$s->endSection();

					$s->endSection();

				$s->endSection();

			$s->endSection();

			$s->addOption( ffOneOption::TYPE_CHECKBOX, 'show-social-links', 'Show social links', 1);

			ff_load_section_options( '/templates/onePage/blocks/social-block.php', $s);

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_START, '', 'Map');

			$s->startSection('map');

				$s->addOption( ffOneOption::TYPE_CHECKBOX, 'show', 'Show', 1);
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

				$s->addOption( ffOneOption::TYPE_TEXT, 'long', 'Longtitude', '107.60824');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->addOption( ffOneOption::TYPE_TEXT, 'lat', 'Latitude', '-6.91486');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->addOption( ffOneOption::TYPE_SELECT, 'zoom', 'Zoom', '12')
					->addSelectNumberRange(1,20)
					;
				$s->addElement( ffOneElement::TYPE_NEW_LINE );


				$s->addOption( ffOneOption::TYPE_TEXT, 'trans-show-map', 'Show Map button', 'Show Map');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );
				$s->addOption( ffOneOption::TYPE_TEXT, 'trans-hide-map', 'Hide Map Button', 'Hide Map');
				$s->addElement( ffOneElement::TYPE_NEW_LINE );

			$s->endSection();

		$s->addElement( ffOneElement::TYPE_TABLE_DATA_END );

	$s->addElement( ffOneElement::TYPE_TABLE_END );
$s->endSection();

################################################################################
# FACTS END
################################################################################
