@extends('layouts.app')

@section('content')
    <main role="main">
    <section class="jumbotron text-center">
    <div class="container">
        <h1>InstaTagSearch</h1>
        <p class="lead text-muted">Search instagram by tag</p>
        <form action="{{ action('InstagramController@tagSearch') }}" method="get">
            <p>
            <input type="search" name='tag' value="{{$tag}}" placeholder="Tag"> 
            <input type="submit" value="Search">
            </p>
        </form>
    </div>
    </section>

    @if (isset($error) and !empty($tag))
        <p>{{ $error }}</p>
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