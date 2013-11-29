<div id="banner-wrapper">
<div class="banner lft">
       <div id="slider-wrapper">
        
    <div class="anythingSlider">
                	<div class="wrapper" style="overflow: hidden;">
        <ul> 
                    <?php 
                   // default args for wp_query
                	$args = array(
                		'posts_per_page'	=> '3',
                		'post_type'         => 'post',
						'orderby' 			=> 'date',
    					'order' 			=> 'DESC',
						'post_status'		=> 'publish'
                	);
                
                	$slider_posts = new WP_Query($args);
                	
					$banners = array(); // get posts title for thumbnail tabs ( used in footer)
					$post_not_ids = array(); // get posts ids (excluded in homepage stories)
					
					if($slider_posts->have_posts()) :					
					
                	// Start the loop for slider items
                    while ($slider_posts->have_posts()) : $slider_posts->the_post();
                    
				   $banners[] = short_title('...', 12);
				   $post_not_ids[] = $post->ID;
                    ?>
                 <li>
                <?php if (has_post_thumbnail( $post->ID ) ): 
					the_post_thumbnail( 'kava-large-slide'); 
		 		endif; ?>
                </li>
                
                 <?php endwhile; endif;  ?>
                 
                    </ul>
                
    </div> 
                   
	</div>
 
        </div>      
 </div>
</div>
<div id="triangle_shape"><p><img src = "<?php echo get_template_directory_uri(); ?>/images/icons/triangle_shape.png"</p></div>
<div id="top-featured-stories">
        
		<ul class="tabs">
                <?php rewind_posts(); // rewind the query to use for tabs
        		if($slider_posts->have_posts()) :
        		while ($slider_posts->have_posts()) : $slider_posts->the_post(); ?>
                <li>
                    <div class="top-post-item"><h1><a href="<?php echo the_permalink(); ?>"><?php echo short_title('...', 8); ?></a></h1>
                        <h4><?php
                		if($post->post_excerpt != ''){
                			echo short_content(strip_tags($post->post_excerpt), '...', 15);
                		}else {
                			echo short_content(strip_tags($post->post_content), '...', 15);
                		}
                		 ?></h4>
                         <!--
                        <a class="readnow" href="<?php echo the_permalink(); ?>"><span>Read Now</span></a>
                        -->
                        <a class="readnow_lnk" href="<?php echo the_permalink(); ?>">Lire la suite...</a>
                        <!--
                        <div class="social">
                        	<?php echo do_shortcode('[simplelikes]'); ?>
                        </div>
                        -->
                    </div>
                
                </li>
                <?php  endwhile; endif;
                wp_reset_postdata(); //reset query 
                 ?>
        </ul>
</div>