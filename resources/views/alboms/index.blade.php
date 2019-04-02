@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <!-- Отображение всех   -->
                        <ul>
                            @foreach ($alboms as $albom) 
                                <li><a href="/alboms/show/{{ $albom->id }}">{{$albom->name}}</a>
                                    <p> <a href="/alboms/{{ $albom->id }}/edit">Редактировать</a>
                                        <a href="/alboms/delete/{{ $albom->id }}">Удалить</a></p>
                                </li>                            
                            @endforeach
                        </ul>
                        <a href="/alboms/create">Добавить альбом</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection