<?php
// Remove relative urls

function kava_root_relative_url($input) {
  $output = preg_replace_callback(
    '!(https?://[^/|"]+)([^"]+)?!',
    create_function(
      '$matches',
      // if full URL is site_url, return a slash for relative root
      'if (isset($matches[0]) && $matches[0] === site_url()) { return "/";' .
      // if domain is equal to site_url, then make URL relative
      '} elseif (isset($matches[0]) && strpos($matches[0], site_url()) !== false) { return $matches[2];' .
      // if domain is not equal to site_url, do not make external link relative
      '} else { return $matches[0]; };'
    ),
    $input
  );
  return $output;
}

// workaround to remove the duplicate subfolder in the src of JS/CSS tags
// example: /subfolder/subfolder/css/style.css
function kava_fix_duplicate_subfolder_urls($input) {
  $output = kava_root_relative_url($input);
  preg_match_all('!([^/]+)/([^/]+)!', $output, $matches);
  if (isset($matches[1]) && isset($matches[2])) {
    if ($matches[1][0] === $matches[2][0]) {
      $output = substr($output, strlen($matches[1][0]) + 1);
    }
  }
  return $output;
}

if (!is_admin() && !in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'))) {
  add_filter('bloginfo_url', 'kava_root_relative_url');
  add_filter('theme_root_uri', 'kava_root_relative_url');
  add_filter('stylesheet_directory_uri', 'kava_root_relative_url');
  add_filter('template_directory_uri', 'kava_root_relative_url');
  add_filter('script_loader_src', 'kava_fix_duplicate_subfolder_urls');
  add_filter('style_loader_src', 'kava_fix_duplicate_subfolder_urls');
  add_filter('plugins_url', 'kava_root_relative_url');
  add_filter('the_permalink', 'kava_root_relative_url');
  add_filter('wp_list_pages', 'kava_root_relative_url');
  add_filter('wp_list_categories', 'kava_root_relative_url');
  add_filter('wp_nav_menu', 'kava_root_relative_url');
  add_filter('the_content_more_link', 'kava_root_relative_url');
  add_filter('the_tags', 'kava_root_relative_url');
  add_filter('get_pagenum_link', 'kava_root_relative_url');
  add_filter('get_comment_link', 'kava_root_relative_url');
  add_filter('month_link', 'kava_root_relative_url');
  add_filter('day_link', 'kava_root_relative_url');
  add_filter('year_link', 'kava_root_relative_url');
  add_filter('tag_link', 'kava_root_relative_url');
  add_filter('the_author_posts_link', 'kava_root_relative_url');
}

function kava_get_default_theme_options($default_framework = '') {
  global $roots_css_frameworks;
 // if ($default_framework == '') { $default_framework = apply_filters('roots_default_css_framework', 'blueprint'); }
 // $default_framework_settings = $roots_css_frameworks[$default_framework];
  $default_theme_options = array(
    'css_framework'             => $default_framework,
    'container_class'           => $default_framework_settings['classes']['container'],
    'main_class'                => $default_framework_settings['classes']['main'],
    'sidebar_class'             => $default_framework_settings['classes']['sidebar'],
    'google_analytics_id'       => '',
    'root_relative_urls'        => true,
    'clean_menu'                => true,
    'bootstrap_javascript'      => false,
    'bootstrap_less_javascript' => false,
  );

  return apply_filters('kava_default_theme_options', $default_theme_options);
}
// theme options
function kava_get_theme_options() {
  return get_option('kava_theme_options', kava_get_default_theme_options());
}

// remove root relative URLs on any attachments in the feed
function kava_root_relative_attachment_urls() {
  $kava_options = kava_get_theme_options();
  if (!is_feed() && $kava_options['root_relative_urls']) {
    add_filter('wp_get_attachment_url', 'kava_root_relative_url');
    add_filter('wp_get_attachment_link', 'kava_root_relative_url');
  }
}

add_action('pre_get_posts', 'kava_root_relative_attachment_urls');