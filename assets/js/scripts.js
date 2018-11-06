(function( $ ) {
    'use strict';
    // jQuery's DOM-ready event-handler
    $(function() {
    	

 $('[href="#"]').attr("href","javascript:;");
        
$('ul.nav li.dropdown').hover(function() {
$(this).find('.dropdown-menu').stop(true, true).delay(200).slideDown(400);
 $('span', this).toggleClass("caret caret-up");  
}, function() {
$(this).find('.dropdown-menu').stop(true, true).delay(200).slideUp(400);
$('span', this).toggleClass("caret caret-up");  
});

$('.dropdown-toggle').removeAttr('data-toggle');

$(window).load(function(){$('.loader').fadeOut();});
 


/* contact Form Submission */

$('#miContactForm').on('submit',function(e){
e.preventDefault();	
$('.has-error').removeClass('has-error');
$('.js-show-feedback').removeClass('js-show-feedback');
//console.log(' form was submit');
var form    = $(this), 
	name    = form.find('#name').val(),
	email   = form.find('#email').val(),
	message = form.find('#message').val(),
	ajaxurl = form.data('url');


	if( name === '' ){
			$('#name').parent('.form-group').addClass('has-error');
			return;
		}

		if( email === '' ){
			$('#email').parent('.form-group').addClass('has-error');
			return;
		}

		if( message === '' ){
			$('#message').parent('.form-group').addClass('has-error');
			return;
}


	form.find('input, button, textarea').attr('disabled','disabled');
	$('.js-form-submission').addClass('js-show-feedback');

	$.ajax({
			
			url : ajaxurl,
			type : 'post',
			data : {
				
				name : name,
				email : email,
				message : message,
				action: 'mi_save_user_contact_form'
				
			},
			error : function( response ){
				$('.js-form-submission').removeClass('js-show-feedback');
				$('.js-form-error').addClass('js-show-feedback');
				form.find('input, button, textarea').removeAttr('disabled');
				console.log(response);
			},
			success : function( response ){
				if( response == 0 ){
					
					setTimeout(function(){
						$('.js-form-submission').removeClass('js-show-feedback');
						$('.js-form-error').addClass('js-show-feedback');
						form.find('input, button, textarea').removeAttr('disabled');
					},1500);

				} else {
					
					setTimeout(function(){
						$('.js-form-submission').removeClass('js-show-feedback');
						$('.js-form-success').addClass('js-show-feedback');
						form.find('input, button, textarea').removeAttr('disabled').val('');
					},1500);

				}
			}
			
});

console.log(form);
console.log(ajaxurl);
});


    });
 
})( jQuery );