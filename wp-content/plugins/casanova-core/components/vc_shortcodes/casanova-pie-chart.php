<?php

vc_map( array(
	'name' => __( 'Casanova - Pie Chart', 'js_composer' ),
	'base' => 'casanova_pie_chart',
	'icon' => 'icon-wpb-vc_pie',
	'category' => __( 'Content', 'js_composer' ),
	'description' => __( 'Pie Chart', 'js_composer' ),
	'params' => array(
		array(
			"type" => "textfield",
			"heading" => __ ( "Percent", "js_composer" ),
			"param_name" => "percent",
			'value' => '70',
		),
		array(
			"type" => "textfield",
			"heading" => __ ( "Size", "js_composer" ),
			"param_name" => "size",
			'value' => '150',
		),
		array(
			'type' => 'colorpicker',
			"heading" => __ ( "Color", "js_composer" ),
			"param_name" => "color",
			'value' => '3476AD',
		),
	)
) );

add_shortcode('casanova_pie_chart', 'casanova_pie_chart_func');
function casanova_pie_chart_func( $atts ) {
	extract( shortcode_atts( array(
		'size'    => '150',
		'percent' => '70',
		'color'   => '3476AD',
	), $atts) );

	return ''
		. '<div class="pie-chart" data-size="' . absint( $size ) . '" data-bar-color="' . esc_attr( $color ) . '" data-value="' . absint( $percent ) . '">'
			. '<span class="percent"><span>' . absint( $percent ) . '</span></span>'
		. '</div>';
}










