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
  <div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
      @if (empty($tag))
        <p>Try to search something</p>
      @elseif (isset($error))
        <p>{{ $error }}</p>
      @else
        @foreach ($images as $image)
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <div class = "card-img-top">
                <div class ="_container-images">

                  <img src="{{ $image }}">
                </div> 
              </div> 
            </div> 
          </div>
        @endforeach
      @endif
        </div>
    </div>
  </div>
</main>
@endsection