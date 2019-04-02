@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">



                    <h2>Вопрос № {{$question->id}} : {{$question->question}}</h2>

                    <p>Варианты ответов:</p>

                    <ol>
                        @foreach ($answers as $answer)
                            @if($answer->status == 'correct')                            
                                <li>
                                    <h5>{!! $answer->answer !!} - это правильный ответ, кол-во баллов - {!! $answer->points !!}</h5>
                                </li>                            
                            @else                            
                                <li>
                                    <h5>{!! $answer->answer !!} - это неправильный ответ, кол-во баллов - {!! $answer->points !!}</h5>
                                </li>
                            @endif                        
                        @endforeach
                    </ol>
                </div>
            </div>
            <a href="/questions">К списку вопросов</a>
        </div>
    </div>
@endsection
