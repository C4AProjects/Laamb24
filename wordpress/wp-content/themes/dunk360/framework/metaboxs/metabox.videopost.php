<?php
/*******************************************************************************
 * Kava Metaboxes VIDEO Boxes
 * @package KavaTheme
 * @since Kava 1.0
*******************************************************************************/
$key = $themename;

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_meta_box');

/*-------------------------------------------------------------
~~~~~~~~~~Create Meta Box ~~~~~~~~~~~
-------------------------------------------------------------*/
function create_meta_box() {

	if( function_exists( 'add_meta_box' ) ) {

		add_meta_box('boxes-meta-box', 'Video Post Details', 'kava_render_boxes', 'post', 'normal', 'high');
	}

}

$meta_boxes_videopost = array(
		array("id" => "youtube_video_embedded_url",
				"name" => "Youtube Video Embedded URL",
				"type" => "text",
				"std" => "",
				"desc" => "Enter in the Embedded URL of the Youtube Video",
			),		
	array("id" => "vimeo_video_embedded_url",
				"name" => "Vimeo Video Embedded URL",
				"type" => "text",
				"std" => "",
				"desc" => "Enter in the Embedded URL of the Vimeo Video",
			),
			
);


/*-------------------------------------------------------------
~~~~~~~~~Display Featured Box Meta Box ~~~~~~~~
-------------------------------------------------------------*/
function kava_render_boxes(){
	global $post, $meta_boxes_videopost, $key;
?>
<div>
<table width="100%">
<?php

	wp_nonce_field( plugin_basename( __FILE__ ), $key . '_wpnonce', false, true );

	foreach($meta_boxes_videopost as $meta_box) {
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
	global $post,  $meta_boxes_videopost, $key;
	
//Video post meta
	foreach( $meta_boxes_videopost as $meta_box ) {
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