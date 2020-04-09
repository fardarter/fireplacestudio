<?php
/**
 * Template Name: One Page
 *
 * @package WordPress
 * @subpackage Bigstream
 * @since Bigstream 1.0
 */

get_header();

	$fwc = ffContainer::getInstance();
	$postMeta = $fwc->getDataStorageFactory()->createDataStorageWPPostMetas_NamespaceFacade( $post->ID );
	$onePage = $postMeta->getOption( 'onepage');

	$onePage = unserialize( base64_decode( $onePage ));
	$sectionQuery = ffContainer::getInstance()->getOptionsFactory()->createQuery( $onePage, 'ffComponent_Theme_OnePageOptions');

	//$sectionQuery->debug_dump();
	
	ffSectionTemplateManager::requireSectionsFromQuery( $sectionQuery->get('sections') );

get_footer();