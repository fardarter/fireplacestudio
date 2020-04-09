<?php

function theme_enqueue_styles() {

	$parent_style = 'parent-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/responsive.css');
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/fonts.css');
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/core.css');
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/custom.css');
    wp_enqueue_style( 'child-style',
	    	 get_stylesheet_directory_uri().'/style.css',
	    	 array($parent_style)
	    );
    wp_enqueue_script( 'fps', get_bloginfo( 'stylesheet_directory' ) . '/js/fireplacecustom.js', array( 'jquery' ), '1.0.0' );
}

function custom_post_fireplaces() {

	//categories for fireplaces

	register_taxonomy(  
        'fireplace_item', 
        'fireplaces',
        array(  
            'hierarchical' => true,  
            'label' => 'Fireplaces',
            'query_var' => false,
            'rewrite' => array(
                'slug' => 'fireplaces',
                'with_front' => true,
            )
        )  
    );

    //Set labels for custom post types
	$fireplaceLabels = array(
		'name'                => _x( 'Fireplaces', 'Post Type General Name', 'fireplacestudio' ),
		'singular_name'       => _x( 'Fireplace', 'Post Type Singular Name', 'fireplacestudio' ),
	);
	
// Set other options for Custom Post Type
	
	$fireplaceArgs = array(
		'label'               => __( 'fireplaces', 'fireplacestudio' ),
		'description'         => __( 'Fireplaces for sale', 'fireplacestudio' ),
		'labels'              => $fireplaceLabels,
		'supports'            => array( 'editor', 'title', 'thumbnail', 'revisions'),
		'taxonomies'          => array( 'fireplace_item' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_in_menu'        => true,
		'menu_icon'			  => 'dashicons-screenoptions',
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => false,
		'menu_position'       => 5,
		'has_archive'         => false,
		'exclude_from_search' => true,
	);


	// Registering your Custom Post Type
	register_post_type( 'fireplaces', $fireplaceArgs );
}

function custom_flush_rules() {
	custom_post_fireplaces();
	flush_rewrite_rules();
}

// Create custom post type 'fireplaces'
//Enqueue styles and scripts 
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
add_action('after_theme_switch', 'custom_flush_rules');
add_action( 'init', 'custom_post_fireplaces');





// Debug/Write variables to log.

if (!function_exists('write_log')) {
    function write_log ( $log )  {
        if ( true === WP_DEBUG ) {
            if ( is_array( $log ) || is_object( $log ) ) {
                error_log( print_r( $log, true ) );
            } else {
                error_log( $log );
            }
        }
    }
}



