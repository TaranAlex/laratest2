@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('books.update', $book->id) }}" method="post">

               

                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <input type="text" name="name" value="{{old('name', $book->name)}}">
                            


                            @if($errors->has('name'))
                                {{ $errors->first('name') }}
                            @endif


                            <input type="text" name="author" value="{{old('author', $book->author)}}">Введите автора
                            


                            @if($errors->has('author'))
                                {{ $errors->first('author') }}
                            @endif


                            <br>

                            <input type="number" name="active" value="{{old('active', $book->active)}}">Укажите наличие (1 или 0)
                            


                            @if($errors->has('active'))
                                {{ $errors->first('active') }}
                            @endif


                            <br>


                            


                            <input type="submit" value="SendEdit">
                        </form>
                    <a href="/books">К списку книг</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection