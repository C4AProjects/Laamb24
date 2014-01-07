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
<body  class="<?php global $pagename,$post;
$mlinks = array('top-stories','rumors','news','videos','fashion-style','legends'); 
if (is_single()) { 
$category = get_the_category($post->
  ID);
global $catslug, $catname;
$catslug = $category[0]->slug;
$catname = $category[0]->cat_name;
 echo $catslug; }else
if ($pagename && in_array($pagename,$mlinks) ) { echo $pagename; }
else { echo 'top-stories'; } 
?>">
  <div id="page-wrapper">
    <div style="display:none">
      <!-- Registration -->
      <div id="register-form">
        <div class="title">
          <h1>Sign Up for Dunk360</h1>
        </div>
        <form action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>
          " method="post">
          <fieldset>
            <div class="inline">
              <label for="user_login">Username</label>
              <input type="text" name="user_login" value="Username" id="user_login" class="text"/>
            </div>
            <div class="inline">
              <label for="user_email">Email</label>
              <input type="text" name="user_email" value="E-Mail" id="user_email" class="text" />
            </div>

            <div class="btn-submit">
              <input type="submit" value="   Sign Up   " class="btn" id="register-btn" />
            </div>
            <p class="statement">A password will be e-mailed to you.</p>
            <div class="register-action">
              <p>Sign Up with Facebook</p>
              <?php do_action('register_form'); ?></div>
          </fieldset>
        </form>
      </div>
    </div>
    <!-- /Registration -->

    <header role="banner" id="header">
    <div class="container_12">
        <?php echo do_shortcode('[do_widget "Twitter Feed Ticker"]'); ?>    
      <div class="inner grid_5">
        <div id="logo">
          <h1>
            <a href="<?php echo get_option('home'); ?>/">
              <img src="<?php echo get_template_directory_uri(); ?>/images/logo/laamb24_logo.png" alt="" style="width:415px;">
              <span class="blog_desc"><span class="part1"><?php _e("Number #1 Website in ") ?></span><span class="part2"><?php _e("Senegalese wrestling") ?></span></span>
              <span class="blog_desc sub"><?php _e("African Martial Art") ?></span>
              <!-- <span>
                <?php //bloginfo('name'); ?>
                |
                <?php //bloginfo('description'); ?></span> -->
            </a>
          </h1>
        </div>
        <section id="social-login" class="rgt">
          <div id="social-interest">
            <div class="social-icons">
              <a href="http://pinterest.com/dunk360/nba/" target="_blank"  id="pinterest">
                <span>Pinterest</span>
              </a>
              <a href="http://twitter.com/theDunk360" target="_blank"  id="twitter">
                <span>Twitter</span>
              </a>
              <a href="http://www.facebook.com/Dunk360" target="_blank"  id="facebook">
                <span>Facebook</span>
              </a>
              <?php if ( is_user_logged_in() ) { ?>
              <a href="<?php echo wp_logout_url(get_permalink()); ?>
                " title="
                <?php _e('Log Out','dunk360');?>
                " id="register-lnk">
                <?php _e('Log Out','dunk360');?></a>
              <?php } else { ?>
              <a href="#register-form"  id="register-lnk" class="show register-button">Register</a>
              <?php } ?></div>
          </div>

          <div id="connect-login">
            <?php
            if ( is_user_logged_in()  ) { ?>
            <?php _e('Logged in as: ','dunk360').' '?>
            <a href="<?php echo admin_url(); ?>
              profile.php">
              <?php global $user_identity; echo $user_identity; ?></a>
            .
            <?php
            } else {
              //use custom form instead of wp_login_form();
              ?>
            <div class="login-form">
              <form name="login-form" id="login-form" class="login" action="<?php echo get_option('home'); ?>
                /wp-login.php" method="post">
                <fieldset>
                  <div class="login-forms-details">
                    <div class="inline">
                      <label for="log">Username</label>
                      <input type="text" class="text" name="log" id="log" value="Username" />
                    </div>
                    <div class="inline">
                      <label for="pwd">Password</label>
                      <input type="password" class="text" name="pwd" id="pwd" value="Password" />
                    </div>
                    <input type="image" id="btn-login" class="submit" src="<?php echo get_template_directory_uri(); ?>/images/btn_login.png" alt="Go"></div>
                  <div class="fbconnect">
                    <?php do_action('login_form'); ?></div>

                </fieldset>
              </form>
            </div>

            <?php
  }
?></div>
        </section>
      </div>
      <div class="menu grid_4">
        <div id="social_media_links">
          <ul>
            <li id="facebook_icon">
              <a id="facebook_link" href="#">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icons/facebook-icon.png" alt="facebook"></a>
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
        <nav role="navigation" id="main_menu">
          <?php  wp_nav_menu(array('menu' =>
          'Primary Menu', 'container' => false, 'menu_class' => '', 'theme_location' => 'primary', 'link_before' => '', 'link_after' => '
          <span></span>
          ' )); ?>
        </nav>
        <div id="search-box">
          <?php get_search_form(); ?>
        </div>    
      </div>
    </div>
    </header>
    <div id="content-wrapper">
      <div class="container_12" id="body-content-wrap">
        <?php include('templates/page-leftside-advert.php'); ?>
        <?php include('templates/page-rightside-advert.php'); ?>
        <?php include('templates/top_advert.php'); ?>
        <!--
    <div id="main-menu" class="menu row">
        <nav role="navigation">
          <?php  wp_nav_menu(array('menu' =>
          'Primary Menu', 'container' => false, 'menu_class' => '', 'theme_location' => 'primary', 'link_before' => '', 'link_after' => '
          <span></span>
          ' )); ?>
        </nav>
        <div id="search-box">
          <?php get_search_form(); ?></div>
      </div>
      -->