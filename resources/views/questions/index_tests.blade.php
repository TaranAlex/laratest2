@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <h2>Список тестов</h2>


                        <ol>
                            @foreach ($tests as $test)
                                <li><a href="/questions/show_test/{{ $test->id }}"
                                       style="margin-left: 10px;">{{$test->test_name}}</a><br>
                                    {{--<a href="/questions/delete/{{ $test->id }}">Удалить</a>--}}
                                    <a href=" /destroy_test/{{$test->id }}">Удалить</a>
                                </li>
                            @endforeach
                        </ol>


                        <a href="/questions">К списку вопросов</a>
                        <br>
                        <a href="/home">В личный кабинет</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection