<?php

vc_map( array(
	'name' => 'Casanova ' . __( 'Button', 'js_composer' ),
	'base' => 'casanova_button',
	'icon' => 'icon-wpb-ui-button',
	'category' => __( 'Content', 'js_composer' ),
	'description' => __( 'Eye catching button', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'ff_casanova_icon',
			'description' => __( 'Button icon.', 'js_composer' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Text on the button', 'js_composer' ),
			'holder' => 'button',
			'class' => 'wpb_button',
			'param_name' => 'title',
			'value' => __( 'Text on the button', 'js_composer' ),
			'description' => __( 'Text on the button.', 'js_composer' )
		),
		array(
			'type' => 'href',
			'heading' => __( 'URL (Link)', 'js_composer' ),
			'param_name' => 'href',
			'description' => __( 'Button link.', 'js_composer' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Target', 'js_composer' ),
			'param_name' => 'target',
			'value' => $target_arr,
			'dependency' => array(
				'element' => 'href',
				'not_empty' => true,
				'callback' => 'vc_button_param_target_callback'
			)
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Color', 'js_composer' ),
			'param_name' => '_color',
			'value' => $colors_arr,
			'description' => __( 'Button color.', 'js_composer' ),
			'param_holder_class' => 'vc_colored-dropdown'
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Size', 'js_composer' ),
			'param_name' => '_size',
			'value' => $size_arr,
			'description' => __( 'Button size.', 'js_composer' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Style', 'js_composer' ),
			'param_name' => '_style',
			'value' => array(
				__( 'None'    , 'js_composer' ) => '',
				__( 'Square'  , 'js_composer' ) => 'button',
				__( 'Rounded' , 'js_composer' ) => 'button rounded',
			),
			'description' => __( 'Button style.', 'js_composer' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	),
) );


add_shortcode('casanova_button', 'casanova_button_func');
function casanova_button_func( $atts ) {

	$title = $href = $target = $_color = $_size = $_style = $ff_casanova_icon = $el_class = '';
	extract( shortcode_atts( array(
		'ff_casanova_icon' => '',
		'title'    => __( 'Text on the button', "js_composer" ),
		'href'     => '',
		'target'   => '_self',
		'_color'   => '',
		'_size'    => '',
		'_style'   => '',
		'el_class' => '',
	), $atts ) );
	$a_class = '';

	if ( $target == 'same' || $target == '_self' ) {
		$target = '';
	}
	$target   = empty( $target   ) ? '' : ' target="' . esc_attr( $target ) . '"';
	$_color   = empty( $_color   ) ? '' : ' ' . esc_attr( $_color    );
	$_size    = empty( $_size    ) ? '' : ' ' . esc_attr( $_size     );
	$_style   = empty( $_style   ) ? '' : ' ' . esc_attr( $_style    );
	$el_class = empty( $el_class ) ? '' : ' ' . esc_attr( $el_class  );

	$ff_casanova_icon = apply_filters( 'ff_filter_query_get_icon', $ff_casanova_icon );

	$class = $el_class . $_color . $_size . $_style;

	if( !empty( $ff_casanova_icon ) ){
		$title = '<i class="'.esc_attr( $ff_casanova_icon ).'"></i> ' . $title;
	}

	if ( $href != '' ) {
		$output = '<a class="' . $class  . '" href="' . $href . '"' . $target . '>' . $title . '</a>';
	} else {
		$output = '<button class="' . $class . '">' . $title . '</button>';

	}

	return $output . "\n";
}











