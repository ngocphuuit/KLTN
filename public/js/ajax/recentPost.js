$(document).ready(function() {
    $('.data-form2').each(function(){
        $(this).on('submit', function(event) {
        event.preventDefault();
        var data = $(this).serialize();
        var item = $(this).parents('.social-box').find('#tab2');
        $.ajax({
            url: $(this).attr('data-url'),
            type: 'POST',
            data: data,
            success: function(data) {
                console.log(data);
                item.replaceWith(data);
            }
        });
        return false;
    });
    })
});