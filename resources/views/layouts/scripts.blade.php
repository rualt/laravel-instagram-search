    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
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
                    //  $("#loader").hide();
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
                     $("#loader").hide();
                    }
        });
    });
    
    $.ajax({
            beforeSend: function() {
            $('#loader').show();
        },
            complete: function() {
            $('#loader').hide();
        }
    });
</script>
