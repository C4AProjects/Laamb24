<?php
$title = get_the_title( $post_id );
$url = urlencode( get_permalink( $post_id ) );
$thumb = post_thumb_url('kava-thumbnail');
add_action( 'wp_head', 'insert_image_src_rel_in_head', 0 );
?>

<div class="share-icons">
		<ul>
			<li>
				<a href="http://www.facebook.com/sharer.php?s= 100&p[title]=<?php echo $title; ?>&p[url]=<?php echo $url; ?>&p[images][0]=<?php echo $thumb; ?>&p[summary]=<?php if($post->post_excerpt != ''){ echo short_content(strip_tags($post->post_excerpt), '...', 6);} else { echo short_content(strip_tags($post->post_content), '...', 6); } ?>" target="_blank" id="share-facebook"><span>Facebook</span></a>
			</li>
			<li>				
     		<a href="http://twitter.com/share?url=<?php echo  get_permalink(); ?>" target="_blank"  id="share-twitter"><span>Twitter</span></a>
			</li>
		</ul>
    <!-- <a id="share-label">Share</a>  -->
   
    <!--<a href="https://www.facebook.com/dialog/feed?app_id=458358780877780&link=<?php echo $url;?>&picture=<?php echo $thumb; ?>&name=<?php echo $title; ?>&description=<?php if($post->post_excerpt != ''){ echo short_content(strip_tags($post->post_excerpt), '...', 6);} else { echo short_content(strip_tags($post->post_content), '...', 6); } ?>&redirect_uri=<?php echo $url;?>" target="_blank"  id="share-facebook"><span>Facebook</span></a>-->
  <!--<a href="http://www.facebook.com/sharer.php?s=100&p[title]=<?php echo $title; ?>&p[url]=<?php echo $url; ?>" target="_blank"  id="share-facebook"><span>Facebook</span>
  </a>-->
</div>