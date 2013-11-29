	</div><!-- Container -->
</div><!-- End for Content wrap -->
<br class="clr" />
<footer>
  <section id="footer" class="row">
    <div class="row lft" id="declaration">
            <h1 id="logo-declaration"><a href="#"><span>Declaration</span></a></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div class="row lft" id="fmenu">
    <?php  wp_nav_menu(array('menu' => 'Footer Menu', 'container' => false, 'menu_class' => '', 'theme_location' => 'secondary', 'link_before' => '', 'link_after' => '<span></span>' )); ?>
    </div>
    <div id="legal" class="row lft">
    &copy; All rights reserved <?php echo bloginfo('name');?> <?php echo date('Y'); ?>
    </div>
   </section>
</footer>
</div><!-- End for Page wrap -->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->	
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.1.8.1.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.anythingslider.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.2.js" type="text/javascript"></script>
<?php if ( ( is_home() || is_front_page() ) ) { ?>
<script type="text/javascript">
 
<?php global $banners; 
$bans = implode("','", $banners);
$bansstr = '[\''.$bans. '\']';
?>
function formatText(index, panel) {
 return <?php echo $bansstr; ?>[index - 1];
}

$("ul.tabs li").hide();
$("ul.tabs li:first").addClass("cur").fadeIn('fast'); //Activate first tab
function tabContent(index){
	var $tabs = $('ul.tabs');
	//Get all tabs
	var $tab = $tabs.find('> li');
	//Make Tab Active
	$tab.removeClass('cur');$tab.hide();
	$tab.filter(':eq(' + (index) + ')').addClass("cur").fadeIn('fast');
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
           // $("#thumbNav a").click(function(){
			//	var obj_index = $(this).index();
				//callcontent(obj_index);
				//alert(obj_index);
                //$('.anythingSlider').anythingSlider(obj_index);
			//	return false;
          //  });
        
		// add '.last' to last item to get margin off    
		var $slideitems   = $('#thumbNav').find('> a');
 		$slideitems.filter(':last').addClass('last');
});
</script>
<?php } ?>
<script type="text/javascript">
$(document).ready(function(){

// place holders
 $("#q",$('#search')).focus(function(){if(this.value=='Search')this.value='';});
 $("#q",$('#search')).blur(function(){if(this.value=='') this.value='Search';}); 
 $("#log",$('#login-form')).focus(function(){if(this.value=='Username')this.value='';});
 $("#log",$('#login-form')).blur(function(){if(this.value=='') this.value='Username';});
 $("#pwd",$('#login-form')).focus(function(){if(this.value=='Password')this.value='';});
 $("#pwd",$('#login-form')).blur(function(){if(this.value=='') this.value='Password';}); 

});

</script>
<script type="text/javascript"> 
	
	// $(".item img").css({"display":"none");
	
	// On window load. This waits until images have loaded which is essential
	$(window).load(function(){
		
		// Fade in images so there isn't a color "pop" document load and then on window load
/*		$(".post-thumbnail img").animate({opacity:1},500);
		
		// clone image
		$('.post-thumbnail img').each(function(){
			var el = $(this);
			el.css({"position":"absolute"}).wrap("<div class='img_wrapper' style='display: inline-block'>").clone().addClass('img_grayscale').css({"position":"absolute","z-index":"998","opacity":"0"}).insertBefore(el).queue(function(){
				var el = $(this);
				el.parent().css({"width":this.width,"height":this.height});
				el.dequeue();
			});
			this.src = grayscale(this.src);
		});
		/*
		// Fade image 
		/*$('.post-thumbnail img').mouseover(function(){
			$(this).parent().find('img:first').stop().animate({opacity:1}, 1000);
		})
		$('.img_grayscale').mouseout(function(){
			$(this).stop().animate({opacity:0}, 1000);
		});	*/	
		
		// post entry li over functionality
		var $itmes = $('.post-entries ul li');
		//Get all tabs
		//var $tab = $tabs.find('> li');
		$itmes.each(function(){
			var el = $(this);
			
			el.mouseover(function(){
				$(this).addClass('hover');
				//$(this).find('img:first').stop().animate({opacity:1});
			})
			el.mouseout(function(){
				$(this).removeClass('hover');
				//$(this).find('.img_grayscale').stop().animate({opacity:0}, 100);
				//$(this).find('img:first').stop().animate({opacity:0});
			});
			
			});
		
		
			
		});
	
	// Grayscale w canvas method
	/*function grayscale(src){
        var canvas = document.createElement('canvas');
		var ctx = canvas.getContext('2d');
        var imgObj = new Image();
		imgObj.src = src;
		canvas.width = imgObj.width;
		canvas.height = imgObj.height; 
		ctx.drawImage(imgObj, 0, 0); 
		var imgPixels = ctx.getImageData(0, 0, canvas.width, canvas.height);
		for(var y = 0; y < imgPixels.height; y++){
			for(var x = 0; x < imgPixels.width; x++){
				var i = (y * 4) * imgPixels.width + x * 4;
				var avg = (imgPixels.data[i] + imgPixels.data[i + 1] + imgPixels.data[i + 2]) / 3;
				imgPixels.data[i] = avg; 
				imgPixels.data[i + 1] = avg; 
				imgPixels.data[i + 2] = avg;
			}
		}
		ctx.putImageData(imgPixels, 0, 0, 0, 0, imgPixels.width, imgPixels.height);
		return canvas.toDataURL();
    }*/
	    
</script> 
<?php wp_footer(); ?>	
<!-- Don't forget analytics -->
<?php echo get_option('kava_contact_analytics'); ?>	
</body>
</html>