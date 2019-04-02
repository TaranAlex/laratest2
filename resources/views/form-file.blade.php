@extends('layouts.app')

@section('content')

<form action="{{ route('save-file') }}" method="post" enctype="multipart/form-data">
    @csrf                            
    <input type="file" name="avatar"> 
    <button>Save file</button>
</form>

@endsection