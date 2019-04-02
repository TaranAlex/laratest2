<?php





$districts = [
    '4' => 'Донецкая обл.',
    '5' => 'Харьковская обл.',
    '6' => 'Полтавская обл.',
    '7' => 'Киевская обл.',
    '8' => 'Запорожская обл.',
    '9' => 'Львовская обл.',
    '10' => 'Лугансккая обл.'
];


?>


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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<br>
<div class="container">
    <div class="row">

        <form action="{{ route('countries') }}" style="width: 100%" method="post">
            
            <div class="col-md-10">
                    <select id="country" class="form-control" name="country">
                        <option disabled selected>Страна</option>
                        @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->title_ru}}</option>
                        @endforeach   
                        
                    </select>
                    <div class="invalid-feedback"></div>
            </div>

            <div class="col-md-10">
                    <select id="districts" class="form-control" name="districts">
                        <option disabled selected>Область</option>
                        
                        
                    </select>
                    <div class="invalid-feedback"></div>
            </div>   

            <div class="form-group row">
                <div class="col-md-9">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
                
            </div>
        </form>

    </div>
</div>
</body>
</html>
@endsection