(function($){
	function lookupLink(target){
		var link = $(target).data('action');
		
		if(typeof link == 'undefined') return lookupLink($(target).parent());

		return link;
	}

	function bindEvents(){
		if($('#searchform').length > 0){
			$('#searchform a').on('click', toggleSearchForm);
		}

		//Contact Form
		if($('#contact.contact-block').length > 0){
			var $contactBlock = $('#contact.contact-block input, #contact.contact-block textarea');
			$contactBlock.on('keyup', delegateKeyEvent);
			$('#contact.contact-block select').on('change', delegateKeyEvent);
			$('.fa-envelope-o').on('click', toggleContactForm);
		}
	}

	function toggleContactForm(evt){
		$(evt.target).fadeOut(200, function(){
			$('form#contactForm').fadeIn(200);
		});
	}

	function delegateKeyEvent(evt){
		var key  = evt.which;
		var next = $(evt.target).parent().next();
		
		if(key === 13) {
			evt.preventDefault();
			if(next.length == 0){
				ajaxSubmit($('form#contactForm'));
				return false;
			}

			transitionNextInput(evt);
		} else {
			if(evt.target.nodeName === 'SELECT') transitionNextInput(evt);
		}
	}

	function ajaxSubmit($form){
		var data = $form.serialize();
		$.ajax($form.attr('action'), {
			data: data,
			method: 'POST'
		})
		.success(function(statusCode){
			if(statusCode == '200') return showSuccessMsg($('form#contactForm'));
			return showErrorMsg($('form#contactForm'));
		})
		.fail(function(a, b){
			console.log(a);
			console.log(b);
		});
	}

	function showSuccessMsg($form){
		$form.fadeOut(200, function(){
			$(this).parent().append($('<h4 />', {
				'text': 'Your message has been sent. We\'ll be in touch!', 
				'class': 'successMsg',
				'style': 'display: none'
			}));

			$(this).parent().find('h4').fadeIn(200);
		});
	}

	function transitionNextInput(evt){
		var effectTime = 175;
		$(evt.target).parent().animate({
			left: '-110%'
		}, effectTime, function(){
			$(this).removeAttr('class').removeAttr('style')
			.next().animate({
				right: 0
			}, effectTime, function(){
				$(this).addClass('current');
			})
		});
	}

	function toggleSearchForm(evt){
		evt.preventDefault();
		var $input 		= $(this).parent().find('input');
		var inputWidth 	= $input.outerWidth();
		var newWidth  	= (inputWidth == 0) ? '90%' : 0;
		var newPadding  = (inputWidth == 0) ? '0 10px 0 10px' : 0;
		
		$input.animate({
			'width' 	: newWidth,
			'padding'	: newPadding
		}, 100);
		
	}

	//Post DOM content
	$('document').ready(function(){
		if($('.blog').length > 0) $('.post_excerpt h2.title > a').removeAttr('target');
		if($('.fa-map-marker').length > 0){
			$('.fa-map-marker').on('click', function(evt){
				evt.preventDefault();
				$(evt.target).parent().find('#map').slideToggle(100);
			});
		}

		//Post Behavior
		var $post_items = $('.featured_image, .more, .title a', '#projects');
		$post_items.on('click', function(evt){ 
			evt.preventDefault(); 
			var action = lookupLink(evt.target);

			window.location.href=action; 
		});

		$post_items.hover(function(){
			$(this).find('.filter').slideUp(120);
			$('body').css('cursor', 'pointer');
		}, function(){
			$(this).find('.filter').slideDown(120);
			$('body').removeAttr('style');
		});

		bindEvents();
	});
}(jQuery));