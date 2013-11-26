<?php
// Custom Menu Walker to clear unnecessary ids and classes
// usage: wp_nav_menu(array('theme_location' => 'primary_navigation', 'walker' => new kava_nav_walker()));

class kava_nav_walker extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth, $args) {
    global $wp_query;
      $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

      $slug = sanitize_title($item->title);

      $class_names = $value = '';
      $classes = empty( $item->classes ) ? array() : (array) $item->classes;

      $classes = array_filter($classes, 'kava_check_current');

      $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
      $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

      $id = apply_filters( 'nav_menu_item_id', 'menu-' . $slug, $item, $args );
      $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

      $output .= $indent . '
';

      $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
      $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
      $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
      $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

      $item_output = $args->before;
      $item_output .= '';
      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      $item_output .= '';
      $item_output .= $args->after;

      $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}


function kava_check_current($val) {
  return preg_match('/current-menu/', $val);
}