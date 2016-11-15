@extends('layouts.admin')
@section('content')
	@include('alerts.request')
	<div id="divider"></div>
	{!!Form::open(['route'=>'estudiante.store', 'method'=>'POST'])!!}
		@include('estudiante.forms.usr')
		
	{!!Form::close()!!}
@stop