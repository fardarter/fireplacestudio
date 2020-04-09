<?php

vc_map( array(
	'name' => __( 'Casanova - Progress Bar', 'js_composer' ),
	'base' => 'casanova_progress_bar',
	'icon' => 'icon-wpb-graph',
	'category' => __( 'Content', 'js_composer' ),
	'description' => __( 'Progress bar', 'js_composer' ),
	'params' => array(

		array(
			"type" => "textfield",
			"heading" => __ ( "Title", "js_composer" ),
			"param_name" => "title",
			'value' => 'Programming',
		),

		array(
			"type" => "textfield",
			"heading" => __ ( "Percent", "js_composer" ),
			"param_name" => "percent",
			'value' => '100',
		),

		array(
			'type' => 'dropdown',
			'heading' => __( 'Bar color', 'js_composer' ),
			'param_name' => 'color',
			'value' => array(
				'Black'   => 'black' ,
				'Blue'    => 'blue' ,
				'Green'   => 'green' ,
				'Orange'  => 'orange' ,
				'Purple'  => 'purple' ,
				'Red'     => 'red' ,
				'Yellow'  => 'yellow' ,
				'Primary' => 'primary' ,
			),
		),

		array(
			'type' => 'dropdown',
			'heading' => __( 'Stripes', 'js_composer' ),
			'param_name' => 'stripes',
			'value' => array(
				'Stripes off' => '' ,
				'Stripes on'  => 'stripped' ,
			),
		),

		array(
			'type' => 'dropdown',
			'heading' => __( 'Animation', 'js_composer' ),
			'param_name' => 'animation',
			'value' => array(
				'Animation off' => '' ,
				'Animation on'  => 'animate' ,
			),
		),
	)
) );

add_shortcode('casanova_progress_bar', 'casanova_progress_bar_func');
function casanova_progress_bar_func( $atts ) {
	extract( shortcode_atts( array(
		'title'     => 'Programming',
		'percent'   => '100',
		'color'     => 'black',
		'stripes'   => '',
		'animation' => '',
	), $atts) );

	$output  = '';

	$output .= '<div class="progress-bar '.esc_attr( $stripes ).' '.esc_attr( $animation ).'">';
	$output .= '<div class="label clearfix">';
	$output .= '<span class="left">'.esc_attr( $title ).'</span>';
	$output .= '<span class="right">'.absint( $percent ).'%</span>';
	$output .= '</div>';
	$output .= '<div class="bar '.esc_attr( $color ).'" data-width="'.absint( $percent ).'"><div style="width: '.absint( $percent ).'%;"></div></div>';
	$output .= '</div>';

	return $output;
}





