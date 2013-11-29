<?php get_header(); 
global $wp_query;

$total_results = $wp_query->found_posts;
?>
<div class="content">
    	<div class="one-col one  lft">
        <div class="page-head">
        	<div class="page-title"><h1>Search Results</h1></div>
            <div class="page-nav"><?php locate_template( array( '/templates/pagination-rgt.php'), true, false );  ?></div>
        </div>
        <div class="search-result-details">
       <?php echo '<p><span>'.$total_results.'</span> results for &nbsp;<span class="search-term">'.get_search_query().'</span></p>'; ?>
       <?php if (function_exists('relevanssi_didyoumean')) { relevanssi_didyoumean(get_search_query(), "<p id = 'didyoumean'>Did you mean: <span>", "</span></p>", 5); }?>
        </div>
        
        <?php	if (have_posts()) : ?>
           	<div class="main-content">
           		<div class="post-entries">
        	<ul>
            
            <?php 
			 while (have_posts()) : the_post(); 
             	locate_template( array( '/templates/item-to-loop.php'), true, false ); 
             endwhile; 
			?>
            </ul>
            <?php locate_template( array( '/templates/pagination-lft.php'), true, false );  ?>
           </div> 
           	</div>
           <?php else : ?>
            <div><p><?php _e('You do not have any posts to display.','kava'); ?></p></div>
            <?php endif; ?>           
        </div>
        <br class="clr" />
    </div>

<?php get_footer(); ?>