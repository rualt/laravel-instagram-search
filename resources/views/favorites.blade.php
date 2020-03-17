@extends ('layouts.app')

@section ('content')


<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            @foreach ($images as $image)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="image-container">
                        <img class="card-img-top" src="{{ $image->square_image }}">
                    </div>
                    
                    <div class="card-body">
                        <div class="btn-group d-flex justify-content-between align-items-center">
                            <a href="{{ $image->url_inst }}" target="_blank" role="button" class="btn btn-secondary">Instagram</a>
                            <form>
                                <input type="hidden" class="img_src" name="url" value="{{ $image->url }}">
                                <input type="hidden" class="insta_link" name="url_inst" value="{{ $image->url_inst }}">
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
            @endforeach
        </div>
    </div>
</div>

@endsection