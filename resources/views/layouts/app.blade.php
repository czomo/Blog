<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <!--        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet">
-->
<link rel="stylesheet" href="{{asset('css/app.css')}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <title>{{config('app.name','Blog')}}</title>

    </head>
    <body>
        @include('inc.navbar')
        <div class='container'>
            @include('inc.message')
         @yield('content')
        </div>
        <script src="http://cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>

        <script>CKEDITOR.replace('article-ckeditor');</script>
    </body>
</html>
