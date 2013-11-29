<?php 	
// use wpclass
$query = array();

global $post, $catslug;
$page_slug = $catslug;

global $wp_query;

wp_reset_query();

//if(is_page()) {

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
$defaults = array(
	'posts_per_page'	=> '6',
	'post_type'         => 'post',
	'category_name'      => $page_slug,
	'orderby' => 'date',
	'order' => 'ASC',
	'post_status'		=> 'publish',
	'paged' => $paged 
);
$query += $defaults;


$wp_query = new WP_Query($query);

//}
?>
<div class="page-head">
        	<div class="page-title"><h1>More Videos</h1></div>
            <div class="page-nav"><?php include(get_template_directory().'/templates/pagination-rgt.php'); ?></div>
        </div>
<?php if (have_posts()) : ?>
<div class="post-entries">
<ul>
<?php while (have_posts()) : the_post(); 
$my_meta = get_custom_field('kava');
			$ytube = $my_meta['youtube_video_embedded_url'];
			if(!empty($ytube) && $ytube != "" )
				$video_embedded_url = $ytube.'?rel=0';
			else {
				$vimeo = $my_meta['vimeo_video_embedded_url'];
				$video_embedded_url = $vimeo.'?color=0077F0';
			}
 ?>
    <li><div class="post-news-item lft">
    <div class="post-thumbnail">
        <?php include(get_template_directory().'/templates/thumb.php'); ?>
        <a href="<?php the_permalink(); ?>" class="play playnow" rel="<?php echo $video_embedded_url; ?>"></a>
    </div>
    <div class="post-details">
    <h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'dunk360' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
        <h4>Story Description</h4>
        <div class="post-link">
        <a href="<?php the_permalink(); ?>" class="readnow playnow" rel="<?php echo $video_embedded_url; ?>"><span>Play Now</span></a>
        <?php include(get_template_directory().'/templates/simplelikes.php'); ?>
    </div>
    </div>
    
</div> </li>
<?php endwhile; ?>
</ul>
<?php include(get_template_directory().'/templates/pagination-lft.php'); ?>
</div> 
<?php else : ?>
<div><p><?php _e('You do not have any posts to display.','kava'); ?></p></div>
<?php endif;
wp_reset_query();
 ?>  