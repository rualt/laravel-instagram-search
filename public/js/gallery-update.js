$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$( document ).ready(function() {
    $(document).on('submit', 'form.galery-update', function(event) {
        event.stopImmediatePropagation();
        event.preventDefault();
        var target = event.originalEvent || event.originalTarget;
        var clickedElement = $( target.currentTarget.activeElement);
        var formaction = $(clickedElement).attr("formaction");
        var source = $(this).find('.source').val();
        var square = $(this).find('.square').val();
        $.ajax({
            type:'POST',
            url:formaction,
            data:{source:source, square:square},
            success: function (data) {
                $(clickedElement).toggleClass('d-none');
                $(clickedElement).siblings('.add, .delete').toggleClass('d-none');
                console.log(data);
            },
        });
    });
});
