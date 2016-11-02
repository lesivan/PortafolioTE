@extends('layouts.admin')
@section('content')
	@include('alerts.request')
	<div id="divider"></div>
	{!!Form::open(['route'=>'carreraturno.store', 'method'=>'POST'])!!}
		@include('carrera.forms.crt')
	{!!Form::close()!!}
@stop