<?php 
// get video url from custom field
$my_meta = get_custom_field('kava');
$ytube = $my_meta['youtube_video_embedded_url'];
if(!empty($ytube) && $ytube != "" )
	$video_embedded_url = $ytube.'?rel=0';
else {
	$vimeo = $my_meta['vimeo_video_embedded_url'];
	$video_embedded_url = $vimeo.'?color=0077F0';
}?><li class="grid_4" title="<?php
if($post->post_excerpt != ''){
	echo strip_tags($post->post_excerpt);
}else {
	echo short_content(strip_tags($post->post_content), '...', 6);
}
 ?>"><div class="post-news-item lft">
	<div class="post-thumbnail" title="<?php the_title(); ?>">
		<?php locate_template( array( '/templates/thumb.php'), true, false ); ?>
        <a href="<?php the_permalink(); ?>" class="play playnow" rel="<?php echo $video_embedded_url; ?>"></a>
	</div>
	<div class="post-details">
		<?php locate_template( array( '/templates/post-title-excerpt.php'), true, false ); ?>
		<div class="post-link" title="<?php the_title(); ?>" >
		<a href="<?php the_permalink(); ?>" class="readnow playnow" rel="<?php echo $video_embedded_url; ?>"><span>Play Now</span></a>
		<?php locate_template( array( '/templates/simplelikes.php'), true, false ); ?>
	</div>
	</div>
	
</div> </li>