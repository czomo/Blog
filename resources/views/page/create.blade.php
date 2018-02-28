@extends('layouts.app')

@section('content')
        <h1> Dodaj post</h1>
        {!! Form::open(['action'=>'ArtykulController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
<div class="form-group">
    {{Form::label('title','Tytuł')}}
    {{Form::text('title','',['class'=>'form-control','placeholder'=>'tytuł'])}}
</div>
<div class="form-group">
    {{Form::label('body','Treść')}}
    {{Form::textarea('body','', ['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Treść artykulu'])}}
</div>
<div class ="form-group">
    {{Form::file('image')}}
</div>
    {{Form::submit('Dodaj',['class'=>'btn btn-succes'])}}
    {!! Form::close() !!}
@endsection