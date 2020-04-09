<?php

have_posts();

$tax = $query->getMultipleSelect('taxonomies-ff');

$args = array(
	'post_type' => array( 'portfolio' )
);

// if empty => $tax = array( 0 => '' )

if( ! empty( $tax ) and !empty($tax[0]) ){
	$args['tax_query'] = array();

	if( 1 < count($tax) ){
		$args['tax_query']['relation'] = 'OR';
	}

	foreach ($tax as $tax_ID) {
		$args['tax_query'][] = array(
			'taxonomy' => 'ff-portfolio-category',
			'field'    => 'id',
			'terms'    => absint( $tax_ID ),
		);
	}
}else{
	$args = 'post_type=portfolio';
}

global $wp_query;

$backuped_main_query = clone $wp_query;

$wp_query = new WP_Query( $args );

have_posts();

ff_load_section_printer(
	'/templates/onePage/sections/portfolio-archive.php'
	, $query
);

$wp_query = $backuped_main_query;

have_posts();