@extends('layouts.app')

@section ('title', 'Home')

@section('content')

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1>Instagram Search</h1>
            <p class="lead text-muted">Here you can search for instagram images by tag.</p>
            <form action="{{ action('InstagramController@search') }}" method="get">
                <div class="form-row d-flex justify-content-center">
                    <div class="col-8 col-md-10">
                     <label class="sr-only" for="inlineFormInputTag">Tag</label>
                        <div class="input-group-prepend">
                            <div class="input-group-text">#</div>
                            <input type="text" class="form-control"  id="inlineFormInputTag"
                            name="tag" value="{{$tag}}" placeholder="Tag" required>
                        </div>
                    </div>
                    <div class="form-group col-2">
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
        </div>
    </section>

    @if (isset($error) and !empty($tag))
    <section class="font-weight-bold text-center text-muted">
        <p>{{ $error }}</p>
    </section>
        @elseif (!empty($images))
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
                                    <div class="button-group d-flex flex-wrap justify-content-center align-items-center" role="group">
                                            <button type="button" class="btn btn-outline-info btn-sm"><a href="{{$image['source']}}" target="_blank">View on Instagram<a></button>
                                        <form class="galery-update">
                                            <input type="hidden" class="source" name="source" value="{{ $image['source'] }}">
                                            <input type="hidden" class="square" name="square" value="{{ $image['square'] }}">
                                        <button type="submit" name="submit" formaction="add" class=" add btn btn-outline-success btn-sm">Add to
                                            favorite</button>
                                        <button type="submit" name="submit" formaction="delete" class="delete btn btn-outline-danger btn-sm d-none">Remove from
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