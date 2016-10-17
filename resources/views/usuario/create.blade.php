@extends('layouts.admin')

@section('content')
	@include('alerts.request')
	<div id="divider"></div>
	{!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}
		@include('usuario.forms.usr')
		
	{!!Form::close()!!}
@stop