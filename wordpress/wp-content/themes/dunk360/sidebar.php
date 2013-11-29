<aside>
    
    <?php //if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Left Sidebar") ) : ?>
	
<?php //endif; ?>
<?php 
locate_template( array( '/templates/twitter-feed.php'), true, false );
locate_template( array( '/templates/sidebar-advert.php'), true, false );
@locate_template( array( '/templates/instagram-feed.php'), true, false );  
?>
</aside>