$(document).ready(function() {
    $('#listreg').on('click', function(event) {
        event.preventDefault();
       var data = $(this).serialize();
        $.ajax({
            url: $(this).attr('href'),
            type: 'GET',
            data: data,
            success: function(data) {
                console.log($(this).attr('href'));
                $('#listregister').replaceWith(data);

            }
        });
        console.log($(this).attr('href'));
        return false;
    });
});