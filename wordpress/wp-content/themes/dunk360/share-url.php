<?php
$title = get_the_title( $post_id );
$url = urlencode( get_permalink( $post_id ) );
add_action( 'wp_head', 'insert_image_src_rel_in_head', 0 );
?>

<div class="share-icons">
    <a id="share-label">Share</a> 
    <a href="http://twitter.com/share?url=<?php echo  get_permalink(); ?>" target="_blank"  id="share-twitter"><span>Twitter</span></a>
    <a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank"  id="share-facebook"><span>Facebook</span></a>
  <!--<a href="http://www.facebook.com/sharer.php?s=100&p[title]=<?php echo $title; ?>&p[url]=<?php echo $url; ?>" target="_blank"  id="share-facebook"><span>Facebook</span>-->
  </a>
</div>