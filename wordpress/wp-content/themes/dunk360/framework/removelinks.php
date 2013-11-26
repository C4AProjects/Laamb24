<?php
// change location of wp uploads to media
//update_option('uploads_use_yearmonth_folders', 0);
//update_option('upload_path', 'uploads');
// Clean up the <head>
function removeHeadLinks() {
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	remove_action('wp_head', 'noindex', 1);
}
add_action('init', 'removeHeadLinks');


// remove WordPress version from RSS feeds
function roots_no_generator() { return ''; }
add_filter('the_generator', 'roots_no_generator');

// remove unecessary scripts
if (!is_admin()) {
  wp_deregister_script('l10n');
}

// remove unecessary css
// remove CSS from recent comments widget
function roots_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
  }
}

add_action('wp_head', 'roots_remove_recent_comments_style', 1);

