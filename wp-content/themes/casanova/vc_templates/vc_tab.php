<?php
/** @var $this WPBakeryShortCode_VC_Tab */
$output = $title = $tab_id = '';
extract(shortcode_atts($this->predefined_atts, $atts));

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_tab ui-tabs-panel wpb_ui-tabs-hide vc_clearfix', $this->settings['base'], $atts );

$output .= '<div class="tab">';
$output .= ($content=='' || $content==' ') ? __("Empty tab. Edit page to add content here.", "js_composer") : wpb_js_remove_wpautop($content);
$output .= '</div>';

echo  $output;