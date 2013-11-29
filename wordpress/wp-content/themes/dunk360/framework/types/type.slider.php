<?php 
/*******************************************************************************
 *This file sets up the the custom post type,
 * Sliders, and associated taxonomy.
 * @package elfunkobay
*******************************************************************************/

add_action( 'init', 'km_slider_posttype' );
/*----------------------------------------------------------------------------
~~~~~Registers the new post type and taxonomy~~~~~ SLIDER
-----------------------------------------------------------------------------*/
function km_slider_posttype() {

	/*-------------------------------------------------------------
	~~~~~~~~Register post type Sliders~~~~~~~~
	-------------------------------------------------------------*/
	$labels_slider_item = array(
			'name' => __( 'Sliders', 'elfunkobay' ),
			'singular_name' => __( 'Slider Item', 'elfunkobay' ),
			'add_new' => __( 'Add New', 'elfunkobay' ),
			'add_new_item' => __( 'Add New Slider Item', 'elfunkobay' ),
			'edit_item' => __( 'Edit Slider Item', 'elfunkobay' ),
			'new_item' => __( 'Add New Slider Item', 'elfunkobay' ),
			'view_item' => __( 'View Slider Item', 'elfunkobay' ),
			'search_items' => __( 'Search Slider Item', 'elfunkobay' ),
			'not_found' => __( 'No slider item found', 'elfunkobay' ),
			'not_found_in_trash' => __( 'No slider item found in trash', 'elfunkobay' )
	); 

	register_post_type( 'sliders', array(
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
			'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' )
	));
	
	/*--------------------------------------------------------------------
	~~~~Register post type News Categories~~~~
	--------------------------------------------------------------------*/
	$labels_news = array(
			'name' => __( 'Slider Categories', 'elfunkobay' ),
			'singular_name' => __( 'Sliders', 'elfunkobay' ),
			'search_items' =>  __( 'Search Sliders', 'elfunkobay' ),
			'all_items' => __( 'All Categories' , 'elfunkobay' ),
			'parent_item' => __( 'Parent Category', 'elfunkobay' ),
			'parent_item_colon' => __( 'Parent Category:', 'elfunkobay' ),
			'edit_item' => __( 'Edit Slider Category' , 'elfunkobay' ),
			'update_item' => __( 'Update Slider Category' , 'elfunkobay' ),
			'add_new_item' => __( 'Add Slider Category' , 'elfunkobay' ),
			'new_item_name' => __( 'Slider Category Name' , 'elfunkobay' ),
	); 	

	register_taxonomy('kava-sliders','sliders',array(
			'hierarchical' => true,
			'query_var' => true, 
			'rewrite' => true, 
			'labels' => $labels_news
	));


}

?>