@extends('master')

@section('title')
	Random User Generator
@stop

@section('content')
  
  <div class='container'>
  
	<a href="/">Home</a>
	<h1>Random User Generator</h1><br/>
		{{Form::open(array('url' => '/user-generator', 'method' => 'POST'));}}
		{{Form::label('users_label', 'How many users?');}}
		{{Form::text('users', '2');}}
		<br>
		{{ Form::checkbox("birthday", "birthday", Input::get("birthday"), array("id"=>"birthday")); }}
		{{ Form::label("birthday", "Include Birthdays"); }}
		<br>
		{{ form::checkbox('profile', 'profile' , Input::get("profile"), array("id"=>"profile")); }}
		{{ Form::label('profile', 'Profile'); }}
		<br>
		{{Form::submit('Generate');}}
		{{Form::close();}}
	<br/>
	</div>
	
	<div class='user'>
	
	@if (isset($data))
		@foreach ($data as $dataNow)
		<p><b> {{ $dataNow['name'] }} </b></p>
		<p><i> {{ $dataNow['birthday'] }} </i></p>		
		<p><i> {{ $dataNow['address'] }} </i></p>
		<p><i> {{ $dataNow['city'] }} </i></p>
		<p><i> {{ $dataNow['state'] }} </i></p>
		<br/>
		@endforeach;
	@endif
	
	</div>
	
		
@stop