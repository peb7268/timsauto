var $ = require('./vendors/jquery/dist/jquery.js');
$('document').ready(function(){

	//Post Behavior
	var $post = $('#project_content .post');

	$post.on('click', function(evt){ evt.preventDefault(); window.location.href=$(evt.target).data('action'); });
	$post.hover(function(){
		$(this).find('.filter').slideUp(200);
		$('body').css('cursor', 'pointer');
	}, function(){
		$(this).find('.filter').slideDown(200);
		$('body').removeAttr('style');
	});
});