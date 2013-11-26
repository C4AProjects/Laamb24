<?php get_header(); 

/*Template name: Contact Us*/
global $post;
?>
<section class="row">
<?php if (has_post_thumbnail( $post->ID ) ){ ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<?php } else { ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( 11 ), 'single-post-thumbnail' ); ?>
<?php } ?>
<div class="sub-page-head">
<header class="entry-header" style="background:transparent url(<?php echo $image[0]; ?>) no-repeat right top;">				
    <h1 class="entry-title"><?php the_title(); ?>
    <span><?php if( $post->post_excerpt ) {  echo $post->post_excerpt;  } ?></span>
    </h1>
</header></div><!-- .entry-header -->
<div id="banner-shadow"></div>
<div id="content" role="main">

    	<div class="two-col one lft sidebar">
          	<aside class="rounded-big">
            <?php get_sidebar(); ?>
            </aside>
        </div>
        <div class="two-col two lft sub-page">

            <div class="main-content">
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
				<div class="contact-form">
<h2 class="ctitle"><?php if( $post->post_excerpt ) {  echo $post->post_excerpt;  } ?></h2>
	<div id="container_1">
    	<div class="block" id="contact-info" style="width:300px; float:left; margin-right:20px;">
            <div class="inner">
            	<div class="box1">
                <h3>Email Us</h3>
                <span class="txt"><a href="mailto:<?php echo get_option('kava_contact_email'); ?>" style="display:inline;"><?php echo str_replace('@','<code>@</code>',get_option('kava_contact_email')); ?></a></span>
                </div><br class="clr" /><br class="clr" /><br class="clr" />
                <div class="box2">
                <h3>Phone</h3>
                <span class="txt"><?php echo get_option('kava_contact_phone1'); ?></span>
                <span class="txt"><?php echo get_option('kava_contact_phone2'); ?></span>
                </div>
                <br class="clr" /><br class="clr" />
                <!--<h3>Stay Connected</h3>
                <ul id="follow-us">
      <li><a target="_blank" id="fbk" href="#">Facebook</a></li>
      <li><a target="_blank" id="twt" href="#">Twitter</a></li>
      <li><a target="_blank" id="lin" href="#">LinkedIn</a></li>
    </ul>-->
            </div>
        </div>
        <div class="block" style="width:300px; float:left;">
        <div id="contact-form">
        	<div class="inner">
            <h3>Our Office</h3>
            <span class="txt"><?php echo get_option('kava_contact_location'); ?></span>
            <br class="clr" /><br class="clr" /><br class="clr" />
            <h3>Mailing Address</h3>
            <span class="txt"><?php echo get_option('kava_contact_address'); ?></span>
            </div><br class="clr" />
             <div class="contact_bar">
		   <a target="_blank" id="lin" href="#">Get Directions</a>
		 </div>   
            </div>
        </div>
    </div> 
    <br class="clr" /> <br class="clr" /> 
    <div id="container_3">
    
    </div>
    <div id="container_2"><br class="clr" /> <br class="clr" /> 
    	<h3>Alternatively use the Contact Form below to get in touch</h3>
        <form method="post" action="<?php echo get_template_directory_uri(); ?>/contact_ajax.php" class="contactform rounded shadow" name="contactusform" id="contactusform">            
            <fieldset>
            <table width="100%" id="form-content">
  <tr>
    <td colspan="3"><div id="summary"></div></td>
    </tr>
  <tr>
    <td width="57%"><div>
                  <label for="name">First Name<span class="required">*</span></label>
                        <input type="text" size="37" name="name" id="name" title="Enter First Name!" class="text" value=""/>
                    </div> 
        <div>
                        <label for="name2">Last Name<span class="required">*</span></label>
                        <input type="text" size="37" name="name2" id="name2" title="Enter Last Name!" class="text" value=""/>
                    </div>                   
        <div>
                        <label for="email">Email Address<span class="required">*</span></label>
                        <input type="text" size="37" name="email" id="email" title="Enter a valid Email Address" class="text" value=""/>
                      </div>            
        <div>
                        <label for="phone">Phone Number</label>
                        <input type="text" size="37" name="phone" id="phone" title="Enter Phone Number" class="text" value=""/>
                    </div>
                    <div class="captcha">
         	<label for="answer">Type "angio" in the box below<span class="required">*</span></label>
            <input type="text" name="answer" id="answer" class="text" value=""/>
         </div>
    </td>
    <td width="3%">&nbsp;</td>
    <td width="40%"><div>
                    <label for="subject">Subject<span class="required">*</span></label>
                    	<select name="subject" id="subject" style="width:20em;">
                    	  <option value="0">Select subject</option>
                    	  <option value="feedback">Feedback</option>
                    	  <option value="enquiry">Enquiry</option>
                          <option value="request">Request a Quote</option>                        
                        </select>
                    </div>
        <div>	
                        <label for="comments">Comments</label>
                        <textarea rows="8" name="comments" id="comments" style="width:20em;" title="Enter message!" class="text"/></textarea>
                     </div>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div class="button">
                            <input type="submit" value=" Submit  &raquo; " class="btn2" id="submit"/>
                        </div>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table> 
<input name="form_name" type="hidden" value="contactusform" />
                        <div id="result">
                        
                        </div>
            </fieldset>
            </form>
    </div>
    <br class="clr" />
</div>
				
            </div><br class="clr" /> 
                   
        </div>
        <br class="clr" />        
</div>
</section>

<?php get_footer(); ?>