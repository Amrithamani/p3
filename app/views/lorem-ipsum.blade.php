@extends('master')

@section('title')
	Lorem Ipsum Generator
@stop

@section('content')
  
  <div class='container'>
  
	<a href="/">Home</a>
	<h1>Lorem Ipsum Generator</h1><br/>
		{{Form::open(array('url' => '/lorem-ipsum', 'method' => 'POST'));}}
		{{Form::label('paragraphCount', 'Numer of paragraphs?');}}
		{{Form::text('paragraphCount', '2' );}}
		{{Form::submit('Generate');}}
		{{Form::close();}}
	<br/>
	</div>
	
	
	<div class='paragraphs-output'>
	
	<p>Here is your text:</p>
	
	@if (isset($paragraph))

	<p>{{ $paragraph }}</p>;

	@endif
	</div>
@stop