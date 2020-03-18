@extends ('layouts.app')

@section ('title', 'Favorites')

@section ('content')

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1>Favorites</h1>
            <p class="lead text-muted">Here are all the images you previously saved. Delete some or add them back if you change your mind. </p>
        </div>
    </section>

@if (isset($images))
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            @foreach ($images as $image)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">

                        <div class="instagram-image card-img-top">
                            <img src="{{ $image['square_image'] }}">
                        </div>
                        
                        <div class="card-body">
                            <div class="button-group d-flex flex-wrap justify-content-center align-items-center" role="group">
                                <button type="button" class="btn btn-outline-info btn-sm"><a href="{{$image['page_link']}}" target="_blank">View on Instagram<a></button>
                            <form class='galery-update'>
                                <input type="hidden" class="source" name="source" value="{{ $image['page_link'] }}">
                                <input type="hidden" class="square" name="square" value="{{ $image['square_image'] }}">
                                 <button type="submit"  formaction="add" class="add btn btn-outline-success btn-sm d-none">Add to
                                    favorite</button>
                                <button type="submit"  formaction="delete" class="delete btn btn-outline-danger btn-sm">Remove from
                                        favorite</button>                              
                                </form>
                            </div>
                        </div>
                    </div>

                </div> 
            @endforeach
        </div>
    </div>
</div>
@endif
</main>
@endsection