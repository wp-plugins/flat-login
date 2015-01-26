jQuery(document).ready(function($) {
	$('body.login div#login p#nav').hide();
	$('#loginform').append('<p id="extra"></p>');
	$('#extra').append($('body.login div#login p#nav').html());
	
});