@extends('layouts.start')


@section('content')

{{$fio}}

{{date('Y:m:d')}}

@isset($fio)
	<p>Добрый день</p>
@endisset

@empty($skills)
	<p>У вас нет навыков</p>
@endempty

<p>мы знаем</p>
<ul>
	@foreach($skills as $skill)
	<li>{{$skill}}</li>

	@if($skill == 'css')
		@break
	@endif

	@endforeach
</ul>

@foreach($news as $item)
	
	<h3>{{$item['title']}}</h3>
	<p>{{$item['body']}}</p>

@endforeach


@each('news', $news, 'item')



@component('alert')
	55555555555555
@endcomponent

@endsection