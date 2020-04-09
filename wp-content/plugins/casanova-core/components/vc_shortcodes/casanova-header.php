<?php

vc_map( array(
	'name' => __( 'Casanova - Header', 'js_composer' ),
	'base' => 'casanova_header',
	'icon' => 'icon-wpb-toggle-small-expand',
	'category' => __( 'Content', 'js_composer' ),
	'params' => array(
		array(
			"type" => "textfield",
			"heading" => __ ( "Title", "js_composer" ),
			"param_name" => "title",
			'value' => 'Title text',
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Bottom line',
			'param_name' => 'type',
			'value' => array(
				'None' => '',
				'Type 2' => 'v2',
				'Type 3' => 'v3',
			),
		),
	)
) );


add_shortcode('casanova_header', 'casanova_header_func');
function casanova_header_func( $atts ) {
	extract(shortcode_atts(array(
		'title' => 'Title text',
		'type' => '',
	), $atts));

	$output  = '';

	$output .= '<header class="content-header '.esc_attr( $type ).'">';
    $output .= '<h3>'.$title.'</h3>';
    $output .= '</header>';

	return $output;
}