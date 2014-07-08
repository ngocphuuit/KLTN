$(document).ready(function() {
    $('.closetopic').on('click', function(event) {
        event.preventDefault();
        $(this).addClass('open');
        var data = $(this).serialize();
        $.ajax({
            url: $(this).attr('href'),
            type: 'GET',
            data: data,
            success: function(data) {
                console.log(data);
                $('.open').replaceWith(data);

            }
        });
        console.log($(this).attr('href'));
        return false;
    });
});