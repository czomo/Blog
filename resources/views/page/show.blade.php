@extends('layouts.app')

@section('content')
<br>
<a  href="{{ url('artyks') }}" class="btn btn-default">Wróć</a>

    <div class="jumbotron">
        <h1>{{ $post['title'] }}</h1>
        <img style="width:75%" src="/blog/public/storage/images/{{$post->image}}">
        <div>{!!$post->body!!}</div>
        <hr>
        <small>Utworzono: {{ $post['created_at'] }} przez {{$post->user['name']}}</small>
    </div>
        @if(!Auth::guest())
            @if(Auth::user()->id==$post->user_id)
            <a href="http://localhost/blog/public/artyks/{{$post->id}}/edit" class="btn btn-default">Edytuj post</a>
            {!!Form::open(['action'=>['ArtykulController@destroy',$post->id],'method'=>'POST','class'=>'pull-left'])!!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}
            @endif
        @endif
@endsection
  
