<?php
/*******************************************************************************
 * The functions for our theme. *
 * Load the theme framework, includes.
 *
 * @package dunk360Theme
 * @since Dunk360 1.0
*******************************************************************************/

/*-------------------------------------------------------------
~~~~~~Theme Name & Version~~~~~~~
-------------------------------------------------------------*/
$themename = "kava";

/*-------------------------------------------------------------
~~~~~~~~~~~~Set File Path~~~~~~~~~~~~ 
-------------------------------------------------------------*/
define('FrameWork', get_template_directory(). '/framework');
// define('Includes', get_template_directory(). '/includes');
//define('Includes_Url', get_template_directory_uri(). '/includes');


/*********** ADDED ***************/
if(function_exists('add_post_type_support'))
{
	add_post_type_support( 'page', 'excerpt' );
	//add_post_type_support( 'news', 'excerpt' );
}

if(function_exists('add_theme_support'))
{
	add_theme_support( 'post-thumbnails' );
	//set_post_thumbnail_size( 320, 160 ); // Normal post thumbnails
	set_post_thumbnail_size( 210, 245 ); // Normal post thumbnails
	
	add_image_size( 'kava-large-slide', 400, 590,true); // Front slider main image
	add_image_size( 'kava-large', 400, 590, true); // Front slider main image
	//add_image_size( 'kava-thumbnail', 320, 160, true); // Front thumbnail image
	//add_image_size( 'kava-thumbnail-bw', 320, 160, true); // To reference the black&amp;white thumbnail in the template files
	add_image_size( 'kava-thumbnail', 210, 245, true); // Front thumbnail image
	add_image_size( 'kava-thumbnail-bw', 210, 245, true); // To reference the black&amp;white thumbnail in the template files
	add_image_size( 'kava-sidebarads', 220, 496,true); // Sidebar ads size	
/*
add_image_size( 'front-image-thumbnail', 150, 150); // Front Image thumbnail size
add_image_size( 'player-image-thumbnail', 125, 125,true); // Player thumbnail size
add_image_size('post-secondary-image-thumbnail', 125, 125);
add_image_size( 'single-image-thumbnail', 650, 1000); // Single Page Image size
add_image_size( 'sidebar-player', 90, 50, true); // sidebar player Image size
add_image_size( 'sidebar-thumbs', 300, 50, true); // sidebar player Image size
add_image_size( 'team_banner', 625, 150, true); // team banner Image size
add_image_size( 'legends_video', 300, 200, true); // team banner Image size
add_image_size( 'front_thumbs_large', 310, 230, true); // Fashion and style second row
*/
}

	

function post_thumb_url($name) {
	global $post, $posts;
	$thumbnail = '';
	ob_start();
	the_post_thumbnail($name);
	$toparse = ob_get_contents();
	ob_end_clean();
	preg_match_all('/src=("[^"]*")/i', $toparse, $img_src);
	$thumbnail = str_replace("\"", "", $img_src[1][0]);
	return $thumbnail;
}

// CUSTOMIZATION LOGIN PAGE, ADMIN FOOTER WITH BRAND LOGO, LINK, AUTHOR
// login page url
function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

// login page logo
/*function custom_login_logo() {
	echo '<style type="text/css">h1 a { background: transparent url('.get_bloginfo('template_directory').'/images/logo.png) 50% 50% no-repeat !important; }</style>';
}
add_action('login_head', 'custom_login_logo');*/


function custom_login_css() {
echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/css/login.css" />';
}

add_action('login_head', 'custom_login_css');

add_filter( 'admin_footer_text', 'my_admin_footer_text' );
function my_admin_footer_text( $default_text ) {
     return '<span id="footer-thankyou">Website managed by <a href="http://www.kavamediagh.com">Kava Media</a><span> | Powered by <a href="http://www.wordpress.org">WordPress</a>';
}


// register site menus
function register_my_menus() {
  // register site menus
	if ( function_exists('register_nav_menus') ) {
		register_nav_menus(
		array(
		'primary' => __( 'Primary Menu' ),
		'secondary' => __( 'Footer Menu' ),
		'other-links' => __( 'Other Menu' )
		)
		);
	}
}
add_action( 'init', 'register_my_menus' );

// remove page ids and class from nav menu
function my_css_attributes_filter($var) {
  return is_array($var) ? array_intersect($var, array('current-menu-item', 'current-menu-parent')) : '';
}
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);

//Replaces "current-menu-item" with "active"
function current_to_active($text){
        $replace = array(
                //List of menu item classes that should be changed to "active"
                'current-menu-item' => 'active',
                'current-menu-parent' => 'active',
                'current-menu-ancestor' => 'active',
        );
        $text = str_replace(array_keys($replace), $replace, $text);
                return $text;
        }
add_filter ('wp_nav_menu','current_to_active');
//Deletes empty classes and removes the sub menu class
function strip_empty_classes($menu) {
    $menu = preg_replace('/ class=""| class="sub-menu"/','',$menu);
    return $menu;
}
add_filter ('wp_nav_menu','strip_empty_classes');


function theme_queue_js(){
  if (!is_admin()){
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
      wp_enqueue_script( 'comment-reply' );
  }
}
add_action('get_header', 'theme_queue_js');

// Get Custom Field
function get_custom_field($key) {
	global $post;
	return $custom_field = get_post_meta($post->ID,$key,true);
}

// limit title length
function the_titlesmall($before = '', $after = '', $echo = true, $length = false) { 
$title = get_the_title();

	if ( $length && is_numeric($length) ) {
		$title = substr( $title, 0, $length );
	}

	if ( strlen($title)> 0 ) {
		if ( strlen($title)> $length && $before != "" && $after != "")
		$title = apply_filters('the_titlesmall', $before . $title . $after, $before, $after);
		if ( $echo )
			echo $title;
		else
			return $title;
	}
}

// short title based on word length...
function short_title($after = '', $length) {
   $mytitle = explode(' ', get_the_title(), $length);
   if (count($mytitle)>=$length) {
       array_pop($mytitle);
       $mytitle = implode(" ",$mytitle). $after;
   } else {
       $mytitle = implode(" ",$mytitle);
   }
       return $mytitle;
}


// short content based on word length...
function short_content($string, $after = '', $length) {
   $mytitle = explode(' ', $string, $length);
   if (count($mytitle)>=$length) {
       array_pop($mytitle);
       $mytitle = implode(" ",$mytitle). $after;
   } else {
       $mytitle = implode(" ",$mytitle);
   }
       return $mytitle;
}


/**
 * Display navigation to next/previous pages when applicable
 */
function kava_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div id="<?php echo $nav_id; ?>" class="pagination">
			<h4 class="assistive-text"><?php _e( 'Article Navigation', 'kava' ); ?></h4>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older entries', 'kava' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer entries <span class="meta-nav">&rarr;</span>', 'kava' ) ); ?></div>
		</div><!-- #nav-above -->
	<?php endif;
}


// custom pagination function
function kava_post_nav($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a class='nav prev' href='".get_pagenum_link(1)."'>PREV</a>";
         // if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>PREV</a>";
         echo "<div class='pagination-center'>";
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }
         echo "</div>";

         if ($paged < $pages && $showitems < $pages) echo "<a class='nav next' href='".get_pagenum_link($paged + 1)."'>NEXT</a>";  
         // if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>NEXT</a>";
         echo "</div>\n";
     }
}

// register sidebars

if ( function_exists('register_sidebar') )
register_sidebar(array(
	'name' => 'Left Sidebar',
	'before_widget' => '<div class="block">',
	'after_widget' => '</div>',
	//'before_title' => '',
	//'after_title' => '',
));
if ( function_exists('register_sidebar') )
register_sidebar(array(
	'name' => 'Right Sidebar',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => '',
));

if ( function_exists('register_sidebar') )
register_sidebar(array(
	'name' => 'Instagram Sidebar',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => '',
));

/** Comment Styles */

if ( ! function_exists( 'dunk_comments' ) ) :
function dunk_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>" class="single-comment clearfix">
				<div class="comment-author vcard"> <?php echo get_avatar($comment,$size='60',$default='<path_to_url>' ); ?></div>
				<div class="comment-meta commentmetadata">
						<?php if ($comment->comment_approved == '0') : ?>
						<em><?php _e('Comment is awaiting moderation','dunk360');?></em> <br />
						<?php endif; ?>
						<h6><?php echo get_comment_author_link(); ?> <span class="comment-time"><?php echo  __('Posted ','dunk360').get_comment_time(); ?></span></h6>
						<?php comment_text() ?>
						<?php edit_comment_link(__('Edit','dunk360'),'  ',''); ?>
						<?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply','dunk360'),'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
				</div>
		</div>
<!-- </li> -->
<?php  }
endif;

function insert_image_src_rel_in_head() {
global $post;
/*if ( !is_singular()) //if it is not a post or a page
return;
if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
$default_image=""; //replace this with a default image on your server or an image in your media library
echo '<meta content="' . $default_image . '" />';
}
else{
$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
echo '<meta content="' . esc_attr( $thumbnail_src[0] ) . '" />';
echo 
}
echo " ";
*/

echo '<meta content="Vi tester Sony PlayStation Vita - Review" property="og:title">';
}

/*-------------------------------------------------------------
~~~~~~~~Load Contact us options ~~~~~~~~
-------------------------------------------------------------*/
require_once("contact_options.php");

/*-------------------------------------------------------------
~~~~~~~~Load Framework ~~~~~~~~
-------------------------------------------------------------*/

/*Load framework file for video post metaboxes*/
require_once(FrameWork. "/metabox.videopost.php");


function bw_images_filter($meta) {
	$file = wp_upload_dir();

	// Need to check to see if their was even a generated 'thumb-m' in case the image uploaded was the appropriate size
	// and therefore will be used in it's largest form
	if (isset($meta['sizes']['kava-thumbnail-bw'])) {
		$file = trailingslashit($file['path']).$meta['sizes']['kava-thumbnail-bw']['file'];

	// The thumbnail didn't get created because the uploaded image was the correct size before scaling / cropping.
	// Need to get base directory instead of path here because the original file already has the year/month structure in it's file attribute.
	} else {
		$file = trailingslashit($file['basedir']).$meta['file'];
		$explodedPath = explode("/", $meta['file']);
		
		// Manually insert the kava-thumbnail-bw that didn't get created upon upload and append '-bw' to the filename
		$explodedFileName = explode(".", $exploded[2]);
		$updatedFileName = $explodedFileName[0] . '-bw.' . $explodedFileName[1];
		$meta['sizes']['kava-thumbnail-bw']['file'] = $updatedFileName;
		$meta['sizes']['kava-thumbnail-bw']['width'] = 210; // Set these dimensions to match the dimensions for the add_image_size above
		$meta['sizes']['kava-thumbnail-bw']['height'] = 245;
	}

	list($orig_w, $orig_h, $orig_type) = @getimagesize($file);
	$image = wp_load_image($file);

	imagefilter($image, IMG_FILTER_GRAYSCALE);
	switch ($orig_type) {
		case IMAGETYPE_GIF:
			$file = str_replace(".gif", "-bw.gif", $file);
			imagegif($image, $file);
			break;
		case IMAGETYPE_PNG:
			$file = str_replace(".png", "-bw.png", $file);
			imagepng($image, $file);
			break;
		case IMAGETYPE_JPEG:
			$file = str_replace(".jpeg", "-bw.jpeg", $file);
			$file = str_replace(".jpg", "-bw.jpg", $file);
			imagejpeg($image, $file);
			break;
	}

	return $meta;
}
add_filter('wp_generate_attachment_metadata','bw_images_filter');

// change default avatar
if ( !function_exists('fb_addgravatar') ) {
function fb_addgravatar( $avatar_defaults ) {
	$myavatar = get_bloginfo('template_directory') . '/images/bg_comment_box.jpg';
	$avatar_defaults[$myavatar] = 'Users';
	$myavatar2 = get_bloginfo('template_directory') . '/images/bg_comment_box.jpg';
	$avatar_defaults[$myavatar2] = 'Dunk360 Avatar';
	return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'fb_addgravatar' ); }

?>