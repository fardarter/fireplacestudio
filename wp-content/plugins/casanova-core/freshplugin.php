<?php
/*
Plugin Name: Casanova Core
Plugin URI: http://freshface.net
Description: Shortcodes and Portfolio for Casanova Theme
Version: 1.0.2
Author: FRESHFACE
Author URI: http://fresh face.net
Dependency: fresh-framework
*/

if( !function_exists('ff_plugin_fresh_framework_notification') ) {
	function ff_plugin_fresh_framework_notification() {
		?>
	    <div class="error">
	    <p><strong><em>Fresh</strong></em> plugins require the <strong><em>'Fresh Framework'</em></strong> plugin to be activated first.</p>
	    </div>
	    <?php
	}
	add_action( 'admin_notices', 'ff_plugin_fresh_framework_notification' );
}
