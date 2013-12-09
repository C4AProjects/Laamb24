<?php 
/*** index file for site **/
get_header(); ?>
<?php require_once(get_template_directory().'/sliders.php'); ?>
		<h1 class="section-title"><?php echo $page_menu_title; ?> </h1>
    <div class="content">
    	<div class="twelve columns main-content" style="margin-top:-357px;margin-left:9px">
        <?php
		global $post_not_ids;//$post_not_ids 1st 3 posts are excluded since shown as sliders on homepage sliders
	// default args for wp_query
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
		$args = array(
			'posts_per_page'	=> '10',
			'post_type'         => 'post',
			'orderby' 			=> 'date',
			'order' 			=> 'DESC',
			'post_status'		=> 'publish',
			'post__not_in' 		=> $post_not_ids,
			'paged' 			=> $paged 
		);
	 $wp_query = new WP_Query($args);
	 
	if($wp_query->have_posts()) :
?>
           <div class="post-entries">
        	<ul>
        		<li><div class="post-news-item lft">

					</div> 
		    	</li>

		    	<li><div class="post-news-item lft">
					
			
					</div> 
		    	</li>
            
            <?php 
			while ($wp_query->have_posts()) : $wp_query->the_post();  
             	locate_template( array( '/templates/item-to-loop.php'), true, false ); 
             endwhile; 
			?>
            </ul>
           </div> 
           <?php else : ?>
            <div><p><?php _e('You do not have any posts to display.','kava'); ?></p></div>
            <?php endif;
			wp_reset_postdata(); //reset query 
			 ?>           
        </div>
        <div class="four columns" id="sidebar" >
        	<?php locate_template( array( '/templates/sidebar-advert.php'), true, false ); ?>
        </div>
    </div>
     <br class="clr" />
	 <?php locate_template( array( '/templates/pagination-rgt.php'), true, false );  ?>
    <br class="clr" />
    <?php locate_template( array( '/templates/bottom-advert.php'), true, false );  ?>
<?php get_footer(); ?>