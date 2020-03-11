@extends('layouts.app')

@section('content')
    <main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1>InstaTagSearch</h1>
            <p class="lead text-muted">Search instagram by tag</p>
            <form action="{{ action('InstagramController@tagSearch') }}" method="get">
                <input type="search" class="form-control" name='tag' value="{{$tag}}" placeholder="Tag" required autofocus>
                <button class="btn btn-lg btn-primary btn-block" type="submit" value="Search">Search</button>
            </form>
        </div>
    </section>

    @if (isset($error))
    <section class="font-weight-bold text-center text-muted">
        <p>{{ $error }}</p>
    </section>
    @else
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