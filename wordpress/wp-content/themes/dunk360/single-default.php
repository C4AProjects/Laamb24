<?php get_header(); ?>
    <div class="content">
    <div class="one-col lft">
        <div class="page-head">
        	<div class="page-title"><h1><?php echo $post->post_title; ?></h1></div>
            <div class="page-nav"><?php include('templates/pagination-rgt.php'); ?></div>
        </div>
    </div>
    <br class="clr" />
    	<div class="two-col two lft">
           <div class="main-content">
				<?php the_content(); ?>
            </div>            
        </div>
        <div class="two-col one lft">
              <?php include('sidebar-single.php'); ?>          
        </div>
    </div>
    <br class="clr" />
    <?php //include('templates/bottom_advert.php'); ?>
<?php get_footer(); ?>