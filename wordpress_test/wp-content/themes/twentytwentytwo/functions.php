<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */


if ( ! function_exists( 'twentytwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

// Our custom post type function
function create_posttype() {
  
    register_post_type( 'movies',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Movies' ),
                'singular_name' => __( 'Movie' ),
				'featured_image'        => __( 'Featured Image'),
				'set_featured_image'    => __( 'Set featured image'),
				'remove_featured_image' => __( 'Remove featured image'),
				'use_featured_image'    => __( 'Use as featured image'),
            ),
			'publicly_queryable' => true,
			'query_var'          => true,
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail','page-attributes', ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'movies'),
            'show_in_rest' => true,
			'menu_icon' => 'dashicons-video-alt3',
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

function my_pre_get_posts( $query ) {
	if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'movies' )) {
		$query->set( 'offset_start', 0 );
		$query->set( 'posts_per_page', 1 );
	}

	// if ( $offset = $query->get( 'offset_start' ) ) {
	// 	$per_page = absint( $query->get( 'posts_per_page' ) );
	// 	$per_page = $per_page ? $per_page : max( 1, get_option( 'posts_per_page' ) );

	// 	$paged = max( 1, get_query_var( 'paged' ) );
	// 	$query->set( 'offset', ( $paged - 1 ) * $per_page + $offset );
	// }
}
add_action( 'pre_get_posts', 'my_pre_get_posts' );

add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_sample_metaboxes() {

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'custom_data',
		'title'         => __( 'Details', 'cmb2' ),
		'object_types'  => array( 'movies', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	// // Regular text field
	// $cmb->add_field( array(
	// 	'name'       => __( 'Duration', 'cmb2' ),
	// 	'desc'       => __( 'field description (optional)', 'cmb2' ),
	// 	'id'         => 'yourprefix_text',
	// 	'type'       => 'text',
	// 	'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
	// 	// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
	// 	// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
	// 	// 'on_front'        => false, // Optionally designate a field to wp-admin only
	// 	// 'repeatable'      => true,
	// ) );

	$cmb->add_field( array(
		'name'    => 'Duration',
		'desc'    => 'duration of the movie in minutes',
		'default' => '',
		'id'      => 'durations',
		'type'    => 'text',
	) );

	$cmb->add_field( array(
		'name'    => 'Year',
		'desc'    => 'Years of release movie',
		'default' => '',
		'id'      => 'years',
		'type'    => 'text',
	) );

	$cmb->add_field( array(
		'name'           => 'Genre',
		'desc'           => 'Genre of the movie',
		'id'             => 'genres',
		'taxonomy'       => 'genre', //Enter Taxonomy Slug
		'type'           => 'taxonomy_multicheck',
		// Optional :
		'text'           => array(
			'no_terms_text' => 'Sorry, no terms could be found.' // Change default text. Default: "No terms"
		),
		'remove_default' => 'true', // Removes the default metabox provided by WP core.
		// Optionally override the args sent to the WordPress get_terms function.
		'query_args' => array(
			// 'orderby' => 'slug',
			// 'hide_empty' => true,
		),
	) );


	//force save slug using post-title
	function myplugin_update_slug( $data, $postarr ) {
		if ( ! in_array( $data['post_status'], array( 'draft', 'pending', 'auto-draft' ) ) ) {
			if($data['post_type'] == 'movies')
				$data['post_name'] = sanitize_title( $data['post_title'] );
		}
	
		return $data;
	}
	add_filter( 'wp_insert_post_data', 'myplugin_update_slug', 99, 2 );

	
	

 


}


