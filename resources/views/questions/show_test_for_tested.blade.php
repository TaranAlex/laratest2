<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">

        .is-invalid {
            border-color: #e3342f;
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
                        <form action="{{ route('store_test_result') }}" method="post">

                            @csrf

                            <input type="hidden" name="user_id" value="{{$user->id}}">

                            <h2>Тест № {{$test->id}} : {{$test->test_name}}</h2>
                            <input type="hidden" name="test_id" value="{{$test->id}}">
                            <br>
                            <h4>Тестируемый: {{$user->fio}}</h4>
                            <br>
                            
                            @if($errors->has('questions'))
                                {{ $errors->first('questions') }}
                            @endif

                            <ol>
                                @foreach($questions as $question)
                                    <li>
                                        <h4>{{ $question['questionName'] }}</h4>
                                        <p>Выберите вариант ответа:</p>
                                        <ol>
                                            @foreach ($question['answers'] as $answer)
                                                <p>
                                                    <input type="radio" id="{{$answer['answerName'] }}"
                                                           name="questions[{{$question['questionId']  }}]"
                                                           value="{{$answer['answerPoints'] }}">
                                                    <label for="questions[{{$question['questionId']  }}]">{{$answer['answerName'] }}</label>
                                                </p>
                                            @endforeach
                                        </ol>
                                    </li>
                                @endforeach
                            </ol>

                            <button class="sub-btn">Сохранить</button>

                        </form>
                    </div>
                </div>
                <br>
                <a href="{{route('testing')}}" style="margin: 20px;">К списку тестов</a>
            </div>
        </div>
@endsection
