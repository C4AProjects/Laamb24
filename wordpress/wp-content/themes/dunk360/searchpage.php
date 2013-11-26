<?php get_header(); 

/*Template name: Search*/
global $post;
?>
<section class="row">
<?php if (has_post_thumbnail( $post->ID ) ){ ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<?php } else { ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( 58 ), 'single-post-thumbnail' ); ?>
<?php } ?>
<header class="entry-header" style="background:transparent url(<?php echo $image[0]; ?>) no-repeat right 16px;">				
    <h1 class="entry-title">Search Site
    <span>search sitename.com</span>
    </h1>
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

        <br class="clr" />        
</div>
  <?php //endwhile; endif; ?>  
</section>

<?php get_footer(); ?>