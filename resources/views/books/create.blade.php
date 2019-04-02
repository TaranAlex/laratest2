@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>Введите данные для добавления книги</h2>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('books.store') }}" method="post">

                            


                            @csrf
                            <input type="text" name="name" value="{{old('name')}}">Введите название
                            


                            @if($errors->has('name'))
                                {{ $errors->first('name') }}
                            @endif


                            <br>

                            <input type="text" name="author" value="{{old('author')}}">Введите автора
                            


                            @if($errors->has('author'))
                                {{ $errors->first('author') }}
                            @endif


                            <br>

                            <input type="number" name="active" value="{{old('active')}}">Укажите наличие (1 или 0)
                            


                            @if($errors->has('active'))
                                {{ $errors->first('active') }}
                            @endif


                            <br>

                            


                            <input type="submit" value="Send">
                        </form>
                    <a href="/books">К списку книг</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection