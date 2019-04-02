@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('alboms.update', $albom->id) }}" method="post">

               

                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <input type="text" name="name" value="{{old('name', $albom->name)}}">
                            


                            @if($errors->has('name'))
                                {{ $errors->first('name') }}
                            @endif


                            <br>
                            <textarea name="description" id="" cols="30" rows="10">{{old('description', $albom->description)}}</textarea>

                            @if($errors->has('description'))
                                {{ $errors->first('description') }}
                            @endif


                            <input type="submit" value="SendEdit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection