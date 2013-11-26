<?php if (has_post_thumbnail( $post->ID ) ){
// WP will not call bw image upon calling kava-thumbnail-bw
// so we get img url and insert it '-bw' manually and use img tags instead
$thumb = post_thumb_url('kava-thumbnail');
	$ext = pathinfo($thumb, PATHINFO_EXTENSION);
$thumb_bw = str_replace(".$ext", "-bw.$ext", $thumb);
echo '<img src="' . $thumb_bw . '" class="img_grayscale" width="220" height="220" /> ';
echo '<img src="' . $thumb . '" class="img_colorscale" width="220" height="220" /> ';

} else { 
//<img src="<?php bloginfo('template_directory'); ? >/images/default-image.jpg" alt="<?php the_title(); ? >" /><?php
 } ?>