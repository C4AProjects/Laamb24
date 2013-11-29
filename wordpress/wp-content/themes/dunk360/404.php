<?php /** 404 page **/
get_header(); 
 ?>
    <div class="content">
    <div class="one-col lft">
        <div class="page-head">
        	<div class="page-title"><h1>Page Not Found</h1></div>
        </div>
    </div>
    <br class="clr" />
    	<div class="one-col one lft">
           <div class="main-content info-page">
				<h2>Error 404 - Page Not Found, Visit the <a href="<?php echo bloginfo('url'); ?>">Home Page</a></h2>
            </div>            
        </div>
    <br class="clr" />
<?php get_footer(); ?>