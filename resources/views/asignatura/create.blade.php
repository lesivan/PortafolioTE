@extends('layouts.admin')
@section('content')
	@include('alerts.request')
	<div id="divider"></div>
	{!!Form::open(['route'=>'asignatura.store', 'method'=>'POST'])!!}
		@include('asignatura.forms.asig')
	{!!Form::close()!!}
@stop