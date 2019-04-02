@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Личный кабинет учителя</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Добро пожаловать в личный кабинет, {{ Auth::user()->fio }}
                </div>
                <a href="/questions/create">Добавить вопрос</a>
                <a href="/questions">К списку вопросов для формирования теста</a>
                <a href="{{route('index_tests')}}">К списку тестов</a>
            </div>
        </div>
    </div>
</div>
@endsection