jQuery(document).ready(function($) {
	$('body.login div#login p#nav').hide();
	$('#loginform').append('<p id="extra"></p>');
	$('#extra').append($('body.login div#login p#nav').html());
	$('input#user_login').attr('placeholder', 'Username');
	$('input#user_pass').attr('placeholder', 'Password');

	$('form#loginform p label').each( function() {
		$(this).html($(this).html().replace("Username", ""));
		$(this).html($(this).html().replace("Password", ""));
	});

	$('#login h1').addClass('fade one');
	$('#loginform').addClass('fade two');
	$('#backtoblog').addClass('fade three');
});