@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Результаты тестирования') }}</div>
                    <h1 style="margin: 10px auto;">Просмотр результатов тестов</h1>
                    <br>

                    <ol>
                        @foreach ($results as $result)
                            <li>
                                <p style="margin-left: 10px;">№ результата: {{ $result->result_id }}, тестируемый: {{ $result->fio }}, тест №: {{ $result->test_id }}, количество баллов: {{ $result->points }};</p>
                            </li>
                            <br>
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
