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
        <form action="{{ route('save-text') }}" method="get" enctype="multipart/form-data">

            @csrf
            <input type="text" name="logs" style="width: 800px" placeholder="Введите текст лога" value="{{old('logs')}}">
            <button>Сохранить</button>

            <br>
            @if($errors->has('logs'))
                {{ $errors->first('logs') }}
            @endif

        </form>
        <a href="/views/index">К списку логов</a>
    </div>
</body>
</html>
@endsection