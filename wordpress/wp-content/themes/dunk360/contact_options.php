<?php



// create custom plugin settings menu

add_action('admin_menu', 'km_create_menu');



function km_create_menu() {



	//create new top-level menu

	add_menu_page('Contact Options Settings', 'Contact Options', 'add_users', 'contact_options', 'km_settings_page', get_bloginfo("template_url") .'/images/icons/box.png');



	//call register settings function

	add_action( 'admin_init', 'register_mysettings' );

}





function register_mysettings() {

	//register our settings

	//register_setting( 'km-settings-group', 'contact_details' );

	

	register_setting( 'km-settings-group', 'kava_contact_email' );

	register_setting( 'km-settings-group', 'kava_contact_phone1' );

	register_setting( 'km-settings-group', 'kava_contact_phone2' );

	

	register_setting( 'km-settings-group', 'kava_contact_location' );

	register_setting( 'km-settings-group', 'kava_contact_address' );

	register_setting( 'km-settings-group', 'kava_contact_map' );
	
	register_setting( 'km-settings-group', 'kava_contact_analytics' );
}



function km_settings_page() {

?>

<div class="wrap">



<form method="post" action="options.php">

    <?php settings_fields( 'km-settings-group' ); ?>

    <table class="form-table">

        <tr valign="top">

        <th scope="row" colspan="2"><h3 style="font-size:20px;">Contact Us page options</h3></th>

        <td>&nbsp;</td>

        </tr>

        

        

        <tr valign="top">

        <th scope="row">Email</th>

        <td><input type="text" size="50" name="kava_contact_email" value="<?php echo get_option('kava_contact_email'); ?>" /></td>

        </tr>

        <tr valign="top">

        <th scope="row">Phone 1</th>

        <td><input name="kava_contact_phone1" type="text" id="kava_contact_phone1" value="<?php echo get_option('kava_contact_phone1'); ?>" size="50" /></td>

        </tr>

        <tr valign="top">

        <th scope="row">Phone 2</th>

        <td><input name="kava_contact_phone2" type="text" id="kava_contact_phone2" value="<?php echo get_option('kava_contact_phone2'); ?>" size="50" /></td>

        </tr>

        <tr valign="top">

        <th scope="row"><br /></th>

        <td></td>

        </tr>

        

        <tr valign="top">

        <th scope="row">Location</th>

        <td><textarea name="kava_contact_location" cols="50" id="kava_contact_location"><?php echo get_option('kava_contact_location'); ?></textarea></td>

        </tr>

        <tr valign="top">

        <th scope="row">Address</th>

        <td><textarea name="kava_contact_address" cols="50" id="kava_contact_address"><?php echo get_option('kava_contact_address'); ?></textarea></td>

        </tr>

        <tr valign="top">

        <th scope="row">Google Map Text</th>

        <td><textarea name="kava_contact_map" cols="50" rows="5" id="kava_contact_map"><?php echo get_option('kava_contact_map'); ?></textarea></td>

        </tr>
<tr valign="top">

        <th scope="row">Google Analytics Text</th>

        <td><textarea name="kava_contact_analytics" cols="50" rows="5" id="kava_contact_analytics"><?php echo get_option('kava_contact_analytics'); ?></textarea></td>

        </tr>
        <tr valign="top">

        <th scope="row"><br /></th>

        <td></td>

        </tr>

        

        <tr valign="top">

        <th colspan="2" scope="row">&nbsp;</th>

        </tr>

        <tr valign="top">

        <th scope="row"><br /></th>

        <td></td>

        </tr>

        

    </table>

    

    <p class="submit">

    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />

    </p>



</form>

</div>

<?php } ?>