//$('#form_laminacao3d').ajaxForm({
//	        beforeSubmit: function() {
//	            $('#output_laminacao').html('Salvando. Por favor aguarde...');
//	        },
//	        success: function(data) {
//	            var out = $('#output_laminacao');
//	            out.html('');
//	            out.append(data);
//	        }
//});
$(document).ready(function() {
    

    $('.categorias .opensubmenu').click(function() {
        $('.submenu').slideUp('fast');
        if ($(this).next('.submenu').is(':visible')) {
            $(this).next('.submenu').slideUp('fast');
        } else {
            $(this).next('.submenu').slideDown('fast');
        }

        if ($(this).next('.submenu').find('li').size() > 0) {
            return false;
        }
    })


    

});
