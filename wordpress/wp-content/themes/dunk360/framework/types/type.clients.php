<?php 
/*******************************************************************************
 *This file sets up the the custom post type,
 * Clients.
 * @package kava
*******************************************************************************/

// register custom post types
add_action( 'init', 'km_clients_posttype' );
/*----------------------------------------------------------------------------
~~~~~Registers the new post type and taxonomy~~~~~ CLIENTS
-----------------------------------------------------------------------------*/
function km_clients_posttype() {

	/*-------------------------------------------------------------
	~~~~~~~~Register post type Clients~~~~~~~~
	-------------------------------------------------------------*/
	$labels_clients = array(
			'name' => __( 'Partners', 'kava' ),
			'singular_name' => __( 'Partner Item', 'kava' ),
			'add_new' => __( 'Add New', 'kava' ),
			'add_new_item' => __( 'Add Partner Item', 'kava' ),
			'edit_item' => __( 'Edit Partner Item', 'kava' ),
			'new_item' => __( 'Add Partner Item', 'kava' ),
			'view_item' => __( 'View Partner Item', 'kava' ),
			'search_items' => __( 'Search Partner Item', 'kava' ),
			'not_found' => __( 'No Partners item found', 'kava' ),
			'not_found_in_trash' => __( 'No Partners item found in trash', 'kava' )
	); 

	register_post_type( 'partner', array(
			'labels' => $labels_clients,
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