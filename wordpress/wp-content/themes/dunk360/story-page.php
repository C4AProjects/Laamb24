<?php  /*Template name: Story Page*/
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

<div class="content story-page">
    	<div class="grid_9 ">
        <div class="page-head">
        	<h1 class="page-section-title"><?php echo $page_menu_title; ?> </h1>
            <!-- <div class="page-nav"><?php locate_template( array( '/templates/pagination-rgt.php'), true, false );  ?></div> -->
        </div>
        <?php	if($wp_query->have_posts()) : ?>
           <div class="post-entries">
        	<ul>
            
            <?php 
			while ($wp_query->have_posts()) : $wp_query->the_post();  
             	locate_template( array( '/templates/item-to-loop.php'), true, false ); 
             endwhile; 
			?>
            </ul>
            <?php locate_template( array( '/templates/pagination-lft.php'), true, false );  ?>
           </div> 
           <?php else : ?>
            <div><p><?php _e('You do not have any posts to display.','kava'); ?></p></div>
            <?php endif; ?>           
        </div>
        <div class="grid_3 omega" id="sidebar" >
            <?php locate_template( array( '/templates/sidebar-advert.php'), true, false ); ?>
        </div>
    </div>
    <br class="clr" />
   <?php locate_template( array( '/templates/bottom-advert.php'), true, false );  ?>

<?php get_footer(); ?>