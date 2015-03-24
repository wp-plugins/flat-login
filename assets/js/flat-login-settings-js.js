jQuery(document).ready(function($){

    var custom_uploader;
    
    $('#upload_logo_button').click(function(e) {
 
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            $('#flat_logo_upload').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
 
    });

    function evaluate(){
        var item = $(this);
        var relatedItem = $('.hidetoshow');
        relatedItem.hide();
       
        if(item.is(":checked")){
            relatedItem.fadeIn();
        }else{
            relatedItem.fadeOut();   
        }
    }

    $('#flat_custom_style').click(evaluate).each(evaluate); 
 
    $('select[name="colorpicker"]').simplecolorpicker();

    $('.simplecolorpicker span').live('click', function() {
        $('.simplecolorpicker span').removeClass('overlay');
        $(this).addClass('overlay');
    });

    $('select[name="colorpicker"]').change(function() {
        $('#flat_bg_color').val($(this).val());
    });

    $('.simplecolorpicker span').each(function() {
        if($(this).attr('data-color') == $('#flat_bg_color').val()){
            $(this).addClass('overlay');
        }
    });
 
});