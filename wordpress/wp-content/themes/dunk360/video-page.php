<?php  /*Template name: Video Page*/
get_header();

global $post;
$page_slug = $post->post_name; 

	if(is_page()) {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
		$args = array(
			'posts_per_page'	=> '9',
			'post_type'         => 'post',
			'category_name'     => $page_slug,
			'orderby' 			=> 'date',
			'order' 			=> 'DESC',
			'post_status'		=> 'publish',
			'paged' 			=> $paged 
		);
		
		$wp_query = new WP_Query($args);
	}
	?>
<br class="clr" /> 
<div class="content post-single" id="video-story-player">
	<div id="banner-wrapper" class="lft">
        	<div class="post-large-image">
            <iframe class="video-player" allowtransparency="yes" id="video-player" width="960" height="480" src="<?php //echo $video_embedded_url; ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen  allowfullscreen></iframe>
            </div>
            <div class="single-post-header">
                <h1 id="video-title">.</h1>
                <div class="share-url">
                    <?php locate_template( array( '/templates/share-url.php'), true, false );  ?>
                </div>
                <h4 id="post-video-excerpt">.</h4>
            </div>
        </div>
</div>
       
<div class="content video-list">
    	<div class="one-col lft">
        <div class="page-head">
        	<div class="page-title"><h1><?php echo $post->post_title; ?></h1></div>
            <!-- <div class="page-nav"><?php locate_template( array( '/templates/pagination-rgt.php'), true, false );  ?></div> -->
        </div>
        <?php	if($wp_query->have_posts()) : ?>
           <div class="post-entries">
        	<ul>
            
            <?php 
			while ($wp_query->have_posts()) : $wp_query->the_post();  
             	locate_template( array( '/templates/video-item-to-loop.php'), true, false ); 
             endwhile; 
			?>
            </ul>
            <?php locate_template( array( '/templates/pagination-lft.php'), true, false );  ?>
           </div> 
           <?php else : ?>
            <div><p><?php _e('You do not have any posts to display.','kava'); ?></p></div>
            <?php endif; ?>           
        </div>
    </div>
    <br class="clr" />
   <?php locate_template( array( '/templates/bottom-advert.php'), true, false );  ?>

<?php get_footer(); ?>