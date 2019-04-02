@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Тестирование') }}</div>
                    <h1>Выберите тест для прохождения</h1>

                    <h2>Список тестов</h2>


                    <ol>
                        @foreach ($tests as $test)
                            <li><a href="/questions/show_test_for_tested/{{ $test->id }}">{{$test->test_name}}</a>

                            </li>
                        @endforeach
                    </ol>

                    <a href="/home_tested">В личный кабинет</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
