<?php
/**** template page for video stories ***/
  global $pagename, $catname, $catslug;  //$pagename = 'videos'; 
global $post;


$category = get_the_category($post->ID); 
$catname = $category[1]->cat_name;
$catslug = $category[1]->slug;
//$catid = $category[0]->ID;

get_header(); ?>
<br class="clr" /> 
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>   
<div class="content post-single">
    <div id="banner-wrapper" class="lft">
        	<div class="post-large-image">
			<?php 
			$my_meta = get_custom_field('kava');
			$ytube = $my_meta['youtube_video_embedded_url'];
			if(!empty($ytube) && $ytube != "" )
				$video_embedded_url = $ytube.'?rel=0';
			else {
				$vimeo = $my_meta['vimeo_video_embedded_url'];
				$video_embedded_url = $vimeo.'?color=0077F0';
			}?>           
            <iframe class="video-player" allowtransparency="yes" id="video-player" width="960" height="480" src="<?php echo $video_embedded_url; ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen  allowfullscreen></iframe>
            </div>
                <div class="single-post-header"><h1><?php the_title(); ?></h1>
                <div class="share-url">
                    <?php locate_template( array( '/templates/share-url.php'), true, false );  ?>
                </div>
                <h4><?php
if($post->post_excerpt != ''){
	echo strip_tags($post->post_excerpt);
}else {
	echo short_content(strip_tags($post->post_content), '...', 6);
}
 ?></h4>
            </div>
        </div>
    	
    </div>
    <br class="clr" />
    
    <?php endwhile; ?>
    
    <br class="clr" />
    
	<?php include('templates/related-video-stories.php'); ?>
    <br class="clr" />
    <?php include('templates/bottom-advert.php'); ?>
 <?php endif; ?>  
<?php get_footer(); ?>