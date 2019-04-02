@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h2>{{$alboms->name}}</h2>
                    
                    {!! $alboms->description !!}
                </div>
            </div>
            <a href="/alboms">К списку альбомов</a>
        </div>
    </div>
@endsection
