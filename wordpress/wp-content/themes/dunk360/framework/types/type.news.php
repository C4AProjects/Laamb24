<?php 
/*******************************************************************************
 *This file sets up the the custom post type,
 * News, and associated taxonomy.
 * @package kava
*******************************************************************************/

// register custom post types
add_action( 'init', 'km_news_posttype' );
/*----------------------------------------------------------------------------
~~~~~Registers the new post type and taxonomy~~~~~ NEWS
-----------------------------------------------------------------------------*/
function km_news_posttype() {

	/*-------------------------------------------------------------
	~~~~~~~~Register post type News~~~~~~~~
	-------------------------------------------------------------*/
	$labels_news = array(
			'name' => __( 'News', 'kava' ),
			'singular_name' => __( 'News Item', 'kava' ),
			'add_new' => __( 'Add New', 'kava' ),
			'add_new_item' => __( 'Add News Item', 'kava' ),
			'edit_item' => __( 'Edit News Item', 'kava' ),
			'new_item' => __( 'Add News Item', 'kava' ),
			'view_item' => __( 'View News Item', 'kava' ),
			'search_items' => __( 'Search News Item', 'kava' ),
			'not_found' => __( 'No news item found', 'kava' ),
			'not_found_in_trash' => __( 'No news item found in trash', 'kava' )
	); 

	register_post_type( 'news', array(
			'labels' => $labels_news,
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