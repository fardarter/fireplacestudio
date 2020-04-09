<?php
$output = $title = $el_class = $open = $css_animation = '';

$inverted = false;
/**
 * @var string $title
 * @var string $el_class
 * @var string $style
 * @var string $color
 * @var string $size
 * @var string $open
 * @var string $css_animation
 *
 * @var array $atts
 */
extract( shortcode_atts( array(
	'title' => __( "Click to toggle", "js_composer" ),
	'el_class' => '',
	// 'style' => 'default',
	'color' => 'default',
	'size' => '',
	'open' => 'false',
	'css_animation' => '',
), $atts ) );

if( 'true' == $open ){
	$active = ' active';
}else{
	$active = '';
}

?>
<dl class="accordion toggles <?php echo esc_attr( $el_class ); ?>">
	<dt class="accordion-trigger<?php echo esc_attr( $active ); ?>">
		<i class="fa fa-question"></i>
		<?php echo esc_html( $title ); ?>
	</dt>
	<dd class="accordion-content<?php echo esc_attr( $active ); ?>">
		<?php echo wpb_js_remove_wpautop( apply_filters( 'the_content', $content ), true ); ?>
	</dd>
</dl>