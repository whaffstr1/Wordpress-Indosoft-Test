<?php
/**
 * @package Simple Content Menu
 * @version 1.0.0
 */
/*
Plugin Name: Simple Content Menu
Plugin URI: 
Description: Adding Simple Menu Under Post Content
Author: Satria Test Indosoft
Version: 1.0.0
Author URI: 
*/

function insertFootNote($content) {
	if(!is_feed() && !is_home()) {
		global $post;
		
		$iterate_n = 0;
		$data_temp = array();
		$curr_post_id = get_the_ID();

		$args = array(
		'post_type'=> 'any',
		'orderby'    => 'ID',
		'post_status' => 'publish',
		'order'    => 'DESC',
		'posts_per_page' => -1
		);
		$result = new WP_Query( $args );
		if ( $result-> have_posts() ){
			while ( $result->have_posts() ) {
				$result->the_post();
				$data_temp[$iterate_n]['title'] = get_the_title();
				$data_temp[$iterate_n]['id'] = get_the_ID();
				$data_temp[$iterate_n]['url'] = get_the_permalink();
				$data_temp[$iterate_n]['datetime'] = get_the_time('d-M-Y h:i:s a');

				$iterate_n++;
			
				
			}  
		}
		wp_reset_postdata(); 

		$content.=
			'<div class="simple-content-menu">
			<ul class="simple-ul">
				
			</ul>
			</div>';

		$data_to_js = json_encode($data_temp,TRUE);

		wp_register_script( "scm-movies", plugin_dir_url(__FILE__).'/js/file.js', array('jquery') );

		wp_localize_script( 'scm-movies', 'myAjax', array( 
	
		  'data_post'     => $data_to_js,
		  'active_id'	  => $curr_post_id,
		
		));

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'scm-movies' );

	}
	return $content;
}
add_filter ('the_content', 'insertFootNote');

function load_custom_js() {

	wp_enqueue_style('simple-content', plugin_dir_url(__FILE__).'style.css');
       
}

add_action( 'wp_enqueue_scripts', 'load_custom_js' );


