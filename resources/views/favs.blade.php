@extends('profilelayout')
@section('content')
    	<div class="page-header">
        <h3>{{$user->username}}@if($user->is('Moderator')) <span class="" style="color: #1FB2B0;"><i class="fa fa-bolt anim"></i></span>@elseif($user->is('Editor'))  <span class="" style="color: #1FB2B0;"><i class="fa fa-shield anim"></i></span>@elseif($user->is('flinny')) <img class="flinny" src="{{ asset('wizard.png') }}"></img>@elseif($user->is('brown')) <img class="rain" src="{{ asset('watermelon.png') }}"></img>@elseif($user->is('dank')) <img class="dank" src="{{ asset('weed.png') }}"></img>@elseif($user->is('gay')) <img class="gay" src="{{ asset('gaypride.svg') }}"></img>@elseif($user->is('duke')) <img class="duke" src="{{ asset ('duke.png') }}"></img>@endif<h3> 

<h6><span class="pull-right" {{$user->created_at->timezone('Europe/Berlin')->format('d.m.Y H:i')}}">Joined: {{$user->created_at->timezone('Europe/Berlin')->format('d.m.Y')}}</span></h6>
<h5><a style="color:#1FB2B0;" href="/user/{{$user->username}}"><i class="fa fa-cloud-upload"></i> {{ $user->videos()->count() }} Uploads</a> <span style="color:white;"> <i class="fa fa-commenting"></i> {{ $user->comments()->count() }} Comments</span> <span style="color:#CE107C;" href="{{url('user/' . $user->username . '/favs')}}"><i class="fa fa-heart"></i> {{ $user->favs()->count() }} Favorites</span></h5>
    	</div>

	    <h3>Favorites</h3>
            <table class="table table-hover table-condensed">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Interpret</th>
                    <th>Songtitle</th>
                    <th>Video Source</th>
                    <th>Category</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->favs as $video)
                    <?php $thumb = str_replace(".webm","",$video->file); ?>
                    <tr data-thumb="{{$thumb}}">
                        <td><a href="{{url($video->id)}}">{{$video->id}}</a></td>
                        <td>{{$video->interpret or ''}}</td>
                        <td>{{$video->songtitle or ''}}</td>
                        <td>{{$video->imgsource or ''}}</td>
                        <td><a href="{{url($video->category->shortname)}}">{{$video->category->name}}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
@endsection