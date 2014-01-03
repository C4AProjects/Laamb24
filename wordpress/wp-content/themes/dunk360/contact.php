<?php get_header();
global $post;
 ?>
    <div class="content">
    <div class="grid_9  single-page">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title"><h1><?php echo $post->post_title; ?></h1></div>
            </div>
               <div class="main-content info-page">
                    <?php //echo apply_filters('the_content', $post->post_content); ?>
                    <?php echo do_shortcode( "[si-contact-form form='1']" ); ?>
                </div>            
            </div>
        <br class="clr" />
    </div>
    <div class="grid_3 omega">
      <?php include('sidebar-single.php'); ?>          
    </div>
<?php get_footer(); ?>