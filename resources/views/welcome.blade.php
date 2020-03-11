@extends('layouts.app')

@section('content')
    <main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1>InstaTagSearch</h1>
            <p class="lead text-muted">Search instagram by tag</p>
            <form class="form-inline align-items-center" action="{{ action('InstagramController@tagSearch') }}" method="get">
                <input type="search" class="form-control col-md-9 mx-sm-2" name='tag' value="{{$tag}}" placeholder="Tag" required>
                <button class="btn btn-outline-dark" type="submit" value="Search">Search tag</button>
            </form>
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
                                <div class="instagram-image">
                                    <img src="{{ $image }}">
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