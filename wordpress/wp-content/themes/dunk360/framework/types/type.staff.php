<?php 
/*******************************************************************************
 *This file sets up the the custom post type,
 * Staffs, and associated taxonomy.
 * @package kava
*******************************************************************************/

add_action( 'init', 'km_staffs_posttype' );
/*----------------------------------------------------------------------------
~~~~~Registers the new post type and taxonomy~~~~~ STAFFS
-----------------------------------------------------------------------------*/
function km_staffs_posttype() {

	/*-------------------------------------------------------------
	~~~~~~~~Register post type Staffs~~~~~~~~
	-------------------------------------------------------------*/
	$labels_staff_item = array(
			'name' => __( 'Staffs', 'kava' ),
			'singular_name' => __( 'Staff Item', 'kava' ),
			'add_new' => __( 'Add New', 'kava' ),
			'add_new_item' => __( 'Add New Staff Item', 'kava' ),
			'edit_item' => __( 'Edit Staff Item', 'kava' ),
			'new_item' => __( 'Add New Staff Item', 'kava' ),
			'view_item' => __( 'View Staff Item', 'kava' ),
			'search_items' => __( 'Search Staff Item', 'kava' ),
			'not_found' => __( 'No Staff item found', 'kava' ),
			'not_found_in_trash' => __( 'No Staff item found in trash', 'kava' )
	); 

	register_post_type( 'staffs', array(
			'labels' => $labels_staff_item,
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
			'menu_icon' => get_template_directory_uri() . '/images/icons/staffs.png',
			'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
	));
	
	/*--------------------------------------------------------------------
	~~~~Register post type Staff Categories~~~~
	--------------------------------------------------------------------*/
	$labels_staffs = array(
			'name' => __( 'Staff Categories', 'kava' ),
			'singular_name' => __( 'Staffs', 'kava' ),
			'search_items' =>  __( 'Search Staffs', 'kava' ),
			'all_items' => __( 'All Categories' , 'kava' ),
			'parent_item' => __( 'Parent Category', 'kava' ),
			'parent_item_colon' => __( 'Parent Category:', 'kava' ),
			'edit_item' => __( 'Edit Staff Category' , 'kava' ),
			'update_item' => __( 'Update Staff Category' , 'kava' ),
			'add_new_item' => __( 'Add Staff Category' , 'kava' ),
			'new_item_name' => __( 'Staff Category Name' , 'kava' ),
	); 	

	register_taxonomy('kava-staffs','staffs',array(
			'hierarchical' => true,
			'query_var' => true, 
			'rewrite' => true, 
			'labels' => $labels_staffs
	));


}

?>