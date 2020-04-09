<?php
/**
 * @var s ffOneStructure
 */

$colorAttribute = $s->addOption(ffOneOption::TYPE_SELECT, $params['name'], $params['title'], $params['default']);

// $colorsQuery = ffThemeOptions::getQuery('colors');

$TO = ffThemeOptions::getQuery();

if( $TO->queryExists('colors') ){

	$colorsQuery = $TO->get('colors');

	foreach ($colorsQuery->get('colors') as $color) {
		$colorAttribute->addSelectValue(
			'Custom ' . strip_tags( $color->get('title') )
			, 'custom-color-class-' . sanitize_title( $color->get('title') )
		);
	}
}

$colorAttribute->addSelectValue( 'White', '' );
$colorAttribute->addSelectValue( 'Black', 'black' );
$colorAttribute->addSelectValue( 'Blue', 'blue' );
$colorAttribute->addSelectValue( 'Green', 'green' );
$colorAttribute->addSelectValue( 'Orange', 'orange' );
$colorAttribute->addSelectValue( 'Purple', 'purple' );
$colorAttribute->addSelectValue( 'Red', 'red' );
$colorAttribute->addSelectValue( 'Yellow', 'yellow' );
$colorAttribute->addSelectValue( 'Theme Color', 'primary' );
