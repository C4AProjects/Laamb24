<?php 
/*******************************************************************************
 *This file sets up the the custom post type,
 * Testimonial, and associated taxonomy.
 * @package kava
*******************************************************************************/

// register custom post types
add_action( 'init', 'km_testimonials_posttype' );
/*----------------------------------------------------------------------------
~~~~~Registers the new post type and taxonomy~~~~~ TESTIMONIALS
-----------------------------------------------------------------------------*/
function km_testimonials_posttype() {

	/*-------------------------------------------------------------
	~~~~~~~~Register post type Testimonial~~~~~~~~
	-------------------------------------------------------------*/
	$labels_testimonials = array(
			'name' => __( 'Testimonial', 'kava' ),
			'singular_name' => __( 'Testimonial Item', 'kava' ),
			'add_new' => __( 'Add New', 'kava' ),
			'add_new_item' => __( 'Add Testimonial Item', 'kava' ),
			'edit_item' => __( 'Edit Testimonial Item', 'kava' ),
			'new_item' => __( 'Add Testimonial Item', 'kava' ),
			'view_item' => __( 'View Testimonial Item', 'kava' ),
			'search_items' => __( 'Search Testimonial Item', 'kava' ),
			'not_found' => __( 'No testimonials item found', 'kava' ),
			'not_found_in_trash' => __( 'No testimonials item found in trash', 'kava' )
	); 

	register_post_type( 'testimonials', array(
			'labels' => $labels_testimonials,
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
			'menu_icon' => get_template_directory_uri() . '/images/icons/news.png',
			'supports' => array( 'title', 'editor', 'thumbnail' )
	));

}
?>