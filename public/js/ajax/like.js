$(document).ready(function() {
    $('.like').each(function(){
        $(this).on('click', function(event) {
        event.preventDefault();
        var data = $(this).serialize();
        var item = $(this).parents('#accordion1');
        $.ajax({
            url: $(this).attr('href'),
            type: 'GET',
            data: data,
            success: function(data) {
                console.log(item);
                item.replaceWith(data);
            }
        });
        return false;
        // return false;
    });
    })
});