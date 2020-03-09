@extends('layouts.app')

@section('content')
    <h2>Search instagram by tag</h2>
    <form action="{{ action('InstagramController@tagSearch') }}" method="get">
        <p><input type="search" name='tag' value="{{$tag}}" placeholder="Tag"> 
            <input type="submit" value="Search">
        </p>
    </form>

    <div id="_container-images">
        @if (empty($tag))
            <p>Try to search something</p>
        @elseif (isset($error))
            <p>{{ $error }}</p>
        @else
            @foreach ($images as $image)
                <img src="{{ $image }}">
            @endforeach
        @endif
    </div>
@endsection