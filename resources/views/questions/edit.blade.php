<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        .add {
            width: 75px;
            height: 75px;
            line-height: 75px;
            text-align: center;
            border: 1px dashed grey;
            margin: 10px 0;
        }

        .add:hover {
            cursor: pointer;
            background-color: #360581;
        }

        .form-control-my {

            line-height: 1.6;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .is-invalid {
            border-color: #e3342f;
        }
    </style>
    <script type="text/javascript">
        var x = 0;

        function addInput() {
            var str = '<label for="correct_answer">Правильный ответ</label> <input type="checkbox" name="correct_answer[]" value="' + (x + 1) + '" id="correct_answer"> <input type="text" name="answer[]" value="{{old('answer[]')}}" placeholder="Введите вариант ответа" style="width: 469px; height: 30px;"> <input type="number" name="points[]" value="{{old('points[]')}}"  placeholder="Баллов" style="width: 70px; height: 30px;"> <div id="input' + (x + 1) + '"></div>';
            document.getElementById('input' + x).innerHTML = str;
            x++;

        }
    </script>
</head>
@extends('layouts.app')

@section('content')
    <body>
    <div class="container">
        <div class="row justify-content-center">
            <h2>Введите данные для добавления вопроса и вариантов ответа</h2>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('questions.update', $question->id) }}" method="post">


                            @csrf

                            <input type="hidden" name="_method" value="PUT">
                            <textarea name="question" id="question" cols="95" rows="10"
                                      placeholder="Введите вопрос" class="form-control {{ ($errors->has('question') ? 'is-invalid': '') }}">{{old('question', $question->question)}}</textarea>

                            @if($errors->has('question'))
                                {{ $errors->first('question') }}
                            @endif

                            <br>
                            <div id="answers">
                                @foreach($answers as $key => $answer)
                                    <div style="width: 126px; float: left; height: 30px; margin: 0 5px 0 0;"
                                         class="form-control-my {{ ($errors->has('correct_answer') ? 'is-invalid': '') }}">
                                        Правильный ответ
                                    </div>
                                    @if($answer->status == 'correct')
                                        <input type="checkbox" name="correct_answer[]" value="{{$key}}" id="correct_answer" checked>
                                    @else
                                        <input type="checkbox" name="correct_answer[]" value="{{$key}}" id="correct_answer">
                                    @endif

                                    <input type="text" name="answer[]" value="{{$answer->answer}}" placeholder="Введите вариант ответа"
                                           style="width: 465px; height: 30px; margin: 0px 0 5px;"
                                           class="form-control-my {{ ($errors->has('answer') ? 'is-invalid': '') }}">
                                    <input type="number" name="points[]" value="{{$answer->points}}" placeholder="Баллов"
                                           style="width: 70px; height: 30px;" class="form-control-my {{ ($errors->has('points') ? 'is-invalid': '') }}">
                                    <input type="hidden" name="answers_ids[]" value="{{$answer->id}}">
                                @endforeach
                                <div id="input0"></div>
                            </div>

                            @if($errors->has('points'))
                                {{ $errors->first('points') }}
                            @endif

                            @if($errors->has('answer'))
                                {{ $errors->first('answer') }}
                            @endif

                            @if($errors->has('correct_answer'))
                                {{ $errors->first('correct_answer') }}
                            @endif

                            <br>
                            <div id="input0"></div>
                            <div class="add" onclick="addInput()">+</div>
                            <br>
                            <button class="sub-btn">Редактировать</button>
                        </form>
                        <br>
                        <a href="/questions">К списку вопросов</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
</html>