<?php

vc_map( array(
	'name' => __( 'Casanova - Google Map', 'js_composer' ),
	'base' => 'casanova_google_map',
	'icon' => 'icon-wpb-map-pin',
	'category' => __( 'Content', 'js_composer' ),
	'description' => __( 'Progress bar', 'js_composer' ),
	'params' => array(

		array(
			"type" => "textfield",
			"heading" => __ ( "Height", "js_composer" ),
			"param_name" => "height",
			'value' => '327',
		),

		array(
			"type" => "textfield",
			"heading" => __ ( "Latitude", "js_composer" ),
			"param_name" => "lat",
			'value' => '-6.91486',
		),

		array(
			"type" => "textfield",
			"heading" => __ ( "Longitude", "js_composer" ),
			"param_name" => "lon",
			'value' => '107.60824',
		),

		array(
			"type" => "textfield",
			"heading" => __ ( "Zoom", "js_composer" ),
			"param_name" => "zoom",
			'value' => '12',
		),

		array(
			'type' => 'dropdown',
			'heading' => __( 'Type', 'js_composer' ),
			'param_name' => 'type',
			'value' => array(
				'Roadmap' => 'ROADMAP' ,
				'Terrain' => 'TERRAIN' ,
			),
		),
	)
) );

add_shortcode('casanova_google_map', 'casanova_google_map_func');
function casanova_google_map_func( $atts ) {
	extract( shortcode_atts( array(
		'height' => '327',
		'lat'    => '-6.91486',
		'lon'    => '107.60824',
		'zoom'   => '12',
		'type'   => 'ROADMAP',
	), $atts) );

	return '<div class="map"'
			.' data-lat="'.floatval( $lat )
			.'" data-lon="'.floatval( $lon )
			.'" data-zoom="'.absint( $zoom )
			.'" data-type="'.esc_attr( $type )
			.'" style="height:'.absint( $height )
			.'px"></div>';
}





