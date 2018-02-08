@extends('layouts.app')

@section('content')
<h1>{{$tytul}}</h1>
 @if(count($cos)>0)
 <ul class="list-group">
     @foreach($cos as $widok)
     <li class="list-group-item">{{$widok}}</li>
     @endforeach
 </ul>
 @endif
@endsection