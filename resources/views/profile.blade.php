@extends('layout')
@section('content')

    <div class="page-header">
        <h1>{{$user->username}} <small>{{ $user->videos()->count() }} uploads</small></h1>
    </div>
    <h2>Favorites</h2>
    <table class="table table-hover table-condensed table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Interpret</th>
            <th>Songtitle</th>
            <th>Image Source</th>
            <th>Category</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->favs as $video)
            <tr>
                <td><a href="{{$video->id}}">{{$video->id}}</a></td>
                <td>{{$video->interpret or ''}}</td>
                <td>{{$video->songtitle or ''}}</td>
                <td>{{$video->imgsource or ''}}</td>
                <td><a href="{{url($video->category->shortname)}}">{{$video->category->name}}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
