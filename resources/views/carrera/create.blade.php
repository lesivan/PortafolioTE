@extends('layouts.admin')
@section('content')
	@include('alerts.request')
	<div id="divider"></div>
	{!!Form::open(['route'=>'carrera.store', 'method'=>'POST'])!!}
		@include('carrera.forms.cra')
	{!!Form::close()!!}
@stop