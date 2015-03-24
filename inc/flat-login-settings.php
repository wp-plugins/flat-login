<?php
	function flat_login_settings_head()
	{
		$page = ( isset($_GET['page'] ) ) ? esc_attr( $_GET['page'] ) : false;
		if( 'flat-login' != $page )
	    	return; 
		wp_enqueue_media();
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script('flat_upload_script', plugins_url('assets/js/flat-login-settings-js.js', dirname(__FILE__)), array('jquery'));
	}
	add_action('admin_enqueue_scripts', 'flat_login_settings_head');

	function flat_login_register_settings()
	{
		register_setting('flat-login-settings-group', 'flat_logo_upload');
		register_setting('flat-login-settings-group', 'flat_bg_color');
		register_setting('flat-login-settings-group', 'flat_custom_style');
		register_setting('flat-login-settings-group', 'flat_logo_width');
		register_setting('flat-login-settings-group', 'flat_logo_height');
	}

	function flat_login_create_menu() {

		add_menu_page(__('Flat Login', 'flat-login'), __('Flat Login', 'flat-login'), 'manage_options', 'flat-login', 'flat_login_options_page', plugins_url('assets/images/icon.png', dirname(__FILE__)));	
		add_action('admin_init', 'flat_login_register_settings');
	}
	add_action('admin_menu', 'flat_login_create_menu');
?>
<?php function flat_login_options_page()
	{ ?>
<div class="wrap">
<h2><?php _e('Flat Login Theme Settings','flat-login'); ?></h2>
<?php if(isset($_GET['settings-updated'])) { ?>
	<div id="message" class="updated">
		<p><strong><?php _e('Settings saved.') ?></strong></p>
	</div>
<?php } ?>
<form method="post" action="options.php">
<?php settings_fields('flat-login-settings-group'); ?>
<?php do_settings_sections('flat-login-settings-group'); ?>
    <table class="form-table">
		
		<tr>
		<th scope="row"><?php _e('Customize', 'flat-login'); ?></th>
		<td>
		<label for="flat_custom_style">
		<input name="flat_custom_style" id="flat_custom_style" type="checkbox" value="1" <?php checked( '1', get_option('flat_custom_style')); ?> />
		<?php _e('Activate', 'flat-login'); ?>
		</label>
		<p class="description"><?php _e('Active this option to see the custom styles settings.', 'flat-login'); ?></p>
		</td>
		</tr>

		<tr class="hidetoshow">
        <th scope="row"><?php _e('Login logo URL','flat-login'); ?></th>
        <td>
		<label>
		<input id="flat_logo_upload" type="text" name="flat_logo_upload" value="<?php echo get_option('flat_logo_upload'); ?>"/>
		<input id="upload_logo_button" class="button" type="button" value="Upload Image" />
		</label>
		<p class="description"><?php _e('Enter an URL or upload an image for the logo.', 'flat-login'); ?></p>
		</td>
        </tr>
		
		<tr class="hidetoshow">
        <th scope="row"><?php _e('Login logo size','flat-login'); ?></th>
        <td>
		<label>
		<?php _e('Width:', 'flat-login'); ?>
		<input id="flat_logo_width" type="text" name="flat_logo_width" size="3" value="<?php echo get_option('flat_logo_width'); ?>"/>
		<?php _e('px', 'flat-login'); ?>
		</label>
		<label style="margin: 0 25px;">
		<?php _e('Height:', 'flat-login'); ?>
		<input id="flat_logo_height" type="text" name="flat_logo_height" size="3" value="<?php echo get_option('flat_logo_height'); ?>"/>
		<?php _e('px', 'flat-login'); ?>
		</label>
		<p class="description"><?php _e('Enter Size of the logo.', 'flat-login'); ?></p>
		</td>
        </tr>

        <tr class="hidetoshow">
        <th scope="row"><?php _e('Background Color','flat-login'); ?></th>
        <td>
		<label>

		<input id="flat_bg_color" type="text" name="flat_bg_color" size="7" value="<?php echo get_option('flat_bg_color'); ?>"/>
		
		</label>
		<p class="description"><?php _e('choose the background Color.', 'flat-login'); ?></p>
		</td>
        </tr>	
	
    </table>

<?php submit_button(); ?>
</form>
</div>
<?php } ?>