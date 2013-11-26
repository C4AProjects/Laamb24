<?php
/*******************************************************************************
 *This file sets up the the custom widgets,
 * This widget area is used to store feature services section.
 * @package kavaTheme
 * @since kava 1.0
*******************************************************************************/

/*-------------------------------------------------------------
~~~~~~~~~~~~Class Widget~~~~~~~~~~~~~
Name:Contact
Slug: Contact
-------------------------------------------------------------*/
class Contact_Widget extends WP_Widget{

	/** Construction function**/
	function Contact_Widget(){
		global $themename, $shortname;
		$title_ops = __($themename.'&raquo; Contact  ','kava');
		$widget_ops = array('classname'=>'widget-contact','description'=>__('This is recent contact section. Just use for footer widget area.','kava'));
		$control_ops = array('width'=>235);
		$this->WP_Widget($shortname. '_contact',$title_ops,$widget_ops,$control_ops);
	}


	/** Function defined form**/
	function form($instance){
		$instance = wp_parse_args((array)$instance,array(
			'title'=> '',
			'link'=> '',
			'description'=> '',
			'icon'=> ''
		));

		$title = htmlspecialchars($instance['title']);
		$link = $instance['link'];
		$description = $instance['description'];
		$icon = $instance['icon'];
		$icon_id = $this->get_field_id('icon');

	}


	/** Function defined update**/
	function update($new_instance,$old_instance){

		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['link'] = stripslashes($new_instance['link']);
		$instance['description'] = stripslashes($new_instance['description']);
		$instance['icon'] = stripslashes($new_instance['icon']);

		return $instance;
	}


	/** Definition of widget function that displays a web page**/
	function widget($args,$instance){
		extract($args);
		$title = $instance['title'];
		$link = $instance['link'];
		$description = $instance['description'];
		$icon_id = $this->get_field_id('icon');
		$icon = get_option($icon_id);

		echo $before_widget; 
		
 $page_dat_id = 72;
 $page_dat = get_page($page_dat_id);
 
?>
<div class="block lft" id="contacts-info">
         <h3><a href="<?php  echo get_page_link( $page_dat_id ); ?>"><?php echo $page_dat->post_title; ?></a></h3>
        	<ul>	
	<li>Email: <a href="mailto:<?php echo get_option('kava_contact_email'); ?>" style="display:inline;"><?php echo str_replace('@','<code>@</code>',get_option('kava_contact_email')); ?></a><br />
    Phone 1: <?php echo get_option('kava_contact_phone1'); ?><br />
Phone 2: <?php echo get_option('kava_contact_phone2'); ?></li>
<li><?php echo get_option('kava_contact_address'); ?></li>
</ul>
         </div>
         <?php
		echo $after_widget; 

	}

}// end Class

?>