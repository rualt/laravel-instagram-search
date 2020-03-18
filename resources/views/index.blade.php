@extends('layouts.app')

@section('content')

    <main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1>InstaTagSearch</h1>
            <p class="lead text-muted">Search instagram by tag</p>
            <form action="{{ action('InstagramController@search') }}" method="get">
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <input type="text" class="form-control" 
                        name="tag" value="{{$tag}}" placeholder="Tag" required>
                    </div>
                    <div class="form-group col-md-2">
                    <select class="form-control" name="imageCount">
                        <option value="9" selected>9</option>
                        <option value="18">18</option>
                        <option value="30">30</option>
                        <option value="45">45</option>
                        <option value="60">60</option>
                    </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-dark" value="Search">Search tag</button>
            </form>
            <a href="{{ route('favorites') }}">Favorites</a>
        </div>
    </section>

    @if (isset($error) and !empty($tag))
    <section class="font-weight-bold text-center text-muted">
        <p>{{ $error }}</p>
    </section>
    @elseif (!empty($tag))
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach ($images as $image)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">

                                <div class="instagram-image card-img-top">
                                    <img src="{{ $image['square'] }}">
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-outline-secondary"><a href="{{$image['source']}}" target="_blank">View on Instagram<a></button>
                                            <form>
                                                <input type="hidden" class="source" name="source" value="{{ $image['source'] }}">
                                                <input type="hidden" class="square" name="square" value="{{ $image['square'] }}">
                                            <button type="submit" class="like btn btn-outline-secondary">Add to
                                                favorite</button>
                                            <button type="submit" class="dislike btn btn-outline-secondary d-none">Remove from
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