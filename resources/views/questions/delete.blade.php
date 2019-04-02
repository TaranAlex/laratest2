@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <a href="/questions/{{ $question->id }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">DELETE</a>

                    <form id="delete-form" action="/questions/{{ $question->id }}" method="POST"
                      style="display: none;">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection