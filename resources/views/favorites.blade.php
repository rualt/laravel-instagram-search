@extends ('layouts.app')

@section ('content')

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1>Favorites</h1>
            <p class="lead text-muted">Search instagram by tag</p>
            <a href="{{ route('index') }}">Go back and search</a>
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
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{$image['page_link']}}" target="_blank">View on Instagram<a></button>
                                    <form>
                                        <input type="hidden" class="source" name="source" value="{{ $image['source'] }}">
                                        <input type="hidden" class="square" name="square" value="{{ $image['square'] }}">
                                        <input type="hidden" class="id" name="id" value="{{ $image['id'] }}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="like btn btn-outline-secondary d-none">Add to
                                            favorite</button>
                                        <button type="submit" class="dislike btn btn-outline-secondary">Remove from
                                            favorite</button>                                    
                                    </form>
                                </div>
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