function scroll_to_class(element_class, removed_height) {
	var scroll_to = $(element_class).offset().top - removed_height;
	if($(window).scrollTop() != scroll_to) {
		$('html, body').stop().animate({scrollTop: scroll_to}, 0);
	}
}
jQuery(document).ready(function() {

    $('form fieldset:first').fadeIn('slow');
    
    $('form input[type="text"], form input[type="password"], form textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });
	
	// Next step
    $('form .btn-next').on('click', function() {
    	var parent_fieldset = $(this).parents('fieldset');
    	var next_step = true;
    	var current_active_step = $(this).parents('form').find('.step.active');
    	
    	parent_fieldset.find('input[type="text"], input[type="password"], input[type="date"], input[type="email"], input[type="tel"], input[type="number"], select').each(function() {
    		if( $(this).val() == "" ) {
    			$(this).addClass('input-error');
    			next_step = false;
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	
    	parent_fieldset.find('input[type="checkbox"]').each(function() {
    		if( $(this).prop("checked") == false ) {
    			$('.label').css("color","red");
    			next_step = false;
    		}
    		else {
    			$('.label').css("color","white");
    		}
    	});
    	
    	if( next_step ) {
    		parent_fieldset.fadeOut(400, function() {
    			current_active_step.removeClass('active').addClass('activated').next().addClass('active');
	    		$(this).next().fadeIn();
    			scroll_to_class( $('form'), 20 );
	    	});
    	}
    	
    });
    
    // previous step
    $('form .btn-previous').on('click', function() {
    	var current_active_step = $(this).parents('form').find('.step.active');
    	
    	$(this).parents('fieldset').fadeOut(400, function() {
    		current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
    		$(this).prev().fadeIn();
			scroll_to_class( $('form'), 20 );
    	});
    });
    
    $('form').on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: 'save.php',
			data: $('form').serialize(),
			success: function (response) {
				$('.jumbotron h1').html(response);
				$('.button').fadeOut();
				$('.steps').fadeOut();
			}
		});
	});

	// Get the form fields and hidden div
	var checkbox = $("#trigger");
	var hidden = $(".hidden_fields");
	//hidden.hide();

	checkbox.change(function () {
		if (checkbox.is(':checked')) {
			hidden.html(`
						<label for="citizenship">Select Citizenship</label>
						<select name="citizenship" id="citizenship1">
							<option value="">Select</option>
							<option value="1"> Bangladesh</option>
						</select>
			`);
		} else {
			hidden.html('');
			//$(".hidden_fields").val("");
		}
	});
    
});