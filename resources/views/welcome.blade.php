@extends('layouts.app')

@section('content')
         <h2>Search instagram by tag</h2>
        <form action="index.php" method="get">
            <p><input type="search" name='tag' value="{{$tag ?? ''}}" placeholder="Tag"> 
                <input type="submit" value="Search">
            </p>
        </form>
        <div id="_container-images">
            @foreach ($images as $image)
                <img src="{{ $image }}">
            @endforeach
        </div>
@endsection