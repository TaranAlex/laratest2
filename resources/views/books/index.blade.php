@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <!-- Отображение всех   -->


                        <ul>
                            {{'Книги в наличии:'}}
                            @foreach ($activeBooks as $book)

                                <li><a href="/books/show/{{ $book->id }}">{{$book->id . '  ' . $book->name . '  ' . $book->author}}</a>
                                    <p> <a href="/books/{{ $book->id }}/edit">Редактировать</a>
                                        <a href="/books/delete/{{ $book->id }}">Удалить</a></p>
                                </li>                            
                            @endforeach
                        </ul>

                        <ul>
                            {{'Книги не в наличии:'}}
                            @foreach ($books as $book) 
                                <li><a href="/books/show/{{ $book->id }}">{{$book->id . '  ' . $book->name . '  ' . $book->author}}</a>
                                    <p> <a href="/books/{{ $book->id }}/edit">Редактировать</a>
                                        <a href="/books/delete/{{ $book->id }}">Удалить</a></p>
                                </li>                            
                            @endforeach
                        </ul>

                        <a href="/books/create">Добавить книгу</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection