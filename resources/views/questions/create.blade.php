<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        .add {
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            border: 1px dashed grey;
            margin: 10px 0;
        }

        .add:hover {
            cursor: pointer;
            background-color: #360581;
        }

        .del:hover {
            cursor: pointer;
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
            var str = '<div style="width: 126px; float: left; height: 30px; margin: 0 5px 0 0;" class="form-control-my">Правильный ответ</div> <input type="radio" name="correct_answer[]" value="' + (x + 1) + '" id="correct_answer"> <input type="text" name="answer[]" value="" placeholder="Введите вариант ответа"  style="width: 445px; height: 30px; margin: 0px 0 5px;" class="form-control-my "> <input type="number" name="points[]" value="0"  placeholder="Баллов" style="width: 70px; height: 30px; margin-right: 10px;" class="form-control-my "><span onclick="delInput(' + x + ')" class="del">X</span>';
            document.getElementById('input' + x).innerHTML = str;

            let newInputBox = document.createElement("div");
            newInputBox.setAttribute("id", 'input' + (x + 1));
            document.getElementById("new-boxes-inputs").appendChild(newInputBox);
            x++;
        }

        function delInput(index) {
            document.getElementById('input' + (index)).remove();
        }
    </script>
</head>
@extends('layouts.app')

@section('content')

    {{--{{ dd($errors) }}--}}
    <body>
    <div class="container">
        <div class="row justify-content-center">
            <h2>Введите данные для добавления вопроса и вариантов ответа</h2>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form id="form1" action="{{ route('questions.store') }}" method="post">
                            @csrf
                            <textarea name="question" id="question" cols="95" rows="10" placeholder="Введите вопрос"
                                      class="form-control {{ ($errors->has('question') ? 'is-invalid': '') }}">{{old('question')}}</textarea>

                            @if($errors->has('question'))
                                {{ $errors->first('question') }}
                            @endif

                            <br>


                            @if(!empty(old('answer')) && is_array(old('answer')))
                                @foreach(old('answer') as $key => $answer)
                                    <div style="width: 126px; float: left; height: 30px; margin: 0 5px 0 0;"
                                         class="form-control-my {{ ($errors->has('correct_answer') ? 'is-invalid': '') }}">
                                        Правильный ответ
                                    </div>

                                    @if($errors->has('answer.' . $key))
                                        {{ $errors->first('answer.' . $key) }}
                                    @endif

                                    @if($errors->has('points.0'))
                                        {{ $errors->first('points.0') }}
                                    @endif

                                    <input type="radio" name="correct_answer[]" value="0" id="correct_answer">

                                    <input type="text" name="answer[]" value="{{old('answer')[$key]}}"
                                           placeholder="Введите вариант ответа"
                                           style="width: 445px; height: 30px; margin: 0px 0 5px;"
                                           class="form-control-my {{ ($errors->has('answer.' . $key) ? 'is-invalid': '') }}">

                                    <input type="number" name="points[]" value="0" placeholder="Баллов"
                                           style="width: 70px; height: 30px;"
                                           class="form-control-my {{ ($errors->has('points.0') ? 'is-invalid': '') }}">

                                @endforeach
                            @else
                                <div style="width: 126px; float: left; height: 30px; margin: 0 5px 0 0;"
                                     class="form-control-my {{ ($errors->has('correct_answer.0') ? 'is-invalid': '') }}">
                                    Правильный ответ
                                </div>

                                @if($errors->has('points.0'))
                                    {{ $errors->first('points.0') }}
                                @endif

                                @if($errors->has('correct_answer'))
                                    {{ $errors->first('correct_answer') }}
                                @endif

                                @if($errors->has('answer.0'))
                                    {{ $errors->first('answer.0') }}
                                @endif

                                <input type="radio" name="correct_answer[]" value="0" id="correct_answer">

                                <input type="text" name="answer[]" value="{{old('answer.0')}}"
                                       placeholder="Введите вариант ответа"
                                       style="width: 445px; height: 30px; margin: 0px 0 5px;"
                                       class="form-control-my {{ ($errors->has('answer.0') ? 'is-invalid': '') }}">

                                <input type="number" name="points[]" value="0" placeholder="Баллов"
                                       style="width: 70px; height: 30px;"
                                       class="form-control-my {{ ($errors->has('points.0') ? 'is-invalid': '') }}"
                                       value="{{old('points.0')}}">



                            @endif

                            @if($errors->has('correct_answer'))
                                {{ $errors->first('correct_answer') }}
                            @endif

                            <div id="new-boxes-inputs">
                                <div id="input0"></div>
                            </div>

                            <br>

                            <div class="add" onclick="addInput()">+</div>

                            <button class="sub-btn">Сохранить</button>

                        </form>

                        <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" multiple name="avatar[]">
                            <button>Save file</button>
                        </form>

                        <br>
                        <a href="/questions">К списку вопросов</a>
                        <br>
                        <a href="/home">В личный кабинет</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
</html>