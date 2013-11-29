<?php get_header(); 

/*Template name: Videos*/
global $post;
$page_slug = $post->post_name; 

	if(is_page()) {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
		$args = array( 
			'post_type' => 'post',
			'posts_per_page' => '6',
			'category_name'      => $page_slug,
			'orderby' => 'date',
			'order' => 'ASC',
			'post_status'		=> 'publish',
			'paged' => $paged 
		); 
		query_posts($args);
	}
	?>
<div class="content">
    	<div class="one-col lft">
        <div class="page-head">
        	<div class="page-title"><h1><?php echo $post->post_title; ?></h1></div>
            <div class="page-nav"><?php include('templates/pagination-rgt.php'); ?></div>
        </div>
        <?php

	if (have_posts()) : 
?>
           <div class="post-entries">
        	<ul>
            <?php while (have_posts()) : the_post();  ?>
            	<li><div class="post-news-item lft">
            	<div class="post-thumbnail">
                	<?php include('templates/thumb.php'); ?>
                    <a href="<?php the_permalink(); ?>" class="play playnow" rel="<?php echo $video_embedded_url; ?>"></a>
                </div>
                <div class="post-details">
                <h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'dunk360' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                    <h4>Story Description</h4>
                    <div class="post-link">
                	<a href="<?php the_permalink(); ?>" class="readnow"><span>Play Now</span></a>
                    <?php include('templates/simplelikes.php'); ?>
                </div>
                </div>
                
            </div> </li>
            <?php endwhile; ?>
            </ul>
			<?php include('templates/pagination-lft.php'); ?>
           </div> 
           <?php else : ?>
            <div><p><?php _e('You do not have any posts to display.','kava'); ?></p></div>
            <?php endif; ?>           
        </div>
    </div>
    <br class="clr" />
    <?php include('templates/bottom_advert.php'); ?>

<?php get_footer(); ?>