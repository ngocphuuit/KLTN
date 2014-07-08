$(document).ready(function() {
    $('.comment-form').each(function(){
        $(this).on('submit', function(event) {
        event.preventDefault();
        var data = $(this).serialize();
        var item = $(this).parents('.post-detail').find('.comment');
        $.ajax({
            url: $(this).attr('data-url'),
            type: 'POST',
            data: data,
            success: function(data) {
                console.log(data);
                item.replaceWith(data);
            }
        });
         $(this).find('textarea').val('');
        return false;
        
        // return false;
    });
    })
});