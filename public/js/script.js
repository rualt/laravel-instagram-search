    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $(".like").on('click', function(event) {
        event.preventDefault();
        $(this).toggleClass('d-none');
        $(this).next('.dislike').toggleClass('d-none');

        var source = $(this).parent().find('.source').val();
        var square = $(this).parent().find('.square').val();

        $.ajax({
            beforeSend: function() {
            $('.loader').show();
        },

           type:'POST',
           url:'add',
           data:{source:source, square:square},
           success: function (data) {
                    console.log(data);
                },
            error: function() 
                    { 
                        //error code
                    },
            complete:function()
                    {
                     //This block will execute after success/error executes.
                     //Make the loader div empty
                    $(".loader").hide();
            }
        });
    });

    $(".dislike").on('click', function(event) {
        event.preventDefault();
        $(this).toggleClass('d-none');
        $(this).prev('.like').toggleClass('d-none');

        var source = $(this).parent().find('.source').val();
        var square = $(this).parent().find('.square').val();
        var id = $(this).parent().find('.id').val();

        $.ajax({
            beforeSend: function() {
            $('.loader').show();
        },
           type:'POST',
           url:'delete',
           data:{source:source, square:square, id:id},
           success: function (data) {
                    console.log(data);
                },
            error: function() 
                    { 
                        //error code
                    },
            complete:function()
                    {
                     //This block will execute after success/error executes.
                     //Make the loader div empty
                     $(".loader").hide();
                    }
        });
    });

    $.ajax({
            beforeSend: function() {
            $('.loader').hide();
        },
    });
