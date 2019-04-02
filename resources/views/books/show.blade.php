@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h2>{{$books->name}}</h2>
                    
                    {!! $books->author !!}
                </div>
            </div>
            <a href="/books">К списку книг</a>
        </div>
    </div>
@endsection
