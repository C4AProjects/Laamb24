<?php 
/*** template for single story page ****/
global $pagename, $catname, $catslug;  //$pagename = 'news'; 
global $post;
//$categories = get_the_category($post->ID);
//var_dump($categories);

$category = get_the_category(); 
$catname = $category[0]->cat_name;
$catslug = $category[0]->slug;
//$catid = $category[0]->ID;
//echo $catname;
get_header(); ?>
<br class="clr" /> 
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>   
<div class="content ">
<div class="container">
        <div class="content-wrapper">
        	<div class="twelve columns  story-page">
                <div id="banner-wrapper" class="twelve columns" style="margin-left:0px;">
                    <div class="post-large-image twelve columns">
                    <?php 
                    $wslider = get_post_meta($post->ID, 'Wow slider', true);
                    if(!empty($wslider) && $wslider != "" )
                        wowslider($wslider);
                    else  if (has_post_thumbnail( $post->ID ) ){
                        echo get_the_post_thumbnail($post->ID,'kava-large-story'); 
                    }?>
                    </div>
                        <div class="single-post-header twelve columns" style="margin-left:0px;">
                        <!-- <div class="trait"></div> -->
                        <h4 class="category"><?php the_category(); ?></h4>
                        <h1><?php the_title(); ?></h1>
                        <div class="entry-meta">
                            <div class="entry-author" style="float:left;">
                            <!-- displays the user's photo and then thumbnail -->
                            <?php //userphoto_the_author_thumbnail() ?>


                            <!-- and this is how to customize the output -->
                            <?php userphoto_the_author_photo(
                                '',
                                '',
                                array('class' => 'photo'),
                                get_template_directory_uri() . '/nophoto.jpg'
                            ) ?>
                            </div>
                        <div class="entry-author-suite" style="float:left;">
                            <span class="blogger"> by <?php the_author() ?> | </span>
                            <span class="date"><?php // echo get_the_time(__('F j Y')); ?>
                            <?php echo get_the_time(__('F j Y H:i')); ?></span> 
                        </div>           
                        </div><!--#end entry meta-->
                        <div class="share-url">
                            <?php locate_template( array( '/templates/share-url.php'), true, false );  ?>
                        </div>
                        <!-- <div class="trait"></div> -->
                        </div>
                </div>
               <div class="main-content">

    				<?php the_content(); ?>
                </div>            
            </div>
            <div class="four columns">
                  <?php include('sidebar-single.php'); ?>          
            </div>
        </div>
        </div>
    </div>
    <br class="clr" />
    
    <div class="posted-comments-here twelve columns">
    	<?php comments_template(); ?>
    </div>
    
    <?php endwhile; ?>
    
    <br class="clr" />
    <?php locate_template( array( '/templates/related-stories.php'), true, false );  ?>
    <br class="clr" />
    <?php locate_template( array( '/templates/bottom-advert.php'), true, false );  ?>
 <?php endif; ?>  
<?php get_footer(); ?>