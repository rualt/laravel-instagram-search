    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

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
        var pageLink = $(this).parent().find('.img_src').val();
        var squareImage = $(this).parent().find('.insta_link').val();
        $.ajax({
           type:'POST',
           url:'add',
           data:{pageLink:pageLink, squareImage:squareImage},
           success: function (data) {
                    console.log(data);
                }
        });
    });
    $(".dislike").on('click', function(event) {
        event.preventDefault();
        $(this).toggleClass('d-none');
        $(this).prev('.like').toggleClass('d-none');
        var url = $(this).parent().find('.img_src').val();
        var url_inst = $(this).parent().find('.insta_link').val();
        $.ajax({
           type:'POST',
           url:'delete',
           data:{url:url, url_inst:url_inst},
           success: function (data) {
                    console.log(data);
                }
                
        });
	});
</script>