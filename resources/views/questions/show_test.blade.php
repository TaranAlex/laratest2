@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <h2 style="margin: 20px;">Тест № {{$test->id}} : {{$test->test_name}}</h2>

                    <ol>
                        @foreach($questions as $question)
                            <li>
                                <h4>{{ $question['questionName'] }}</h4>
                                <p>Варианты ответов:</p>
                                <ol>
                                    @foreach ($question['answers'] as $answer)
                                        <p>
                                            {{$answer['answerName'] }}
                                            @if($answer['answerStatus'] == 'correct')
                                                {{ ' - правильный ответ' }}
                                            @else
                                                {{ ' - неправильный ответ' }}
                                            @endif
                                        </p>
                                    @endforeach
                                </ol>
                            </li>
                        @endforeach
                    </ol>


                </div>
                <br>
                <a href="{{route('index_tests')}}" style="margin: 20px;">К списку тестов</a>
            </div>
        </div>
    </div>
@endsection
