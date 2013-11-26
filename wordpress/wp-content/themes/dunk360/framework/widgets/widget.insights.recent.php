<?php
/*******************************************************************************
 *This file sets up the the custom widgets,
 * This widget area is used to store feature services section.
 * @package kavaTheme
 * @since kava 1.0
*******************************************************************************/

/*-------------------------------------------------------------
~~~~~~~~~~~~Class Widget~~~~~~~~~~~~~
Name:Insights_Recent
Slug: Insights_Recent
-------------------------------------------------------------*/
class Insights_Recent_Widget extends WP_Widget{

	/** Construction function**/
	function Insights_Recent_Widget(){
		global $themename, $shortname;
		$title_ops = __($themename.'&raquo; Insights Recent ','kava');
		$widget_ops = array('classname'=>'widget-insights-recent','description'=>__('This is recent insights section. Just use for footer widget area.','kava'));
		$control_ops = array('width'=>235);
		$this->WP_Widget($shortname. '_insights_recent',$title_ops,$widget_ops,$control_ops);
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
		
 $page_dat_id = 50;
 $page_dat = get_page($page_dat_id);
 
?><div class="block lft" id="insights-news">
        <h3><a href="<?php  echo get_page_link( $page_dat_id  ); ?>"><?php echo $page_dat->post_title; ?></a></h3>
        <?php
wp_reset_query();
	//if(is_page()) {
		$args = array( 
			'post_type' => 'insights-articles',
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
    <li><a href="<?php $my_meta = get_custom_field('kava');
		if($my_meta['pdf_url']){
			 echo $my_meta['pdf_url'];
		}else
		the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target="_blank" rel="bookmark"><?php the_titlesmall('', '...', true, '58') ?></a></li>
    <?php endwhile; ?>
    </ul>
    <?php endif; ?>
</div><?php wp_reset_query();
		echo $after_widget; 

	}

}// end Class

?>