<?php get_header();
global $post;
 ?>
    <div class="content">
    <div class="twelve columns  single-page">
        <div class="page-content">
            <div class="page-head">
            	<div class="page-title"><h1><?php echo $post->post_title; ?></h1></div>
            </div>
        </div>
        <br class="clr" />
        	<div class=" lft">
               <div class="main-content info-page">
    				<?php echo apply_filters('the_content', $post->post_content); ?>
                </div>            
            </div>
        <br class="clr" />
    </div>
    <div class="four columns">
      <?php include('sidebar-single.php'); ?>          
    </div>
<?php get_footer(); ?>