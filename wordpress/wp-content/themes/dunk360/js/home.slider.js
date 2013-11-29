// call content
function callcontent(calltype){
	//alert('#box'+calltype);
	//$('.slidernavs').fadeOut('slow');
	//$('#thumbNav').fadeOut('slow');
	//$('.sliderboxes').show();
	//$('#box'+calltype).animate({marginLeft:'0px'},'fast'); 
	//$('#box1').animate({marginLeft:'0px'},'fast'); 
}

// formatter
function formatText(index, panel) {
		 // return "" ;
	    }
		$(document).ready(function(){

        $(function () {
            $('.anythingSlider').anythingSlider({
                easing: "easeOutQuint",        // Anything other than "linear" or "swing" requires the easing plugin
                autoPlay: false,                 // This turns off the entire FUNCTIONALY, not just if it starts running or not.
                delay: 6000,                    // How long between slide transitions in AutoPlay mode
                startStopped: false,            // If autoPlay is on, this can force it to start stopped
                animationTime: 600,             // How long the slide transition takes
                hashTags: false,                 // Should links change the hashtag in the URL?
                buildNavigation: true,          // If true, builds and list of anchor links to link to each slide
        		pauseOnHover: true,             // If true, and autoPlay is enabled, the show will pause on hover
        		startText: "Go",             // Start text
		        stopText: "Stop",               // Stop text
		        navigationFormatter: formatText       // Details at the top of the file on this use (advanced use)
            });
            $("#thumbNav a").click(function(){
				var obj_index = $(this).index()+1;
				callcontent(obj_index);
				//alert(obj_index);
                //$('.anythingSlider').anythingSlider(obj_index);
            });
			
        });
		
});