@extends('layouts.app')
@section('content')

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div style="width: 1000px; margin: 0 auto">

    <ol>
            @foreach($files as $file)
            <li><a href="/storage/app/public/logs/{{$file}}">{{$file}}</a>
                <p> <a href="/destroy/{{$file}}">Удалить</a></p>
            </li>
        @endforeach
    </ol>

    <a href="/form">Ввести еще лог</a>


</div>
</body>
</html>
@endsection