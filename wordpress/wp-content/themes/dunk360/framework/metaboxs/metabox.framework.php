<?php
/*******************************************************************************
 * Kava Metaboxes FrameWork
 * @package KavaTheme
 * @since Kava 1.0
*******************************************************************************/
$key = $themename;

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_meta_box');

$key = $themename;

/*-------------------------------------------------------------
~~~~~~~~~~Create Meta Box ~~~~~~~~~~~
-------------------------------------------------------------*/
function create_meta_box() {

	if( function_exists( 'add_meta_box' ) ) {

		add_meta_box('slider-meta-box', 'Slider Details', 'kava_render_slides', 'slides', 'normal', 'high');
		add_meta_box('boxes-meta-box', 'Featured Box Order', 'kava_render_boxes', 'featured-boxes', 'normal', 'high');
		//add_meta_box('staff-meta-box', 'Staff Position', 'kava_render_staff', 'staffs', 'normal', 'high');
		//add_meta_box('insights-meta-box', 'PDF Link', 'kava_render_insights', 'insights-articles', 'normal', 'high');
		add_meta_box('news-meta-box', 'News Link', 'kava_render_news', 'news', 'normal', 'high');
	}

}




/*-------------------------------------------------------------
~~~~~~~~~Display Slider Url Meta Box ~~~~~~~~
-------------------------------------------------------------*/
function kava_render_slides(){
	global $post, $meta_boxes_slider_url, $key;
?>
<div>
<table width="100%">
<?php

	wp_nonce_field( plugin_basename( __FILE__ ), $key . '_wpnonce', false, true );

	foreach($meta_boxes_slider_url as $meta_box) {
	$data = get_post_meta($post->ID, $key, true);
?>

	<tr>
	<td width="30%" valign="top">
	<label for="<?php echo $meta_box[ 'id' ]; ?>"><?php echo $meta_box[ 'name' ]; ?></label>
	</td>
    <td valign="top">
	<?php if($meta_box['type']=="text") :?>
	<input type="text" name="<?php echo $meta_box[ 'id' ]; ?>"  value="<?php if (isset($data[$meta_box['id']]) && $data[$meta_box['id']] != "") { echo htmlspecialchars( $data[$meta_box['id']] ); } else { echo $meta_box['std']; } ?>" style="width:98%;" />
	<?php endif; ?>

	<?php if($meta_box['type']=="textarea") :?>
	<textarea name="<?php echo $meta_box[ 'id' ]; ?>" style="width:98%;"  ><?php if (isset($data[$meta_box['id']]) && $data[$meta_box['id']] != "") { echo htmlspecialchars( $data[$meta_box['id']] ); } else { echo $meta_box['std']; } ?></textarea>
	<?php endif; ?>
<br />
	<small><?php echo $meta_box[ 'desc' ]; ?></small>
	</td>
	</tr>
	<tr><td colspan="2">&nbsp;</td></tr>
<?php } ?>
</table>
</div>
<?php

}

/*-------------------------------------------------------------
~~~~~~~~~Display Featured Box Meta Box ~~~~~~~~
-------------------------------------------------------------*/
function kava_render_boxes(){
	global $post, $meta_boxes_box_url, $key;
?>
<div>
<table width="100%">
<?php

	wp_nonce_field( plugin_basename( __FILE__ ), $key . '_wpnonce', false, true );

	foreach($meta_boxes_box_url as $meta_box) {
	$data = get_post_meta($post->ID, $key, true);
?>

	<tr>
	<td width="30%" valign="top">
	<label for="<?php echo $meta_box[ 'id' ]; ?>"><?php echo $meta_box[ 'name' ]; ?></label>
	</td>
    <td valign="top">
	<?php if($meta_box['type']=="text") :?>
	<input type="text" name="<?php echo $meta_box[ 'id' ]; ?>"  value="<?php if (isset($data[$meta_box['id']]) && $data[$meta_box['id']] != "") { echo htmlspecialchars( $data[$meta_box['id']] ); } else { echo $meta_box['std']; } ?>" style="width:98%;" />
	<?php endif; ?>
<br />
	<small><?php echo $meta_box[ 'desc' ]; ?></small>
	</td>
	</tr>
	<tr><td colspan="2">&nbsp;</td></tr>
<?php } ?>
</table>
</div>
<?php

}

/*-------------------------------------------------------------
~~~~~~~~~Display Staff Meta Box ~~~~~~~~
-------------------------------------------------------------*/
function kava_render_staff(){
	global $post, $meta_boxes_staff_position, $key;
?>
<div>
<table width="100%">
<?php

	wp_nonce_field( plugin_basename( __FILE__ ), $key . '_wpnonce', false, true );

	foreach($meta_boxes_staff_position as $meta_box) {
	$data = get_post_meta($post->ID, $key, true);
?>

	<tr>
	<td width="30%" valign="top">
	<label for="<?php echo $meta_box[ 'id' ]; ?>"><?php echo $meta_box[ 'name' ]; ?></label>
	</td>
    <td valign="top">
	<?php if($meta_box['type']=="text") :?>
	<input type="text" name="<?php echo $meta_box[ 'id' ]; ?>"  value="<?php if (isset($data[$meta_box['id']]) && $data[$meta_box['id']] != "") { echo htmlspecialchars( $data[$meta_box['id']] ); } else { echo $meta_box['std']; } ?>" style="width:98%;" />
	<?php endif; ?>
<br />
	<small><?php echo $meta_box[ 'desc' ]; ?></small>
	</td>
	</tr>
	<tr><td colspan="2">&nbsp;</td></tr>
<?php } ?>
</table>
</div>
<?php

}

/*-------------------------------------------------------------
~~~~~~~~~Display Insights pdf Meta Box ~~~~~~~~
-------------------------------------------------------------*/
function kava_render_insights(){
	global $post, $meta_boxes_insights_pdf, $key;
?>
<div>
<table width="100%">
<?php

	wp_nonce_field( plugin_basename( __FILE__ ), $key . '_wpnonce', false, true );

	foreach($meta_boxes_insights_pdf as $meta_box) {
	$data = get_post_meta($post->ID, $key, true);
	//global $post;
	//$custom  = get_post_custom($post->ID);
	//$link    = $custom["pdf_url"][0];
	//$count   = 0;
	//echo '<div class="link_header">';
	$query_pdf_args = array(
		'post_type' => 'attachment',
		'post_mime_type' =>'application/pdf',
		'post_status' => 'inherit',
		'posts_per_page' => -1,
		);
	$query_pdf = new WP_Query( $query_pdf_args );
	$pdf = array();
	
	//echo '<div class="pdf_count"><span>Files:</span> <b>'.$count.'</b></div>';
	
?>
	<tr>
	<td width="30%" valign="top">
	<label for="<?php echo $meta_box[ 'id' ]; ?>"><?php echo $meta_box[ 'name' ]; ?></label>
	</td>
    <td valign="top">
	<?php if($meta_box['type']=="select") :?>
	<select name="<?php echo $meta_box[ 'id' ]; ?>" style="width:98%;">
	<option value="">Select PDF file</option>
    <?php 
	foreach ( $query_pdf->posts as $file) {
	   if(isset($data[$meta_box['id']]) && $data[$meta_box['id']] != "" && $data[$meta_box['id']] == $pdf[]= $file->guid){
	      echo '<option value="'.$pdf[]= $file->guid.'" selected="true">'. htmlspecialchars( $pdf[]= $file->guid).'</option>';
		 }else{
	      echo '<option value="'.$pdf[]= $file->guid.'">'. htmlspecialchars($pdf[]= $file->guid).'</option>';
		 }
		//$count++;
	}
	?>
	</select>
    <br /><small><?php echo $meta_box[ 'desc' ]; ?></small>
	<?php endif; ?>	
	</td>
	</tr>
	<tr><td colspan="2">&nbsp;</td></tr>
<?php } ?>
</table>
</div>
<?php

}

/*-------------------------------------------------------------
~~~~~~~~~Display News url Meta Box ~~~~~~~~
-------------------------------------------------------------*/
function kava_render_news(){
	global $post, $meta_boxes_news_url, $key;
?>
<div>
<table width="100%">
<?php

	wp_nonce_field( plugin_basename( __FILE__ ), $key . '_wpnonce', false, true );

	foreach($meta_boxes_news_url as $meta_box) {
	$data = get_post_meta($post->ID, $key, true);
?>

	<tr>
	<td width="30%" valign="top">
	<label for="<?php echo $meta_box[ 'id' ]; ?>"><?php echo $meta_box[ 'name' ]; ?></label>
	</td>
    <td valign="top">
	<?php if($meta_box['type']=="text") :?>
	<input type="text" name="<?php echo $meta_box[ 'id' ]; ?>"  value="<?php if (isset($data[$meta_box['id']]) && $data[$meta_box['id']] != "") { echo htmlspecialchars( $data[$meta_box['id']] ); } else { echo $meta_box['std']; } ?>" style="width:98%;" />
	<?php endif; ?>
<br />
	<small><?php echo $meta_box[ 'desc' ]; ?></small>
	</td>
	</tr>
	<tr><td colspan="2">&nbsp;</td></tr>
<?php } ?>
</table>
</div>
<?php

}

/*-------------------------------------------------------------
~~~~~~~~~Save  Meta Box ~~~~~~~~
-------------------------------------------------------------*/
function save_meta_box( $post_id ) {
	global $post,  $meta_boxes_slider_url, $meta_boxes_box_url, $meta_boxes_staff_position,$meta_boxes_insights_pdf, $meta_boxes_news_url, $key;

//Slider
	foreach( $meta_boxes_slider_url as $meta_box ) {
		$_post_meta_box = isset($_POST[ $meta_box[ 'id' ] ]) ? $_POST[ $meta_box[ 'id' ] ] : ''; //Fixed Undefined Notice
		$data[ $meta_box[ 'id' ] ] = $_post_meta_box;
	}
	
//Featured Boxes
	foreach( $meta_boxes_box_url as $meta_box ) {
		$_post_meta_box = isset($_POST[ $meta_box[ 'id' ] ]) ? $_POST[ $meta_box[ 'id' ] ] : ''; //Fixed Undefined Notice
		$data[ $meta_box[ 'id' ] ] = $_post_meta_box;
	}	
	
//Staffs
	/*foreach( $meta_boxes_staff_position as $meta_box ) {
		$_post_meta_box = isset($_POST[ $meta_box[ 'id' ] ]) ? $_POST[ $meta_box[ 'id' ] ] : ''; //Fixed Undefined Notice
		$data[ $meta_box[ 'id' ] ] = $_post_meta_box;
	}*/
	
//Insights
/*	foreach( $meta_boxes_insights_pdf as $meta_box ) {
		$_post_meta_box = isset($_POST[ $meta_box[ 'id' ] ]) ? $_POST[ $meta_box[ 'id' ] ] : ''; //Fixed Undefined Notice
		$data[ $meta_box[ 'id' ] ] = $_post_meta_box;
	}*/

//News
	foreach( $meta_boxes_news_url as $meta_box ) {
		$_post_meta_box = isset($_POST[ $meta_box[ 'id' ] ]) ? $_POST[ $meta_box[ 'id' ] ] : ''; //Fixed Undefined Notice
		$data[ $meta_box[ 'id' ] ] = $_post_meta_box;
	}
	
	$_post_key = isset($_POST[ $key . '_wpnonce' ]) ? $_POST[ $key . '_wpnonce' ] : ''; 
	if ( !wp_verify_nonce( $_post_key, plugin_basename(__FILE__) ) )
	return $post_id;

	if ( !current_user_can( 'edit_post', $post_id ))
	return $post_id;

	update_post_meta( $post_id, $key, $data );

}

?>