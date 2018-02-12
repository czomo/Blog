@extends('layouts.app')

@section('content')
<div class="jumbotron">
        <h1><center> Blog</center></h1>

@if(count($posts)>0)
@foreach($posts as $post)
<div class="well">

        <h3><a href="./artyks/{{$post->id}}">{{$post->title}}</a></h3>
        <small>Utworzony: {{$post->created_at}}</small>
</div>
@endforeach
{{$posts->links()}}
@else 
<p>Brak postów</p>
@endif
</div>
@endsection
  
