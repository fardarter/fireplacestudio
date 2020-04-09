<?php

vc_map( array(
	'name' => 'Casanova ' . __( 'Fact', 'js_composer' ),
	'base' => 'casanova_fact',
	'icon' => 'icon-wpb-toggle-small-expand',
	'category' => __( 'Content', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Number', 'js_composer' ),
			'param_name' => 'number',
			'value' => '12,457',
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'ff_casanova_icon',
			'description' => __( 'Icon', 'js_composer' ),
			'value' => 'ff-font-awesome4 icon-briefcase',
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Title', 'js_composer' ),
			'param_name' => 'Title',
			'description' => __( 'Title', 'js_composer' ),
			'value' => 'TOTAL PROJECTS',
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	),
) );


add_shortcode('casanova_fact', 'casanova_fact_func');
function casanova_fact_func( $atts ) {
	$output = $number = $ff_casanova_icon = $title = $el_class = '';
	extract( shortcode_atts( array(
		'number'           => '',
		'ff_casanova_icon' => '',
		'title'            => '',
		'el_class'         => '',
	), $atts ) );

	$ff_casanova_icon = apply_filters( 'ff_filter_query_get_icon', $ff_casanova_icon );
	if( !empty( $ff_casanova_icon ) ){
		$title = '<i class="'.esc_attr( $ff_casanova_icon ).'"></i> ' . $title;
	}

	$output = '';
	$output .= '<div class="stats '.esc_attr( $el_class ).'">';
		$output .= '<div class="number">'.esc_attr( $number ).'</div>';
		$output .= '<div class="label">';
			$output .= $title;
		$output .= '</div>';
	$output .= '</div>';
	return $output;
}