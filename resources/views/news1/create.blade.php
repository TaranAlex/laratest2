<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<br>

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <form action="{{ route('news1.store') }}" style="width: 100%" method="post">
                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label">Заголовок</label>
                    <div class="col-md-10">
                         @php

                            $news1 = ['id' => '1', 'title' => 'новость1', 'annotation' => 'аннотация1', 'content' => 'контент1', 'email' => 'email1', 'views' => '5', 'date' => '13.03.2019'];

                        @endphp


                        @csrf
                        <input
                                type="text"
                                class="form-control"
                                id="title"
                                name="title"
                                value="{{old('title')}}"
                        >
                        @if($errors->has('title'))
                            {{ $errors->first('title') }}
                        @endif


                        <br>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="annotation" class="col-md-2 col-form-label">Аннотация</label>
                    <div class="col-md-10">
                        <textarea
                                name="annotation"
                                id="annotation"
                                class="form-control"
                                cols="30"
                                rows="10">{{old('annotation')}}</textarea>
                        @if($errors->has('annotation'))
                            {{ $errors->first('annotation') }}
                        @endif


                        <br>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="content" class="col-md-2 col-form-label">Текст новости</label>
                    <div class="col-md-10">
                        <textarea
                                name="content"
                                id="content"
                                class="form-control"
                                cols="30"
                                rows="10">{{old('content')}}</textarea>

                        @if($errors->has('content'))
                            {{ $errors->first('content') }}
                        @endif


                        <br>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label">Email  автора для связи</label>
                    <div class="col-md-10">
                        <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                value="{{old('email')}}"
                        >

                        @if($errors->has('email'))
                            {{ $errors->first('email') }}
                        @endif


                        <br>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="views" class="col-md-2 col-form-label">Кол-во просмотров</label>
                    <div class="col-md-10">
                        <input
                                type="text"
                                class="form-control"
                                id="views"
                                name="views"
                                value="{{old('views')}}"
                        >

                        @if($errors->has('views'))
                            {{ $errors->first('views') }}
                        @endif


                        <br>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date" class="col-md-2 col-form-label">Дата публикации</label>
                    <div class="col-md-10">
                        <input
                                type="date"
                                class="form-control"
                                id="date"
                                name="date"
                                value="{{old('date')}}"
                        >

                        @if($errors->has('date'))
                            {{ $errors->first('date') }}
                        @endif


                        <br>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="is_publish" class="col-md-2 col-form-label">Публичная новость</label>
                    <div class="col-md-10">
                        <input
                                type="checkbox"
                                class="form-control"
                                id="is_publish"
                                name="is_publish"
                                
                        >

                        
                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Публиковать на главной</label>
                    <div class="col-md-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="publish_in_index" id="publish_in_index_yes" value="yes" checked>
                            <label class="form-check-label" for="publish_in_index_yes">
                                Да
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="publish_in_index" id="publish_in_index_no" value="no">
                            <label class="form-check-label" for="publish_in_index_no">
                                Нет
                            </label>
                        </div>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="category" class="col-md-2 col-form-label">Публичная новость</label>
                    <div class="col-md-10">
                        <select id="category" class="form-control" name="category">
                            <option disabled selected>Выберете категорию из списка..</option>
                            <option value="1">Спорт</option>
                            <option value="2">Культура</option>
                            <option value="3">Политика</option>
                        </select>

                        @if($errors->has('category'))
                            {{ $errors->first('category') }}
                        @endif


                        <br>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-9">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </div>
                    <div class="col-md-3">
                        <div class="alert alert-success">Форма валидна</div>
                    </div>
                    <!-- <input type="hidden" name="lang" value="{{ App::getLocale() }}"> -->
                </div>
            </form>

        </div>
    </div>

@endsection

</body>
</html>