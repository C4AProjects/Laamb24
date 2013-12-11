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
<div class="content post-single-video">
    <div id="banner-wrapper" class="grid_9">
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
            <iframe class="video-player twelve columns" allowtransparency="yes" id="video-player" width="960" height="480" src="<?php echo $video_embedded_url; ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen  allowfullscreen></iframe>
            </div>
            <div class="twelve columns">
                <div class="nine columns meta-video">
                    <h4 class="category"><?php the_category(); ?></h4>
                    <div class="single-post-header"><h1><?php the_title(); ?></h1></div>
                    <div class="blogger"><?php the_author() ?></div>
                        <p class="date"><?php // echo get_the_time(__('F j Y')); ?>
                    <?php echo get_the_time(__('F j Y')); ?></p>
                    <h4><?php
                    if($post->post_excerpt != ''){
                        echo strip_tags($post->post_excerpt);
                    }else {
                        echo short_content(strip_tags($post->post_content), '...', 6);
                    }
                     ?></h4>   
                </div>
                <div class="two columns video-share">
                    <div class="share-url">
                        <?php locate_template( array( '/templates/share-url.php'), true, false );  ?>
                    </div>
                </div>
            </div>
            <div class="posted-comments-here twelve columns">
                <?php comments_template(); ?>
            </div>
            <div class="rel">
                    <br class="clr" />
                
                <?php include('templates/related-video-stories.php'); ?>
                <br class="clr" />
                <?php include('templates/bottom-advert.php'); ?>
            </div>
            </div>
        </div>
     <div class="grid_3 omega">
                  <?php include('sidebar-single.php'); ?>          
    </div>	
</div>
    <br class="clr" />
    
    <?php endwhile; ?>
    <div class="container">

    </div>
 <?php endif; ?>  
<?php get_footer(); ?>