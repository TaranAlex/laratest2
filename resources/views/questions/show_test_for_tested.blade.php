<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">

        select:focus{
            border: 3px solid blue;
            box-shadow: 1px 1px 3px 0 blue;
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

                            <select name="user_name" id="user_name"  style="width: 690px; height: 40px; color: blue" class="form-control {{ ($errors->has('user_name') ? 'is-invalid': '') }}">
                                <option value="" disabled selected="">Выберите Ваше ФИО</option>

                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->fio }}</option>
                                @endforeach

                            </select>

                            @if($errors->has('user_name'))
                                {{ $errors->first('user_name') }}
                            @endif

                            <br>
                            <br>

                            <h2>Тест № {{$test->id}} : {{$test->test_name}}</h2>

                            <ol>
                                @foreach($questions as $question)
                                    <li>
                                        <h4>{{ $question['questionName'] }}</h4>
                                        <p>Выберите вариант ответа:</p>
                                        <ol>
                                            @foreach ($question['answers'] as $answer)
                                                <p>
                                                    <input type="radio" id="{{$answer['answerName'] }}"
                                                           name="question_id_{{ $question['questionId'] }}"
                                                           value="answer_points_{{$answer['answerPoints'] }}" checked>
                                                    <label for="contactChoice1">{{$answer['answerName'] }}</label>
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
                <a href="{{route('testing')}}">К списку тестов</a>
            </div>
        </div>
@endsection
