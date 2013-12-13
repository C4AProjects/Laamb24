<!DOCTYPE html>
<html <?php language_attributes(); if ( ( is_home() || is_front_page() ) )
    echo ''; else echo ' class="page"';
 ?>
  >
<head>
  <meta charset="<?php bloginfo('charset'); ?>
  " />
  <?php if (is_search()) { ?>
  <meta name="robots" content="noindex, nofollow" />
  <?php } ?>
  <title><?php          if (function_exists('is_tag') && is_tag()) {             single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }          elseif (is_archive()) {             wp_title(''); echo ' Archive - '; }          elseif (is_search()) {             echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }          elseif (!(is_404()) && (is_single()) || (is_page())) {             wp_title(''); echo ' - '; }          elseif (is_404()) {             echo 'Not Found - '; }          if (is_home()) {             bloginfo('name'); echo ' - '; bloginfo('description'); }          else {              bloginfo('name'); }          if ($paged>1) {             echo ' - page '. $paged; }       ?></title>
  <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/grid.css" type="text/css">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" >
  <!--[if lt IE 9]>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>
  /css/ie.css" type="text/css" media="all" />
  <![endif]-->
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>
  ">
  <?php wp_head(); ?>
  <!-- Allows HTML5 elements to work inside IE6-8 -->
  <script src="<?php bloginfo('template_directory'); ?>/js/html5.js"></script>

</head>
<body class="undercons">
<div class="cons_wrapper">
	<div class="ucontainer top">
		    <div id="logo">
          <h1>            
              <img src="<?php echo get_template_directory_uri(); ?>/images/logo/laamb24_logo.png" alt="" style="width:415px;">
              <span class="blog_desc"><span class="part1"><?php _e("Number #1 Website in ") ?></span><span class="part2"><?php _e("Senegalese wrestling") ?></span></span>
          </h1>
        </div>
        <div class="menu grid_4">
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
      <div style="">
      <!-- Registration -->
      <div id="register-form">
        <div class="title">
          <h1>Sign Up !</h1>
        </div>
        <form action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>
          " method="post">
          <fieldset>
            <div class="">
              <label for="user_login">Enter your Name</label>
              <input type="text" name="user_login" value="Username" id="user_login" class="text"/>
            </div>
            <div class="">
              <label for="user_email">Enter your Email</label>
              <input type="text" name="user_email" value="E-Mail" id="user_email" class="text" />
            </div>

            <div class="btn-submit">
              <input type="submit" value="   Sign Up   " class="btn" id="register-btn" />
            </div>
            <p class="statement">A password will be e-mailed to you.</p>
            <div class="register-action">
              <!-- <p>Sign Up with Facebook</p> -->
              <?php //do_action('register_form'); ?></div>
          </fieldset>
        </form>
      </div>
    </div>
	</div>	
</div>
<div class="ucontainer">
		<h4 class="category">About Us</h4>
		<div class="main-content">
			Lorem ipsum dolor sit amet, mel errem congue noluisse et. Homero minimum interesset no mel, mel ut wisi veritus insolens. Probo percipit platonem eu vis, eam invenire sadipscing ne. Te adhuc movet scaevola vis. Sit ea exerci numquam inimicus, ad debet putent comprehensam nam.
		</div>
	</div>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.1.8.1.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.anythingslider.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox-1.3.4.pack.js"></script>  
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.2.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.mousewheel-3.0.4.pack.js"></script>  
<script type="text/javascript">
jQuery("#user_login",jQuery('#register-form')).focus(function(){if(this.value=='Username')this.value='';});
jQuery("#user_login",jQuery('#register-form')).blur(function(){if(this.value=='') this.value='Username';});
jQuery("#user_email",jQuery('#register-form')).focus(function(){if(this.value=='E-Mail')this.value='';});
jQuery("#user_email",jQuery('#register-form')).blur(function(){if(this.value=='') this.value='E-Mail';});
</script>
<?php wp_footer(); ?>	

</body>
</html>