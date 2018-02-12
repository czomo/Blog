@extends('layouts.app')

@section('content')
        <h1> Dodaj post</h1>
        {!! Form::open(['action'=>'ArtykulController@store','method'=>'POST']) !!}
    {{Form::label('title','Tytuł')}}
    {{Form::text('title','',['class'=>'form-control','placeholder'=>'tytuł'])}}

    {{Form::label('body','Treść')}}
    {{Form::textarea('body','',['class'=>'form-control','placeholder'=>'Treść artykulu'])}}
    {{Form::submit('Dodaj',['class'=>'btn btn-succes'])}}
    {!! Form::close() !!}
@endsection