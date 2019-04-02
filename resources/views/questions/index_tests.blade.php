@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <!-- Отображение всех   -->
                        <h2>Список тестов</h2>


                        <ol>
                            @foreach ($tests as $test)
                                <li><a href="/questions/show_test/{{ $test->id }}">{{$test->test_name}}</a>
                                    
                                </li>                            
                            @endforeach
                        </ol>

                    
                        <a href="/questions">К списку вопросов</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection