@extends('layouts.admin')
@section('content')
	@include('alerts.request')
	<div id="divider"></div>
	{!!Form::open(['route'=>'turno.store', 'method'=>'POST'])!!}
		@include('turno.forms.tu')
	{!!Form::close()!!}
@stop