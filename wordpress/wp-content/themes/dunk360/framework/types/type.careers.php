<?php 
/*******************************************************************************
 *This file sets up the the custom post type,
 * Careers.
 * @package kava
*******************************************************************************/

// register custom post types
add_action( 'init', 'km_careers_posttype' );
/*----------------------------------------------------------------------------
~~~~~Registers the new post type and taxonomy~~~~~ CAREERS
-----------------------------------------------------------------------------*/
function km_careers_posttype() {

	/*-------------------------------------------------------------
	~~~~~~~~Register post type Careers~~~~~~~~
	-------------------------------------------------------------*/
	$labels_careers = array(
			'name' => __( 'Careers', 'kava' ),
			'singular_name' => __( 'Career Item', 'kava' ),
			'add_new' => __( 'Add New', 'kava' ),
			'add_new_item' => __( 'Add Career Item', 'kava' ),
			'edit_item' => __( 'Edit Career Item', 'kava' ),
			'new_item' => __( 'Add Career Item', 'kava' ),
			'view_item' => __( 'View Career Item', 'kava' ),
			'search_items' => __( 'Search Career Item', 'kava' ),
			'not_found' => __( 'No Careers item found', 'kava' ),
			'not_found_in_trash' => __( 'No Careers item found in trash', 'kava' )
	); 

	register_post_type( 'careers-postings', array(
			'labels' => $labels_careers,
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
			'menu_icon' => get_template_directory_uri() . '/images/icons/insights.png',
			'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
	));

}
?>