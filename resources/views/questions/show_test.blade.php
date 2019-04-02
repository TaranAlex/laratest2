@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <h2>Тест № {{$test->id}} : {{$test->test_name}}</h2>

                    <ol>
                        @foreach($questions as $question)
                            <li>
                                <h4>{{ $question['questionName'] }}</h4>
                                <p>Варианты ответов:</p>
                                <ol>
                                    @foreach ($question['answers'] as $answer)
                                        <p>
                                            {{$answer['answerName'] }}
                                            <sub>{{$answer['answerStatus'] }}
                                            </sub>
                                        </p>
                                    @endforeach
                                </ol>
                            </li>
                        @endforeach
                    </ol>


                </div>
            </div>
            <a href="{{route('index_tests')}}">К списку тестов</a>
        </div>
    </div>
@endsection
