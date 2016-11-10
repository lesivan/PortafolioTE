@extends('layouts.admin')
@section('content')
	@include('alerts.request')
	<div id="divider"></div>
	{!!Form::open(['route'=>'lineaasignatura.store', 'method'=>'POST'])!!}
		@include('lineaasignatura.forms.lia')
	{!!Form::close()!!}
@stop