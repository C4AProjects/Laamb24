<?php 
/*******************************************************************************
 *This file sets up the the custom post type,
 * Slides, and associated taxonomy.
 * @package kava
*******************************************************************************/

add_action( 'init', 'km_slides_posttype' );

/*----------------------------------------------------------------------------
~~~~~Registers the new post type and taxonomy~~~~~ SLIDER
-----------------------------------------------------------------------------*/
function km_slides_posttype() {

	/*-------------------------------------------------------------
	~~~~~~~~Register post type Slides~~~~~~~~
	-------------------------------------------------------------*/
	$labels_slider_item = array(
			'name' => __( 'Sliders', 'kava' ),
			'singular_name' => __( 'Slide Item', 'kava' ),
			'add_new' => __( 'Add New', 'kava' ),
			'add_new_item' => __( 'Add New Slide Item', 'kava' ),
			'edit_item' => __( 'Edit Slide Item', 'kava' ),
			'new_item' => __( 'Add New Slide Item', 'kava' ),
			'view_item' => __( 'View Slide Item', 'kava' ),
			'search_items' => __( 'Search Slide Item', 'kava' ),
			'not_found' => __( 'No slider item found', 'kava' ),
			'not_found_in_trash' => __( 'No slider item found in trash', 'kava' )
	); 

	register_post_type( 'slides', array(
			'labels' => $labels_slider_item,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_menu' => true, 
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'has_archive' => true, 
			'hierarchical' => false,
			'menu_position' => 5,
			'menu_icon' => get_template_directory_uri() . '/images/icons/slider.png',
			'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes') 
	));

}


?>
