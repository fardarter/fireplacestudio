<?php
/** @var ffOneStructure $s */

$s->startSection('comments-form');


	$s->addElement(ffOneElement::TYPE_HTML,'','<label><strong>General Comment Form Options</strong></label><br/><br/>');

	$s->addOption( ffOneOption::TYPE_TEXT, 'heading', 'Form Heading', 'Leave a Reply');
	$s->addElement(ffOneElement::TYPE_NEW_LINE );

	$s->addOption( ffOneOption::TYPE_TEXT, 'name', 'Name', 'Your Name:');
	$s->addElement(ffOneElement::TYPE_NEW_LINE );

	$s->addOption( ffOneOption::TYPE_TEXT, 'email', 'Email', 'Email Address:');
	$s->addElement(ffOneElement::TYPE_NEW_LINE );

	$s->addOption( ffOneOption::TYPE_TEXT, 'website', 'Website', 'Website URL:');
	$s->addElement(ffOneElement::TYPE_NEW_LINE );

	$s->addOption( ffOneOption::TYPE_TEXT, 'comment-form', 'Comment Form', 'Comments:');
	$s->addElement(ffOneElement::TYPE_NEW_LINE );

	$s->addOption( ffOneOption::TYPE_TEXT, 'submit-button', 'Submit Button', 'Post Comment');
	$s->addElement( ffOneElement::TYPE_NEW_LINE);
	ff_load_section_options(
		'/templates/onePage/attrs/color-attr.php',
		$s, array(
			'name' => 'button-color'
			, 'title' => 'Button Color'
			, 'default' => 'primary'
	));
	$s->addElement(ffOneElement::TYPE_NEW_LINE );

	$s->addOption( ffOneOption::TYPE_TEXT, 'logged-in', 'Logged in text', 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>');

	$s->addElement(ffOneElement::TYPE_NEW_LINE );

$s->endSection();