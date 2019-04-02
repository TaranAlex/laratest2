@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Личный кабинет тестируемого</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Добро пожаловать в личный кабинет, {{ Auth::user()->fio }}
                </div>
            </div>
            <a href="{{ route('testing') }}">Пройти тест</a><br>
            <a href="{{ route('results') }}" >Просмотр результатов</a>
        </div>
    </div>
</div>
@endsection
