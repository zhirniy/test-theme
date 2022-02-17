jQuery(document).ready(function ($) {
    $( "body" ).click(function( event ) {
        if($(event.target).hasClass('btn-event-ajax')){
            let parentContainer = $('.card-square-amount');
            if($(parentContainer).length > 0){
               loadMoreEvents(event.target, parentContainer);
            }
        }
    });

    let evetnsLoad = {};
    evetnsLoad.postPerPage = 2; // Post per page
    evetnsLoad.number = 1;

    function loadMoreEvents(button, container){
        if($(container).length && $(button).length){
            let showedPost = $(button).data('showed-posts');
            let maxPage = $(button).data('max-page');
            $(button).css("pointer-events", "none");
            $.ajax({
                data: {action: 'load_more_events',
                    'pageNumber':evetnsLoad.number,
                    'postPerPage':evetnsLoad.postPerPage,
                    'showedPost' : showedPost,
                    'nonce': ajax_var.nonce},
                type: 'post',
                url: ajax_var.url,
                success: function(data) {
                    $(container).append(data);
                    if(evetnsLoad.number >= maxPage){
                        $(button).css('display', 'none');
                    }
                    evetnsLoad.number++;
                },
                error : function(jqXHR, textStatus) {
                    console.log(textStatus);
                },
                complete: function (data) {
                    $(button).css("pointer-events", "all");
                }
            });
        }
    }

});