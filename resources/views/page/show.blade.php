@extends('layouts.app')

@section('content')
<a href="http://localhost/blog/public/artyks" class="btn btn-default">Wróć</a>
<div class="jumbotron">
    <h1>{{ $post['title'] }}</h1>
<small>Utworzono: {{ $post['created_at'] }}</small>
</div>
@endsection
  
