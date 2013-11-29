	</div><!-- Container -->
</div><!-- End for Content wrap -->
<br class="clr" />
<footer class="fter">
  <section id="footer" class="container">  
  	<!--
    <div class="row lft" id="declaration">
            <h1 id="logo-declaration"><a href="#"><span>Declaration</span></a></h1>
            <?php $id=363; $postf = get_page($id); $content = apply_filters('the_content', $postf->post_content); echo $content; ?>
            
    </div>
    -->
    <div class="three columns">
    	 <div class="logo">
          <h1>
            <a href="<?php echo get_option('home'); ?>/">
              <img src="<?php echo get_template_directory_uri(); ?>/images/logo/logo-bottom.png" alt="" style="width:160px;">
              <!-- <span>
                <?php //bloginfo('name'); ?>
                |
                <?php //bloginfo('description'); ?></span> -->
            </a>
          </h1>
        </div>
			        <div id="social_media_links">
          <ul>
            <li id="facebook_icon">
              <a id="facebook_link" href="#">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icons/facebook_icon.png" alt="facebook"></a>
            </li>
            <li id="twitter_icon">
              <a id="twitter_link" href="#">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icons/twitter_icon.png" alt="twitter"></a>
            </li>
            <li id="google_plus_icon">
              <a id="google_plus_link" href="#">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icons/google_plus_icon.png" alt="google plus"></a>
            </li>
          </ul>
        </div>
    </div>
    <div class="three columns fmenu" id="">
    <?php  wp_nav_menu(array('menu' => 'Primary Menu', 'container' => false, 'menu_class' => '', 'theme_location' => 'primary', 'link_before' => '', 'link_after' => '<span></span>' )); ?>
    </div>
    <div class="three columns fmenu" id="">
    <?php  wp_nav_menu(array('menu' => 'Footer Menu', 'container' => false, 'menu_class' => '', 'theme_location' => 'secondary', 'link_before' => '', 'link_after' => '<span></span>' )); ?>
    </div>
    <div class="three columns fmenu" id="">
    <?php  wp_nav_menu(array('menu' => 'Footer Advertising', 'container' => false, 'menu_class' => '', 'theme_location' => 'secondary', 'link_before' => '', 'link_after' => '<span></span>' )); ?>
    </div>
<!--     <div id="legal" class="row lft">
    &copy; All rights reserved <?php echo bloginfo('name');?> <?php echo date('Y'); ?>
    </div> -->
   </section>
</footer>
</div><!-- End for Page wrap -->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.1.8.1.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.anythingslider.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox-1.3.4.pack.js"></script>  
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.2.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.mousewheel-3.0.4.pack.js"></script>  
<script type="text/javascript">
$(document).ready(function(){

// place holders
$("#s",$('#search')).focus(function(){if(this.value=='Search')this.value='';});
$("#s",$('#search')).blur(function(){if(this.value=='') this.value='Search';}); 
$("#log",$('#login-form')).focus(function(){if(this.value=='Username')this.value='';});
$("#log",$('#login-form')).blur(function(){if(this.value=='') this.value='Username';});
$("#pwd",$('#login-form')).focus(function(){if(this.value=='Password')this.value='';});
$("#pwd",$('#login-form')).blur(function(){if(this.value=='') this.value='Password';}); 
$("#user_login",$('#register-form')).focus(function(){if(this.value=='Username')this.value='';});
$("#user_login",$('#register-form')).blur(function(){if(this.value=='') this.value='Username';});
$("#user_email",$('#register-form')).focus(function(){if(this.value=='E-Mail')this.value='';});
$("#user_email",$('#register-form')).blur(function(){if(this.value=='') this.value='E-Mail';});

$("#toggle-comments").click(function(e) { 
	e.preventDefault();
    // assumes element with id='button'
    $("#comment-lists").toggle();
});

});
jQuery(document).ready(function() {  
    jQuery(".show").fancybox({ 
		/*'autoDimensions':   false,
        'width'         :   '750',
        'height'        :   '80%',*/
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	400, 
		'speedOut'		:	200, 
		'overlayColor' : '#000000',
		'overlayShow'	:	true, 
        'titleShow'     : 'false' 
    }); 
	 
}); 
</script>
<script type="text/javascript"> 	
	// On window load. POST THUMBNAIL HOVER
$(window).load(function(){	
	
	// post entry li hover functionality
	var $itmes = $('.post-entries ul li');
	//Get all tabs
	$itmes.each(function(){
		var el = $(this);
		
		el.mouseover(function(){
			$(this).addClass('hover');
		})
		el.mouseout(function(){
			$(this).removeClass('hover');
		});	
	});	
	<?php global $pagename; if ( $pagename == 'videos' || $pagename == 'legends' ){ ?>
	$("#video-story-player").hide();
	// videos page functionality
	var $vurls = $('.videos .post-entries ul li a.playnow');
	$vurls.each(function(){
		var el = $(this);
		var ell = el.closest('div').attr('title');
		var elll = el.closest('li').attr('title');
		el.click(function(e){
			e.preventDefault();
			$("#video-story-player").css('display','block');
			$("#video-player").attr('src', '');
			$("#video-title").html( ell );
			
			$("#post-video-excerpt").html(  elll );
			
			var $frmsrc = $(this).attr('rel');			
      		$("#video-player").attr('src', $frmsrc);			
			
			$("#share-twitter").attr('href', 'http://twitter.com/share?url=' + el.attr('href') );
			$("#share-facebook").attr('href', 'http://www.facebook.com/sharer.php?u=' + el.attr('href') );
			$("html, body").animate({ scrollTop: 165 }, "slow");
		})
	});
	<?php } ?>
	<?php if (is_single()) { ?>
	// set active link when on 
	var $links = $('.menu ul li a');
	$links.each( function() {
		var thisurl = $(this).attr('href');
		if(thisurl == '<?php global $catslug; echo get_bloginfo( 'url' ).'/'.$catslug.'/'; ?>'){
			$(this).parent().addClass('active');
		}
	});	
	<?php }  ?>
});	    
</script> 
<?php if ( ( is_home() || is_front_page() ) ) { ?>
<script type="text/javascript">
 // Home page sliders + navthumbs( get titles from sliders.php (as global) 
<?php global $banners; 
$bans = implode("','", $banners);
$bansstr = '[\''.$bans. '\']';
?>
function formatText(index, panel) {
 return <?php echo $bansstr; ?>[index - 1];
}

$("ul.tabs li").css('visibility','hidden');
$("ul.tabs li:first").css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1.0}); //Activate first tab
// .animate({"visibility":"visible"}, 1000);
function tabContent(index){
	var $tabs = $('ul.tabs');
	//Get all tabs
	var $tab = $tabs.find('> li');
	//Make Tab Active $tab.removeClass('cur');
	$tab.css('visibility','hidden');
	$tab.filter(':eq(' + (index) + ')').css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1.0}); 
}
$(document).ready(function(){

		 $('.anythingSlider').anythingSlider({
                easing: "easeOutQuint",        // Anything other than "linear" or "swing" requires the easing plugin
                autoPlay: true,                 // This turns off the entire FUNCTIONALY, not just if it starts running or not.
                delay: 3000,                    // How long between slide transitions in AutoPlay mode
                startStopped: false,            // If autoPlay is on, this can force it to start stopped
                animationTime: 600,             // How long the slide transition takes
                hashTags: false,                 // Should links change the hashtag in the URL?
                buildNavigation: true,          // If true, builds and list of anchor links to link to each slide
        		pauseOnHover: true,             // If true, and autoPlay is enabled, the show will pause on hover
        		startText: "Go",             // Start text
		        stopText: "Stop",               // Stop text
		        navigationFormatter: formatText       // Details at the top of the file on this use (advanced use)
            });
           
        
		// add '.last' to last item to get margin off    
		var $slideitems   = $('#thumbNav').find('> a');
 		$slideitems.filter(':last').addClass('last');
});
</script>
<?php } ?>
<?php wp_footer(); ?>	
<!-- Don't forget analytics -->
<?php echo get_option('kava_contact_analytics'); ?>	
</body>
</html>