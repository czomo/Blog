@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
<hr>
@if(count($posts)>0)
<table class="table table-striped">
    <tr>
        <th>Tytul</th>
        <th></th>
        <th></th>
    </tr>
            @foreach($posts as $post)
            <tr>
                    <td>{{$post->title}}</td>
                    <td><a href="http://localhost/blog/public/artyks/{{$post->id}}/edit" class="btn btn-default">Edytuj</a></td>
                    <td>{!!Form::open(['action'=>['ArtykulController@destroy',$post->id],'method'=>'POST','class'=>'pull-left'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                            {!!Form::close()!!}</td>
                </tr>
            @endforeach
</table>
@else
<p>Brak artykulow</p>
@endif
 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
