$(document).ready(function() {
    $('#comment-form').on('submit', function(event) {
        event.preventDefault();
        var data = $(this).serialize();
        var item = $(this).parents('#binhluan').find('.comment_line');
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
    });
});