$(document).ready(function() {
    $('.opentopic').on('click', function(event) {
        event.preventDefault();
        $(this).addClass('close');
        var data = $(this).serialize();
        $.ajax({
            url: $(this).attr('href'),
            type: 'GET',
            data: data,
            success: function(data) {
                console.log(data);
                $('.close').replaceWith(data);

            }
        });
        console.log($(this).attr('href'));
        return false;
    });
});