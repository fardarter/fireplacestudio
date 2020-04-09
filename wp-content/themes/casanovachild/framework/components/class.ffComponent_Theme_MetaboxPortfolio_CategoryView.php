<?php

class ffComponent_Theme_MetaboxPortfolio_CategoryView extends ffOptionsHolder {
	public function getOptions() {
		$s = $this->_getOnestructurefactory()->createOneStructure( 'aaa');

		$s->startSection('general');
			$s->addElement( ffOneElement::TYPE_TABLE_START );
				$s->addElement(ffOneElement::TYPE_TABLE_DATA_START, '', 'Front Image');
					$s->startSection('image');
						$s->addOption( ffOneOption::TYPE_CHECKBOX, 'use-different-image', 'Use this image instead of Featured', 0);
						$s->addElement(ffOneElement::TYPE_NEW_LINE );
						$s->addOption( ffOneOption::TYPE_IMAGE, 'image');
					$s->endSection();
				$s->addElement(ffOneElement::TYPE_TABLE_DATA_END );

				$s->addElement(ffOneElement::TYPE_TABLE_DATA_START, '', 'Front Link');
					$s->startSection('link');
						$s->addOption( ffOneOption::TYPE_CHECKBOX, 'use-different-link', 'Use this URL instead of link to Portfolio Single', 0);
						$s->addElement(ffOneElement::TYPE_NEW_LINE );
						$s->addOption( ffOneOption::TYPE_TEXT, 'url', 'URL', 'http://www.yourproject.com');
					$s->endSection();
				$s->addElement(ffOneElement::TYPE_TABLE_DATA_END );

				// $s->addElement(ffOneElement::TYPE_TABLE_DATA_START, '', 'Heading');
				// 	$s->startSection('text');
				// 		$s->addOption( ffOneOption::TYPE_TEXT, 'title', 'Title', 'Project Title');
				// 		$s->addElement(ffOneElement::TYPE_NEW_LINE );
				// 		$s->addOption( ffOneOption::TYPE_TEXT, 'subtitle', 'Subtitle', 'Website Design');
				// 	$s->endSection();
				// $s->addElement(ffOneElement::TYPE_TABLE_DATA_END );

			$s->addElement( ffOneElement::TYPE_TABLE_END );
		$s->endSection();
		return $s;
	}
}

