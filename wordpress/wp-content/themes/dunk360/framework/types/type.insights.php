<?php 
/*******************************************************************************
 *This file sets up the the custom post type,
 * Insights, and associated taxonomy.
 * @package kava
*******************************************************************************/

// register custom post types
add_action( 'init', 'km_insights_posttype' );
/*----------------------------------------------------------------------------
~~~~~Registers the new post type and taxonomy~~~~~ INSIGHTS
-----------------------------------------------------------------------------*/
function km_insights_posttype() {

	/*-------------------------------------------------------------
	~~~~~~~~Register post type Insights~~~~~~~~
	-------------------------------------------------------------*/
	$labels_insights = array(
			'name' => __( 'Insights', 'kava' ),
			'singular_name' => __( 'Insight Item', 'kava' ),
			'add_new' => __( 'Add New', 'kava' ),
			'add_new_item' => __( 'Add Insight Item', 'kava' ),
			'edit_item' => __( 'Edit Insight Item', 'kava' ),
			'new_item' => __( 'Add Insight Item', 'kava' ),
			'view_item' => __( 'View Insight Item', 'kava' ),
			'search_items' => __( 'Search Insight Item', 'kava' ),
			'not_found' => __( 'No Insights item found', 'kava' ),
			'not_found_in_trash' => __( 'No Insights item found in trash', 'kava' )
	); 

	register_post_type( 'insights-articles', array(
			'labels' => $labels_insights,
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
			'supports' => array( 'title', 'editor', 'thumbnail' )
	));

}
?>