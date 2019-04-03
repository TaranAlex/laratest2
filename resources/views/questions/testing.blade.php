@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Тестирование') }}</div>
                    <h1 style="margin: 10px auto;">Выберите тест для прохождения</h1>

                    <h2 style="margin: 20px;">Список тестов</h2>

                    <ol>
                        @foreach ($tests as $test)
                            <li>
                                <a href="/questions/show_test_for_tested/{{ $test->id }}"
                                   style="margin-left: 10px; ">{{$test->test_name}}</a>
                            </li>
                        @endforeach
                    </ol>

                </div>
                <br>
                <a href="/home_tested" style="margin: 20px;">В личный кабинет</a>
            </div>
        </div>
    </div>
    </div>
@endsection
