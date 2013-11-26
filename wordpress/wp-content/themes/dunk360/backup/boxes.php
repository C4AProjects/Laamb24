<ul class="ctls">
<?php 
$query = array();
global $wp_query;
wp_reset_query();

$defaults = array(
    'posts_per_page'	=> '4',
    'post_type'         => 'featured-boxes',
	'orderby' => 'menu_order',
    'order' => 'ASC',
    'post_status'		=> 'publish',
    
);
$query += $defaults;

$wp_query = new WP_Query($query);

// Start the loop for our items
$i=1;
while (have_posts()) : the_post();

// Set the post to global so we can grab information on the page containing this code
global $post;
//var_dump($post);
// Use our variables above to create our items and skip items that are empty
$my_meta = get_custom_field('kava');
?>
    
<li class="cts rounded">               
<div class="inner">
<h2><a href="<?php echo $my_meta['featured_box_url']; ?>"><?php echo $post->post_title; ?></a></h2>
<p><a href="<?php echo $my_meta['featured_box_url']; ?>"><?php echo get_the_post_thumbnail($post->ID,'large'); ?></a> 
<?php echo do_shortcode($post->post_content);
if( $i%2 != 0 ){
?> 
<a href="<?php echo $my_meta['featured_box_url']; ?>" class="link-button blue">Read More &raquo;</a></p>
<?php } ?>
</div>
<span class="drop-shadow">&nbsp;</span>
</li>

<?php $i++; endwhile; ?>
<?php wp_reset_query(); ?>
</ul>