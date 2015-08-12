(function($){
    $(document).ready(function() {
        $('#load-more-popular').click(function(e){
            e.preventDefault();
            // This does the ajax request
            $.ajax({
                type: 'POST',
                url: ajax_script_popular.ajaxurl,
                data: {
                    'action':'ajax_request_popular'
                },
                success:function(data) {
                    var $obj = $('li[data-spinner].is-active, button[data-spinner].is-active');

                    if (data == '') {
                        $('.cm-stream__more button').html('NO MORE RESULTS').css({"cursor" : "default", "background" : "#c2c2c2"});
                    } else {

                        $('#all-post-popular').append(data);
                        $cmgUi.removeActiveStatus($obj);
                    }
                },
                error: function(errorThrown){
                    console.log(errorThrown);
                }
            });
        });
    });
})(jQuery);