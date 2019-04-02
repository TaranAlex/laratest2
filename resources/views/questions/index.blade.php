<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">

        textarea, input:focus{
            border: 2px solid blue;
            box-shadow: 1px 1px 2px 0 blue;
        }

    </style>

</head>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <!-- Отображение всех   -->
                        <h2>Формирование теста</h2>

                        <form action="{{ route('store_test') }}" method="post">

                            @csrf

                            <input type="text" name="test_name" value="" placeholder="Введите название теста" style="width: 690px; height: 30px;" class="form-control {{ ($errors->has('test_name') ? 'is-invalid': '') }}">

                            @if($errors->has('test_name'))
                                {{ $errors->first('test_name') }}
                            @endif

                            <br>

                                {{'Выберите вопросы для теста:'}}
                                <br>
                            <ol>
                                @foreach ($questions as $question)

                                    <li><a href="/questions/show/{{ $question->id }}">{{$question->question}}</a>
                                        <input type="checkbox" name="add_question[]" value="{{$question->id}}" id="add_question" style="float: right; width: 35px; height: 35px;">
                                        <div  class="form-control {{ ($errors->has('add_question') ? 'is-invalid': '') }}" style="float: right; width: 185px;">Добавить вопрос в тест</div>
                                        @if($errors->has('add_question'))
                                            {{ $errors->first('add_question') }}
                                        @endif
                                        <p> <a href="/questions/{{ $question->id }}/edit">Редактировать</a>
                                            <a href="/questions/delete/{{ $question->id }}">Удалить</a>
                                            </p>
                                    </li>                            
                                @endforeach
                            </ol>

                            <button class="sub-btn">Сохранить тест</button><br>

                        </form>

                        <a href="/questions/create">Добавить вопрос</a><br>
                        <a href="{{route('index_tests')}}">К списку тестов</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection