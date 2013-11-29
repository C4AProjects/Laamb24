<?php 
/*******************************************************************************
 *This file sets up the the custom post type,
 * Featured Boxes, and associated taxonomy.
 * @package kava
*******************************************************************************/

add_action( 'init', 'km_boxes_posttype' );

/*----------------------------------------------------------------------------
~~~~~Registers the new post type and taxonomy~~~~~ FEATURED BOX
-----------------------------------------------------------------------------*/
function km_boxes_posttype() {

	/*-------------------------------------------------------------
	~~~~~~~~Register post type Featured Box~~~~~~~~
	-------------------------------------------------------------*/
	$labels_slider_item = array(
			'name' => __( 'Featured Box', 'kava' ),
			'singular_name' => __( 'Featured Box', 'kava' ),
			'add_new' => __( 'Add New', 'kava' ),
			'add_new_item' => __( 'Add New Featured Box', 'kava' ),
			'edit_item' => __( 'Edit Featured Box', 'kava' ),
			'new_item' => __( 'Add New Featured Box', 'kava' ),
			'view_item' => __( 'View Featured Box', 'kava' ),
			'search_items' => __( 'Search Featured Box', 'kava' ),
			'not_found' => __( 'No Featured Box found', 'kava' ),
			'not_found_in_trash' => __( 'No Featured Box found in trash', 'kava' )
	); 

	register_post_type( 'featured-boxes', array(
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
			'menu_icon' => get_template_directory_uri() . '/images/icons/box.png',
			'supports' => array( 'title', 'editor', 'thumbnail','page-attributes') 
	));


}


?>
