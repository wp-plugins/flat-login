<?php
	function flat_login_settings_head()
	{
		wp_enqueue_media();
		wp_enqueue_script('flat_upload_script', plugins_url('assets/js/flat-login-settings-js.js', dirname(__FILE__)), array('jquery'));
		wp_enqueue_style( 'settings_style', plugins_url('assets/css/flat-login-settings-style.css', dirname(__FILE__)), false);
    	wp_enqueue_script( 'colorpicker_script', plugins_url('assets/js/jquery.simplecolorpicker.js', dirname(__FILE__)), false, true);
	}
	add_action('admin_enqueue_scripts', 'flat_login_settings_head');

	function flat_login_register_settings()
	{
		register_setting('flat-login-settings-group', 'flat_logo_upload');
		register_setting('flat-login-settings-group', 'flat_bg_color');
		register_setting('flat-login-settings-group', 'flat_custom_style');
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
        <th scope="row"><?php _e('Background Color','flat-login'); ?></th>
        <td>
		<label>

		<input id="flat_bg_color" type="text" name="flat_bg_color" style="display: none;" value="<?php echo get_option('flat_bg_color'); ?>"/>

		<select name="colorpicker">
			<option value="#1abc9c"></option>
			<option value="#16a085"></option>
			<option value="#2ecc71"></option>
			<option value="#27ae60"></option>
			<option value="#3498db"></option>
			<option value="#2980b9"></option>
			<option value="#9b59b6"></option>
			<option value="#8e44ad"></option>
			<option value="#34495e"></option>
			<option value="#2c3e50"></option>
			<option value="#f1c40f"></option>
			<option value="#f39c12"></option>
			<option value="#e67e22"></option>
			<option value="#d35400"></option>
			<option value="#e74c3c"></option>
			<option value="#c0392b"></option>
		</select>
		
		</label>
		<p class="description"><?php _e('choose the background Color.', 'flat-login'); ?></p>
		</td>
        </tr>	
	
    </table>

<?php submit_button(); ?>
</form>
</div>
<?php } ?>