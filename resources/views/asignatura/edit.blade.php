@extends('layouts.admin')

@section('content')
	@include('alerts.request')
	<div id="divider"></div>
	<div class="form-group">
		{!!Form::model($asignatura, ['route'=>['asignatura.update', $asignatura->id], 'method'=>'PUT'])!!}
			@include('asignatura.forms.asig')
			{!!Form::submit('Modificar', ['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
	</div>
	
	<div class="form-group">
		{!!Form::open(['route'=>['asignatura.destroy', $asignatura->id], 'method'=>'DELETE'])!!}
			{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	</div>
	
	
@stop