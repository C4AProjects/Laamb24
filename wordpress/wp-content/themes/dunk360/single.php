<?php
global $wp_query;
$templatepath = get_template_directory().'/';

  $post = $wp_query->post;
  
  if ( in_category(array('news','rumors','fashion-style' ), $post ) ) {
      include($templatepath.'single-story.php');
  }else
  if ( in_category( array('videos','legends'), $post ) ) {
      include($templatepath.'single-video.php');
  }else{
      include($templatepath.'single-default.php');
  }
?>