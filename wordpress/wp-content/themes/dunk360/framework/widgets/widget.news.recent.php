<?php
/*******************************************************************************
 *This file sets up the the custom widgets,
 * This widget area is used to store feature services section.
 * @package kavaTheme
 * @since kava 1.0
*******************************************************************************/

/*-------------------------------------------------------------
~~~~~~~~~~~~Class Widget~~~~~~~~~~~~~
Name:News_Recent
Slug: News_Recent
-------------------------------------------------------------*/
class News_Recent_Widget extends WP_Widget{

	/** Construction function**/
	function News_Recent_Widget(){
		global $themename, $shortname;
		$title_ops = __($themename.'&raquo; News Recent ','kava');
		$widget_ops = array('classname'=>'widget-news-recent','description'=>__('This is recent news section. Just use for footer widget area.','kava'));
		$control_ops = array('width'=>235);
		$this->WP_Widget($shortname. '_news_recent',$title_ops,$widget_ops,$control_ops);
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

		/*
		echo '<div class="ht-widget-wrap ht-widget-upload">';
		echo '<label for="'.$this->get_field_id('icon').'">'; _e('Icon:','hawktheme'); echo'</label>';
		echo $output = hawktheme_uploader($icon_id,null,null);
		echo '<p class="ht-description">';  
		_e('If you can not upload, please refresh your browser before uploading!','hawktheme');
		echo '</p>';
		echo '</div>';
		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('title').'">'; _e('Title:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" type="text" value="'.$title.'" />';
		echo '</div>';
		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('link').'">'; _e('Link:','hawktheme'); echo'</label>';
		echo '<input  id="'.$this->get_field_id('link').'" name="'.$this->get_field_name('link').'" type="text" value="'.$link.'" />';
		echo '</div>';
		echo '<div class="ht-widget-wrap">';
		echo '<label for="'.$this->get_field_id('description').'">'; _e('Description:','hawktheme'); echo'</label>';
		echo '<textarea  id="'.$this->get_field_id('description').'" name="'.$this->get_field_name('description').'"  rows="3">'.$description.'</textarea>';
		echo '</div>';
		*/

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
		
 $page_dat_id = 52;
 $page_dat = get_page($page_dat_id);
 
?><div class="block lft" id="recent-news">
        <h3><a href="<?php  echo get_page_link( $page_dat_id ); ?>"><?php echo $page_dat->post_title; ?></a></h3>
        <?php
wp_reset_query();
	//if(is_page()) {
		$args = array( 
			'post_type' => 'news',
			'posts_per_page' => '2',
			'orderby' => 'date',
			'order' => 'DESC',
			'post_status'		=> 'publish',
			'paged' => 1 
		); 
		query_posts($args);
	//}

	if (have_posts()) : 
?>
    <ul><?php while (have_posts()) : the_post();  ?>
    <li>
                <span class="date-day rounded-big"><?php echo get_the_time(__('j')); ?></span>
                <a href="<?php 
		$my_meta = get_custom_field('kava'); 
		 if($my_meta['external_url']){ 
		  	echo $my_meta['external_url'];
		 } else 
		the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target="_blank" rel="bookmark"><?php the_titlesmall('', '...', true, '24') ?></a>
                <span class="date-month"><?php echo get_the_time(__('F Y')); ?></span>
                </li>
    <?php endwhile; ?>
    </ul>
    <?php endif; ?>
</div><?php wp_reset_query();
		echo $after_widget; 

	}

}// end Class

?>