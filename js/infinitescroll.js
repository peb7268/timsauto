(function($){
	var count = 2;
	$(window).scroll(function(){
		if ($(window).scrollTop() == $(document).height() - $(window).height()){			
			if(window.tau.isLoading === true) return;
			loadArticles(count);
			count++;
		}
	}); 

	function loadArticles(pageNumber) {
		console.log('loading articles: ', pageNumber);
		window.tau.isLoading = true;
		
		var $elem 	 = $('#projects_and_highlights li a.active'); 
		var cat_id 	 = $elem.data('catId');
		var loopName = $elem.attr('id');
		var baseUrl  = './';

		console.log('loop: ', loopName);

	    $.ajax({
	        url: baseUrl + "/wp-admin/admin-ajax.php",
	        type:'POST',
	        data: "action=infinite_scroll&page_no="+ pageNumber + '&loop_file='+loopName+'&cat_id=' + cat_id, 
	        success: function(html){
	            $(".loop.active").append(html);
	            window.tau.isLoading = false;
	        }
	    });

	    return false;
	}
}(jQuery));