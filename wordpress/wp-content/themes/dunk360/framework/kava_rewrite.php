<?php

// remove CSS from gallery
function roots_gallery_style($css) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

add_filter('gallery_style', 'roots_gallery_style');

// Hide wp-content ie. rewrite static theme assets and plugin directory
// rewrite /wp-content/themes/theme-name/css/ to /css/
// rewrite /wp-content/themes/theme-name/js/  to /js/
// rewrite /wp-content/themes/theme-name/img/ to /img/
// rewrite /wp-content/plugins/ to /plugins/

function roots_flush_rewrites() {
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}

function roots_add_rewrites($content) {
  $theme_name = next(explode('/themes/', get_stylesheet_directory()));
  global $wp_rewrite;
  $roots_new_non_wp_rules = array(
    'css/(.*)'      => 'wp-content/themes/'. $theme_name . '/css/$1',
    'js/(.*)'       => 'wp-content/themes/'. $theme_name . '/js/$1',
    'img/(.*)'      => 'wp-content/themes/'. $theme_name . '/img/$1',
    'plugins/(.*)'  => 'wp-content/plugins/$1'
  );
  $wp_rewrite->non_wp_rules += $roots_new_non_wp_rules;
}

add_action('admin_init', 'roots_flush_rewrites');

function roots_clean_assets($content) {
    $theme_name = next(explode('/themes/', $content));
    $current_path = '/wp-content/themes/' . $theme_name;
    $new_path = '';
    $content = str_replace($current_path, $new_path, $content);
    return $content;
}

function roots_clean_plugins($content) {
    $current_path = '/wp-content/plugins';
    $new_path = '/plugins';
    $content = str_replace($current_path, $new_path, $content);
    return $content;
}

add_action('generate_rewrite_rules', 'roots_add_rewrites');
if (!is_admin()) {
  add_filter('plugins_url', 'roots_clean_plugins');
  add_filter('bloginfo', 'roots_clean_assets');
  add_filter('stylesheet_directory_uri', 'roots_clean_assets');
  add_filter('template_directory_uri', 'roots_clean_assets');
  add_filter('script_loader_src', 'roots_clean_plugins');
  add_filter('style_loader_src', 'roots_clean_plugins');
}
