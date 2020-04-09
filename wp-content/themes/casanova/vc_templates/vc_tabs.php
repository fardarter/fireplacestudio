<?php
$output = $title = $interval = $el_class = '';
extract( shortcode_atts( array(
	'title' => '',
	'interval' => 0,
	'el_class' => ''
), $atts ) );

wp_enqueue_script( 'jquery-ui-tabs' );

$el_class = $this->getExtraClass( $el_class );

$element = 'wpb_tabs';
if ( 'vc_tour' == $this->shortcode ) $element = 'wpb_tour';

// Extract tab titles
preg_match_all( '/vc_tab([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE );
$tab_titles = array();
/**
 * vc_tabs
 *
 */
if ( isset( $matches[1] ) ) {
	$tab_titles = $matches[1];
}

$wrapper_class = $el_class . ' tabs ';
$nav_class = 'tabnav nav';
$content_before = '';
$content_after = '';
if ( 'vc_tour' == $this->shortcode ){
	$wrapper_class .= 'vertical row';
	$nav_class .= ' col-27';
	$content_before = '<div class="col-9">';
	$content_after = '</div>';
}else if ( 'vc_tabs' == $this->shortcode ){
	$wrapper_class .= 'horizontal';
}

$output .= '<div class="'.esc_attr( $wrapper_class ).'">';
	$output .= '<nav class="'.esc_attr( $nav_class ).'">';
		$output .= '<ul>';
		$is_first = true;
		foreach ( $tab_titles as $tab ) {
			$tab_atts = shortcode_parse_atts($tab[0]);
			if(isset($tab_atts['title'])) {
				$output .= '<li';
				if( $is_first ){
					$output .= ' class="active"';
					$is_first = false;
				}
				$output .= '><a href="#">' . ff_wp_kses( $tab_atts['title'] ) . '</a></li>';
			}
		}
		$output .= '</ul>';
	$output .= '</nav>';
	$output .= $content_before;
	$output .= wpb_js_remove_wpautop( $content );
	$output .= $content_after;
$output .= '</div>';

echo  $output;





