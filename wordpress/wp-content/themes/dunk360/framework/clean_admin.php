<?php
// This is to customize Wordpress Admin by removing unnecessary stuff

// remove favorite actions
function remove_favorite_actions($actions) {
	if (!current_user_can('activate_plugins')) {
		unset($actions['edit-comments.php']);
	}
	return $actions;
}
//add_filter('favorite_actions', 'remove_favorite_actions');



// remove unnecessary page/post meta boxes
function remove_meta_boxes() {
	// posts
	remove_meta_box('postcustom','post','normal');
	remove_meta_box('trackbacksdiv','post','normal');
	remove_meta_box('commentstatusdiv','post','normal');
	remove_meta_box('commentsdiv','post','normal');
	remove_meta_box('categorydiv','post','normal');
	remove_meta_box('tagsdiv-post_tag','post','normal');
	remove_meta_box('slugdiv','post','normal');
	remove_meta_box('authordiv','post','normal');
	// pages
	remove_meta_box('postcustom','page','normal');
	remove_meta_box('commentstatusdiv','page','normal');
	remove_meta_box('trackbacksdiv','page','normal');
	remove_meta_box('commentsdiv','page','normal');
	remove_meta_box('slugdiv','page','normal');
	remove_meta_box('authordiv','page','normal');
}
//add_action('admin_init','remove_meta_boxes');



// remove unnecessary dashboard widgets
function remove_dashboard_widgets(){
	global $wp_meta_boxes;
	// do not remove "Right Now" for administrators
	if (!current_user_can('activate_plugins')) {
		//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	}
	// remove widgets for everyone
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
//add_action('wp_dashboard_setup', 'remove_dashboard_widgets');





// login page logo
function custom_login_logo() {
	echo '<style type="text/css">h1 a { background: #ff6600 url('.get_bloginfo('template_directory').'/images/logo.png) 50% 50% no-repeat !important; }</style>';
}
add_action('login_head', 'custom_login_logo');

// remove upgrade notification
function no_update_notification() {
	remove_action('admin_notices', 'update_nag', 3);
}
//if (!current_user_can('edit_users')) add_action('admin_notices', 'no_update_notification', 1);


// remove unnecessary menus
function remove_admin_menus () {
	global $menu;
	// all users
	$restrict = explode(',', 'Links,Comments');
	// non-administrator users
	$restrict_user = explode(',', 'Posts,Media,Profile,Appearance,Plugins,Users,Tools,Settings');
	// WP localization
	$f = create_function('$v,$i', 'return __($v);');
	array_walk($restrict, $f);
	if (!current_user_can('activate_plugins')) {
		array_walk($restrict_user, $f);
		$restrict = array_merge($restrict, $restrict_user);
	}
	// remove menus
	end($menu);
	while (prev($menu)) {
		$k = key($menu);
		$v = explode(' ', $menu[$k][0]);
		if(in_array(is_null($v[0]) ? '' : $v[0] , $restrict)) unset($menu[$k]);
	}
}
//add_action('admin_menu', 'remove_admin_menus');
