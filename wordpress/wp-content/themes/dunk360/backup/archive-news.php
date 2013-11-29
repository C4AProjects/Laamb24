<?php
 /*******************************************************************************
 * Insights Archive Template
 * This file is used to insights post. <Archive>
 * @package kava
*******************************************************************************/ 

get_header(); ?>

<section class="row">
<header class="entry-header">				
    <h1 class="entry-title"><?php //the_title(); ?>News</h1>
</header><!-- .entry-header -->
<div id="content" role="main">
<?php if(!is_front_page()){?>

<div class="breadcrumb">

	<?php if (class_exists('breadcrumb_navigation_xt')) {

    // echo 'You are here: ';

    $mybreadcrumb = new breadcrumb_navigation_xt;

    $mybreadcrumb->display();

    } ?>

</div>

<div class="clr"></div>

<?php } ?>
    	<div class="two-col one lft sidebar">
          	<aside class="rounded-big">
            <?php get_sidebar(); ?>
            </aside>
        </div>
        <div class="two-col two lft">

            <div class="main-content">

				<article id="content">
<?php
	if(is_page()) {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
		$args = array( 
			'post_type' => 'news',
			'orderby' => 'date',
			'order' => 'DESC',
			'post_status'		=> 'publish',
			'paged' => $paged 
		); 
		query_posts($args);
	}

	if (have_posts()) : 
?>
<div class="news-lists post-lists">
<ul class="thumb-preloader thumb-fade thumb-move">
<?php while (have_posts()) : the_post();  ?>
<li <?php post_class(); ?>>
	<div class="entry-content">
		<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		<div class="entry-meta">
            <p><?php echo get_the_time(__('F j. Y')); ?></p>
        </div><!--#end entry meta-->
		<?php echo get_the_post_thumbnail($post->ID,'large'); ?>
		<div class="button-wrap"><a href="<?php the_permalink(); ?>" class="radius-4 border-shadow-button"><?php _e('Read more', 'kava'); ?></a></div>
	</div><!--#end entry content-->
</li>
<?php endwhile; ?>
</ul>
<?php //ht_pagination(); ?>
</div><!--#end news lists-->
<?php else : ?>
<div class="warning radius-5"><p class="radius-5"><?php _e('You do not have any posts to display.','kava'); ?></p></div>
<?php endif; ?>
</article>

            </div><br class="clr" /> 
                   
        </div>
        <br class="clr" />        
</div>
\</section>

<?php get_footer(); ?>