jQuery(document).ready(function($) {
	$('body.login div#login p#nav').hide();
	$('#loginform').append('<p id="extra"></p>');
	$('#extra').append($('body.login div#login p#nav').html());
	$('input#user_login').attr('placeholder', 'نام کاربری');
	$('input#user_pass').attr('placeholder', 'کلمه عبور');

	$('form#loginform p label').each( function() {
		$(this).html($(this).html().replace("شناسه", ""));
		$(this).html($(this).html().replace("رمز", ""));
	});

	$('form#loginform p label').each( function() {
		$(this).html($(this).html().replace("شناسه", ""));
		$(this).html($(this).html().replace("رمز", ""));
	});

	$('#login h1').addClass('fade one');
	$('#loginform').addClass('fade two');
	$('#backtoblog').addClass('fade three');
});