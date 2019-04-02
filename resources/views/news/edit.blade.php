@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('news.update', [
                            'id' => 1
                        ]) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <input type="text" name="name">
                            <textarea name="description" id="" cols="30" rows="10"></textarea>
                            <input type="submit" value="SendEdit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
