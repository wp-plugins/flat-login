<?php
	function flat_login_stylesheet() 
	{
		if(get_option('flat_custom_style')){
			wp_enqueue_script('jquery');
				if (is_rtl()) {
					wp_enqueue_style( 'login-head', plugins_url('assets/css/flat-login-style_rtl.css', dirname(__FILE__)), false );
					wp_enqueue_script( 'login-head', plugins_url('assets/js/flat-login-js-fa.js', dirname(__FILE__)), false );
				} else {
					wp_enqueue_style( 'login-head', plugins_url('assets/css/flat-login-style.css', dirname(__FILE__)), false );
					wp_enqueue_style( 'login-headdd', 'http://fonts.googleapis.com/css?family=Roboto', false );
					wp_enqueue_script( 'login-head', plugins_url('assets/js/flat-login-js.js', dirname(__FILE__)), false );
				}
		}
	}

	add_action('login_enqueue_scripts', 'flat_login_stylesheet');

	function flat_custom_bg()
	{
		if(get_option('flat_custom_style')){
		?>
		<style type="text/css">
			body.login, html {
				background-color: <?php echo get_option('flat_bg_color'); ?> !important;
			}
<?php if(get_option('flat_logo_upload') != null){ ?>
			body.login div#login h1 a {
				background-image: url('<?php echo get_option('flat_logo_upload'); ?>') !important;
			}
<?php } else { ?>
			body.login div#login h1 a {
				background-image: url('<?php echo plugin_dir_url( __FILE__ ).'../assets/images/Wordpress-logo.png'; ?>') !important;
				background-size: 100px !important;
				width: 100px !important;
				height: 100px !important;
			}
<?php } ?>
		
<?php if (get_option('flat_logo_width') != null && get_option('flat_logo_height') != null ) { ?>
			body.login div#login h1 a {
				background-size: <?php echo get_option('flat_logo_width'); ?>px <?php echo get_option('flat_logo_height'); ?>px !important;
				width: <?php echo get_option('flat_logo_width'); ?>px !important;
				height: <?php echo get_option('flat_logo_height'); ?>px !important;
			}
<?php } ?>
</style>
<?php
		}
	}
	add_action('login_head', 'flat_custom_bg');
?>