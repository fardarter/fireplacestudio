<?php
/** @var ffOneStructure $s */

$s->startSection('nothing-found');

		$s->addOption( ffOneOption::TYPE_TEXTAREA, 'title', 'Nothing found',
			__( 'Nothing found', 'default')
		);
		$s->addElement(ffOneElement::TYPE_NEW_LINE );

		$s->addOption( ffOneOption::TYPE_TEXTAREA, 'description-taxonomy', 'Empty category, tag or custom taxonomy',
			__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'default')
		);
		$s->addElement(ffOneElement::TYPE_NEW_LINE );

		$s->addOption( ffOneOption::TYPE_TEXTAREA, 'description-search', 'Nothing found in search',
			__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'default')
		);
		$s->addElement(ffOneElement::TYPE_NEW_LINE );

		$s->addOption(ffOneOption::TYPE_CHECKBOX, 'show-search', 'Show Search', 1);
		$s->addElement(ffOneElement::TYPE_NEW_LINE );

$s->endSection();