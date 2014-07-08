$(document).ready(function() {
    $('.unfollow').on('click', function(event) {
        event.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: $(this).attr('href'),
            type: 'GET',
            data: data,
            success: function(data) {
                console.log(data);
                $('.unfollow').replaceWith(data);

            }
        });
        console.log($(this).attr('href'));
        return false;
    });
});