var $ = require('./vendors/jquery/dist/jquery.js');

function lookupLink(target){
	var link = $(target).data('action');
	
	if(typeof link == 'undefined') return lookupLink($(target).parent());

	return link;
}

$('document').ready(function(){
	//Post Behavior
	var $post_items = $('.featured_image, .more, .title a');
	$post_items.on('click', function(evt){ 
		evt.preventDefault(); 
		var action = lookupLink(evt.target);

		window.location.href=action; 
	});

	$post_items.hover(function(){
		$(this).find('.filter').slideUp(200);
		$('body').css('cursor', 'pointer');
	}, function(){
		$(this).find('.filter').slideDown(200);
		$('body').removeAttr('style');
	});
});