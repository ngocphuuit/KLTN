$(document).ready(function() {
    $('.unregis').on('click', function(event) {
        event.preventDefault();
        $(this).addClass('unreg');
        var data = $(this).serialize();
        $.ajax({
            url: $(this).attr('href'),
            type: 'GET',
            data: data,
            success: function(data) {
                console.log(data);
                $('.unreg').replaceWith(data);

            }
        });
        console.log($(this).attr('href'));
        return false;
    });
});