@extends('layouts.app')
<style>
        .well {
    background: rgb(2, 15, 173);
}
        </style>
@section('content')
        <div class="jumbotron">

                @if(count($posts)>0)
                        @foreach($posts as $post)
                                <div class="well">
                                        <div class="row">
                                                <div class="col-md-4 col-sm-4">
                                                <img style="width:75%" src="storage/images/{{$post->image}}">
                                                </div>
                                                <div class="col-md-8 col-sm-8">
                                                        <h3><a href="./artyks/{{$post->id}}">{{$post->title}}</a></h3>
                                                        <small>Utworzony: {{$post->created_at}} przez {{$post->user['name']}}</small>                
                                                </div>
                                        </div>

                                        
                                </div>
                        @endforeach
                {{$posts->links()}}
                @else 
                <p>Brak postów</p>
                @endif
        </div>
@endsection
  
