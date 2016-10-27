@extends('layouts.admin')
@section('content')
	@include('alerts.request')
	<div id="divider"></div>
	{!!Form::open(['route'=>'lineainvestigacion.store', 'method'=>'POST'])!!}
		@include('lineainvestigacion.forms.li')
	{!!Form::close()!!}
@stop