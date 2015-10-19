(function($){
	var count = 2;
	$(window).scroll(function(){
		if ($(window).scrollTop() == $(document).height() - $(window).height()){			
			window.setTimeout(function(){
				if(window.tau.isLoading === true) return;
				loadArticles(count);
				count++;
			}, 750);
		}
	}); 

	function loadArticles(pageNumber) {
		console.log('loading articles: ', pageNumber);
		window.tau.isLoading = true;
		
		var loopName = $('#projects_and_highlights li a.active').attr('id');
		var baseUrl  = './';

		console.log('loop: ', loopName);

	    $.ajax({
	        url: baseUrl + "/wp-admin/admin-ajax.php",
	        type:'POST',
	        data: "action=infinite_scroll&page_no="+ pageNumber + '&loop_file='+loopName, 
	        success: function(html){
	            $(".loop.active").append(html);
	            window.tau.isLoading = false;
	        }
	    });

	    return false;
	}
}(jQuery));