
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        .add
        {
          width: 50px;
          height: 50px;
          line-height: 50px;
          text-align: center;
          border: 1px dashed grey;
          margin: 10px 0;
        }

        .add:hover
        {
          cursor: pointer;
          background-color: #360581;
        }

        .form-control-my
        {

            line-height: 1.6;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }


    </style>
    <script type="text/javascript">
        var x = 0;

        function addInput() {
            
            var str = '<div style="width: 126px; float: left; height: 30px; margin: 0 5px 0 0;" class="form-control-my">Правильный ответ</div> <input type="checkbox" name="correct_answer[]" value="' + (x + 1) +'" id="correct_answer"> <input type="text" name="answer[]" value="" placeholder="Введите вариант ответа"  style="width: 465px; height: 30px; margin: 0px 0 5px;" class="form-control-my "> <input type="number" name="points[]" value=""  placeholder="Баллов" style="width: 70px; height: 30px;" class="form-control-my ">  <div id="input' + (x + 1) + '"></div>';
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
                        <form action="{{ route('questions.store') }}" method="post">
                            @csrf
                            <textarea name="question" id="question" cols="95" rows="10" placeholder="Введите вопрос" class="form-control {{ ($errors->has('question') ? 'is-invalid': '') }}">{{old('question')}}</textarea>

                            @if($errors->has('question'))
                                {{ $errors->first('question') }}
                            @endif

                            <br>

                            <div style="width: 126px; float: left; height: 30px; margin: 0 5px 0 0;" class="form-control-my {{ ($errors->has('correct_answer') ? 'is-invalid': '') }}">Правильный ответ</div>
                            <input type="checkbox" name="correct_answer[]" value="0" id="correct_answer">

                            <input type="text" name="answer[]" value="{{old('answer')}}" placeholder="Введите вариант ответа" style="width: 465px; height: 30px; margin: 0px 0 5px;" class="form-control-my {{ ($errors->has('answer') ? 'is-invalid': '') }}">
                            <input type="number" name="points[]" value="" placeholder="Баллов" style="width: 70px; height: 30px;" class="form-control-my {{ ($errors->has('points') ? 'is-invalid': '') }}">
                            


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


                            <button class="sub-btn">Сохранить</button>                          


                            
                        </form>
                    <a href="/questions">К списку вопросов</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
</html>