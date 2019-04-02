@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('news.store') }}" method="post">
                            @csrf
                            <input type="text" name="name">
                            <textarea name="description" id="" cols="30" rows="10"></textarea>
                            <input type="submit" value="Send">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
