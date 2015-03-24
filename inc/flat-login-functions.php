<?php
	function flat_login_stylesheet() 
	{
		if(get_option('flat_custom_style')){
		wp_enqueue_script('jquery');
		if (is_rtl()) {
			wp_enqueue_style( 'login-head', plugins_url('assets/css/flat-login-style_rtl.css', dirname(__FILE__)), false );
		} else {
			wp_enqueue_style( 'login-head', plugins_url('assets/css/flat-login-style.css', dirname(__FILE__)), false );
			wp_enqueue_style( 'login-headdd', 'http://fonts.googleapis.com/css?family=Roboto', false );
		}
	    wp_enqueue_script( 'login-head', plugins_url('assets/js/flat-login-js.js', dirname(__FILE__)), false );
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
				-webkit-filter: grayscale(100%); filter: grayscale(100%);
			}
<?php } ?>
		</style>
<?php
		}
	}
	add_action('login_head', 'flat_custom_bg');
?>