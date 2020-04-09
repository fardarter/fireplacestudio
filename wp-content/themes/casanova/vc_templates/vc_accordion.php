<?php
wp_enqueue_script('jquery-ui-accordion');
$output = $title = $interval = $el_class = $collapsible = $disable_keyboard = $active_tab = '';
//
extract(shortcode_atts(array(
    'title' => '',
    'interval' => 0,
    'el_class' => '',
    'collapsible' => 'no',
    'disable_keyboard' => 'no',
    'active_tab' => '1'
), $atts));

$el_class = $this->getExtraClass($el_class);

$output .= '<dl class="accordion" data-active-tab="'.esc_attr( $active_tab ).'">';
$output .= wpb_js_remove_wpautop($content);
$output .= '</dl>';

echo  $output;