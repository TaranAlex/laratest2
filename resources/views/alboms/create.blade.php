@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
        <h2>Введите данные для добавления альбома</h2>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('alboms.store') }}" method="post">

                            


                            @csrf
                            
                            <input type="text" name="name" value="{{old('name')}}">Введите название
                            


                            @if($errors->has('name'))
                                {{ $errors->first('name') }}
                            @endif


                            <br>

                            
                            <textarea name="description" id="" cols="30" rows="10">{{old('description')}}</textarea>Введите описание

                            @if($errors->has('description'))
                                {{ $errors->first('description') }}
                            @endif


                            <input type="submit" value="Send">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection